<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class SurveyManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
    }
    public function surveys_get(){
    	$this->load->model('tb_survey_mapping');
    	$surveys = $this->tb_survey_mapping->fetchAll();
    	if(count($surveys) > 0){
    		$this->response($surveys);
    	}else{
    		$this->response(array('Error' => 'Survey not found.'));
    	}
    }
	public function survey_get($sm_id){
		$this->load->model('tb_all_question');
		$this->load->model('tb_all_answer');
		$this->load->model('tb_survey_mapping');

		$survey = $this->tb_survey_mapping->get($sm_id);
		if ($survey == NULL) {
			$this->response(array('Error' => 'Survey not found.'));
		}
		$questions = $this->tb_all_question->fetch_by_multiple_id($survey->sm_order_column);
		foreach ($questions as $question) {
			$question->answers = $this->tb_all_answer->get($question->aq_id);
		}

		$this->response($questions);
	}
}
