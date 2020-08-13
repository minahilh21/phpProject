<?php
session_start();
$pageTitle='Add Book';
?>
<html>
<head>
  <title><?php echo $pageTitle;?></title>
 <link rel="stylesheet" href="../css/style.css" type="text/css">
  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
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
              

            </div>
             <div class="form-group">
              <label>Author</label>
              <input type="text" name="author" value="<?php echo $_SESSION['uName'];?>" autocomplete="off" required class="form-control">
             
              

            </div>
          <div class="form-group">
             <label>Rating</label>
              <input type="number" step="0.01" name="rating" autocomplete="off" min="1" max="5" required class="form-control">

            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea type="text" name="des" autocomplete="off" required class="form-control"></textarea>
             
              

            </div>
          <div class="form-group">
             <label>Upload File</label>
              <input type="file" name="link" >

            </div>
          <div class="form-group">
             
            <button type="submit" class="btn btn-success">Add Book</button><br><br>
 <div class="form-group">
            
          </div>
         
          </form>

        </div>
</section>










     <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


      <?php include('../inc/footer.php');?>
</body>
</html>