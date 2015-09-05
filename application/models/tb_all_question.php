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
    function fetchAll(){
      $this->load->database();
      $query = $this->db->query('select * from tb_all_question');
      return $query->result();
    }
    // function update($array,$user_id)
    // {
    //   $this->load->database();
    //   $this->db->where('user_id', $user_id);
    //   $this->db->update('tb_user', $array); 
    // }
    
}