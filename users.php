<?php 

class users
{
	public $Types;
	public $ID;
	public $FirstName;
	public $LastName;
	public $Address;
	public $Email;
	public $MobileNumber;
	public $Password;
	public $Gender;
	public $Birthdate;
	public $Profile_Picture;
	public $db=null;

	public function __construct(DBController $db)
	{
		if (!isset($db->conn))
			return null;
		else
        $this->db = $db;
	}
	public function Login($Email,$password){
		
		$sql="SELECT * FROM users where Email='".$Email."'and Password='".$password."'";
		$result = mysqli_query($this->db->conn,$sql);		
		if($row=mysqli_fetch_array($result))	
		{

		$_SESSION["ID"]=$row[0];
		$_SESSION["FirstName"]=$row[1];
		$_SESSION["LastName"]=$row[2];
		$_SESSION["Types"]=$row[3];
		$_SESSION["Address"]=$row[4];
		$_SESSION["Email"]=$row[5];
		$_SESSION["MobileNumber"]=$row[6];
		$_SESSION["Password"]=$row[7];
		$_SESSION["Gender"]=$row[8];
		$_SESSION["Birthdate"]=$row[9];
		$_SESSION["Pic"]=$row[10];
		}else{
			die("Error Found");
		}
	}
	public function Register($FirstName,$LastName,$Address,$Email,$MobileNumber,$Password,$Birthdate,$Profile_Picture)
	{
		
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$Address=$_POST['Address'];
		$Email=$_POST['Email'];
		$Types="Customer";
		$MobileNumber=$_POST['MobileNumber'];
		$Password=$_POST['Password'];
		$Birthdate=$_POST['Birthdate'];
		$dir="img/";
		$Profile_Picture=$dir.$_FILES['Pic']['name'];
		move_uploaded_file($_FILES['Pic']['tmp_name'],$Profile_Picture);

		$sql="INSERT INTO users (FirstName, LastName, Address,Types, Email , MobileNumber , Password, Birthdate, ProfilePicture ) VALUES ('$FirstName','$LastName','$Address','$Types','$Email','$MobileNumber','$Password','$Birthdate','$Profile_Picture')";
			
		if($this->db->conn->query($sql)===TRUE){
		}else{
			Die("Invalid Email or Password");	
		}

	}
	public function Edit_Customer($FirstName,$LastName,$Address,$Email,$MobileNumber,$Password)
	{
		$dir="img/";
		$Profile_Picture=$dir.$_FILES['Pic']['name'];
		move_uploaded_file($_FILES['Pic']['tmp_name'],$Profile_Picture);
		
		$query="UPDATE users SET FirstName='".$FirstName."',LastName='".$LastName."',Address='".$Address."',Email='".$Email."',MobileNumber='".$MobileNumber."',Password='".$Password."',Profile_Picture='".$Profile_Picture."' where FirstName='".$_SESSION["FirstName"]."' and LastName='".$_SESSION["LastName"]."'and Address='".$_SESSION["Address"]."'and Email='".$_SESSION["Email"]."'and MobileNumber='".$_SESSION["MobileNumber"]."'and Password='".$_SESSION["Password"]."'and Profile_Picture='".$_SESSION["Pic"]["name"]."'and userID='".$_SESSION["ID"]."'";

		$result=$this->db->conn->query($query);
				if(!$result){
					die("Error Found");
				}
				else{
					$_SESSION["FirstName"]=$FirstName;
					$_SESSION["LastName"]=$LastName;
					$_SESSION["Address"]=$Address;
					$_SESSION["Email"]=$Email;
					$_SESSION["MobileNumber"]=$MobileNumber;
					$_SESSION["Password"]=$Password;
					$_SESSION["Pic"]=$Profile_Picture;	

				}
	}
	public function Delete_user($ID)
	{

		$sql="delete from users where ID ='".$ID."'";
		$result=mysqli_query($this->db->conn,$sql);
		if(!$result){
			die("Error Found");
		}
	
	}
}
?>
