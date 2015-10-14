<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class OwnerManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB(); 
    }


    public function owner_get($a_id){
    	$this->load->model('common/tb_admin');
        $this->load->model('common/tb_owner');
        $this->load->model('common/tb_project');
        
        $owners = $this->tb_owner->fetch_by_a_id($a_id);
        foreach ($owners as $owner) {
            $owner->project = $this->tb_project->get($owner->pj_id_ref);
        }
    	

    	if(count($owners) > 0){
    		
    		$this->response($owners,REST_Controller::HTTP_OK);
    	}else{
    		$this->response(array('Error' => 'Data not exist.'),REST_Controller::HTTP_NOT_FOUND);
    	}
    }
    
}
