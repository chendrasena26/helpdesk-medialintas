<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $judul; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>">
  	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.4.min.js')?>"></script>
  	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/template-custom.css')?>">
</head>
<body>
	<?php include_once 'content/nav.php'; ?>
	<div class="title-custom">
		<h1><?php echo $judul; ?></h1>
	</div><br>
	<?php if($this->session->flashdata('berhasil')) {
		include_once 'content/success.php';
	} ?>
	<?php include_once $instruksi; ?>
</body>
</html>