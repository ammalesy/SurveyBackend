<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyManagement extends NZ_Controller {

	var $message_error_type = "";
	var $message_error = "";
	var $prefix_table_name = "SV";

	function __construct()
    {
        parent::__construct();
    }
    function index(){
    	$data['page'] = "SurveyManagement";

    	$this->load->model('tb_survey_mapping');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['surveys'] = $this->tb_survey_mapping->fetchAll();

    	$this->load->view('SurveyManagement/list',$data);
    }
    public function add(){
    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['questions'] = $this->tb_all_question->fetchAll();
    	$data['page'] = "SurveyManagement";
    	$this->load->view('SurveyManagement/add',$data);
   
    }
    public function edit($sm_id){
        $this->load->model('tb_all_question');
        $this->load->model('tb_all_answer');
        $this->load->model('tb_survey_mapping');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['questions'] = $this->tb_all_question->fetchAll();
        $survey = $this->tb_survey_mapping->get($sm_id);
        $data['survey'] = $survey;
        $data['exist_questions'] = $this->tb_all_question->fetch_by_multiple_id($survey->sm_order_column);
        $data['page'] = "SurveyManagement";
        $this->load->view('SurveyManagement/edit',$data);

    }
    public function submit($sm_id,$type){
    	$this->load->database();
    	$this->load->model('tb_survey_mapping');
    	/*========================================*/
	    /*=============== DATA ===================*/
	   	/*========================================*/
    	$sm_name = $this->input->post('sm_name');
	    $sm_description = $this->input->post('sm_description');
	   	$question_group = @array_filter(@array_unique($this->input->post('question_group')));
	   	/*========================================*/
	    /*======= TRANSACTION START ==============*/
	   	/*========================================*/
        $survey_empty = ($sm_name == NULL || $sm_name == "")?TRUE:FALSE;
        $question_group_empty = (count($question_group) <= 0)?TRUE:FALSE;
        if ($survey_empty == TRUE || $question_group_empty == TRUE)
        {
            $this->message_error_type = "fail";
            $this->message_error = "Survey name not empty / select question at least 1.";
            $this->edit($sm_id);
            return;
        }
        

		$this->db->trans_start();
		$msg_err = "Add";
    	if ($type == 'added') 
    	{
	    	$sm_id = $this->tb_survey_mapping->record(array('sm_name' => $sm_name,
	    													'sm_description' => $sm_description,
	    													'sm_order_column' => implode(",",$question_group),
	    													'sm_update_at' => date("Y-m-d H:i:s")));
	    	$this->tb_survey_mapping->update(array('sm_table_code' => "SV".$sm_id),$sm_id);
	    	$this->tb_survey_mapping->create_table_survey($this->prefix_table_name.$sm_id,$question_group);
    	}
    	else if($type == 'edited')
    	{
    		$msg_err = "Update";
    		$this->tb_survey_mapping->update(array('sm_name' => $sm_name,
    											   'sm_description' => $sm_description,
    											   'sm_order_column' => implode(",",$question_group),
    											   'sm_update_at' => date("Y-m-d H:i:s")),$sm_id);
    		$this->tb_survey_mapping->update_table_survey($this->prefix_table_name.$sm_id,$question_group);
    	}
    	/*==================================*/
    	/*======= TRANSACTION COMMIT =======*/
    	/*==================================*/
	   	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    $this->message_error_type = "fail";
			$this->message_error = $msg_err." survey failure.";
			$this->edit($sm_id);
		}else{
			$this->message_error_type = "success";
			$this->message_error = $msg_err." survey succesfully.";
			$this->edit($sm_id);
		}
    }
}
