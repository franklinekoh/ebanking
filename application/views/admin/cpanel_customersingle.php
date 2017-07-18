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
        <?php
        // put your code here
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
            <!--<div id="wrapper">-->

    

        <!--<div id="page-wrapper">-->

            <!--<div class="container-fluid">-->
            <div class="row">
                <div class="col-lg-8">
                    <img src="<?= base_url('uploads/'.$info[0]['passport_name'])?>" class="img-thumbnail img-responsive" alt="avatar" style="height: 200px; width: 200px; margin-left: 70px;"><br><br>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Name : <?= $info[0]['lastname'].' '.$info[0]['firstname']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Phone : <?= $info[0]['phone_number']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Marketer : <?= $info[0]['staff_surname'].' '.$info[0]['staff_firstname']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Business address : <?= $info[0]['bussiness_address']?>.</h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Account number : <?= $info[0]['account_number']?></h3>
                    <h3 style="color: whitesmoke; margin-left: 60px;">Last transaction : <?= $info[0]['last_transaction']?></h3>
                    <h3 style="color: green; margin-left: 60px;">Account balance : <?= $info[0]['account_balance']?> N</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="panel panel-red" >
                            <div class="panel-heading">
                                <h3 class="panel-title">CREDIT ACCOUNT</h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="post" action="<?= base_url('admin/credit_acc/'.$this->uri->segment(5))?>">
                                       <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">Admin ID</label>
                                <input type="password" class="form-control" id="inputSuccess" name="admin_id" required="">
                            </div>
                                     <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">amount</label>
                                <input type="text" class="form-control" id="inputSuccess" name="amount" required="">
                            </div>
                                      <button type="submit" class="btn btn-danger btn-block">credit</button>
                                  </form> 
                              </div>
                          </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default" style="margin-left: 60px;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Transaction type</th>
                                                
                                                <th>Time</th>
                                                <th>Amount (N)</th>
                                                <th>Balance (N)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    foreach ($history as $key => $value) {
                                                      ?>
                                        <tr>
                                                <td></td>
                                     
                                                <td><?php
                                                  switch ($value['transaction_type']) {
                                                      case 1:
                                                          echo 'debit';
                                                          break;
                                                      case 2:
                                                          echo 'credit';
                                                          break;
                                                      default:
                                                          break;
                                                  }
                                                ?></td>
                                                <td><?= $value['date']?></td>
                                                <td><?= $value['amount']?></td>
                                                <td><?= $value['balance']?></td>
                                            </tr>
                                            <?php
                                                    }
                                            ?>
                                   
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="text-right">
                                    <a href="<?= base_url('customer/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5))?>">All history <i class="fa fa-history"></i></a>
                                </div>
                             <div class="text-right">
                                    <a href="<?= base_url('cpanel/customers/'.$this->uri->segment(4))?>">Logout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                
                            </div>
                        </div>
                </div>
                <div class="col-lg-4">
                       <div class="panel panel-success" >
                            <div class="panel-heading">
                                <h3 class="panel-title">DEBIT ACCOUNT</h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="post" action="<?= base_url('admin/debit_acc/'.$this->uri->segment(5))?>">
                                       <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Admin ID</label>
                                    <input type="password" class="form-control" id="inputSuccess" required="" name="Dadmin_id">
                            </div>
                                     <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">amount</label>
                                <input type="text" class="form-control" id="inputSuccess" required="" name="Damount">
                            </div>
                                      <button type="submit" class="btn btn-success btn-block">debit</button>
                                  </form> 
                              </div>
                          </div>
                </div>
            </div>

        
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
