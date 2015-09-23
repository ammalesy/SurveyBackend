<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleManagement extends NZ_Controller {

	var $message_error_type = "";
	var $message_error = "";

	function __construct()
    {
        parent::__construct();
        $pm = $this->get_session()->permission->admin_mgnt;
        if($pm == "n"){
            $this->remove_session();
            redirect("/Authentication");
        }
    }
    function index(){
    	$data['page'] = "RoleManagement";

    	$this->load->model('common/tb_permission');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['permissions'] = $this->tb_permission->fetchAll();

    	$this->load->view('RoleManagement/list',$data);
    }
    public function add(){
        $this->load->model('common/tb_permission');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = "RoleManagement";

        $this->load->view('RoleManagement/add',$data);
   
    }
    public function edit($pm_id){
        $this->load->model('common/tb_permission');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = "RoleManagement";

        $data["permission"] = $this->tb_permission->get($pm_id);

        $this->load->view('RoleManagement/edit',$data);

    } 
    public function submit($pm_id = NULL,$type){

        $this->load->model('common/tb_permission');

         $this->load->database();
        // /*========================================*/
        // /*======= TRANSACTION START ==============*/
        // /*========================================*/
         $this->db->trans_start();

        $pm_name = $this->input->post('pm_name');
        $question_mgnt = $this->input->post('question_mgnt');
        $survey_mgnt = $this->input->post('survey_mgnt');
        $survey_result_mgnt = $this->input->post('survey_result_mgnt');
        $admin_mgnt = $this->input->post('admin_mgnt');

        // /*============================*/
        // /*======= ADD SUBMITED =======*/
        // /*============================*/
        $msg_err = "Add";
        if($type == "added") 
         {
            if($pm_name == "" || $pm_name == NULL){
                $this->message_error_type = "fail";
                $this->message_error = "Your permission name not empty.";
                $this->add();
                return;
            }

            $pm_id = $this->tb_permission->record(array('pm_name' => $pm_name,
                                                        'question_mgnt' => $question_mgnt,
                                                        'survey_mgnt' => $survey_mgnt,
                                                        'survey_result_mgnt' => $survey_result_mgnt,
                                                        'admin_mgnt' => $admin_mgnt));
         }
        // /*=============================*/
        // /*======= EDIT SUBMITED =======*/
        // /*=============================*/
         else if ($type == "edited")
         {
             $msg_err = "Update";
            if($pm_name == "" || $pm_name == NULL){
                $this->message_error_type = "fail";
                $this->message_error = "Your permission name not empty.";
                $this->edit($pm_id);
                return;
            }

            $this->tb_permission->update(array('pm_name' => $pm_name,
                                                 'question_mgnt' => $question_mgnt,
                                                 'survey_mgnt' => $survey_mgnt,
                                                 'survey_result_mgnt' => $survey_result_mgnt,
                                                 'admin_mgnt' => $admin_mgnt),$pm_id);
         }

        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->message_error_type = "fail";
            $this->message_error = $msg_err." permission failure";
            $this->edit($pm_id);
        }else{
            $this->message_error_type = "success";
            $this->message_error = $msg_err." permission succesfully";
            $this->edit($pm_id);
        }
    }

    function pm_toString($pm_val){
        if($pm_val == "r"){
            return "Read";
        }else if($pm_val == "rw"){
            return "Read & Write";
        }else if($pm_val == "w"){
            return "Write";
        }else if($pm_val == "n"){
            return "Not allow";
        }
    }
}
