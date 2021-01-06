<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET['prdName'];?></title>
	<meta name="viewport" content="width=device-width, initial-scale=0.0
	">
	<script type="text/javascript">
		function showHint() {
		    var xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		        document.getElementById("cos").innerHTML = this.responseText;
		      }
		    };
		    var prodName = document.getElementById("prodName").textContent;
		    xmlhttp.open("GET", "includes/getProduct.php?q=" + prodName, true);
		    xmlhttp.send();
		 }
	</script>
	<link rel="stylesheet" type="text/css" href="css/produs.css">
</head>
<body>

	<?php
	session_start();
	include "includes/logoutauto.php";
	include 'includes/servicePrd.php';
	$servicePrd = new servicePrd();
	$produs = $servicePrd->getProductByName($_GET['prdName']);

	if(!isset($_SESSION['index'])){
		$_SESSION['index'] = 0;
	}

	$img1 = $produs->getImg1();
	$img2 = $produs->getImg2();
	$img3 = $produs->getImg3();
	$img4 = $produs->getImg4();

	$poze = array();
	$index = 0;
	if(!empty($img1)){
		$poze[$index] = $img1;
		$index += 1;
	}
	if(!empty($img2)){
		$poze[$index] = $img2;
		$index += 1;
	}
	if(!empty($img3)){
		$poze[$index] = $img3;
		$index += 1;
	}
	if(!empty($img4)){
		$poze[$index] = $img4;
		$index += 1;
	}
	include 'includes/nav.php';
	?>
	<div class="poze">
		<div class="cadru-poza" id="cadru">
			<?php
				for($i = 0; $i < $index; $i++){
					echo '<img src="uploads/'.$poze[$i].'" id = "'.$i.'">';
				}

			?>
		</div>
		<div class="descriere">
			
			<div class = "descriere-header">
				<p id="prodName"><?php echo ($produs->getName());?></p>
			</div>
			
			<hr style="margin-left: 50px; margin-right: 50px;">
			
			<div class = "descriere-middle">
				<p style="margin-left: 50px;"><?php echo $produs->getDesc();?></p>
			</div>

			<hr style="margin-left: 50px; margin-right: 50px;">
			
			<div class = "descriere-bottom">
				<p style="margin-top:10px; margin-right: 50px; font-size:20px;">Pret: <?php echo $produs->getPrice();?> lei</p>
				<button onclick="showHint()" style="margin-top:10px;margin-right: 50px;">ADAUGA</button>
			</div>
		</div>
		<span class="left" onclick="left()" style="font-size: 250%;"><</span>
		<span class="right" onclick="right()"style="font-size: 250%;">></span>
	</div>
	

</body>
<script type="text/javascript">
	var index = 0;
	var c = document.getElementById("cadru").childElementCount;
	document.getElementById(index).style.display="inline";
	function right(){
		if(index == c - 1){
			document.getElementById(index).style.display="none";	
			index = 0;
			document.getElementById(index).style.display="inline";	
		}
		else{
			document.getElementById(index).style.display="none";	
			index ++;
			document.getElementById(index).style.display="inline";	
		}	
	}
	function left(){
		if(index == 0){
			document.getElementById(index).style.display="none";	
			index = c - 1;
			document.getElementById(index).style.display="inline";	
		}
		else{
			document.getElementById(index).style.display="none";	
			index--;
			document.getElementById(index).style.display="inline";	
		}
	}
</script>
</html>