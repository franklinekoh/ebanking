<!DOCTYPE html>
<html lang="en">

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
    <script type="text/javascript">
        function fetch_select(val){
            $.ajax({
                type: 'post',
                url: '<?= base_url('index.php/staffcontrol/drop_down_staff')?>',
                data: {
                    get_option: val
                },
                        cache: false,
                success: function (response) {
                    document.getElementById('lga').innerHTML = response;
//                    $("#lga").html(response);
                }
            })
        }
        
              function fetch_select1(val){
            $.ajax({
                type: 'post',
                url: '<?= base_url('index.php/staffcontrol/drop_down_customers')?>',
                data: {
                    get_option: val
                },
                        cache: false,
                success: function (response) {
                    document.getElementById('lga_customer').innerHTML = response;
//                    $("#lga").html(response);
                }
            })
        }
        </script>
</head>
<body>
 
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
                <a class="navbar-brand" href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>">Admin</a><img src="<?= base_url('uploads/'.$staff_info[0]['passport_name'])?>" class="img-thumbnail img-responsive img-circle" alt="avatar" style="height: 50px; width: 50px; float: right;">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            
          
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $staff_info[0]['staff_firstname'].' '.$staff_info[0]['staff_surname']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
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
                   
                    <li class="active">
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
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Forms
                        </h1>
                        <h3 class="">
                           administrator only 
                        </h3><br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= base_url('cpanel/index/'.$this->uri->segment(3))?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
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
                <div class="row">
                    <div class="col-lg-6">
                        <br>
                         <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">STAFF REGISTRATION</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?= base_url('staff/registeration/'.$this->uri->segment(3))?>" enctype="multipart/form-data">
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">first name<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="firstname" required="" value="<?= set_value('firstname')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">last name<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="lastname" required="" value="<?= set_value('lastname')?>">
                            </div>
                                        <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess"> gender<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputSuccess" name="gender" required="" >
                                    <option value="">- select gender -</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">residential address<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="residential_address" required="" value="<?= set_value('residential_address')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">qualification<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="qualification" required="" value="<?= set_value('qualification')?>">
                            </div>
                                <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">state of origin<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputSuccess" name="state" required="" onchange="fetch_select(this.value)">
                                    <option value="">- select state -</option
                                    <?php
                                    foreach ($state as $key => $value) {
                                        ?>
                                    <option value="<?= $value['id_no']?>"><?= $value['state']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                          <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">local government<span class="required" style="color:red;"> *</span></label>
                                
                                <select class="form-control" id="lga" name="local_govt" required="" >
                                    <option value="" >- select local government -</option>
                                    
                                </select>
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">email address<span class="required" style="color:red;"> *</span></label>
                                <input type="email" class="form-control" id="inputSuccess" placeholder="" name="email" required="" value="<?= set_value('email')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">phone number<span class="required" style="color:red;"> *</span></label>
                                <input type="tel" class="form-control" id="inputSuccess" placeholder="" name="phone" required="" value="<?= set_value('phone')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">next of kin<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="next_of_kin" required="" value="<?= set_value('next_of_kin')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">next of kin phone number<span class="required" style="color:red;"> *</span></label>
                                <input type="tel" class="form-control" id="inputSuccess" placeholder="" name="kin_phone" required="" value="<?= set_value('kin_phone')?>">
                            </div>
                               
                                    <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">next of kin age<span class="required" style="color:red;"> *</span></label>
                                  <select class="form-control" id="inputSuccess" name="kin_age" required="" >
                                    <option value="">- select  age -</option>
                                    <option value="1"> 1 yr</option>
                                    <option value="2"> 2 yrs</option>
                                    <option value="3"> 3 yrs</option>
                                    <option value="4"> 4 yrs</option>
                                    <option value="5"> 5 yrs</option>
                                    <option value="6"> 6 yrs</option>
                                    <option value="7"> 7 yrs</option>
                                    <option value="8"> 8 yrs </option>
                                    <option value="9"> 9 yrs </option>
                                    <option value="10"> 10 yrs </option>
                                    <option value="11"> 11 yrs </option>
                                    <option value="12"> 12 yrs</option>
                                    <option value="13"> 13 yrs</option>
                                    <option value="14"> 14 yrs</option>
                                    <option value="15"> 15 yrs </option>
                                    <option value="16"> 16 yrs </option>
                                    <option value="17"> 17 yrs </option>
                                    <option value="18"> 18 yrs </option>
                                    <option value="19"> 19 yrs </option>
                                    <option value="20"> 20 yrs </option>
                                    <option value="21"> 21 yrs </option>
                                    <option value="22"> 22 yrs </option>
                                    <option value="23"> 23 yrs </option>
                                    <option value="24"> 24 yrs </option>
                                    <option value="25"> 25 yrs </option>
                                    <option value="26"> 26 yrs </option>
                                    <option value="27"> 27 yrs </option>
                                    <option value="28"> 28 yrs </option>
                                    <option value="29"> 29 yrs </option>
                                    <option value="30"> 30 yrs </option>
                                    <option value="31"> 31 yrs </option>
                                    <option value="32"> 32 yrs </option>
                                    <option value="33"> 33 yrs </option>
                                    <option value="34"> 34 yrs </option>
                                    <option value="35"> 35 yrs </option>
                                    <option value="36"> 36 yrs </option>
                                    <option value="37"> 37 yrs </option>
                                    <option value="38"> 38 yrs </option>
                                    <option value="39"> 39 yrs </option>
                                    <option value="40"> 40 yrs </option>
                                    <option value="41"> 41 yrs </option>
                                    <option value="42"> 42 yrs </option>
                                    <option value="43"> 43 yrs </option>
                                    <option value="44"> 44 yrs </option>
                                    <option value="45"> 45yrs </option>
                                    <option value="46"> 46 yrs </option>
                                    <option value="47"> 47 yrs </option>
                                    <option value="48"> 48 yrs </option>
                                    <option value="49"> 49 yrs </option>
                                    <option value="50"> 50 yrs </option>
                                    <option value="51"> 51 yrs </option>
                                    <option value="52"> 52 yrs </option>
                                    <option value="53"> 53 yrs </option>
                                    <option value="54"> 54 yrs </option>
                                    <option value="55"> 55 yrs </option>
                                    <option value="56"> 56 yrs </option>
                                    <option value="57"> 57 yrs </option>
                                    <option value="58"> 58 yrs </option>
                                    <option value="59"> 59 yrs </option>
                                    <option value="60"> 60 yrs </option>
                                    <option value="61"> 61 yrs </option>
                                    <option value="62"> 62 yrs </option>
                                    <option value="63"> 63 yrs </option>
                                    <option value="64"> 64 yrs </option>
                                    <option value="65"> 65 yrs </option>
                                    <option value="67"> 67 yrs </option>
                                    <option value="68"> 68 yrs </option>
                                    <option value="69"> 69 yrs </option>
                                    <option value="70"> 70 yrs </option>
                                    <option value="71"> 71 yrs </option>
                                    <option value="72"> 72 yrs </option>
                                    <option value="73"> 73 yrs </option>
                                    <option value="74"> 74 yrs </option>
                                    <option value="75"> 75 yrs </option>
                                    <option value="76"> 76 yrs </option>
                                    <option value="77"> 77 yrs </option>
                                    <option value="78"> 78 yrs </option>
                                    <option value="79"> 79 yrs </option>
                                    <option value="80"> 80 yrs </option>
                                    <option value="81"> 81 yrs </option>
                                    <option value="82"> 82 yrs </option>
                                    <option value="83"> 83 yrs </option>
                                    <option value="84"> 84 yrs </option>
                                    <option value="85"> 85 yrs </option>
                                    <option value="86"> 86 yrs </option>
                                    <option value="87"> 87 yrs </option>
                                    <option value="88"> 88 yrs </option>
                                    <option value="89"> 89 yrs </option>
                                    <option value="90"> 90 yrs </option>
                                    <option value="91"> 91 yrs </option>
                                    <option value="92"> 92 yrs </option>
                                    <option value="above 92 "> above 92 yrs </option>
                                        
                                </select>
                            </div>
                                    <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">next of kin gender<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputSuccess" name="kin_gender" required="" >
                                    <option value="">- select gender -</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">relationship<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="relationship" required="" value="<?= set_value('relationship')?>">
                            </div>
                                        <div class="form-group has-success">
                                <label class="control-label" for="inputWarning">username<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="username" required="" value="<?= set_value('username')?>">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">password (4 digits number)<span class="required" style="color:red;"> *</span></label>
                                <input type="password" class="form-control" id="inputSuccess" placeholder="" name="password" required="">
                            </div>
                             <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">confirm password (4 digits number)<span class="required" style="color:red;"> *</span></label>
                                <input type="password" class="form-control" id="inputSuccess" placeholder="" name="password_confirm" required="">
                            </div>
                                        <div class="form-group">
                                            <label>passport (200px * 200px)<span class="required" style="color:red;"> *</span></label>
                                            <input type="file" name="passport" value="<?= set_value('passport')?>" required="">
                            </div>
                                       <button type="submit" class="btn btn-success btn-block">register</button>
                        </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                  
                        <br>
                         <div class="panel panel-red">
                            <div class="panel-heading">
                                    <h3 class="panel-title"> CUSTOMER REGISTRATION </h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="<?= base_url('customer/registeration/'.$this->uri->segment(3))?>" enctype="multipart/form-data" >
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">first name<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="" name="Cfirstname" required="" value="<?= set_value('Cfirstname')?>">
                            </div>
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">last name<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="" name="Clastname" required="" value="<?= set_value('Clastname')?>">
                            </div>
                                       <div class="form-group has-warning">
                                 <label class="control-label" for="inputWarning">account name<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="Caccount_name" required="" value="<?= set_value('Caccount_name')?>">
                            </div>
                                       <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess"> gender<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputSuccess" name="Cgender" required="" value="<?= set_value('Cgender')?>">
                                    <option value="">- gender -</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                               <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">age<span class="required" style="color:red;"> *</span></label>
                                  <select class="form-control" id="inputSuccess" name="Cage" required="" >
                                    <option value="">- select  age -</option>
                                     <option value="1"> 1 yr</option>
                                    <option value="2"> 2 yrs</option>
                                    <option value="3"> 3 yrs</option>
                                    <option value="4"> 4 yrs</option>
                                    <option value="5"> 5 yrs</option>
                                    <option value="6"> 6 yrs</option>
                                    <option value="7"> 7 yrs</option>
                                    <option value="8"> 8 yrs </option>
                                    <option value="9"> 9 yrs </option>
                                    <option value="10"> 10 yrs </option>
                                    <option value="11"> 11 yrs </option>
                                    <option value="12"> 12 yrs</option>
                                    <option value="13"> 13 yrs</option>
                                    <option value="14"> 14 yrs</option>
                                    <option value="15"> 15 yrs </option>
                                    <option value="16"> 16 yrs </option>
                                    <option value="17"> 17 yrs </option>
                                    <option value="18"> 18 yrs </option>
                                    <option value="19"> 19 yrs </option>
                                    <option value="20"> 20 yrs </option>
                                    <option value="21"> 21 yrs </option>
                                    <option value="22"> 22 yrs </option>
                                    <option value="23"> 23 yrs </option>
                                    <option value="24"> 24 yrs </option>
                                    <option value="25"> 25 yrs </option>
                                    <option value="26">   26 yrs </option>
                                    <option value="27"> 27 yrs </option>
                                    <option value="28"> 28 yrs </option>
                                    <option value="29"> 29 yrs </option>
                                    <option value="30"> 30 yrs </option>
                                    <option value="31"> 31 yrs </option>
                                    <option value="32"> 32 yrs </option>
                                    <option value="33"> 33 yrs </option>
                                    <option value="34"> 34 yrs </option>
                                    <option value="35"> 35 yrs </option>
                                    <option value="36"> 36 yrs </option>
                                    <option value="37"> 37 yrs </option>
                                    <option value="38"> 38 yrs </option>
                                    <option value="39"> 39 yrs </option>
                                    <option value="40"> 40 yrs </option>
                                    <option value="41"> 41 yrs </option>
                                    <option value="42"> 42 yrs </option>
                                    <option value="43"> 43 yrs </option>
                                    <option value="44"> 44 yrs </option>
                                    <option value="45"> 45yrs </option>
                                    <option value="46"> 46 yrs </option>
                                    <option value="47"> 47 yrs </option>
                                    <option value="48"> 48 yrs </option>
                                    <option value="49"> 49 yrs </option>
                                    <option value="50"> 50 yrs </option>
                                    <option value="51"> 51 yrs </option>
                                    <option value="52"> 52 yrs </option>
                                    <option value="53"> 53 yrs </option>
                                    <option value="54"> 54 yrs </option>
                                    <option value="55"> 55 yrs </option>
                                    <option value="56"> 56 yrs </option>
                                    <option value="57"> 57 yrs </option>
                                    <option value="58"> 58 yrs </option>
                                    <option value="59"> 59 yrs </option>
                                    <option value="60"> 60 yrs </option>
                                    <option value="61"> 61 yrs </option>
                                    <option value="62"> 62 yrs </option>
                                    <option value="63"> 63 yrs </option>
                                    <option value="64"> 64 yrs </option>
                                    <option value="65"> 65 yrs </option>
                                    <option value="67"> 67 yrs </option>
                                    <option value="68"> 68 yrs </option>
                                    <option value="69"> 69 yrs </option>
                                    <option value="70"> 70 yrs </option>
                                    <option value="71"> 71 yrs </option>
                                    <option value="72"> 72 yrs </option>
                                    <option value="73"> 73 yrs </option>
                                    <option value="74"> 74 yrs </option>
                                    <option value="75"> 75 yrs </option>
                                    <option value="76"> 76 yrs </option>
                                    <option value="77"> 77 yrs </option>
                                    <option value="78"> 78 yrs </option>
                                    <option value="79"> 79 yrs </option>
                                    <option value="80"> 80 yrs </option>
                                    <option value="81"> 81 yrs </option>
                                    <option value="82"> 82 yrs </option>
                                    <option value="83"> 83 yrs </option>
                                    <option value="84"> 84 yrs </option>
                                    <option value="85"> 85 yrs </option>
                                    <option value="86"> 86 yrs </option>
                                    <option value="87"> 87 yrs </option>
                                    <option value="88"> 88 yrs </option>
                                    <option value="89"> 89 yrs </option>
                                    <option value="90"> 90 yrs </option>
                                    <option value="91"> 91 yrs </option>
                                    <option value="92"> 92 yrs </option>
                                    <option value="above 92 "> above 92 yrs </option>
                                </select>
                            </div>        
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">residential address<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="" name="Cresidential_address" required="" value="<?= set_value('Cresidential_address')?>">
                            </div>
                                     <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">business address<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="" name="Cbusiness_address" required="" value="<?= set_value('Cbusiness_address')?>">
                            </div>
                                <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">state of origin<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputWarning" name="Cstate" required="" onchange="fetch_select1(this.value)">
                                   
                                    <option value="">- select state -</option
                                    <?php
                                    foreach ($state as $key => $value) {
                                        ?>
                                    <option value="<?= $value['id_no']?>"><?= $value['state']?></option>
                                    <?php
                                    }
                                    ?>
                        
                                </select>
                            </div>
                                          <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">local government<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="lga_customer" name="Clocal_govt" required="">
                                  
                                    <option value="">- select local government -</option>
                                       <?php
                                    foreach ($lga as $key => $value) {
                                        ?>
                                    <option value="<?= $value['id_no']?>"><?= $value['local_govt']?></option>
                                    <?php
                                    }
                                    ?>
                           
                                </select>
                            </div>
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">email address</label>
                                <input type="email" class="form-control" id="inputWarning" placeholder="" name="Cemail" value="<?= set_value('Cemail')?>">
                            </div>
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">phone number<span class="required" style="color:red;"> *</span></label>
                                <input type="tel" class="form-control" id="inputWarning" placeholder="" name="Cphone" required="" value="<?= set_value('Cphone')?>">
                            </div>
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">next of kin<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="" name="Cnext_of_kin" required="" value="<?= set_value('Cnext_of_kin')?>">
                            </div>
                                        <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">next of kin age<span class="required" style="color:red;"> *</span></label>
                                  <select class="form-control" id="inputSuccess" name="Ckin_age" required="" >
                                    <option value="">- select  age -</option>
                                     <option value="1"> 1 yr</option>
                                    <option value="2"> 2 yrs</option>
                                    <option value="3"> 3 yrs</option>
                                    <option value="4"> 4 yrs</option>
                                    <option value="5"> 5 yrs</option>
                                    <option value="6"> 6 yrs</option>
                                    <option value="7"> 7 yrs</option>
                                    <option value="8"> 8 yrs </option>
                                    <option value="9"> 9 yrs </option>
                                    <option value="10"> 10 yrs </option>
                                    <option value="11"> 11 yrs </option>
                                    <option value="12"> 12 yrs</option>
                                    <option value="13"> 13 yrs</option>
                                    <option value="14"> 14 yrs</option>
                                    <option value="15"> 15 yrs </option>
                                    <option value="16"> 16 yrs </option>
                                    <option value="17"> 17 yrs </option>
                                    <option value="18"> 18 yrs </option>
                                    <option value="19"> 19 yrs </option>
                                    <option value="20"> 20 yrs </option>
                                    <option value="21"> 21 yrs </option>
                                    <option value="22"> 22 yrs </option>
                                    <option value="23"> 23 yrs </option>
                                    <option value="24"> 24 yrs </option>
                                    <option value="25"> 25 yrs </option>
                                    <option value=""> 26 yrs </option>
                                    <option value="27"> 27 yrs </option>
                                    <option value="28"> 28 yrs </option>
                                    <option value="29"> 29 yrs </option>
                                    <option value="30"> 30 yrs </option>
                                    <option value="31"> 31 yrs </option>
                                    <option value="32"> 32 yrs </option>
                                    <option value="33"> 33 yrs </option>
                                    <option value="34"> 34 yrs </option>
                                    <option value="35"> 35 yrs </option>
                                    <option value="36"> 36 yrs </option>
                                    <option value="37"> 37 yrs </option>
                                    <option value="38"> 38 yrs </option>
                                    <option value="39"> 39 yrs </option>
                                    <option value="40"> 40 yrs </option>
                                    <option value="41"> 41 yrs </option>
                                    <option value="42"> 42 yrs </option>
                                    <option value="43"> 43 yrs </option>
                                    <option value="44"> 44 yrs </option>
                                    <option value="45"> 45yrs </option>
                                    <option value="46"> 46 yrs </option>
                                    <option value="47"> 47 yrs </option>
                                    <option value="48"> 48 yrs </option>
                                    <option value="49"> 49 yrs </option>
                                    <option value="50"> 50 yrs </option>
                                    <option value="51"> 51 yrs </option>
                                    <option value="52"> 52 yrs </option>
                                    <option value="53"> 53 yrs </option>
                                    <option value="54"> 54 yrs </option>
                                    <option value="55"> 55 yrs </option>
                                    <option value="56"> 56 yrs </option>
                                    <option value="57"> 57 yrs </option>
                                    <option value="58"> 58 yrs </option>
                                    <option value="59"> 59 yrs </option>
                                    <option value="60"> 60 yrs </option>
                                    <option value="61"> 61 yrs </option>
                                    <option value="62"> 62 yrs </option>
                                    <option value="63"> 63 yrs </option>
                                    <option value="64"> 64 yrs </option>
                                    <option value="65"> 65 yrs </option>
                                    <option value="67"> 67 yrs </option>
                                    <option value="68"> 68 yrs </option>
                                    <option value="69"> 69 yrs </option>
                                    <option value="70"> 70 yrs </option>
                                    <option value="71"> 71 yrs </option>
                                    <option value="72"> 72 yrs </option>
                                    <option value="73"> 73 yrs </option>
                                    <option value="74"> 74 yrs </option>
                                    <option value="75"> 75 yrs </option>
                                    <option value="76"> 76 yrs </option>
                                    <option value="77"> 77 yrs </option>
                                    <option value="78"> 78 yrs </option>
                                    <option value="79"> 79 yrs </option>
                                    <option value="80"> 80 yrs </option>
                                    <option value="81"> 81 yrs </option>
                                    <option value="82"> 82 yrs </option>
                                    <option value="83"> 83 yrs </option>
                                    <option value="84"> 84 yrs </option>
                                    <option value="85"> 85 yrs </option>
                                    <option value="86"> 86 yrs </option>
                                    <option value="87"> 87 yrs </option>
                                    <option value="88"> 88 yrs </option>
                                    <option value="89"> 89 yrs </option>
                                    <option value="90"> 90 yrs </option>
                                    <option value="91"> 91 yrs </option>
                                    <option value="92"> 92 yrs </option>
                                    <option value="above 92 "> above 92 yrs </option>
                                </select>
                            </div>
                                           <div class="form-group has-warning">
                                <label class="control-label" for="inputSuccess">next of kin gender<span class="required" style="color:red;"> *</span></label>
                                <select class="form-control" id="inputSuccess" name="Ckin_gender" required="" value="<?= set_value('Ckin_gender')?>">
                                    <option value="">- select gender -</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                             <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">next of kin phone number<span class="required" style="color:red;"> *</span></label>
                                <input type="tel" class="form-control" id="inputWarning" placeholder="" name="Ckin_phone" required="" value="<?= set_value('Ckin_phone')?>">
                            </div>
                             <div class="form-group has-warning">
                                 <label class="control-label" for="inputWarning">relationship<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="Crelationship" required="" value="<?= set_value('Crelationship')?>">
                            </div>
                               <div class="form-group has-warning">
                                 <label class="control-label" for="inputWarning">marketer id<span class="required" style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" name="Cmarketer_id" required="" value="<?= set_value('Cmarketer_id')?>">
                            </div>
                            
                                        <div class="form-group">
                                <label>passport (200px * 200px) <span class="required" style="color:red;"> *</span></label>
                                <input type="file" name="Cpassport">
                            </div>
                              
                                       <button type="submit" class="btn btn-danger btn-block">register</button>
                        </form>
                            </div>
                        </div>

                    </div>
               
                    </div>
           
               
                    </div>
                </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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