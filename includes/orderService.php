<?php

include 'orderRepo.php';

class orderService{

	private $repo;

	public function __construct(){
		$this->repo = new orderRepo();
	}

	public function __destruct(){}

	public function add($products, $adress, $totalPrice, $user, $email){
		$this->repo->readDb();
		$this->repo->addOrder($products, $adress, $totalPrice, $user, $email);

	}
	public function get(){
		$this->repo->readDb();
		return $this->repo->getOrders();
	}
}

?>