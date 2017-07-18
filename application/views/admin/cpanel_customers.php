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
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">ACCOUNT NUMBER</h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="POST" action="<?= base_url('customer/specific/'.$this->uri->segment(3))?>">
                                       <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">account number</label>
                                <input type="text" class="form-control" id="inputSuccess" name="account_number">
                            </div>
                                
                                      <button type="submit" class="btn btn-primary btn-block">view details</button>
                                  </form> 
                              </div>
                          </div>
            </div>
        </div>
          
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> customers</h3>
                                <div class="text-left">
                                   <a href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>">back <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Customer Name</th>
                                                <th>Time of Recent Transaction</th>
                                                <th>Phone Number</th>
                                                <th>Business Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
        foreach ($info as $key => $value) {
    ?>
                                               <tr>         
                                                <td></td>
                                                <td><?= $value['firstname'].' '.$value['lastname']?></td>
                                           
                                                <td><?= $value['last_transaction']?></td>
                                                <td><?= $value['phone_number']?></td>
                                                <td><?= $value['bussiness_address']?></td>
                                             
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
