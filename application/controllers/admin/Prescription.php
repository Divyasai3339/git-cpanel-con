<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Prescription extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->config->load("payroll");
        $this->load->library('Enc_lib');
        $this->marital_status = $this->config->item('marital_status');
        $this->payment_mode   = $this->config->item('payment_mode');
        $this->blood_group    = $this->config->item('bloodgroup');
        $this->load->model('prefix_model');
        $this->opd_prefix = $this->prefix_model->getByCategory(array('opd_no'))[0]->prefix;
        $this->load->model('finding_model');
        $this->load->model('complaints_model');
        
    }

    public function printPrescription()
    {
        $visitid               = $this->input->get('visitid');
        $data["print_details"] = $this->printing_model->getheaderfooter('opdpre');
        $result                = $this->prescription_model->getPrescriptionByVisitID($visitid);
        $data["result"]        = $result;

        $data["id"]     = $visitid;
        $data["opd_id"] = $result->opd_detail_id;
        $page           = $this->load->view('admin/patient/_printprescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));
    }

    public function getPrescription($visitid)
    {
        $result                = $this->prescription_model->getPrescriptionByVisitID($visitid);
        $data["result"]        = $result;
        $data["print_details"] = $this->printing_model->getheaderfooter('opdpre');
        $data["id"]            = $visitid;
        $data["opd_id"]        = $result->opd_detail_id;
        if (isset($_POST['print'])) {
            $data["print"] = 'yes';
        } else {
            $data["print"] = 'no';
        }

        $this->load->view("admin/patient/prescription", $data);
    }

    public function getTemplatePrescription($template_id)
    {
        $result                = $this->prescription_model->getTemplatePrescriptionMedicinesByTemplateID($template_id);
        $data["result"]        = $result;
        $data["print_details"] = $this->printing_model->getheaderfooter('opdpre');
        $data["template_name"]            = $this->prescription_model->getTemplateNameByID($template_id);
        
        // if (isset($_POST['print'])) {
        //     $data["print"] = 'yes';
        // } else {
        //     $data["print"] = 'no';
        // }

        $this->load->view("admin/medi_template/prescription", $data);
    }

    public function getPrescriptionmanual($visitid)
    {
        $result                   = $this->prescription_model->getmanual($visitid);
        $opddata                  = $this->patient_model->getopdvisitDetailsbyvisitid($visitid);
        $opdid                    = $opddata['opdid'];
        $data['blood_group_name'] = $opddata['blood_group_name'];
        $data["print_details"]    = $this->printing_model->getheaderfooter('opdpre');
        $data["result"]           = $result;
        $data["visitid"]          = $visitid;
        $data["opdid"]            = $opdid;

        if (isset($_POST['print'])) {
            $data["print"] = 'yes';
        } else {
            $data["print"] = 'no';
        }

        $data['opd_prefix'] = $this->opd_prefix;

        $this->load->view("admin/patient/prescriptionmanual", $data);
    }

    public function getIPDPrescription()
    {
        $prescription_id       = $this->input->post('prescription_id');
        $result                = $this->prescription_model->getPrescriptionByTable($prescription_id, 'ipd_prescription');
        $data["print_details"] = $this->printing_model->getheaderfooter('ipdpres');
        $data["result"]        = $result;

        if (isset($_POST['print'])) {
            $data["print"] = 'yes';
        } else {
            $data["print"] = 'no';
        }

        $page = $this->load->view('admin/patient/ipdprescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));

    }

    public function printIPDPrescription()
    {
        $prescription_id = $this->input->post('prescription_id');
        $result          = $this->prescription_model->getPrescriptionByTable($prescription_id, 'ipd_prescription');

        $data["print_details"] = $this->printing_model->getheaderfooter('ipdpres');
        $data["result"]        = $result;

        if (isset($_POST['print'])) {
            $data["print"] = 'yes';
        } else {
            $data["print"] = 'no';
        }

        $page = $this->load->view('admin/patient/_printIpdPrescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));

    }

    public function editPrescription($visitid)
    {
        $data['medicineCategory']  = $this->medicine_category_model->getMedicineCategory();
        $data['medicineName']      = $this->pharmacy_model->getMedicineName();
        $data['dosage']            = $this->medicine_dosage_model->getMedicineDosage();
        $result                    = $this->prescription_model->getvisit($visitid);
        $data['prescription_note'] = $this->prescription_model->prescription_note($visitid);
        $prescription_list         = $this->prescription_model->getPrescriptionByOPD($visitid);

        $data['roles']                  = $this->role_model->get();
        $pathology                      = $this->pathology_model->getPathology();
        $data['pathology']              = $pathology;
        $radiology                      = $this->radio_model->getRadiology();
        $data['radiology']              = $radiology;
        $prescription_test              = $this->prescription_model->getPrescriptiontestopd($result["presid"]);
        $data['prescription_test']      = $prescription_test;
        $pathology_list                 = $prescription_test['pathology_data'];
        $radiology_list                 = $prescription_test['radiology_data'];
        $data['prescription_pathology'] = $pathology_list;
        $data['prescription_radiology'] = $radiology_list;
        $data["result"]                 = $result;
        $data["id"]                     = $result['visit_id'];
        $data["opd_id"]                 = $result['opd_details_id'];
        $data["prescription_list"]      = $prescription_list;

        $this->load->view("admin/patient/edit_prescription", $data);
    }

    public function addipdPrescription()
    {
        $ipd_id                    = $this->input->post('ipd_id');
        $data['medicineCategory']  = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']    = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']    = $this->medicine_dosage_model->getDurationDosage();
        $data['medicineName']      = $this->pharmacy_model->getMedicineName();
        $data['dosage']            = $this->medicine_dosage_model->getMedicineDosage();
        $data['roles']             = $this->role_model->get();
        $pathology                 = $this->pathology_model->getPathology();
        $data['pathology']         = $pathology;
        $radiology                 = $this->radio_model->getRadiology();
        $data['radiology']         = $radiology;
        $data['ipd_id']            = $ipd_id;
        $findingresult             = $this->finding_model->getfindingcategory();
        $data['findingresult']     = $findingresult;
        $data['priscribe_list']    = $this->patient_model->getDoctorsipd($ipd_id);
        $consultant_doctor         = $this->patient_model->get_patientidbyIpdId($ipd_id);
        $data['consultant_doctor'] = $consultant_doctor;

        $page = $this->load->view('admin/patient/_addipdprescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));
    }

   
  


     public function addopdPrescription()
    {

         $visit_detail_id = $this->input->post('visit_detail_id');
        $data['visit_details_id'] = $this->input->post('visit_detail_id');

        $data['medicineCategory'] = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']   = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']   = $this->medicine_dosage_model->getDurationDosage();
        $data['medicineName']     = $this->pharmacy_model->getMedicineName();
        $data['dosage']           = $this->medicine_dosage_model->getMedicineDosage();
        $data['roles']            = $this->role_model->get();
        $pathology                = $this->pathology_model->getPathology();
        $data['pathology']        = $pathology;
        $radiology                = $this->radio_model->getRadiology();
        $data['radiology']        = $radiology;
        $findingresult            = $this->finding_model->getfindingcategory();
        $data['findingtype']      = $findingresult;
        $data['medicine_templates'] = $this->prescription_model->getMedTemplates();
        $complaintsresult            = $this->complaints_model->getfindingcategory();
        $data['complaintstype']      = $complaintsresult;
        $data['patient_data'] = $this->patient_model->getPatientDataByVisitID($visit_detail_id);
        
        $page                     = $this->load->view('admin/patient/_addopdprescription', $data, true); 
        echo json_encode(array('status' => 1, 'page' => $page));
    }
    public function addTemplatePrescription()
    {
        $data['medicine_type'] = $this->input->post('medicine_type');
        $data['medicineCategory'] = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']   = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']   = $this->medicine_dosage_model->getDurationDosage();
        $page                     = $this->load->view('admin/medi_template/_addtemplateprescription', $data, true); 
        echo json_encode(array('status' => 1, 'page' => $page));
    }

    public function editipdPrescription()
    {
        $prescription_id          = $this->input->post('prescription_id');
        $result                   = $this->prescription_model->getPrescriptionByTable($prescription_id, 'ipd_prescription');
        $data['medicineCategory'] = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']   = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']   = $this->medicine_dosage_model->getDurationDosage();
        $data['medicineName']     = $this->pharmacy_model->getMedicineName();
        $data['dosage']           = $this->medicine_dosage_model->getMedicineDosage();
        $data['roles']            = $this->role_model->get();
        $pathology                = $this->pathology_model->getPathology();
        $data['pathology']        = $pathology;
        $radiology                = $this->radio_model->getRadiology();
        $data['radiology']        = $radiology;
        $data["result"]           = $result;
        $data["prescription_id"]  = $prescription_id;
        $findingresult            = $this->finding_model->getfindingcategory();
        $data['findingresult']    = $findingresult;
        $priscribe_list           = $this->patient_model->getDoctorsipd($result->ipd_id);
        $doctor_name              = $result->name . " " . $result->surname . "(" . $result->employee_id . ")";

        $consultant_doctorarray[] = array('id' => $result->cons_doctor, 'name' => $doctor_name);
        foreach ($priscribe_list as $key => $value) {
            $consultant_doctorarray[] = array('id' => $value['consult_doctor'], 'name' => $value['ipd_doctorname'] . " " . $value['ipd_doctorsurname'] . "(" . $value['employee_id'] . ")");
        }
        $data['priscribe_list'] = $consultant_doctorarray;

        $page = $this->load->view('admin/patient/_editipdprescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));
    }

    public function editopdPrescription()
    {
        echo "i am here";die;
        $visit_detail_id = $this->input->post('visit_detail_id');
        $data['visit_details_id'] = $this->input->post('visit_detail_id');
        
        $prescription_id = $this->input->post('prescription_id');
        $result          = $this->prescription_model->getPrescriptionByTable($prescription_id, 'opd_prescription');
        $data['medicineCategory'] = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']   = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']   = $this->medicine_dosage_model->getDurationDosage();
        $data['medicineName']     = $this->pharmacy_model->getMedicineName();
        $data['dosage']           = $this->medicine_dosage_model->getMedicineDosage();
        $data['roles']            = $this->role_model->get();
        $pathology                = $this->pathology_model->getPathology();
        $data['pathology']        = $pathology;
        $radiology                = $this->radio_model->getRadiology();
        $data['radiology']        = $radiology;
        $data["result"]           = $result;
        $data["prescription_id"]  = $prescription_id;
        $findingresult            = $this->finding_model->getfindingcategory();
        $data['findingresult']    = $findingresult;
        
         $data['medicine_templates'] = $this->prescription_model->getMedTemplates();

        $complaintsresult            = $this->complaints_model->getfindingcategory();
        $data['complaintstype']      = $complaintsresult;

        $findingresult            = $this->finding_model->getfindingcategory();
        $data['findingtype']      = $findingresult;
        
        $data['complaints']       = json_decode($result->complaints);
        $data['disease_data']     = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');
       
        $data['patient_data'] = $this->patient_model->getPatientDataByVisitID($visit_detail_id);

        $page = $this->load->view('admin/patient/_editopdprescription', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));
    }

    public function deleteopdPrescription($prescription_id)
    {

        $this->prescription_model->deleteopdPrescription($prescription_id);
        $json = array('status' => 'success', 'error' => '', 'msg' => $this->lang->line('delete_message'));
        echo json_encode($json);
    }

    public function deleteipdPrescription($id)
    {
        if (!empty($id)) {
            $this->prescription_model->deleteipdPrescription($id);
            $json = array('status' => 'success', 'error' => '', 'msg' => $this->lang->line('delete_message'));
            echo json_encode($json);
        }
    }

    public function getPrescriptionComplaintData(){
        $id = $this->input->post('id');
        if (!empty($id)) {
            $res =  $this->master_model->get_single(array('id'=>$id),'ipd_prescription_basic');
            $json = array('status' => 'success', 'error' => '', 'msg' =>"","data"=>$res);
            echo json_encode($json);
        }
    }
    
    
    public function delete_slected_medicine()
    {
        $del_record_id = $this->input->post('del_record_id');
        $this->prescription_model->deletemedicine($del_record_id);
        $json = array('status' => 'success', 'error' => '', 'msg' => $this->lang->line('delete_message'));
        echo json_encode($json);
    }

}
