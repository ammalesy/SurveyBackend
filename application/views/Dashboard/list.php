<?php include("application/views/component/top.php"); ?>


<div class="container-fluid">

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
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>Dashboard/state">Show all</a>
                </li>
                <!-- <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li> -->
            </ol>
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
    <? foreach ($max_surveys as $survey) : ?>
        <!-- <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li> -->
        <!-- <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li> -->
        <li class="list-group-item list-group-item-warning"><?php echo $sm_db->get($survey['sm_id'])->sm_name; ?> <span class="badge"><?php echo $survey['count']; ?></span></li>
        <!-- <li class="list-group-item list-group-item-danger">Vestibulum at eros</li> -->
    <?php endforeach; ?>
    </ul>
    </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
