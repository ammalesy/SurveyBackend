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
    <?php $ci->show_error_message($message_error_type,$message_error); ?>
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
