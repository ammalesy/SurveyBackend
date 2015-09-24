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
                        <?php echo $pj_name;?>
                    </div>
                    <div class="col-lg-6 text-right">
                    <?php if(check_permission("UserManagement","rw") || check_permission("UserManagement","r")) { ?>
                        <a href="<?php echo APP_PATH; ?>AssignProject/assign/<?php echo $pj_id; ?>">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Assign user
                        </button></a>
                    <?php } ?>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>AssignProject">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> list owner
                </li>
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
                <?php if(check_permission("UserManagement","rw")) { ?>
                <th class="dt-head-right">Command</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($owners as $owner) : ?>
            <tr>
                <td><?php echo $owner->admin->a_user; ?></td>
                <td><?php echo $owner->admin->a_name; ?></td>
                <td><?php echo $owner->admin->permission->pm_name; ?></td>
                <?php if(check_permission("UserManagement","rw")) { ?>
                <td class="dt-body-right">

                    <a href="<?php echo APP_PATH; ?>AssignProject/remove/<?php echo $owner->w_id; ?>/<?php echo $pj_id; ?>">
                    <button type="button" class="btn btn-sm btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel project
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
