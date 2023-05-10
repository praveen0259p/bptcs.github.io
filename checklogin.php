<?php
class CheckLogin 
{
	
	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";
	}
	function logindata()
	{
		
	}
}
$name=$_POST['name'];
echo $name;
$CheckLogin =new CheckLogin();

?>