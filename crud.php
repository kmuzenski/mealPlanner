<?php
require_once('session.php');
error_reporting(E_ALL);
// helper function for validation
function valid($varname){
	return ( !empty($varname) && isset($varname) );
}

// USER CRUD
class UserCrud {	

public $user_id;


        public function __construct($user_id){
                $this->user_id = $user_id;
        }



	public function create($username, $email, $password){
		if (!valid($username) || !valid($email) || !valid($password)) {
			return false;
		} else {

			$pdo = Database::connect();
			$sql = "INSERT INTO user (username,email,password) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($username,$email,$password));


			Database::disconnect();
			return $pdo->lastInsertId();
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM user WHERE id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->user_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        	Database::disconnect();
	        	return $data;
			} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
		}

    }

	public function update($username,$email,$password){
		if (!valid($username) || !valid($email) || !valid($password)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE user SET username = ?, email = ?, password = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($username,$email,$password,$id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($user_id){

        $pdo = Database::connect();
        $sql = "DELETE FROM user WHERE id = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($user_id));
        Database::disconnect();
        return true;

	}

}
// END USER CRUD


//CATEGORY CRUD
class CategoryCrud {	
	public $user_id;
	public function __construct($user_id){
		$this->user_id = $user_id;
	}
	public function create($name){
		if (!valid($name)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO category (name) values(?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name));
			$category_id = $pdo->lastInsertId();
			Database::disconnect();
			return true;
		}	
	}
	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM category ORDER BY id';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->user_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	         Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			//echo $error->getMessage();
			
		}
    }
	public function update($name,$category_id){
		if (!valid($name)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE category SET name = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$category_id));
			Database::disconnect();
			return true;
		}
	}
	public function delete($category_id){
        $pdo = Database::connect();
        $sql = "DELETE FROM category WHERE id = ?"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($category_id));
        Database::disconnect();
        return true;
	
	}
}


class recipeCrud {	


	public function create($name, $category_FK, $description, $calories, $cooktime, $ingredients, $instructions){
		if (!valid($name) || !valid($category_FK) || !valid($description) || !valid($calories) || !valid($cooktime) || !valid($ingredients) || !valid($instructions)) {
			return false;
		} else {

			$pdo = Database::connect();
			$sql = "INSERT INTO recipe (name,category_FK,description,calories,cooktime,ingredients,instructions) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$category_FK,$description,$calories,$cooktime,$ingredients,$instructions));


			Database::disconnect();
			return $pdo->lastInsertId();
		}
	}

/*	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM recipe WHERE id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->user_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        	Database::disconnect();
	        	return $data;
			} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
		}

    }

	public function update($username,$email,$password){
		if (!valid($username) || !valid($email) || !valid($password)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE user SET username = ?, email = ?, password = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($username,$email,$password,$id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($user_id){

        $pdo = Database::connect();
        $sql = "DELETE FROM user WHERE id = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($user_id));
        Database::disconnect();
        return true;

	}
*/
}
