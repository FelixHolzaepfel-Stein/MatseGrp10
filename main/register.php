<?php
require ('../lib/Database.class.php');
require ('../lib/User.class.php');

require ('../lib/Template.class.php');

if(isset($_SESSION['logged_in'])){
	header('Location:index.php');
} else {
	$tpl = new Template();
	$tpl->display('../templates/register.tpl');
	
	if(isset($_SESSION['error']) && isset($_POST['tmp'])){
			echo $_SESSION['error'];
	}
	if(isset($_POST['tmp'])){
		if(User::userExists($_POST['Name']) && User::emailExists($_POST['Email'])){
			if(User::userExists($_POST['Name'])){
				if(User::emailExists($_POST['Email'])){
					if($_POST['Password1']===$_POST['Password2']){
						User::registerUser($_POST['Name'],$_POST['Email'],$_POST['Password1']);
					} else {
						$_SESSION['error']= 'Passwoerter sind ungleich.';
					}
				} else {
					$_SESSION['error']= 'Email bereits vergeben.';
				}
			} else {
				$_SESSION['error']= 'Name bereits vergeben.';
			}
		} else {
			$_SESSION['error']= 'Name und Email bereits vergeben.';
		}
	}
}
?>