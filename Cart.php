<?php 
class Cart{
	
	public $servername = "localhost";
    public $un = "root";
    public $password = "";
    public $DB = "web project";
	public $db=null;
    
    public function __construct(DBController $db)
    {
		if (!isset($db->conn))
			return null;
		else
        $this->db = $db;
    }
 	public function Totalprice($UsersID){
 		$sql="SELECT products.product_price,cart.productQuantity FROM products,cart WHERE cart.productID=products.productID AND cart.userID='".$UsersID."'";
 		
 		$result =$this->db->conn->query($sql);
		$sum=0;
		while($row = mysqli_fetch_array($result)){
			$sum+=$row["product_price"]*$row["productQuantity"];
		}
	return $sum;
	}
	public function Quantity($UsersID){
		
		$sql="SELECT cart.productQuantity FROM cart WHERE cart.userID='".$UsersID."'";
 		
 		$result =$this->db->conn->query($sql);
		$sum=0;
		while($row = mysqli_fetch_array($result)){
			$sum+=$row["productQuantity"];
		}
	return $sum;
	}
}
?> 