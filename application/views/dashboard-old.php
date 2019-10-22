<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Helpdesk</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<script type="text/javascript" src="assets/js/jquery-3.1.4.min.js"></script>
  	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="assets/css/dashboard-custom.css">
</head>
<body>
	<?php include_once 'content/nav.php'; ?>
	<div class="py-5">
		<div class="container">
		  <div class="row">
		    <?php if($this->session->userdata("auth") == 1) {
		    	include_once 'content/admin.php';
		    } else if($this->session->userdata("auth") == 2) {
		    	include_once 'content/operator.php';
		    } else if($this->session->userdata("auth") == 3) {
		    	include_once 'content/teknisi.php';
		    } else if($this->session->userdata("auth") == 4) {
		    	include_once 'content/perusahaan.php';
		    } ?>
		  </div>
		</div>
	</div>
	</body>

</body>
</html>