<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class SurveyManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
    }
	public function surveys_get(){

		$this->response(array('res' => "สวัสดีชาวโลก"));
	}

}
