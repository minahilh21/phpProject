<?php
session_start();
include("inc/functions.php");
$pageTitle='Online Book Store';
$user=$_SESSION['uName'];
$type=$_SESSION['type'];
?>
<html>
<head>
  <?php include('inc/head.php');?>
  <link rel="stylesheet" href="css/reset.css" type="text/css">
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav">
       <li>   
        <form class="example" method="post" action="inc/bookSearch.php">
          <input type="text" required placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form></li>
        <li><a href="index.php">HOME</a></li>
        <?php 
        if(isset($_SESSION['uName'])){
         $path=$type."/".$type.".php";
         echo "<li><a href='inc/logout.php'>LOGOUT</a></li>";
         echo "<li><a href=".$path.">HELLO  ". $user."</a></li>";
       } else {
        echo "<li><a href='login.php'>LOGIN</a></li>";
      }
      ?>
    </ul>
  </div>
</div>
<div id="content">
  <div class="section catalog random">
    <div class="wrapper">
      <h2>Looking for books to read?</h2>
      <ol class="items">
        <?php
        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 3;
        get_book($no_of_records_per_page);
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&laquo;</a>
            </li>
            <?php 
            for ($i = 1; $i <= no_of_pages($no_of_records_per_page); $i++) {
              $p="?pageno=".$i;
              if($_GET['pageno']==$i ) {
                $c="active";
              } else {
                $c="";
              }
              echo "<li class=".$c." ><a href=".$p.">".$i."</a></li>";
            } 
            ?>
            <li class="<?php if($pageno >= no_of_pages($no_of_records_per_page)){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= no_of_pages($no_of_records_per_page)){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">&raquo;</a>
            </li>
          </ul>
        </nav>
      </ol>
    </div>
  </div>
</div>
<?php include('inc/footer.php');?>
