<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_all_question extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_all_question', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$aq_id)
    {
      $this->load->database();
      $this->db->where('aq_id', $aq_id);
      $this->db->update('tb_all_question', $array); 
    }
    function fetchAll($isActive=TRUE){

      if ($isActive == TRUE) {
         $where = " WHERE active = 'Y'";
      }else{
         $where = "";
      }

      $this->load->database();
      $query = $this->db->query("select * from tb_all_question".$where);
      return $query->result();
    }
    function get($aq_id,$isActive=TRUE){

      if ($isActive == TRUE) {
         $where = " AND active = 'Y'";
      }else{
         $where = "";
      }

      $this->load->database();
      $query = $this->db->query("select * from tb_all_question where aq_id = '".$aq_id."'".$where);
      return $query->first_row();
    }
    
    
}