<?php
session_start();
if(!isset($_SESSION['index'])){
	$_SESSION['index'] = 0;
	$_SESSION['cart'] = array();
}

$_SESSION['user'] = "";
include "includes/logoutauto.php";
include "includes/service.php";
$service = new Service();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	include "includes/mysql.php";
	
	if(isset($_POST['registerSubmit'])){

		if($_POST['pass'] == $_POST['confirmPass']){
			//Verify if email is already existing
			$sql = "SELECT id FROM conturi WHERE email = '".$_POST['email']."';";
			$result = $conn->query($sql);

			if($result->num_rows != 0){
				echo '<script>window.alert("This user already exists!");</script>';
			}
			else{
				$service->addUser($_POST["fname"], $_POST["lname"], $_POST["pass"], $_POST['email'], 0, 0, $_SERVER['REMOTE_ADDR']);
				
			}
		}
		else{
			echo '<script>window.alert("TRY AGAIN");</script>';
		}
	}
	elseif (isset($_POST['loginSubmit'])) {
		include "includes/mysql.php";
		$sql1 = "SELECT id, prenume, nume, parola, email FROM conturi WHERE email ='".$_POST['email']."'; ";
		$result1 = $conn->query($sql1);
		if($result1->num_rows == 0 ){
			echo '<script>window.alert("Try again!");</script>';
			
		}
		else{
			while($row = $result1->fetch_assoc()){
				if($row["parola"] == $_POST["pass"]){
					$_SESSION['user'] = $row['nume'];
					$_SESSION['pass'] = $_POST['pass'];
					$user = $service->getUserByEmail($_POST['email']);
					$_SESSION['email'] = $_POST['email'];
					$sql = "UPDATE conturi SET status = 1, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE email = '".$_SESSION['email']."';";
					if($conn->query($sql) != TRUE){
						echo "Error: ". $sql . " " . $conn->error;
					}
					$_SESSION['level'] = $user->getLevel();

				}
				else{
					echo '<script>window.alert("Try again!");</script>';
				}
			}
		}
	}
}
else{
	$ip = $_SERVER['REMOTE_ADDR'];
	include 'includes/mysql.php';
	$sql = "SELECT id, nume, parola, email, status, level FROM conturi WHERE ip = '".$ip."' AND status = 1;";
	$result1 = $conn->query($sql);
	if($conn->query($sql) != TRUE){
		echo "Error: ". $sql . " " . $conn->error;
	}
	while($row = $result1->fetch_assoc()){
		$_SESSION['user'] = $row['nume'];
		$_SESSION['pass'] = $row['parola'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['level'] = $row['level'];
	}
}
include 'includes/default_user.php';

?>
