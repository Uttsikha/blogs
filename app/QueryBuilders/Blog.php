<?php
namespace App\QueryBuilders;
require '../vendor/autoload.php';


// require_once '../app/Model.php';
use App\Model;

class Blog extends Model {

	public $id;	
	public $name;	
	public $photo;	
	public $posted_date;	
	public $description;
	public $user_id;


	public function __construct()
	{
		parent::__construct();
	}

	public function allBlogs()
	{
		$statement = $this->connection->prepare('SELECT * FROM blogs ORDER BY name ASC');
		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}

	function deleteBlog()
	 {
 	    $statement = $this->connection->prepare('DELETE FROM blogs WHERE id = ?');
	    $statement->bindParam(1, $this->id);
	 
	    if($result = $statement->execute()){
	        return true;
	    }else{
	        return false;
	    }
	}

	function readBlog()
	{
	    $statetment = $this->connection->prepare('SELECT * FROM blogs WHERE id = ? LIMIT 0,1 ');
	    $statetment->bindParam(1, $this->id);
	    $statetment->execute();
	 
	    $row = $statetment->fetch(PDO::FETCH_ASSOC);
	 
	    $this->id = $row['id'];
	    $this->name = $row['name'];
	    $this->photo = $row['photo'];
	    $this->description = $row['description'];  
	    $this->posted_date= $row['posted_date'];  
	    $this->user_id = $row['user_id'];  
	}

	 function createBlog(){
 
	    $statement = $this->connection->prepare('INSERT INTO blogs
	    	SET name=:name, photo=:photo, description=:description, user_id=:user_id');
	  
      
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->photo=htmlspecialchars(strip_tags($this->photo));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        
        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":photo", $this->photo);
        $statement->bindParam(":description", $this->description);
        $statement->bindParam(":user_id", $this->user_id);
       
     if($statement->execute()){
            return true;
        }else{
            return false;
        }
 
    }


}