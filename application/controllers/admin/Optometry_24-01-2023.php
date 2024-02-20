<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Optometry extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('optometry_model');
        $this->load->library('datatables');
        $this->time_format         = $this->customlib->getHospitalTimeFormat();
        $this->opd_prefix          = $this->customlib->getSessionPrefixByType('opd_no');

    }


    public function index()
    {
        if (!$this->rbac->hasPrivilege('opd_patient', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'optometry');

        $data = array();
        $data['disease_data'] = $this->master_model->get_data(array('master_type' => 'optometry_disease'), 'master_data');
        $data['optometry_options'] = $this->getOptometryOptionsData();
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
        $complaints = $this->input->post('complaints_data');
        $post_data = $this->input->post();
        $pgp = array();
        $vision = array();
        $dry_retinoscopy = array();
        $cyclo = array();
        $acceptance = array();
        $ant_segment = array();
        $nct = array();
        $at = array();
        $post_segment = array();
        $diagnosis = array();
        foreach ($post_data as $key => $val) {
            if (strpos($key, 'pgp_') !== false) {
                if ($val) {
                    $pgp[$key] = $val;
                } else {
                    $pgp[$key] = "";
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
            if (strpos($key, 'ps_') !== false) {
                if ($val) {
                    $post_segment[$key] = $val;
                } else {
                    $post_segment[$key] = "";
                }
            }
            if (strpos($key, 'diagnosis_') !== false) {
                if ($val) {
                    $diagnosis[$key] = $val;
                } else {
                    $diagnosis[$key] = "";
                }
            }
        }
        $history = array();
        foreach ($post_data['disease'] as $key => $val) {
            $history[$key]['disease'] = $val;
        }
        foreach ($post_data['duration'] as $key => $val) {
            $history[$key]['duration'] = $val;
        }
        foreach ($post_data['period'] as $key => $val) {
            $history[$key]['period'] = $val;
        }
        foreach ($post_data['medication'] as $key => $val) {
            $history[$key]['medication'] = $val;
        }
        foreach ($post_data['condition'] as $key => $val) {
            $history[$key]['condition'] = $val;
        }
        $complaints['od'] = $this->input->post('odcomplaints');
        $complaints['os'] = $this->input->post('oscomplaints');
        $complaints['selected_complaints'] = $this->input->post('selected_complaints');
        if (!empty($this->input->post('optometry_id'))) {
            $data = array(
                'history_data' => json_encode($history),
                'complaints_data' => json_encode($complaints),
                'pgp_data' => json_encode($pgp),
                'vision_data' => json_encode($vision),
                'dryretinoscopy_data' => json_encode($dry_retinoscopy),
                'antsegment_data' => json_encode($ant_segment),
                'nct_data' => json_encode($nct),
                'at_data' => json_encode($at),
                'cyclo_data' => json_encode($cyclo),
                'postsegment_data' => json_encode($post_segment),
                'diagnosis_data' => json_encode($diagnosis),
                'acceptance_data' => json_encode($acceptance),
                'optometric_comments' => $this->input->post('optometric_comments'),
            );
            $res =  $this->master_model->update_data($data, array('id' => $this->input->post('optometry_id')), 'optometry');
            $status = "Updated";
        } else {
            $data = array(
                'opd_id' => $this->input->post('opd_id'),
                'patient_id' => $this->input->post('patient_id'),
                'history_data' => json_encode($history),
                'complaints_data' => json_encode($complaints),
                'pgp_data' => json_encode($pgp),
                'vision_data' => json_encode($vision),
                'cyclo_data' => json_encode($cyclo),
                'dryretinoscopy_data' => json_encode($dry_retinoscopy),
                'antsegment_data' => json_encode($ant_segment),
                'nct_data' => json_encode($nct),
                'at_data' => json_encode($at),
                'postsegment_data' => json_encode($post_segment),
                'diagnosis_data' => json_encode($diagnosis),
                'acceptance_data' => json_encode($acceptance),
                'optometric_comments' => $this->input->post('optometric_comments'),
            );
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
        $data->pgp_data = json_decode($data->pgp_data);
        $data->vision_data = json_decode($data->vision_data);
        $data->dryretinoscopy_data = json_decode($data->dryretinoscopy_data);
        $data->cyclo_data = json_decode($data->cyclo_data);
        $data->acceptance_data = json_decode($data->acceptance_data);
        $data->antsegment_data = json_decode($data->antsegment_data);
        $data->nct_data = json_decode($data->nct_data);
        $data->at_data = json_decode($data->at_data);
        $data->postsegment_data = json_decode($data->postsegment_data);
        $data->diagnosis_data = json_decode($data->diagnosis_data);
        $data->history_data = json_decode($data->history_data);
        $data->print_data = json_decode($data->print_data);
        $data->optometric_comments = $data->optometric_comments;
        // $data->complaints_data = json_decode($data->complaints_data);

        $resdata = array('flag' => 1, 'msg' => "", 'data' => $data);
        echo json_encode($resdata);
    }


    public function getOptometryOptionsData()
    {
        $json = file_get_contents('backend/json-files/optometry.json');
        $json_data = json_decode($json);
        return $json_data;
    }

    public function get_complaints_data()
    {
        $search = $this->input->post('search');
        $result  = $this->master_model->getMasterDataLike(array('master_type' => 'optometry_complaint'), array('master_value' => $search), 'master_data');
        //$resultdata = array('flag'=>1,'data'=>$result);
        echo json_encode($result);
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
            'master_key' => str_replace(" ", "_", $master_key),
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

    public function getOptometryPatientsDataTable()
    {
        //$dt_response = $this->optometry_model->get_optometry_patients_datatable();
        $dt_response = $this->patient_model->getLatestopdvisitRecord();
        $dt_response = json_decode($dt_response);
        $dt_data     = array();
       
        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {
                $row = array();
                $opd_id           = $value->opdid;
                $patient_id       = $value->patientid;
                $optom =  $this->master_model->get_single(array('opd_id' => $opd_id), 'optometry');
                $action = "<div class=''>";
                $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadAudiometryImages' data-opd=" . $opd_id . "   data-toggle='tooltip' title='Upload Audiometry Photos'><i class='fa fa-upload'></i></a>";
                if ($optom) {
                    $action .= "<a href='#'  class='btn btn-default btn-xs viewOptometryData' data-opto_id ='" . $optom->id . "' data-opd='" . $opd_id . "' data-toggle='tooltip' title='VIEW EMR'><i class='fas fa fa-eye'></i></a>";
                } else {
                    $action .= "<a href='#' onclick='getRecord_emr(" . $opd_id . "," .$patient_id. ")' class='btn btn-default btn-xs'  data-toggle='tooltip' title='" . $this->lang->line('emr') . "'><i class='fas fa fa-plus'></i></a>";
                }
                $action .= "<a href='#'  class='btn btn-default btn-xs btnUploadVisitImages' data-opd=" . $opd_id . "  data-toggle='tooltip' title='Upload Images'><i class='fa fa-upload' aria-hidden='true'></i></a>";
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


    public function printemr()
    {
		$id                   = $this->input->post('opd_id');
        $optomery_data 		  = $this->master_model->get_single(array('id' => $id), 'optometry');
       
		
		$optomery_data->pgp_data = json_decode($optomery_data->pgp_data);
        $optomery_data->vision_data = json_decode($optomery_data->vision_data);
        $optomery_data->dryretinoscopy_data = json_decode($optomery_data->dryretinoscopy_data);
        $optomery_data->cyclo_data = json_decode($optomery_data->cyclo_data);
        $optomery_data->acceptance_data = json_decode($optomery_data->acceptance_data);
        $optomery_data->antsegment_data = json_decode($optomery_data->antsegment_data);
        $optomery_data->nct_data = json_decode($optomery_data->nct_data);
        $optomery_data->at_data = json_decode($optomery_data->at_data);
        $optomery_data->postsegment_data = json_decode($optomery_data->postsegment_data);
        $optomery_data->diagnosis_data = json_decode($optomery_data->diagnosis_data);
        $optomery_data->optometric_comments = $optomery_data->optometric_comments;
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
		
		
        $page = $this->load->view('admin/optometry/_printemr', $data, true);
        echo json_encode(array('status' => 1, 'page' => $page));

    }



    
}
