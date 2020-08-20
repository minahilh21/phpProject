<?php
session_start();
include("../inc/functions.php");
include ('../inc/connection.php');
$pageTitle='Update Book';
$n=$_GET['uName'];
$t=$_GET['title'];
$db=new db();
$sql = "SELECT * FROM books where title='$t'";
$res_data=$db->query($sql);
while($row = mysqli_fetch_array($res_data)){
  $title=$row["title"];
  $des=stripslashes($row["des"]);
  $id=$row["id"];
}
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
      </ul>
    </div>
  </div>
  <section class="my-5">
    <div class="py -5">
     <h2 class="text-center">Update Book</h2>
   </div>
   <div class="w-50 m-auto">
    <form action="updatebookAction.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
       <label>Book Title</label>
       <input type="text" name="title" value="<?php echo $title;?>" required class="form-control">
       <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="des" rows="10" required class="form-control"><?php echo $des;?></textarea>
      </div>
      <div class="form-group">
       <label>Upload Book</label>
       <input type="file" name="link">
     </div>
     <div class="form-group">
      <div class="form-group">
       <label>Upload Cover Image</label>
       <input type="file" name="image" >
     </div>
     <input type="hidden" name="id" value="<?php echo $id;?>">
     <button type="submit" class="btn btn-success">Update</button><br><br>
     <div class="form-group">
     </div>
   </form>
 </div>
</section>
<?php include('../inc/footer.php');?>
</body>
</html>
