<?php

$date = date('F d, Y g:i:s A' );
echo "Today is ".$date."<br />";
session_start();
if(isset($_SESSION['name'] )|| isset($_COOKIE['testsite']))
{
if(!isset($_SESSION['name']) && isset($_COOKIE['testsite']))
{
	$_SESSION['name'] = $_COOKIE['testsite'];
	echo "not a session!";
	
}

	$dir = "profiles/".$_SESSION['name']."/images/";
	$open = opendir($dir);
	
	while(($files = readdir($open)) != FALSE)
	{
		if($files!="."&&$files!=".."&&$files!="Thumbs.db")
		{
			echo "<img border='1' width='50' height='50' src='$dir/$files'>";
		}
	}
	echo "<br/><b>".$_SESSION['name']."'s session</b><br /><a href='logout.php'>Logout</a><hr />";

include('links.php');
}else
{
	echo "Access denied!";
}

?>