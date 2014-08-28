<?php
	
	require ('../lib/Template.class.php');
	
	session_start();
	
	$tpl = new Template();
	$tpl->display('../templates/game.tpl');
?>