<?php
include 'repoProduct.php';

class servicePrd{
	private $repo;

	public function __construct(){
		$this->repo = new repoProduct();
	}

	public function add($name, $price, $img1, $img2, $img3, $img4,$description){
		$this->repo->readDb();
		$this->repo->addProduct($name, $price, $img1, $img2, $img3, $img4, $description);
	}
	public function delete($name, $index){
		$this->repo->readDb();
		$this->repo->deleteProduct($name, $index);
	}
	public function get(){
		$this->repo->readDb();
		return $this->repo->getProducts();
	}

	public function getProductByName($name){
		$this->repo->readDb();
		$products = $this->repo->getProducts();

		for($index = 0; $index < count($products); $index ++){
			if($products[$index]->getName() == $name){
				return $products[$index];
			}
		}
		return 1;
	}
}


?>