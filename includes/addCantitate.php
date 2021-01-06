<?php
	include 'servicePrd.php';
	$prd = new servicePrd();
	$p = $prd->getProductByName($_REQUEST['q']);
	session_start();
	$hint = $_SESSION['cantitate'][$_REQUEST['q']] + 1;
	$_SESSION['cantitate'][$_REQUEST['q']] += 1;
	$_SESSION['index'] += 1;
	$hint = $hint . "," . $p->getPrice()*$_SESSION['cantitate'][$_REQUEST['q']] . ','. $_SESSION['index'];
	echo $hint;
?>