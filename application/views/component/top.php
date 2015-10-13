
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Survey BOS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo APP_PATH."assets/"; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo APP_PATH."assets/"; ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo APP_PATH."assets/"; ?>module/colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet"> 
    <link href="<?php echo APP_PATH."assets/"; ?>module/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo APP_PATH."assets/"; ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo APP_PATH."assets/"; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo APP_PATH."assets/"; ?>css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_PATH."assets/"; ?>css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo APP_PATH."assets/" ?>css/bootstrap-toggle.min.css" rel="stylesheet">



    <!-- <link rel="stylesheet" href="<?php echo APP_PATH."assets/"; ?>css/pick-a-color-1.2.3.min.css"> -->
    <style>
        .modal.modal-wide .modal-dialog {
          width: 60%;
        }.modal.modal-wide-mini .modal-dialog {
          width: 50%;
        }
        .modal-wide .modal-body {
          overflow-y: auto;
        }
        .modal-wide-mini .modal-body {
          max-height: 450px;
          overflow-y: auto;
        }

        <?php if($page=="PreviewSurvey" || $page=="ProjectManagement" || $page=="AssignProject") { ?>
        @media(min-width:768px) {
            #wrapper {
               
            }

            #page-wrapper {
                padding: 10px;
            }
        }
        <?php }else{ ?>
            @media(min-width:768px) {
            #wrapper {
                padding-left: 225px; 
            }

            #page-wrapper {
                padding: 10px;
            }
        }
        <?php } ?>

    </style>



</head>

<body>
<!-- jQuery -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>module/colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>module/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/bootstrap-toggle.min.js"></script>
   

    <script>
        $(document).ready(function() {
            $('#questionTable').DataTable({
                "pagingType": "full_numbers",
                 "order": [[ 0, "desc" ]]
            });
            $('#questionTable2').DataTable({
                "pagingType": "full_numbers",
                 "order": [[ 0, "desc" ]]
            });
            // $(function(){
            //     $('.demo1').colorpicker();
            // });

        

        });



    </script>


    

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo APP_PATH; ?>PreviewSurvey">Survey Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <?php
                        $ci =& get_instance(); 
                        $admin = $ci->get_session(); 
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php echo $admin->a_name; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                         <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
                        <?php if(check_permission('ProjectManagement',"rw") || check_permission('ProjectManagement',"r")){ ?>
                        <li>
                            <a href="<?php echo APP_PATH.'ProjectManagement'; ?>"><i class="fa fa-fw fa-star"></i>Project management</a>
                        </li>
                        <?php } ?>
                        <?php if(check_permission('UserManagement',"rw") || check_permission('UserManagement',"r")){ ?>
                        <li>
                            <a href="<?php echo APP_PATH.'AssignProject'; ?>"><i class="fa fa-fw fa-plus"></i>Assign Project</a>
                        </li>
                        <?php } ?>
                        <?php if(check_permission('RoleManagement',"rw") || check_permission('RoleManagement',"r")){ ?>
                        <li>
                            <a href="<?php echo APP_PATH.'UserManagement'; ?>"><i class="fa fa-fw fa-user"></i>User management</a>
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH.'RoleManagement'; ?>"><i class="fa fa-fw fa-flag"></i>Role management</a>
                        </li>
                        <?php
                            }
                        ?>
                        <li>
                            <a href="<?php echo APP_PATH.'Authentication/logout'; ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php if($page != "PreviewSurvey" && $page != "ProjectManagement" && $page != "AssignProject") { ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li <?php echo ($page == "Dashboard")?"class=active":""; ?>>
                        <a href="<?php echo APP_PATH; ?>Dashboard"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <!-- CHECK PERMISISON -->
                    <?php if(check_permission('SurveyResult',"rw") || check_permission('SurveyResult',"r")) { ?>
                        <li <?php echo ($page == "SurveyResult")?"class=active":""; ?>>
                            <a href="<?php echo APP_PATH; ?>SurveyResult"><i class="fa fa-fw fa-th-list"></i>Survey result</a>
                        </li>
                    <?php } ?>
                     <!-- CHECK PERMISISON -->
                    <?php if(check_permission('QuestionManagement',"rw") || check_permission('QuestionManagement',"r")) { ?>
                        <li <?php echo ($page == "QuestionManagement")?"class=active":""; ?>>
                            <a href="<?php echo APP_PATH; ?>QuestionManagement"><i class="fa fa-fw fa-table"></i>Questions management</a>
                        </li>
                    <?php } ?>
                     <!-- CHECK PERMISISON -->
                    <?php if(check_permission('SurveyManagement',"rw") || check_permission('SurveyManagement',"r")) { ?>
                        <li <?php echo ($page == "SurveyManagement")?"class=active":""; ?>>
                            <a href="<?php echo APP_PATH; ?>SurveyManagement"><i class="fa fa-fw fa-edit"></i>Survey management</a>
                        </li>
                    <?php } ?>
                    <!-- CHECK PERMISISON -->
                    <?php if(check_permission('RoleManagement',"rw") || check_permission('RoleManagement',"r")) { ?>
                        <li <?php echo ($page == "RoleManagement")?"class=active":""; ?>>
                            <a href="<?php echo APP_PATH; ?>RoleManagement"><i class="fa fa-fw fa-flag"></i>Role Management</a>
                        </li>
                        <li <?php echo ($page == "UserManagement")?"class=active":""; ?>>
                            <a href="<?php echo APP_PATH; ?>UserManagement"><i class="fa fa-fw fa-user"></i>User Management</a>
                        </li>
                    <?php } ?>
                    <!-- CHECK PERMISISON -->
                    
                </ul>

            </div>
            <?php } ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" > <?php $ci->session_invalid(); ?>
        <script>
            /* center modal */
            function centerModals($element) {
              var $modals;
              if ($element.length) {
                $modals = $element;
            } else {
                $modals = $('.modal-vcenter:visible');
            }
            $modals.each( function(i) {
                var $clone = $(this).clone().css('display', 'block').appendTo('body');
                var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
                top = top > 0 ? top : 0;
                $clone.remove();
                $(this).find('.modal-content').css("margin-top", top);
            });
        }
        $('.modal-vcenter').on('show.bs.modal', function(e) {
          centerModals($(this));
        });
        $(window).on('resize', centerModals);
        </script>