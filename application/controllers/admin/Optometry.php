<?php



if (!defined('BASEPATH')) {

    exit('No direct script access allowed');

}



class Optometry extends Admin_Controller

{



    public function __construct()

    {

       parent::__construct();



        $this->config->load("payroll");

        $this->config->load("mailsms");


        $this->load->model(array('surgeryappointment_model', 'prefix_model'));
        $this->load->model('optometry_model');

        $this->load->model('operationtheatre_model');

        $this->load->model('prescription_model');

        $this->load->library('datatables');

        $this->time_format         = $this->customlib->getHospitalTimeFormat();

        $this->opd_prefix          = $this->customlib->getSessionPrefixByType('opd_no');

        $this->search_type         = $this->config->item('search_type');

    }





    public function index()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['investigations'] = $this->master_model->get_data(array('master_type' => 'investigations'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $category_dosage            = $this->medicine_dosage_model->getCategoryDosages();

        $data['category_dosage']    = $category_dosage;

        $doctors                    = $this->staff_model->getStaffbyrole(11);

        $data["doctors"]            = $doctors;

                $data['operation_list']      = $this->operationtheatre_model->operation_list();



        $data['medicineCategory']   = $this->medicine_category_model->getMedicineCategory();

        $data['intervaldosage']  = $this->medicine_dosage_model->getIntervalDosage();

        $data['durationdosage']  = $this->medicine_dosage_model->getDurationDosage();

        $data['complaints_data'] = $this->master_model->getMasterDataLike(array('master_type' => 'optometry_complaint'),array(), 'master_data');

        // echo "<pre>";

        // print_r($data['complaints_data']);die;

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/index", $data);

        $this->load->view("layout/footer");

    }



    // public function uploadVisitFiles()

    // {

    //     // if (!$this->rbac->hasPrivilege('media_manager', 'can_add')) {

    //     //     access_denied();

    //     // }

    //     $opd = $this->input->post('opd_id');

    //     $dataInfo = array();

    //     $filenames = array();

    //     $this->load->library('upload');

    //     $config = array();

    //     if (!is_dir('uploads/visits/OPD' . $opd)) {

    //         mkdir('./uploads/visits/OPD' . $opd, 0777, true);

    //     }



    //     $config['upload_path'] = './uploads/visits/OPD' . $opd;

    //     $config['allowed_types'] = '*';

    //     $config['max_size']      = '0';

    //     $config['overwrite']     = FALSE;



    //     $files = $_FILES;

    //     $cpt = count($_FILES['visitfiles']['name']);

    //     for ($i = 0; $i < $cpt; $i++) {

    //         $_FILES['visitfiles']['name'] = str_replace(" ", "_", $_FILES["visitfiles"]['name'][$i]);

    //         $_FILES['visitfiles']['type'] = $files['visitfiles']['type'][$i];

    //         $_FILES['visitfiles']['tmp_name'] = $files['visitfiles']['tmp_name'][$i];

    //         $_FILES['visitfiles']['error'] = $files['visitfiles']['error'][$i];

    //         $_FILES['visitfiles']['size'] = $files['visitfiles']['size'][$i];

    //         //$this->load->library('upload', $config);

    //         $config['file_name'] = $_FILES['visitfiles']['name'];

    //         $this->upload->initialize($config);

    //         $res = $this->upload->do_upload('visitfiles');

    //         $data = $this->upload->data();

    //         array_push($filenames, $config['file_name']);

    //     }



    //     $res = $this->master_model->get_single(array('id' => $opd), 'opd_details');



    //     if (json_decode($res->files, true)) {

    //         $existedFiles = json_decode($res->files, true);

    //         $filenames = array_merge($filenames, $existedFiles);

    //     }

    //     $filesData = array(

    //         'files' => json_encode($filenames)

    //     );

    //     $response = $this->master_model->update_data($filesData, array('id' => $opd), 'opd_details');

    //     if ($response) {

    //         $resdata = array('flag' => 1, 'Successfully uploaded images');

    //     } else {

    //         $resdata = array('flag' => 0, 'Failed ...');

    //     }

    //     echo json_encode($resdata);

    // }

    

        public function uploadVisitFiles()

    {

        // if (!$this->rbac->hasPrivilege('media_manager', 'can_add')) {

        //     access_denied();

        // }

        $opd = $this->input->post('opd_id');

        $dataInfo = array();

        $filenames = array();

        $this->load->library('upload');

        $config = array();

        if (!is_dir('uploads/visits/OPD' . $opd)) {

            mkdir('./uploads/visits/OPD' . $opd, 0777, true);

        }



        $config['upload_path'] = './uploads/visits/OPD' . $opd;

        $config['allowed_types'] = '*';

        $config['max_size']      = '0';

        $config['overwrite']     = FALSE;



        $files = $_FILES;

        $cpt = count($_FILES['visitfiles']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['visitfiles']['name'] = str_replace(" ", "_", $_FILES["visitfiles"]['name'][$i]);

            $_FILES['visitfiles']['type'] = $files['visitfiles']['type'][$i];

            $_FILES['visitfiles']['tmp_name'] = $files['visitfiles']['tmp_name'][$i];

            $_FILES['visitfiles']['error'] = $files['visitfiles']['error'][$i];

            $_FILES['visitfiles']['size'] = $files['visitfiles']['size'][$i];

            //$this->load->library('upload', $config);

            $config['file_name'] = $_FILES['visitfiles']['name'];

            $this->upload->initialize($config);

            $res = $this->upload->do_upload('visitfiles');

            $data = $this->upload->data();

            array_push($filenames, $config['file_name']);

        }



        $res = $this->master_model->get_single(array('id' => $opd), 'opd_details');



        if (json_decode($res->files, true)) {

            $existedFiles = json_decode($res->files, true);

            $filenames = array_merge($filenames, $existedFiles);

        }

        $filesData = array(

            'files' => json_encode($filenames)

        );

        $response = $this->master_model->update_data($filesData, array('id' => $opd), 'opd_details');

        if ($response) {

            $resdata = array('flag' => 1, 'Successfully uploaded images');

        } else {

            $resdata = array('flag' => 0, 'Failed ...');

        }

        echo json_encode($resdata);

    }





    public function getVisitFiles()

    {

        $rows = $this->master_model->get_num_rows(array('id' => $this->input->post('opd_id')), 'opd_details');

        if ($rows > 0) {

            $res = $this->master_model->get_single(array('id' => $this->input->post('opd_id')), 'opd_details');

            $data = json_decode($res->files, true);

            $html = array();

            foreach ($data as $key => $value) {

                $html[] = $this->genrateDiv($value, $this->input->post('opd_id'));

            }

            $resdata = array('flag' => 1, 'msg' => 'success', 'data' => $html);

        }else{

            $html = "<div class='col-md-12'>No Files Found.</div>";

            $resdata = array('flag' => 1, 'msg' => 'success', 'data' => $html);

        }





        // if ($data) {

        //     $resdata = array('flag' => 1, 'msg' => 'success', 'data' => $html);

        // } else {

        //     $resdata = array('flag' => 0, 'msg' => 'failed', 'data' => null);

        // }

        echo json_encode($resdata, $this->input->post('opd_id'));

    }

    public function genrateDiv($result, $opd)

    {

        $path = base_url() . "uploads/visits/OPD" . $opd . "/";



        $output = '';

        $output .= "<div class='col-sm-3 col-md-2 col-xs-6 img_div_modal image_div div_record_" . $opd . "'>";

        $output .= "<div class='fadeoverlay'>";

        $output .= "<div class='fadeheight'>";

        $output .= "<img class='' data-fid='" . $result . "' data-content_type='" . $result . "' data-content_name='" . $result . "' data-is_image='" . $result . "' data-vid_url='" . $result . "' data-img='" . base_url() . $result . $result . "' src='" . $path . $result . "'>";

        $output .= "</div>";

        $output .= "<div class='overlay3'>";

        if ($this->rbac->hasPrivilege('media_manager', 'can_view')) {

            $output .= "<a href='#'  class='uploadcheckbtn visitImageView' data-record_id='" . $result . "' data-opd='" . $opd . "'><i class='fa fa-eye' aria-hidden='true'></i></a>";

        }

        if ($this->rbac->hasPrivilege('media_manager', 'can_delete')) {

            $output .= "<a href='#' class='uploadcheckbtn delete_visit_image' data-opd='" . $opd . "' data-record_id='" . $result . "' '><i class=' fa fa-trash-o'></i></a>";

        }



        $output .= "<p class='processing'>Processing...</p>";

        $output .= "</div>";



        $output .= "</div>";

        $output .= "</div>";

        return $output;

    }





    public function deleteImage()

    {

        $image = $this->input->post('record_id');

        $opd = $this->input->post('opd_id');

        $res = $this->master_model->get_single(array('id' => $opd), 'opd_details');

        $images = json_decode($res->files, true);

        if (in_array($image, $images)) {

            if (($key = array_search($image, $images)) !== false) {

                unset($images[$key]);

                $data = array(

                    'files' => json_encode($images)

                );

                $this->master_model->update_data($data, array('id' => $opd), 'opd_details');

                if (file_exists(FCPATH . "uploads/visits/OPD" . $opd . "/" . $image)) {

                    unlink(FCPATH . "uploads/visits/OPD" . $opd . "/" . $image);

                    $resdata = array('flag' => 1, 'msg' => 'File is Deleted..!');

                } else {

                    $resdata = array('flag' => 0, 'msg' => 'File is not Found..!');

                }

            }

        } else {

            $resdata = array('flag' => 0, 'msg' => 'File is not dfdsfdsf Found..!');

        }

        echo json_encode($resdata);

    }





    public function savePrintSettings()

    {

        $optoid = $this->input->post('opto_id');

        $printkey = $this->input->post('print_key');

        $printval = $this->input->post('print_val');



        $res = $this->master_model->get_single(array('id' => $optoid), 'optometry');

        $print = array();

        if (empty($res->print_data)) {

            $print[$printkey] = $printval;

        } else {

            $print_data = json_decode($res->print_data, true);

            

            if (array_key_exists($printkey, $print_data)) {

                $print_data[$printkey] = $printval;

            } else {

                $print_data[$printkey] = $printval;

            }

            $print = $print_data;

        }

        $data = array(

            'print_data' => json_encode($print)

        );

        

        $response = $this->master_model->update_data($data, array('id' => $optoid), 'optometry');

        if ($response) {

            $resdata = array('flag' => 1, 'msg' => 'Updated print settings');

        } else {

            $resdata = array('flag' => 0, 'msg' => 'Failed..');

        }



         echo json_encode($resdata);

    }





    public function optometry()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = '';

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/index", $data);

        $this->load->view("layout/footer");

    }



    public function optometryVisitsold($id)

    {



        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');

        $data['patient_data'] = $this->master_model->get_single(array('id' => $id), 'patients');

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['master_data'] = $this->master_model->get_data(array('master_type' => 'optometry_complaints'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/visits", $data);

        $this->load->view("layout/footer");

    }



    public function optometryVisits($id){

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');

        $data['patient_data'] = $this->master_model->get_single(array('id' => $id), 'patients');

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['master_data'] = $this->master_model->get_data(array('master_type' => 'optometry_complaints'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $data['patient_id']=$id;

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/visits", $data);

        $this->load->view("layout/footer");

    }





    public function getOptometryPatientVisitsDatatable($patientid)

    {

        $dt_response = $this->optometry_model->get_optometry_patient_visits_datatable($patientid);

        $dt_response = json_decode($dt_response);

        $dt_data     = array();

        if (!empty($dt_response->data)) {

            foreach ($dt_response->data as $key => $value) {

                $row = array();

                //====================================

                $opd_id           = $value->opd_id;

                $visit_details_id = $value->visit_id;

                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

                $action = "<div class=''>";

                if ($optom) {

                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";

                } else {

                    $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('emr') . "'><i class='fas fa fa-plus'></i></a>";

                }



                $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadVisitImages' data-opd=" . $opd_id . "  data-toggle='tooltip' title='Upload Images'><i class='fa fa-upload' aria-hidden='true'></i></a>";



                $action .= "</div>";

                $first_action = "<a href=" . base_url() . 'admin/patient/visitdetails/' . $value->pid . '/' . $opd_id . ">";



                //==============================

                $row[] = $first_action . "OPDN" . $opd_id . "</a>";

                $row[] = $value->case_reference_id;

                $row[] = $value->name;

                $row[] = $value->optometrist;

                $row[] = nl2br($value->symptoms);

                $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->appointment_date, $this->time_format);

                $row[]     = $action;

                $dt_data[] = $row;

            }

        }

        $json_data = array(

            "draw"            => intval($dt_response->draw),

            "recordsTotal"    => intval($dt_response->recordsTotal),

            "recordsFiltered" => intval($dt_response->recordsFiltered),

            "data"            => $dt_data,

        );

        echo json_encode($json_data);

    }





    public function counselling()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'counselling');



        $data = '';

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/index", $data);

        $this->load->view("layout/footer");

    }



    public function addOptimetryData()

    {

        // echo "<pre>";

        // print_r($_POST);die;

        $post_data = $this->input->post();

        $pgp = array();

        $lac = array();

        $gon = array();

        $ocu = array();

        $vision = array();

        $dry_retinoscopy = array();

        $cyclo = array();

        $acceptance = array();

        $ant_segment = array();

        $nct = array();

        $at = array();

        $cvt = array();

        $lcva = array();

        $ker = array();

        $sch = array();

        $top = array();

        $pac = array();

        $sta = array();

        $eye = array();

        $gaz = array();

        $eyes = array();

        $post_segment = array();

        foreach ($post_data as $key => $val) {

            if (strpos($key, 'pgp_') !== false) {

                if ($val) {

                    $pgp[$key] = $val;

                } else {

                    $pgp[$key] = "";

                }

            }

            if (strpos($key, 'lac_') !== false) {

                if ($val) {

                    $lac[$key] = $val;

                } else {

                    $lac[$key] = "";

                }

            }

            if (strpos($key, 'gon_') !== false) {

                if ($val) {

                    $gon[$key] = $val;

                } else {

                    $gon[$key] = "";

                }

            }

            if (strpos($key, 'ocu_') !== false) {

                if ($val) {

                    $ocu[$key] = $val;

                } else {

                    $ocu[$key] = "";

                }

            }

            if (strpos($key, 'vision_') !== false) {

                if ($val) {

                    $vision[$key] = $val;

                } else {

                    $vision[$key] = "";

                }

            }

            if (strpos($key, 'drs_') !== false) {

                if ($val) {

                    $dry_retinoscopy[$key] = $val;

                } else {

                    $dry_retinoscopy[$key] = "";

                }

            }

            if (strpos($key, 'cyclo_') !== false) {

                if ($val) {

                    $cyclo[$key] = $val;

                } else {

                    $cyclo[$key] = "";

                }

            }

            if (strpos($key, 'accp_') !== false) {

                if ($val) {

                    $acceptance[$key] = $val;

                } else {

                    $acceptance[$key] = "";

                }

            }

            if (strpos($key, 'as_') !== false) {

                $ant_segment[$key] = $val;

            }

            if (strpos($key, 'nt_') !== false) {

                $nct[$key] = $val;

            }

            if (strpos($key, 'at_') !== false) {

                $at[$key] = $val;

            }

            if (strpos($key, 'cvt_') !== false) {

                $cvt[$key] = $val;

            }

            if (strpos($key, 'lcva_') !== false) {

                $lcva[$key] = $val;

            }

            if (strpos($key, 'ker_') !== false) {

                $ker[$key] = $val;

            }

            if (strpos($key, 'sch_') !== false) {

                $sch[$key] = $val;

            }

            if (strpos($key, 'top_') !== false) {

                $top[$key] = $val;

            }

            if (strpos($key, 'pac_') !== false) {

                $pac[$key] = $val;

            }

            if (strpos($key, 'gaz_') !== false) {

                $gaz[$key] = $val;

            }

            if (strpos($key, 'eyes_') !== false) {

                $eyes[$key] = $val;

            }

            if (strpos($key, 'sta_') !== false) {

                $sta[$key] = $val;

            }

            if (strpos($key, 'eye_') !== false) {

                $eye[$key] = $val;

            }

            if (strpos($key, 'ps_') !== false) {

                if ($val) {

                    $post_segment[$key] = $val;

                } else {

                    $post_segment[$key] = "";

                }

            }

            

        }

        // $lacrimal = array();

        // foreach ($post_data['wat'] as $key => $val) {

        //     $lacrimal[$key]['wat'] = $val;

        // }

        // foreach ($post_data['reg'] as $key => $val) {

        //     $lacrimal[$key]['reg'] = $val;

        // }

        // foreach ($post_data['dis'] as $key => $val) {

        //     $lacrimal[$key]['dis'] = $val;

        // }

        // foreach ($post_data['syr'] as $key => $val) {

        //     $lacrimal[$key]['syr'] = $val;

        // }



        $history = array();

        if(isset($post_data['disease']))

        {

           foreach ($post_data['disease'] as $key => $val) {

                $history[$key]['disease'] = $val;

            } 

        }

        

        if(isset($post_data['duration']))

        {

            foreach ($post_data['duration'] as $key => $val) {

                $history[$key]['duration'] = $val;

            }

        }

        

        if(isset($post_data['period']))

        {

           foreach ($post_data['period'] as $key => $val) {

                $history[$key]['period'] = $val;

            } 

        }

        

        if(isset($post_data['medication']))

        {

            foreach ($post_data['medication'] as $key => $val) {

                $history[$key]['medication'] = $val;

            }

        }

        

        if(isset($post_data['condition']))

        {

            foreach ($post_data['condition'] as $key => $val) {

                $history[$key]['condition'] = $val;

            }

        }

        

        //complaints

        $complaints = array();

        // print_r($post_data['complaints']);die;

        foreach ($post_data['complaints'] as $key => $val) {

            if(!empty($val))

            {

              $complaints[$key]['complaints'] = $val;    

            }

            

        }

        foreach ($post_data['complaints_duration'] as $key => $val) {

            if(!empty($val))

            {

              $complaints[$key]['complaints_duration'] = $val;    

            }

            

        }

        foreach ($post_data['complaints_period'] as $key => $val) {

            if(!empty($val))

            {

              $complaints[$key]['complaints_period'] = $val;    

            }

            

        }

        foreach ($post_data['complaints_type'] as $key => $val) {

            if(!empty($val))

            {

              $complaints[$key]['complaints_type'] = $val;    

            }

            

        }



        //Diagnosis

        $diagnosis = array();

        if(isset($post_data['diagnosis_od']))

        {

           foreach ($post_data['diagnosis_od'] as $key => $val) {

                $diagnosis[$key]['diagnosis_od'] = $val;

            } 

        }

        

        if(isset($post_data['diagnosis_fin_pro']))

        {

           foreach ($post_data['diagnosis_fin_pro'] as $key => $val) {

                $diagnosis[$key]['diagnosis_fin_pro'] = $val;

            } 

        }

        

        if(isset($post_data['diagnosis_od_os']))

        {

            foreach ($post_data['diagnosis_od_os'] as $key => $val) {

                $diagnosis[$key]['diagnosis_od_os'] = $val;

            }

        }

        $role=getLoginUserRole();



        if (!empty($this->input->post('optometry_id'))) {

            $data = array(

                'history_data' => json_encode($history),

                'pgp_data' => json_encode($pgp),

                'lac_data' => json_encode($lac),

                'gon_data' => json_encode($gon),

                'ocu_data' => json_encode($ocu),

                'vision_data' => json_encode($vision),

                'dryretinoscopy_data' => json_encode($dry_retinoscopy),

                'antsegment_data' => json_encode($ant_segment),

                'nct_data' => json_encode($nct),

                'at_data' => json_encode($at),

                'cvt_data' => json_encode($cvt),

                'lcva_data' => json_encode($lcva),

                'ker_data' => json_encode($ker),

                'sch_data' => json_encode($sch),

                'top_data' => json_encode($top),

                'pac_data' => json_encode($pac),

                'eye_data' => json_encode($eye),

                'sta_data' => json_encode($sta),

                'gaz_data' => json_encode($gaz),

                'eyes_data' => json_encode($eyes),

                'cyclo_data' => json_encode($cyclo),

                'postsegment_data' => json_encode($post_segment),

                'diagnosis_data' => json_encode($diagnosis),

                'acceptance_data' => json_encode($acceptance),

                'optometric_comments' => $this->input->post('optometric_comments'),

                'doctor_notes' => $this->input->post('doctor_notes'),
                
                'optom_notes' => $this->input->post('optom_notes'),

                'inv' => $this->input->post('inv'),

                'pre' => $this->input->post('pre'),

                'orbit' => $this->input->post('orbit'),

                'staff_id'=>$this->input->post('optometrist_doctor'),

                'complaints_data' =>  json_encode($complaints),

                'surgery_recommendations'=>$this->input->post('surgery_recommendations'),

                'surgery_eye_type'=>$this->input->post('surgery_eye_type'),

                



            );

            

            if(isset($role) && $role!=null){

              if(in_array($role,[7,3])){

                $date=$this->input->post('doctor_time');

                $data['dcot_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;     

              } 

              if(in_array($role,[7,11])){

                $date=$this->input->post('optometrist_time');

                $data['optometrist_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;

              } 

             

            }

            

             $date=$this->input->post('ar_time');

              $data['ar_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;   

            

            

            // echo "<pre>";

            // print_r($data);die;

         

            $res =  $this->master_model->update_data($data, array('id' => $this->input->post('optometry_id')), 'optometry');

            $status = "Updated";

        } else {

            $data = array(

                'opd_id' => $this->input->post('opd_id'),

                'patient_id' => $this->input->post('patient_id'),

                'history_data' => json_encode($history),

                'pgp_data' => json_encode($pgp),

                'lac_data' => json_encode($lac),

                'gon_data' => json_encode($gon),

                'ocu_data' => json_encode($ocu),

                'vision_data' => json_encode($vision),

                'cyclo_data' => json_encode($cyclo),

                'dryretinoscopy_data' => json_encode($dry_retinoscopy),

                'antsegment_data' => json_encode($ant_segment),

                'nct_data' => json_encode($nct),

                'at_data' => json_encode($at),

                'cvt_data' => json_encode($cvt),

                'lcva_data' => json_encode($lcva),

                'ker_data' => json_encode($ker),

                'sch_data' => json_encode($sch),

                'top_data' => json_encode($top),

                'pac_data' => json_encode($pac),

                'eye_data' => json_encode($eye),

                'sta_data' => json_encode($sta),

                'gaz_data' => json_encode($gaz),

                'eyes_data' => json_encode($eyes),

                'postsegment_data' => json_encode($post_segment),

                'diagnosis_data' => json_encode($diagnosis),

                'acceptance_data' => json_encode($acceptance),

                'optometric_comments' => $this->input->post('optometric_comments'),

                'doctor_notes' => $this->input->post('doctor_notes'),
                'optom_notes' => $this->input->post('optom_notes'),

                'orbit' => $this->input->post('orbit'),

                'inv' => $this->input->post('inv'),

                'pre' => $this->input->post('pre'),

                'staff_id'=>$this->input->post('optometrist_doctor'),

                'complaints_data' => json_encode($complaints),

                 'dcot_time'=>$this->input->post('doctor_time'),

                'optometrist_time'=>$this->input->post('optometrist_time'),

                'ar_time'=>$this->input->post('ar_time'),

                'surgery_recommendations'=>$this->input->post('surgery_recommendations'),

                'surgery_eye_type'=>$this->input->post('surgery_eye_type'),



            );



            if(isset($role) && $role!=null){

              if(in_array($role,[7,3])){

                $date=$this->input->post('doctor_time');

                $data['dcot_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;     

                

                

              } 

              if(in_array($role,[7,11])){

                $date=$this->input->post('optometrist_time');

                $data['optometrist_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;

                

               

              }    

            }

              $date=$this->input->post('ar_time');

                $data['ar_time']=($date!='')?date('Y-m-d H:i:A',strtotime($date)):NULL;  

            

                

            //     echo "<pre>";

            // print_r($data);die;

         

            // var_dump($data);die;

            $res =  $this->master_model->insert_data($data, 'optometry');

            $status = "Added";

        }

        if ($res) {

            $resdata = array('flag' => 1, 'msg' => $status . " Successfully");

        } else {

            $resdata = array('flag' => 0, 'msg' => "Something went Wrong ..!");

        }

        echo json_encode($resdata);

    }



    public function getOptimetryData($id)

    {

        

        $data = $this->master_model->get_single(array('id' => $id), 'optometry');

        // echo "<pre>";

       

        $data->patient_data = $this->master_model->get_single(array('id' => $data->patient_id), 'patients');
        $data->surgery_data = $this->master_model->get_single(array('opd_id' => $data->opd_id), 'sugeries');

        

        $data->patient_data = $data->patient_data;

      

        $data->pgp_data = json_decode($data->pgp_data);

        //   echo "<pre>";

        // print_r($data->pgp_data);die;

        $data->lac_data = json_decode($data->lac_data);

        $data->gon_data = json_decode($data->gon_data);

        $data->ocu_data = json_decode($data->ocu_data);

        $data->vision_data = json_decode($data->vision_data);

        $data->dryretinoscopy_data = json_decode($data->dryretinoscopy_data);

        $data->cyclo_data = json_decode($data->cyclo_data);

        $data->acceptance_data = json_decode($data->acceptance_data);

        $data->antsegment_data = json_decode($data->antsegment_data);

        $data->nct_data = json_decode($data->nct_data);

        $data->at_data = json_decode($data->at_data);

        $data->cvt_data = json_decode($data->cvt_data);

        $data->lcva_data = json_decode($data->lcva_data);

        $data->ker_data = json_decode($data->ker_data);

        $data->sch_data = json_decode($data->sch_data);

        $data->top_data = json_decode($data->top_data);

        $data->pac_data = json_decode($data->pac_data);

        $data->gaz_data = json_decode($data->gaz_data);

        $data->eye_data = json_decode($data->eye_data);

        $data->sta_data = json_decode($data->sta_data);

        $data->eyes_data = json_decode($data->eyes_data);

        $data->postsegment_data = json_decode($data->postsegment_data);

        $data->diagnosis_data = json_decode($data->diagnosis_data);

        $data->history_data = json_decode($data->history_data);

        $data->print_data = json_decode($data->print_data);

        $data->optometric_comments = $data->optometric_comments;

         $data->doctor_notes = $data->doctor_notes;
         
          $data->optom_notes = $data->optom_notes;

        $data->orbit = $data->orbit;

        $data->inv = $data->inv;

        $data->pre = $data->pre;

        $data->surgery_recommendations = $data->surgery_recommendations;

        $data->surgery_eye_type = $data->surgery_eye_type;



        

        

         $data->staff_id = $data->staff_id;

        $data->staff=$this->staff_model->get($data->staff_id);

        

        $data->complaints_data = json_decode($data->complaints_data);

         $data->optometrist_time = $data->optometrist_time;

        $data->dcot_time = $data->dcot_time;

        $data->ar_time = $data->ar_time;

 

        $role=getLoginUserRole();

        

        // if(isset($role) && $role!=null)

        // {

        //   if(in_array($role,[7,3]))

        //   {

        //     $data->dcot_time =($data->dcot_time==NULL) ?'':date('d-m-Y H:i:A',strtotime($data->dcot_time));

        //   }  

        //   if(in_array($role,[7,11]))

        //   {

        //     $data->optometrist_time =($data->optometrist_time==NULl)?'':date('d-m-Y H:i:A',strtotime($data->optometrist_time));

            

        //      $data->ar_time =($data->ar_time==NULl)?'':date('d-m-Y H:i:A',strtotime($data->ar_time));

        //   }

        // }

        

       

        $resdata = array('flag' => 1, 'msg' => "", 'data' => $data);

        echo json_encode($resdata);

    }





    public function getOptometryOptionsData()

    {

        $json = file_get_contents('backend/json-files/optometry.json');

        $json_data = json_decode($json);

        return $json_data;

    }





    public function add_master_data()

    {



        $master_key = strtolower($this->input->post('master_value'));

        $master_type = '';

        if ($this->input->post('type') == "complaint") {

            $master_type = "optometry_complaint";

        } elseif ($this->input->post('type') == "disease") {

            $master_type = "optometry_disease";

        } else {

        }

        $data = array(

            'master_type' => $master_type,

            'master_value' => $this->input->post('master_value'),

            'master_key' => str_replace(" ", " ", $master_key),

        );



        $result  = $this->master_model->insert_data($data, 'master_data');

        if ($result) {

            $resultdata = array('flag' => 1, 'msg' => 'Added Successfully', 'data' => null);

        } else {

            $resultdata = array('flag' => 0, 'msg' => 'Something went wrong.!', 'data' => null);

        }

        echo json_encode($resultdata);

    }





    public function get_disease_data()

    {



        $result  = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        if ($result) {

            $resultdata = array('flag' => 1, 'msg' => '', 'data' => $result);

        } else {

            $resultdata = array('flag' => 0, 'msg' => 'Something went wrong.!', 'data' => null);

        }

        echo json_encode($resultdata);

    }



    



    public function printemr()

    {

		$id                   = $this->input->post('opd_id');

		$visitid              = $this->input->post('visitid');

        $visit_data           = $this->prescription_model->getPrescriptionByVisitID($visitid);

        $data["visit_data"]   = $visit_data;

        $optomery_data 		  = $this->master_model->get_single(array('id' => $id), 'optometry');

       

		

		$optomery_data->pgp_data = json_decode($optomery_data->pgp_data);

		$optomery_data->gon_data = json_decode($optomery_data->gon_data);

		$optomery_data->ocu_data = json_decode($optomery_data->ocu_data);

        $optomery_data->vision_data = json_decode($optomery_data->vision_data);

        $optomery_data->dryretinoscopy_data = json_decode($optomery_data->dryretinoscopy_data);

        $optomery_data->cyclo_data = json_decode($optomery_data->cyclo_data);

        $optomery_data->acceptance_data = json_decode($optomery_data->acceptance_data);

        $optomery_data->antsegment_data = json_decode($optomery_data->antsegment_data);

        $optomery_data->nct_data = json_decode($optomery_data->nct_data);

        $optomery_data->at_data = json_decode($optomery_data->at_data);

        $optomery_data->cvt_data = json_decode($optomery_data->cvt_data);

        $optomery_data->lcva_data = json_decode($optomery_data->lcva_data);

        $optomery_data->ker_data = json_decode($optomery_data->ker_data);

        $optomery_data->lac_data = json_decode($optomery_data->lac_data);

        $optomery_data->sch_data = json_decode($optomery_data->sch_data);

        $optomery_data->top_data = json_decode($optomery_data->top_data);

        $optomery_data->pac_data = json_decode($optomery_data->pac_data);

        $optomery_data->eye_data = json_decode($optomery_data->eye_data);

        $optomery_data->sta_data = json_decode($optomery_data->sta_data);

        $optomery_data->gaz_data = json_decode($optomery_data->gaz_data);

         $optomery_data->eyes_data = json_decode($optomery_data->eyes_data);

        $optomery_data->postsegment_data = json_decode($optomery_data->postsegment_data);

        $optomery_data->diagnosis_data = json_decode($optomery_data->diagnosis_data);

        $optomery_data->optometric_comments = $optomery_data->optometric_comments;

        $optomery_data->doctor_notes = $optomery_data->doctor_notes;
    $optomery_data->optom_notes = $optomery_data->optom_notes;

        $optomery_data->orbit = $optomery_data->orbit;

        $optomery_data->inv = $optomery_data->inv;

        $optomery_data->pre = $optomery_data->pre;

        $optomery_data->history_data = json_decode($optomery_data->history_data);

        $optomery_data->print_data = json_decode($optomery_data->print_data);

        $optomery_data->complaints_data = json_decode($optomery_data->complaints_data);

		

        $opddata                  = $this->patient_model->getVisitDetailsbyopdid($optomery_data->opd_id);



		$data['optomery_data']	  = $optomery_data;

        $data['blood_group_name'] = $opddata['blood_group_name'];

        $data["print_details"]    = $this->printing_model->get('', 'opd');

        $data["result"]           = $opddata;

        $data['opd_prefix']       = $this->customlib->getSessionPrefixByType('opd_no');

        $data['checkup_prefix']   = $this->customlib->getSessionPrefixByType('checkup_id');

		



		

        if (!empty($opddata)) {

            $patient_charge_id = $opddata['patient_charge_id'];

            $charge            = $this->charge_model->getChargeById($patient_charge_id);

            $data['charge']    = $charge;

            if (!empty($opddata['transaction_id'])) {

                $transaction         = $this->transaction_model->getTransaction($opddata['transaction_id']);

                $data['transaction'] = $transaction;



            }

        }

// 		echo "<pre>";

// 		print_r($data);die;

		

        $page = $this->load->view('admin/optometry/_printemr', $data, true);

        echo json_encode(array('status' => 1, 'page' => $page));



    }



//Added by chitranjan



//     public function getOptometryPatientsDataTable()

//     {

//         //$dt_response = $this->optometry_model->get_optometry_patients_datatable();

//         $dt_response = $this->patient_model->getLatestopdvisitRecord();

//         $dt_response = json_decode($dt_response);

//         $dt_data     = array();



// // echo "<pre>";

// // print_r($dt_response);die;

//         $total_patient=0;

//         $waiting_ar=0;

//         $waiting_op=0;

//         $waiting_dr=0;



//         $completed_ar=0;

//         $completed_op=0;

//         $completed_dr=0;

        

//         $i=1;



//         if (!empty($dt_response->data)) {

//             foreach ($dt_response->data as $key => $value) {

//                 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

//                 $current_time = date('d-m-Y H:i:s');

//                 $last_visit = $value->last_visit;

                

                

//                 $start_datetime = new DateTime($last_visit); 

//                 $diff = $start_datetime->diff(new DateTime($current_time)); 

 



//                 $hours =  $diff->h.' hr'; 

//                 $min =  $diff->i.' min<br>'; 

//                 if(!empty($hours) && $hours != 0 || !empty($min) && $min != 0 )

//                 {

//                     if(!empty($min) && $min != 0 )

//                     {

//                          $time_slape = $hours.' '.$min;

//                     }

//                     else

//                     {

//                          $time_slape = $hours;

//                     }

                    

//                 }elseif(!empty($min) && $min != 0 || !empty($min) && $min != 0 )

//                 {

//                      if(!empty($hours) && $hours != 0 )

//                     {

//                          $time_slape = $hours.' '.$min;

//                     }

//                     else

//                     {

//                          $time_slape = $min;

//                     }

//                 }

               

//                 else

//                 {

//                     $time_slape = '';

//                 }

               

                

//                 // print_r($this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format));die;

//                 $row = array();

//                 $opd_id           = $value->opdid;

//                 $visit_details_id = $value->visit_id;

//                 $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

//                 if ($check->num_rows() > 0) {

//                     $result[$key]['prescription'] = 'yes';

//                 } else {

//                     $result[$key]['prescription'] = 'no';

//                     $userdata                     = $this->customlib->getUserData();

//                     if ($this->session->has_userdata('hospitaladmin')) {

//                         $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

//                         if ($doctor_restriction == 'enabled') {

//                             if ($userdata["role_id"] == 3) {

//                                 if ($userdata["id"] == $value->staff_id) {

//                                 } else {

//                                     $result[$key]['prescription'] = 'not_applicable';

//                                 }

//                             }

//                         }

//                     }

//                 }

//                 $patient_id       = $value->patientid;

              

//                 $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

//                 $action = "<div class=''>";

//                 // $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadAudiometryImages' data-opd=" . $opd_id . "   data-toggle='tooltip' title='Upload Audiometry Photos'><i class='fa fa-upload'></i></a>";

//                 if ($optom) {

//                     $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";

//                 } else {

//                     $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . "," .$patient_id. ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='Add EMR'><i class='fas fa fa-plus'></i></a>";

//                 }

//                 $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadVisitImages' data-opd=" . $opd_id . "  data-toggle='tooltip' title='Upload Images'><i class='fa fa-upload' aria-hidden='true'></i></a>";

//                 if ($result[$key]['prescription'] == 'no') {

//                     if ($this->rbac->hasPrivilege('prescription', 'can_add')) {

//                         $action .= "<a href='#' onclick='getRecord_id(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('add_prescription') . "'><i class='fas fa-prescription'></i></a>";

//                     }

//                 } elseif ($result[$key]['prescription'] == 'yes') {

//                     if ($this->rbac->hasPrivilege('prescription', 'can_view')) {

//                         $action .= "<a href='#' onclick='view_prescription(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('view_prescription') . "'><i class='fas fa-file-prescription'></i></a>";

//                     }

//                 }

//                 $status_html='';

              

//                 $a=(isset($value->optometrist_time) && $value->optometrist_time!='')?'background-color:green;':'';

//                 $b=(isset($value->dcot_time) && $value->dcot_time!='')?'background-color:blue;':'';

//                 $c=(isset($value->ar_time) && $value->ar_time!='')?'background-color:orange;':'';

//                     //$c=$a+$b;

//                     $lbl=($a>0)?'Optometrist '.$value->optometrist_time:'';

//                     $lbl.=($c>0)?'AR '.$value->ar_time:'';

//                     $lbl=($a>0 && $b>0 && $c)?$lbl.'|':$lbl;

//                     $lbl.=($b>0)?' Docotor '.$value->dcot_time:'';

             

//                 // $waiting_ar=0;

                

//                  if(isset($value->ar_time) && $value->ar_time!=''){

//                     $completed_ar=$completed_ar+1;

//                 }

//                 else

//                 {

//                     $waiting_ar=$waiting_ar+1;

//                 }

                

//                 if(isset($value->optometrist_time) && $value->optometrist_time!=''){

//                     $completed_op=$completed_op+1;

//                 }

//                 else

//                 {

//                     $waiting_op=$waiting_op+1;

//                 }



//                 if(isset($value->dcot_time) && $value->dcot_time!=''){

//                     $completed_dr=$completed_dr+1;

//                 }

//                 else

//                 {

//                     $waiting_dr=$waiting_dr+1;

//                 }

               

//                 // $completed_ar=0;

                  



//                 $status_html='<div class="d-flex justify-content-around">

//                 <a  data-toggle="tooltip"  title="AR">

//                       <div class="progress"><div class="div_red status_div" style="'.$c.'"></div></div>

//                     </a>

//                     <a  data-toggle="tooltip"  title="Optometrist">

//                       <div class="progress"><div class="div_red status_div" style="'.$a.'"></div></div>

//                     </a>

//                     <a  data-toggle="tooltip" title="Docotor">

//                       <div class="progress"><div class="div_red status_div" style="'.$b.'"></div></div>

//                     </a>

//                 </div>';

//                 //$timer_html='<a><span class="glyphicon glyphicon-time" aria-hidden="true"></span><a>';

//                 $timer_html='<div class="d-flex justify-content-around d-flex align-items-center">

//                                 <div class="" id="counter_div_'.$value->opdid.'">00:00</div>&nbsp;

//                                   <button data-id="'.$value->opdid.'" id="timer_btn_'.$value->opdid.'" class="time_btn btn btn-sm btn-primary">Start</button>

//                                 </div>';

//                 $action .= "</div'>";

                

//                 $patientimage = $value->image;

//                 $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

             

//                 $sec = "<a href='" . base_url() . $patientimage . "' data-lightbox='patient-image'>";

                

//                 //  $row[] = "<input type='checkbox' class='check' name='opdids[]' value='".$value->opdid."' id='' >";

//                 $row[] = $first_action . $value->patient_name .'('.$value->patientid.')'. "</a>";

//                 $row[] =  $sec ."<img src='" . base_url() . $patientimage . "' alt='Patient Image' width='25' height='25'>"."</a>";

//                 $row[] = $this->opd_prefix . $value->opdid;

//                 $row[] = $value->guardian_name;

//                 $row[] = $status_html;

//                 $row[] = $value->gender;

//                 $row[] = $value->phone;

//                 $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

//                 $row[] = $value->charge_name;

//                 // $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format);

//                 $row[]  = $time_slape;

//                 $row[]  = $timer_html;

//                 $row[]     = $action;

//                 $dt_data[] = $row;



//                 $i++;

//                 $total_patient=$total_patient+1;

//             }

//         }



//         $count_data=[

//         'total_patient'=>$total_patient,

//         'waiting_ar'=>$waiting_ar,

//         'waiting_op'=>$waiting_op,

//         'waiting_dr'=>$waiting_dr,



//         'completed_ar'=>$completed_ar,

//         'completed_op'=>$completed_op,

//         'completed_dr'=>$completed_dr,

//         ];

//         $json_data = array(

//             "draw"            => intval($dt_response->draw),

//             "recordsTotal"    => intval($dt_response->recordsTotal),

//             "recordsFiltered" => intval($dt_response->recordsFiltered),

//             "data"            => $dt_data,

//             'count_data'=>$count_data

//         );

//         echo json_encode($json_data);

//     }



 public function getOptometryPatientsDataTable()
    {
        //$dt_response = $this->optometry_model->get_optometry_patients_datatable();
        $dt_response = $this->patient_model->getLatestopdvisitRecord();
        $dt_response = json_decode($dt_response);
        $dt_data     = array();

// echo "<pre>";
// print_r($dt_response);die;
        $total_patient=0;
        $waiting_ar=0;
        $waiting_op=0;
        $waiting_dr=0;

        $completed_ar=0;
        $completed_op=0;
        $completed_dr=0;
        
        $i=1;

        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {
                date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                $current_time = date('d-m-Y H:i:s');
                $last_visit = $value->last_visit;
                
                
                $start_datetime = new DateTime($last_visit); 
                $diff = $start_datetime->diff(new DateTime($current_time)); 
 

                $hours =  $diff->h.' hr'; 
                $min =  $diff->i.' min<br>'; 
                if(!empty($hours) && $hours != 0 || !empty($min) && $min != 0 )
                {
                    if(!empty($min) && $min != 0 )
                    {
                         $time_slape = $hours.' '.$min;
                    }
                    else
                    {
                         $time_slape = $hours;
                    }
                    
                }elseif(!empty($min) && $min != 0 || !empty($min) && $min != 0 )
                {
                     if(!empty($hours) && $hours != 0 )
                    {
                         $time_slape = $hours.' '.$min;
                    }
                    else
                    {
                         $time_slape = $min;
                    }
                }
               
                else
                {
                    $time_slape = '';
                }
               
                
                // print_r($this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format));die;
                $row = array();
                $opd_id           = $value->opdid;
                $visit_details_id = $value->visit_id;
                $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');
                if ($check->num_rows() > 0) {
                    $result[$key]['prescription'] = 'yes';
                } else {
                    $result[$key]['prescription'] = 'no';
                    $userdata                     = $this->customlib->getUserData();
                    if ($this->session->has_userdata('hospitaladmin')) {
                        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];
                        if ($doctor_restriction == 'enabled') {
                            if ($userdata["role_id"] == 3) {
                                if ($userdata["id"] == $value->staff_id) {
                                } else {
                                    $result[$key]['prescription'] = 'not_applicable';
                                }
                            }
                        }
                    }
                }
                $patient_id       = $value->patientid;
              
                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');
                $action = "<div class=''>";
                // $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadAudiometryImages' data-opd=" . $opd_id . "   data-toggle='tooltip' title='Upload Audiometry Photos'><i class='fa fa-upload'></i></a>";
                $action .= "<a href='#' onclick='openDraw(".$opd_id.")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='Add EMR'><i class='fas fa-paint-brush'></i></a>";
                if ($optom) {
                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";
                } else {
                    $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . "," .$patient_id. ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='Add EMR'><i class='fas fa fa-plus'></i></a>";

                     $action .= "<a href='#' onclick='editRecord(" . $opd_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='Edit Visit Detail'><i class='fas fa fa-edit'></i></a>";
                }
                /*$action .= "<a href='#'  class='btn btn-default btn-xs btnUploadVisitImages' data-opd=" . $opd_id . "  data-toggle='tooltip' title='Upload 
                Images'><i class='fa fa-upload' aria-hidden='true'></i></a>";*/

                $action .= "<a href='#'  class='btn btn-default btn-xs' onclick='viewImages(".$opd_id.")' data-opd=" . $opd_id . "  data-toggle='tooltip' title='View  Images'><i class='fa fa-picture-o' aria-hidden='true'></i></a>";
                if ($result[$key]['prescription'] == 'no') {
                    if ($this->rbac->hasPrivilege('prescription', 'can_add')) {
                        $action .= "<a href='#' onclick='getRecord_id(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('add_prescription') . "'><i class='fas fa-prescription'></i></a>";
                    }
                } elseif ($result[$key]['prescription'] == 'yes') {
                    if ($this->rbac->hasPrivilege('prescription', 'can_view')) {
                        $action .= "<a href='#' onclick='view_prescription(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('view_prescription') . "'><i class='fas fa-file-prescription'></i></a>";
                    }
                }
                $status_html='';
              
                $a=(isset($value->optometrist_time) && $value->optometrist_time!='')?'background-color:green;':'';
                $b=(isset($value->dcot_time) && $value->dcot_time!='')?'background-color:blue;':'';
                $c=(isset($value->ar_time) && $value->ar_time!='')?'background-color:orange;':'';
                    //$c=$a+$b;
                    $lbl=($a>0)?'Optometrist '.$value->optometrist_time:'';
                    $lbl.=($c>0)?'AR '.$value->ar_time:'';
                    $lbl=($a>0 && $b>0 && $c)?$lbl.'|':$lbl;
                    $lbl.=($b>0)?' Docotor '.$value->dcot_time:'';
             
                // $waiting_ar=0;
                
                 if(isset($value->ar_time) && $value->ar_time!=''){
                    $completed_ar=$completed_ar+1;
                }
                else
                {
                    $waiting_ar=$waiting_ar+1;
                }
                
                if(isset($value->optometrist_time) && $value->optometrist_time!=''){
                    $completed_op=$completed_op+1;
                }
                else
                {
                    $waiting_op=$waiting_op+1;
                }

                if(isset($value->dcot_time) && $value->dcot_time!=''){
                    $completed_dr=$completed_dr+1;
                }
                else
                {
                    $waiting_dr=$waiting_dr+1;
                }
               
                // $completed_ar=0;
                  

                $status_html='<div class="d-flex justify-content-around">
                <a  data-toggle="tooltip"  title="AR">
                      <div class="progress"><div class="div_red status_div" style="'.$c.'"></div></div>
                    </a>
                    <a  data-toggle="tooltip"  title="Optometrist">
                      <div class="progress"><div class="div_red status_div" style="'.$a.'"></div></div>
                    </a>
                    <a  data-toggle="tooltip" title="Docotor">
                      <div class="progress"><div class="div_red status_div" style="'.$b.'"></div></div>
                    </a>
                </div>';
                //$timer_html='<a><span class="glyphicon glyphicon-time" aria-hidden="true"></span><a>';
                $timer_html='<div class="d-flex justify-content-around d-flex align-items-center">
                                <div class="" id="counter_div_'.$value->opdid.'">00:00</div>&nbsp;
                                  <button data-id="'.$value->opdid.'" id="timer_btn_'.$value->opdid.'" class="time_btn btn btn-sm btn-primary">Start</button>
                                </div>';
                $action .= "</div'>";
                
                $patientimage = $value->image;
                $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";
             
                $sec = "<a href='" . base_url() . $patientimage . "' data-lightbox='patient-image'>";
                
                //  $row[] = "<input type='checkbox' class='check' name='opdids[]' value='".$value->opdid."' id='' >";
                $row[] = $first_action . $value->patient_name .'('.$value->patientid.')'. "</a>";
                $row[] =  $sec ."<img src='" . base_url() . $patientimage . "' alt='Patient Image' width='25' height='25'>"."</a>";
                $row[] = $this->opd_prefix . $value->opdid;
                $row[] = $value->guardian_name;
                $row[] = $status_html;
                $row[] = $value->gender;
                $row[] = (isset($value->phone))?$value->phone:'';
                $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);
                $row[] = $value->charge_name;
                // $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format);
                $row[]  = $time_slape;
                $row[]  = $timer_html;
                $row[]     = $action;
                $dt_data[] = $row;

                $i++;
                $total_patient=$total_patient+1;
            }
        }

        $count_data=[
        'total_patient'=>$total_patient,
        'waiting_ar'=>$waiting_ar,
        'waiting_op'=>$waiting_op,
        'waiting_dr'=>$waiting_dr,

        'completed_ar'=>$completed_ar,
        'completed_op'=>$completed_op,
        'completed_dr'=>$completed_dr,
        ];
        $json_data = array(
            "draw"            => intval($dt_response->draw),
            "recordsTotal"    => intval($dt_response->recordsTotal),
            "recordsFiltered" => intval($dt_response->recordsFiltered),
            "data"            => $dt_data,
            'count_data'=>$count_data
        );
        echo json_encode($json_data);
    }
    function getDrawImg($opdid){

        $data=$this->master_model->get_data(['opd_id'=>$opdid,'status'=>1],'emr_draw_image');
        echo json_encode($data);
    }
    function saveDraw()
    {
    	$userdata= $this->customlib->getUserData();
    	$ins_data=[];
		define('UPLOAD_DIR', 'uploads/draw_images/optometry/');
		$img = $_POST['pictureFile'];
		$opid=$_POST['opid'];

		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . uniqid() .'_'.$opid. '.png';
		$success = file_put_contents($file, $data);

		$ins_data['opd_id']=$opid;
		$ins_data['img_path']=$file;
		
		$ins_data['status']=1;
		$ins_data['created_at']=date('Y-m-d H:i:s');
		$ins_data['user_id']=$userdata['id'];
		$res=$this->master_model->insert_data($ins_data,'emr_draw_image');
		echo json_encode(['status'=>$res,'msg'=>($res)?'Draw image saved':'Unable to save please try again']);
    }




    public function getAcceptOptometryPatientsDataTable()

    {

        //$dt_response = $this->optometry_model->get_optometry_patients_datatable();

        $dt_response = $this->patient_model->getLatestopdvisitRecord();

        $dt_response = json_decode($dt_response);

        $dt_data     = array();

       

        if (!empty($dt_response->data)) {

            foreach ($dt_response->data as $key => $value) {

                $row = array();

                $opd_id           = $value->opdid;

                $visit_details_id = $value->visit_id;

                $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

                if ($check->num_rows() > 0) {

                    $result[$key]['prescription'] = 'yes';

                } else {

                    $result[$key]['prescription'] = 'no';

                    $userdata                     = $this->customlib->getUserData();

                    if ($this->session->has_userdata('hospitaladmin')) {

                        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

                        if ($doctor_restriction == 'enabled') {

                            if ($userdata["role_id"] == 3) {

                                if ($userdata["id"] == $value->staff_id) {

                                } else {

                                    $result[$key]['prescription'] = 'not_applicable';

                                }

                            }

                        }

                    }

                }

                $patient_id       = $value->patientid;

                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

                $action = "<div class=''>";

               

                if ($optom) {

                    $action .= "<a href='#'  class='btn btn-default btn-xs print_accept' data-id ='" . $optom->id . "' data-opdid='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='PRINT ACEEPTANCE'><i class='fas fa fa-print'></i></a>";

                } else {

                    $action .= "<a href='".base_url('admin/optometry')."' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('emr') . "'><i class='fas fa fa-plus'></i></a>";

                }

                

                $action .= "</div'>";

                $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

                $row[] = $first_action . $value->patient_name . "</a>";

                $row[] = $this->opd_prefix . $value->opdid;

                $row[] = $value->guardian_name;

                $row[] = $value->gender;

                $row[] = $value->mobileno;

                $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

                $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format);

                $row[]     = $action;

                $dt_data[] = $row;

            }

        }

        $json_data = array(

            "draw"            => intval($dt_response->draw),

            "recordsTotal"    => intval($dt_response->recordsTotal),

            "recordsFiltered" => intval($dt_response->recordsFiltered),

            "data"            => $dt_data,

        );

        echo json_encode($json_data);

    }





    public function acceptance()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/acceptance", $data);

        $this->load->view("layout/footer");

    }

    

    

    public function print_acceptance()

    {

		$id                   = $this->input->post('opd_id');

        

        $optomery_data 		  = $this->master_model->get_single(array('id' => $id), 'optometry');

		

		$optomery_data->pgp_data = json_decode($optomery_data->pgp_data);

		$optomery_data->gon_data = json_decode($optomery_data->gon_data);

		$optomery_data->ocu_data = json_decode($optomery_data->ocu_data);

        $optomery_data->vision_data = json_decode($optomery_data->vision_data);

        $optomery_data->dryretinoscopy_data = json_decode($optomery_data->dryretinoscopy_data);

        $optomery_data->cyclo_data = json_decode($optomery_data->cyclo_data);

        $optomery_data->acceptance_data = json_decode($optomery_data->acceptance_data);

        $optomery_data->antsegment_data = json_decode($optomery_data->antsegment_data);

        $optomery_data->nct_data = json_decode($optomery_data->nct_data);

        $optomery_data->at_data = json_decode($optomery_data->at_data);

        $optomery_data->cvt_data = json_decode($optomery_data->cvt_data);

        $optomery_data->lcva_data = json_decode($optomery_data->lcva_data);

        $optomery_data->ker_data = json_decode($optomery_data->ker_data);

        $optomery_data->lac_data = json_decode($optomery_data->lac_data);

        $optomery_data->sch_data = json_decode($optomery_data->sch_data);

        $optomery_data->top_data = json_decode($optomery_data->top_data);

        $optomery_data->pac_data = json_decode($optomery_data->pac_data);

        $optomery_data->eye_data = json_decode($optomery_data->eye_data);

        $optomery_data->sta_data = json_decode($optomery_data->sta_data);

        $optomery_data->postsegment_data = json_decode($optomery_data->postsegment_data);

        $optomery_data->diagnosis_data = json_decode($optomery_data->diagnosis_data);

        $optomery_data->optometric_comments = $optomery_data->optometric_comments;

        $optomery_data->orbit = $optomery_data->orbit;

        $optomery_data->inv = $optomery_data->inv;

        $optomery_data->pre = $optomery_data->pre;

        $optomery_data->history_data = json_decode($optomery_data->history_data);

        $optomery_data->print_data = json_decode($optomery_data->print_data);

        $optomery_data->complaints_data = $optomery_data->complaints_data;

		

        $opddata                  = $this->patient_model->getVisitDetailsbyopdid($optomery_data->opd_id);



		$data['optomery_data']	  = $optomery_data;

        $data['blood_group_name'] = $opddata['blood_group_name'];

        $data["print_details"]    = $this->printing_model->get('', 'opd');

        $data["result"]           = $opddata;

        $data['opd_prefix']       = $this->customlib->getSessionPrefixByType('opd_no');

        $data['checkup_prefix']   = $this->customlib->getSessionPrefixByType('checkup_id');

		



		

        if (!empty($opddata)) {

            $patient_charge_id = $opddata['patient_charge_id'];

            $charge            = $this->charge_model->getChargeById($patient_charge_id);

            $data['charge']    = $charge;

            if (!empty($opddata['transaction_id'])) {

                $transaction         = $this->transaction_model->getTransaction($opddata['transaction_id']);

                $data['transaction'] = $transaction;



            }

        }

		

		

        $page = $this->load->view('admin/optometry/_printaccept', $data, true);

        echo json_encode(array('status' => 1, 'page' => $page));



    }





// end added by chitranjan



// added by chitranjan



    public function surgeries()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/surgeries", $data);

        $this->load->view("layout/footer");

    }





    public function getSurgriesOptometryPatientsDataTable()

    {

       

        $dt_response = $this->patient_model->getSurgeriesOpdVisitRecord();

        $dt_response = json_decode($dt_response);

        

        // echo '<pre>';

        // print_r($dt_response);die;

        $dt_data     = array();

       

        if (!empty($dt_response->data)) {

            foreach ($dt_response->data as $key => $value) {

                $row = array();

                $opd_id           = $value->opdid;

                $visit_details_id = $value->visit_id;

                $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

                if ($check->num_rows() > 0) {

                    $result[$key]['prescription'] = 'yes';

                } else {

                    $result[$key]['prescription'] = 'no';

                    $userdata                     = $this->customlib->getUserData();

                    if ($this->session->has_userdata('hospitaladmin')) {

                        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

                        if ($doctor_restriction == 'enabled') {

                            if ($userdata["role_id"] == 3) {

                                if ($userdata["id"] == $value->staff_id) {

                                } else {

                                    $result[$key]['prescription'] = 'not_applicable';

                                }

                            }

                        }

                    }

                }

                $patient_id       = $value->patientid;

                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

                

                $action = "<div class=''>";

               

                if ($optom) {

                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-surgery_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW SURGERY'><i class='fas fa fa-eye'></i></a>";

                } else {

                    $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . "," . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('surgeries') . "'><i class='fas fa fa-plus'></i></a>";

                }

                

                $action .= "</div'>";

                $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

                $row[] = $first_action . $value->patient_name . "</a>";

                //$row[] = $this->opd_prefix . $value->opdid;

                //$row[] = $value->surgery_recommendations;

                //$row[] = $value->gender;

                $row[] = $value->pid;

                $row[] = $optom->sg;

                $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

                $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format);

                // $row[] = str_replace(array("[","]"),"",$value->surgery_recommendations);

                 $row[]     = '';

                $row[]     = $action;

                $dt_data[] = $row;

            }

        }

        $json_data = array(

            "draw"            => intval($dt_response->draw),

            "recordsTotal"    => intval($dt_response->recordsTotal),

            "recordsFiltered" => intval($dt_response->recordsFiltered),

            "data"            => $dt_data,

        );

        echo json_encode($json_data);

    }




    public function getShift()
    {
        $dates        = $this->input->post("date");
        $date         = $this->customlib->dateFormatToYYYYMMDD($dates);
        $doctor       = $this->input->post("doctor");
        $ot           = $this->input->post("ot");
        $patient      = $this->input->post("patient");
        $global_shift = $this->input->post("global_shift");
        $day          = date("l", strtotime($date));
        $shift        = $this->surgeryappointment_model->getShiftdata($doctor, $day, $global_shift,$ot,$patient);

        echo json_encode($shift);
    }
    public function getSlotByShift()
    {
        $data           = array();
        $data["result"] = array();
        $shift          = $this->input->post("shift");
        $doctor_id      = $this->input->post("doctor");
        $global_shift   = $this->input->post("global_shift");
        $ot             = $this->input->post("ot");
        $patient        = $this->input->post("patient");
        $date           = $this->customlib->dateFormatToYYYYMMDD($this->input->post("date"));
        $appointments   = $this->surgeryappointment_model->getAppointments($ot, $shift, date('Y-m-d',strtotime($this->input->post("date"))));
        $array_of_time  = $this->customlib->getSurgerySlotByDoctorShift($doctor_id, $shift);
        $this->load->model("charge_model");
        $class = "";
        
        foreach ($array_of_time as $time) {
            if (!empty($appointments)) {
                foreach ($appointments as $appointment) {
                    if ($appointment->time == date("H:i:s", strtotime($time))) {
                        $class  = "row badge badge-pill badge-danger-soft";
                        $filled = "filled";
                        break;
                    } else {
                        $class  = "row badge badge-pill badge-success-soft";
                        $filled = "";
                    }
                }

                array_push($data["result"], array("time" => $this->customlib->getHospitalTime_FormatFrontCMS($time), "class" => $class, "filled" => $filled));
            } else {
                array_push($data["result"], array("time" => $this->customlib->getHospitalTime_FormatFrontCMS($time), "class" => "row badge badge-pill badge-success-soft"));
            }
        }
        $doctor_data               = $this->staff_model->getProfile($doctor_id);
        $data["doctor_name"]       = $doctor_data["name"] . " " . $doctor_data["surname"];
        $data["doctor_speciality"] = $this->staff_model->getStaffSpeciality($doctor_id);
        $shift_details             = $this->surgeryappointment_model->getShiftDetails($doctor_id);
        $charge_details            = $this->charge_model->getChargeDetailsById($shift_details['charge_id']);
        $currency_symbol           = $this->setting_model->get()[0]["currency_symbol"];
        $data["fees"]              = isset($charge_details->standard_charge) ? $currency_symbol . $charge_details->standard_charge : "";
        $data["duration"]          = $shift_details["consult_duration"];
        if (!empty($doctor_data['image'])) {
            $data['image'] = base_url("uploads/staff_images/" . $doctor_data['image']);
        } else {
            $data['image'] = base_url("uploads/staff_images/no_image.png");
        }

        echo json_encode($data);
    }
    public function getShiftById(){
        $shift_id = $this->input->post("id");
        $date = $this->customlib->dateFormatToYYYYMMDD($this->input->post("date"));
        $this->load->model('surgeryappointment_model');
        $shift = $this->surgeryappointment_model->getShiftById($shift_id);
        $end_time = $date." ".$shift['end_time'];
        $end_time = date("Y-m-d H:i:s" ,strtotime($end_time));
        $current_time = date("Y-m-d H:i:s");
        if($current_time>$end_time){
            echo json_encode(array("status" => 1));
        }else{
            echo json_encode(array("status" => 0));
        }
    }
    public function addsurgery()

    {

        // echo "<pre>";

        // print_r($this->input->post('surgeon_name'));die;

        

        $this->form_validation->set_rules('charges', 'Charges', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('surgeon_name', 'Surgeon Name', 'trim|required|xss_clean');

        $this->form_validation->set_rules('surgery_date', 'Surgery Date', 'trim|required|xss_clean');



        if ($this->form_validation->run() == false) {



            $error_msg = array(

                'charges'       => form_error('charges'),

                'surgeon_name'  => form_error('surgeon_name'),

                'surgery_date'   => form_error('surgery_date'),

            );



            $array = array('status' => 'fail', 'error' => $error_msg, 'message' => '');

        } else {



            $surgery_date = $this->input->post('surgery_date');

            if ($surgery_date == "") {

                $surgery_date = null;

            } else {

                $surgery_date = $this->customlib->dateFormatToYYYYMMDD($surgery_date);

            }

            

             $reporting_date = $this->input->post('reporting_date');

            if ($reporting_date == "") {

                $reporting_date = null;

            } else {

                $reporting_date = $this->customlib->dateFormatToYYYYMMDD($reporting_date);

            }

            

             $followup_date = $this->input->post('followup_date');

            if ($followup_date == "") {

                $followup_date = null;

            } else {

                $followup_date = $this->customlib->dateFormatToYYYYMMDD($followup_date);

            }

            



            $data = array(

               'case_reference_id'          => $this->input->post('case_reference_id'),

                'patient_id'      => $this->input->post('patient_id'),

                'visit_id'          => $this->input->post('visit_id'),

                'opd_id'               => $this->input->post('opd_id'),

                'surgeon_name'                => $this->input->post('surgeon_name'),

                'anesthetist_name'              => $this->input->post('anesthetist_name'),

                'operated_eye'               => $this->input->post('operated_eye'),

                'surgery_date'               => $this->input->post('surgery_date'),

                'reporting_date'               => $this->input->post('reporting_date'),

                'booked_by'               => $this->input->post('booked_by'),

                'rate'               => $this->input->post('rate'),

                'package'               => $this->input->post('package'),

                'bed_type'               => $this->input->post('bed_type'),

                'amount'               => $this->input->post('amount'),

                'insurer'               => $this->input->post('insurer'),

                'patient_notes'               => $this->input->post('patient_notes'),

                'counsellor_remarks'               => $this->input->post('counsellor_remarks'),

                'followup_date'               => $this->input->post('followup_date'),

                'status'               => $this->input->post('status'),

            );

            
      
            $data['ot_number']=$this->input->post("ot");
            $data['slot_id']=$this->input->post("slot");
            $data['time']=$this->input->post("slot_time");

            $vid=$this->input->post("vid");
            if($vid!='')
            {
            	$res=$this->master_model->update_data($data,['id'=>$vid],'sugeries');
            	$insert_id=$vid;
            }
            else
            {
            	$insert_id = $this->patient_model->add_surgery($data);
            }
           

            

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'), 'id' => $insert_id);

        }

        echo json_encode($array);

    }
    public function exportsurgeries(){

    	$ot=$this->input->post('ot');
    	$date=$this->input->post('surgery_date');

    	$whereData=[];
    	if($ot!='')
    	{
    	  $whereData['ot_number']=$ot;
    	}
    	if($date!='')
    	{
    	  $whereData['DATE(DATE_FORMAT(`surgery_date`,"%Y-%m-%d"))']=date('Y-m-d',strtotime($date));	
    	}
    	if(empty($whereData))
    	{

    	}
    	$columns='surgeon_name,anesthetist_name,surgery_date,opd_id,patient_id,operated_eye,reporting_date,booked_by,rate,package,bed_type,amount,insurer,
    	patient_notes,counsellor_remarks,followup_date,status,ot_number,time';
    	$usersData=$this->master_model->get_data($whereData,'sugeries',$columns);

    	$tmpfname = "example.xls";
    	/*$this->load->library('excel');
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $objPHPExcel = $excelReader->load($tmpfname);

         $objPHPExcel->getProperties()->setCreator("Furkan Kahveci")
		 ->setLastModifiedBy("Furkan Kahveci")
		 ->setTitle("Office 2007 XLS Test Document")
		 ->setSubject("Office 2007 XLS Test Document")
		 ->setDescription("Description for Test Document")
		 ->setKeywords("phpexcel office codeigniter php")
		 ->setCategory("Test result file");

		 $objPHPExcel->setActiveSheetIndex(0);*/

		 $header = explode(',', $columns); 
		

		$ColumnArray2 = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$ColumnArray = array();
		for($x = 0 ; $x <= count($header) ; $x++)
		{
		    foreach ($ColumnArray2 as $v) {
		        $ColumnArray[] = $x == 0? $v : $ColumnArray[$x-1] . $v;
		    }
		}

		foreach ($ColumnArray as $key => $value) {
			//$objPHPExcel->getActiveSheet()->setCellValue('A1', "Furkan");
			echo ($value);
		}

		//$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    }




    public function getSurgeryData($id)

    {

        

        $data = $this->master_model->get_single(array('id' => $id), 'sugeries');

        

         $data->patient_data = $this->master_model->get_single(array('id' => $data->patient_id), 'patients');

          $data->patient_data = $data->patient_data;

          

           $data->opd_data = $this->master_model->get_single(array('opd_id' => $data->opd_id), 'optometry');

          $data->opd_data = $data->opd_data;
          $data->surgery_date=date('Y-m-d', strtotime($data->surgery_date)).' '.$data->time;
          $data->s_date=date('d-m-Y', strtotime($data->surgery_date));
          $data->reporting_date=date('d-m-Y', strtotime($data->reporting_date));

          $data->followup_date=date('d-m-Y', strtotime($data->followup_date));
          

        $resdata = array('flag' => 1, 'msg' => "", 'data' => $data);

        echo json_encode($resdata);

        

    }





    public function print_surgeries()

    {

		$id                        = $this->input->post('opd_id');

        $visitid                   = $this->input->post('visitid');

        $ipd_data 		           = $this->master_model->get_single(array('visit_details_id' => $visitid), 'ipd_prescription_basic');

        $optomery_data 		       = $this->master_model->get_single(array('id' => $id), 'optometry');

        

		 $surgery = $this->master_model->get_single(array('opd_id' => $visitid), 'sugeries');

		 

        $opddata                  = $this->patient_model->getVisitDetailsbyopdid($surgery->opd_id);

        $data['surgery_data']     = json_decode($ipd_data->surgery_recommendations);

		$data['optomery_data']	  = $optomery_data;

		$data['surgery']	  = $surgery;

        $data['blood_group_name'] = $opddata['blood_group_name'];

        $data["print_details"]    = $this->printing_model->get('', 'opd');

        $data["result"]           = $opddata;

        $data['opd_prefix']       = $this->customlib->getSessionPrefixByType('opd_no');

        $data['checkup_prefix']   = $this->customlib->getSessionPrefixByType('checkup_id');

		



		

        if (!empty($opddata)) {

            $patient_charge_id = $opddata['patient_charge_id'];

            $charge            = $this->charge_model->getChargeById($patient_charge_id);

            $data['charge']    = $charge;

            if (!empty($opddata['transaction_id'])) {

                $transaction         = $this->transaction_model->getTransaction($opddata['transaction_id']);

                $data['transaction'] = $transaction;



            }

        }

// 		echo "<pre>";

// print_r($data);

           

		

        $page = $this->load->view('admin/optometry/_printsurgeries', $data, true);

        echo json_encode(array('status' => 1, 'page' => $page));



    }

    

    

     public function GetLastVisitDetailByPatientID(){

         

         



        $patient_id = $this->input->post('patient_id');

        $title = $this->input->post('title');

        $result = $this->patient_model->GetLastVisitDetailByPatientID($patient_id);

        //print_r($result);

        $html = '<table class="table table-bordered" style="border:1px solid #05386B !important;"><tbody>';

        if($title == 'Visions'){



            $vision_data = json_decode($result['vision_data']);

            $html .= '<tr><th>&nbsp;</th><th colspan="4" style="border:1px solid #05386B !important;">OD</th><th colspan="4" style="border:1px solid #05386B !important;">OS</th></tr><tr><td style="border:1px solid #05386B !important;">Unaided</td><td style="border:1px solid #05386B !important;">Distance</td><td style="border:1px solid #05386B !important;">'.$vision_data->vision_od_presenting.'</td><td style="border:1px solid #05386B !important;">Near</td><td style="border:1px solid #05386B !important;">'.$vision_data->vision_od_near_presenting.'</td><td style="border:1px solid #05386B !important;">Distance</td><td style="border:1px solid #05386B !important;">'.$vision_data->vision_os_presenting.'</td><td style="border:1px solid #05386B !important;">Near</td><td style="border:1px solid #05386B !important;">'.$vision_data->vision_os_near_presenting.'</td></tr><tr><td style="border:1px solid #05386B !important;">Pinhole</td><td colspan="4" style="border:1px solid #05386B !important;">'.$vision_data->vision_od_pinhole.'</td><td style="border:1px solid #05386B !important;" colspan="4">'.$vision_data->vision_os_pinhole.'</td></tr>';



        }

       if($title == 'Retinoscopy'){

            $dryretinoscopy_data = json_decode($result['dryretinoscopy_data']);

            $html .='<tr><th style="border:1px solid #05386B !important;" style="width:20%;">Retinoscopy</th><td style="border:1px solid #05386B !important;">SPH</td><td style="border:1px solid #05386B !important;">Cyl</td><td style="border:1px solid #05386B !important;">Axis</td></tr><tr><th style="border:1px solid #05386B !important;">OD</th><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_od_sph.'</td><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_od_cyl.'</td><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_od_axis.'</td></tr><tr><th style="border:1px solid #05386B !important;">OS</th><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_os_sph.'</td><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_os_cyl.'</td><td style="border:1px solid #05386B !important;">'.$dryretinoscopy_data->drs_os_axis.'</td></tr>';

        }

        if($title == 'Cyclo'){

            $cyclo_data = json_decode($result['cyclo_data']);

            $html .='<tr><th style="border:1px solid #05386B !important;" style="width:20%;">Cyclo</th><td style="border:1px solid #05386B !important;">SPH</td><td style="border:1px solid #05386B !important;">Cyl</td><td style="border:1px solid #05386B !important;">Axis</td></tr><tr><th style="border:1px solid #05386B !important;">OD</th><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_od_sph.'</td><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_od_cyl.'</td><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_od_axis.'</td></tr><tr><th style="border:1px solid #05386B !important;">OS</th><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_os_sph.'</td><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_os_cyl.'</td><td style="border:1px solid #05386B !important;">'.$cyclo_data->cyclo_os_axis.'</td></tr>';

        }

        if($title == 'PGP'){

            $pgp_data = json_decode($result['pgp_data']);

            $html .='<tr><th style="border:1px solid #05386B !important;">PGP</th><th style="border:1px solid #05386B !important;">SPH</th><th style="border:1px solid #05386B !important;">Cyl</th><th style="border:1px solid #05386B !important;">Axis</th><th style="border:1px solid #05386B !important;">ADD</th><th style="border:1px solid #05386B !important;">BCVA</th><th style="border:1px solid #05386B !important;">BCNVA</th></tr><tr><th style="border:1px solid #05386B !important;">OD</th><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_sph.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_cyl.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_axis.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_add.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_eom.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_od_tropia.'</td></tr><tr><th style="border:1px solid #05386B !important;">OS</th><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_sph.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_cyl.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_axis.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_add.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_eom.'</td><td style="border:1px solid #05386B !important;">'.$pgp_data->pgp_os_tropia.'</td></tr>';

        }

        if($title == 'Acceptance'){

            $acceptance_data = json_decode($result['acceptance_data']);

            $html .='<tr><th style="border:1px solid #05386B !important;" style="width:20%;">Acceptance</th><td style="border:1px solid #05386B !important;">SPH</td><td style="border:1px solid #05386B !important;">Cyl</td><td style="border:1px solid #05386B !important;">Axis</td><td style="border:1px solid #05386B !important;">ADD</td><td style="border:1px solid #05386B !important;">BCVA</td><td style="border:1px solid #05386B !important;">BCNVA</td></tr><tr><th style="border:1px solid #05386B !important;">OD</th><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_sph.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_cyl.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_axis.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_add.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_va.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_od_bcnva.'</td></tr><tr><th style="border:1px solid #05386B !important;">OS</th><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_sph.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_cyl.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_axis.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_add.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_va.'</td><td style="border:1px solid #05386B !important;">'.$acceptance_data->accp_os_bcnva.'</td></tr>';

        }

        $html .= '</tbody></table>';

        echo $html;

    }

    

    

    // checkout

    public function checkout_emr()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $category_dosage            = $this->medicine_dosage_model->getCategoryDosages();

        $data['category_dosage']    = $category_dosage;

        $data['medicineCategory']   = $this->medicine_category_model->getMedicineCategory();

        $data['intervaldosage']  = $this->medicine_dosage_model->getIntervalDosage();

        $data['durationdosage']  = $this->medicine_dosage_model->getDurationDosage();

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/checkout", $data);

        $this->load->view("layout/footer");

    }



    public function getcheckoutPatientsDataTable()

    {

        //$dt_response = $this->optometry_model->get_optometry_patients_datatable();

        $dt_response = $this->patient_model->getLatestcheckoutRecord();

        $dt_response = json_decode($dt_response);

        $dt_data     = array();

       

        if (!empty($dt_response->data)) {

            foreach ($dt_response->data as $key => $value) {

                $row = array();

                $opd_id           = $value->opdid;

                $visit_details_id = $value->visit_id;

                $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

                if ($check->num_rows() > 0) {

                    $result[$key]['prescription'] = 'yes';

                } else {

                    $result[$key]['prescription'] = 'no';

                    $userdata                     = $this->customlib->getUserData();

                    if ($this->session->has_userdata('hospitaladmin')) {

                        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

                        if ($doctor_restriction == 'enabled') {

                            if ($userdata["role_id"] == 3) {

                                if ($userdata["id"] == $value->staff_id) {

                                } else {

                                    $result[$key]['prescription'] = 'not_applicable';

                                }

                            }

                        }

                    }

                }

                $patient_id       = $value->patientid;

                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

                $action = "<div class=''>";

                // $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadAudiometryImages' data-opd=" . $opd_id . "   data-toggle='tooltip' title='Upload Audiometry Photos'><i class='fa fa-upload'></i></a>";

                if ($optom) {

                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";

                } else {

                    $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . "," .$patient_id. ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('emr') . "'><i class='fas fa fa-plus'></i></a>";

                }

                $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadVisitImages' data-opd=" . $opd_id . "  data-toggle='tooltip' title='Upload Images'><i class='fa fa-upload' aria-hidden='true'></i></a>";

                if ($result[$key]['prescription'] == 'no') {

                    if ($this->rbac->hasPrivilege('prescription', 'can_add')) {

                        $action .= "<a href='#' onclick='getRecord_id(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('add_prescription') . "'><i class='fas fa-prescription'></i></a>";

                    }

                } elseif ($result[$key]['prescription'] == 'yes') {

                    if ($this->rbac->hasPrivilege('prescription', 'can_view')) {

                        $action .= "<a href='#' onclick='view_prescription(" . $visit_details_id . ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('view_prescription') . "'><i class='fas fa-file-prescription'></i></a>";

                    }

                }



                $action .= "</div'>";



                // $new_btn = "<a href='#'  class='btn btn-info btn-sm  checkOut' data-opd=" . $opd_id . "  data-toggle='tooltip' title='CheckOut EMR'><i class='fa fa-hospital-o' aria-hidden='true'></i></a>";



                $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

                $row[] = $first_action . $value->patient_name . "</a>";

                $row[] = $this->opd_prefix . $value->opdid;

                $row[] = $value->guardian_name;

                $row[] = $value->gender;

                $row[] = $value->mobileno;

                $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

                $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format);

                // $row[]     = $new_btn;

                $row[]     = $action;

                $dt_data[] = $row;

            }

        }

        $json_data = array(

            "draw"            => intval($dt_response->draw),

            "recordsTotal"    => intval($dt_response->recordsTotal),

            "recordsFiltered" => intval($dt_response->recordsFiltered),

            "data"            => $dt_data,

        );

        echo json_encode($json_data);

    }



        //added by chitranjan

    public function GetPatientDetail(){

    



        $patient_id = $this->input->post('patient_id');

        

        $patient_data = $this->patient_model->GetPatientDetail($patient_id);

        echo json_encode($patient_data);



    }

    public function opdMoveToDischarge(){



        $opdids = $this->input->post('opds');

        $insert_id = $this->patient_model->opdMoveToDischarge($opdids);

        $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'), 'id' => $insert_id);

        echo json_encode($array);



    }

        public function get_complaints_data()

    {

    

        $result  = $this->master_model->get_data(array('master_type' => 'optometry_complaint'), 'master_data');

        if ($result) {

            $resultdata = array('flag' => 1, 'msg' => '', 'data' => $result);

        } else {

            $resultdata = array('flag' => 0, 'msg' => 'Something went wrong.!', 'data' => null);

        }

        echo json_encode($resultdata);

    }

    

    

    // counselling

    

    public function counsellingindex()

    {

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }



        $this->session->set_userdata('top_menu', 'optometry');



        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $category_dosage            = $this->medicine_dosage_model->getCategoryDosages();

        $data['category_dosage']    = $category_dosage;

        $doctors                    = $this->staff_model->getStaffbyrole(3);

        $data["doctors"]            = $doctors;

                $data['operation_list']      = $this->operationtheatre_model->operation_list();

        $alldoctors                    = $this->staff_model->getStaffbyrole(14);

        $data["alldoctors"]            = $alldoctors;

        $data['organisation']   = $this->organisation_model->get();

        $data['medicineCategory']   = $this->medicine_category_model->getMedicineCategory();

        $data['intervaldosage']  = $this->medicine_dosage_model->getIntervalDosage();

        $data['durationdosage']  = $this->medicine_dosage_model->getDurationDosage();

         $data["searchlist"]            = $this->search_type;

        $data['complaints_data'] = $this->master_model->getMasterDataLike(array('master_type' => 'optometry_complaint'),array(), 'master_data');

        // echo "<pre>";

        // print_r($data['complaints_data']);die;

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/counselling_index", $data);

        $this->load->view("layout/footer");

    }

    

    //  public function counsellinggetOptometryPatientsDataTable()

    // {

    //     //$dt_response = $this->optometry_model->get_optometry_patients_datatable();

    //     $dt_response = $this->patient_model->counsellinggetLatestopdvisitRecord();

    //     // echo "<pre>";

    //     // print_r($dt_response);die;

    //     $dt_response = json_decode($dt_response);

    //     $dt_data     = array();





    //     if (!empty($dt_response->data)) {

    //         foreach ($dt_response->data as $key => $value) {

              

               

                

    //             // print_r($this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format));die;

    //             $row = array();

    //             $opd_id           = $value->opdid;

    //             $visit_details_id = $value->visit_id;

    //             $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

    //             if ($check->num_rows() > 0) {

    //                 $result[$key]['prescription'] = 'yes';

    //             } else {

    //                 $result[$key]['prescription'] = 'no';

    //                 $userdata                     = $this->customlib->getUserData();

    //                 if ($this->session->has_userdata('hospitaladmin')) {

    //                     $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

    //                     if ($doctor_restriction == 'enabled') {

    //                         if ($userdata["role_id"] == 3) {

    //                             if ($userdata["id"] == $value->staff_id) {

    //                             } else {

    //                                 $result[$key]['prescription'] = 'not_applicable';

    //                             }

    //                         }

    //                     }

    //                 }

    //             }

    //             $patient_id       = $value->patientid;

              

    //             $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

    //              $surgery =  $this->master_model->get_single(array('opd_id' => $opd_id), 'sugeries');

    //             $action = "<div class=''>";

                

    //             if ($optom) {

                    

    //                 if($value->surgery_recommendations != ""){

    //                 $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";

                    

                      

    //                 }else{

                        

    //                 }

    //             } else {

                    

    //             }

    //             if($value->surgery_recommendations != ""){

                    

    //             if ($surgery) {

    //                  $action .= "<a href='#'  class='btn btn-default btn-xs viewsurgeryData' data-surgery_id ='" . $surgery->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-patient_id='".$patient_id."'

    //                 data-doctor='". composeStaffNameByString($value->name, $value->surname, $value->employee_id)."' data-toggle='tooltip' title='VIEW SURGERY'><i class='fas fa-file-prescription'></i></a>";

                    

                    

                    

    //             }else{

    //                 $action .= "<a href='#' onclick='getRecord_counselling(" . $opd_id . "," . $visit_details_id . "," .$patient_id .")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('surgeries') . "'><i class='fas fa fa-plus'></i></a>";

    //             }

    //             }else{

                    

    //             }

               

    //             $action .= "</div'>";

    //             $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

                

    //             $row[] = $first_action . $value->patient_name ."(".$value->pid .")". "</a>";

                

    //             $row[] = $value->case_reference_id;

    //             $row[] = $value->surgery_recommendations;

    //             $row[] = $value->mobileno;

    //             $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

    //             $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->surgery_date, $this->time_format);

    //             $row[]  = $value->status;

    //             $row[]  = $this->customlib->YYYYMMDDHisTodateFormat($value->followup_date, $this->time_format);

    //             $row[]     = $action;

    //             $dt_data[] = $row;



    //             $i++;

    //             $total_patient=$total_patient+1;

    //         }

    //     }



    //     $count_data=[

    //     'total_patient'=>$total_patient,

    //     'waiting_ar'=>$waiting_ar,

    //     'waiting_op'=>$waiting_op,

    //     'waiting_dr'=>$waiting_dr,



    //     'completed_ar'=>$completed_ar,

    //     'completed_op'=>$completed_op,

    //     'completed_dr'=>$completed_dr,

    //     ];

    //     $json_data = array(

    //         "draw"            => intval($dt_response->draw),

    //         "recordsTotal"    => intval($dt_response->recordsTotal),

    //         "recordsFiltered" => intval($dt_response->recordsFiltered),

    //         "data"            => $dt_data,

    //         'count_data'=>$count_data

    //     );

    //     echo json_encode($json_data);

    // }



    public function GetPatientDetailcounselling(){

    

        $patient_id = $this->input->post('patient_id');

        $patient_data = $this->patient_model->GetPatientDetail($patient_id);

        echo json_encode($patient_data);



    }

    public function GetOptocounselling(){

    

        $patient_id = $this->input->post('patient_id');

        

        $opdcoun_data = $this->patient_model->GetoptocounDetail($patient_id);

        echo json_encode($opdcoun_data);



    }

    public function GetvisitDetail(){

    

        $opd = $this->input->post('opd');

        

        $visit_data = $this->patient_model->GetvisitDetail($opd);

        echo json_encode($visit_data);



    }

    

     public function Getvisitall(){

    

        $opd = $this->input->post('opd');

        

        $visit_all = $this->patient_model->Getvisitall($opd);

        echo json_encode($visit_all);



    }

    

     public function counsellinggetOptometryPatientsDataTable()

    {

        //$dt_response = $this->optometry_model->get_optometry_patients_datatable();



        

        $params=$_POST;

        $dt_response = $this->patient_model->counsellinggetLatestopdvisitRecord($params);

        // echo "<pre>";

        // print_r($dt_response);die;

        $dt_response = json_decode($dt_response);

        $dt_data     = array();



        $total_patient=0;

        $waiting_ar=0;

        $waiting_op=0;

        $waiting_dr=0;



        $completed_ar=0;

        $completed_op=0;

        $completed_dr=0;

        if (!empty($dt_response->data)) {

            foreach ($dt_response->data as $key => $value) {

              

               

                

                // print_r($this->customlib->YYYYMMDDHisTodateFormat($value->last_visit, $this->time_format));die;

                $row = array();

                $opd_id           = $value->opdid;

                $visit_details_id = $value->visit_id;

                $check            = $this->db->where("visit_details_id", $visit_details_id)->get('ipd_prescription_basic');

                if ($check->num_rows() > 0) {

                    $result[$key]['prescription'] = 'yes';

                } else {

                    $result[$key]['prescription'] = 'no';

                    $userdata                     = $this->customlib->getUserData();

                    if ($this->session->has_userdata('hospitaladmin')) {

                        $doctor_restriction = $this->session->userdata['hospitaladmin']['doctor_restriction'];

                        if ($doctor_restriction == 'enabled') {

                            if ($userdata["role_id"] == 3) {

                                if ($userdata["id"] == $value->staff_id) {

                                } else {

                                    $result[$key]['prescription'] = 'not_applicable';

                                }

                            }

                        }

                    }

                }

                $patient_id       = $value->patientid;
                $surgery_id 	  =$value->surgery_id;
              

                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');

                 $surgery =  $this->master_model->get_single(array('opd_id' => $opd_id), 'sugeries');

                $action = "<div class=''>";

                

                if ($optom) 

                {

                    

                    if($value->surgery_recommendations != ""){

                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";

                    }

                }

                if($value->surgery_recommendations != ""){

                    

                    if ($surgery) {

                         $action .= "<a href='#'  class='btn btn-default btn-xs viewsurgeryData' data-surgery_id ='" . $surgery->id . "' data-opd='" . $opd_id . "'  data-visitid='" . $visit_details_id . "' data-patient_id='".$patient_id."'

                        data-doctor='". composeStaffNameByString($value->name, $value->surname, $value->employee_id)."' data-toggle='tooltip' title='VIEW SURGERY'><i class='fas fa-file-prescription'></i></a>";

                        $action .= "<a href='#' onclick='getsurgery(" . $surgery_id . "," . $opd_id . "," . $visit_details_id . "," .$patient_id .")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='Edit'><i class='fas fa fa-edit'></i></a>";

                    }

                    else

                    {

                        $action .= "<a href='#' onclick='getRecord_counselling(" . $opd_id . "," . $visit_details_id . "," .$patient_id .")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('surgeries') . "'><i class='fas fa fa-plus'></i></a>";

                    }

                }

               

                $action .= "</div'>";

                $first_action = "<a href=" . base_url() . 'admin/bill/patient_profile/' . $value->pid . ">";

                

                $row[] = $first_action . $value->patient_name ."(".$value->pid .")". "</a>";

                

                $row[] = $value->case_reference_id;

                $row[] = $value->surgery_recommendations;

                $row[] = $value->mobileno;

                $row[] = composeStaffNameByString($value->name, $value->surname, $value->employee_id);

                $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->surgery_date, $this->time_format);

                $row[]  = $value->status;

                $row[]  = $this->customlib->YYYYMMDDHisTodateFormat($value->followup_date, $this->time_format);

                $row[]     = $action;

                $dt_data[] = $row;



                

                $total_patient=$total_patient+1;

            }

        }



        $count_data=[

        'total_patient'=>$total_patient,

        'waiting_ar'=>$waiting_ar,

        'waiting_op'=>$waiting_op,

        'waiting_dr'=>$waiting_dr,



        'completed_ar'=>$completed_ar,

        'completed_op'=>$completed_op,

        'completed_dr'=>$completed_dr,

        ];

        $json_data = array(

            "draw"            => intval($dt_response->draw),

            "recordsTotal"    => intval($dt_response->recordsTotal),

            "recordsFiltered" => intval($dt_response->recordsFiltered),

            "data"            => $dt_data,

            'count_data'=>$count_data

        );

        echo json_encode($json_data);

    }

     public function counsellingindexfilter()

    {

        // echo "asa";die;

        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {

            access_denied();

        }

        $data = array();

        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');

        $data['optometry_options'] = $this->getOptometryOptionsData();

        $category_dosage            = $this->medicine_dosage_model->getCategoryDosages();

        $data['category_dosage']    = $category_dosage;

        $doctors                    = $this->staff_model->getStaffbyrole(3);

        $data["doctors"]            = $doctors;

                $data['operation_list']      = $this->operationtheatre_model->operation_list();

        $alldoctors                    = $this->staff_model->getStaffbyrole(14);

        $data["alldoctors"]            = $alldoctors;

        $data['organisation']   = $this->organisation_model->get();

        $data['medicineCategory']   = $this->medicine_category_model->getMedicineCategory();

        $data['intervaldosage']  = $this->medicine_dosage_model->getIntervalDosage();

        $data['durationdosage']  = $this->medicine_dosage_model->getDurationDosage();

        $data['complaints_data'] = $this->master_model->getMasterDataLike(array('master_type' => 'optometry_complaint'),array(), 'master_data');



        $this->session->set_userdata('top_menu', 'optometry');

        

         

        // $this->form_validation->set_rules('date', $this->lang->line('date')." ".$this->lang->line('to')." ".$this->lang->line('date'), 'trim|required|xss_clean');

         

        // $this->form_validation->set_rules('insurer', $this->lang->line('insurer'), 'trim|required|xss_clean');

        // $this->form_validation->set_rules('status', $this->lang->line('status'), 'trim|required|xss_clean');

              

              

        // if ($this->form_validation->run() == TRUE) {

          

            $insurer = $this->input->post("insurer");

            $status = $this->input->post("status");

            $date = date("Y-m-d", $this->customlib->datetostrtotime($this->input->post("date"))); 

            $data["insurer"] = $insurer;

            $data["status"] = $status;    

            $data["date"] = $date;    

            // echo "<pre>";

            // print_r($data);die;

            $enquiry_list = $this->patient_model->recordfilter($insurer, $date, $status);             

        // } else {

        //     $enquiry_list = $this->patient_model->recordfilter();

        // }

        

 $m               = json_decode($enquiry_list);

  echo "<pre>";

        print_r($m);die;

// $data['enquiry_list'] = $enquiry_list;

        

        

        $this->load->view("layout/header");

        $this->load->view("admin/optometry/counselling_index_filter", $data);

        $this->load->view("layout/footer");

    }

    

     public function counselling_filter_validation()

    {

        //$search = $this->input->post('search');

        //$this->form_validation->set_rules('search_type', $this->lang->line('search_type'), 'trim|required|xss_clean');



       

            $data=[];

            $search=[];

            $search['search_type']   = $this->input->post('search_type');

            $search['date_from']     = $this->input->post('date_from');

            $search['date_to']       = $this->input->post('date_to');

            

            if ($search['search_type'] == 'period') {



                $start_date = $this->customlib->dateFormatToYYYYMMDD($search['date_from']);

                $end_date   = $this->customlib->dateFormatToYYYYMMDD($search['date_to']);

            } else {



                if (isset($search['search_type']) && $search['search_type'] != '') {

                    $dates               = $this->customlib->get_betweendate($search['search_type']);

                    $data['search_type'] = $search['search_type'];

                } else {

                    $dates               = $this->customlib->get_betweendate('this_year');

                    $data['search_type'] = '';

                }



                $start_date = $dates['from_date'];

                $end_date   = $dates['to_date'];

            }



            $param = array(

                'search_type'      => $this->input->post('search_type'),

                'status'    => $this->input->post('status'),

                'date_from'        => $start_date,

                'date_to'          => $end_date,

                'insurer'            => $this->input->post('insurer')

            );

            $json_array = array('status' => 'success', 'error' => '', 'param' =>$param, 'message' => $this->lang->line('success_message'));

        

        echo json_encode($json_array);

    }

}

