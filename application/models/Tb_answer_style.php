<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_answer_style extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_answer_style', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$as_id)
    {
      $this->load->database();
      $this->db->where('as_id', $as_id);
      $this->db->update('tb_answer_style', $array); 
    }
    function delete($as_id){
      $this->load->database();
      $this->db->where('as_id', $as_id);
      $this->db->delete('tb_answer_style');
    }
    function fetchAll(){

      $this->load->database();
      $query = $this->db->query("select * from tb_answer_style order by as_id ASC");
      return $query->result();
    }
    function get($as_id){

      $this->load->database();
      $query = $this->db->query("select * from tb_answer_style where  as_id = '".$as_id."'");
      return $query->first_row();
    }
    function get_by_identifier($as_identifier){

      $this->load->database();
      $query = $this->db->query("select * from tb_answer_style where  as_identifier = '".$as_identifier."'");
      return $query->first_row();
    }
    // function update($array,$user_id)
    // {
    //   $this->load->database();
    //   $this->db->where('user_id', $user_id);
    //   $this->db->update('tb_user', $array); 
    // }
    
}