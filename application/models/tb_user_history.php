<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_user_history extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_user_history', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$h_id)
    {
      $this->load->database();
      $this->db->where('h_id', $u_id);
      $this->db->update('tb_user_history', $array); 
    }
    function fetchAll(){

      $this->load->database();
      $query = $this->db->query("select * from tb_user_history order by h_id DESC");
      return $query->result();
    }
    function count(){
      return $this->db->count_all_results('tb_user_history');
    }
    function fetch_by_sm_id($sm_id_ref){

      $this->load->database();
      $query = $this->db->query("select * from tb_user_history where sm_id_ref = '".$sm_id_ref."' ORDER BY h_timestamp");
      return $query->result();
    }
    function get($h_id){
      $this->load->database();
      $query = $this->db->query("select * from tb_user_history where h_id = '".$h_id."'");
      return $query->first_row();
    }

}