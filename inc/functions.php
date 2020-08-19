<?php
session_start();
function get_book( $no_of_records_per_page)
{
  include ('connection.php');
  $db=new db();
  if (isset($_GET['pageno'])) 
  {
    $pageno = $_GET['pageno'];
  } 
  else 
  {
    $pageno = 1;
  }
  $offset = ($pageno-1) * $no_of_records_per_page;
  $sql = "SELECT * FROM books where published=1 LIMIT $offset, $no_of_records_per_page";
  $res_data=$db->query($sql);
  while($row = mysqli_fetch_array($res_data))
  {
    if($row["published"]==1)
    {
      $id=$row['id'];
      $pdf_path=substr($row['link'], strpos($row['link'], 'uploads', 1));
      $image_path=substr($row['image'], strpos($row['image'], 'uploads', 1));
      echo "<table><tbody>";
      echo " <tr><td rowspan='4' ><img src='$image_path' style='length:100px;width:80px;'></td>";
      echo  "<td style='width:70%;' ><a href='inc/des.php?id=$id'>".$row["title"]."</a></td></tr>";
      echo "<tr><td>By  ".$row['author']."</td><td style='width:10%;' rowspan='4'><a href='$pdf_path' class='btn btn-info'>Read</a></td></tr><tr><td>";
      rating_star($row["rating"]);
      echo $row['rating']."<form action='inc/likes.php?bid=$id' method='post'><button  value='1' name='like' class='button'><i class='like fa fa-thumbs-o-up'></i></button><button name='dislike' class='button' value='1'><i class='like fa fa-thumbs-o-down'></i></button></form></td></tr>";
      echo "</tbody></table>";
    }
  }
}
function get_book_by_author($author)
{
  $type=$_SESSION['type'];
  include ('connection.php');
  $db=new db();
  if($type=="admin" || $type=="Moderator")
    {$sql = "SELECT * FROM books";}
  else{
    $sql = "SELECT * FROM books where author='$author'";
  }
  $res_data=$db->query($sql);
  echo "<table>
  <tr>
  <th>Book Title</th>
  <th></th>
  <th></th>
  </tr>";
  while($row = mysqli_fetch_array($res_data)){
    $title=$row["title"];

    echo "<tr><td>".$title."</td>";
    if($author=="admin")
    {
      $id=$row["id"];
      $p=$row["published"];
      echo "<td>By  ".$row["author"]."</td><td><a href='../Moderator/publishAction.php?id=$id&p=$p'>";
      if ($row["published"]==1)
      {
        echo "Unpublish";
      }
      else
      {
        echo "Publish";
      }
      echo"</a></td>";
    }
    echo"<td><a href='updatebook.php?uName=$author&title=$title'> UPDATE</a></td> <td>   <a href='deleteBook.php?uName=$author&title=$title'> DELETE</a></td> </tr>";
  }
  {
  }
  echo"</table>";
}
function delete_book($title){
  include ('connection.php');
  $db=new db();
  $sql = "DELETE FROM books WHERE title='$title'";
  $db->query($sql);

}
function get_users()
{
  include ('connection.php');
  if($_SESSION["type"]=='admin')
  {
   $sql = "SELECT * FROM Users INNER JOIN Users_type ON Users_type.t_id=Users.t_id";
 }
 else
 {
  $sql = "SELECT * FROM Users INNER JOIN Users_type ON Users_type.t_id=Users.t_id where (Users.t_id='3' or Users.t_id='4')";
}
$db=new db();
$res_data = $db->query($sql);
echo "<table>
<tr>
<th>Id</th>
<th>User Name</th>
<th>Email</th>
<th>Status</th>
<th>Type </th>
</tr>";
while($row = mysqli_fetch_array($res_data))
{
  $id=$row["id"];
  echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>";
  if($row["status"]==1)
  {
    echo "Active";
  }
  else
  {
    echo "Inactive";
  }
  echo "</td><td>".$row["type"]."  </td><td><a href='updateUser.php?id=$id'> UPDATE</a></td><td>    <a href='deleteUser.php?id=$id'> DELETE</a></td>";
}
echo"</table>";
}
function delete_user($id){
  include ('connection.php');
  $db=new db();
  $sql = "DELETE FROM Users WHERE id='$id'";
  $db->query($sql);

}
function get_all_books()
{
  include ('connection.php');
  $db=new db();

  $sql = "SELECT * FROM books";
  $res_data = $db->query($sql);
  echo "<table>
  <tr>
  <th>Book Name</th>
  <th>Author</th>
  </tr>";
  while($row = mysqli_fetch_array($res_data)){
   $id=$row["id"];
   $p=$row["published"];
   echo "<tr><td>".$row["title"]."</td><td>".$row["author"]."</td><td><a href='publishAction.php?id=$id&p=$p'>";
   if ($row["published"]==1)
   {
    echo "Unpublish";
  }
  else
  {
    echo "Publish";
  }
  echo"</a></td>";
}
echo"</table>";
}
function no_of_pages($no_of_records_per_page)
{
  $sql = "SELECT COUNT(*) FROM books where published=1";
  $servername = "localhost";
  $username = "mina";
  $password = "Square63#";
  $dbname = "myDB";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $result=$conn->query($sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  return $total_pages;
}
function rating_star($starNumber)
{

  for( $x = 0; $x < 5; $x++ )
  { 
    if( floor( $starNumber )-$x >= 1 )
    { 
      echo '<i class="fa fa-star" style="color:#2e86c1"></i>'; 
    }
    elseif( $starNumber-$x > 0 )
    { 
      echo '<i class="fa fa-star-half-o" style="color:#2e86c1"></i>'; 
    }
    else
    { 
     echo '<i class="fa fa-star-o"></i>'; 
   }
 }
}

function search_book($name)
{
  include ('connection.php');
  $db=new db();
  $name='%'.$name.'%';
  $sql = "SELECT * FROM books where title like '$name'";
  $res_data=$db->query($sql);
  $count = mysqli_num_rows($res_data); 
  if($count>0)
  {
    while($row = mysqli_fetch_array($res_data))
    {
     if($row["published"]==1)
     {
      $id=$row['id'];
      $pdf_path="../".substr($row['link'], strpos($row['link'], 'uploads', 1));
      $image_path="../".substr($row['image'], strpos($row['image'], 'uploads', 1));
      echo "<li><img src='$image_path' style='length:100px;width:80px;'><a href='../inc/des.php?id=$id'>".$row["title"]."</a> By  ".$row["author"];
      echo rating_star($row["rating"]);
      echo " ".$row["rating"]."<a href='$pdf_path' class='button'>Read</a></li><hr>";
      }
    }
  }
  else
  {
  echo "No books Found!<br> Try a different Search!";
  }
}
?>
