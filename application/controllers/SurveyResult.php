<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyResult extends NZ_Controller {

	var $message_error_type = "";
	var $message_error = "";

	function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }
    function index(){
    	$data['page'] = "SurveyResult";

    	$this->load->model('tb_survey_mapping');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['surveys'] = $this->tb_survey_mapping->fetchAll();

    	$this->load->view('SurveyResult/list',$data);
    }
    function view($sm_id){
        $data['page'] = "SurveyResult";
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;

        $this->load->model('tb_survey_mapping');
        $this->load->model('tb_user_history');
        $this->load->model('tb_user_info');
        
        $data['survey'] = $this->tb_survey_mapping->get($sm_id);
        $user_histories = $this->tb_user_history->fetch_by_sm_id($sm_id,"h_timestamp ASC");
        foreach ($user_histories as $user_history) {
            $user_history->user_info = $this->tb_user_info->get($user_history->u_id_ref);
            $sm_obj = $this->tb_survey_mapping->get($user_history->sm_id_ref);
            $table_name = $sm_obj->sm_table_code;
            $user_history->ans_info = $this->tb_survey_mapping->get_on_table($table_name,$user_history->s_id_ref);
        }
        $data['user_histories'] = $user_histories;

        $this->load->view('SurveyResult/view',$data);
    }
}
