
 <?php 
 session_start();

 $pageTitle="Author";
  


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
					<li><a href="addbook.php">Add new Books</a></li>
					 <li><a href="manageBook.php?uName=<?php echo  $_SESSION['uName'];?>">Manage Books</a></li>
		



</ol>
</div>
</div>
</div>









     <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


   
</body>
</html>