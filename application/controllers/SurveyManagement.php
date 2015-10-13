<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyManagement extends NZ_Controller {

	var $prefix_table_name = "SV";

	function __construct()
    {
        parent::__construct();

        $this->page = "SurveyManagement";

        if(check_permission($this->page,"n")){
            $this->goFailPage();
        }
        if($this->isSelectedProject() == FALSE){
            redirect("PreviewSurvey");
        }
    }
    function index(){
    	$data['page'] = $this->page;

    	$this->load->model('tb_survey_mapping');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['surveys'] = $this->tb_survey_mapping->fetchAll();

    	$this->load->view('SurveyManagement/list',$data);
    }
    public function add(){

        parent::add();

    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['questions'] = $this->tb_all_question->fetchAllWithOutAutoDisplay();
    	$data['page'] = $this->page;
        $data['questions_auto'] = $this->tb_all_question->fetchAllAutoDisplayOnly();
    	$this->load->view('SurveyManagement/add',$data);
   
    }
    public function edit($sm_id){

        parent::edit($sm_id);

        $this->load->model('tb_all_question');
        $this->load->model('tb_all_answer');
        $this->load->model('tb_survey_mapping');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['questions'] = $this->tb_all_question->fetchAllWithOutAutoDisplay();
        $survey = $this->tb_survey_mapping->get($sm_id);
        $data['survey'] = $survey;

        $sm_order_column = explode(",", $survey->sm_order_column);

        $questions = $this->tb_all_question->fetch_by_multiple_id($survey->sm_order_column);
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
        $data['exist_questions'] = $sorted;

        $data['page'] = $this->page;
        $this->load->view('SurveyManagement/edit',$data);

    }
    public function submit($sm_id,$type){

        parent::submit($sm_id,$type);

    	$this->load->database();
    	$this->load->model('tb_survey_mapping');
    	/*========================================*/
	    /*=============== DATA ===================*/
	   	/*========================================*/
    	$sm_name = $this->input->post('sm_name');
	    $sm_description = $this->input->post('sm_description');
        $ff = $this->input->post('question_group');

	   	$question_group = @array_filter(@array_unique($this->input->post('question_group')));
        
	   	/*========================================*/
	    /*======= TRANSACTION START ==============*/
	   	/*========================================*/
        $survey_empty = ($sm_name == NULL || $sm_name == "")?TRUE:FALSE;
        $question_group_empty = (count($question_group) <= 0 || $question_group == NULL)?TRUE:FALSE;

        if ($survey_empty == TRUE || $question_group_empty == TRUE)
        {
            $this->message_error_type = "fail";
            $this->message_error = "Survey name not empty / select question at least 1.";
            if ($type == 'added') 
            {
                $this->add();
            }else{
                $this->edit($sm_id);
            }
            return;
        }

        $sm_image = "default.png";
        $this->load->library('upload', $this->upload_survey_config(time("his")));
        if ($this->upload->do_upload('sm_image'))
        {
            $data = array('upload_data' => $this->upload->data());
            $sm_image = $data['upload_data']['file_name'];
        }
        

		$this->db->trans_start();
		$msg_err = "Add";
    	if ($type == 'added') 
    	{
	    	$sm_id = $this->tb_survey_mapping->record(array('sm_name' => $sm_name,
	    													'sm_description' => $sm_description,
	    													'sm_order_column' => implode(",",$question_group),
	    													'sm_update_at' => date("Y-m-d H:i:s"),
                                                            'sm_image' => $sm_image));
	    	$this->tb_survey_mapping->update(array('sm_table_code' => "SV".$sm_id),$sm_id);
	    	$this->tb_survey_mapping->create_table_survey($this->prefix_table_name.$sm_id,$question_group);
    	}
    	else if($type == 'edited')
    	{
            $upload_data = $this->upload->data();
            $isUpload = ($upload_data['file_size'] > 0)?TRUE:FALSE;

    		$msg_err = "Update";

            if(!$isUpload){

                $this->tb_survey_mapping->update(array('sm_name' => $sm_name,
                                                   'sm_description' => $sm_description,
                                                   'sm_order_column' => implode(",",$question_group),
                                                   'sm_update_at' => date("Y-m-d H:i:s")),$sm_id);

            }else{

                $this->tb_survey_mapping->update(array('sm_name' => $sm_name,
                                                   'sm_description' => $sm_description,
                                                   'sm_order_column' => implode(",",$question_group),
                                                   'sm_update_at' => date("Y-m-d H:i:s"),
                                                   'sm_image' => $sm_image),$sm_id);

            }
    		
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
