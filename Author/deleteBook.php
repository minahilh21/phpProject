<?php
include("../inc/functions.php");
$n=$_GET['uName'];
$t=$_GET['title'];
delete_book($t);
header("location:manageBook.php?uName=$n");
?>
