<?php


class User{
	public static function checkpasswordForuser($user,$password){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select password from benutzer where Name=:input or email=:input');
			$sth->bindParam(':input',$user);
			if(!$sth->execute()){
				return false;
			}
			$row = $sth->fetch();
			if(password_verify($password,$row['password'])){
				return true;
			} else {
				return false;
			}
		}
		
		public static function registerUser($user,$email,$password){
			try {
				$dbh = Database::getInstance();
				$sth = $dbh->prepare('INSERT INTO benutzer(Name, password, email) VALUES (:name,:pw,:email)');
				$sth->bindParam(':name', $user);
				$sth->bindParam(':pw', password_hash($password, PASSWORD_BCRYPT));
				$sth->bindParam(':email', $email);
				return $sth->execute();
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function getNameByID($id){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select Name FROM benutzer WHERE ID = :id');
			$sth->bindParam(':id',$id);
			$sth->execute();
			$row = $sth->fetch();
			return $row['Name'];
		}
		
		public static function getIDByInput($input){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select ID FROM benutzer where Name=:input or email=:input');
			$sth->bindParam(':input',$input);
			$sth->execute();
			$row = $sth->fetch();
			return $row['ID'];
		}
		
		public static function getEmailByID($id){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select Email FROM benutzer WHERE ID = :id');
			$sth->bindParam(':id',$id);
			$sth->execute();
			$row = $sth->fetch();
			return $row['Email'];
		}
		
		public static function getDescriptionByID($id){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select Description FROM benutzer WHERE ID = :id');
			$sth->bindParam(':id',$id);
			$sth->execute();
			$row = $sth->fetch();
			return $row['Description'];
		}
		
		public static function getPointsByID($id){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select Points FROM benutzer WHERE ID = :id');
			$sth->bindParam(':id',$id);
			$sth->execute();
			$row = $sth->fetch();
			return $row['Points'];
		
		}
		
		public static function getMailByID($id) {
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('SELECT * FROM messages WHERE ID = :id');
			$sth->bindParam(':id', $id);
			$sth->execute();
			$row = $sth->fetch();
			return $row;
		}
		
		
		public static function getMailsByID($id) {
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('SELECT * FROM messages WHERE From_ID = :id OR To_ID = :id');
			$sth->bindParam(':id', $id);
			$sth->execute();
			$row = $sth->fetchAll();
			return $row;
		}
		
		public static function sendMail($from, $to, $title, $text) {
			$dbh = Database::getInstance();
			$toID = self::getIDByInput($to);
			
			$sth = $dbh->prepare('INSERT INTO messages (From_ID, To_ID, Title, Text) VALUES (:from, :to, :title, :text)');
			$sth->bindParam(':from', $from);
			$sth->bindParam(':to', $toID);
			$sth->bindParam(':title', $title);
			$sth->bindParam(':text', $text);
			$sth->execute();
			return true;		
			
		}
		
		public static function changepassword($user,$password){
			try {
				$dbh = Database::getInstance();
				$sth = $dbh->prepare('UPDATE benutzer SET password = :pw WHERE name = :name');
				$sth->bindParam(':name', $user);
				$sth->bindParam(':pw', password_hash($password, PASSWORD_BCRYPT));
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function changeDescription($id, $description) {
			try {
				$dbh = Database::getInstance();
				$sth = $dbh->prepare('UPDATE benutzer SET Description = :description WHERE ID = :id');
				$sth->bindParam(':description', $description);
				$sth->bindParam(':id', $id);
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function changePoints($id, $points) {
			try {
				$dbh = Database::getInstance();
				$sth = $dbh->prepare('UPDATE benutzer SET Points = :points WHERE ID = :id');
				$sth->bindParam(':points', $points);
				$sth->bindParam(':id', $id);
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function userExists($name){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM benutzer WHERE Name = :name');
			$sth->bindParam(':name',$name);
			$sth->execute();
			$row=$sth->fetch();
			if((int)$row['count(*)'] > 0 ){
				return true;
			}else{
				return false;
			}
		}
		
		public static function emailExists($email){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM benutzer WHERE email = :email');
			$sth->bindParam(':email',$email);
			$sth->execute();
			$row=$sth->fetch();
			if((int)$row['count(*)'] > 0 ){
				return true;
			}else{
				return false;
			}
		}
}
?>