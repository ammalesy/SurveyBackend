<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin {
	var $a_id = NULL;
	var $a_user = NULL;
	var $a_name = NULL;
}

class NZ_Controller extends CI_Controller{

	var $admin = NULL;

	function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    public function make_session($info){
    	$sessionData = array(
                   'a_id' => $info['a_id'],
                   'a_user' =>  $info['a_user'],
                   'a_name' => $info['a_name']
        );

		$this->session->set_userdata($sessionData);
		$this->refresh_session();
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
    	return $this->admin;
    }
    public function refresh_session(){
    	$this->admin = new Admin();
    	$this->admin->a_id = $this->session->userdata('a_id');
    	$this->admin->a_user = $this->session->userdata('a_user');
    	$this->admin->a_name = $this->session->userdata('a_name');
    }
    public function session_invalid(){
    	if($this->session->userdata('a_id') == NULL){
    		redirect('/Authentication'); 
    	}	
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
}
