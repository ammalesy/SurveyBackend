<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class SyncDataManager extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->initDB(); 
    }
    public function sync_post(){
        $this->load->model('tb_user_info');
        $this->load->model('tb_user_history');
        $this->load->model('tb_survey_mapping');

        $this->load->database();
        /*========================================*/
        /*======= TRANSACTION START ==============*/
        /*========================================*/
        $this->db->trans_start();

        $raw = $this->request->body;
        $json = json_decode(json_encode($raw['data']),TRUE);

        $json_filter = array();
        foreach ($json as $aJson) {
            $firstname = $aJson['u_firstname'];
            $surname = $aJson['u_surname'];
            $sex = $aJson['u_sex'];
            $age = $aJson['u_age'];
            $email = $aJson['u_email'];
            $tel = $aJson['u_tel'];
            $sm_id_ref = $aJson['sm_id_ref'];
            $h_timestamp = $aJson['h_timestamp'];
            $result = $aJson['result'];

            $survey = $this->tb_survey_mapping->get($sm_id_ref);

            $exist = $this->tb_user_info->is_exist_user($firstname,$surname);
            if($exist == FALSE){
                $u_id = $this->tb_user_info->record(array('u_firstname' => $firstname,
                                                          'u_surname' => $surname,
                                                          'u_sex' => $sex,
                                                          'u_age' => $age,
                                                          'u_email' => $email,
                                                          'u_tel' => $tel));
            }else{
                $u_id = $exist->u_id;
                $shouldUpdate = FALSE;
                $infoUpdate = array();
                if($sex != NULL && $sex != ""){
                	$shouldUpdate = TRUE;
                	$infoUpdate['u_sex'] = $sex;
                }
                if($age != NULL && $age != ""){
                	$shouldUpdate = TRUE;
                	$infoUpdate['u_age'] = $age;
                }
                if($email != NULL && $email != ""){
                	$shouldUpdate = TRUE;
                	$infoUpdate['u_email'] = $email;
                }
                if($tel != NULL && $tel != ""){
                	$shouldUpdate = TRUE;
                	$infoUpdate['u_tel'] = $tel;
                }
                
                if($shouldUpdate == TRUE){
                	$this->load->model('tb_user_info');
                	$this->tb_user_info->update($infoUpdate,$u_id);
                }
                
            }

            $result_filter = array();
                foreach ($result as $key=> $value) {
                    $key_c = str_replace("q_", "", $key);
                    $key_c = '`'.$key_c."`";
                    $result_filter[$key_c] = $value;
                }
            $s_id_ref = $this->tb_survey_mapping->record_survey_table($survey->sm_table_code,$result_filter);
            $this->tb_user_history->record(array('u_id_ref' => $u_id,
                                                 'sm_id_ref' => $sm_id_ref,
                                                 's_id_ref' => $s_id_ref,
                                                 'h_timestamp' => $h_timestamp ));
        }

        
        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
           $this->response(array('Error' => 'Sync data error'),REST_Controller::HTTP_NOT_FOUND);
        }else{
            $this->response(array('Error' => 'Sync data completed'),REST_Controller::HTTP_OK);
        }
    }
}
