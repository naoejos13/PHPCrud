  <h1><center>Welcome to CRUD control center </center></h1>
<center><?php include("links.php") ?></center>
 <?php
 
$mysqli = mysqli_connect("localhost","root","") or die("Proble with connection!");
mysqli_select_db($mysqli,"testsite");
	 
$per_page = 5;
$tmpPages = mysqli_query($mysqli,"SELECT COUNT('id') FROM users") ;
$pages = mysqli_fetch_array($tmpPages) ;
$pages = ceil($pages[0] / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page']: 1;
$start = ($page - 1) * $per_page ;
$result = mysqli_query($mysqli,"SELECT name FROM users LIMIT $start, $per_page",0);


while($row = mysqli_fetch_array($result))
{
	echo $row['name'].'<br />';
}

$prev = $page - 1;
$next = $page + 1;
if($page > 1)
{
echo "<a href='pagination.php?page=$prev'>Prev</a> " ;	
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
	echo "<a href='pagination.php?page=$next'>Next</a> " ;
}
 
 ?>
 
