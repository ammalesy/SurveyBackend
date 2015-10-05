<?php include("application/views/component/top.php"); ?>

<div id="page-wrapper">
<div class="container-fluid">

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        Height Score
                    </div>
                </div>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-table"></i>  <a href="<?php echo APP_PATH; ?>Dashboard/state">Show all</a>
                </li>
                <!-- <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li> -->
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
             <div class="panel panel-primary">
              <div class="panel-heading">Question</div>
              <div class="panel-body">
                  
                
                <div class="panel-group" id="accordion">
                <?php foreach ($max_question_answer as $object) : ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                      <div class="row">
                          <div class="col-lg-12">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            <?php echo $object['aq_description']; ?></a>
                          </div>
                      </div>
                      </h4>
                      <div class="row">
                          <div class="col-lg-12">
                          <br>
                            <label>จำนวนผู้ตอบทั้งหมด : <span class="badge"><?php echo $object['count']; ?></span> คน</label>
                          </div>
                      </div>
                      
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <ul class="list-group">
                          <li class="list-group-item">
                              <ul class="list-group">
                                <? foreach ($object['max_answers'] as $answer) : ?>
                                  <li class="list-group-item list-group-item-warning"><label>ข้อที่ผู้ตอบมากที่สุด : <?php echo $answer_db->get_by_id($answer['aa_id'])->aa_description; ?></label></li>
                                  <li class="list-group-item"><label>จำนวนทั้งหมด : <span class="badge"><?php echo $answer['count']; ?></span> คน</label></li>
                                <?php endforeach; ?>
                                </ul>
                          </li>
                          </ul>
                                                  

                      </div>
                    </div>
                  </div>
                  
                  <?php endforeach; ?>
                </div>
                

              </div>
            </div>
        </div>
        
    </div>
    <!-- /.row -->

<!-- /.container-fluid -->
</div>

<?php include("application/views/component/foot.php"); ?>
