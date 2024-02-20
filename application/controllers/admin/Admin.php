<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Enc_lib');
        $this->load->library('datatables');
        $this->config->load("payroll");
        $this->config->load("image_valid");
        $this->config->load("mailsms");
        $this->load->model('transaction_model');
        $marital_status = $this->config->item('marital_status');
        $bloodgroup     = $this->config->item('bloodgroup');
        $this->load->library('Customlib');
        $this->load->helper('customfield_helper');
    }

    public function unauthorized()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('unauthorized', $data);
        $this->load->view('layout/footer', $data);
    }

    public function getUserImage()
    {
        $id     = $this->customlib->getLoggedInUserID();
        $result = $this->staff_model->get($id);
    }

    public function updatePurchaseCode()
    {
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'required|valid_email|trim|xss_clean');
        $this->form_validation->set_rules('envato_market_purchase_code', $this->lang->line('purchase_code'), 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'email'                       => form_error('email'),
                'envato_market_purchase_code' => form_error('envato_market_purchase_code'),
            );
            $array = array('status' => '2', 'error' => $data);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($array));
        } else {

            $response = $this->auth->app_update();
        }
    }

    public function backup()
    {
        if (!$this->rbac->hasPrivilege('backup', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'schsettings/index');
        $this->session->set_userdata('inner_menu', 'admin/backup');
        $data['title'] = $this->lang->line('backup_history');
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            if ($this->input->post('backup') == "upload") {
                $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
                if ($this->form_validation->run() == false) {
                } else {
                    if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                        $fileInfo  = pathinfo($_FILES["file"]["name"]);
                        $file_name = "db-" . date("Y-m-d_H-i-s") . ".sql";
                        move_uploaded_file($_FILES["file"]["tmp_name"], "./backup/temp_uploaded/" . $file_name);
                        $folder_name  = 'temp_uploaded';
                        $path         = './backup/';
                        $filePath     = $path . $folder_name . '/' . $file_name;
                        $file_restore = $this->load->file($path . $folder_name . '/' . $file_name, true);
                        $db           = (array) get_instance()->db;
                        $conn         = mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);

                        $sql   = '';
                        $error = '';

                        if (file_exists($filePath)) {
                            $lines = file($filePath);

                            foreach ($lines as $line) {

                                // Ignoring comments from the SQL script
                                if (substr($line, 0, 2) == '--' || $line == '') {
                                    continue;
                                }

                                $sql .= $line;

                                if (substr(trim($line), -1, 1) == ';') {
                                    $result = mysqli_query($conn, $sql);
                                    if (!$result) {
                                        $error .= mysqli_error($conn) . "\n";
                                    }
                                    $sql = '';
                                }
                            }
                            $msg = $this->lang->line('restored_message');
                        } // end if file exists


                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
                        redirect('admin/admin/backup');
                    }
                }
            }
            if ($this->input->post('backup') == "backup") {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
                $this->load->helper('download');
                $this->load->dbutil();
                $version  = $this->customlib->getAppVersion();
                $filename = "db_ver_" . $version . '_' . date("Y-m-d_H-i-s") . ".sql";
                $prefs    = array(
                    'ignore'     => array(),
                    'format'     => 'txt',
                    'filename'   => 'mybackup.sql',
                    'add_drop'   => true,
                    'add_insert' => true,
                    'newline'    => "\n",
                );
                $backup = $this->dbutil->backup($prefs);
                $this->load->helper('file');
                write_file('./backup/database_backup/' . $filename, $backup);
                redirect('admin/admin/backup');
                force_download($filename, $backup);
                $this->session->set_flashdata('feedback', $this->lang->line('success_message_for_client_to_see'));
                redirect('admin/admin/backup');
            } else if ($this->input->post('backup') == "restore") {
                $folder_name  = 'database_backup';
                $file_name    = $this->input->post('filename');
                $path         = './backup/';
                $filePath     = $path . $folder_name . '/' . $file_name;
                $file_restore = $this->load->file($path . $folder_name . '/' . $file_name, true);
                $db           = (array) get_instance()->db;
                $conn         = mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);

                $sql   = '';
                $error = '';

                if (file_exists($filePath)) {
                    $lines = file($filePath);

                    foreach ($lines as $line) {

                        // Ignoring comments from the SQL script
                        if (substr($line, 0, 2) == '--' || $line == '') {
                            continue;
                        }

                        $sql .= $line;

                        if (substr(trim($line), -1, 1) == ';') {
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                $error .= mysqli_error($conn) . "\n";
                            }
                            $sql = '';
                        }
                    }
                    $msg = $this->lang->line('restored_message');
                } // end if file exists
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $msg . '</div>');
                redirect('admin/admin/backup');
            }
        }
        $dir    = "./backup/database_backup/";
        $result = array();
        $cdir   = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }
        $data['dbfileList']  = $result;
        $setting_result      = $this->setting_model->get();
        $data['settinglist'] = $setting_result;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/backup', $data);
        $this->load->view('layout/footer', $data);
    }

    public function changepass()
    {
        $this->session->set_userdata('top_menu', 'System Settings');
        $this->session->set_userdata('sub_menu', 'changepass/index');
        $data['title'] = $this->lang->line('change_password');
        $this->form_validation->set_rules('current_pass', $this->lang->line('current_password'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('new_pass', $this->lang->line('new_password'), 'trim|required|xss_clean|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $sessionData            = $this->session->userdata('hospitaladmin');
            $this->data['id']       = $sessionData['id'];
            $this->data['username'] = $sessionData['username'];
            $this->load->view('layout/header', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $sessionData = $this->session->userdata('hospitaladmin');
            $userdata    = $this->customlib->getUserData();
            $data_array  = array(
                'current_pass' => $this->input->post('current_pass'),
                'new_pass'     => md5($this->input->post('new_pass')),
                'user_id'      => $sessionData['id'],
                'user_email'   => $sessionData['email'],
                'user_name'    => $sessionData['username'],
            );
            $newdata = array(
                'id'       => $sessionData['id'],
                'password' => $this->enc_lib->passHashEnc($this->input->post('new_pass')),
            );
            $check  = $this->enc_lib->passHashDyc($this->input->post('current_pass'), $userdata["password"]);
            $query1 = $this->admin_model->checkOldPass($data_array);

            if ($query1) {

                if ($check) {
                    $query2 = $this->staff_model->add($newdata);
                    if ($query2) {
                        $data['error_message'] = "<div class='alert alert-success'>" . $this->lang->line('password_changed_successfully') . "</div>";
                        $this->load->view('layout/header', $data);
                        $this->load->view('admin/change_password', $data);
                        $this->load->view('layout/footer', $data);
                    }
                } else {
                    $data['error_message'] = "<div class='alert alert-danger'>" . $this->lang->line('invalid_current_password') . "</div>";
                    $this->load->view('layout/header', $data);
                    $this->load->view('admin/change_password', $data);
                    $this->load->view('layout/footer', $data);
                }
            } else {

                $data['error_message'] = "<div class='alert alert-danger'>" . $this->lang->line('invalid_current_password') . "</div>";
                $this->load->view('layout/header', $data);
                $this->load->view('admin/change_password', $data);
                $this->load->view('layout/footer', $data);
            }
        }
    }

    public function downloadbackup($file)
    {
        $this->load->helper('download');
        $filepath = "./backup/database_backup/" . $file;
        $data     = file_get_contents($filepath);
        $name     = $file;
        force_download($name, $data);
    }

    public function dropbackup($file)
    {
        if (!$this->rbac->hasPrivilege('backup', 'can_delete')) {
            access_denied();
        }
        unlink('./backup/database_backup/' . $file);
        redirect('admin/admin/backup');
    }

    public function disablepatient()
    {
        $data['title']      = 'Search';
        $userdata           = $this->customlib->getUserData();
        $data['fields']     = $this->customfield_model->get_custom_fields('patient', 1);
        $data["bloodgroup"] = $this->bloodbankstatus_model->get_product(null, 1);
        $this->load->view('layout/header', $data);
        $this->load->view('admin/searchdisablepatient', $data);
        $this->load->view('layout/footer', $data);
    }

    public function search()
    {
        if (!$this->rbac->hasPrivilege('patient', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'setup/patient');
        $data['title']       = 'Search';
        $search_text         = $this->input->post('search_text');
        $data['search_text'] = trim($search_text);
        $data["bloodgroup"]  = $this->bloodbankstatus_model->get_product(null, 1);
        $data['fields']      = $this->customfield_model->get_custom_fields('patient', 1);
        $userdata            = $this->customlib->getUserData();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/search', $data);
        $this->load->view('layout/footer', $data);
    }

    /*
    This Function is used to Get all active patient Recoerds
     */

    public function getpatientdatatable()
    {
        $search_text = $this->input->post('search_text');
        $dt_response = $this->patient_model->searchDataTablePatientRecord($search_text);
        $fields      = $this->customfield_model->get_custom_fields('patient', 1);
        $dt_response = json_decode($dt_response);
        $dt_data     = array();
        $info        = array();
        $data        = array();
        $url         = array();
        $info_data   = array('OPD', 'IPD', 'Radiology', 'Pathology', 'Pharmacy', 'Operation Theatre');
        $info_url    = array();
        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {
                $row = array();
                if ($value->is_active == 'yes') {
                    $id = $value->id;

                    $info_url[0] = base_url() . 'admin/patient/profile/' . $value->id . "/" . $value->is_active;
                    $info_url[1] = base_url() . 'admin/patient/ipdprofile/' . $value->id;
                    $info_url[2] = base_url() . 'admin/radio/getTestReportBatch';
                    $info_url[3] = base_url() . 'admin/pathology/getTestReportBatch';
                    $info_url[4] = base_url() . 'admin/pharmacy/bill';

                    $info[0] = $this->db->where("patient_id", $id)->get("opd_details");
                    $info[1] = $this->db->where("patient_id", $id)->get("ipd_details");
                    $info[2] = $this->db->where("patient_id", $id)->get("radiology_report");
                    $info[3] = $this->db->where("patient_id", $id)->get("pathology_report");
                    $info[4] = $this->db->where("patient_id", $id)->get("pharmacy_bill_basic");

                    for ($i = 0; $i < sizeof($info); $i++) {
                        if ($info[$i]->num_rows() > 0) {
                            $data[$i] = $info_data[$i];
                            $url[$i]  = $info_url[$i];
                        } else {
                            unset($data[$i]);
                            unset($url[$i]);
                        }
                    }
                    $result[$key]['info'] = $data;
                    $result[$key]['url']  = $url;
                } else {
                    unset($result[$key]);
                }

                if ($value->age) {
                    $age = $value->age . " " . $this->lang->line("years");
                } else {
                    $age = " 0 " . $this->lang->line("years");
                }
                if ($value->month) {
                    $month = ", " . $value->month . " " . $this->lang->line("month");
                } else {
                    $month = ", " . " 0 " . $this->lang->line("month");
                }

                $action = "<a href='#' onclick='getpatientData(" . $value->id . ")' class='btn btn-default btn-xs pull-right'  data-toggle='modal' title='" . $this->lang->line('show') . "'><i class='fa fa-reorder'></i></a>";

                $action .= "<div class='btn-group' style='margin-left:2px;'>";
                if (!empty($result[$key]['info'])) {
                    $action .= "<a href='#' style='width: 20px;border-radius: 2px;' class='btn btn-default btn-xs'  data-toggle='dropdown' title='" . $this->lang->line('show') . "'><i class='fa fa-ellipsis-v'></i></a>";
                    $action .= "<ul class='dropdown-menu dropdown-menu2' role='menu'>";

                    foreach ($result[$key]['info'] as $pkey => $pvalue) {
                        $action .= "<li>" . "<a href='" . $result[$key]['url'][$pkey] . "' class='btn btn-default btn-xs'  data-toggle='' title=''>" . $pvalue . "</a>" . "</li>";
                    }
                    $action .= "</ul>";
                }
                $action .= "</div>";
                $first_action = "<a href='#'  class='btn btn-default btn-xs'  data-toggle='modal' title=''>";
                $checkbox     = "<input  class='chk2 enable_delete' type='checkbox' name='patient[]' value='" . $value->id . "'>";

                //==============================
                $row[] = $checkbox;
                $row[] = $first_action . composePatientName($value->patient_name, $value->id) . "</a>";
                $row[] = $this->customlib->getPatientAge($value->age, $value->month, $value->day);
                $row[] = $value->gender;
                $row[] = $value->mobileno;
                $row[] = $value->guardian_name;
                $row[] = $value->address;
                if ($value->is_dead == 'yes') {
                    $row[] = $this->lang->line('yes');
                } else {
                    $row[] = $this->lang->line('no');
                }

                //====================
                if (!empty($fields)) {
                    foreach ($fields as $fields_key => $fields_value) {
                        $display_field = $value->{"$fields_value->name"};
                        if ($fields_value->type == "link") {
                            $display_field = "<a href=" . $value->{"$fields_value->name"} . " target='_blank'>" . $value->{"$fields_value->name"} . "</a>";
                        }
                        $row[] = $display_field;
                    }
                }
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

    /**
     *    This Function is used to Get all Deactive patient Recoerds
     */

    public function getdisablepatientdatatable()
    {
        $dt_response = $this->patient_model->getAlldisablepatientRecord();
        //echo $this->db->last_query();die;
        $fields      = $this->customfield_model->get_custom_fields('patient', 1);
        $dt_response = json_decode($dt_response);
        $dt_data     = array();
        $info        = array();
        $data        = array();
        $url         = array();
        $info_data   = array('OPD', 'IPD', 'Radiology', 'Pathology', 'Pharmacy', 'Operation Theatre');
        $info_url    = array();
        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {

                $row = array();

                $age    = $this->customlib->getPatientAge($value->age, $value->month, $value->day);
                $action = "<a href='#' onclick='getpatientData(" . $value->id . ")' class='btn btn-default btn-xs pull-right'  data-toggle='modal' title='" . $this->lang->line('show') . "'><i class='fa fa-reorder'></i></a>";

                $action .= "<div class='btn-group' style='margin-left:2px;'>";
                if (!empty($result[$key]['info'])) {
                    $action .= "<a href='#' style='width: 20px;border-radius: 2px;' class='btn btn-default btn-xs'  data-toggle='dropdown' title='" . $this->lang->line('show') . "'><i class='fa fa-ellipsis-v'></i></a>";
                    $action .= "<ul class='dropdown-menu dropdown-menu2' role='menu'>";

                    foreach ($result[$key]['info'] as $pkey => $pvalue) {
                        $action .= "<li>" . "<a href='" . $result[$key]['url'][$pkey] . "' class='btn btn-default btn-xs'  data-toggle='' title=''>" . $pvalue . "</a>" . "</li>";
                    }
                    $action .= "</ul>";
                }
                $action .= "</div>";
                $first_action = "<a href='#' onclick='getpatientData(" . $value->id . ")' class='btn btn-default btn-xs'  data-toggle='modal' title=''>";

                $row[] = $first_action . composePatientName($value->patient_name, $value->id) . "</a>";
                $row[] = $age;
                $row[] = $value->gender;
                $row[] = $value->mobileno;
                $row[] = $value->guardian_name;
                $row[] = $value->address;
                if (!empty($fields)) {
                    foreach ($fields as $fields_key => $fields_value) {
                        $display_field = $value->{"$fields_value->name"};
                        if ($fields_value->type == "link") {
                            $display_field = "<a href=" . $value->{"$fields_value->name"} . " target='_blank'>" . $value->{"$fields_value->name"} . "</a>";
                        }
                        $row[] = $display_field;
                    }
                }
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

    public function patientDetails()
    {
        if (!$this->rbac->hasPrivilege('patient', 'can_view')) {
            access_denied();
        }
        $id   = $this->input->post("id");
        $data = $this->patient_model->patientDetails($id);
        if (($data['dob'] == '') || ($data['dob'] == '0000-00-00') || ($data['dob'] == '1970-01-01')) {
            $data['dob'] = "";
        } else {
            $data['dob'] = $this->customlib->YYYYMMDDTodateFormat($data['dob']);
        }

        echo json_encode($data);
    }

    public function getCollectionbymonth()
    {
        $result = $this->admin_model->getMonthlyCollection();
        return $result;
    }

    public function getCollectionbyday($date)
    {
        $result = $this->admin_model->getCollectionbyDay($date);
        if ($result[0]['amount'] == "") {
            $return = 0;
        } else {
            $return = $result[0]['amount'];
        }
        return $return;
    }

    public function getExpensebyday($date)
    {
        $result = $this->admin_model->getExpensebyDay($date);
        if ($result[0]['amount'] == "") {
            $return = 0;
        } else {
            $return = $result[0]['amount'];
        }
        return $return;
    }

    public function getExpensebymonth()
    {
        $result = $this->admin_model->getMonthlyExpense();
        return $result;
    }

    public function whatever($feecollection_array, $start_month_date, $end_month_date)
    {
        $return_amount = 0;
        $st_date       = strtotime($start_month_date);
        $ed_date       = strtotime($end_month_date);
        if (!empty($feecollection_array)) {
            while ($st_date <= $ed_date) {
                $date = date('Y-m-d', $st_date);
                foreach ($feecollection_array as $key => $value) {
                    if ($value['date'] == $date) {
                        $return_amount = $return_amount + $value['amount'] + $value['amount_fine'];
                    }
                }
                $st_date = $st_date + 86400;
            }
        } else {
        }
        return $return_amount;
    }

    public function startmonthandend()
    {
        $startmonth = $this->setting_model->getStartMonth();
        if ($startmonth == 1) {
            $endmonth = 12;
        } else {
            $endmonth = $startmonth - 1;
        }
        return array($startmonth, $endmonth);
    }

    public function handle_upload()
    {
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('sql');
            $temp        = explode(".", $_FILES["file"]["name"]);
            $extension   = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if ($_FILES["file"]["type"] != 'application/octet-stream') {

                $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }
            if (!in_array(strtolower($extension), $allowedExts)) {

                $this->form_validation->set_message('handle_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($_FILES["file"]["size"] > 10240000) {

                $this->form_validation->set_message('handle_upload', $this->lang->line('file_size_shoud_be_less_than_100kB'));
                return false;
            }
            return true;
        } else {
            $this->form_validation->set_message('handle_upload', $this->lang->line('the_file_field_is_required'));
            return false;
        }
    }

    public function generate_key($length = 12)
    {
        $str        = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max        = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function addCronsecretkey($id)
    {
        $key  = $this->generate_key(25);
        $data = array('cron_secret_key' => $key);
        $this->setting_model->add_cronsecretkey($data, $id);
        redirect('admin/admin/backup');
    }

      public function dashboard()
    {
        $this->session->set_userdata('top_menu', 'dashboard');
        $this->session->set_userdata('sub_menu', '');
        $role                        = $this->customlib->getStaffRole();
        $role_id                     = json_decode($role)->id;
        $staffid                     = $this->customlib->getStaffID();
        $notifications               = $this->notification_model->getUnreadStaffNotification($staffid, $role_id);
        $data['notifications']       = $notifications;
        $systemnotifications         = $this->notification_model->getUnreadNotification();
        $data['systemnotifications'] = $systemnotifications;
        $Current_year                = date('Y');
        $Next_year                   = date("Y");
        $current_date                = date('Y-m-d');
        $data['title']               = 'Dashboard';
        $Current_start_date          = date('01');
        $Current_date                = date('d');
        $Current_month               = date('m');
        $month_collection            = 0;
        $month_expense               = 0;
        $total_opd_patients          = 0;
        $total_ipd_patients          = 0;
        $ar[0]                       = 01;
        $ar[1]                       = 12;
        $year_str_month              = $Current_year . '-' . $ar[0] . '-01';
        $year_end_month              = date("Y-m-t", strtotime($Next_year . '-' . $ar[1] . '-01'));
        //======================Current Month Collection ==============================
        $first_day_this_month = date('Y-m-01');
        $tot_roles            = $this->role_model->get();
        foreach ($tot_roles as $key => $value) {
            if ($value["id"] != 1) {
                $count_roles[$value["name"]] = $this->role_model->count_roles($value["id"]);
            }
        }
        $data["roles"]       = $count_roles;
        $expense             = $this->expense_model->getTotalExpenseBwdate(date('Y-m-01'), date('Y-m-t'));
        $data["expense"]     = $expense;
        $start_month         = strtotime($year_str_month);
        $start               = strtotime($year_str_month);
        $end                 = strtotime($year_end_month);
        $coll_month          = array();
        $s                   = array();
        $ex                  = array();
        $total_month         = array();
        $start_session_month = strtotime($year_str_month);
        while ($start_month <= $end) {
            $total_month[] = $this->lang->line(strtolower(date('M', $start_month)));
            $month_start   = date('Y-m-d', $start_month);
            $month_end     = date("Y-m-t", $start_month);
            $where_date    = array('payment_date >=' => $month_start, 'payment_date <=' => $month_end);
            $return        = $this->transaction_model->get_monthTransaction($where_date);

            if (!empty($return)) {
                $at  = 0;
                $s[] = $at + $return;
            } else {
                $s[] = "0.00";
            }
            $where_condition = array('date >=' => $month_start, 'date <=' => $month_end);
            $expense_monthly = $this->expense_model->getTotalExpenseBwdate($month_start, $month_end);
            if (!empty($expense_monthly)) {
                $amt  = 0;
                $ex[] = $amt + $expense_monthly->amount;
            }
            $start_month = strtotime("+1 month", $start_month);
        }
        $data['yearly_collection'] = $s;
        $data['yearly_expense']    = $ex;
        $data['total_month']       = $total_month;
        $event_colors              = array("#03a9f4", "#c53da9", "#757575", "#8e24aa", "#d81b60", "#7cb342", "#fb8c00", "#fb3b3b");
        $data["event_colors"]      = $event_colors;
        $userdata                  = $this->customlib->getUserData();
        $data["role"]              = $userdata["user_type"];
        $search_opd_income         = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'opd_id !=' => null);
        $data['opd_income']        = $this->transaction_model->get_monthTransaction($search_opd_income);
       
        $searchToday_opd_income    = array('payment_date =' => date("Y-m-d"), 'opd_id !=' => null);
        $data['today_opd_income']  = $this->transaction_model->get_todayTransaction($searchToday_opd_income);
        
        
        $opd_income_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'opd_id !=' => null);
        $data['opd_income_cash']   = $this->transaction_model->get_todayTransaction($opd_income_cash);
        
        $opd_income_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'opd_id !=' => null);
        $data['opd_income_cheque'] = $this->transaction_model->get_todayTransaction($opd_income_cheque);
        
        $opd_income_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'opd_id !=' => null);
        $data['opd_income_upi']    = $this->transaction_model->get_todayTransaction($opd_income_upi);


     
        
        $search_ipd_income         = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'ipd_id !=' => null);
        $data['ipd_income']        = $this->transaction_model->get_monthTransaction($search_ipd_income);
        
        $searchToday_ipd_income    = array('payment_date =' => date("Y-m-d"), 'ipd_id !=' => null);
        $data['today_ipd_income']  = $this->transaction_model->get_todayTransaction($searchToday_ipd_income);
     

        $ipd_income_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'ipd_id !=' => null);
        $data['ipd_income_cash']   = $this->transaction_model->get_todayTransaction($ipd_income_cash);
        
        $ipd_income_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'ipd_id !=' => null);
        $data['ipd_income_cheque'] = $this->transaction_model->get_todayTransaction($ipd_income_cheque);

        $ipd_income_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'ipd_id !=' => null);
        $data['ipd_income_upi']    = $this->transaction_model->get_todayTransaction($ipd_income_upi);

        $search_pharmacy_income    = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'pharmacy_bill_basic_id !=' => null);
        $data['pharmacy_income']   = $this->transaction_model->get_monthTransaction($search_pharmacy_income);
       
        $searchToday_pharmacy_income = array('pharmacy_bill_basic_id !=' => null);
        $data['today_pharmacy_income']  = $this->transaction_model->get_todaypharmacyTransaction($searchToday_pharmacy_income);
        
        $wherePharmacy = array('payment_date >=' => date('Y-m-d'),'pharmacy_bill_basic_id !=' => null);
        $data['today_pharmacy_refund']  = $this->transaction_model->get_today_Refund_Transaction($wherePharmacy);

       
         $ipd_pharmacy_cash           = array('payment_mode =' => 'Cash', 'pharmacy_bill_basic_id !=' => null);
        $data['ipd_pharmacy_cash']   = $this->transaction_model->get_todayTransactionLike($ipd_pharmacy_cash);
        
           
        $ipd_pharmacy_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'pharmacy_bill_basic_id !=' => null);
        $data['ipd_pharmacy_cheque'] = $this->transaction_model->get_todayTransaction($ipd_pharmacy_cheque);
        
        $ipd_pharmacy_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'pharmacy_bill_basic_id !=' => null);
        $data['ipd_pharmacy_upi']    = $this->transaction_model->get_todayTransaction($ipd_pharmacy_upi);

        $search_pathology_income   = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'pathology_billing_id !=' => null);
        $data['pathology_income']  = $this->transaction_model->get_monthTransaction($search_pathology_income);

        $searchToday_pathology_income    = array('payment_date =' => date("Y-m-d"), 'pathology_billing_id !=' => null);
        $data['today_pathology_income']  = $this->transaction_model->get_todayTransaction($searchToday_pathology_income);
        
        $pathology_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'pathology_billing_id !=' => null);
        $data['pathology_cash']   = $this->transaction_model->get_todayTransaction($pathology_cash);
           
        $pathology_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'pathology_billing_id !=' => null);
        $data['pathology_cheque'] = $this->transaction_model->get_todayTransaction($pathology_cheque);
        
        $pathology_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'pathology_billing_id !=' => null);
        $data['pathology_upi']    = $this->transaction_model->get_todayTransaction($pathology_upi);
        
        $search_radiology_income   = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'radiology_billing_id !=' => null);
        $data['radiology_income']  = $this->transaction_model->get_monthTransaction($search_radiology_income);




        $searchToday_radiology_income    = array('payment_date =' => date("Y-m-d"), 'radiology_billing_id !=' => null);
        $data['today_radiology_income']  = $this->transaction_model->get_todayTransaction($searchToday_radiology_income);
        
        $radiology_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'radiology_billing_id !=' => null);
        $data['radiology_cash']   = $this->transaction_model->get_todayTransaction($radiology_cash);
           
        $radiology_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'radiology_billing_id !=' => null);
        $data['radiology_cheque'] = $this->transaction_model->get_todayTransaction($radiology_cheque);
        
        $radiology_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'radiology_billing_id !=' => null);
        $data['pathology_upi']    = $this->transaction_model->get_todayTransaction($radiology_upi);

        $search_blood_bank_income  = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'blood_issue_id !=' => null);
        $data['blood_bank_income'] = $this->transaction_model->get_monthTransaction($search_blood_bank_income);

        
        $searchToday_blood_bank_income    = array('payment_date =' => date("Y-m-d"), 'blood_issue_id !=' => null);
        $data['today_blood_bank_income']  = $this->transaction_model->get_todayTransaction($searchToday_blood_bank_income);
        
        $blood_bank_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'blood_issue_id !=' => null);
        $data['blood_bank_cash']   = $this->transaction_model->get_todayTransaction($blood_bank_cash);
           
        $blood_bank_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'blood_issue_id !=' => null);
        $data['blood_bank_cheque'] = $this->transaction_model->get_todayTransaction($blood_bank_cheque);
        
        $blood_bank_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'blood_issue_id !=' => null);
        $data['blood_bank_upi']    = $this->transaction_model->get_todayTransaction($blood_bank_upi);






        $search_ambulance_income   = array('payment_date >=' => date('Y-m-01'), 'payment_date <=' => date("Y-m-t"), 'ambulance_call_id !=' => null);

        

        $data['ambulance_income']  = $this->transaction_model->get_monthTransaction($search_ambulance_income);
        

        $searchToday_ambulance_income    = array('payment_date =' => date("Y-m-d"), 'blood_issue_id !=' => null);
        $data['today_ambulance_income']  = $this->transaction_model->get_todayTransaction($searchToday_ambulance_income);
        
        $ambulance_income_cash           = array('payment_mode =' => 'Cash','payment_date =' => date("Y-m-d"), 'ambulance_call_id !=' => null);
        $data['ambulance_income_cash']   = $this->transaction_model->get_todayTransaction($ambulance_income_cash);
           
        $ambulance_income_cheque         = array('payment_mode =' => 'Cheque','payment_date =' => date("Y-m-d"), 'ambulance_call_id !=' => null);
        $data['ambulance_income_cheque'] = $this->transaction_model->get_todayTransaction($ambulance_income_cheque);
        
        $ambulance_income_upi            = array('payment_mode =' => 'UPI','payment_date =' => date("Y-m-d"), 'ambulance_call_id !=' => null);
        $data['ambulance_income_upi']    = $this->transaction_model->get_todayTransaction($ambulance_income_upi);
        $month_expences            = $this->expense_model->getTotalExpenseBwdate(date('Y-m-01'), date('Y-m-t'));
        $data['expences']          = $month_expences->amount;
        $where_date                = array('date >=' => date('Y-m-01'), 'date <=' => date('Y-m-t'));

        $data['general_income'] = $this->income_model->getTotal($where_date);
        $parameter              = array(
            'opd'        => $data['opd_income'],
            'ipd'        => $data['ipd_income'],
            'pharmacy'   => $data['pharmacy_income'],
            'pathology'  => $data['pathology_income'],
            'radiology'  => $data['radiology_income'],
            'blood_bank' => $data['blood_bank_income'],
            'ambulance'  => $data['ambulance_income'],
            'general'    => $data['general_income'],
        );

        $label  = array($this->lang->line('opd'), $this->lang->line('ipd'), $this->lang->line('pharmacy'), $this->lang->line('pathology'), $this->lang->line('radiology'), $this->lang->line('blood_bank'), $this->lang->line('ambulance'), $this->lang->line('income'));
        $module = array('opd', 'ipd', 'pharmacy', 'pathology', 'radiology', 'blood_bank', 'ambulance', 'income');

        $tot_data = array_sum($parameter);
        $jsonarr  = array();
        $i        = 0;

        foreach ($parameter as $key => $value) {
            $data[$key . "_income"] = number_format($value, 2);
            if (($this->module_lib->hasActive($module[$i]))) {
                if ($tot_data != 0) {
                    $jsonarr['value'][] = round((($value / $tot_data) * 100), 0);
                    $jsonarr['label'][] = $label[$i];
                } else {
                    $jsonarr['value'][] = 0;
                    $jsonarr['label'][] = $label[$i];
                }
            }
            if ($tot_data != 0) {
                $data[$key . "_cdata"] = ($value / $tot_data) * 100;
            } else {
                $data[$key . "_cdata"] = 0;
            }

            $i++;
        }

        $data['mysqlVersion'] = $this->setting_model->getMysqlVersion();
        $data['sqlMode']      = $this->setting_model->getSqlMode();
        $data['jsonarr']      = $jsonarr;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }

    public function updateandappCode()
    {
        $this->form_validation->set_rules('app-email', $this->lang->line('email'), 'required|valid_email|trim|xss_clean');
        $this->form_validation->set_rules('app-envato_market_purchase_code', $this->lang->line('purchase_code'), 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $data = array(
                'app-email'                       => form_error('app-email'),
                'app-envato_market_purchase_code' => form_error('app-envato_market_purchase_code'),
            );
            $array = array('status' => '2', 'error' => $data);

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($array));
        } else {
            //==================
            $response = $this->auth->andapp_update();
        }
    }

    public function masterdata($id)
    {
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'master_data');
        $master_cat =  $this->master_model->get_single(array('master_type' => 'category', 'master_key' => $id), 'master_data');
        $data['title'] = $master_cat->master_value;
        $data['type'] = $this->uri->segment(3);
        $data['categories'] = $this->master_model->get_data(array('master_type' => 'category'), 'master_data');
        $data['master_data'] = $this->master_model->get_data(array('master_type' => $id), 'master_data');
        $data['medicineCategory']   = $this->medicine_category_model->getMedicineCategory();
        $data['intervaldosage']  = $this->medicine_dosage_model->getIntervalDosage();
        $data['durationdosage']  = $this->medicine_dosage_model->getDurationDosage();
        $category_dosage            = $this->medicine_dosage_model->getCategoryDosages();
        $data['category_dosage']    = $category_dosage;
        $this->load->view('layout/header');
        $this->load->view('admin/master/master', $data);
        $this->load->view('layout/footer');
    }

    public function getMasterData($type)
    {
        $dt_response = $this->master_model->getMasterData($type);
        $dt_response = json_decode($dt_response);
        $dt_data     = array();
        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {
                $row = array();
                $is_prescription = $this->prescription_model->is_medicine_exist($value->id);
                //====================================
                $action = "<div class=''>";
                if($value->master_type=='medicine_templates' && $is_prescription==0){
                    $action .= '<a href="#" onclick="getRecord_id('.$value->id.')" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Add Prescription"><i class="fas fa-prescription"></i></a>';
                }else{
                    $action .= '<a href="#" onclick="view_prescription('. $value->id .')" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="View Prescription"><i class="fas fa-file-prescription"></i></a>';
                }
                $action .= "<a href='#'  class='btn btn-default btn-xs btnEditMaster' data-id=" . $value->id . "  data-toggle='tooltip' title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a>";
                $action .= "<a href='#'  class='btn btn-default btn-xs btnDeleteMaster' data-id=" . $value->id . "  data-toggle='tooltip' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                $action .= "</div>";

                //==============================
                $row[] = $value->master_value;
                // $row[] = $value->name;
                // $row[] = $value->optometrist;
                //$row[] = nl2br($value->symptoms);
                // $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->appointment_date, $this->time_format);
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

    public function getCategoryMasterData($type)
    {
        $dt_response = $this->master_model->getMasterData($type);
        $dt_response = json_decode($dt_response);
        $dt_data     = array();
        if (!empty($dt_response->data)) {
            foreach ($dt_response->data as $key => $value) {
                $row = array();
                //====================================
                $action = "<div class=''>";
                $action .= "<a href='#'  class='btn btn-default btn-xs btnEditMaster' data-id=" . $value->id . "  data-toggle='tooltip' title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a>";
                $action .= "<a href='#'  class='btn btn-default btn-xs btnDeleteMaster' data-id=" . $value->id . "  data-toggle='tooltip' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                $action .= "</div>";

                //==============================
                $row[] = $value->master_value;
                // $row[] = $value->name;
                // $row[] = $value->optometrist;
                //$row[] = nl2br($value->symptoms);
                // $row[] = $this->customlib->YYYYMMDDHisTodateFormat($value->appointment_date, $this->time_format);
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

    public function loadMasterData()
    {
        $master_type = $this->input->post('type');
        $res = $this->master_model->get_data(array('master_type' => $master_type), 'master_data');
        if ($res) {
            $resdata = array('flag' => 1, 'msg' => 'success', 'data' => $res);
        } else {
            $resdata = array('flag' => 0, 'msg' => 'failed', 'data' => null);
        }
        echo json_encode($resdata);
    }

    public function saveMasterData()
    {
        $id = $this->input->post('id');
        $master_key = $this->input->post('masterkey');
        $masterkey = str_replace(" ", "  ", $master_key);
        $mastername = $this->input->post('mastername');
        $type = $this->input->post('type');
        $data = array(
            'master_key' => $masterkey,
            'master_value' => $mastername,
        );
        if (empty($id) || $id == 0) {
            $count = $this->master_model->get_num_rows(array('master_key' => $masterkey, 'master_type' => $type), 'master_data');
            if ($count > 0) {
                $resdata = array('flag' => 2, 'msg' => "Data is already present");
            } else {
                $data['master_type'] = $type;
                $res = $this->master_model->insert_data($data, 'master_data');
                $operation = "Successfully Added Data";
                if ($res != 0) {
                    $resdata = array('flag' => 1, 'msg' => $operation);
                } else {
                    $resdata = array('flag' => 0, 'msg' => "Something went Wrong");
                }
            }
        } else {
            $res = $this->master_model->update_data($data, array('id' => $id), 'master_data');
            $operation = "Successfully Updated Data";
            $resdata = array('flag' => 1, 'msg' => $operation);
        }
        echo json_encode($resdata);
    }

    public function saveMasterCategoryData()
    {
        $id = $this->input->post('id');
        $master_key = $this->input->post('masterkey');
        $masterkey = str_replace(" ", "_", $master_key);
        $mastercategory = $this->input->post('mastercategory');
        $type = 'category';
        $data = array(
            'master_key' => $masterkey,
            'master_value' => $mastercategory,
        );

        if (empty($id) || $id == 0) {
            $count = $this->master_model->get_num_rows(array('master_key' => $masterkey, 'master_type' => $type), 'master_data');
            if ($count > 0) {
                $resdata = array('flag' => 2, 'msg' => "Data is already present");
            } else {
                $data['master_type'] = $type;
                $res = $this->master_model->insert_data($data, 'master_data');
                $operation = "Successfully Added Data";
                if ($res != 0) {
                    $resdata = array('flag' => 1, 'msg' => $operation);
                } else {
                    $resdata = array('flag' => 0, 'msg' => "Something went Wrong");
                }
            }
        } else {
            $res = $this->master_model->update_data($data, array('id' => $id), 'master_data');
            $operation = "Successfully Updated Data";
            $resdata = array('flag' => 1, 'msg' => $operation);
        }
        echo json_encode($resdata);
    }

    public function deleteMasterData()
    {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $res = $this->master_model->delete(array('id' => $id), 'master_data');
            if ($res) {
                $resdata  = array('flag' => 1, 'msg' => 'Successfully Deleted');
            } else {
                $resdata  = array('flag' => 0, 'msg' => 'Failed to delete');
            }
        } else {
            $resdata  = array('flag' => 0, 'msg' => 'Somthing went Wrong');
        }
        echo json_encode($resdata);
    }
    

    public function getSingleMasterData()
    {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $res = $this->master_model->get_single(array('id' => $id), 'master_data');
            if ($res) {
                $resdata  = array('flag' => 1, 'msg' => 'Success', 'data' => $res);
            } else {
                $resdata  = array('flag' => 0, 'msg' => 'Failed');
            }
        } else {
            $resdata  = array('flag' => 0, 'msg' => 'Somthing went Wrong');
        }
        echo json_encode($resdata);
    }
}
