
	<?php
		session_start();
		$hint = $_SESSION['index'] + 1;
		$_SESSION['index'] += 1; 
		if(!isset($_SESSION['cantitate'][$_REQUEST['q']])){
			$_SESSION['cantitate'][$_REQUEST['q']] = 0;
		}
		if($_SESSION['cantitate'][$_REQUEST['q']] == 0){
			$_SESSION['cart'][count($_SESSION['cart']) + 1] = $_REQUEST["q"];
		}
		$_SESSION['cantitate'][$_REQUEST['q']] += 1;
		
		echo $hint;
	?>