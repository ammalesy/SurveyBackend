<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class UserInfoManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
    }


	public function user_get($u_id = NULL){

		if($u_id == NULL){
			$this->response(array('Error' => '404 not found.'),REST_Controller::HTTP_NOT_FOUND);
		}else{
			$this->load->model('tb_user_info');

    		$user = $this->tb_user_info->get($u_id);

    		$this->response($user,REST_Controller::HTTP_OK);
		}
    }
    public function user_put($u_id){
    	$this->load->model('tb_user_info');
    
    	$user_info_json = $this->request->body;

    	if($u_id == NULL){
    		$this->response(array('Error' => '404 not found.'),REST_Controller::HTTP_NOT_FOUND);
    	}else{
    		
    		if($user_info_json == NULL){
    			$this->response([]);
    		}else{
    			$this->tb_user_info->update($user_info_json['data'],$u_id);
    			$this->response(array('Status' => 'success'),REST_Controller::HTTP_OK);
    		}
    	}
    }
    public function user_post(){
    	$this->load->model('tb_user_info');
    	$user_info_json = $this->request->body;

    	if($user_info_json == NULL){
    		$this->response(array('Error' => '404 not found.'),REST_Controller::HTTP_NOT_FOUND);
    	}else{
    		$insert_id = $this->tb_user_info->record($user_info_json['data']);
    		$this->response(array('Status' => 'success','insert_id' => $insert_id ),REST_Controller::HTTP_OK);
    	}
    }
}
