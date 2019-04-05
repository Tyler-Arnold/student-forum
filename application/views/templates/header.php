<?php
	$userid=$this->session->userdata('id');
	$username=$this->session->userdata('username');
	?>
<html>
	<head>
		<title>Student Forum</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/calendar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/searchgrid.css">
	</head>
	<body>
		<nav class="main-nav">
			<ul>

				<?php if(!$userid){?>
				<li><a href="<?php echo base_url('user/login');?>">Login</a></li>
				<?php } else {?>
				<li><a href="<?php echo base_url('feed/index');?>">Feed</a></li> <!--update base_url to different path, once page/view is replaced-->
				<li><a href="<?php echo base_url("profile/index/$user");?>">Profile</a></li>
				<li><a href="<?php echo base_url('search/input');?>">Search</a></li>
				<li><a href="<?php echo base_url('appointments/view');?>">Appointments</a></li>
				<li><a href="<?php echo base_url('user/logout');?>">Logout</a></li>
				<li><p style="color:white;">Logged in as <?php echo $username;?></p></li>
			<?php } ?>
			</ul>
		</nav>
	<div class="page-container">
	<h1 class="title"><?php echo $title; ?></h1>
