<?php include("application/views/component/top.php"); ?>
<!-- Page Content -->

<div class="container">

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Assign user [<?php echo $project->pj_name; ?>]
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>AssignProject">Show all</a>
                </li>
                <li>
                    <i class="fa fa-user"></i> <a href="<?php echo APP_PATH; ?>AssignProject/view/<?php echo $project->pj_id; ?>">list owner</a>
                </li>
                <li class="active">
                    Assign user
                </li>
            </ol>
        </div>
    </div>
    <?php $ci->show_error_message($message_error_type,$message_error); ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if(count($admins) > 0) { ?>
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>AssignProject/submit/<?php echo $project->pj_id; ?>/added" enctype="multipart/form-data">
                <label>Please chose a user.</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select class="form-control" name="a_id">
                            <? foreach ($admins as $admin) : ?>

                                <option value="<?php echo $admin->a_id; ?>"><?php echo $admin->a_name." (".$admin->a_user." : role:".$admin->permission->pm_name.")"; ?></option>
                            <? endforeach; ?>
                            </select>
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
            <?php }else{ echo "<h3><div class='text-center'>Assign limit.</div></h3>"; } ?>
        </div><!-- /.end col-lg-8 -->
    </row><!-- /.end row -->
</div>
<!-- /.container-fluid -->
</div>
<?php include("application/views/component/foot.php"); ?>
