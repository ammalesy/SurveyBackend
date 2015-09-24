<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_admin extends CI_Model {

    var $db = NULL;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db = $this->load->database("common",TRUE);
    }
    function record($array)
    {
      $this->db->insert('tb_admin', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$a_id)
    {
      $this->db->where('a_id', $a_id);
      $this->db->update('tb_admin', $array); 
    }
    function get($a_user,$a_pass){

      $query = $this->db->query("select * from tb_admin where a_user = '".$a_user."' AND a_pass = '".$a_pass."'");
      return $query->first_row();
    }
    function get_by_id($a_id){

      $query = $this->db->query("select * from tb_admin where a_id = '".$a_id."'");
      return $query->first_row();
    }
    function fetchAll(){

      $query = $this->db->query("select * from tb_admin");
      return $query->result();
    }
    function fetchAll_not_exist_owner_project($pj_id){

      $query = $this->db->query("SELECT  *
                                  FROM    tb_admin a
                                  WHERE   NOT EXISTS
                                          (
                                          SELECT  null 
                                          FROM    tb_owner o
                                          WHERE   a.a_id = o.a_id_ref AND pj_id_ref = '".$pj_id."'
                                          )");
      return $query->result();
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