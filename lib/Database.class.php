<?php
	class Database{
	
		private static $dsn = 'mysql:dbname=projekt_db;host=127.0.0.1';
		private static $user='root';
		private static $password='';
		
		private static $Instance = null;
		
		private function __construct(){}
		
		private static function getInstance(){
			
			if(self::$Instance == null){
				try {
					self::$Instance = new PDO(self::$dsn, self::$user, self::$password);
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage();
				}
			}
			
			return self::$Instance;
		}
		
		public static function checkPasswordForUser(user,password){
			$dbh = self::getInstance();
			$sth = $dbh->prepare('Select Password from benutzer where Name=:input or Email=:input');
			$sth->bindParam(':input',user);
			$sth->execute();
			$row = $sth->fetch();
			if(password_verify(password,$row['Password'])){
				return true;
			} else {
				return false;
			}
		}
		
		public static function registerUser(user,email,password){
			try {
				$dbh = self::getInstance();
				$sth = $dbh->prepare('INSERT INTO user(`Name`, `Password`, `Email`) VALUES (:name,:pw,:email)');
				$sth->bindParam(':name', user);
				$sth->bindParam(':pw', password_hash(password, PASSWORD_BCRYPT));
				$sth->bindParam(':email', email;
				$sth->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public static function userExists(name){
			$dbh = self::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM user WHERE ´Name´ = :name');
			$sth->bindParam(':name',name);
			$sth->execute();
			$sth->storeResult();
			if($sth->num_rows > 0 ){
				return true;
			}else{
				return false;
			}
		}
		
		public static function emailExists(email){
			$dbh = self::getInstance();
			$sth = $dbh->prepare('Select count(*) FROM user WHERE ´Email´ = :email');
			$sth->bindParam(':email',email);
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