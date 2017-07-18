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
        <?php
        // put your code here
        ?>
            <!--<div id="wrapper">-->

    

        <!--<div id="page-wrapper">-->

            <!--<div class="container-fluid">-->
            <div class="row">
                <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
            </div>
               <!-- /.row -->
             <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Are you sure you want to submit the following details?

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th>Last Name</th>
                        <td id="lname"></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td id="fname"></td>
                    </tr>
                </table>

            </div>

  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a href="#" id="submit" class="btn btn-success success">Submit</a>
        </div>
    </div>
</div>
             </div>        
                 <script type="text/javascript">
                     $('#submitBtn').click(function() {
     /* when the button in the form, display the entered values in the modal */
     $('#lname').text($('#lastname').val());
     $('#fname').text($('#firstname').val());
});

$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    alert('submitting');
    $('#formfield').submit();
});
            </script>
                <!--</div>-->
                <!-- /.row -->

            <!--</div>-->
            <!-- /.container-fluid -->

        <!--</div>-->
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
