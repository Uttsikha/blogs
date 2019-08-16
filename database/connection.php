<?php

	class Connection {
		protected $conn;
		protected $config;

		public function __construct(){
			$this->config=require('../config/database.php');
		}

		public function connect(){

			try {
				$conn=new PDO ("mysql:host=".$this->config['hostname'].";dbname=".$this->config['db_name'], $this->config['username'],$this->config['password']);
				return $conn;
			}catch (PDOException $exception){
				echo $exception->getMessage();
			}
		}

	}

?>