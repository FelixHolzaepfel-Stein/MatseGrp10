<?php
	class Database{
	
		private static $dsn = 'mysql:dbname=projekt_db;host=127.0.0.1';
		private static $user='root';
		private static $password='';
		
		private static $Instance = null;
		
		private function __construct(){}
		
		public static function getInstance(){
			
			if(self::$Instance == null){
				try {
					self::$Instance = new PDO(self::$dsn, self::$user, self::$password);
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage();
				}
			}
			
			return self::$Instance;
		}
		
		
		
		
		
		
		
		
		
	}
?>