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
      $this->db->insert('Tb_all_answer', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    // function update($array,$user_id)
    // {
    //   $this->load->database();
    //   $this->db->where('user_id', $user_id);
    //   $this->db->update('tb_user', $array); 
    // }
    
}