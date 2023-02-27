 
 <?php
 include("session.php");
 if(!isset($_SESSION['name']))
 {
	 echo "Access Denied!";
	 exit;
 }


 echo "<h3>Choose an ID to Delete:</h3><p>";
$mysqli = mysqli_connect("localhost","root","") or die("Proble with connection!");
 mysqli_select_db($mysqli,"testsite");
	 
$per_page = 5;
$tmpPages = mysqli_query($mysqli,"SELECT COUNT('id') FROM users") ;
$pages = mysqli_fetch_array($tmpPages) ;
$pages = ceil($pages[0] / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page']: 1;
$start = ($page - 1) * $per_page ;
$result = mysqli_query($mysqli,"SELECT * FROM users LIMIT $start, $per_page",0);
	 
//	 $result = mysqli_query($mysqli,"SELECT * FROM users",0);
	 
	echo "<table width=\"90%\" align=center border=2>";
	echo "<tr><td width=\40%\" align=center bgcolor=\"FFFF00'\">ID</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">NAME</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">EMAIL</td><td width=\40%\" align=center bgcolor=\"FFFF00'\">PASSWORD</td></tr>";
	 while($row = mysqli_fetch_assoc($result))
	 {
		 $id=$row['id'];
		 $name=$row['name'];
		 $email=$row['email'];
		 $password=$row['password'];
		 
		 echo "<tr><td align=center><a href=\"delete1.php?ids=$id&names=$name&emails=$email&passwords=$password\">$id</a></td><td>$name</td><td>$email</td><td>$password</td></tr>";

	 }
	echo "</table>";
	
mysqli_close($mysqli);

echo '<center><div>';
$prev = $page - 1;
$next = $page + 1;
if($page > 1)
{
echo "<a href='?page=$prev'>Prev</a> " ;	
}


if($pages >=1 )
{
	for($x=1;$x<=$pages;$x++)
	{
		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ' ;
		//echo '<a href="?page='.$x.'">'.$x.'</a> ';
	}

}
if($page < $pages)
{
	echo "<a href='?page=$next'>Next</a> " ;
}
echo '</div></center>';
 ?>
 
 
