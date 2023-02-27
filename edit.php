<html>

<head>

</head>

<body>

<h3>Edit User: 
<?php echo $_REQUEST['names']; ?>
</h3>

<form ENCTYPE="multipart/form-data" method="POST" action="change.php">
<table border="0" width="60%">
<tr><td width="30%"> NAME: </td><td><input type="text" name="newname" value="<?php echo $_REQUEST['names'];?>"></td></tr>
<tr><td width="30%"> EMAIL: </td><td><input type="text" name="newemail" value="<?php echo $_REQUEST['emails'];?>"></td></tr>
<tr><td width="30%"> PASSWORD: </td><td><input type="text" name="newpassword" value=""></td></tr>
 
 </table><p>
  Change picture:<input type="file" name="newupload" /><p>
 <input type="submit" value ="Save & Update" name="submit" />
 <input type="hidden" name="id" value="<?php echo $_REQUEST['ids'];?>" />
</form>

</body>


</html> 