<?php
session_start();
$expire = time() - 86400;
setcookie('testsite',$_SESSION['name'],$expire);
session_destroy();

echo "Session Destroyed";
header("Refresh:1; url=home.php");

?>