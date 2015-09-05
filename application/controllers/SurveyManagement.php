<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyManagement extends NZ_Controller {

	function __construct()
    {
        parent::__construct();
    }
    function index(){
    	$data['page'] = "SurveyManagement";
    	$this->load->view('SurveyManagement/list',$data);
    }
}
