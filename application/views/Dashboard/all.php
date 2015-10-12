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
                    <div class="col-lg-6 text-right">
                    <?php if(check_permission($page,"rw")) { ?>
       <!--                  <a href="Dashboard/state">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Watch state
                        </button></a> -->
                    <?php } ?>
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
                

                <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        All Survey
                    </div>
                </div>
            </h1>

        </div>
    </div>

    <!-- /.row -->

    <table id="questionTable" class="table table-striped compact hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Survey ID</th>
                <th>Survey code</th>
                <th>Survey name</th>
                <th class="dt-head-right">Command</th>
            </tr>
        </thead>

        <!-- <tfoot>
            <tr>
                <th>Question ID</th>
                <th>Question</th>
                <th>Active</th>
                <th>Command</th>
            </tr>
        </tfoot> -->

        <tbody>
            <?php foreach ($surveys as $survey) : ?>
            <tr>
                <td><?php echo $survey->sm_id; ?></td>
                <td><?php echo $survey->sm_table_code; ?></td>
                <td><?php echo $survey->sm_name; ?></td>
                <td class="dt-body-right">
                    <a href="<?php echo APP_PATH; ?>Dashboard/view_state/<?php echo $survey->sm_id; ?>">
                    <button type="button" id="view_button" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> View State
                    </button></a>
                </td>
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>
<div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                       Height Score surveys
                    </div>
                </div>
            </h1>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <ul class="list-group">
    <?php
        if(count($max_surveys) <= 0){
            echo '<li class="list-group-item list-group-item-info "><center>No data available.</center></span></li>';
        }
    ?>
    <? foreach ($max_surveys as $survey) : ?>
        <!-- <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li> -->
        <!-- <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li> -->
        <li class="list-group-item list-group-item-info"><?php echo $sm_db->get($survey['sm_id'])->sm_name; ?> <span class="badge"><?php echo $survey['count']; ?></span></li>
        <!-- <li class="list-group-item list-group-item-danger">Vestibulum at eros</li> -->
    <?php endforeach; ?>
    </ul>
    </div>
    </div>
</div>
</div>

<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
