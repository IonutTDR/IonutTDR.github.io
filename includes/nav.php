
	<style type="text/css">
.menu{
	box-shadow: 0 20px 20px 0 rgba(64, 81, 78, 0.2), 0 20px 20px 0 rgba(64, 81, 78, 0.19);
	position:fixed;
	height: 60px;
	padding-top: 10px;
	padding-bottom: 10px;
	background-color: #006466;
	width:100% auto;
	right:0;
	left:0;
	z-index: 99;
	padding-left: 20px;
	padding-right: 20px;
	font-family: 'Arial';
}


.menu .logo{
	width: 30px;
	height: 20px;
}

.menu a{
	display: inline-block;
	text-decoration: none;
	color: white;
	margin-top: 20px;
	padding-right: 10px;
	padding-left: 10px;
	border-right: 2px solid white;
	vertical-align: middle;
	transition: 0.7s;
	font-weight: bold;
}

.menu a:hover{
	color:#e2afff;
	text-shadow:2px 2px 5px #11999e;
	font-weight: bold;
}
	</style>
	<div class="menu">
		<img src = "./images/logo.png" width="80px" height="70px" style="float:left; vertical-align: top;">
		<a href="index.php" style="float:left;">ACASA</a>
		<a href="index.php#products" style="float:left;">PRODUSE</a>
		<a href="index.php#about" style="float:left; border:none;">DESPRE</a>
		<?php 
			if($_SESSION['user'] == ""){
				echo '	<a href="login.php" style="float:right; border:none;">STAFF</a>';
			}
			elseif($_SESSION['user'] != ""){
				echo '<a href="logout.php" style="float:right;border:none;">LOG OUT</a>';
				echo '<a href="profile.php" style="float:right;">'.$_SESSION['user'].'</a>';
				if($_SESSION['level'] != 0){
					echo '<a href="add.php" style="float:left; border-left:2px solid white; border-right:none;">ADAUGA</a>';
				}
			}

		?>
		<a href="./cart.php" style="float:right;">COS: <span id = "cos"><?php echo $_SESSION['index'];?></span></a>
	</div>