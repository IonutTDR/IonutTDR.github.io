<?php
	session_start();
	$req = explode(",", $_REQUEST['q']);//[0] - name, [1] - pret
	include 'servicePrd.php';
	$prd = new servicePrd();
	$p = $prd->getProductByName($req[0]);
	$hint = $_SESSION['cantitate'][$req[0]] - 1;
	$_SESSION['cantitate'][$req[0]] -= 1;
	$_SESSION['index'] -= 1;
	$suma = floatval($req[1]) - $p->getPrice();
	$hint = $hint . "," . $suma . "," . $_SESSION['index'];
	echo $hint;
?>