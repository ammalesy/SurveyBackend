<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_owner extends CI_Model {

    var $db = NULL;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db = $this->load->database("common",TRUE);
    }
    function record($array)
    {
      $this->db->insert('tb_owner', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$w_id)
    {
      $this->db->where('w_id', $w_id);
      $this->db->update('tb_owner', $array); 
    }
    function delete($w_id)
    {
      $this->db->where('w_id', $w_id);
      $this->db->delete('tb_owner'); 
    }
    function get($w_id){

      $query = $this->db->query("select * from tb_owner where w_id = '".$w_id."'");
      return $query->first_row();
    }
    function fetchAll(){

      $query = $this->db->query("select * from tb_owner");
      return $query->result();
    }  
    function fetch_by_pj_id($pj_id_ref){

      $query = $this->db->query("select * from tb_owner where pj_id_ref = ".$pj_id_ref."");
      return $query->result();
    }    
}