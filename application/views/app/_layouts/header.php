<!DOCTYPE html>
<html lang="en-us">

<head>

	<meta charset='UTF-8' />
	<meta content='width=device-width, initial-scale=1' name='viewport' />
	<title><?php echo $title ?></title>

	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(APP_LOGO) ?>" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(APP_LOGO) ?>" />
	<link rel="icon" href="<?php echo base_url(APP_LOGO) ?>" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo base_url(APP_LOGO) ?>" type="image/x-icon" />

	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

	<!-- CSS template -->
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/all-modules.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/main.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/custom.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/all.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/sb-admin-2.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('storage/assets/app/css/fontawesome.css') ?>" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" >
	<script src="https://use.fontawesome.com/2b54e39484.js"></script>
	
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"> -->
</head>

<body class="o-page <?php if (!empty($classbody)) echo $classbody; ?>">

	<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->