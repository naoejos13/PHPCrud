<html>
<head>

<?php
include("session.php");
if(!isset($_SESSION['name']))
 {
	 echo "Access Denied!";
	 exit;
 }

?>

</head>

<body>

<center>
<form method="GET" action="search.php" >

<input type="text" name="search">
<input type="submit" name="submit" value="Search Database">

</form></center>
<hr />
<u>Results:</u>&nbsp
<?php


if(isset($_REQUEST['submit']))
{
	$search = $_GET['search'];
	$terms = explode(" ",$search);
	$query = "SELECT * FROM users WHERE ";
	
	$i=0;
	foreach($terms as $each)
	{
		$i++;
		if($i==1)
		{
			$query .= " name LIKE '%$each%' ";
		}else
		{
			$query .= " OR name LIKE '%$each%' ";
		}
	}

	 $mysqli = mysqli_connect("localhost","root","") or die("We couldn't connect!");
		
	 mysqli_select_db($mysqli,"testsite");
		 
	 $results = mysqli_query($mysqli,$query);
	 $num = mysqli_num_rows($results);
	  echo $num." result(s) found for ".$_GET['search'] ;
	 if($num > 0 && $search !="")
	 {
		 while($row = mysqli_fetch_assoc($results))
		 {
			 $id = $row['id'];
			 $name = $row['name'];
			 $email = $row['email'];
			 $password = $row['password'];
			 
			 echo "<h3>$name</h3><br />$email<br />";
		 }
	 }else
	 {
		 echo "<center>No results found!</center>";
	 }
	
	mysqli_close($mysqli);
}else
{
	echo "<center>Please type anyword...</center>";
}

?>

</body>
</html>