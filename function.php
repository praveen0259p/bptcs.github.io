<?php
class Db
{

	function __construct()
	{
		define('DB_SERVER','localhost');
		define('DB_USER','root');
		define('DB_PASS' ,'');
		define('DB_NAME', 'oops');
		
		$con=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		$this->db=$con;
		if(mysqli_connect_error())
		{
			die("connnection error:".mysqli_connect_error());
			
		}
	}
	public function checkLoginCredentials($uname,$pass)
	{

		$sql="SELECT * FROM `user_credentials` WHERE `username`='".$uname."' AND `password`='".$pass."' ";
		return $result=mysqli_query($this->db,$sql);

	}
	
}
?>