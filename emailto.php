<form method="post" action="">
<table border="0" width="25%">
<tr>
<td width="10">TO:</td>
<td><input type="text" name="to" size="20" value="<?php echo $_REQUEST['emails']; ?>"></td></tr>
<tr>
<td width="10">Subject:</td><td><input type="text" name="subject" size="20"></td>
</tr>
<tr >
<td width="10" >Message: </td>
<td width="10" ><textarea name="message" cols="30" rows="3" ></textarea></td>
</tr>
</table>
<p>
<input type="submit" name="submit" value="Send Email"></p>

</form>

<?php
if(isset($_REQUEST['submit']))
{
	$to = $_REQUEST['to'];
	$subject = $_REQUEST['subject'];
	$body = $_REQUEST['message'];
	$from = "admin@licktutorials.com";
	$header = "From: $from";
	if($to && $subject && $body)
	{
		mail($to,$subject,$body,$headers);
		echo "Your email has been sent!";
		header("Refresh:3; url=update.php");
	}else
	{
		echo "Please fill up all fields!";
	}	
	
	
	
}

?>


