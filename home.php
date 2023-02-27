<?php
$time = time();
$date = date('F d, Y g:i:s A' );
echo $date;

if(isset($_COOKIE['testsite'] ))
{
	header('Location:session.php');
}else
{
echo "
	<html>

	<head>
	</head>

	<body> 

	<h1><center>Welcome to CRUD control center </center></h1>

	<center><?php include('links.php') ?></center>

	<p>
	<center>Please login...</center>
	<p>
	<center><form method='post' action='login.php'>
	<table border = '1' width = '30%'>
	<tr><td  >Name: </td><td ><input type='text' name='name' maxlength='20' /></td></tr>
	<tr><td >Password:</td><td><input type='password' name='password' maxlength='20'/></td></tr>
	<tr><td >Remember me?:</td><td><input type='checkbox' name='remember' /></td></tr>
	</td></tr>
	</table>
	<p>

	<input type='submit' name='submit' value='Login' /><br />

	</form>
	<a href='form.php'>Register?</a>
	</center>
	</body>

	</html>";
}
?>