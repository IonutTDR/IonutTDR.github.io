<?php
include 'user.php';

class Order{
	private $idOrder;
	private $productsId;
	private $adress;
	private $totalPrice;
	private $user;
	private $email;

	public function __construct($idOrder, $products, $adress, $totalPrice, $user, $email){
		$this->idOrder = $idOrder;
		$this->productsId = $products;
		$this->adress = $adress;
		$this->totalPrice = $totalPrice;
		$this->user = $user;
		$this->email = $email;
	}

	public function __destruct(){
		$this->idOrder = 0;
		$this->productsId = array();
		$this->adress = array();
		$this->totalPrice = 0.0;
		$this->user = 0;
		$this->email = "";
	}

	public function getIdOrder(){
		return $this->idOrder;
	}

	public function getProductsId(){
		return $this->productsId;
	}

	public function getAdress(){
		return $this->adress;
	}

	public function getTotalPrice(){
		return $this->totalPrice;
	}

	public function getUser(){
		return $this->user;
	}

	public function getEmail(){
		return $this->email;
	}
}

?>