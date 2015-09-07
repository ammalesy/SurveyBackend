<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionManagement extends NZ_Controller {

	var $message_error_type = "";
	var $message_error = "";

	function __construct()
    {
        parent::__construct();
    }
    function index(){
    	$this->load->model('tb_all_question');
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = "QuestionManagement";
    	$data['list_all_question'] = $this->tb_all_question->fetchAll(FALSE);
    	$this->load->view('QuestionManagement/list',$data);
    }
    public function view($aq_id){
    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['question'] = $this->tb_all_question->get($aq_id,FALSE);
    	$data['answers'] = $this->tb_all_answer->get($aq_id,FALSE);
    	$data['page'] = "QuestionManagement";
    	$this->load->view('QuestionManagement/view',$data);
    }
    public function add(){
    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = "QuestionManagement";
    	$this->load->view('QuestionManagement/add',$data);
    }
    public function edit($aq_id){
    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');

    	$data['message_error_type'] = $this->message_error_type;
    	$data['message_error'] = $this->message_error;
    	$data['page'] = "QuestionManagement";
    	$data['question'] = $this->tb_all_question->get($aq_id,FALSE);
    	$data['answers'] = $this->tb_all_answer->get($aq_id,FALSE);
    	$this->load->view('QuestionManagement/edit',$data);
    }
    public function change_status_question($status,$aq_id){
    	$this->load->model('tb_all_question');
    	$this->load->database();
    	/*========================================*/
    	/*======= TRANSACTION START ==============*/
    	/*========================================*/
		$this->db->trans_start();
		$this->tb_all_question->update(array('active' => $status ),$aq_id);

    	/*==================================*/
    	/*======= TRANSACTION COMMIT =======*/
    	/*==================================*/
	   	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    $this->message_error_type = "fail";
			$this->message_error = "Update question failure";
			$this->edit($aq_id);
		}else{
			$msg = ($status == "Y")?'ACTIVE':'DEACTIVE';
			$this->message_error_type = "success";
			$this->message_error = "Question status is '".$msg."'";
			$this->edit($aq_id);
		}
    }
    public function submit($aq_id = NULL,$type){
    	$this->load->model('tb_all_question');
    	$this->load->model('tb_all_answer');

    	$this->load->database();
    	/*========================================*/
    	/*======= TRANSACTION START ==============*/
    	/*========================================*/
		$this->db->trans_start();

		$MAX_ANSWER = 20;
    	$aq_description = $this->input->post('aq_description');
    	$aa_descriptions = $this->input->post('aa_description');
    	$aa_actives = $this->input->post('aa_active');

    	/*============================*/
    	/*======= ADD SUBMITED =======*/
    	/*============================*/
		if($type == "added") 
	   	{
	   		if($aq_description == "" || $aq_description == NULL){
	   			$this->message_error_type = "fail";
				$this->message_error = "Your question message not empty.";
				$this->add();
				return;
	   		}
	   		if(count($aa_descriptions) > $MAX_ANSWER || count($aa_descriptions) == 0){
    			$this->message_error_type = "fail";
				$this->message_error = "The answer mustn't over ".$MAX_ANSWER." choice or not empty.";
				$this->add();
				return;
    		}
    		$aq_id = $this->tb_all_question->record(array('aq_description' => $aq_description,
    											 		  'active' => 'Y'));
    		$i = 0;
    		foreach ($aa_descriptions as $aa_description) {
    			$this->tb_all_answer->record(array('aa_description' => $aa_description,
    											   'active' => ($aa_actives[$i] == 'Active')?'Y':'N',
    											   'aq_id_ref' => $aq_id));
    			$i++;
    		}
	   	}
	   	/*=============================*/
    	/*======= EDIT SUBMITED =======*/
    	/*=============================*/
    	else if ($type == "edited")
    	{
    		if($aq_description == "" || $aq_description == NULL){
	   			$this->message_error_type = "fail";
				$this->message_error = "Your question message not empty.";
				$this->edit($aq_id);
				return;
	   		}
    		if(count($aa_descriptions) > $MAX_ANSWER || count($aa_descriptions) == 0){
    			$this->message_error_type = "fail";
				$this->message_error = "The answer mustn't over ".$MAX_ANSWER." choice or not empty.";
				$this->edit($aq_id);
				return;
    		}

    		$this->tb_all_question->update(array('aq_description' => $aq_description,
    											 'active' => 'Y' ),$aq_id);

    		//UPDATE EXIST ANSWERS
    		$aa_ids = $this->input->post('aa_id');
    		$count_answers = $this->input->post('count_answers');
    		for($i = 0; $i < $count_answers; $i++){
    			$this->tb_all_answer->update(array('aa_description' => $aa_descriptions[$i],
    											   'active' => ($aa_actives[$i] == 'Active')?'Y':'N' ),$aa_ids[$i]);
    		}

    		//INSERT NEW ANSWERS
    		for($i = $count_answers; $i < count($aa_descriptions); $i++){
    			$this->tb_all_answer->record(array('aa_description' => $aa_descriptions[$i],
    											   'active' => ($aa_actives[$i] == 'Active')?'Y':'N',
    											   'aq_id_ref' => $aq_id));
    		}
	    }

	    /*==================================*/
    	/*======= TRANSACTION COMMIT =======*/
    	/*==================================*/
	   	$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    $this->message_error_type = "fail";
			$this->message_error = "Update question failure";
			$this->edit($aq_id);
		}else{
			$this->message_error_type = "success";
			$this->message_error = "Update question succesfully";
			$this->edit($aq_id);
		}
    }
}
