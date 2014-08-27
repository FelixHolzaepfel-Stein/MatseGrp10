<?php


class User{
	public static function checkpasswordForuser($user,$password){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select password from benutzer where Name=:input or email=:input');
			$sth->bindParam(':input',$user);
			$sth->execute();
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
				$sth = $dbh->prepare('INSERT INTO user(`Name`, `password`, `email`) VALUES (:name,:pw,:email)');
				$sth->bindParam(':name', $user);
				$sth->bindParam(':pw', password_hash($password, password_BCRYPT));
				$sth->bindParam(':email', $email);
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function changepassword($user,$password){
			try {
				$dbh = Database::getInstance();
				$sth = $dbh->prepare('UPDATE ´user´ SET password = :pw WHERE ´name´ = :name');
				$sth->bindParam(':name', $user);
				$sth->bindParam(':pw', password_hash($password, password_BCRYPT));
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function userExists($name){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM user WHERE ´Name´ = :name');
			$sth->bindParam(':name',$name);
			$sth->execute();
			$sth->storeResult();
			if($sth->num_rows > 0 ){
				return true;
			}else{
				return false;
			}
		}
		
		public static function emailExists($email){
			$dbh = Database::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM user WHERE ´email´ = :email');
			$sth->bindParam(':email',$email);
			$sth->execute();
			$sth->storeResult();
			if($sth->num_rows > 0 ){
				return true;
			}else{
				return false;
			}
		}
}
?>