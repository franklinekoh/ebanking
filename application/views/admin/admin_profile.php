<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
          <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title)? $title: 'untitled'?></title>
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/logo6.jpg')?>"/>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/cpanel/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/cpanel/css/sb-admin.css')?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets/cpanel/css/plugins/morris.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/cpanel/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

            <div id="wrapper">
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
                <a class="navbar-brand" href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>">Admin</a><img src="<?= base_url('uploads/'.$staff_info[0]['passport_name'])?>" class="img-thumbnail img-responsive img-circle" alt="avatar" style="height: 50px; width: 50px; float: right;">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            
          
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $staff_info[0]['staff_firstname'].' '.$staff_info[0]['staff_surname']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li  class="active" >
                            <a href="<?= base_url('admin/profile/'. $this->uri->segment(3))?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url('logout/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li>
                        <a href="<?= base_url('cpanel/forms/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanel/transaction/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-calculator"></i> transaction</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanel/clockcard/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-clock-o"></i> clock card</a>
                    </li>
                     <li>
                        <a href="<?= base_url('cpanel/history/'.$this->uri->segment(3))?>"><i class="fa fa-fw fa-history"></i> history</a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!--<div id="page-wrapper">-->

            <!--<div class="container-fluid">-->
            <div class="row">
                <div class="col-lg-6">
                    <!--<h1 style="color: whitesmoke; margin-left: 30px;">welcome, Mr. John</h1>-->
                    <img src="<?= base_url('uploads/'.$staff_info[0]['passport_name'])?>" class="img-thumbnail img-responsive" alt="avatar" style="height: 200px; width: 200px; margin-left: 70px;"><br><br>
                    <h3 style="color: whitesmoke; margin-left: 60px;"> <?= $staff_info[0]['staff_surname'].' '.$staff_info[0]['staff_firstname']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;"> <?= $staff_info[0]['email']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;"> <?= $staff_info[0]['staff_phone_number']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;"> lives @ <?= $staff_info[0]['residential_address']?></h3>
                    <h3 style="color: red; margin-left: 60px;"> <strong>Administrator</strong></h3>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-red">
                          <div class="panel-heading">
                              <h3 class="panel-title"> <strong>ADMINISTRATOR'S GUIDE</strong></h3>
                            </div>
                        <div class="panel-body" >
                            <p>Your <mark>staff identification number</mark> is very important and should not be revealed to anyone</p>
                            <p>As a super administrator, you are privileged to perform the <mark>monthly deduction function</mark></p>
                            <p>A sub administrator can have two profiles. The marketer profile and the administrator profile</p>
                            <p>Only the super administrator can grant Staff administrator permit, ban or fire staff</p>
                            <p>The clocking card section can be managed by both super and sub administrator</p>
                            <p><mark>At the end of each day every staff should be sign out for security reasons</mark></p>
                            <p>The administrator debit and credit function can be performed by both sub and super administrators</p>
                            <p>Super administrator shall not be displayed as online in the “staff online page”</p>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (!$this->aauth->is_admin($staff_info[0]['staff_user_id'])) {
                ?>
                <a href="<?= base_url('marketer/'.$staff_info[0]['staff_surname'].$staff_info[0]['staff_firstname'].'/'.$staff_info[0]['staff_id'])?>"><button class="btn btn-success btn-block">
                    <span class = "glyphicon glyphicon-move"></span> Marketer profile</button></a>
                                          <?php
            }else{
                ?>
              <div class="row">
                <div class="col-lg-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>CHANGE STAFF PASSWORD</strong></h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="post" action="<?= base_url('password/change/'.$this->uri->segment(3))?>">
                                            <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">staff id</label>
                                <input type="text" class="form-control" id="inputSuccess" name="staff_id" required="">
                            </div>
                                  
                                     <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">new password</label>
                                <input type="text" class="form-control" id="inputSuccess" name="staff_new" required="">
                            </div>
                                          <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">confirm new password</label>
                                <input type="text" class="form-control" id="inputSuccess" name="staff_confirm" required="">
                            </div>
                                      <button type="submit" class="btn btn-danger btn-block">
                                          <span class = "glyphicon glyphicon-send "></span> update</button>
                                  </form> 
                              </div>
                          </div>
                </div>
                   <div class="col-lg-3" >
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>ADMINISTRATOR PERMIT</strong></h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="post" action="<?=  base_url('permit/admin/'.$this->uri->segment(3))?>">
                                     <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">STAFF NAME</label>
                                 <select class="form-control" id="inputSuccess" name="permit_id" required="" >
                                    <option value="">- select staff -</option>
                                    <?php
                                    foreach ($all_staff as $key => $value) {
                                        ?>
                                    <option value="<?= $value['staff_user_id']?>"><?= $value['staff_firstname'].' '.$value['staff_surname']?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                                     </div>
                                  
                                      <button type="submit" class="btn btn-success btn-block"> 
                                          <span class = "glyphicon glyphicon-send "></span>
                                          update</button>
                                  </form> 
                              </div>
                          </div>
                </div>
                   <div class="col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>BAN STAFF</strong></h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form">
                                       <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">Staff name</label>
                                <select class="form-control" id="inputSuccess" name="ban_id" required="" >
                                    <option value="">- select staff -</option>
                                    <?php
                                    foreach ($all_staff as $key => $value) {
                                        ?>
                                    <option value="<?= $value['staff_user_id']?>"><?= $value['staff_firstname'].' '.$value['staff_surname']?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                   
                                      <button type="submit" class="btn btn-warning btn-block"> 
                                          <span class = "glyphicon glyphicon-send "></span> update</button>
                                  </form> 
                              </div>
                          </div>
                </div>
                <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>FIRE STAFF</strong></h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form">
                                       <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Staff name</label>
                                <select class="form-control" id="inputSuccess" name="fire_id" required="" >
                                    <option value="">- select staff -</option>
                                    <?php
                                    foreach ($all_staff as $key => $value) {
                                        ?>
                                    <option value="<?= $value['staff_user_id']?>"><?= $value['staff_firstname'].' '.$value['staff_surname']?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                   
                                      <button type="submit" class="btn btn-primary btn-block"> 
                                          <span class = "glyphicon glyphicon-send "></span> update</button>
                                  </form> 
                              </div>
                          </div>
                </div>
            </div>
            <?php
            }
            ?>
          
                <!-- /.row -->

                <!-- /.row -->

            <!--</div>-->
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        
    <!-- jQuery -->
    <script src="<?= base_url('assets/cpanel/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/cpanel/js/bootstrap.min.js')?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url('assets/cpanel/js/plugins/morris/raphael.min.js')?>"></script>
    <script src="<?= base_url('assets/cpanel/js/plugins/morris/morris.min.js')?>"></script>
    <script src="<?= base_url('assets/cpanel/js/plugins/morris/morris-data.js')?>"></script>
    </body>
</html>
