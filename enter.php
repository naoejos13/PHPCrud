<?php


if(isset($_SESSION['name'] )|| isset($_COOKIE['testsite']))
{
	include('session.php');
}
else
{
	echo "not allowed";
}

?>