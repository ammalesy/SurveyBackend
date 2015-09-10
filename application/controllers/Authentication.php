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
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$this->load->view('Authentication/view',$data);
    }
    function login(){
    	$this->load->model('tb_admin');
    	$a_user = $this->input->post('a_user');
    	$a_pass = md5($this->input->post('a_pass'));

    	$result = $this->tb_admin->authentication($a_user,$a_pass);
    	if ($result == TRUE) {
    		$admin = $this->tb_admin->get($a_user,$a_pass);
    		$this->make_session(array('a_id' => $admin->a_id,
    								  'a_user' => $admin->a_user,
    								  'a_name' => $admin->a_name));
    		redirect('Dashboard');
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
