<?php
session_start();
$pageTitle='Search Book';
$user=$_SESSION['uName'];
$type=$_SESSION['type'];
$title=$_POST["search"];
include("functions.php");
?>
<html>
<head>
  <title><?php echo $pageTitle;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav">
        <li>   
          <form class="example" method="post" action="../inc/bookSearch.php">
            <input type="text" required placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form></li>
          <li><a href="../index.php">HOME</a></li>
          <?php if(isset($_SESSION['uName']))
          {
           $path="../".$type."/".$type.".php";
           echo "<li><a href='logout.php'>LOGOUT</a></li>";
           echo "<li><a href=".$path.">HELLO  ". $user."</a></li>";
          }
         else
         {
          echo "<li><a href='../login.php'>LOGIN</a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
  <div id="content">
    <div class="section catalog random">
      <div class="wrapper">
        <h2>Books</h2>
        <ol class="items">
         <?php search_book($title);?>
       </ol>
     </div>
   </div>
 </div>
 <?php include('footer.php');?>
