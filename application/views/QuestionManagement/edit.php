<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Edit Question.
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo APP_PATH.'/index.php/'; ?>QuestionManagement/change_status_question/Y/<?php echo $question->aq_id; ?>">
                        <button type="button" class="btn btn-sm btn-success" <?php echo ($question->active == 'Y')?'disabled':'';?>>
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ACTIVE
                        </button></a>
                        <a href="<?php echo APP_PATH.'/index.php/'; ?>QuestionManagement/change_status_question/N/<?php echo $question->aq_id; ?>">
                        <button type="button" class="btn btn-sm btn-danger" <?php echo ($question->active == 'N')?'disabled':'';?>>
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DEACTIVE
                        </button></a>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH.'/index.php/'; ?>QuestionManagement">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Edit
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
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH.'index.php/'; ?>QuestionManagement/submit/<?php echo $question->aq_id; ?>/edited">
                <div class="form-group">
                    <label>Question</label>
                    <input name="aq_description" class="form-control" placeholder="Question text" value="<?php echo $question->aq_description; ?>">
                    <p class="help-block">Question message text text here.</p>
                </div>
                <label>Answer list</label>
                <input type="hidden" name="count_answers" value="<?php echo count($answers); ?>">
                <? $seq = 1; foreach ($answers as $answer) : ?> 
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><?php echo $seq; ?></span>
                                <input name="aa_description[]" id="aa_description" class="form-control" placeholder="Answer text" value="<?php echo $answer->aa_description; ?>">
                                <input name="aa_id[]" id="aa_id" type="hidden" value="<?php echo $answer->aa_id; ?>">
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-control" name="aa_active[]">
                            <option <?php echo ($answer->active == "Y")?'selected':''; ?>>Active</option>
                            <option <?php echo ($answer->active == "N")?'selected':''; ?>>Deactive</option>
                        </select>
                    </div>
                </div>
                <?php $seq++; endforeach; ?>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <button type="button" class="btn btn-sm btn-primary" id="plus_more" onclick="increase();">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        
                        <button type="button" class="btn btn-sm btn-primary" id="minus_more" onclick="decrease();">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="space_add_more" style="padding-top: 13px">
                    
                    <!-- <div class="row" style="padding-top: 13px">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">+</span>
                                    <input name="aa_description[]" class="form-control" placeholder="Answer text" value="">
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="aa_active[]" >Active
                                </label>
                            </div>
                        </div>
                    </div> -->
                </div>
                 <script>
                            function increase(){
                               
                               var MAX_NUMBER_OF_ANSWER = 20;

                               var aa_description_count = $("input[id*='aa_description']").length;
                               if(aa_description_count == MAX_NUMBER_OF_ANSWER) {
                                    var element_exist = $('div#error_').length;
                                    if(element_exist > 0) return;
                                    var html_error = 
                                    '<div class="row">'+
                                    '   <div class="col-lg-9">'+
                                    '        <div class="alert alert-danger fade in" id="error_">'+
                                    '            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                    '            <strong>Sorry! </strong>Answer is limit ('+MAX_NUMBER_OF_ANSWER+').'+
                                    '        </div>'+
                                    '    </div>'+
                                    '</div>';
                                    $("div#answerObject:last").after(html_error);
                                    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                                    return;
                               }

                               var html = 
                                '<div class="row" id="answerObject">'+
                                '<div class="col-lg-10">'+
                                '   <div class="form-group">'+
                                '        <div class="form-group input-group">'+
                                '            <span class="input-group-addon">'+(aa_description_count+1)+'</span>'+
                                '            <input name="aa_description[]" id="aa_description" class="form-control" placeholder="Answer text">'+
                                '        </div>  '+
                                '    </div>'+
                                '</div>'+
                                '<div class="col-lg-2">'+
                                '<select class="form-control" name="aa_active[]">'+
                                '    <option selected>Active</option>'+
                                '    <option>Deactive</option>'+
                                '</select>'+
                                '</div>'+
                                '</div>';
                               
                               var element_exist = $('#answerObject').length;
                               if(element_exist == 0){
                                  $(".space_add_more").html(html);
                               }else{
                                  $("div#answerObject:last").after(html);
                               }
                               
                               $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                            }
                            function decrease(){

                               $( "div#answerObject:last").remove();
                            }
                 </script>
                <div class="row" style="padding-top: 13px">
                    <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
                    
                
            </form><!-- /.end  <form role="form"> -->
        </div><!-- /.end col-lg-8 -->
    </row><!-- /.end row -->
    

</div>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
