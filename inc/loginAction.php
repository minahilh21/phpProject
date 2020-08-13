<?php
session_start();
include('connection.php');

$sql = "SELECT * FROM Users";

$res=$conn->query($sql);
$success=0;
echo $_REQUEST['user']." ".$_REQUEST['type'];
   
        while($row=$res->fetch_assoc()){
           // echo "in while";
            if( $_REQUEST['user']==$row['name'] && 
              $_REQUEST['email']==$row['email'] && 
              $_REQUEST['password']==$row['password'] &&
                $_REQUEST['type']==$row['type'])

            {
              //echo "success";
               $path="location:../".$_REQUEST['type']."/".$_REQUEST['type'].".php";
               echo $path;
                //."?uName=".$_REQUEST['user']."&type=".$_REQUEST['type'];
                $_SESSION['uName']=$_REQUEST['user'];
                $_SESSION['type']=$_REQUEST['type'];
                $success=1;
                if($_SESSION['type']=='other')
                  {$path="location:../index.php";}
            header($path);
           
            }
           
          
            }     if($success==0) { 
            
      header('location:../login.php?loginfailed=UserNotFound');
         }

$conn->close();
?>

