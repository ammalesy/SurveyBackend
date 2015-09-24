<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreviewSurvey extends NZ_Controller {

	function __construct()
    {
        parent::__construct();
    }
    function index(){
    	$this->load->model("common/tb_project");
        $data['projects'] = $this->tb_project->fetch_allowed_only();
    	$data['page'] = "PreviewSurvey";
    	$this->load->view('PreviewSurvey/view',$data);
    }
    function select($pj_id){
        /*
        KEEP SESSION
        */
        $this->load->model("common/tb_project");
        $project = $this->tb_project->get($pj_id);
        $this->selectProject($project->pj_db_ref);

        redirect("Dashboard");
    }
}
