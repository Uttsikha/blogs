<?php

	require_once "../database/connection.php";

	class Model {
		protected $connection;

		public function __construct(){
			$connection= new Connection();
			if (!$this->connection) {
				$this->connection= $connection->connect();
			}
		}

	}