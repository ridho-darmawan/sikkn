<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Utama</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">



    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
        /* .bg-login {
      background-image: url(<?php echo base_url("assets/image/pln.png"); ?>);
      width: 100%;
      height: auto;
      position: relative;
      background-size: cover;
      margin: auto;
    } */

        .logo {

            color: #87CEEB;
            font-family: 'Marck Script', cursive;
            font-size: 25px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .login-box-msg {
            font-family: Georgia, serif;
            font-size: 15px;
            margin-top: 20px;
            font-weight: bold;
        }

        .login-box-body {
            opacity: 0.9;
            box-shadow: 0 0 8px 16px #efefef;
        }

        body {
            background-image: url(<?php echo base_url("assets/image/UNIMA.jpg"); ?>);
            background-repeat: no-repeat;
            height: 100%;
            background-position: center;
            background-size: cover;
        }

        .login-box-body {
            opacity: 0.9;
        }
    </style>

</head>

<body>


    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">

            <img src="<?= base_url('assets/image/download.png') ?>" class="logo" width="100">



            <p class="login-box-msg">Silakan Masukkan Email Anda</p>

            <?php echo form_open('lupa_password'); ?>
            <div class="form-group has-feedback">
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" />
                <p> <?php echo form_error('email'); ?> </p>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <p>
                <input type="submit" name="btnSubmit" value="Submit" />
            </p>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/js/icheck.min.js') ?>"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

</body>

</html>