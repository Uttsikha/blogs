<?php

namespace "app\QueryBuilders";

require_once '../app/model.php';

class User extends Model {

	public $id;
	public $username;
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

	function createUser(){
 
	    $statement = $this->connection->prepare('INSERT INTO users
	    	SET username=:username, email_id=:email_id, password=:password');
	  
      
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email_id=htmlspecialchars(strip_tags($this->email_id));
        $this->password=htmlspecialchars(strip_tags($this->password));
        
        $statement->bindParam(":username", $this->username);
        $statement->bindParam(":email_id", $this->email_id);
        $statement->bindParam(":password", $this->password);
       
     if($statement->execute()){
            return true;
        }else{
            return false;
        }
 
	}
 
    
	function readUser()
	{
	    $statetment = $this->connection->prepare('SELECT * FROM users WHERE email_id = ? LIMIT 0,1');
	    $statetment->bindParam(1, $this->username);
	    $statetment->execute();
	 
	    $row = $statetment->fetch(PDO::FETCH_ASSOC);
	 
	    $this->id = $row['id'];
	    $this->username = $row['username'];
	    $this->joined_date = $row['joined_date'];
	    $this->email_id = $row['email_id'];  
	    $this->password = $row['password'];  
	}
}