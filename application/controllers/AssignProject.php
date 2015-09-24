<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignProject extends NZ_Controller {

	function __construct()
    {
        parent::__construct();

        $this->page = "AssignProject";

        if(check_permission("UserManagement","n")){
            $this->goFailPage();
        }

    }
    function index(){
    	$data['page'] = $this->page;

    	$this->load->model('common/tb_project');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$projects = $this->tb_project->fetchAll();
        $data['projects'] = $projects;

    	$this->load->view('AssignProject/list',$data);
    }
    public function view($pj_id){
        $data['page'] = $this->page;
        $this->load->model("common/tb_admin");
        $this->load->model('common/tb_project');
        $this->load->model('common/tb_owner');
        $this->load->model('common/tb_permission');
        $data['pj_id'] = $pj_id;
        $data['pj_name'] = $this->tb_project->get($pj_id)->pj_name;
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;

        $owners = $this->tb_owner->fetch_by_pj_id($pj_id);
        foreach ($owners as $owner) {
            $owner->admin = $this->tb_admin->get_by_id($owner->a_id_ref);
            $owner->admin->permission = $this->tb_permission->get($owner->admin->a_permission);
        }
        $data['owners'] = $owners;
        $this->load->view('AssignProject/view',$data);
    }
    public function assign($pj_id){
        $data['page'] = $this->page;
        $this->load->model("common/tb_admin");
        $this->load->model('common/tb_owner');
        $this->load->model('common/tb_project');
        $this->load->model('common/tb_permission');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;

        $admins = $this->tb_admin->fetchAll_not_exist_owner_project($pj_id);
        foreach ($admins as $admin) {
             $admin->permission = $this->tb_permission->get($admin->a_permission);
        }
        $data['admins'] = $admins;
        $data['project'] = $this->tb_project->get($pj_id);
        $this->load->view('AssignProject/add',$data);

    }
    public function remove($w_id,$pj_id){
        $this->load->model('common/tb_owner');
        $this->tb_owner->delete($w_id);
        redirect("AssignProject/view/".$pj_id);
    }
    public function submit($pj_id = NULL,$type){

        parent::submit($pj_id,$type);

        $this->load->model('common/tb_owner');

        $this->load->database();
        // /*========================================*/
        // /*======= TRANSACTION START ==============*/
        // /*========================================*/
        $this->db->trans_start();

        $a_id_ref = $this->input->post('a_id');
        // /*============================*/
        // /*======= ADD SUBMITED =======*/
        // /*============================*/
        $msg_err = "Add";
        if($type == "added") 
         {
            $this->tb_owner->record(array('a_id_ref' => $a_id_ref,
                                          'pj_id_ref' => $pj_id));
         }
        // /*=============================*/
        // /*======= EDIT SUBMITED =======*/
        // /*=============================*/
         else if ($type == "edited")
         {
            
            
         }

        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->message_error_type = "fail";
            $this->message_error = $msg_err." user failure";
            $this->assign($pj_id);
        }else{
            $this->message_error_type = "success";
            $this->message_error = $msg_err." user succesfully";
            $this->assign($pj_id);
        }
    }
}
