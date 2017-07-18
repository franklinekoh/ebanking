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
    <link href="<?= base_url('assets/css/customized.css')?>" rel="stylesheet">
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
      
            <!--<div id="wrapper">-->

    

        <!--<div id="page-wrapper">-->

            <!--<div class="container-fluid">-->


                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-binoculars"></i> staff at work</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Staff name</th>
                                                <th>Sign in time</th>
                                                <th>Staff id</th>
                                                <th>Timing</th>
                                                <th>Phone number</th>
                                            </tr>
                                        </thead>
                                                    <tbody>
                                            <?php
                                            foreach ($info as $key => $value) {
?>
                                            <tr>
                                        <td></td>
                                        <td><?= $value['staff_firstname'].' '.$value['staff_surname']?></td>
                                   
                                        <td><?= $value['clocked_in_time']?></td>
                                           
                                        <td><?= $value['staff_id']?></td>
                                          <td><?php
                                      if ($value['clocked_in_time'] > date("Y-m-d 7:i:s") && $value['clocked_in_time'] < date("Y-m-d 8:i:s")) {
                                           echo 'early'; 
                                        }else{
                                            echo 'late';
                                        }
                                        ?></td>
                                        <td><?= $value['staff_phone_number']?></td>
                                            </tr>
                                            <?php

                                            }
                                           ?>
                               
                                        </tbody>
                                    </table>
                                </div>
                               <div class="text-right">
                                   <a href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>">back <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--</div>-->
                <!-- /.row -->

            <!--</div>-->
            <!-- /.container-fluid -->

        <!--</div>-->
        <!-- /#page-wrapper -->

    <!--</div>-->
        
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
