<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style type="text/css">

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
			font-size: 25px;
			margin-top: 20px;
			font-weight: bold;
		}

		.login-box-body {
			opacity: 0.9;
			box-shadow: 0 0 8px 16px #efefef;
		}

		body {
			background: url(<?php echo base_url("assets/image/UNIMA.jpg"); ?>) no-repeat center center fixed;
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			background-size:cover;
			/* background-repeat: no-repeat; */
			/* height: 100%;
			background-position: center;
			background-size: cover; */
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

			<img src="<?= base_url('assets/image/logo-univ.png'); ?>" class="logo img-fluid" width="100">
			<p class="login-box-msg">Selamat Datang di <br> <b class="logo">Sistem Informasi KKN LPPM UNIMA</b></p>
			
			<?php if($this->session->flashdata('pesan')) :?>
				<?php echo $this->session->flashdata('pesan') ?>
				<?php echo $this->session->unset_userdata('pesan'); ?>
    		<?php endif; ?>
			
		
			<form method="post" action="<?php echo base_url('C_login/proses_login') ?>" class=" user">
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="username" aria-describedby="username" placeholder="Username" name="username" autofocus>
					<?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>

				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
					<?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<button class="btn btn-primary btn-user btn-block">Login</button>
				<br>
				<!-- <div class="row">
					<div class="col-xs-4"><a href="<?php echo base_url('welcome'); ?>" class="btn btn-primary">Kembali</a></div> -->
			</form>
			
		
		</div>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>