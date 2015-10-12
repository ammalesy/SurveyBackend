<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends NZ_Controller {

	function __construct()
    {
        parent::__construct();

        $this->page = "Dashboard";

        if($this->isSelectedProject() == FALSE){
            redirect("PreviewSurvey");
        }
    }
    function index(){
        
        $data['page'] = $this->page;
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
 
    	$this->load->model('tb_all_question');
        $this->load->model('tb_all_answer');
        $this->load->model('tb_user_history');
        $this->load->model('tb_survey_mapping');


        //$surveys = $this->tb_survey_mapping->fetchAll();
      
        // foreach ($surveys as $survey) {
        //     $survey->result_info = $this->survery_result($survey->sm_id);
        // }

        $data['history_count'] = $this->tb_user_history->count();
        $data['question_count'] = $this->tb_all_question->count();
        $data['survey_count'] = $this->tb_survey_mapping->count();
        //$data['surveys'] = $surveys;
    	$this->load->view('Dashboard/all',$data);
    }
    public function state(){
        $data['page'] = $this->page;
        $this->load->model('tb_survey_mapping');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;

        $data['surveys'] = $this->tb_survey_mapping->fetchAll();
        $data['max_surveys'] = $this->tb_survey_mapping->count_survey_that_user_doing();
        $data['sm_db'] = $this->tb_survey_mapping;
        //print_r($data['max_surveys']);

        $this->load->view('Dashboard/list',$data);

    }
    public function view_state($sm_id){
         $data['page'] = $this->page;
        $this->load->model('tb_survey_mapping');
        $this->load->model('tb_all_question');
        $this->load->model('tb_all_answer');
        $max_questions = $this->tb_survey_mapping->max_question_that_user_doing($sm_id);
        $i = 0;
        foreach ($max_questions as $max_question) {
           
            $max_questions[$i]['max_answers'] = $this->tb_survey_mapping->max_answer_that_user_doing($sm_id,$max_question['aq_id']);
            $max_questions[$i]['aq_description'] = $this->tb_all_question->get($max_question['aq_id'])->aq_description;
            $i++;
        }
        $data['answer_db'] = $this->tb_all_answer;
        $data['max_question_answer'] = $max_questions;
        //print_r($data['max_question_answer']);
        

        $this->load->view('Dashboard/view_state',$data);

    }
    private function survery_result($sm_id){
        // $LIMIT = 10;
        // $this->load->model('tb_survey_mapping');
        // $this->load->model('tb_user_history');
        
        // $user_histories = $this->tb_user_history->fetch_by_sm_id($sm_id);
        // $i = 1;
        // foreach ($user_histories as $user_history) {
        //     if($i == $LIMIT){break;}
        //     $user_history->user_info = $this->tb_user_info->get($user_history->u_id_ref);
        //     $sm_obj = $this->tb_survey_mapping->get($user_history->sm_id_ref);
        //     $table_name = $sm_obj->sm_table_code;
        //     $user_history->ans_info = $this->tb_survey_mapping->get_on_table($table_name,$user_history->s_id_ref);
        //     $i++;
        // }
        // return $user_histories;

    }
}
