<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                View Question.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH.'/index.php/'; ?>QuestionManagement">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> View
                </li>
            </ol>
        </div>
    </div>
    <?php if($message_error_type == "success") { ?>
    <div class="row">
       <div class="col-lg-12">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Well done!</strong> <?php echo $message_error; ?>
            </div>
        </div>
    </div>
    <?php }else if($message_error_type == "fail"){ ?>
    <div class="row">
       <div class="col-lg-12">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry </strong> <?php echo $message_error; ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

         <div class="list-group">
            <a href="#" class="list-group-item active"><b><?php echo $question->aq_description;?></b></a>
            <? $seq = 1; foreach ($answers as $answer) : ?>
            <a href="#" class="list-group-item"><?php echo $seq.". ".$answer->aa_description;?></a>
            <?php $seq++; endforeach; ?>
        </div>


    </div><!-- /.end col-lg-8 -->
</row><!-- /.end row -->
    

</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
