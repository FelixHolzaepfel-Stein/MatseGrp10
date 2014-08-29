<?php
	require '../lib/Database.class.php';
	require '../lib/Game.class.php';
	
	session_start();
	
	$_SESSION['game'] = new Game($_SESSION['id']);
	$_SESSION['game']->createGame();
	
	while(!$_SESSION['game']->hasOpponent()){
		sleep(1);
	}
	
	$arr = array('gamefield' => $_SESSION['game']->getGamefield() 'currentUser' => $_SESSION['game']->getCurrentUser());
	echo(json_encode($arr));
	
?>