<?php include("application/views/component/top.php"); ?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Question Management
                    </div>
                    <div class="col-lg-6 text-right">
                    <?php if(check_permission($page,"rw")) { ?>
                        <a href="QuestionManagement/add">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Question
                        </button></a>
                        <a href="QuestionManagement/answer_style">
                        <button type="button" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Answer styles
                        </button></a>
                    <?php } ?>
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>QuestionManagement">Show all</a>
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
                <th>Question ID</th>
                <th>Question</th>
                <th>Active</th>

                <th class="dt-head-right">Command</th>
            </tr>
        </thead>

        <!-- <tfoot>
            <tr>
                <th>Question ID</th>
                <th>Question</th>
                <th>Active</th>
                <th>Command</th>
            </tr>
        </tfoot> -->

        <tbody>
            <?php foreach ($list_all_question as $question) : ?>
            <tr>
                <td><?php echo $question->aq_id; ?></td>
                <td><?php echo $ci->nullableTextIfEmptyData($question->aq_description); ?></td>
                <td><?php echo $question->active; ?></td>
                
                <td class="dt-body-right">
                
                    <!-- <a href="<?php echo APP_PATH; ?>QuestionManagement/view/<?php echo $question->aq_id; ?>"> -->
                        <button id="view_button" data-aq-description="<?php echo $question->aq_description; ?>" 
                            data-aq-id="<?php echo $question->aq_id; ?>" 
                            type="button" class="btn btn-sm btn-primary" 
                            data-toggle="modal" 
                            data-target="#detail_question_modal" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View answers
                        </button> <!-- </a> -->
                <?php if(check_permission($page,"rw")) { ?>
                    <a href="<?php echo APP_PATH; ?>QuestionManagement/edit/<?php echo $question->aq_id; ?>">
                    <button type="button" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </button></a>
                <?php } ?>
                </td>
                
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>

</div>
<!-- Modal -->
<div id="detail_question_modal" class="modal fade" role="dialog">
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
var cache_questions = new Array();

    function search_question_in_cache(aq_id){
        for (var k in cache_questions){
            if (typeof cache_questions[k] !== 'function') {
                if (k === aq_id) {
                    return cache_questions[k];
                }
            }
        }
    }
/*=================================*/
/*==== VIEW BUTTON ACTION =========*/
/*=================================*/
$("button#view_button").click(function(){
        $("div#space-list-answer").html('');
        $("div#space-preload").css("display","inline");

        var aq_id = $(this).attr("data-aq-id");
        var aq_description = $(this).attr("data-aq-description");
        $("h4#aq_description").html(aq_description);

        var obj_question = search_question_in_cache(aq_id);
        if (obj_question != null) {
            
            $("div#space-preload").css("display","none");
            $("p#show_detail_question_modal").html(obj_question); 
            return;
        }
        
        $.get("<?php echo APP_PATH; ?>api/QuestionManagement/question/"+aq_id+"?project_name=<?php echo get_instance()->get_session()->database_selected; ?>", function(data, status){
            var question = data;
            var answers = question.answers;
            var list_q_html = '';
            for (var i = 0; i < answers.length; i++) {
        
                list_q_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answers[i].aa_description+'</li>';  
            }
            var html = 
            '<div id="space-list-answer">'+
            '<ul class="list-group">'+
            list_q_html +
            '</ul>'+
            '</div>';
            cache_questions[aq_id] = html;

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
        $.get("<?php echo APP_PATH; ?>api/QuestionManagement/question/"+aq_id+"?project_name=<?php echo get_instance()->get_session()->database_selected; ?>", function(data, status){
            var question = data;
            var answers = question.answers;
            var list_q_html = '';
            for (var i = 0; i < answers.length; i++) {
        
                list_q_html += '<li class="list-group-item "><b>'+(i+1)+'.</b> '+answers[i].aa_description+'</li>';  
            }
            var html = 
            '<div id="space-list-answer">'+
            '<ul class="list-group">'+
            list_q_html +
            '</ul>'+
            '</div>';
            cache_questions[aq_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_question_modal").html(html);
            $('button#refresh').removeAttr("disabled");
        });
});
</script>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
