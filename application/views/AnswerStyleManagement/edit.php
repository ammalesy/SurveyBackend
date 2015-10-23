<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Style.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>QuestionManagement">Question Management</a>
                </li>
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>AnswerStyleManagement">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Edit
                </li>
            </ol>
        </div>
    </div>
    <?php $ci->show_error_message($message_error_type,$message_error); ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>AnswerStyleManagement/submit/<?php echo $answer_style->as_id; ?>/edited">
                <label>Style name</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="as_name" id="as_name" class="form-control" placeholder="Name" value="<?php echo $answer_style->as_name; ?>">
                        </div>
                    </div>
                </div>
                <label>Style identifier</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select class="form-control" id="as_identifier" name="as_identifier" >
                            <?php for ($i=0; $i < AnswerStyle::numberOfcomponent(); $i++) { ?>

                                        <option value=<?php echo $i; ?> <?php echo ($answer_style->as_identifier == $i)?"selected":""; ?>><?php echo AnswerStyle::getName($i); ?></option>
            
                            <?php } ?>
                                  
                            </select>
                        </div>
                    </div>
                </div>
                <label>Style description</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                           <textarea name="as_description" class="form-control" rows="5" placeholder="Description"><?php echo $answer_style->as_description; ?></textarea>
                        </div>
                    </div>
                </div>
                <script>
                    $('div').on('click', 'input#as_text_color', function () { 
                        $(this).colorpicker().on('changeColor.colorpicker', function(event){
                                        
                        });  
                        $(this).colorpicker('show');
                    });
                </script>
                 <label>Textcolor style</label>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" id="as_text_color" name="as_text_color" value="<?php echo $answer_style->as_text_color; ?>" class="form-control demo colorpicker-element" />
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                </div>
            </form><!-- /.end  <form role="form"> -->
        </div><!-- /.end col-lg-8 -->
    </row><!-- /.end row -->
</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
