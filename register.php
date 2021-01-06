<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<?php
	include "includes/logoutauto.php";
	?>
	<div class = "box">
		<div class = "box-header">
			<p>REGISTER</p>
			<hr style="margin-right: 5px;margin-left: 5px;margin-top: 30px">
		</div>
		<div class = "box-form">
			<form action="index.php" method="post">
				<input type="text" name="lname" placeholder="Nume">
				<input type="text" name="fname" placeholder="Prenume">
				<input type="email" name="email" placeholder="Email"><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<input type="password" name="confirmPass" placeholder="Confirm password"><br>
				<input type="submit" name="registerSubmit" value="Register">
			</form>
		</div>
	</div>
</body>
</html>