<!DOCTYPE HTML>  
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php session_start();
if (isset($_SESSION['uid'])) {
	header('location:dashboard.php');
}
else
{
include_once("function.php");
$checklogin=new Db();
$usernameerror='';
$passworderror='';
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	if (empty($username) && empty($password)) {
		$usernameerror="Username is required";
		$passworderror="Passowrd is required";
	}
	else
	{
		$result=$checklogin->checkLoginCredentials($username,$password);
		$num=mysqli_fetch_array($result);
		if($num >0) {
			$_SESSION['uid']=$num['username'];
			header('location:dashboard.php');
		} else {
			echo "<script>alert('wrong user Credentials')</script>";
		}
		
	}
	
}
?>
<div class="wrapper fadeInDown">
		<div id="formContent">
				<!-- Login Form -->
				<form method="POST" action="">
						<input type="text" id="username" class="fadeIn second" name="username" placeholder="login">
						<span class="error"><?php echo $usernameerror ?></span>
						<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
						<span class="error"><?php echo $passworderror ?></span><br>
						<input type="submit" class="fadeIn fourth" value="Submit" name="submit">
				</form>

				<!-- Remind Passowrd -->
				<div id="formFooter">
						<a class="underlineHover" href="#">Forgot Password?</a>
				</div>

		</div>
</div>
<?php
}?>


