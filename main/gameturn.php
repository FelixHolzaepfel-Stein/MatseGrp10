<?php
	require '../lib/Database.class.php';
	require '../lib/Game.class.php';
	
	session_start();
	
	if(!isset($_POST['gamefield'])){
		echo 'FEHLER';
	}else{
		$field = $_POST['gamefield'];
		$_SESSION['game']->makeTurn($field,$_SESSION['id']);
		$winner;
		if($_SESSION['game']->isFinished()){
			$winner = $_SESSION['game']->myUserWon();
			if(!$winner){
				if($winner === '-1'){
					$winner = 0;
				}else{
					$winner = 2;
				}
			}else{
				$winner = 1;
			}
			
			
			$arr = array('gamefield' => $_SESSION['game']->getGamefield(), 'finished' => true, 'winner' => $winner);
			echo json_encode($arr);
		}else{
			
			while(!$_SESSION['game']->updateGame()){
				sleep(1);
			}
			
			if($_SESSION['game']->isFinished()){
				$winner = $_SESSION['game']->myUserWon();
				if(!$winner){
					if($winner === '-1'){
						$winner = 0;
					}else{
						$winner = 2;
					}
				}else{
					$winner = 1;
				}
				
				
				$arr = array('gamefield' => $_SESSION['game']->getGamefield(), 'finished' => true, 'winner' => $winner);
				echo json_encode($arr);
			}else{
				$arr = array('gamefield' => $_SESSION['game']->getGamefield(), 'finished' => false, 'currentUser' => $_SESSION['game']->getCurrentUser());
				echo json_encode($arr);
			}
		}
		
		
	}
?>