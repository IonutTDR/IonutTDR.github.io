<?php
	session_start();
	include 'includes/mysql.php';
	$sql = "UPDATE conturi SET status = 0, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE email = '".$_SESSION['email']."';";
	if($conn->query($sql) != TRUE){
						echo "Error: ". $sql . " " . $conn->error;
					}
	session_destroy();

	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
?>