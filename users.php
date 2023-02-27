

<?php

include("session.php");
if(!isset($_SESSION['name']))
{
	echo"Access Denied!";
	exit;
}else
{
	echo "<hr/>";
	include("links.php");
}





?>


