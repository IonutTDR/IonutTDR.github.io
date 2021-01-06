<?php
include "user.php";

class Repository{
	private $index = 0;
	private $users = array();

	public function __construct(){
		$this->index = 0;
		$this->users = array();
	}

	//add a user in db

	public function add($fname, $lname, $pass, $email, $logged, $level, $ip){

		include "mysql.php";
		$sql = "INSERT INTO conturi (id, prenume, nume, parola, email, status, level, ip) VALUES ('".$this->index."', '".$fname."', '". $lname."', '".$pass."', '".$email."', '".$logged."', '".$level."','".$ip."');";

		if($conn->query($sql) != TRUE){
			echo "Error: ". $sql . " " . $conn->error;
		}
		else{
			$user = new User($fname, $lname, $pass, $email, $logged, $level, $ip);
			$this->users[$this->index] = new User($fname, $lname, $pass, $email, $logged, $level, $ip);
			$this->index += 1;
		}


	}

	public function readDb(){
		include "mysql.php";
		$sql = "SELECT prenume, nume, parola, email, status, level, ip FROM conturi";
		$result = $conn->query($sql);
		$row;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$user = new User($row["prenume"], $row["nume"], $row['parola'], $row["email"], $row["status"], $row["level"], $row["ip"]);
				$this->users[$this->index] = $user;
				$this->index += 1;
			}
		}

	}
	public function getAll(){
		return $this->users;
	}
}

?>