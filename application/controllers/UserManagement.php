<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends NZ_Controller {

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
    	$data['page'] = "UserManagement";

    	$this->load->model('common/tb_permission');
        $this->load->model('common/tb_admin');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$admins = $this->tb_admin->fetchAll();

        foreach ($admins as $admin) {
            $admin->permission = $this->tb_permission->get($admin->a_permission);
        }
        $data['admins'] = $admins;

    	$this->load->view('UserManagement/list',$data);
    }
    public function add(){
        $this->load->model('common/tb_permission');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = "UserManagement";

        $data['permissions'] = $this->tb_permission->fetchAll();

        $this->load->view('UserManagement/add',$data);
   
    }
    public function edit($a_id){
        $this->load->model('common/tb_permission');
        $this->load->model('common/tb_admin');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = "UserManagement";

        $admin = $this->tb_admin->get_by_id($a_id);

        $data['user'] = $admin;
        $data['permissions'] = $this->tb_permission->fetchAll();

        $this->load->view('UserManagement/edit',$data);

    } 
    public function submit($a_id = NULL,$type){

        $this->load->model('common/tb_permission');
        $this->load->model('common/tb_admin');

         $this->load->database();
        // /*========================================*/
        // /*======= TRANSACTION START ==============*/
        // /*========================================*/
         $this->db->trans_start();

        $a_user = $this->input->post('a_user');
        $a_pass = $this->input->post('a_pass');
        $a_name = $this->input->post('a_name');
        $a_permission = $this->input->post('a_permission');

        // /*============================*/
        // /*======= ADD SUBMITED =======*/
        // /*============================*/
        $msg_err = "Add";
        if($type == "added") 
         {
            if($a_user == "" || $a_user == NULL ||
               $a_pass == "" || $a_pass == NULL ||
               $a_name == "" || $a_name == NULL ){
                $this->message_error_type = "fail";
                $this->message_error = "Your Username/Password/Name not empty.";
                $this->add();
                return;
            }

            $a_id = $this->tb_admin->record(array('a_user' => $a_user,
                                                   'a_pass' => md5($a_pass),
                                                   'a_name' => $a_name,
                                                   'a_permission' => $a_permission));
         }
        // /*=============================*/
        // /*======= EDIT SUBMITED =======*/
        // /*=============================*/
         else if ($type == "edited")
         {
            $msg_err = "Update";
               if($a_user == "" || $a_user == NULL ||
                  $a_name == "" || $a_name == NULL ){
                    $this->message_error_type = "fail";
                    $this->message_error = "Your Username/Password/Name not empty.";
                    $this->edit($a_id);
                    return;
                }

            $this->tb_admin->update(array('a_user' => $a_user,
                                          'a_name' => $a_name,
                                          'a_permission' => $a_permission),$a_id);
         }

        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->message_error_type = "fail";
            $this->message_error = $msg_err." admin failure";
            $this->edit($a_id);
        }else{
            $this->message_error_type = "success";
            $this->message_error = $msg_err." admin succesfully";
            $this->edit($a_id);
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
