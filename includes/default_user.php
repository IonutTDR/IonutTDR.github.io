<!DOCTYPE html>
<html>
<head>
	<title>Sertim Service</title>
	<link rel="stylesheet" type="text/css" href="./css/default_user_css.css">
	<meta name="viewport" content="width=device-width, initial-scale=0.3
	">
</head>
<body>
	<div class="up-button" id="up"></div>
	<div class="menu">
		<img src = "./images/logo.png" width="80px" height="70px" style="float:left; vertical-align: top;">
		<a href="#particles-js" style="float:left;">ACASA</a>
		<a href="#products" style="float:left;">PRODUSE</a>
		<a href="#about" style="float:left; border:none;">DESPRE</a>
		<?php 
			if($_SESSION['user'] == ""){
				echo '	<a href="login.php" style="float:right; border:none;">LOGIN</a>';
			}
			elseif($_SESSION['user'] != ""){
				echo '<a href="logout.php" style="float:right;border:none;">LOG OUT</a>';
				echo '<a href="profile.php" style="float:right;">'.$_SESSION['user'].'</a>';
				if($_SESSION['level'] != 0){
					echo '<a href="add.php" style="float:left; border-left:2px solid white; border-right:none;">ADAUGA</a>';
				}
			}

		?>
		<a href="./cart.php" style="float:right;">COS: <?php echo $_SESSION['index'];?></a>
	</div>
	<div id="particles-js"></div>
	<a href="#home" class="up-button" id="up"><img src="./images/up_arrow.png" width="36 px" height="36px"></a>
	<div class="products" id="products">
		<?php
			include "./includes/mysql.php";
			include "./includes/servicePrd.php";
			$servicePrd = new servicePrd();
			$products = $servicePrd->get();

			for($index = 0; $index < count($products); $index++){
				echo '<div class="prd" >
							<div class="prd-img"">
									<a href="produs.php?prdName='.$products[$index]->getName().'"><img src = "./uploads/'.$products[$index]->getImg1().'"></a>
									<hr style="color:#006466; background-color:#006466; margin-top:10px;margin-bottom:10px; border:1px solid #006466;border-radius:20px">
									<p style="color:#006466;font-size:20px; font-weight:bold;float:left;margin-left:5px;">'.strtoupper($products[$index]->getName()).'</p>
									<p style="color:#006466;display:inline-block; font-size:20px; font-weight:bold; float:right; margin-right:5px;">'.$products[$index]->getPrice().' lei</p>
							</div>

						</div>';
				$_SESSION[$products[$index]->getName()] = $products[$index]->getName();
			}
	?>
	</div>
</body>
<script type="text/javascript" src="./js/particles.js"></script>
<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript">
	var up = document.getElementById("up");

	function scrollFunction(){
		if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
			up.style.display = "block";
		}
		else{
			up.style.display = "none";
		}
	}

	up.onclick = function(){
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
</html>