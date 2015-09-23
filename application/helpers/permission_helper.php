<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define("ROLE_PAGE", "RoleManagement");
define("USER_PAGE", "UserManagement");
define("SURVEY_PAGE", "SurveyManagement");
define("SURVEY_RESULT_PAGE", "SurveyResult");
define("QUESTION_PAGE", "QuestionManagement");
define("PROJECT_PAGE", "ProjectManagement");
define("DASHBOARD_PAGE", "Dashboard");

if ( ! function_exists('check_permission'))
{

	function check_permission($page,$expect_pm)
	{
		$ci =& get_instance();
		$permissionObject = $ci->get_session()->permission;

		if($page == ROLE_PAGE){
			if($permissionObject->admin_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == USER_PAGE){
			if($permissionObject->admin_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == SURVEY_PAGE){
			if($permissionObject->survey_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == SURVEY_RESULT_PAGE){
			if($permissionObject->survey_result_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == QUESTION_PAGE){
			if($permissionObject->question_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}else if($page == PROJECT_PAGE){
			if($permissionObject->project_mgnt == $expect_pm){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		return TRUE;

	}
}
