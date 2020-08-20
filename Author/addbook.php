<?php
session_start();
$pageTitle="Add Book";
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
     <h2 class="text-center">Add Book</h2>
   </div>
   <div class="w-50 m-auto">
    <form action="addbookAction.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
       <label>Book Title</label>
       <input type="text" name="title" autocomplete="off" required class="form-control">
       <div class="form-group">
        <label>Description</label>
        <textarea type="text"  rows="10" name="des" autocomplete="off" required class="form-control"></textarea>
      </div>
      <div class="form-group">
       <label>Upload Book</label>
       <input type="file" name="link" >
     </div>
     <div class="form-group">
      <div class="form-group">
       <label>Upload Cover Image</label>
       <input type="file" name="image" >
     </div>
     <div class="form-group">
      <button type="submit" class="btn btn-success">Add Book</button><br><br>
      <div class="form-group">
      </div>
    </form>
  </div>
</section>
<?php include('../inc/footer.php');?>
</body>
</html>
