<?php
$name ="JosephPogi";
$oldName = "profiles/".$name;
$newName = "profiles/".$name."1";
rename($oldName,$newName);
echo realpath(dirname(__FILE__));
?>