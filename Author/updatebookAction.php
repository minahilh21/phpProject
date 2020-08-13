<?php
session_start();
include('../inc/connection.php');
$name=$_GET['uName'];

$t=$_POST['title'];
$a=$_POST['author'];
$r=$_POST['rating'];
$d=addslashes($_POST['des']);
$id=$_POST['id'];



$sql = "UPDATE books SET title='$t', author='$a',  rating='$r',des='$d' WHERE id='$id' ";

$conn->query($sql);
$conn->close();

header("location:manageBook.php");


?>