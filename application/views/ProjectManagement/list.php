<?php include("application/views/component/top.php"); ?>
<!-- Page Content -->
<div class="container">
<?php $ci =& get_instance(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Project Management
                    </div>
                    <div class="col-lg-6 text-right">
                    <?php if(check_permission($page,"rw")) { ?>
                        <a href="<?php echo APP_PATH; ?>ProjectManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add project
                        </button></a>
                        <a href="<?php echo APP_PATH; ?>PreviewSurvey">
                        <button type="button" class="btn btn-sm btn-warning">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Project list
                        </button></a>
                    <?php } ?>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>ProjectManagement">Show all</a>
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
                <th>Project name</th>
                <th>Description</th>
                <?php if(check_permission($page,"rw")) { ?>
                <th class="dt-head-right">Command</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?php echo $project->pj_name; ?></td>
                <td><?php echo $project->pj_description; ?></td>
                <?php if(check_permission($page,"rw")) { ?>
                <td class="dt-body-right">

                    <a href="<?php echo APP_PATH; ?>ProjectManagement/edit/<?php echo $project->pj_id; ?>">
                    <button type="button" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </button></a>
                </td>
                <?php } ?>
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->
</div>
<?php include("application/views/component/foot.php"); ?>