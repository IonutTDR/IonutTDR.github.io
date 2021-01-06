<?php
include 'product.php';

class repoProduct{
	private $products;
	private $index;

	public function __construct(){
		$this->products = array();
		$this->index = 0;
	}

	public function addProduct($name, $price, $img1, $img2, $img3, $img4, $description){
		include 'mysql.php';
		$sql = "INSERT INTO products (id, name, price, img1, img2, img3, img4, description) VALUES ('".$this->index."', '".$name."', '".$price."', '".$img1."', '".$img2."', '".$img3."', '".$img4."', '".$description."');";
		if($conn->query($sql) != TRUE){
			echo "Error: ".$conn->error;
		}
		$this->products[$this->index] = new Product($this->index, $name, $price, $img1, $img2, $img3, $img4, $description);
		$this->index += 1;
	}

	public function readDb(){
		include 'mysql.php';
		$sql = 'SELECT id, name, price, img1, img2, img3, img4, description FROM products;';
		if($conn->query($sql) != TRUE){
			echo "Error: ".$conn->error;
		}
		else{
			$result = $conn->query($sql);
			$this->index = 0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$name = $row["name"];
					$price = $row["price"];
					$img1 = $row["img1"];
					$img2 = $row["img2"];
					$img3 = $row["img3"];
					$img4 = $row["img4"];
					$description = $row["description"];
					$product = new Product($this->index, $name, $price, $img1, $img2, $img3, $img4, $description);
					$this->products[$this->index] = $product;
					$this->index += 1;
				}
			}
		}
	}
	public function deleteProduct($name, $id = -1){
		include 'mysql.php';
		if($id == -1){
			$sql = "DELETE FROM products WHERE name = '".$name."';";
		}
		else{
			$sql = "DELETE FROM products WHERE id = '".$id."';";
		}
		if($conn->query($sql) != TRUE){
			echo "Error: ".$conn->error;
		}
	}

	public function getProducts(){
		return $this->products;
	}

}



?>