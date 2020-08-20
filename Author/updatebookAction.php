<?php
session_start();
include('../inc/connection.php');
$name=$_GET['uName'];
$t=$_POST['title'];
$d=addslashes($_POST['des']);
$id=$_POST['id'];
$name= $_FILES['link']['name'];
$image= $_FILES['image']['name'];
$tmp_name= $_FILES['link']['tmp_name'];
$tmp_image= $_FILES['image']['tmp_name'];
$db=new db();
if (isset($name) && isset($image)) { 
  $path= '/var/www/my-domain/project/uploads/';
  $path_name=$path.$name;
  $path_image=$path.$image;
  if (!empty($name)&& !empty($image)){   
    if (move_uploaded_file($tmp_name, $path.$name) && move_uploaded_file($tmp_image, $path.$image)) {
      $sql = "UPDATE books SET title='$t',des='$d' ,link='$path_name',image='$path_image' WHERE id='$id' ";
      $db->query($sql);
    }
  }
else {
  $sql = "UPDATE books SET title='$t',des='$d' WHERE id='$id' ";
  $db->query($sql);
  }
}
if($_SESSION['type']=='admin'){
  header("location:../admin/admin.php");
}
else if($_SESSION['type']=='Moderator'){
  header("location:../Moderator/Moderator.php"); 
}
else{
  header("location:manageBook.php");
}
?>
