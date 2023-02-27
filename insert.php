<?php

$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$type = $_FILES['upload']['type'];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassw = $_POST['cpassword'];

if($name && $email && $password && $cpassw)
{
	if(strlen($password) > 3  )
	{
	  if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email))
		 {  
			if($password==$cpassw)
			{	
			 $mysqli = mysqli_connect("localhost","root","") or die("We couldn't connect!");
			
			 mysqli_select_db($mysqli,"testsite");
			 
			 $username = mysqli_query($mysqli,"SELECT name FROM users where name='$name'");
			 $count = mysqli_num_rows($username);
			 $remail = mysqli_query($mysqli,"SELECT email FROM users where email='$email'");
			// $checkemail = mysqli_num_rows($remail);
			 
			 if(mysqli_num_rows($remail) > 0)
			 {
				 echo "This email is already registered! Please type another email.";
			 }else
			 {		
				 if($count >0 )
				 {
					 echo "This name is already registered! Please type another name";
					// die("Name already exists! Please type another name");
				 }else
				 {
					 if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp") )
					 {
						 $directory = "./profiles/$name/images/";
						 mkdir($directory,0777,true);
						 
						 if(move_uploaded_file($temp,$directory.$mypic))
						 {
							 echo "<img border='1' width='70' height='70' src='".$directory.$mypic."'>";
							$passwordmd5 = md5($password);
							mysqli_query($mysqli,"INSERT INTO users(name,email,password) VALUES('$name','$email','$passwordmd5') ",0);
				
							$registered = mysqli_affected_rows($mysqli);
				
							echo "You have successfully registered!";
						 }else{
							 echo "not uploaded<br/>";
							
						 }
						

					 }else
					 {
						 echo "This is file has to be a jpeg, jpg, or bmp!";
					 }
					 

				 }
			 }
			mysqli_close($mysqli);
			
			}else
			{
				echo "Password do not match!";
			}
		}else
		{
			echo "Please type a valid email!";
		}
	}else
	{
		echo "Your password is too short! You need to type a password between 4 and 20 characters";
	}
}else
{
	echo "You have to complete the form!";
}

?>