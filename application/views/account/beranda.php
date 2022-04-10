<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        body {
            background-image: url(<?php echo base_url("assets/image/UNIMA.jpg"); ?>);
            width: 100%;
            height: auto;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }

        .login-box {
            box-shadow: 0 0 8px 16px #efefef;
        }

        .logo {

            color: #000000;
            font-family: 'Marck Script', cursive;
            font-size: 25px;
        }
    </style>

</head>

<body>

    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="login-logo">
                <img width="30%" src="<?php echo base_url() ?>assets/image/download.png">

                <div class="logo"><b>Sistem Informasi KKN LPPM UNIMA</b></div>
            </div>
            <!-- <button type="button" class="btn btn-block btn-success btn-flat"> <a style="color: white" href="<?php echo site_url('login/index'); ?>">Login as User</a></button> -->

            <a style="color: white" class="btn btn-block btn-success btn-flat" href="<?php echo site_url('login/index'); ?>">Login as User</a>

            <div style="color: black; margin: 15px;  text-align: center;">--OR--</div>

            <!-- <button type="button" class="btn btn-block btn-primary btn-flat"> <a style="color: white" href="<?php echo site_url('register/index'); ?>">Create a Account</a></button> -->

            <a style="color: white" class="btn btn-block btn-primary btn-flat" href="<?php echo site_url('register/index'); ?>">Create a Account</a>
            <br>
            <div class="row">
                <div class="col-xs-4"><a href="<?php echo base_url('welcome'); ?>" class="btn btn-primary">Kembali</a></div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4">

                </div>

            </div>
            </form>
        </div>

    </div>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
</body>

</html>