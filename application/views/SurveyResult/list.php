<?php include("application/views/component/top.php"); ?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Survey Result
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>SurveyResult">Show all</a>
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
                <th>Survey code</th>
                <th>Survey name</th>
                <th>Description</th>
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
            <?php foreach ($surveys as $survey) : ?>
            <tr>
                <td><?php echo $survey->sm_table_code; ?></td>
                <td><?php echo $survey->sm_name; ?></td>
                <td><?php echo $ci->nullableTextIfEmptyData($survey->sm_description); ?></td>
                <td class="dt-body-right">
                    <a href="<?php echo APP_PATH; ?>SurveyResult/view/<?php echo $survey->sm_id; ?>">
                    <button type="button" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View user
                    </button></a>
                    <button type="button" id="view_button" data-sm-name="<?php echo $survey->sm_name; ?>" data-sm-id="<?php echo $survey->sm_id; ?>" data-toggle="modal" data-target="#list_survey_modal" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </td>
            </tr> 
            <?php endforeach; ?>    
        </tbody>
    </table>

</div>

<!-- Modal -->
<div id="list_survey_modal" data-seq="" class="modal fade modal-wide-mini" role="dialog">
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
        <button type="button" id="refresh" data-sm-id="" class="btn btn-success">
            <span class="glyphicon glyphicon-refresh"  aria-hidden="true"></span> Refresh
        </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    var cache_survey = new Array();
    function search_survey_in_cache(sm_id){
        for (var k in cache_survey){
            if (typeof cache_survey[k] !== 'function') {
                if (k === sm_id) {
                    return cache_survey[k];
                }
            }
        }
    }
    /*=================================*/
    /*==== VIEW BUTTON ACTION =========*/
    /*=================================*/
    $("button#view_button").click(function(){
        $("div#space-list-survey").html('');
        $("div#space-preload").css("display","inline");

        var sm_id = $(this).attr("data-sm-id");
        var sm_name = $(this).attr("data-sm-name");
        $("h4#sm_name").html(sm_name);

        var obj_survey= search_survey_in_cache(sm_id);
        if (obj_survey != null) {
            $("div#space-preload").css("display","none");
            $("p#show_detail_survey_modal").html(obj_survey); 
            return;
        }

        $.get("<?php echo APP_PATH; ?>api/SurveyManagement/survey/"+sm_id, function(data, status){
           var list_survey_html = '';
            for (var i = 0; i < data.length; i++) {
                var question = data[i];
                var answers = question.answers;
                var list_answer_html = '';
                for(var j = 0; j < answers.length; j++){
                    list_answer_html += '<li class="list-group-item">'+'<b>('+(j+1)+') </b>'+answers[j].aa_description+'</li>';
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
            cache_survey[sm_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_survey_modal").html(html); 
        });
        $("button#refresh").attr("data-sm-id",sm_id);
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
        $("h4#sm_name").html(sm_name);
        $.get("<?php echo APP_PATH; ?>api/SurveyManagement/survey/"+sm_id, function(data, status){
       
           var list_survey_html = '';
            for (var i = 0; i < data.length; i++) {
                var question = data[i];
                var answers = question.answers;
                var list_answer_html = '';
                for(var j = 0; j < answers.length; j++){
                    list_answer_html += '<li class="list-group-item">'+'<b>('+(j+1)+') </b>'+answers[j].aa_description+'</li>';
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
            cache_survey[sm_id] = html;

            $("div#space-preload").css("display","none");
            $("p#show_detail_survey_modal").html(html); 
            $('button#refresh').removeAttr("disabled");
        });

});
</script>
<!-- /.container-fluid -->
<?php include("application/views/component/foot.php"); ?>