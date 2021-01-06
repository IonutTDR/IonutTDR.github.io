<?php
class Product{
	private $id;
	private $price;
	private $name;
	private $description;
	private $img1;
	private $img2;
	private $img3;
	private $img4;

	public function __construct($id, $prdName, $prdPrice, $img1, $img2, $img3, $img4, $description){
		$this->id = $id;
		$this->price = $prdPrice;
		$this->name = $prdName;
		$this->img1 = $img1;
		$this->img2 = $img2;
		$this->img3 = $img3;
		$this->img4 = $img4;
		$this->description = $description;
	}

	public function __destruct(){}


	public function getId(){
		return $this->id;
	}

	public function getDesc(){
		return $this->description;
	}
	public function getImg1(){
		return $this->img1;
	}
	public function getImg2(){
		return $this->img2;
	}
	public function getImg3(){
		return $this->img3;
	}
	public function getImg4(){
		return $this->img4;
	}
	public function getName(){
		return $this->name;
	}

	public function setName($newName){
		$this->name = $newName;
	}

	public function getPrice(){
		return $this->price;
	}
	public function setPrice($newPrice){
		$this->price = $newPrice;
	}
}


?>