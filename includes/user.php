<?php

Class User{
	private $fname;
	private $lname;
	private $password;
	private $email;
	private $status;
	private $ip;
	private $level;

	//constructor and destructor

	public function __construct($fname, $lname, $pass, $email, $logged, $level, $ip){
		$this->fname = $fname;
		$this->lname = $lname;
		$this->password = $pass;
		$this->email = $email;
		$this->status = $logged;
		$this->ip = $ip;
		$this->level = $level;
	}

	public function __destruct(){
		$logged = 0;
	}

	
	//get and set functions for each var
	public function getLevel(){
		return $this->level;
	}
	public function getIp(){
		return $this->ip;
	}

	public function getFname(){
		return $this->fname;
	}

	public function setFname($newUser){
		$this->fname = $newUser;
	}

	public function getLname(){
		return $this->lname;
	}

	public function setLname($name){
		$this->lname = $name;
	}


	public function getPass(){
		return $this->password;
	}
	public function setPass($newPass){
		$this->password = $newPass;
	}


	public function getEmail(){
		return $this->email;
	}
	public function setEmail($newEmail){
		$this->email = $newEmail;
	}


	public function getStatus(){
		return $this->status;
	}
	public function setStatus($newStatus){
		$this->status = $newStatus;
	}
}

?>