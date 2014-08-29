<?php

	require ('../lib/Database.class.php');
	require ('../lib/User.class.php');
	
	session_start();
	if(isset($_POST['Points'])){
	
		$id=$_SESSION['id'];
		$newPoints = $_POST['Points'];
		$points = User::getPointsByID($id);
		if(!($points==0 && $newPoints < 0)) {
			User::changePoints($id, ($points+$newPoints));
		}
	}
?>