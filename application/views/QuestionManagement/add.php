<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add Question.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>QuestionManagement">Show all</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Add
                </li>
            </ol>
        </div>
    </div>
    <?php $ci->show_error_message($message_error_type,$message_error); ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>QuestionManagement/submit/null/added">
                <div class="form-group">
                    <label>Question</label>
                    <input name="aq_description" class="form-control" placeholder="Question text" value="">
                    <p class="help-block">Question message text text here.</p>
                </div>
                <label>Answer list</label>
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
                                    '<input type="text" data-event='+aa_description_count+' id="color" name="color[]" value="#ffaa00" class="form-control demo colorpicker-element" />'+
                                    // '<input type="text" id="color" class="form-control" name="color[]" value="#FFFFFF" data-event='+aa_description_count+' />'+
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

                                $('div.space_add_more').on('keyup', 'input#aa_description', function () { 
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
                                $('div.space_add_more').on('change', 'select#type', function () { 
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
                                $('div.space_add_more').on('keyup', 'input#color', function () { 
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
