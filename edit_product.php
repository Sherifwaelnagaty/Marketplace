<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	

$product_id=$_GET["id"];

$sql='SELECT * FROM products WHERE productID="'.$product_id.'" ';
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

		
if(isset($_POST['OK'])){
	//$product_id=$_POST['product_id'];
	$product_name=$_POST['product_name'];
	$product_type=$_POST['product_type'];
	$product_price=$_POST['product_price'];
	$product_image=$_POST['product_image'];
	if(empty($product_name))
	{
		echo"please enter product name";
	}
	else if(empty($product_type))
	{
		echo"please enter product type";
	}
	else if(empty($product_price))
	{
		echo"please enter product price";
	}
	else if(empty($product_image))
	{
		echo"please enter product image";
	}
	else
	{
		$sql="UPDATE products SET 
        product_name='".$product_name."',
        product_type='".$product_type."',
        product_price='".$product_price."',
        product_image= img/'".$product_image."'
         where productID='".$_GET['id']."'";
	$result=mysqli_query($conn,$sql);
	if($result){
		header("Location:shopping-cart.php");
	}else
	Die("Error Found");
	}
}	
 function customError($errno, $errstr) {
      echo "<b>Error:</b> [$errno] $errstr"
}
     set_error_handler("customError");
                            
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #7fad39;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<div class="container">
<form action="" method="POST">
  <div class="container">
    <h1>Edit Product</h1>
    <hr>

    <label for="product_name"><b>Product name</b></label>
    <input type="text" name="product_name" id="product_name" 
	value='<?php echo $row['product_name'];?>' required>

    <label for="product_type"><b>Product Type</b></label>
    <input type="text" name="product_type" id="product_type" 
	value='<?php echo $row['product_type'];?>'required>

    <label for="product_price"><b>product_price</b></label>
    <input type="text" name="product_price" id="product_price" 
	value='<?php echo $row['product_price'];?>' required>

	<label for="product_image"><b>product_image</b></label>
    <input type="file" name="product_image" id="product_image" 
	value='<?php echo $row['product_image'];?>' required>
    <hr>

    <button type="submit" class="registerbtn" name="OK">Update</button>
  </div>
  
  
</form>
</div>
</body>
</html>


