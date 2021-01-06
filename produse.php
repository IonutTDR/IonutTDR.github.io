<!DOCTYPE html>
<html>
<head>
	<title>Produse</title>
</head>
<body>
	<?php
	session_start();
	include "includes/mysql.php";
	include "includes/service.php";
	include "includes/servicePrd.php";

	$servicePrd = new servicePrd();
	$products = $servicePrd->get();

	for($index = 0; $index < count($products); $index++){
		echo '<a href="produs.php?prdName='.$products[$index]->getName().'"><img src = "uploads/'.$products[$index]->getImg1().'"></a>';
		$_SESSION[$products[$index]->getName()] = $products[$index]->getName();
	}


	?>
</body>
</html>