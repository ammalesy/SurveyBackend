<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_permission extends CI_Model {

    var $db = NULL;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db = $this->load->database("common",TRUE);
    }
    function record($array)
    {
      $this->db->insert('tb_permission', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$pm_id)
    {
      $this->db->where('pm_id', $a_id);
      $this->db->update('tb_permission', $array); 
    }
    function get($pm_id){

      $query = $this->db->query("select * from tb_permission where pm_id = '".$pm_id."'");
      return $query->first_row();
    }
}