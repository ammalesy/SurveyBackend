<?php include("application/views/component/top.php"); ?>
<?php $ci =& get_instance(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        User Management
                    </div>
                    <div class="col-lg-6 text-right">
                    <?php if(check_permission($page,"rw")) { ?>
                        <a href="<?php echo APP_PATH; ?>UserManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add user
                        </button></a>
                    <?php } ?>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>UserManagement">Show all</a>
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
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <?php if(check_permission($page,"rw")) { ?>
                <th class="dt-head-right">Command</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($admins as $admin) : ?>
            <tr>
                <td><?php echo $admin->a_user; ?></td>
                <td><?php echo $admin->a_name; ?></td>
                <td><?php echo $admin->permission->pm_name; ?></td>
                <?php if(check_permission($page,"rw")) { ?>
                <td class="dt-body-right">

                    <a href="<?php echo APP_PATH; ?>UserManagement/edit/<?php echo $admin->a_id; ?>">
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
<?php include("application/views/component/foot.php"); ?>
