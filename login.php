<?php
 include("session.php");

if($_POST)
{
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['password'] = md5(mysqli_real_escape_string($_POST['password']));

	if($_SESSION['name'] && $_SESSION['password'])
	{

	$mysqli = mysqli_connect("localhost","root","") or die("We couldn't connect!");
	mysqli_select_db($mysqli,"testsite");

	$query = mysqli_query($mysqli,"SELECT * from users WHERE name='".$_SESSION['name']."'");
	$numrows = mysqli_num_rows($query);

		if($numrows > 0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbname = $row['name'];
				$dbpw = $row['password'];
				
				if($_SESSION['name'] == $dbname){
					if($_SESSION['password'] == $dbpw)
					{
						if($_POST['remember']=='on')
						{
							$expire = time() + 86400;
							setcookie('testsite',$_POST['name'],$expire);
						}
						
						header("location: session.php");
						
					}else
					{
						echo "Your password is incorrect";
					}
				}else
				{
					echo "Your name doesnt exists!";
				}
			}
		}else
		{
			echo "This name is not registered!";
		}

	}else
	{
		echo "You have to type a name and password!";
	}

}else
{
	echo "Access Denied!";
	exit;
}
?>