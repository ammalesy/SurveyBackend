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
                    <?php if(check_permission($page,"rw")) { ?>
                        <a href="<?php echo APP_PATH; ?>QuestionManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Question
                        </button></a>
                        <a href="<?php echo APP_PATH; ?>QuestionManagement/change_status_question/Y/<?php echo $question->aq_id; ?>">
                        <button type="button" class="btn btn-sm btn-success" <?php echo ($question->active == 'Y')?'disabled':'';?>>
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ACTIVE
                        </button></a>
                        <a href="<?php echo APP_PATH; ?>QuestionManagement/change_status_question/N/<?php echo $question->aq_id; ?>">
                        <button type="button" class="btn btn-sm btn-danger" <?php echo ($question->active == 'N')?'disabled':'';?>>
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DEACTIVE
                        </button></a>
                    <?php } ?>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>QuestionManagement">Show all</a>
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
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>QuestionManagement/submit/<?php echo $question->aq_id; ?>/edited">
                <div class="form-group">
                    <label>Question</label>
                    <input name="aq_description" class="form-control" placeholder="Question text" value="<?php echo $question->aq_description; ?>">
                    <p class="help-block">Question message text text here.</p>

                    <label>Auto Display</label><br>
                    <label class="checkbox-inline">
                            <?php
                            $isDisplay = "";
                                if($question->aq_auto_display == 1){
                                    $isDisplay = "checked";
                                }
                            ?>
                            <input type="checkbox" name="aq_auto_display" <?php echo $isDisplay; ?>  data-toggle="toggle">
                    </label>
                </div>
                <label>Answer list</label>
                <input type="hidden" name="count_answers" value="<?php echo count($answers); ?>">

                <? $seq = 1; foreach ($answers as $answer) : ?> 
                <!-- <div class="row">
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
                </div> -->
                <div class="row">
                <div class="col-lg-8">
                <div class="panel panel-success">
                <div class="panel-heading">Answer : <?php echo $seq; ?></div>
                <div class="panel-body">

                <label>Answer detail.</label>
                <div class="row">
                    <div class="col-lg-9">
                       <div class="form-group">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><?php echo $seq; ?></span>
                                <input name="aa_description[]" data-event="<?php echo $seq-1; ?>" id="aa_description" class="form-control" placeholder="Label text" value="<?php echo $answer->aa_description; ?>">
                                <input name="aa_id[]" id="aa_id" type="hidden" value="<?php echo $answer->aa_id; ?>">
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control" name="aa_active[]" id="active" data-event="<?php echo $seq-1; ?>">
                                    <option <?php echo ($answer->active == "Y")?'selected':''; ?>>Active</option>
                                    <option <?php echo ($answer->active == "N")?'selected':''; ?>>Deactive</option>
                        </select>
                    </div>
                </div>

                <label>Answer style.</label>
                <div class="row">
                    <div class="col-lg-9">
                        <select class="form-control" name="type[]" id="type" data-event="<?php echo $seq-1; ?>">
                            <option value='0' <?php echo ($answer->type == "0")?'selected':''; ?>>checkbox</option>
                            <option value='1' <?php echo ($answer->type == "1")?'selected':''; ?>>Text box</option>
                            <option value='2' <?php echo ($answer->type == "2")?'selected':''; ?>>Radio button</option>
                        </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control colorpicker-element" id="color" name="color[]" value="<?php echo $answer->aa_color; ?>" data-event="<?php echo $seq-1; ?>" />
                            
                        </div>
                        </div>
                    </div>
                </div>

                                    
                </div>

                <div class="col-lg-4">
                <div class="panel panel-info">
                <div class="panel-heading">Preview</div>
                <div class="panel-body">
                <div class="space_preview<?php echo ($seq-1); ?>">
                <div class="row">
                <div class="col-lg-1">
                <div id="component">

                <?php 
                    if($answer->type == 0) { 
                        echo "<input id=checkbox type=checkbox>";
                    }else if($answer->type == 1){
                        echo "<input type=text id=text placeholder=' ".$answer->aa_description."' style='color:".$answer->aa_color."'>";
                    }else if($answer->type == 2){
                        echo "<input id=radio type=radio>";
                    }

                ?>
                
                </div>

                </div>

                <div class="col-lg-6">
                <div id="label" style="color:<?php if($answer->aa_color=="#FFFFFF"){echo "#000000"; } echo $answer->aa_color; ?>">
                    <?php
                        if($answer->type != 1) {
                            echo " ".$answer->aa_description;
                        }
                    ?>
                </div>
                </div>

                </div>
             
                </div>
                </div>
                </div>
                </div>
                </div>
                <?php $seq++; endforeach; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <button type="button" class="btn btn-sm btn-primary" id="plus_more" onclick="increase();">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        
                        <button type="button" class="btn btn-sm btn-primary" id="minus_more" onclick="decrease();">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                    </div>
                    </div>
                </div>
                <div class="space_add_more">
                    
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
                                '<div class="col-lg-8">'+
                                    '<div class="panel panel-success">'+
                                    '<div class="panel-heading">Answer : '+(aa_description_count+1)+'</div>'+
                                    '<div class="panel-body">'+

                                    '<label>Answer detail.</label>'+
                                    '<div class="row">'+
                                    '<div class="col-lg-9">'+
                                    '   <div class="form-group">'+
                                    '        <div class="form-group input-group">'+
                                    '            <span class="input-group-addon">'+(aa_description_count+1)+'</span>'+
                                    '            <input data-event='+aa_description_count+' name="aa_description[]" id="aa_description" class="form-control" placeholder="Label text">'+
                                    '        </div>  '+
                                    '    </div>'+
                                    '</div>'+
                                    '<div class="col-lg-3">'+
                                    '<select class="form-control" id="aa_active" name="aa_active[]" data-event='+aa_description_count+'>'+
                                    '    <option selected>Active</option>'+
                                    '    <option>Deactive</option>'+
                                    '</select>'+
                                    '</div>'+
                                    '</div>'+

                                    '<label>Answer style.</label>'+
                                    '<div class="row">'+
                                    '<div class="col-lg-9">'+
                                    '<select class="form-control" id="type" name="type[]" data-event='+aa_description_count+'>'+
                                    '    <option value=0 selected>checkbox</option>'+
                                    '    <option value=1>Text box</option>'+
                                    '    <option value=2>Radio button</option>'+
                                    '</select>'+
                                    '</div>'+
                                    '<div class="col-lg-3">'+
                                    '<input type="text" id="color" class="form-control" name="color[]" value="#FFFFFF" data-event='+aa_description_count+' />'+
                                    '</div>'+
                                    '</div>'+

                                    '</div>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="col-lg-4">'+
                                '<div class="panel panel-info">'+
                                '<div class="panel-heading">Preview</div>'+
                                '<div class="panel-body">'+
                                '<div class="space_preview'+aa_description_count+'">'+

                                '<div class="row">'+
                                '<div class="col-lg-1">'+
                                '<div id="component"><input type="checkbox"></div>'+
                                '</div>'+

                                '<div class="col-lg-6">'+
                                '<div id="label"> example</div>'+
                                '</div>'+

                                '</div>'+
             
                                '</div>'+
                                '</div>'+
                                '</div>'+
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


                            $(document).ready(function() {

                                var checkbox_identifier = "0";
                                var textbox_identifier = "1";
                                var radio_identifier = "2";

                                $('div').on('keyup', 'input#aa_description', function () { 
                                    var seq = $(this).attr("data-event");
                                    var type = $("#type[data-event='"+seq+"']").val();
                                   
                                    var text = $(this).val();
                                    if(type !== textbox_identifier){
                                        
                                        var label = $('.space_preview'+seq+' div#label');
                                        label.html(text);
                                    }else{
                                        $('.space_preview'+seq+' div#component').find('input#text').attr("placeholder", text);   
                                    }
           
                                                                        
                                });
                                $('div').on('change', 'select#type', function () { 
                                     var seq = $(this).attr("data-event");
                                     var text = $(this).val();
                                     if(text === "0")
                                     {
                                        $('.space_preview'+seq+' div#component').html("<input id=checkbox type=checkbox>");
                                        var val = $('.space_preview'+seq+' div#label').html();
                                        if(val === ""){
                                            $('.space_preview'+seq+' div#label').html("example");
                                        }
                                     }
                                     else if(text === textbox_identifier)
                                     {

                                        $('.space_preview'+seq+' div#component').html("<input type=text id=text  placeholder=' example'>");
                                        $('.space_preview'+seq+' div#label').html("");

                                     }
                                     else if(text === radio_identifier)
                                     {
                                        $('.space_preview'+seq+' div#component').html("<input id=radio type=radio>");
                                        var val = $('.space_preview'+seq+' div#label').html();
                                        if(val === ""){
                                            $('.space_preview'+seq+' div#label').html("example");
                                        }
                                     }
                                     $('space_preview'+seq).html('type');
                                });
                                $('div').on('keyup', 'input#color', function () { 
                                     var seq = $(this).attr("data-event");
                                     var val = $(this).val();

                                     $('.space_preview'+seq+' div#component').find('input#text').css("color",val);
                                     $('.space_preview'+seq+' div#label').css("color",val);



                                });
                                $('div').on('click', 'input#color', function () { 
                                    $(this).colorpicker().on('changeColor.colorpicker', function(event){
                                        var seq = $(this).attr("data-event");
                                        var val = $(this).val();

                                        $('.space_preview'+seq+' div#component').find('input#text').css("color",val);
                                        $('.space_preview'+seq+' div#label').css("color",val);
                                    });  
                                    $(this).colorpicker('show');
                                });
                            });


                 </script>
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
