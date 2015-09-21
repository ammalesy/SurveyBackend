<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_project extends CI_Model {

    var $db = NULL;

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("common",TRUE);
    }
    function record($array)
    {
      $this->db->insert('tb_project', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$pj_id)
    {
      $this->db->where('pj_id', $a_id);
      $this->db->update('tb_project', $array); 
    }
    function get($pj_id){

      $query = $this->db->query("select * from tb_project where pj_id = '".$pj_id."'");
      return $query->first_row();
    }
    function fetchAll(){

      $query = $this->db->query("select * from tb_project");
      return $query->result();
    }
    
}