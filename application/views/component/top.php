<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo APP_PATH."assets/"; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo APP_PATH."assets/"; ?>css/sb-admin.css" rel="stylesheet">

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
   

</head>

<body>
<!-- jQuery -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#questionTable').DataTable({
                "pagingType": "full_numbers"
            });
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/morris-data.js"></script>


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
                <a class="navbar-brand" href="<?php echo APP_PATH.'/index.php/'; ?>">Survey Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php 
                        if($page == "QuestionManagement"){

                        }
                    ?>
                    <li <?php echo ($page == "QuestionManagement")?"class=active":""; ?>>
                        <a href="<?php echo APP_PATH.'/index.php/'; ?>QuestionManagement"><i class="fa fa-fw fa-table"></i>Questions management</a>
                    </li>
                    <li <?php echo ($page == "SurveyManagement")?"class=active":""; ?>>
                        <a href="<?php echo APP_PATH.'/index.php/'; ?>SurveyManagement"><i class="fa fa-fw fa-edit"></i>Survey management</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">