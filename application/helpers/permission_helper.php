<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define("ROLE_PAGE", "RoleManagement");
define("USER_PAGE", "UserManagement");
define("SURVEY_PAGE", "SurveyManagement");
define("SURVEY_RESULT_PAGE", "SurveyResult");
define("QUESTION_PAGE", "QuestionManagement");

if ( ! function_exists('check_permisison'))
{

	function check_permisison($page)
	{
		$ci =& get_instance();
		$permissionObject = $ci->get_session()->permission;

		if($page == ROLE_PAGE){
			if($permissionObject->admin_mgnt == "rw"){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == USER_PAGE){
			if($permissionObject->admin_mgnt == "rw"){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == SURVEY_PAGE){
			if($permissionObject->survey_mgnt == "rw"){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == SURVEY_RESULT_PAGE){
			if($permissionObject->survey_result_mgnt == "rw"){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == QUESTION_PAGE){
			if($permissionObject->question_mgnt == "rw"){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		return TRUE;

	}
}
