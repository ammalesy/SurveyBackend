<?php include("application/views/component/top.php"); ?>
<?php $ci =& get_instance(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Role Management
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo APP_PATH; ?>RoleManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Role
                        </button></a>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>RoleManagement">Show all</a>
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
                <th>Role name</th>
                <th>Question page</th>
                <th>Survey page</th>
                <th>Result page</th>
                <th>Admin page</th>
                <th class="dt-head-right">Command</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($permissions as $permission) : ?>
            <tr>
                <td><?php echo $permission->pm_name; ?></td>
                <td><?php echo $ci->pm_toString($permission->question_mgnt); ?></td>
                <td><?php echo $ci->pm_toString($permission->survey_mgnt); ?></td>
                <td><?php echo $ci->pm_toString($permission->survey_result_mgnt); ?></td>
                <td><?php echo $ci->pm_toString($permission->admin_mgnt); ?></td>
                <td class="dt-body-right">

                    <a href="<?php echo APP_PATH; ?>RoleManagement/edit/<?php echo $permission->pm_id; ?>">
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
