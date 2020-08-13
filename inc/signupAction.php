<?php
session_start();
include('connection.php');

$n=$_REQUEST['user'];
$e=$_REQUEST['email'];
$p=$_REQUEST['password'];
$p2=$_REQUEST['password2'];
$t=$_REQUEST['type'];
$sq = "SELECT * FROM Users where email='$e'";
$result = $conn->query($sq);

if ($result->num_rows > 0) {
	header('location:../signup.php?failed=EmailAlreadyTaken');
}

else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
 header('location:../signup.php?failed=invalidEmailAddress');

}


else if($p!= $p2){
 header('location:../signup.php?failed=passwordMissMatch');
}
else if(!preg_match("/^[a-zA-Z ]*$/",$n)) {

 header('location:../signup.php?failed=InvalidName');
}
else{

$stmt = $conn->prepare("INSERT INTO Users (name, email, password,type) VALUES (?, ?, ?,?)");
$stmt->bind_param("ssss", $n1,$e1,$p1,$t1);
$n1=mysqli_real_escape_string($conn,$_REQUEST['user']);

$e1=mysqli_real_escape_string($conn, $_REQUEST['email']);
$p1=mysqli_real_escape_string($conn,$_REQUEST['password']);
$t1=mysqli_real_escape_string($conn,$_REQUEST['type']);


$stmt->execute();


$stmt->close();


$conn->close();
   
                $_SESSION['uName']=$_REQUEST['user'];
                $_SESSION['type']=$_REQUEST['type'];
 $path="location:../".$_REQUEST['type']."/".$_REQUEST['type'].".php";
               if($_REQUEST['type']=='other')
                  {$path="location:../index.php";}
            	header($path);

}

?> 