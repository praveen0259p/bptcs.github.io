<?php
 $num1=50;
 $num2=1000;
 $even =array();
 $odd=array();
 for($i=$num1;$i<=$num2;$i++ )
 	if($i%2==0)
 	{
 		/*echo "This number is even number";
 		echo "<br></br>";*/
 		array_push($even,$i);
 	}
 	else{
 		/*echo "This number is odd number";
 		echo "<br></br>";*/
 		array_push($odd,$i);
 	}
 	echo "total odd number is:";
 	echo "<pre>";
 	print_r($odd);
 	echo "</pre>";
?>