<?php 
	$userid=$this->session->userdata('id');
	$username=$this->session->userdata('username');
	?>
<html>
	<head>
		<title>Student Forum</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css">
	</head>
	<body>
		<nav class="main-nav">
			<ul>
				<li><a href="<?php echo base_url('pages/feed');?>">Feed</a></li> <!--update base_url to different path, once page/view is replaced-->
				<li><a href="#">Calendar</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Search</a></li>
				<?php if(!$userid){?>
				<li><a href="<?php echo base_url('user/login');?>">Login</a></li>
				<?php } else{?>
				<li><a href="<?php echo base_url('user/logout');?>">Logout</a></li>
				<li><p style="color:white;">Logged in as <?php echo $username;?></p></li>
				<?php } ?>
				
			</ul>
		</nav>
		<h1><?php echo $title; ?></h1>
