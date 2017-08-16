<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>css/bootstrap-material-design.min.css">
<link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>css/ripples.min.css">

<script type="text/javascript" src="<?= asset_url(); ?>js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/ripples.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/material.min.js"></script>
<style type="text/css">
body {
	display: table;
	position: absolute;
	height: 100%;
	width: 100%;
}
#container {
	text-align: center;
	display: table-cell;
	vertical-align: middle;
}
</style>
</head>
<body>
	<div id="container">
		<h1><?php echo $titulo; ?></h1>
		<?php echo $mensaje; ?>

		Ir a la pagina inicial <a href="<?= site_url(); ?>"><?= site_url(); ?></a>
	</div>
</body>
</html>