<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define("CHECKBOX_IDENTIFIER", "0");
define("TEXTBOX_IDENTIFIER", "1");
define("RADIO_IDENTIFIER", "2");
define("CHECKBOX_TEXTBOX_IDENTIFIER", "3");
define("RADIO_TEXTBOX_IDENTIFIER", "4");

class AnswerStyleManagement extends NZ_Controller {

	function __construct()
    {
        parent::__construct();

        $this->page = "QuestionManagement";

        if(check_permission($this->page,"n")){
            $this->goFailPage();
        }
        if($this->isSelectedProject() == FALSE){
            redirect("PreviewSurvey");
        }

    }
    function index(){
 
    	$this->load->model('tb_answer_style');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = $this->page;
    	$data['answers_style'] = $this->tb_answer_style->fetchAll();
    	$this->load->view('AnswerStyleManagement/list',$data);
    }
    public function view($as_id){
    	$this->load->model('tb_answer_style');

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['answer_style'] = $this->tb_answer_style->get($as_id);
    	$data['page'] = $this->page;
    	$this->load->view('AnswerStyleManagement/view',$data);
    }
    public function add(){

        parent::add();

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = $this->page;
    	$this->load->view('AnswerStyleManagement/add',$data);
    }
    public function edit($as_id){

        parent::edit($as_id);

    	$this->load->model('tb_answer_style');

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = $this->page;
    	$data['answer_style'] = $this->tb_answer_style->get($as_id);
    	$this->load->view('AnswerStyleManagement/edit',$data);
    }
    public function submit($as_id = NULL,$type){

        parent::submit($as_id,$type);

    	$this->load->model('tb_answer_style');

    	$this->load->database();
    	/*========================================*/
    	/*======= TRANSACTION START ==============*/
    	/*========================================*/
		$this->db->trans_start();

    	$as_name = $this->input->post('as_name');
    	$as_description = $this->input->post('as_description');
    	$as_text_color = $this->input->post('as_text_color');
        $as_identifier = $this->input->post('as_identifier');


    	/*============================*/
    	/*======= ADD SUBMITED =======*/
    	/*============================*/
        $msg_err = "Add";
		if($type == "added") 
	   	{
    		$as_id = $this->tb_answer_style->record(array('as_name' => $as_name,
    											 		  'as_description' => $as_description,
                                                          'as_text_color' => $as_text_color,
                                                          'as_identifier' => $as_identifier));
	   	}
	   	/*=============================*/
    	/*======= EDIT SUBMITED =======*/
    	/*=============================*/
    	else if ($type == "edited")
    	{
            $msg_err = "Update";

    		$this->tb_answer_style->update(array('as_name' => $as_name,
    											 'as_description' => $as_description,
                                                 'as_text_color' => $as_text_color,
                                                 'as_identifier' => $as_identifier),$as_id);

	    }

	    /*==================================*/
    	/*======= TRANSACTION COMMIT =======*/
    	/*==================================*/
	   	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    $this->message_error_type = "fail";
			$this->message_error = $msg_err." answer style failure";
			$this->edit($as_id);
		}else{
			$this->message_error_type = "success";
			$this->message_error = $msg_err." answer style succesfully";
			$this->edit($as_id);
		}
    }
}
