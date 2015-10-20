<?php include("application/views/component/top.php"); ?>
<!-- <link href="<?php echo APP_PATH; ?>assets/css/2-col-portfolio.css" rel="stylesheet"> -->
<!-- Page Content -->
    <div class="container">
    <?php
        $pm = check_permission("ProjectManagement","rw");
        $pm2 = check_permission("UserManagement","rw");
    ?>

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All project
                    <small>please select a project.</small>
                    <div class="text-left">
                    <?php if($pm2 == TRUE) { ?>
                            <a href="AssignProject">
                            <button type="button" class="btn btn-sm btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Assign Project
                            </button></a>
                    <?php } ?>
                    <?php if($pm == TRUE) { ?>
                            <a href="ProjectManagement/add" >
                            <button type="button" class="btn btn-sm btn-warning">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Project
                            </button></a>
                            <a href="ProjectManagement">
                            <button type="button" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Project management
                            </button></a>
                    <?php } ?>
                    </div>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        
        <?php $i=1; foreach ($projects as $project) : ?>
            <?php
                if(($i % 3 == 1)){
                    echo '<div class="row">';
                }
            ?>
            <style type="text/css">
                img {
                    height: 270px;
                    width: 100%;
                    object-fit: cover; // here
                }
            </style>
            <div class="col-md-4 portfolio-item">
                <a href="<?php echo APP_PATH."PreviewSurvey/select/".$project->pj_id; ?>">
                    <img  class="image-responsive" width="360" height="270" src="<?php echo APP_PATH."images_upload/".$project->pj_image; ?>" alt="">
                </a>
                <h3>
                    <a href="<?php echo APP_PATH."PreviewSurvey/select/".$project->pj_id; ?>"><?php echo $project->pj_name; ?></a>
                </h3>
                <p><?php echo $project->pj_description; ?></p>
            </div>
            <?php
            	if((count($projects) == 1) && ($i == 1)) { echo '</div>'; }
            	if((count($projects) == 2) && ($i == 2)) { echo '</div>'; }
                if(($i % 3 == 0)){
                    echo '</div>';
                }
            ?>
            
        <?php $i++; endforeach; ?>
        <?php if(count($projects) > 3) { echo '</div>'; }?>
        
        
        <!-- /.row -->

        <!-- Projects Row -->
        <!-- <div class="row">
            <div class="col-md-6 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Three</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-6 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Four</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        </div> -->
        <!-- /.row -->

        <!-- Projects Row -->
        <!-- <div class="row">
            <div class="col-md-6 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Five</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-6 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Six</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        </div> -->
        <!-- /.row -->

        <!-- <hr> -->

        <!-- Pagination -->
        <!-- <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div> -->
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; www.survey.com 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->