<?php
session_start();
include('../inc/connection.php');
$t=$_REQUEST['title'];
$a=$_SESSION['uName'];
$d=addslashes ($_REQUEST['des']);
$name= $_FILES['link']['name'];
$image= $_FILES['image']['name'];
$tmp_name= $_FILES['link']['tmp_name'];
$tmp_image= $_FILES['image']['tmp_name'];
if (isset($name) && isset($image)) {
  $path= '/var/www/my-domain/project/uploads/';
  $path_name=$path.$name;
  $path_image=$path.$image;
  if (!empty($name)&& !empty($image)){   
    if (move_uploaded_file($tmp_name, $path.$name) && move_uploaded_file($tmp_image, $path.$image)){
      $sql = "INSERT INTO books(title,author,rating,des,published,link,image) VALUES ('$t','$a','0','$d','0','$path_name','$path_image')";
      $db=new db();
      $db->query($sql);
    }
  }
}
header("location:Author.php");
?>
