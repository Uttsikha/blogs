<?php

require_once '../app/model.php';

class User extends Model {

	public $id;
	public $name;
	public $nick_name;
	public $joined_date;
	public $email_id;
	public $profile_picture;


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
	    $statetment = $this->conn->prepare('SELECT * FROM users WHERE id = ? LIMIT 0,1');
	    $statetment->bindParam(1, $this->id);
	    $statetment->execute();
	 
	    $row = $statetment->fetch(PDO::FETCH_ASSOC);
	 
	    $this->id = $row['id'];
	    $this->name = $row['name'];
	    $this->nick_name = $row['nick_name'];
	    $this->joined_date = $row['joined_date'];
	    $this->email_id = $row['email_id'];  
	    $this->profile_picture = $row['profile_picture'];  
	}
}