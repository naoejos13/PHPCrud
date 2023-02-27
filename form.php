
<html>
<head>
<title>Form</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" >



</script>

</head>

<body>
<h1><center>Welcome to CRUD control center </center></h1>

<h2> Register Form</h2>
<form ENCTYPE="multipart/form-data" method="post" action="insert.php">
<table border = "0" width = "60%">
<tr><td width="10%" >Name: </td><td><input type="text" name="name" maxlength="20" /></td></tr>
<tr><td width="10%" >Email:</td><td><input type="text" name="email" maxlength="20"/></td></tr>
<tr><td width="10%" >Password:</td><td><input type="password" name="password" maxlength="20"/></td></tr>
<tr><td width ="10%">Confirm Password: </td><td><input type="password" name="cpassword" maxlength="20"/></td></tr>
<input type="hidden" name="MAX_FILE_SIZE" value="60000" />

</table>
Choose your picture: <input type="file" name="upload" >
<p>
<input type="submit" name="submit" value="Register" />

<input type="reset" name="reset" value="Reset" />

</form>


</body>

</html>