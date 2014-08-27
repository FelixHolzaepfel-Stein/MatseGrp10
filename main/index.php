<?php
require 'lib/Template.class.php';

session_start();

if (isset($_SESSION['logged_in'])) {
	$index = new Template();
	$index->display('templates/index.tpl');
} else {
	header('Location:login.php');
}


?>