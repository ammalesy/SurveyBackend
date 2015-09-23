<?php include("application/views/component/top.php"); ?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Overview
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>Dashboard">Overview dashboard</a>
                </li>
                <!-- <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li> -->
            </ol>
        </div>
    </div>
    <!-- /.row -->

                <div class="row">
                    <?php if(check_permission("SurveyResult","r") || check_permission("SurveyResult","rw")) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $history_count; ?></div>
                                        <div>All survey completed</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo APP_PATH; ?>SurveyResult">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(check_permission("SurveyManagement","r") || check_permission("SurveyManagement","rw")) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $survey_count; ?></div>
                                        <div>Survey store</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo APP_PATH; ?>SurveyManagement">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(check_permission("QuestionManagement","r") || check_permission("QuestionManagement","rw")) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $question_count; ?></div>
                                        <div>Question store</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo APP_PATH; ?>QuestionManagement">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- /.row -->
                <?php if(check_permission("SurveyResult","r") || check_permission("SurveyResult","rw")) { ?>
                <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Survey activities
                    </div>
                </div>
                </h1>
                <div class="row">
                    <?php foreach ($surveys as $survey): ?>
                    <?php $results = $survey->result_info;
                        if(count($results) <= 0) continue;
                    ?>
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i><?php echo $survey->sm_name; ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    
                                    <?php foreach ($results as $result) : ?>
                                    <a href="<?php echo APP_PATH; ?>SurveyResult/view/<?php echo $survey->sm_id; ?>" class="list-group-item">
                                        <span class="badge"><?php echo $ci->time_elapsed_string($result->h_timestamp); ?></span>
                                        <i class="fa fa-fw fa-pencil"></i> <?php echo $result->user_info->u_firstname." ".$result->user_info->u_surname; ?> does a survey.
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo APP_PATH; ?>SurveyResult/view/<?php echo $survey->sm_id; ?>">View this survey <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php } ?>
</div>

<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
