<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<?php
	session_start();
	include 'includes/logoutauto.php';
	include 'includes/nav.php';
	include 'includes/servicePrd.php';
	$prd = new servicePrd();
	?>
	<div class="cadru">
		<table style="width: 100%;">
			<tr>
				<th style = "border-left:none;">Nume</th>
				<th>Cantitate</th>
				<th>Pret</th>
			</tr>
			<?php
				$_SESSION['suma_totala'] = 0;
				for($i = 1; $i <= count($_SESSION['cart']); $i++){
					$p = $prd->getProductByName($_SESSION['cart'][$i]);
					echo '	<tr>
								<td style = "border-left:0;" id="'.$p->getName().'">'.$p->getName().'</td>
								<td> <span  id="'.$p->getName().'1'.'">'.$_SESSION['cantitate'][$p->getName()].'</span> <a href="#" onclick=add("'.$p->getName().'") id="'.$p->getName().'+'.'" > + </a> <a href="#" onclick=del("'.$p->getName().'") id="'.$p->getName().'-'.'" > - </a></td>
								<td> <span id = "'.$p->getName().'2'.'">'.$p->getPrice()*$_SESSION['cantitate'][$p->getName()].'</span> lei</td>
							</tr>';
				$_SESSION['suma_totala'] += $p->getPrice()*$_SESSION['cantitate'][$p->getName()];

				}

			?>
			<tr>
				<td></td>
				<td></td>
				<td style = "border-left:none">Pret produse: <?php echo $_SESSION['suma_totala'];?> lei<br>
					Transport: 20.0 lei<br>
					Pret total: <?php echo $_SESSION['suma_totala'] + 20;?> lei<br>
				</td>
			</tr>
		</table>
		<a href="order.php" style="float: right; font-family: 'Arial';margin-top:10px; background-color: #006466;">Comanda</a>
	</div>
</body>

<script type="text/javascript">
		function add(id) {
		    var xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		      	var str = this.responseText.split(",");
		        document.getElementById(id + "1").innerHTML = str[0];
		        document.getElementById(id + "2").innerHTML = str[1];
		        document.getElementById("cos").innerHTML = str[2];
		      }
		    };
		    var prodName = document.getElementById(id).textContent;
		    xmlhttp.open("GET", "includes/addCantitate.php?q=" + prodName, true);
		    xmlhttp.send();
		 }
		 function del(id){
		 	var xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		      	var str = this.responseText.split(",");
		        document.getElementById(id + "1").innerHTML = str[0];
		        document.getElementById(id + "2").innerHTML = str[1];
		        document.getElementById("cos").innerHTML = str[2];
		      }
		    };
		    var pret = document.getElementById(id + "2").textContent;
		    var prodName = document.getElementById(id).textContent;
		    xmlhttp.open("GET", "includes/delCantitate.php?q=" + prodName + "," + pret, true);
		    xmlhttp.send();
		 }
</script>
</html>