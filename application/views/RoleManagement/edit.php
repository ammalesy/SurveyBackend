<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Role.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>RoleManagement">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Add
                </li>
            </ol>
        </div>
    </div>
    <?php $ci->show_error_message($message_error_type,$message_error); ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>RoleManagement/submit/<?php echo $permission->pm_id; ?>/edited">
                <label>Role name</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="pm_name" id="pm_name" class="form-control" placeholder="Role name" value="<?php echo $permission->pm_name;?>">
                        </div>
                    </div>
                </div>

                <label>Defind permissions</label>
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Question page</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="question_mgnt" value="r" <?php echo ($permission->question_mgnt == "r")?"checked":""; ?>>Read</label><br>
                                    <label><input type="radio" name="question_mgnt" value="rw" <?php echo ($permission->question_mgnt == "rw")?"checked":""; ?>>Read & Write</label><br>
                                    <label><input type="radio" name="question_mgnt" value="n" <?php echo ($permission->question_mgnt == "n")?"checked":""; ?>>Not allow</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Survey page</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="survey_mgnt" value="r" <?php echo ($permission->survey_mgnt == "r")?"checked":""; ?>>Read</label><br>
                                    <label><input type="radio" name="survey_mgnt" value="rw" <?php echo ($permission->survey_mgnt == "rw")?"checked":""; ?>>Read & Write</label><br>
                                    <label><input type="radio" name="survey_mgnt" value="n" <?php echo ($permission->survey_mgnt == "n")?"checked":""; ?>>Not allow</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Survey Result page</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="survey_result_mgnt" value="r" <?php echo ($permission->survey_result_mgnt == "r")?"checked":""; ?>>Read</label><br>
                                    <label><input type="radio" name="survey_result_mgnt" value="rw" <?php echo ($permission->survey_result_mgnt == "rw")?"checked":""; ?>>Read & Write</label><br>
                                    <label><input type="radio" name="survey_result_mgnt" value="n" <?php echo ($permission->survey_result_mgnt == "n")?"checked":""; ?>>Not allow</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Admin page</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="admin_mgnt" value="r" <?php echo ($permission->admin_mgnt == "r")?"checked":""; ?>>Read</label><br>
                                    <label><input type="radio" name="admin_mgnt" value="rw" <?php echo ($permission->admin_mgnt == "rw")?"checked":""; ?>>Read & Write</label><br>
                                    <label><input type="radio" name="admin_mgnt" value="n" <?php echo ($permission->admin_mgnt == "n")?"checked":""; ?>>Not allow</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Project page</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="project_mgnt" value="r" <?php echo ($permission->project_mgnt == "r")?"checked":""; ?>>Read</label><br>
                                    <label><input type="radio" name="project_mgnt" value="rw" <?php echo ($permission->project_mgnt == "rw")?"checked":""; ?>>Read & Write</label><br>
                                    <label><input type="radio" name="project_mgnt" value="n" <?php echo ($permission->project_mgnt == "n")?"checked":""; ?>>Not allow</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                </div>
            </form><!-- /.end  <form role="form"> -->
        </div><!-- /.end col-lg-8 -->
    </row><!-- /.end row -->
</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
