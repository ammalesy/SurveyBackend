<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_user_info extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_user_info', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$u_id)
    {
      $this->load->database();
      $this->db->where('u_id', $u_id);
      $this->db->update('tb_user_info', $array); 
    }
    function fetchAll(){

      $this->load->database();
      $query = $this->db->query("select * from tb_user_info order by u_id DESC");
      return $query->result();
    }
    function get($u_id){

      $this->load->database();
      $query = $this->db->query("select * from tb_user_info where u_id = '".$u_id."'");
      return $query->first_row();
    }
}