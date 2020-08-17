<?php
session_start();
include('connection.php');
$sql = "SELECT Users.email, Users.name,Users.password, Users_type.type FROM Users INNER JOIN Users_type ON Users_type.t_id=Users.t_id";

$success=0;
$db =new db();
 $res=$db->query($sql);

        while($row=$res->fetch_assoc()){
    
            if( $_REQUEST['email']==$row['email'])

            {  $success=1;
              if(password_verify ( $_REQUEST["password"] , $row["password"]))
              {
                echo "success";
               $path="location:../".$row['type']."/".$row['type'].".php";
               echo $path;
            
                $_SESSION['uName']=$row['name'];
                $_SESSION['type']=$row['type'];
                
                if($_SESSION['type']=='other')
                  {
                    $path="location:../index.php";}
                    header($path);
           
               }

            else{ 
            
         header('location:../login.php?loginfailed=WrongPassword');
         }
           }

          
            }     if($success==0) { 
            
      header('location:../login.php?loginfailed=UserNotFound');
         }

?>


