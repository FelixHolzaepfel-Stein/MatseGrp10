<?php

require ('../lib/Database.class.php');
require ('../lib/Template.class.php');

session_start();

if(isset($_SESSION['logged_in'])){
	header('Location:index.php');
} else {
	
	$tpl = new Template();
	$tpl->display('../templates/login.tpl');
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
		}
}

if(isset($_POST['login'])){
	$dbh = Database::getInstance();
	$sth = $dbh->prepare('Select Password from benutzer where Name=:input or Email=:input');
	$sth->bindParam(':input',$_POST['Input']);
	$sth->execute();
	$row = $sth->fetch();
	if(password_verify($_POST['Password'],$row['Password'])){
		$_SESSION['logged_in'] = true;
		$_SESSION['user'] = $_POST['Name'];
		header('Location:index.php');
	} else {
		header('Location:login.php');
		$_SESSION['error']='Benutzername/Password falsch eingegeben';
	}
	
	} 
?>