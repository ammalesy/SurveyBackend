<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add User.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>UserManagement">Show all</a>
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
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>UserManagement/submit/null/added">
                <label>Name</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="a_name" id="a_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <label>User name</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="a_user" id="a_user" class="form-control" placeholder="Username">
                        </div>
                    </div>
                </div>
                 <label>Password</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="a_pass" id="a_pass" class="form-control" placeholder="Password" type="password">
                        </div>
                    </div>
                    
                </div>

                <label>Defind Role</label>
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Role</div>
                            <div class="panel-body">
                                <div class="radio">
                                    <?php $i=0; foreach ($permissions as $permission) : ?>
                                        <label><input type="radio" name="a_permission" value="<?php echo $permission->pm_id; ?>" <?php if($i==0){echo "checked";} ?>><?php echo $permission->pm_name; ?></label><br>
                                    <?php $i++; endforeach; ?>
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
