<?php
	class Game{
		private $id;
		private $myUserID;
		private $opponentUserID;
		private $gameField;
		private $winnerID;
		private $currentUser;
		
		public function __construct($ownId){
			$myID = $ownID;
		}
		
		public function createGame(){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('INSERT INTO game (user_one_id, currentUser) values (:myid,:myid)');
			$sth->bindParam(':myid',$myID);
			if(!$sth->execute()){
				return false;
			}
			unset($sth);
			$sth = $dbh->prepare('SELECT ID FROM game where user_one_id = :ownid and user_two_id is NULL ORDER BY ID DESC');
			$sth->bindParam(':ownid',$myUserID);
			if(!$sth->execute()){
				return false;
			}
			$id = $sth[0]['ID'];
			$currentUser = $myUserID;
			return true;
		}
		
		public function joinGame(){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select ID, user_one_id from game where user_two_id is NULL ORDER BY ID');
			if(!$sth->execute()){
				return false;
			}
			$rows = $sth->fetchAll();
			$firstRecord = $rows[0];
			$id = $firstRecord['ID'];
			$opponentUserID = $firstRecord('user_one_id');
			$currentUser = $opponentUserID;
			unset($sth);
			$sth = $dbh->prepare('UPDATE game SET user_two_id = :userID where ID = :id');
			$sth->bindParam(':id',$id);
			$sth->bindParam(':userID', $myUserID);
			if(!$sth->execute()){
				return false;
			}
			return true;
		}
		
		public function makeTurn($field, $userID){
			$sth = $dbh->prepare('UPDATE game SET currentUser = :userID, gamefield=:gamefield where ID = :id');
			$sth->bindParam(':id',$id);
			if($userID === $myUserID){
				$sth->bindParam(':userID', $opponentUserID);
			}else{
				$sth->bindParam(':userID', $myUserID);
			}
			$sth->bindParam(':gamefield', $field);
			if(!$sth->execute()){
				return false;
			}
			$gamefield = $field;
			
		}
		
		public function hasOpponent(){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select user_two_id from game where ID = :gameid');
			$sth->setParam(':gameid', $id);
			if(!$sth->execute()){
				return false;
			}
			$opID = $sth->fetch()['user_two_id'];
			if($opID === 'NULL'){
				return false;
			}
			$opponentUserID = $opID;
			return true;
		}
		
		public function updateGame(){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select gamefield,currentUser from game where ID = :gameid');
			$sth->bindParam(':gameid', $id);
			if(!$sth->execute()){
				return false;
			}
			$row = $sth->fetch();
			$field = $row['gamefield'];
			if($field === $gamefield){
				$gamefield = $field;
				$currentUser = $row['currentUser']
				return true;
			}else{
				return false;
			}
		}
		
		private function setWinner($fieldValue){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select :userstring as winnerid from game where ID = :gameid');
			if($fieldValue === '1'){
				$sth->bindParam(':userstring', 'user_one_ID');
			}else{
				$sth->bindParam(':userstring', 'user_two_ID');
			}
			$sth->bindParam(':gameid', $id);
			$sth->execute();
			$winnerID = $sth->fetch()['winnerid'];			
		}
		
		public function isFinished(){
			$firstRow = array();
			$secondRow = array();
			$thirdRow = array();
			$wasNoZero = true;
			for ($i = 0; $i <= 8; $i++) {
				if($gamefield[$i] === '0'){
					$wasNoZero = false;
				}
				if($i < 3){
					$firstRow[] = $gamefield[$i];
				}else if ($i < 6){
					$secondRow[] = $gamefield[$i];
				}else{
					$thirdRow[] = $gamefield[$i];
				}
			}
			unset($i);
			if($firstRow[0] !== '0' && $firstRow[0] === $firstRow[1] && $firstRow[0] === $firstRow[2]){
				$this->setWinner($firstRow[0]);
				return true;
			}
			if($secondRow[0] !== '0' && $secondRow[0] === $secondRow[1] && $secondRow[0] === $secondRow[2]){
				$this->setWinner($secondRow[0]);
				return true;
			}
			if($thirdRow[0] !== '0' && $thirdRow[0] === $thirdRow[1] && $thirdRow[0] === $thirdRow[2]){
				$this->setWinner($thirdRow[0]);
				return true;
			}
			
			if($firstRow[0] !== '0' && $firstRow[0] === $secondRow[1] && $firstRow[0] === $thirdRow[2
				$this->setWinner($firstRow[0]);
				return true;
			}
			
			if($thirdRow[0] !== '0' && $thirdRow[0] === $secondRow[1] && $thirdRow[0] === $firstRow[2]){
				$this->setWinner($thirdRow[0]);
				return true;
			}
			
			for($i = 0; $i <= 2; $i){
				if(firstRow[$i] !== '0' && firstRow[$i] !== '0' && firstRow[$i] !== '0'){
					if(firstRow[$i] === secondRow[$i] === thirdRow[$i]){
						$this->setWinner($thirdRow[$i]);
						return true;
					}
				}
			}
			
			if($wasNoZero){
				$this->winnerID = '-1';
			}
			return false;
		}
		
		
		
		public function getOpponentId(){
			return $this->opponentUserID;
		}
		
		public function getGameField(){
			return $this->gameField;
		}
		
		public function getWinnerID(){
			return $this->winnerID;
		}
		
		public function currentUser(){
			return $this->currentUser;
		}
		
		public function myUserWon(){
			return $this->winnerID === $this->myUserID;
		}
		
	}
?>