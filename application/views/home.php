<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Helpdesk Media</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/home-custom.css">
</head>
<body>
	<div class="header-custom">
		<h1>Helpdesk Media</h1>
	</div>
	<div class="kotak_login">
		<?php echo form_open(base_url('home/login')); ?>
		<div class="form">
    		<form class="login-form">
		      <input type="text" placeholder="Email" id="usern" name="usern">
		      <input type="password" placeholder="Password" id="passwd" name="passwd">
		      <button>Login</button>
		    </form>
		</div>
		<?php echo form_close(); ?>
	</div>
</body>
</html>