<?php include("application/views/component/top.php"); ?>
<!-- Page Content -->

<div class="container">

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Project.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>ProjectManagement">Show all</a>
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
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>ProjectManagement/submit/<?php echo $project->pj_id; ?>/edited" enctype="multipart/form-data">
                <label>Project name</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="pj_name" id="pj_name" class="form-control" placeholder="Project name" value="<?php echo $project->pj_name; ?>">
                        </div>
                    </div>
                </div>
                <label>Database name (Provide new database.)</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="pj_db_ref" id="pj_db_ref" class="form-control" placeholder="Database name" value="<?php echo $project->pj_db_ref; ?>">
                        </div>
                    </div>
                </div>
                 <label>Description</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <textarea name="pj_description" class="form-control" rows="5" placeholder="Description"><?php echo $project->pj_description; ?></textarea>
                        </div>
                    </div>
                    
                </div>
                <label>Image</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <input type="file" name="pj_image" size="20" />
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
</div>
<?php include("application/views/component/foot.php"); ?>
