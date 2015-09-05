<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class QuestionManagement extends REST_Controller {

	function __construct()
    {
        parent::__construct();
    }


	public function questions_get(){

		$this->response(array('res' => "สวัสดีชาวโลก"));
	}
	/*=== POST JSON FORMAT ===*/
    /*
	{
	"question":"What is your the hobbies?",
	"image":"image/the_image",
	"answer_list":[
						{"img":"image/the_image","ans":"I play the football with my friends every night."},
						{"img":"image/the_image","ans":"I go to the beat with my family every year."},
						{"img":"image/the_image","ans":"I do something with my girl friend!!."},
						{"img":"image/the_image","ans":"I don't known because no the hobbies."}
				     ]
	}
	*/
    public function question_post()
    {
        $jsonData = $this->post('questionData');

		$this->load->database();
		$this->db->trans_start();

		$this->load->model('tb_all_question');
		$this->load->model('tb_all_answer');

		$aq_description = $jsonData['question'];
		$aq_image = $jsonData['image'];

		$insert_id = $this->tb_all_question->record(array('aq_description' => $aq_description,
											 			  'aq_image' => $aq_image));
		foreach ($jsonData['answer_list'] as $answer) {
			$this->tb_all_answer->record(array('aa_description' => $answer['ans'],
											   'aa_image' => $answer['img'],
											   'aq_id_ref' => $insert_id));
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
		    echo "Transaction error.";
		}else{
			$this->response($jsonData);
		}

    }
}
