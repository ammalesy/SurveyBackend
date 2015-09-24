<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends NZ_Controller {

	var $message_error_type = "";
	var $message_error = "";

	function __construct()
    {
        parent::__construct();
        
    }
    function index(){
        $isExpire = $this->session_invalid(TRUE);
        if($isExpire == FALSE){
            redirect("PreviewSurvey");
            return;
        }

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$this->load->view('Authentication/view',$data);
    }
    function login(){
    	$this->load->model('common/tb_admin');
        $this->load->model('common/tb_permission');
    	$a_user = $this->input->post('a_user');
    	$a_pass = md5($this->input->post('a_pass'));

    	$result = $this->tb_admin->authentication($a_user,$a_pass);
    	if ($result == TRUE) {
    		$admin = $this->tb_admin->get($a_user,$a_pass);
            $pm_id = $admin->a_permission;

            $permission = $this->tb_permission->get($pm_id);
            
    		$this->make_session(array('a_id' => $admin->a_id,
    								  'a_user' => $admin->a_user,
    								  'a_name' => $admin->a_name,
                                      'question_mgnt' => $permission->question_mgnt,
                                      'survey_mgnt' => $permission->survey_mgnt,
                                      'survey_result_mgnt' => $permission->survey_result_mgnt,
                                      'admin_mgnt' => $permission->admin_mgnt,
                                      'project_mgnt' => $permission->project_mgnt,
                                      'database_seleted'=>NULL));
    		redirect('PreviewSurvey');
    	}else{
    		$this->message_error_type = 'fail';
    		$this->message_error = 'Username or password not correct.';
    		$this->index();
    	}
    }
    function logout(){
        $this->remove_session();
        redirect('Authentication');
    }
}
