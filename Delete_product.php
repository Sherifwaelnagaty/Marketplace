<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web project";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);        
$sql = "DELETE FROM products WHERE productID='".$_GET['id']."'";
$result=mysqli_query($conn, $sql);
if (!$result) {

}else{
	header("Location:index.php");
}
?>
