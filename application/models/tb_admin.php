<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_admin extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_admin', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$a_id)
    {
      $this->load->database();
      $this->db->where('a_id', $a_id);
      $this->db->update('tb_admin', $array); 
    }
    function get($a_user,$a_pass){

      $this->load->database();
      $query = $this->db->query("select * from tb_admin where a_user = '".$a_user."' AND a_pass = '".$a_pass."'");
      return $query->first_row();
    }
    function authentication($a_user,$a_pass){
      $results = $this->get($a_user,$a_pass);
      if(count($results) == 1){
        return TRUE;
      }else{
        return FALSE;
      }
    }
    // function update($array,$user_id)
    // {
    //   $this->load->database();
    //   $this->db->where('user_id', $user_id);
    //   $this->db->update('tb_user', $array); 
    // }
    
}