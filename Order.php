<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web project";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);        
$sql = "DELETE FROM `cart` WHERE userID='".$_SESSION['ID']."'";
$result=mysqli_query($conn, $sql);
if (!$result) {

}else{
	header("Location:index.php");
}







?>