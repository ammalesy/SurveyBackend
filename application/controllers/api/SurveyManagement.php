<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class SurveyManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB();       
    }
    public function surveys_get(){
    	
    	$this->load->model('tb_all_question');
		$this->load->model('tb_all_answer');
    	$this->load->model('tb_survey_mapping');
    	$surveys = $this->tb_survey_mapping->fetchAll();
    	if(count($surveys) > 0){

    		foreach ($surveys as $aSurvey) {
    			$survey = $this->tb_survey_mapping->get($aSurvey->sm_id);
				$sm_order_column = explode(",", $survey->sm_order_column);
				if ($survey == NULL) {
					$this->response(array('Error' => 'Survey not found.'));
				}
				$questions = $this->tb_all_question->fetch_by_multiple_id($survey->sm_order_column);
				foreach ($questions as $question) {
					$question->answers = $this->tb_all_answer->get($question->aq_id);
				}
				///SOERTING
				$sorted = array();
				foreach ($sm_order_column as $column) {

					foreach ($questions as $question) {
						if($question->aq_id == $column){
							array_push($sorted, $question);
							break;
						}
					}
				}
				$_questions = array();
				foreach ($sm_order_column as $column) {
					$question = $this->tb_all_question->get($column);
    				$answers = $this->tb_all_answer->get($column);
    				@$question->answers = $answers;
    				array_push($_questions, $question);
				}
				@$aSurvey->questions = $_questions;
    		}


    		$this->response($surveys);
    	}else{
    		$this->response(array('Error' => 'Survey not found.'),REST_Controller::HTTP_NOT_FOUND);
    	}
    }
	public function survey_get($sm_id){
		$this->load->model('tb_all_question');
		$this->load->model('tb_all_answer');
		$this->load->model('tb_survey_mapping');


		$survey = $this->tb_survey_mapping->get($sm_id);
		$sm_order_column = explode(",", $survey->sm_order_column);
		if ($survey == NULL) {
			$this->response(array('Error' => 'Survey not found.'));
		}
		$questions = $this->tb_all_question->fetch_by_multiple_id($survey->sm_order_column);
		foreach ($questions as $question) {
			$question->answers = $this->tb_all_answer->get($question->aq_id);
		}
		///SOERTING
		$sorted = array();
		foreach ($sm_order_column as $column) {

			foreach ($questions as $question) {
				if($question->aq_id == $column){
					array_push($sorted, $question);
					break;
				}
			}
		
			
		}


		$this->response($sorted);
	}
}
