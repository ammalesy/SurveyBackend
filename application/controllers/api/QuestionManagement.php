<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class QuestionManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB(); 
    }
	public function questions_get(){
		$this->load->model('tb_all_question');
		$questions = $this->tb_all_question->fetchAll();
		if(count($questions) > 0){
			$this->response($questions);
		}else{
			$this->response(array('Error' => '404 not found.'),REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function question_get($aq_id){
    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');

    	$question = $this->tb_all_question->get($aq_id);
    	$answers = $this->tb_all_answer->get($aq_id);
    	$question->answers = $answers;

    	$this->response($question,REST_Controller::HTTP_OK);
    }
	public function answers_get($aq_id_ref){
		$this->load->model('tb_all_answer');
		$result = $this->tb_all_answer->get($aq_id_ref);
		$this->response($result,REST_Controller::HTTP_OK);
	}
}
