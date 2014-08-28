<?php
require ('../lib/Database.class.php');
require ('../lib/User.class.php');

require ('../lib/Template.class.php');

session_start();
print_r($_POST);
if(isset($_SESSION['logged_in'])){
	header('Location:index.php');
} else {
	$tpl = new Template();
	
	
	
	if(isset($_POST['tmp'])){
		if(!User::userExists($_POST['Name']) || !User::emailExists($_POST['Email'])){
			if(!User::userExists($_POST['Name'])){
				if(!User::emailExists($_POST['Email'])){
					if($_POST['Password1']===$_POST['Password2']){
						if(User::registerUser($_POST['Name'],$_POST['Email'],$_POST['Password1'])){
							header('Location:login.php');
						} else {
						
						}
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
	if(isset($_SESSION['error']) && isset($_POST['tmp'])){
			$tpl->assign( 'error',$_SESSION['error']);
		}
		else{
			$tpl-> assign( 'error','');
		}
	$tpl->display('../templates/register.tpl');
}
?>