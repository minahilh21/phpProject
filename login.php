<?php
$pageTitle='Login';
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
        <li><a href="index.php">HOME</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </div>
  </div>
  <section class="my-5">
    <div class="py -5">
      <div class="spacing"></div>
     <h2 class="text-center">Login</h2>
   </div>
   <div class="w-50 m-auto">
    <?php
    if (isset($_REQUEST['loginfailed'])) {
      if(  $_REQUEST['loginfailed']=="LoginUnavailable"){
       echo "<div class='w-50 container alert alert-danger'>";
       echo" <strong>Unable to login!</strong>Contact Admin</div>";
     }
     else if(  $_REQUEST['loginfailed']=="WrongPassword"){
       echo "<div class='w-50 container alert alert-danger'>";
       echo" <strong>Wrong Password!</strong> Try again</div>";
     } else{
      echo "<div class='w-50 container alert alert-danger'>";
      echo" <strong>User Not Found!</strong> Signup First</div>";
    }
  }
  ?>
  <form action="inc/loginAction.php" method="post">
   <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" autocomplete="off" required class="form-control">
  </div>
  <div class="form-group">
   <label>Password</label>
   <input type="password" name="password" autocomplete="off" required class="form-control">
 </div>
 <button type="submit" class="btn btn-success">Submit</button><br><br>
 <div class="form-group">
  <label>New to this website? <a href="signup.php"> Signup</a></label>
</div>
</form>
</div>
</section>
<div class="spacing"></div>
<?php include('inc/footer.php');?>
</body>
</html>
