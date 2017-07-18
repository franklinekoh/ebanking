<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= isset($title)? $title: untitled?></title>
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
    <link id="switcher" href="<?= base_url('assets/css/theme-color/green-theme.css')?>" rel="stylesheet">

    <!-- Main Style -->
    <link href="<?= base_url('style.css')?>" rel="stylesheet">    

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <!--Lato for Title--> 
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header -->
  <header id="header">
    <!-- header top search -->
    <div class="header-top">
      <div class="container">
        <form action="">
          <div id="search">
          <input type="text" placeholder="Type your search keyword here and hit Enter..." name="s" id="m_search" style="display: inline-block;">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
        </form>
      </div>
    </div>
    <!-- header bottom -->
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-contact">
              <ul>
                <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    (+234) 080687223980
                  </div>
                </li>
<!--                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    contact@patmicrofinance.com
                  </div>
                </li>-->
                 <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    (+234) 08134466486
                  </div>
                </li>
               
              </ul>
            </div>
          </div>
          
        </div>
          
      </div>
    </div>
  </header>
  <!-- End header -->
  

  <!-- BEGIN MENU -->
  <section id="menu-area">      
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <!--<a class="navbar-brand" href="index.html">Intensely</a>-->              
<!--           IMG BASED LOGO  
--><a class="navbar-brand" href="<?= base_url('home')?>"><img src="assets/images/logo5.jpg" alt="logo"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
              <?php if($title == "Pat Micro Finance Cooperative Society Limited | home"){
                 ?> 
              <li class="active"><a href="<?= base_url('home')?>">Home</a></li>
              <?php
              
              }else{
                 ?>
              <li><a href="<?= base_url('home')?>">Home</a></li>
              <?php
              }
?>
              
                    <?php if($title == "Pat Micro Finance Cooperative Society Limited | services"){
                 ?> 
              <li class="active"><a href="<?= base_url('services')?>">Services</a></li>
              <?php
              
              }else{
                 ?>
              <li><a href="<?= base_url('services')?>">Services</a></li>
              <?php
              }
?>
           
                             <?php if($title == "Pat Micro Finance Cooperative Society Limited | contact"){
                 ?> 
              <li class="active"><a href="<?= base_url('contact')?>">Contact </a></li>
              <?php
              
              }else{
                 ?>
             <li><a href="<?= base_url('contact')?>">Contact </a></li>
              <?php
              }
?>
            
           
          </ul>                     
        </div><!--/.nav-collapse -->
        <a href="#" id="search-icon">
          <i class="fa fa-search">            
          </i>
        </a>
      </div>     
    </nav>
  </section>
  <!-- END MENU --> 
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

?>