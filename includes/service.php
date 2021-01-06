<?php

include "repository.php";

class Service{
	private $repo;

	public function __construct(){
		$this->repo = new Repository();
	}

	public function create($newRepo){
		$this->repo = $newRepo;
	}

	public function addUser($fname, $lname, $pass, $email, $logged, $level, $ip){
		$this->repo->readDb();
		$this->repo->add($fname, $lname, $pass, $email, $logged, $level, $ip);
	}
	public function getUserByEmail($email){
		$this->repo = new Repository();
		$this->repo->readDb();
		$users = $this->repo->getAll();
		for($index = 0; $index < count($users); $index++){
			if($users[$index]->getEmail() == $email){
				return $users[$index];
			}
		}
		return -1;

	}
}

?>