<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		.poze{
			padding: 10px;
			position: relative;
			background:black;
			color:white;
			width: 100% auto;
			min-height: 500px;
		}

		.right{
			font-size: 20px;
			cursor: pointer;
			position: absolute;
			bottom: 10px;
			left: 40px;
		}
		.left{
			font-size: 20px;
			cursor: pointer;
			position: absolute;
			bottom:10px;
			left:10px;
		}
		.cadru-poza{
			text-align: center;
			vertical-align: top;
			margin-right: 10px;
			display: inline-block;
			background-color: red;
			width:600px;
			height:400px;
		}
		.descriere{
			float:right;
			vertical-align: top;
			display: inline-block;
			width:800px;
			height:400px;
			background-color: green;
		}
		.cadru-poza img{
			margin-top: 30px;
			display: none;
			text-align: center;
		}
		.products{
			padding-top: 50px;
			background-color:#e4f9f5;
			width: 100%;
			height:720px auto;
		}


		.prd {
			text-align: center;
		  	display: inline-block; /* the default for span */
		  	width: 300px;
		  	height: 200px;
		  	padding: 10px;
		  	margin:10px;
		  	border: 3px solid #11999e;
		  	border-radius: 5px;  
		  	transition: 0.5s; 
		}

		.prd:hover{
			box-shadow: 0 0 40px  rgba(48, 227, 202, 0.6);
		}



		.prd-img{
			z-index: -1
			height:180px;
		}

		.prd img{
			opacity: 0.7;
			z-index: -1;
			width:290px;
			height:200px;
		}

		.prd-img p{
			float:left;
		}
		</style>
</head>
<body>
	<div class="poze">
		<div class="cadru-poza">
			<img src="images/download.jpg" id="1">
			<img src="images/img.jpg" id="2">	
		</div>
		<div class="descriere">
		</div>
		<span class="left" onclick="left()"><</span>
		<span class="right" onclick="right()">></span>
	</div>
	<div class = "products">
		<?php
		echo '<div class="prd" style="background-image: url(images/download.jpg);background-repeat: no-repeat;background-size: 100%;>
			<p style="opacity: 1;">Titlu</p>
		</div>';
		?>

	</div>
</body>
<script type="text/javascript">
	var index = 1;
	document.getElementById(index).style.display="inline";
	function right(){
		if(index == 2){
			document.getElementById(index).style.display="none";	
			index = 1;
			document.getElementById(index).style.display="inline";	
		}
		else{
			document.getElementById(index).style.display="none";	
			index ++;
			document.getElementById(index).style.display="inline";	
		}	
	}
	function left(){
		if(index == 1){
			document.getElementById(index).style.display="none";	
			index = 2;
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