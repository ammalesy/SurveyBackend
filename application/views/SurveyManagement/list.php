<?php include("application/views/component/top.php"); ?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Survey Management
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo APP_PATH.'index.php/'; ?>SurveyManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Survey
                        </button></a>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH.'index.php/'; ?>SurveyManagement">Show all</a>
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
                <th>Table name</th>
                <th>Name</th>
                <th>Description</th>
                <th>Update at</th>
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
                <td><?php echo $survey->sm_table_code; ?></td>
                <td><?php echo $survey->sm_name; ?></td>
                <td><?php echo $survey->sm_description; ?></td>
                <td><?php echo $ci->dateThai($survey->sm_update_at); ?></td>
                <td class="dt-body-right">
                    <a href="<?php echo APP_PATH.'index.php/'; ?>SurveyManagement/view/<?php echo $survey->sm_id; ?>">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View survey
                        </button></a>
                    <a href="<?php echo APP_PATH.'index.php/'; ?>SurveyManagement/edit/<?php echo $survey->sm_id; ?>">
                    <button type="button" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </button></a>
                </td>
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
