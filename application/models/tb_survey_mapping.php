<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_survey_mapping extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_survey_mapping', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function record_survey_table($table,$array)
    {
      $this->load->database();
      $this->db->insert($table, $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$sm_id)
    {
      $this->load->database();
      $this->db->where('sm_id', $sm_id);
      $this->db->update('tb_survey_mapping', $array); 
    }
    function fetchAll(){

      $this->load->database();
      $query = $this->db->query("select * from tb_survey_mapping order by sm_id DESC");
      return $query->result();
    }
    function count(){
      $this->load->database();
      return $this->db->count_all_results('tb_survey_mapping');
    }
    function get($sm_id){

      $this->load->database();
      $query = $this->db->query("select * from tb_survey_mapping where sm_id = '".$sm_id."'");
      return $query->first_row();
    }
    function get_on_table($sm_table_code,$id){

      $this->load->database();
      //SELECT ALL COLUMN NAME
      $sql = "SELECT `COLUMN_NAME` 
              FROM `INFORMATION_SCHEMA`.`COLUMNS` 
              WHERE `TABLE_SCHEMA`='".$this->db->database."' 
              AND `TABLE_NAME`='".$sm_table_code."';";
      $query = $this->db->query($sql);
      $exist_columns = $query->result();

      //GENERATE NORMAL ARRAY
      $sql_column = 'id ';
      $exist_columns_r = array();
      for($i = 0; $i < count($exist_columns); $i++){
        if($i == 0) continue;
        $exist_columns_r[] = $exist_columns[$i]->COLUMN_NAME;
        $sql_column .= ",`".$exist_columns[$i]->COLUMN_NAME."` as 'q_".$exist_columns[$i]->COLUMN_NAME."'";
      }


      $query = $this->db->query("select ".$sql_column." from ".$sm_table_code." where id = '".$id."'");
   
      return $query->first_row();
    }
    function fetch_all_on_table($sm_table_code){
      $this->load->database();
      $query = $this->db->query("select * from ".$sm_table_code." order by id DESC");
      return $query->result();
    }
    function create_table_survey($sm_table_code,$columns){
      $this->load->database();

      $sql = "CREATE TABLE IF NOT EXISTS `".$sm_table_code."` (";
      $sql .= "`id` int(10) NOT NULL";
      foreach ($columns as $column) {
        $sql .= ",`".$column."` varchar(2000) NOT NULL  DEFAULT '[]'";
      }
      $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";
      $this->db->query($sql);
      
      $sql = "ALTER TABLE `".$sm_table_code."` ADD PRIMARY KEY (`id`);";
      $this->db->query($sql);

      $sql = "ALTER TABLE `".$sm_table_code."` MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;";
      $this->db->query($sql);
    }
    function update_table_survey($sm_table_code,$columns){
      $this->load->database();
      //SELECT ALL COLUMN NAME
      $sql = "SELECT `COLUMN_NAME` 
              FROM `INFORMATION_SCHEMA`.`COLUMNS` 
              WHERE `TABLE_SCHEMA`='".$this->db->database."' 
              AND `TABLE_NAME`='".$sm_table_code."';";
      $query = $this->db->query($sql);
      $exist_columns = $query->result();

      //GENERATE NORMAL ARRAY
      $exist_columns_r = array();
      for($i = 0; $i < count($exist_columns); $i++){
        if($i == 0) continue;
        $exist_columns_r[] = $exist_columns[$i]->COLUMN_NAME;
      }

      //DETECT ADD COLUMN
      for($i = 0; $i < count($columns); $i++){
        if (!in_array($columns[$i], $exist_columns_r)) {
          $this->db->query("ALTER TABLE `".$sm_table_code."` ADD `".$columns[$i]."` varchar(2000) NOT NULL DEFAULT '[]';");
        }
      }

      //DETECT DELETE COLUMN
      for($i = 0; $i < count($exist_columns_r); $i++){
        if (!in_array($exist_columns_r[$i], $columns)) {
          $this->db->query("ALTER TABLE `".$sm_table_code."` DROP `".$exist_columns_r[$i]."`;");
        }
      }
    }
    function fetch_all_on_column($column,$table_name){
      $this->load->database();
      $query = $this->db->query("select id,`".$column."` as 'column'  from ".$table_name."");
      return $query->result();
    }
    function max_survey_that_user_doing(){

    }
    function max_question_that_user_doing($sm_id){

      $survey_map = $this->get($sm_id);
      $table_name = $survey_map->sm_table_code;
      $colums  = explode(",", $survey_map->sm_order_column);

      $column_max = "";
      $curent_max = "";
      $objectReturn = array();
      foreach ($colums as $column) {
        $column_objects = $this->fetch_all_on_column($column,$table_name);

        $count = 0;
        $current_column = $column;
        foreach ($column_objects as $object) {

           if($object->column == "[]" || $object->column == "[ ]" || $object->column == ""){
              continue;
           }else{
              $count++;
           }
        }

        if($count >= $curent_max){
          if($count > $curent_max){
            $objectReturn = array();
          }
          $curent_max = $count;
          $column_max = $current_column;

          array_push($objectReturn, array('aq_id' => $column_max,'count'=>$curent_max,'table_name'=>$table_name ));
        }
      }

      return $objectReturn;

    }
    function max_answer_that_user_doing($sm_id,$aq_id){
      $survey_map = $this->get($sm_id);
      $table_name = $survey_map->sm_table_code;
      $object_question = $this->max_question_that_user_doing($sm_id);
      $result = $this->fetch_all_on_column($aq_id,$table_name);

      $merge_array = array();
      foreach ($result as $object) {
        $jsonAnswer = $object->column;
        $jsonDecode = json_decode($jsonAnswer);
        
        foreach ($jsonDecode as $json) {
          array_push($merge_array, $json->aa_id);
        }

      }
      $group = array_count_values($merge_array);

      $value_max = 0;
      $key_max = "";
      $objectReturn = array();
      foreach ($group as $key => $value) {
        if($value >= $value_max){
          if($value > $value_max){
            $objectReturn = array();
          }
          $key_max = $key;
          $value_max = $value;
          array_push($objectReturn, array('aa_id' => $key_max,'count'=>$value_max));
        }
      }


      return $objectReturn;

    }
    function count_survey_that_user_doing(){

      $surveys = $this->fetchAll();
      $merge_array = array();


      $max_count = 0;
      $maxs_index = array();
      $max_val = 0;

      $i = 0;
      foreach ($surveys as $survey) {
        $count = $this->db->count_all_results($survey->sm_table_code);
        if($count >= $max_count){
          if($count > $max_count){
            $objectReturn = array();
          }
          array_push($maxs_index, $i);
          $max_count = $count;
        }
        $i++;
      }

      $objectReturn = array();
      foreach ($maxs_index as $key => $value) {
        $sm_id = $surveys[$value]->sm_id;
        array_push($objectReturn, array('sm_id' => $sm_id, 'count'=>$max_count ));
      }

      return $objectReturn;
      

    }
}