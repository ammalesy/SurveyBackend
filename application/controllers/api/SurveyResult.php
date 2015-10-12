<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class SurveyResult extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB(); 
    }
    function survey_get(){

        $sm_id = $this->get('sm_id');

    	$this->load->model('tb_survey_mapping');
        $this->load->model('tb_user_history');
        
        $this->load->database();
        /*========================================*/
        /*======= TRANSACTION START ==============*/
        /*========================================*/
        $this->db->trans_start();

        $user_histories = $this->tb_user_history->fetch_by_sm_id($sm_id,"h_timestamp ASC");
        foreach ($user_histories as $user_history) {
            $sm_obj = $this->tb_survey_mapping->get($user_history->sm_id_ref);
            $table_name = $sm_obj->sm_table_code;
            $user_history->ans_info = $this->tb_survey_mapping->get_on_table($table_name,$user_history->s_id_ref);
        }
        
        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
           $this->response(array('Error' => 'Retrive fail'),REST_Controller::HTTP_NOT_FOUND);
        }else{
            $this->response($user_histories,REST_Controller::HTTP_OK);
        }
    }
    function survey_html_table_get(){

        $sm_id = $this->get('sm_id');

        $this->load->model('tb_survey_mapping');
        $this->load->model('tb_user_history');
        
        $this->load->database();
        /*========================================*/
        /*======= TRANSACTION START ==============*/
        /*========================================*/
        $this->db->trans_start();

        $user_histories = $this->tb_user_history->fetch_by_sm_id($sm_id,"h_timestamp ASC");
        foreach ($user_histories as $user_history) {
            $sm_obj = $this->tb_survey_mapping->get($user_history->sm_id_ref);
            $table_name = $sm_obj->sm_table_code;
            $user_history->ans_info = $this->tb_survey_mapping->get_on_table($table_name,$user_history->s_id_ref);
        }

        //TABLE
        $html ='<table id="questionTable" class="table table-striped compact hover" cellspacing="0" width="100%">'.
            '<thead>'.
                '<tr>'.
                    '<th>ID</th>'.
                    '<th>Since date</th>'.
                    '<th class="dt-head-right">Command</th>'.
                '</tr>'.
            '</thead>'.
            '<tbody>';
            foreach ($user_histories as $user_history) {
        $html .='<tr>'.
                '<td>'.$user_history->h_id.'</td>'.
                '<td><span class="badge">'.$this->time_elapsed_string($user_history->h_timestamp).'</span></td>';
                
                    $list_aa_id = '';
                    foreach ($user_history->ans_info as $key => $value) {
                       if ($key == "id") continue;
                       $list_aa_id .= substr($key,2)."->".str_replace('"', "'", $value)."|";
                    }
                    $list_aa_id = rtrim($list_aa_id, "|");
    
        $html .= '<td class="dt-body-right">'.
                        '<input type="hidden" id="h_id" data-h-id="'.$user_history->h_id.'" value="'.$list_aa_id.'">'.
                        '<button type="button" id="view_button" data-h-id="'.$user_history->h_id.'" data-sm-name="'.$survey->sm_name.'" data-sm-id="'.$survey->sm_id.'" data-toggle="modal" data-target="#list_answer_modal" class="btn btn-sm btn-primary">'.
                            '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> View answers'.
                        '</button>'.
                '</td>'.
            '</tr>';
            }   
        $html .= '</tbody>'.
            '</table>';
        ///////
        
        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
           $this->response(array('Error' => 'Retrive fail'),REST_Controller::HTTP_NOT_FOUND);
        }else{
            //$this->response($html,REST_Controller::HTTP_OK);
            echo $html;
        }
    }
}
