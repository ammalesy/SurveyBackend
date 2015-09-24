<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectManagement extends NZ_Controller {

	function __construct()
    {
        parent::__construct();

        $this->page = "ProjectManagement";

        if(check_permission($this->page,"n")){
            $this->goFailPage();
        }

    }
    function test(){

        $this->load->helper('file');
        echo $queryString = read_file('./database_import/project_db.sql');
    }
    function index(){
    	$data['page'] = $this->page;

    	$this->load->model('common/tb_project');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$projects = $this->tb_project->fetchAll();
        $data['projects'] = $projects;

    	$this->load->view('ProjectManagement/list',$data);
    }
    public function add(){

        parent::add();

        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = $this->page;

        $this->load->view('ProjectManagement/add',$data);
   
    }
    public function edit($pj_id){

        parent::edit($pj_id);

        $this->load->model('common/tb_project');
        $data['message_error_type'] = $this->message_error_type;
        $data['message_error'] = $this->message_error;
        $data['page'] = $this->page;

        $project = $this->tb_project->get($pj_id);
        $data['project'] = $project;

        $this->load->view('ProjectManagement/edit',$data);

    } 
    public function submit($pj_id = NULL,$type){

        parent::submit($pj_id,$type);

        $this->load->model('common/tb_project');

        $this->load->database();
        // /*========================================*/
        // /*======= TRANSACTION START ==============*/
        // /*========================================*/
        $this->db->trans_start();

        $pj_name = $this->input->post('pj_name');
        $pj_description = $this->input->post('pj_description');
        $pj_db_ref = $this->input->post('pj_db_ref');
        $pj_image = "default.png";
    
        $this->load->library('upload', $this->upload_config($pj_db_ref.time("his")));
        if ($this->upload->do_upload('pj_image'))
        {
            $data = array('upload_data' => $this->upload->data());
            $pj_image = $data['upload_data']['file_name'];
        }
        // /*============================*/
        // /*======= ADD SUBMITED =======*/
        // /*============================*/
        $msg_err = "Add";
        if($type == "added") 
         {
            if($pj_name == "" || $pj_name == NULL ||
               $pj_db_ref == "" || $pj_db_ref == NULL){
                $this->message_error_type = "fail";
                $this->message_error = "Your project name / Database name is not empty.";
                $this->add();
                return;
            }

            
            $this->load->model('common/database');
            $result = $this->database->create($pj_db_ref);
            if($result == FALSE){
                $this->message_error_type = "fail";
                $this->message_error = "Create Database Error. ensure your database name is not exist.";
                $this->add();
                return;
            }else{
                $pj_id = $this->tb_project->record(array('pj_name' => $pj_name,
                                                    'pj_description' => $pj_description,
                                                    'pj_db_ref' => $pj_db_ref,
                                                    'pj_image' => $pj_image));
            }
         }
        // /*=============================*/
        // /*======= EDIT SUBMITED =======*/
        // /*=============================*/
         else if ($type == "edited")
         {
            $msg_err = "Update";
               if($pj_name == "" || $pj_name == NULL ||
               $pj_db_ref == "" || $pj_db_ref == NULL){
                    $this->message_error_type = "fail";
                    $this->message_error = "Your project name / Database name is not empty.";
                    $this->edit($pj_id);
                    return;
                }
            if($pj_image == ""){
                $this->tb_project->update(array('pj_name' => $pj_name,
                                            'pj_description' => $pj_description,
                                            'pj_db_ref' => $pj_db_ref),$pj_id);
            }else{
                $this->tb_project->update(array('pj_name' => $pj_name,
                                            'pj_description' => $pj_description,
                                            'pj_db_ref' => $pj_db_ref,
                                            'pj_image' => $pj_image),$pj_id);
            }
            
         }

        /*==================================*/
        /*======= TRANSACTION COMMIT =======*/
        /*==================================*/
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->message_error_type = "fail";
            $this->message_error = $msg_err." project failure";
            $this->edit($pj_id);
        }else{
            $this->message_error_type = "success";
            $this->message_error = $msg_err." project succesfully";
            $this->edit($pj_id);
        }
    }
}
