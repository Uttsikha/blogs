<?php

require_once '../app/model.php';

class User extends Model {

	public $id;
	public $name;
	public $joined_date;
	public $email_id;
	public $password;


	public function __construct() 
	{
		parent::__construct();
	}

	public function allUsers()
	{
		$statement = $this->connection->prepare('SELECT * FROM users');
		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}

	function deleteUser() 
	{
	 
	    $statement = $this->conn->prepare('DELETE FROM users WHERE id = ?');
	    $statement->bindParam(1, $this->id);
	 
	    if($result = $statement->execute()){
	        return true;
	    }else{
	        return false;
	    }
	}


	function readUser()
	{
	    $statetment = $this->conn->prepare('SELECT * FROM users WHERE name = ? LIMIT 0,1');
	    $statetment->bindParam(1, $this->name);
	    $statetment->execute();
	 
	    $row = $statetment->fetch(PDO::FETCH_ASSOC);
	 
	    $this->id = $row['id'];
	    $this->name = $row['name'];
	    $this->joined_date = $row['joined_date'];
	    $this->email_id = $row['email_id'];  
	    $this->password = $row['password'];  
	}
}