<?php
session_start();
include('../inc/connection.php');

$t=$_REQUEST['title'];
$a=$_SESSION['uName'];
$r=$_REQUEST['rating'];
$d=addslashes ($_REQUEST['des']);

$name= $_FILES['link']['name'];

$tmp_name= $_FILES['link']['tmp_name'];
if (isset($name)) 
{
$path= '/var/www/my-domain/project/uploads/';
$path_name=$path.$name;
if (!empty($name))
{   
    if (move_uploaded_file($tmp_name, $path.$name)) 
    {
        echo 'Uploaded!';
        $sql = "INSERT INTO books(title,author,rating,des,published,link) VALUES ('$t','$a','$r','$d','0','$path_name')";
$conn->query($sql);
$conn->close();


    }
}
}
header("location:Author.php");

?>