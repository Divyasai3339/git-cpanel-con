<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Audiometry extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        ini_set('display_errors', 1);
    }

    public function getAudiometryFiles()
    {
        $res = $this->master_model->get_single(array('opd_id' => $this->input->post('opd_id')), 'audiometry');
        if ($res) {
            $data = json_decode($res->files, true);
            $html = array();
            foreach ($data as $key => $value) {
                $html[] = $this->genrateDiv($value, $this->input->post('opd_id'), $res->id);
            }
            if ($data) {
                $resdata = array('flag' => 1, 'msg' => 'success', 'data' => $html, 'comments' => $res->comments);
            } else {
                $resdata = array('flag' => 0, 'msg' => 'failed', 'data' => null);
            }
        } else {
            $resdata = array('flag' => 2, 'msg' => 'no data found', 'data' => null);
        }

        echo json_encode($resdata, $this->input->post('opd_id'));
    }

    public function genrateDiv($result, $opd, $id)
    {
        $path = base_url() . "uploads/audiometry/OPD" . $opd . "/";

        $output = '';
        $output .= "<div class='col-sm-3 col-md-2 col-xs-6 img_div_modal image_div div_record_" . $id . "'>";
        $output .= "<div class='fadeoverlay'>";
        $output .= "<div class='fadeheight'>";
        $output .= "<img class='' data-fid='" . $result . "' data-content_type='" . $result . "' data-content_name='" . $result . "' data-is_image='" . $result . "' data-vid_url='" . $result . "' data-img='" . base_url() . $result . $result . "' src='" . $path . $result . "'>";
        $output .= "</div>";
        $output .= "<div class='overlay3'>";
        if ($this->rbac->hasPrivilege('media_manager', 'can_view')) {
            $output .= "<a href='#'  class='uploadcheckbtn audiometryImageView' data-record_id='" . $result . "' data-opd='" . $opd . "'><i class='fa fa-eye' aria-hidden='true'></i></a>";
        }
        if ($this->rbac->hasPrivilege('media_manager', 'can_delete')) {
            $output .= "<a href='#' class='uploadcheckbtn delete_audiometry_image' data-opd='" . $opd . "' data-record_id='" . $result . "' '><i class=' fa fa-trash-o'></i></a>";
        }

        $output .= "<p class='processing'>Processing...</p>";
        $output .= "</div>";

        $output .= "</div>";
        $output .= "</div>";
        return $output;
    }


    public function uploadAudiometryFiles()
    {
        // if (!$this->rbac->hasPrivilege('media_manager', 'can_add')) {
        //     access_denied();
        // }
        $opd = $this->input->post('opd_id');
        $dataInfo = array();
        $filenames = array();
        $this->load->library('upload');
        $config = array();
        if (!is_dir('uploads/audiometry/OPD' . $opd)) {
            mkdir('./uploads/audiometry/OPD' . $opd, 0777, true);
        }

        $config['upload_path'] = './uploads/audiometry/OPD' . $opd;
        $config['allowed_types'] = '*';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        $files = $_FILES;
        $cpt = count($_FILES['audiometryfiles']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['audiometryfiles']['name'] = str_replace(" ", "_", $_FILES["audiometryfiles"]['name'][$i]);
            $_FILES['audiometryfiles']['type'] = $files['audiometryfiles']['type'][$i];
            $_FILES['audiometryfiles']['tmp_name'] = $files['audiometryfiles']['tmp_name'][$i];
            $_FILES['audiometryfiles']['error'] = $files['audiometryfiles']['error'][$i];
            $_FILES['audiometryfiles']['size'] = $files['audiometryfiles']['size'][$i];
            //$this->load->library('upload', $config);
            $config['file_name'] = $_FILES['audiometryfiles']['name'];
            $this->upload->initialize($config);
            $res = $this->upload->do_upload('audiometryfiles');
            $data = $this->upload->data();
            array_push($filenames, $config['file_name']);
        }

        $res = $this->master_model->get_num_rows(array('opd_id' => $opd), 'audiometry');
        if ($res == 0) {
            $filesData = array(
                'files' => json_encode($filenames),
                'opd_id' => $opd
            );
            $response = $this->master_model->insert_data($filesData, 'audiometry');
        } else {
            $res = $this->master_model->get_single(array('opd_id' => $opd), 'audiometry');
            if (json_decode($res->files, true)) {
                $existedFiles = json_decode($res->files, true);
                $filenames = array_merge($filenames, $existedFiles);
            }
            $filesData = array(
                'files' => json_encode($filenames)
            );
            $response = $this->master_model->update_data($filesData, array('opd_id' => $opd), 'audiometry');
        }


        if ($response) {
            $resdata = array('flag' => 1, 'msg' => 'Successfully uploaded images');
        } else {
            $resdata = array('flag' => 0, 'msg' => 'Failed ...');
        }
        echo json_encode($resdata);
    }

    public function deleteImage()
    {
        $image = $this->input->post('record_id');
        $opd = $this->input->post('opd_id');
        $res = $this->master_model->get_single(array('opd_id' => $opd), 'audiometry');
        $images = json_decode($res->files, true);
        if (in_array($image, $images)) {
            if (($key = array_search($image, $images)) !== false) {
                unset($images[$key]);
                $data = array(
                    'files' => json_encode($images)
                );
                $this->master_model->update_data($data, array('opd_id' => $opd), 'audiometry');
                if (file_exists(FCPATH . "uploads/audiometry/OPD" . $opd . "/" . $image)) {
                    unlink(FCPATH . "uploads/audiometry/OPD" . $opd . "/" . $image);
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

    public function saveComments()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('opd_id', 'OPD Id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('comments', 'Comments', 'required|trim|xss_clean');
        if ($this->form_validation->run() == false) {
            $msg1 = "";
            if (form_error('opd_id') != "") {
                $msg1 = form_error('opd_id');
            } else if (form_error('comments') != "") {
                $msg1 = form_error('comments');
            } else {
                $msg1 = "Field error";
            }
            $resdata = array("flag" => 2, "msg" => $msg1, "data" => null);
        } else {
            $rows = $this->master_model->get_num_rows(array('opd_id' => $this->input->post('opd_id')), 'audiometry');
            if ($rows == 0) {
                $resdata = array("flag" => 0, "msg" => "Upload Files..", "data" => null);
                echo json_encode($resdata);
                die;
            }
            $data = array(
                'comments' => $this->input->post('comments')
            );
            $res = $this->master_model->update_data($data, array('opd_id' => $this->input->post('opd_id')), 'audiometry');
            if ($res) {
                $resdata = array("flag" => 1, "msg" => "Successfully Saved", "data" => null);
            }
        }
        echo json_encode($resdata);
    }

    public function printAudiometry()
    {
        $opdid  = $this->input->post('opd_id');
        $rows = $this->master_model->get_num_rows(array('opd_id' => $opdid), 'audiometry');
        if ($rows > 0) {
            $res = $this->master_model->get_single(array('opd_id' => $opdid), 'audiometry');
            $existedFiles = json_decode($res->files, true);
            $data['files'] = $existedFiles;
            $data['comments'] = $res->comments;
            $data['opd'] = $opdid;
            $data["print_details"]    = $this->printing_model->getheaderfooter('opdpre');
            $this->load->view('admin/audiometry/printdesign', $data);
        }
    }

    public function designPrint($files, $comments, $opd)
    {
        $data['files'] = $files;
        $data['comments'] = $comments;
        $data['opd'] = $opd;
        return $this->load->view('admin/audiometry/printdesign', $data);
    }
}
