<?php
class DBController
{
    public $servername = "localhost";
    public $un = "root";
    public $password = "";
    public $DB = "web project";
    public $conn =null;
    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->un, $this->password, $this->DB);
        
        if(!$this->conn){
            die("Connection failed :". mysqli_connect_error());
        }
    }


}
?>