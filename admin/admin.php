<?php 
session_start();
 $pageTitle="admin";
   
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
        
              <li><a href=<?php echo "../index.php"?> >HOME</a></li>
              
              
                <li><a href="">HELLO <?php echo  $_SESSION['uName'];?></a></li>
                <li><a href=''></a></li>
                <li><a href="../inc/logout.php">LOGOUT</a></li>


              
        

              </ul>

    </div>

  </div>


<div id="content">


	<div class="section catalog random">

			<div class="wrapper">

				<h2>Go To?</h2>

				<ol class="items">
					
					 <li><a href="../Author/manageBook.php?uName=<?php echo  $_SESSION['uName'];?>">Manage Books</a></li>
					 <li><a href="../Moderator/manageUser.php?uName=<?php echo  $_SESSION['uName'];?>">Manage users</a></li>
		



</ol>
</div>
</div>
</div>

