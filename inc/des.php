<?php
session_start();
$user=$_SESSION['uName'];
$type=$_SESSION['type'];
include("functions.php");
$pageTitle='Book Description';
$id=$_GET['id'];
include ('connection.php');
$db =new db();
$sql = "SELECT * FROM books WHERE id='$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>
<html>
<head>
  <title><?php echo $pageTitle;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav"><li>
        <form class="example" method="post" action="bookSearch.php">
          <input type="text" required placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form></li>
        <li><a href="../index.php">HOME</a></li>
        <?php 
        if(isset($_SESSION['uName']))
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
      <h2><?php echo $row["title"];?></h2>
      <ol class="items">
        <?php 
        echo "<h3>By ".$row['author']."</h3>";
        rating_star($row["rating"]);
        echo " ".$row["rating"];
        echo "<p>".$row["des"]."</p><hr>";
        echo "<h3>Comments</h3>";
        $sql1 = "SELECT Comments.comment,Comments.name FROM Comments INNER JOIN books on Comments.book_id=books.id WHERE Comments.book_id='$id'";
        $res_data1=$db->query($sql1);
        $count = mysqli_num_rows($res_data1); 
        if($count>0)
        {
          while($row1 = mysqli_fetch_array($res_data1))
          {
            echo "<h4>".strtoupper($row1['name'])."</h4>";
            echo "<p>".$row1['comment']."</p><hr>";
          }
        }
        else
        {
          echo "<p>Be the first to comment!</p>";
        }
        ?>
        <section class="my-5">
          <div class="m-auto">
            <form action="commentAction.php" method="post">
              <div class="form-group">
                <label>Comment</label>
                <textarea type="text" name="des" rows="10" required class="form-control"></textarea>
              </div>
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <button type="submit" class="btn btn-success">Submit</button><br><br>
              <div class="form-group">
              </div>
            </form>
          </div>
        </section>
        <br><br>
      </ol>
    </div>
  </div>
</div>
<?php include('footer.php');?>
