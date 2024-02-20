<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Optometry_model extends MY_Model
{

    public function get_optometry_patients_datatable()
    {

        $setting            = $this->setting_model->get();
        $opd_month          = $setting[0]['opd_record_month'];
        $userdata           = $this->customlib->getUserData();
        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

        $i                         = 1;
        $custom_fields             = $this->customfield_model->get_custom_fields('opd', 1);
        $custom_field_column_array = array();
        $field_var_array = array();
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, '`table_custom_' . $i . '`.`field_value` as `' . $custom_fields_value->name . '`');
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'opd_details.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, "left");
                $i++;
            }
        }

        $field_variable = (empty($field_var_array)) ? "" : "," . implode(',', $field_var_array);
        $custom_field_column = (empty($custom_field_column_array)) ? "" : "," . implode(',', $custom_field_column_array);
        $this->datatables
            ->select('opd_details.id as opdid,opd_details.case_reference_id,patients.id as pid,count(opd_details.patient_id) as total_visit,max(visit_details.appointment_date) as last_visit,patients.patient_name,patients.id as patientid,patients.guardian_name,patients.gender,patients.mobileno,patients.is_ipd,staff.name,staff.surname,staff.employee_id' . $field_variable)
            ->join('visit_details', "opd_details.id=visit_details.opd_details_id", "LEFT")
            ->join('patients', "patients.id=opd_details.patient_id", "LEFT")
            ->join('staff', 'staff.id = visit_details.cons_doctor', "LEFT")
            ->searchable('patients.patient_name,patients.id,patients.guardian_name,patients.gender,patients.mobileno,staff.name' . $custom_field_column)
            ->orderable('patients.patient_name,patients.id,patients.guardian_name,patients.gender,patients.mobileno,staff.name' . $custom_field_column . ',MAX(visit_details.appointment_date)')
            ->sort('max(visit_details.appointment_date)', 'desc')
            ->where('visit_details.cons_optometrist!=', null)
            ->group_by('patients.id')
            ->from('opd_details');

        return $this->datatables->generate('json');
    }

    public function get_optometry_patient_visits_datatable($patientid)
    {


        $this->datatables
            ->select('opd_details.case_reference_id,opd_details.id as opd_id,opd_details.patient_id as patientid,opd_details.is_ipd_moved,max(visit_details.id) as visit_id,visit_details.appointment_date,visit_details.refference,visit_details.symptoms,patients.id as pid,patients.patient_name,staff.id as staff_id,staff.name,staff.surname,staff.employee_id,consult_charges.standard_charge,patient_charges.apply_charge,(select name from staff where id=cons_optometrist) as optometrist')
            ->join('visit_details', 'opd_details.id = visit_details.opd_details_id')
            ->join('staff', 'staff.id = visit_details.cons_doctor', "inner")
            ->join('patients', 'patients.id = opd_details.patient_id', "inner")
            ->join('consult_charges', 'consult_charges.doctor=visit_details.cons_doctor', 'left')
            ->join('patient_charges', 'opd_details.id=patient_charges.opd_id', 'left')
            ->searchable('opd_details.id,opd_details.case_reference_id,visit_details.appointment_date,staff.name,visit_details.refference,visit_details.symptoms')
            ->sort('visit_details.id', 'desc')
            ->where('opd_details.patient_id', $patientid)
            ->where('opd_details.discharged', 'no')
            ->where('visit_details.cons_optometrist!=', null)
           // ->group_by('visit_details.opd_details_id', '')
            ->from('opd_details');
        $result = $this->datatables->generate('json');

        return $result;
    }
}
