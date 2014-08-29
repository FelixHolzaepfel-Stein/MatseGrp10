<?php

require ('../lib/Database.class.php');
require ('../lib/User.class.php');

require ('../lib/Template.class.php');

session_start();
if(isset($_SESSION['logged_in'])){
	header('Location:index.php');
} else {
	
	if(isset($_POST['tmp'])){
		if(isset($_POST['Input']) && isset($_POST['Password'])){
			if(User::checkpasswordForuser($_POST['Input'],$_POST['Password'])){
				$_SESSION['logged_in'] = true;
				$_SESSION['id'] = User::getIDByInput($_POST['Input']);
		
				header('Location:index.php');
			} else {
				$_SESSION['error']='Benutzername/Password falsch eingegeben';
			}		
		} else {
			$_SESSION['error']='Benutzername/Password nicht angegeben';
		}
	}
	
	$tpl = new Template();
	if(isset($_SESSION['error']) && isset($_POST['tmp'])){
			$tpl->assign( 'error',$_SESSION['error']);
			unset($_SESSION['error']);
		}
		else{
			$tpl-> assign( 'error','');
		}
	$tpl->display('../templates/login.tpl'); 
}
?>