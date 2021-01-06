<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include 'includes/logoutauto.php';
	include 'includes/orderService.php';
	include 'includes/servicePrd.php';
	$orderService = new orderService();
	$orders = $orderService->get();
	$_SESSION['order_id'] = count($orders);
	$_SESSION['order_productsId'] = "";
	$_SESSION['order_totalPrice'] = 0.0;
	$productService = new servicePrd();
	for($index = 1; $index < count($_SESSION['cart']); $index ++){
		$product = $productService->getProductByName($_SESSION['cart'][$index]);
		if(is_object($product)){
			$_SESSION['order_productsId'] .= strval($product->getId()).",";
			$_SESSION['order_totalPrice'] += $product->getPrice();
		}
	}
	$_SESSION['phoneNo'] = $_POST['phoneNo'];
	$_SESSION['order_adress'] = $_POST['adress'] . ", " . $_POST['region'] . ", " . $_POST['city'];
	$orderService->add($_SESSION['order_productsId'], $_SESSION['order_adress'], $_SESSION['order_totalPrice'], 0, $_POST['email']);

?>
<p>DATE...</p>
Comanda facuta cu succes 
</body>
</html>
