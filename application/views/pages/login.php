  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= isset($title)? $title: 'untitled'?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/logo6.jpg')?>"/>
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet">    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slick.css')?>"/> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate.css')?>"/> 
    <!-- Progress bar  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-progressbar-3.3.4.css')?>"/> 
     <!-- Theme color -->
    <link id="switcher" href="<?= base_url('assets/css/theme-color/dark-red-theme.css')?>" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body style="margin-top: 250px;">
    
      <?php

if ($this->session->flashdata('error')!= '') {?>
<div class="container">
    <?php
    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') .'</div>';?> 
</div>
 <?php } if ($this->session->flashdata('success') != '') { ?>
        <div class="container">
            <?php 
            echo '
            <div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';?>
        </div>
            <?php 
    
}


//echo time();
?>
    
    <br>
<div style="text-align: center;" class="title-area">
                     <h2 class="title">For staff only</h2>  
                     <h3><a href="<?= base_url('home')?>"><i class="fa fa-home fa-5x"></i></a></h3><br>
                                   <button class="login modal-form " data-target="#login-form" data-toggle="modal" href="#">LOGIN</button>
                  </div>  
				  <?php
         $string = '1794875898';
	   $replace = 'XXXX';
	   
	   echo substr_replace($string, $replace, 3, 4);
	   
	   ?>
  <!-- Start login modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
      <div id="login-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Login</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url('account/staff/login')?>">
            <div class="form-group">
                <input type="text" placeholder="User name" class="form-control" name="username" required="">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" name="password" required="">
            </div>
             <div class="loginbox">
                 <label><input type="checkbox" name="remember"><span>Remember me</span></label>
                 <button class="btn signin-btn" type="submit">SIGN IN</button>
             
            </div>                    
          </form>
        </div>
        <div class="modal-footer footer-box">
            <span>problem logging in? <i style="color: red;">contact admin (+234) 080687223980</i></span>            
        </div>
      </div>
   
    </div>
  </div>
  <!-- End login modal window -->
     <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/js/bootstrap.js')?>"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="<?= base_url('assets/js/slick.js')?>"></script>    
  <!-- counter -->
  <script src="<?= base_url('assets/js/waypoints.js')?>"></script>
  <script src="<?= base_url('assets/js/jquery.counterup.js')?>"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="<?= base_url('assets/js/wow.js')?>"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="<?= base_url('assets/js/bootstrap-progressbar.js')?>"></script>  
  
 
  <!-- Custom js -->
  <script type="text/javascript" src="<?= base_url('assets/js/custom.js')?>"></script>
</body>