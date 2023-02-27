<?php

     $mysqli = mysqli_connect("localhost","root","") or die("Proble with connection!");
	
	 mysqli_select_db($mysqli,"testsite");
	 
	 $result = mysqli_query($mysqli,"DELETE FROM users WHERE id='".$_REQUEST['id']."'",0);
	 
	echo "The user has been deleted successfully!";
	
	mysqli_close($mysqli);
	header('Refresh:1; url=delete.php');
?>