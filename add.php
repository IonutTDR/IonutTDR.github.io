<!DOCTYPE html>
<html>
<head>
	<title>Adauga</title>
</head>	
<body>
	<?php session_start()?>
	<form action = "upload.php" method="post" enctype="multipart/form-data" >
		<label>Title</label>
		<input type="text" name="title"><br>
		<label>Price</label>
		<input type="text" name="price"><br>
		<label>Description</label>
		<textarea name="desc" rows="10" cols="40"></textarea><br>
		<label>Images</label>
		<input type="file" name="fileToUpload[]" multiple><br>
		<input type="submit" name="add" value="Add"><br>
	</form>
</body>
</html>