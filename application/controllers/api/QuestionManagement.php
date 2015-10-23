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
    	$this->load->model('tb_answer_style');

    	$question = $this->tb_all_question->get($aq_id);
    	$answers = $this->tb_all_answer->get($aq_id);

    	foreach ($answers as $answer) {
    		$answer->style = $this->tb_answer_style->get($answer->type);
    		$answerStyle = AnswerStyle::get($answer->style->as_identifier,$answer->aa_description,$answer->style->as_text_color);
    		$answer->style->html = $answerStyle->html;
    		
    	}
    	$question->answers = $answers;

    	$this->response($question,REST_Controller::HTTP_OK);
    }
	public function answers_get($aq_id_ref){
		$this->load->model('tb_all_answer');
        $this->load->model('tb_answer_style');
		$result = $this->tb_all_answer->get($aq_id_ref);
        foreach ($result as $answer) {
            $answer->style = $this->tb_answer_style->get($answer->type);
            $answerStyle = AnswerStyle::get($answer->style->as_identifier,$answer->aa_description,$answer->style->as_text_color);
            $answer->style->html = $answerStyle->html;
            
        }


		$this->response($result,REST_Controller::HTTP_OK);
	}
}
