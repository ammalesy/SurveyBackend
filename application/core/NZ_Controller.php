<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin {
	var $a_id = NULL;
	var $a_user = NULL;
	var $a_name = NULL;
    var $permission = NULL;
    var $database_selected = NULL;
}
class Permission {
    var $quesion_mgnt = NULL;
    var $survey_mgnt = NULL;
    var $survey_result_mgnt = NULL;
    var $admin_mgnt = NULL;
    var $project_mgnt = NULL;
}

class NZ_Controller extends CI_Controller{

	var $admin = NULL;
    var $request_type = REQUEST_FROM_WEB;
    var $db_name = NULL;
    var $page = NULL;
    var $message_error_type = "";
    var $message_error = "";

	function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');

        // $this->output->enable_profiler(TRUE);

    }
    public function add(){
        if(check_permission($this->page,"r") || check_permission($this->page,"n")){
            $this->goFailPage();
        }
    }
    public function edit($pm_id){
        if(check_permission($this->page,"r") || check_permission($this->page,"n")){
            $this->goFailPage();
        }
    }
    public function submit($pm_id = NULL,$type){
        if(check_permission($this->page,"r") || check_permission($this->page,"n")){
            $this->goFailPage();
        }
    }
    public function make_session($info){
    	$sessionData = array(
                   'a_id' => $info['a_id'],
                   'a_user' =>  $info['a_user'],
                   'a_name' => $info['a_name'],
                   'question_mgnt' => $info['question_mgnt'],
                   'survey_mgnt' => $info['survey_mgnt'],
                   'survey_result_mgnt' => $info['survey_result_mgnt'],
                   'admin_mgnt' => $info['admin_mgnt'],
                   'project_mgnt' => $info['project_mgnt']
        );

		$this->session->set_userdata($sessionData);
		$this->refresh_session();
    }
    public function selectProject($database_name){
        $this->session->set_userdata(array('database_selected' => $database_name));
        $this->refresh_session();
    }
    public function isSelectedProject(){
    	if($this->get_session()->database_selected == "" || $this->get_session()->database_selected == NULL){
    		return FALSE;
    	}else{
    		return TRUE;
    	}
    }
    public function remove_session(){
    	$this->admin = NULL;
    	$this->session->sess_destroy();
    }
    public function get_session(){
    	$this->admin = new Admin();
    	$this->admin->a_id = $this->session->userdata('a_id');
    	$this->admin->a_user = $this->session->userdata('a_user');
    	$this->admin->a_name = $this->session->userdata('a_name');
        $this->admin->database_selected = $this->session->userdata('database_selected');

        $permission = new Permission();
        $permission->question_mgnt = $this->session->userdata('question_mgnt');
        $permission->survey_mgnt = $this->session->userdata('survey_mgnt');
        $permission->survey_result_mgnt = $this->session->userdata('survey_result_mgnt');
        $permission->admin_mgnt = $this->session->userdata('admin_mgnt');
        $permission->project_mgnt = $this->session->userdata('project_mgnt');
        $this->admin->permission = $permission;
        
    	return $this->admin;
    }
    public function refresh_session(){
    	$this->admin = new Admin();
        $this->admin->a_id = $this->session->userdata('a_id');
        $this->admin->a_user = $this->session->userdata('a_user');
        $this->admin->a_name = $this->session->userdata('a_name');
        $this->admin->database_selected = $this->session->userdata('database_selected');

        $permission = new Permission();
        $permission->question_mgnt = $this->session->userdata('question_mgnt');
        $permission->survey_mgnt = $this->session->userdata('survey_mgnt');
        $permission->survey_result_mgnt = $this->session->userdata('survey_result_mgnt');
        $permission->admin_mgnt = $this->session->userdata('admin_mgnt');
        $permission->project_mgnt = $this->session->userdata('project_mgnt');
        $this->admin->permission = $permission;
    }
    public function session_invalid($notRedirect=FALSE){
        if($notRedirect == FALSE){
            if($this->session->userdata('a_id') == NULL){
                redirect('/errors/session_expire');
            }
        }else{
            if($this->session->userdata('a_id') == NULL){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
    public function goFailPage(){
        //$this->remove_session();
        redirect('/errors');
    }
    public function dateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    }
    public function show_error_message($message_error_type,$message_error){
        if($message_error_type == "success") {
            echo '<div class="row">
                   <div class="col-lg-12">
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Well done!</strong> '.$message_error.'
                        </div>
                    </div>
                </div>';
    
         }else if($message_error_type == "fail"){ 
            echo '<div class="row">
                   <div class="col-lg-12">
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Sorry </strong> '.$message_error.'
                        </div>
                    </div>
                </div>';
         }
    }
    public function nullableTextIfEmptyData($data){
        return ($data == "" || $data == NULL)?"N/A":$data;
    }
    public function sex($flag,$lang){
        if ($lang == 'th') {
            return ($flag == 0)?"ชาย":"หญิง";
        }else{
            return ($flag == 0)?"Male":"Female";
        }
    }
    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    public function upload_config($file_name){
    	$config['upload_path'] = 'images_upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '999999';
        $config['max_width']  = '3000';
        $config['max_height']  = '3000';
        $config['file_name'] = $file_name;
        return $config;
    }
    public function upload_survey_config($file_name){
        $config['upload_path'] = 'images_upload_surveys/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width']  = '200';
        $config['max_height']  = '200';
        $config['file_name'] = $file_name;
        return $config;
    }
}
