<?php
namespace App\QueryBuilders;
require '../vendor/autoload.php';


// require_once '../app/Model.php';
use App\Model;

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

	function readUser()
	{
	    $statement = $this->connection->prepare('SELECT * FROM users WHERE username =:username AND password =:password LIMIT 1');
	    $statement->bindParam(":username", $this->username);
	    $statement->bindParam(":password", $this->password);
		$statement->execute();
		$row = $statement->fetch(\PDO::FETCH_ASSOC);
		$this->id = $row['id'];
		return $statement;
		
	}
	function checkUser()
	{
	    $statement = $this->connection->prepare('SELECT * FROM users WHERE email_id=:email_id OR username =:username');
	    $statement->bindParam(":username", $this->username);
	     $statement->bindParam(":email_id", $this->email_id);
		$result = $statement->execute();
		return $statement;
		
	}

	public function allUsers()
	{
		$statement = $this->connection->prepare('SELECT * FROM users');
		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}
	
	public function oneUser()
	{
		$statement = $this->connection->prepare('SELECT * FROM users WHERE id=:id LIMIT 0,1 ');
		$statement->bindParam(":id", $this->id);
	    $statement->execute();
	 
	    $row = $statement->fetch(\PDO::FETCH_ASSOC);
	    $this->id = $row['id'];
	    $this->username = $row['username'];
	    $this->password = $row['password'];
	    $this->email_id = $row['email_id'];  
	     $this->joined_date = $row['joined_date'];  
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
    
	
}