<?php

//Connect to a mysql database

$Servername = "localhost";
$Username = "root";
$Password = "";
$Dbname = "forum";

//Create connection
$conn = new mysqli($Servername, $Username, $Password, $Dbname);

//Check connection

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

//done

?>