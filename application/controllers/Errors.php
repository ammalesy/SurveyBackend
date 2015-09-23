<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends NZ_Controller {

	function __construct()
    {
        parent::__construct();
    }
    function index(){
    	
    	$this->load->view('errors/html/error_permission_fail');
    }
    function session_expire(){
        $this->load->view('errors/html/error_session_invalid');
    }
}
