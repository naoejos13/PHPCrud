<?php
include('session.php');
if(!isset($_POST['submit']))
{
	echo "Not allowed!";
	exit;
}
include('links.php');

$mypic = $_FILES['newupload']['name'];
$temp = $_FILES['newupload']['tmp_name'];
$type = $_FILES['newupload']['type'];

$id = $_REQUEST['id'];
$newname = $_REQUEST['newname'];
$newemail = $_REQUEST['newemail'];
$newpassword = $_REQUEST['newpassword'];

if($newname && $newemail && $newpassword)
{
	if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email))
	{
		
	}else
	{
		echo "Please type a valid email!";
	}
}else
{
	echo "Please complete the form!";
}

if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp"))
{
	if(($newname || $newemail) != "")
	{
		$mysqli = mysqli_connect("localhost","root","") or die("We couldn't connect!");
		mysqli_select_db($mysqli,"testsite");

		mysqli_query($mysqli,"UPDATE users set name='$newname',email='$newemail' WHERE id='$id'",0);

		echo "Your values have been updated successfully";

	}else
	{
		echo "You have to type name and email";
	}
	
	if($newpassword != "")
	{
		$md5 = md5($newpassword);
		mysqli_query($mysqli,"UPDATE users set password='$md5' WHERE id='$id'",0);
	}
	if(($_SESSION['name']) != $newname)
	{
		$dir = "profiles/".$_SESSION['name']."/images";
		$files = 0;
		$handle = opendir($dir);
		$oldDir = realpath(dirname(__FILE__))."/profiles/".$_SESSION['name'];
		$newDir = realpath(dirname(__FILE__))."/profiles/".$newname;

		while(($file = readdir($handle)) != FALSE )
		{
			if($file!="."&&$file!=".."&&$file!="Thumbs.db")
			{
				unlink($dir."/".$file);
				$files++;
			}
			
		}
	
		closedir($handle);
		sleep(1);
		
		xcopy($oldDir,$newDir);
		
		move_uploaded_file($temp,$newDir."/images/$mypic");
		
		deleteDir($oldDir);
		echo "Pictures updated!";
		
		header("Refresh:2; url=logout.php");
	}
	
	mysqli_close($mysqli);
}else
{
	echo "Please load a valid jpeg,jpg or bmp file!";
}

function xcopy($source, $dest, $permissions = 0755)
{
    $sourceHash = hashDirectory($source);
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        if($sourceHash != hashDirectory($source."/".$entry)){
             xcopy("$source/$entry", "$dest/$entry", $permissions);
        }
    }

    // Clean up
    $dir->close();
    return true;
}

function hashDirectory($directory){
    if (! is_dir($directory)){ return false; }

    $files = array();
    $dir = dir($directory);

    while (false !== ($file = $dir->read())){
        if ($file != '.' and $file != '..') {
            if (is_dir($directory . '/' . $file)) { $files[] = hashDirectory($directory . '/' . $file); }
            else { $files[] = md5_file($directory . '/' . $file); }
        }
    }

    $dir->close();

    return md5(implode('', $files));
}

 function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
?>