<?php
session_start();
include('connection.php');

$n=$_REQUEST['user'];
$e=$_REQUEST['email'];
$p=$_REQUEST['password'];
$p2=$_REQUEST['password2'];
$t=$_REQUEST['type'];
$sq = "SELECT * FROM Users where email='$e'";

// $sq="select * from Users";
 $db =new db();
 $result=$db->query($sq);

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

	$t1=4;
	if($_REQUEST['type']=='Author')
		{
			$t1=3;
		}

$sql="INSERT INTO Users (name, email, password,t_id) VALUES (?, ?, ?,?)";
$param="sssi";
$p1 = password_hash($p, PASSWORD_DEFAULT);
//echo $n." ".$e. "  " .$p1." ".$t1;
$db->prepare($sql,$param,$n,$e,$p1,$t1);

                $_SESSION['uName']=$_REQUEST['user'];
                $_SESSION['type']=$_REQUEST['type'];
 $path="location:../".$_REQUEST['type']."/".$_REQUEST['type'].".php";
               if($_REQUEST['type']=='other')
                  {$path="location:../index.php";}
            	header($path);

}

?> 