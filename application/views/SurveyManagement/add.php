<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add Survey.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>SurveyManagement">Show all</a>
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
            <form id="surveyForm" role="form" method="post" action="<?php echo APP_PATH; ?>SurveyManagement/submit/null/added" enctype="multipart/form-data">
                <label>STEP 1. Defind survey defination.</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input name="sm_name" id="sm_name" class="form-control" placeholder="Survey name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="sm_description" class="form-control" rows="5" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <label>Survey Image</label>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <input type="file" name="sm_image" size="20" />
                        </div>
                    </div>
                </div>
                <label>STEP 2. Add the questions.</label>
     
                <?php $i = 0; foreach ($questions_auto as $question) : ?>
                <div class="row" id="questionObject">
		        <input type="hidden" value="<?php echo $question->aq_id; ?>" id="question_group" name="question_group[]" data-seq="<?php echo $i+1; ?>">
		        <div class="col-sm-12">
		           <div class="form-group">
		                <div class="form-group input-group">
		                    <span class="input-group-addon" data-seq="<?php echo $i+1; ?>"><?php echo $i+1; ?></span>
		                    <input disabled id="question_message" value="<?php echo $question->aq_description; ?>" data-seq="<?php echo $i+1; ?>" class="form-control" placeholder="Please select a question.">
		                </div>
		            </div>
		        </div>
		        </div>
		        <?php $i++; endforeach; ?>


      
                
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
<!-- Modal -->
<div id="list_question_modal" class="modal fade modal-wide" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Question list.</h4>
      </div>
      <div class="modal-body">
        <p>
        <table id="questionTable" class="table table-striped compact hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Question</th>
                    <th class="dt-head-right">Command</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($questions as $question) : ?>
            <tr>
                <td><?php echo $ci->nullableTextIfEmptyData($question->aq_description); ?></td>
                <td class="dt-body-right">
                        <button type="button" id="view_button" data-aq-description="<?php echo $question->aq_description; ?>" data-aq-id="<?php echo $question->aq_id; ?>" data-toggle="modal" data-target="#detail_question_modal" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Answers
                        </button>

                            <button data-dismiss="modal" type="button" onclick="onclick_plus_button(this);" data-aq-id="<?php echo $question->aq_id; ?>" data-aq-description="<?php echo $question->aq_description; ?>" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr> 
                <?php endforeach; ?>    
            </tbody>
        </table>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="detail_question_modal" data-seq="" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="aq_description" class="modal-title">Question</h4>
      </div>


      <div class="modal-body">
        <p id="show_detail_question_modal">
            <div id="space-preload">
            <label>Please wait..</label>
            <div class="progress">
                <div id="preload" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                </div>
            </div>
        </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" id="refresh" data-aq-id="" class="btn btn-success">
            <span class="glyphicon glyphicon-refresh"  aria-hidden="true"></span> Refresh
        </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    function onclick_select_question(button){
        var seq = $(button).attr('data-seq');
        $('div#detail_question_modal').attr('data-seq',seq);
    }
    function onclick_plus_button(button){
        var seq = $('div#detail_question_modal').attr('data-seq');
        var aq_id = $(button).attr('data-aq-id');
        var aq_description = $(button).attr('data-aq-description');

        $("input#question_message[data-seq='" + seq + "']").val(aq_description);
        $("input#question_group[data-seq='" + seq + "']").val(aq_id);
        // $("span.input-group-addon[data-seq='" + seq + "']").css("background-color","#5cb85c");
        // $("span.input-group-addon[data-seq='" + seq + "']").css("color","#FFFFFF");
    }
    function increase(){

        var MAX_NUMBER_OF_QUESTION = 20;

        var question_group_count = $("input[id*='question_group']").length;
        if(question_group_count == MAX_NUMBER_OF_QUESTION) {
            var element_exist = $('div#error_').length;
            if(element_exist > 0) return;
            var html_error = 
            '<div class="row">'+
            '   <div class="col-lg-9">'+
            '        <div class="alert alert-danger fade in" id="error_">'+
            '            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
            '            <strong>Sorry! </strong>Question is limit ('+MAX_NUMBER_OF_QUESTION+').'+
            '        </div>'+
            '    </div>'+
            '</div>';
            $("div#questionObject:last").after(html_error);
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
            return;
        }

        var html = 
        '<div class="row" id="questionObject">'+

        '<div class="col-lg-1" style="margin-right:10px">'+
        '<button type="button" onclick="onclick_select_question(this);" id="select" data-seq="'+(question_group_count+1)+'" data-toggle="modal" data-target="#list_question_modal" class="btn btn-success">'+
        '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select'+
        '</button>'+
        '</div>'+
        '<input type="hidden" value="" id="question_group" name="question_group[]" data-seq="'+(question_group_count+1)+'">'+ //HIDDEN FEILD question_group [POST]
        '<div class="col-lg-10">'+
        '   <div class="form-group">'+
        '        <div class="form-group input-group">'+
        '            <span class="input-group-addon" data-seq="'+(question_group_count+1)+'">'+(question_group_count+1)+'</span>'+
        '            <input disabled id="question_message" data-seq="'+(question_group_count+1)+'" class="form-control" placeholder="Please select a question.">'+
        '        </div>  '+
        '    </div>'+
        '</div>'+

        '</div>';

        var element_exist = $('#questionObject').length;
        if(element_exist == 0){
          $(".space_add_more").html(html);
        }else{
          $("div#questionObject:last").after(html);
        }

        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    }

    function decrease(){

     $( "div#questionObject:last").remove();
    }

    var cache_answers = new Array();
    function search_answer_in_cache(aq_id){
        for (var k in cache_answers){
            if (typeof cache_answers[k] !== 'function') {
                if (k === aq_id) {
                    return cache_answers[k];
                }
            }
        }
    }
    /*=================================*/
    /*==== VIEW BUTTON ACTION =========*/
    /*=================================*/
    $("button#view_button").click(function(){

        var USE_CACHE = false;

        $("div#space-list-answer").html('');
        $("div#space-preload").css("display","inline");

        var aq_id = $(this).attr("data-aq-id");
        var aq_description = $(this).attr("data-aq-description");
        $("h4#aq_description").html(aq_description);

        var obj_answer = (USE_CACHE)?search_answer_in_cache(aq_id):null;
        if (obj_answer != null) {
            $("div#space-preload").css("display","none");
            $("p#show_detail_question_modal").html(obj_answer); 
            return;
        }

        $.get("<?php echo APP_PATH; ?>api/QuestionManagement/answers/"+aq_id+"?project_name=<?php echo get_instance()->get_session()->database_selected; ?>", function(data, status){
           var list_ans_html = '';
            for (var i = 0; i < data.length; i++) {
                var answer = data[i];
                // list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answer.aa_description+'</li>';  

                var type = answer.type;
                var color = answer.aa_color;

                list_ans_html  += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answer.style.html+'</li>';
                    // if(type == "0"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="checkbox"> <font color='+color+'>'+answer.aa_description+'</font></li>';

                    // }else if(type == "1"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="text" placeholder="'+' '+answer.aa_description+'" style="color:'+color+'"></li>';

                    // }else if(type == "2"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="radio"> <font color='+color+'>'+answer.aa_description+'</font></li>';
                    // }


            }
            var html = 
            '<div id="space-list-answer">'+
            '<ul class="list-group">'+
            list_ans_html +
            '</ul>'+
            '</div>';
            cache_answers[aq_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_question_modal").html(html); 
        });
        $("button#refresh").attr("data-aq-id",aq_id);
    });
/*=================================*/
/*==== REFRESH BUTTON ACTION ======*/
/*=================================*/
$("button#refresh").click(function(){
        $(this).prop('disabled', true);
        $("div#space-list-answer").html('');
        $("div#space-preload").css("display","inline");

        var aq_id = $(this).attr("data-aq-id");
        var aq_id = $(this).attr("data-aq-id");
        var aq_description = $(this).attr("data-aq-description");
        $("h4#aq_description").html(aq_description);
        $.get("<?php echo APP_PATH; ?>api/QuestionManagement/answers/"+aq_id+"?project_name=<?php echo get_instance()->get_session()->database_selected; ?>", function(data, status){
           var list_ans_html = '';
            for (var i = 0; i < data.length; i++) {
                var answer = data[i];
                // list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answer.aa_description+'</li>';  

                var type = answer.type;
                var color = answer.aa_color;
                 list_ans_html  += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answer.style.html+'</li>';
                    // if(type == "0"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="checkbox"> <font color='+color+'>'+answer.aa_description+'</font></li>';

                    // }else if(type == "1"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="text" placeholder="'+' '+answer.aa_description+'" style="color:'+color+'"></li>';

                    // }else if(type == "2"){

                    //     list_ans_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+'<input type="radio"> <font color='+color+'>'+answer.aa_description+'</font></li>';
                    // }
            }
            var html = 
            '<div id="space-list-answer">'+
            '<ul class="list-group">'+
            list_ans_html +
            '</ul>'+
            '</div>';
            cache_answers[aq_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_question_modal").html(html); 
            $('button#refresh').removeAttr("disabled");
        });

});
</script>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
