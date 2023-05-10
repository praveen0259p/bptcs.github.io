<?php
include_once('database.php');
$taskerror="";

if (isset($_POST['submit'])) {
    
    $task =$_POST['task'];
    if(empty($task))
    {
	  $taskerror="Please Enter Something";
    }
    else 
    {
	  $sql="INSERT INTO `todolist`(`task`) VALUES ('".$task."')";
	 $result=mysqli_query($conn,$sql);
	 if ($result) {
	    // echo "todos created successfully";
	 } else {
	     echo "todos not created successfully";
	 }
   }
   
}
$gettask="SELECT * FROM `todolist` ORDER BY sno DESC";
$resulttask=mysqli_query($conn,$gettask);

if (isset($_GET['del_task'])) {
    $sno=$_GET['del_task'];
    mysqli_query($conn,"DELETE FROM todolist WHERE sno=$sno");
    header('location:todos.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style type="text/css">
	  .error{
		color: #ff0000;
	  }
	  .blue{
	  	color: #32b1f0 ;
	  }
	  #to-do-list{
		width: 100%;
		height: 100%;
		border:2px solid black;
		padding: 5px;
	  }
	  .heading{
		border:2px solid black;
	  }
	  table{
		width: 100%;
		margin: 30px auto;
		border-collapse: collapse;
	  }
	  tr{
		border-bottom: 1px solid #cbcbcb;
	  }
	  th{
		font-size: 20px;
		color: #668cff;
	  }
	  th,td{
		border:none;
		height: 30px;
		padding: 2px;
		width: 60%;
	  }
	  
    </style>
</head>
<body>

<div class="container my-5">
  <div class="row">
    <div class="col-sm-6">
	 <div class="heading"> <h2>PHP To Do List</h2></div>
		<form method="post" action="">    
		    <p class="error"><?php echo $taskerror ?></p>
		    <div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="Enter Something..." name="task" value="">
			<button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
		    </div>
		    <div id="to-do-list">
			  <table>
				<thead>
				    <tr>
					  <th>TODOS</th>
					  <th>DELETE</th>
					  <th>EDIT</th>
				    </tr>
				</thead>
				<tbody>
				    <?php while ($row = $resulttask->fetch_array()) {?>
				    <tr>
					 
					  <td><?php echo $row['task'];?></td>
					  <td>
					  	<a href="todos.php?del_task=<?php echo $row['sno']; ?>"><i class="fa fa-trash error" aria-hidden="true"></i>
						</a>
					  </td>
					  <td>
					  	<a href="todos.php?update_task=<?php echo $row['sno']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					  </td>
				    </tr>
				    <?php } ?>
				</tbody>
			  </table>
		    </div>
		</form>  
    </div>
     <div class="col-sm-6">
     </div>
  </div>
</div>
</body>
</html>