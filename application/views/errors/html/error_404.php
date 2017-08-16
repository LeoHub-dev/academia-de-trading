<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
if( ! isset($CI))
{
    $CI = new CI_Controller();
}
$CI->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">
body {
	font-family: Arial, sans-serif;
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
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>

		Ir a la pagina inicial <a href="<?= site_url(); ?>"><?= site_url(); ?></a>
	</div>
</body>
</html>