<?php
session_start();
include("../inc/functions.php");
$name=$_SESSION['uName'];
$pageTitle='Manage Book';
?>
<html>
<head>
  <?php include('../inc/head.php');?>
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav">
        <li><a href="../index.php">HOME</a></li>
        <li><a href="../inc/logout.php">LOG OUT</a></li>
        <?php 
        $path="Author.php";
        if($name=="admin")
          $path="../admin/admin.php";
        echo"<li><a href=$path>HELLO".$name ."</a></li>";
        ?>
      </ul>
    </div>
  </div>
  <section class="my-5">
    <div class="py -5">
      <h2 class="text-center">Manage Books</h2>
      <ol class="items">
        <?php
        get_book_by_author($_SESSION['uName']);
        ?>
      </ol>
    </div>
    </body>
</html>
