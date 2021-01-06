<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=0.5">
</head>
<body>
	<div class="box">
		<div class = "box-header">
			<p>LOGIN</p>
			<hr style="margin-right: 5px;margin-left: 5px;margin-top: 30px">
		</div>
		<div class = "box-form">
			<form action="index.php" method="post">
				<input type="email" name="email" placeholder="Email"><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<input type="submit" name="loginSubmit" value="Login">
			</form>
		</div>
	</div>
</body>
</html>