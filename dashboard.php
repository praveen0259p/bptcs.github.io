<?php
session_start();
if(isset($_SESSION['uid']))
{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registraion using PHP OOPs Concept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assests/style.css" rel="stylesheet">
    <script src="assests/jquery-1.11.1.min.js"></script>
    <script src="assests/bootstrap.min.js"></script>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="" align="center">Welcome Back : <?php  echo  $_SESSION['uid'];?></legend>
    </div>
 
    <div class="control-group" align="center">
      <!-- Button -->
      <div class="controls">
        <a href="logout.php" class="btn btn-success" type="submit" name="signin">Logout</a>
      </div>
    </div>
 
  </fieldset>
</form>
<script type="text/javascript">
</script>
</body>
</html>
<?php }
else {
	header('location:index.php');
}
?>
