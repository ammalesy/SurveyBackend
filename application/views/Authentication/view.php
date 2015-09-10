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
    <link href="<?php echo APP_PATH."assets/"; ?>css/login.css" rel="stylesheet">
   

</head>

<body>
<!-- jQuery -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="<?php echo APP_PATH."assets/"; ?>js/login.js"></script> -->
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo APP_PATH."assets/"; ?>js/plugins/morris/morris-data.js"></script>

<div class="container">
    <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="<?php echo APP_PATH."Authentication/login"; ?>" role="login">
          <img src="<?php echo APP_PATH."assets/"; ?>images/logo.png" class="img-responsive" alt="" />
          <input type="text" name="a_user" placeholder="Username" required class="form-control input-lg" value="" />
          
          <input type="password" name="a_pass" class="form-control input-lg" id="a_pass" placeholder="Password" required="" />
          <?php $ci =& get_instance(); ?>
          <?php $ci->show_error_message($message_error_type,$message_error); ?>
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div>
            Administration system.
          </div>
          
        </form>
        
        <div class="form-links">
          <a href="#">version <?php echo VERSION; ?></a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>

  
</div>
</body>
</html>