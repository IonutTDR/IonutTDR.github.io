<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php
			session_start();
			if(is_array($_FILES["fileToUpload"]["name"])){
				$imgs = array();
				$img[0] = ""; 
				$img[1] = ""; 
				$img[2] = ""; 
				$img[3] ="";
				$uploaded = 0;

				$count = count(array_filter($_FILES["fileToUpload"]["name"]));
				if($count > 3){
					echo'Poti adauga maxim 4 imagini';
				}
				else{
					for($index = 0; $index < $count; $index++){
	 					$filesArray = "";
						$target_dir = "uploads/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$index]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

						
						if(isset($_POST["add"])){
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$index]);
							if($check !== false){
								$uploadOk = 1;
							}
							else{
								echo "error 1";
								$uploadOk = 0;
							}
						}

						if(file_exists($target_file)){
							$uploadOk = 0;
							echo "error 2";
						}


						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
							$uploadOk = 0;
							echo "error 3";
						}

						if($uploadOk == 0){
							echo "Sorry, your file was not uploaded. <br>";
						}
						else{
							if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$index], $target_file)){
									$uploaded = 1;
								}
							
							else{
								echo "Sorry, there was an error uploading your file. <br>";
							}
						}
					}
					if($uploaded == 1){
						for($index = 0; $index < $count; $index++){
							$img[$index] = $_FILES["fileToUpload"]["name"][$index];
						}
						include "includes/servicePrd.php";
						$serviceProducts = new servicePrd();
						$serviceProducts->add($_POST["title"], floatval($_POST["price"]), $img[0], $img[1], $img[2], $img[3], $_POST["desc"]);
					}
				}

			}
			header('Location: index.php');

		?>

</body>
</html>