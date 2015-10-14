<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class AdminManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB(); 
    }


    public function admin_post(){
    	$this->load->model('common/tb_admin');
    	$a_user = $this->post('a_user');
    	$a_pass = md5($this->post('a_pass'));
    	$result = $this->tb_admin->authentication($a_user,$a_pass);
    	if($result == TRUE){
    		$admin = $this->tb_admin->get($a_user,$a_pass);
    		$this->response($admin,REST_Controller::HTTP_OK);
    	}else{
    		$this->response(array('Error' => 'Authentication fail.'),REST_Controller::HTTP_NOT_FOUND);
    	}
    }
    
}
