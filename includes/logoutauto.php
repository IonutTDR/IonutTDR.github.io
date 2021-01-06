<?php

//if user is inactive for 10 mins he will be logged out automatically
if(isset($_SESSION['timestamp']) && $_SESSION['user'] != ""){
	if(time() - $_SESSION['timestamp'] > 600){
		header('Location: ./logout.php');
		exit;
	}
	else{
		$_SESSION['timestamp'] = time();
	}
}
else{
	$_SESSION['timestamp'] = time();
}

?>