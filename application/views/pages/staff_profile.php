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
    <!--custome css-->
     <link href="<?= base_url('assets/css/customized.css')?>" rel="stylesheet">
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

<body>

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
    
    <div class="row"><br>
        <div class="col-lg-6">
              <img src="<?= base_url('uploads/'.$staff_info[0]['passport_name'])?>" class="img-thumbnail img-responsive" alt="avatar" style="height: 200px; width: 200px; margin-left: 70px;"><br><br>
              <h3 style="color: darkred; margin-left: 60px;"> <?= $staff_info[0]['staff_surname'].' '.$staff_info[0]['staff_firstname']?></h3>
                    <h3 style="color: darkred; margin-left: 60px;"> <?= $staff_info[0]['email']?></h3>
                    <h3 style="color: darkred; margin-left: 60px;"> <?= $staff_info[0]['staff_phone_number']?></h3>
                    <h3 style="color: green; margin-left: 60px;"> <?= $clients?> clients</h3>
                    <h3 style="color: darkred; margin-left: 60px;"> Lives @ <?= $staff_info[0]['residential_address']?></h3>  
        </div>
        <div class="col-lg-6">
            <div class="panel panel-success" >
                            <div class="panel-heading">
                                <h3 class="panel-title">CREDIT ACCOUNT</h3>
                            </div>
                              <div class="panel-body">
                                  <form role="form" method="POST" action="<?= base_url('Staffcontrol/credit_account')?>">
                                       <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">account number</label>
                                <input type="text" class="form-control" id="inputSuccess" name="acc_no" required="">
                            </div>
                                     <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">amount</label>
                                <input type="text" class="form-control" id="inputSuccess" name="amount" required="">
                            </div>
                                      <button type="submit" class="btn btn-success btn-block">credit</button>
                                  </form> 
                              </div>
                          </div>
        </div>
    </div><br>
    <!--<div class="row">-->
                 <!-- /.row -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> clients</h3>
                            </div>
                            <div class="panel-body ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Customer Name</th>
                                                <th>Account number</th>
                                                <th>Phone Number</th>
                                                <th>Business Address</th>
                                                <th>Amount (#)</th>
                                                <th>Last Transaction</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($customer_info as $key => $value) {
                                                ?>
                                             <tr>
                                                <td></td>
                                                <td><?= $value['firstname'].' '.$value['lastname'] ?></td>
                                                <td><?= $value['account_number']?></td>
                                            <td><?= $value['phone_number']?></td>
                                                <td><?= $value['bussiness_address']?></td>
                                                <td><?php
                                                if ( $value['account_balance'] == NULL) {
                                                    echo '0.00 ';
                                                }else{
                                                    echo $value['account_balance'];
                                                }
                                                ?></td>
                                                <td><?= $value['last_transaction']?></td>                                             
                                            </tr>
                                            <?php
                                            }
                                            ?>
                             
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?= base_url('logout/'.$this->uri->segment(3))?>">Logout  <i class="fa fa-sign-out"></i></a><br>
                                    <?php
                                    if ($this->aauth->is_member(4, $staff_info[0]['staff_user_id'])) {
                                        ?>
                                    
                                       <a href="<?= base_url('admin/profile/'.$this->uri->segment(3))?>">Admin profile  <i class="fa fa-user-plus"></i></a> 
                                       <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!--</div>-->
    


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