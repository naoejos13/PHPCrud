 
<?php include("session.php") ?>
 <?php
 
$mysqli = mysqli_connect("localhost","root","") or die("Proble with connection!");
	
	 mysqli_select_db($mysqli,"testsite");
	 
	 $result = mysqli_query($mysqli,"SELECT * FROM users",0);
	 
	echo "<table width=\"90%\" align=center border=2>";
	echo "<tr><td width=\40%\" align=center bgcolor=\"FFFF00'\">ID</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">NAME</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">EMAIL</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">PASSWORD</td></tr>";
	 while($row = mysqli_fetch_array($result))
	 {
		 $id=$row['id'];
		 $name=$row['name'];
		 $email=$row['email'];
		 $password=$row['password'];
		 
		 echo "<tr><td align=center>$id</td><td>$name</td><td>$email</td><td>$password</td></tr>";
				  
    }
	echo "</table>";
 
 ?>
 
