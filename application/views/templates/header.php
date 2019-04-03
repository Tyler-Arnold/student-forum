<html>
	<head>
		<title>Student Forum</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css">
	</head>
	<body>
		<nav class="main-nav">
			<ul>
				<li><a href="<?php echo base_url('pages/view');?>">Feed</a></li> <!--update base_url to different path, once page/view is replaced-->
				<li><a href="#">Calendar</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Search</a></li>
				<li><a href="<?php echo base_url('user/register');?>">Register</a></li>
				
			</ul>
		</nav>
		<h1><?php echo $title; ?></h1>
