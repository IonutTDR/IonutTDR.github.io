<?php

include 'comanda.php';

class orderRepo{
	private $orders;
	private $index;

	public function __construct(){
		$this->orders = array();
		$this->index = 0;
	}

	public function __destruct(){}

	public function addOrder($products, $adress, $totalPrice, $user, $email){
		include 'mysql.php';
		$sql = "INSERT INTO orders (idOrder, productsId, adress, totalPrice, user, email) VALUES ('".$this->index."', '".$products."', '".$adress."', '".$totalPrice."', '".$user."', '".$email."');";
		if($conn->query($sql) != TRUE){
			echo "ERROR: ". $conn->error;
		}
		else{
			$order = new Order($this->index, $products, $adress, $totalPrice, $user, $email);
			$this->orders[$this->index] = $order;
			$this->index += 1;
		}
	}

	public function readDb(){
		include 'mysql.php';
		$sql = "SELECT idOrder, productsId, adress, totalPrice, user, email FROM orders;";
		$result = $conn->query($sql);
		$this->index = 0;
		if($result->num_rows > 0){
			while($row == $result->fetch_assoc()){
				$order = new Order($this->index, $row["productsId"], $row["adress"], $row["totalPrice"], $row["user"], $row["email"]);
				$this->orders[$this->index] = $order;
				$this->index += 1;
			}
		}
		
	}

	public function getOrders(){
		return $this->orders;
	}
}






?>