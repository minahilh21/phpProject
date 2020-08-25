<?php
$pageTitle='Signup';
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
   <h2 class="text-center">Signup</h2>
 </div>
 <div class="w-50 m-auto">
  <?php
  if (isset($_REQUEST['failed'])) {
    if(  $_REQUEST['failed']=="invalidEmailAddress"){
     echo "<div class='w-50 container alert alert-danger'>";
     echo" <strong>Invalid Email address!</strong> Try different email</div>";
   }
   else if(  $_REQUEST['failed']=="EmailAlreadyTaken"){
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Email already taken!</strong> Go to Login!</div>";
  }
  else if(  $_REQUEST['failed']=="passwordMissMatch"){
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Password mismatch!</strong> Retype password</div>";
  }
  else if(  $_REQUEST['failed']=="InvalidName") {
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Invalid Name!</strong> Try different name</div>";
  }
} 
?>
<form action="inc/signupAction.php" method="post">
 <div class="form-group">
   <label>User name</label>
   <input type="text" name="user" autocomplete="off" required class="form-control">
 </div>
 <div class="form-group">
  <label>Email</label>
  <input type="email" name="email" autocomplete="off" required class="form-control">
</div>
<div class="form-group">
 <label>Password</label>
 <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" required class="form-control">
</div>
<div class="form-group">
 <label>Confirm Password</label>
 <input type="password" name="password2" autocomplete="off" required class="form-control">
</div>
<div class="form-group">
  <label>Join as:</label><br>
  <input type="radio" id="author" name="type" value="Author">
  <label for="author">Author</label><br>
  <input type="radio" id="other" name="type" value="other" checked>
  <label for="other">Other</label><br>
  <button type="submit" class="btn btn-success">Submit</button><br><br>
  <label>Already have Account? <a href="login.php"> Login</a></label>
</form>
</div>
</form>
</div>
</section>
<div class="spacing"></div>
<?php include('inc/footer.php');?>
</body>
</html>
