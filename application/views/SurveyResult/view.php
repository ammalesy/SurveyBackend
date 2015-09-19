<?php include("application/views/component/top.php"); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $ci->nullableTextIfEmptyData($survey->sm_description); ?>.
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>SurveyResult">Show all</a>
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
            <table id="questionTable" class="table table-striped compact hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Since date</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th class="dt-head-right">Command</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($user_histories as $user_history) : ?>
            <tr>
                <td><?php echo $user_history->h_id;?></td>
                <td><span class="badge"><?php echo $ci->time_elapsed_string($user_history->h_timestamp); ?></span></td>
                <td><?php echo $user_history->user_info->u_firstname." ".$user_history->user_info->u_surname; ?></td>
                <td><?php echo $ci->sex($user_history->user_info->u_sex,'th'); ?></td>
                <td><?php echo $ci->nullableTextIfEmptyData($user_history->user_info->u_tel); ?></td>
                <td><?php echo $ci->nullableTextIfEmptyData($user_history->user_info->u_email); ?></td>
                <?php
                    $list_aa_id = '';
                    foreach ($user_history->ans_info as $key => $value) {
                       if ($key == "id") continue;
                       $list_aa_id .= substr($key,2).":".$value."|";
                    }
                    $list_aa_id = rtrim($list_aa_id, "|")
                ?>
                <td class="dt-body-right">
                        <input type="hidden" id="h_id" data-h-id="<?php echo $user_history->h_id; ?>" value="<?php echo $list_aa_id; ?>">
                        <button type="button" id="view_button" data-h-id="<?php echo $user_history->h_id; ?>" data-sm-name="<?php echo $survey->sm_name; ?>" data-sm-id="<?php echo $survey->sm_id; ?>" data-toggle="modal" data-target="#list_answer_modal" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View answers
                        </button>
                </td>
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>
    </div><!-- /.end col-lg-8 -->
</row><!-- /.end row -->
</div>

<!-- Modal -->
<div id="list_answer_modal" data-seq="" class="modal fade modal-wide-mini" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="sm_name" class="modal-title">Survey</h4>
      </div>


      <div class="modal-body">
        <p id="show_detail_survey_modal" style="overflow:scroll;">
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
        <button type="button" id="refresh" data-h-id="" data-sm-id="" class="btn btn-success">
            <span class="glyphicon glyphicon-refresh"  aria-hidden="true"></span> Refresh
        </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    
    // function inArray(needle, haystack) {
    //     var length = haystack.length;
    //     for(var i = 0; i < length; i++) {
    //         if(haystack[i] == needle) return true;
    //     }
    //     return false;
    // }
    // var cache_survey_view = new Array();
    // function search_survey_in_cache(sm_id){
    //     for (var k in cache_survey_view){
    //         if (typeof cache_survey_view[k] !== 'function') {
    //             if (k === sm_id) {
    //                 return cache_survey_view[k];
    //             }
    //         }
    //     }
    // }
    /*=================================*/
    /*==== VIEW BUTTON ACTION =========*/
    /*=================================*/
    $("button#view_button").click(function(){
        $("div#space-list-survey").html('');
        $("div#space-preload").css("display","inline");

        var sm_id = $(this).attr("data-sm-id");
        var sm_name = $(this).attr("data-sm-name");
        var h_id = $(this).attr("data-h-id");
        var data_f = $("input[data-h-id='"+h_id+"']").val();
        if(data_f === null) data_f = "";
        var list_s_id = data_f.split("|");

        var list_q = [];
        for(var i = 0; i < list_s_id.length; i++){
            var component = list_s_id[i].split(":");
            if (component[1] === "" || component[1] === null || typeof(component[1]) === "undefined"  ) continue;
            list_q[component[0]] = component[1].split(",");
        }

        $("h4#sm_name").html(sm_name);

        // var obj_survey= search_survey_in_cache(sm_id);
        // if (obj_survey != null) {
        //     $("div#space-preload").css("display","none");
        //     $("p#show_detail_survey_modal").html(obj_survey); 
        //     return;
        // }

        $.get("<?php echo APP_PATH; ?>api/SurveyManagement/survey/"+sm_id, function(data, status){
           var list_survey_html = '';
            for (var i = 0; i < data.length; i++) {
                var question = data[i];
                var list_ans_exist = list_q[question.aq_id];
                var bypass = false;
                if (typeof(list_ans_exist) === "undefined" || list_ans_exist === null) {bypass = true;}



                var answers = question.answers;
                var list_answer_html = '';
                for(var j = 0; j < answers.length; j++){

                    var green = '';

                    if(bypass === false){
                        for(var c = 0; c < list_ans_exist.length; c++){
                            if(answers[j].aa_id === list_ans_exist[c]){
                                green = 'list-group-item-success';
                                break;
                            }
                        }
                    }
                    



                    list_answer_html += '<li class="list-group-item '+green+'">'+'<b>('+(j+1)+') </b>'+answers[j].aa_description+'</li>';
                }
                list_survey_html += 
                '<div class="panel panel-default">'+
                '   <div class="panel-heading">'+
                '      <h3 class="panel-title">'+(i+1)+'. '+question.aq_description+'</h3>'+
                '   </div>'+
                '   <div class="panel-body">'+
                '<ul class="list-group">'+
                list_answer_html+
                '</ul>'+
                '</div>'+
                '</div>'; 
            }
            var html = 
            '<div id="space-list-survey">'+
            '<ul class="list-group">'+
            list_survey_html +
            '</ul>'+
            '</div>';
            //cache_survey_view[sm_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_survey_modal").html(html); 
        });
        $("button#refresh").attr("data-sm-id",sm_id);
        $("button#refresh").attr("data-h-id",h_id);
    });
/*=================================*/
/*==== REFRESH BUTTON ACTION ======*/
/*=================================*/
$("button#refresh").click(function(){ 
        $(this).prop('disabled', true);
        $("div#space-list-survey").html('');
        $("div#space-preload").css("display","inline");

        var sm_id = $(this).attr("data-sm-id");
        var sm_name = $(this).attr("data-sm-name");
        var h_id = $(this).attr("data-h-id");
        var data_f = $("input[data-h-id='"+h_id+"']").val();
        if(data_f === null) data_f = "";
        var list_s_id = data_f.split("|");

        var list_q = [];
        for(var i = 0; i < list_s_id.length; i++){
            var component = list_s_id[i].split(":");
            if (component[1] === "" || component[1] === null || typeof(component[1]) === "undefined"  ) continue;
            list_q[component[0]] = component[1].split(",");
        }
        $("h4#sm_name").html(sm_name);
        $.get("<?php echo APP_PATH; ?>api/SurveyManagement/survey/"+sm_id, function(data, status){
       
           var list_survey_html = '';
            for (var i = 0; i < data.length; i++) {
                var question = data[i];
                var answers = question.answers;
                var list_answer_html = '';

                var list_ans_exist = list_q[question.aq_id];
                var bypass = false;
                if (typeof(list_ans_exist) === "undefined" || list_ans_exist === null) {bypass = true;}

                for(var j = 0; j < answers.length; j++){

                    var green = '';

                    if(bypass === false){
                        for(var c = 0; c < list_ans_exist.length; c++){
                            if(answers[j].aa_id === list_ans_exist[c]){
                                green = 'list-group-item-success';
                                break;
                            }
                        }
                    }
                    list_answer_html += '<li class="list-group-item '+green+'"">'+'<b>('+(j+1)+') </b>'+answers[j].aa_description+'</li>';
                }
                list_survey_html += 
                '<div class="panel panel-default">'+
                '   <div class="panel-heading">'+
                '      <h3 class="panel-title">'+(i+1)+'. '+question.aq_description+'</h3>'+
                '   </div>'+
                '   <div class="panel-body">'+
                '<ul class="list-group">'+
                list_answer_html+
                '</ul>'+
                '</div>'+
                '</div>'; 
            }
            var html = 
            '<div id="space-list-survey">'+
            '<ul class="list-group">'+
            list_survey_html +
            '</ul>'+
            '</div>';
            //cache_survey_view[sm_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_survey_modal").html(html); 
            $('button#refresh').removeAttr("disabled");
        });

});
</script>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>
