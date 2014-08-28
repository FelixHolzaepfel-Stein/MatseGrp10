<?php

require ('../lib/Database.class.php');
require ('../lib/User.class.php');

require ('../lib/Template.class.php');

session_start();
if(isset($_SESSION['logged_in'])){
	header('Location:index.php');
} else {
	
	$tpl = new Template();
	if(isset($_SESSION['error']) && isset($_POST['tmp'])){
			$tpl->assign( 'error',$_SESSION['error']);
		}
		else{
			$tpl-> assign( 'error','');
		}
	$tpl->display('../templates/login.tpl');
		


	if(isset($_POST['tmp'])){
	if(User::checkpasswordForuser($_POST['Input'],$_POST['Password'])){
		$_SESSION['logged_in'] = true;
		$_SESSION['id'] = User::getIDByInput($_POST['Input']);
		
		header('Location:index.php');
	} else {
		$_SESSION['error']='Benutzername/Password falsch eingegeben';
	}
	
	} 
}
?>