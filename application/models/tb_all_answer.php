<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_all_answer extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_all_answer', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$aa_id)
    {
      $this->load->database();
      $this->db->where('aa_id', $aa_id);
      $this->db->update('tb_all_answer', $array); 
    }
    function delete($aq_id_ref){
      $this->load->database();
      $this->db->where('aq_id_ref', $aq_id_ref);
      $this->db->delete('tb_all_answer');
    }
    function get($aq_id_ref,$isActive=TRUE){

      if ($isActive == TRUE) {
         $where = " AND active = 'Y'";
      }else{
         $where = "";
      }

      $this->load->database();
      $query = $this->db->query("select * from tb_all_answer where  aq_id_ref = '".$aq_id_ref."'".$where);
      return $query->result();
    }
    // function update($array,$user_id)
    // {
    //   $this->load->database();
    //   $this->db->where('user_id', $user_id);
    //   $this->db->update('tb_user', $array); 
    // }
    
}