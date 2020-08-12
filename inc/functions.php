<?php
session_start();
function get_book( $no_of_records_per_page)
{
include ('connection.php');
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
      
        $offset = ($pageno-1) * $no_of_records_per_page;
        $sql = "SELECT * FROM books where published=1 LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
            if($row["published"]==1){
              $id=$row['id'];
            echo "<li><h3><a href='inc/des.php?id=$id'>".$row["title"]."</a></h3> By  ".$row["author"]." "."</li>";
            rating_star($row["rating"]);
            echo " ".$row["rating"]."<hr>";
        }
        }
        mysqli_close($conn);

}
function no_of_pages($no_of_records_per_page)
{
include ('connection.php');
$total_pages_sql = "SELECT COUNT(*) FROM books where published=1";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
   mysqli_close($conn);

      return $total_pages;
}

function get_book_by_author($author)
{
include ('connection.php');
if($author=="admin")
  {$sql = "SELECT * FROM books";}
else{
        $sql = "SELECT * FROM books where author='$author'";
      }
        $res_data = mysqli_query($conn,$sql);
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
        
         if ($row["published"]==1){
        echo "Unpublish";
    }
        else{

            echo "Publish";
         }

         echo"</a></td>";

         }
         echo"<td><a href='updatebook.php?uName=$author&title=$title'> UPDATE</a></td> <td>   <a href='deleteBook.php?uName=$author&title=$title'> DELETE</a></td> </tr>";
        }
/////////////////////////////////////////////////////////////
        {


        }///////////////////////
        echo"</table>";
        mysqli_close($conn);
   
}
function delete_book($title){
    include ('connection.php');

    $sql = "DELETE FROM books WHERE title='$title'";
echo "i'm called";
if ($conn->query($sql)=== TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}

function get_users()
{
include ('connection.php');

   if($_SESSION["type"]=='admin'){
        $sql = "SELECT * FROM Users";
      }
      else{
        $sql = "SELECT * FROM Users where (type='other') OR (type='Author')";
      }
        
        $res_data = mysqli_query($conn,$sql);
 echo "<table>
  <tr>
    <th>User Name</th>
    <th>Email</th>
    <th>Password</th>
     <th>Type </th>
  </tr>";

        while($row = mysqli_fetch_array($res_data)){
            $id=$row["id"];
         echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["type"]."  </td><td><a href='updateUser.php?id=$id'> UPDATE</a></td><td>    <a href='deleteUser.php?id=$id'> DELETE</a></td>";
  
     
        }
          echo"</table>";
        mysqli_close($conn);
   
}
function delete_user($id){
    include ('connection.php');

    $sql = "DELETE FROM Users WHERE id='$id'";
if ($conn->query($sql)=== TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
}


function get_all_books()
{
include ('connection.php');


        $sql = "SELECT * FROM books";
        $res_data = mysqli_query($conn,$sql);
 echo "<table>
  <tr>
    <th>Book Name</th>
    <th>Author</th>
  </tr>";

        while($row = mysqli_fetch_array($res_data)){
             $id=$row["id"];
             $p=$row["published"];
         echo "<tr><td>".$row["title"]."</td><td>".$row["author"]."</td><td><a href='publishAction.php?id=$id&p=$p'>";
        
         if ($row["published"]==1){
        echo "Unpublish";
    }
        else{

            echo "Publish";
         }

         echo"</a></td>";
    

     
        }
          echo"</table>";
        mysqli_close($conn);
   
}

function rating_star($starNumber)
{

for( $x = 0; $x < 5; $x++ )
{ 
    if( floor( $starNumber )-$x >= 1 )
    { //echo "in 1";
      echo '<i class="fa fa-star" style="color:#2e86c1"></i>'; }

   
    elseif( $starNumber-$x > 0 )
    { 
      //echo "in 1";
      echo '<i class="fa fa-star-half-o" style="color:#2e86c1"></i>'; }
    else
    { //echo "in 1";
       echo '<i class="fa fa-star-o"></i>'; }
       
}

}

function get_comments($id)
{
include ('connection.php');


        $sql = "SELECT Comments.comment,Comments.name FROM Comments INNER JOIN books on Comments.book_id=books.id WHERE Comments.book_id='$id'";
        $res_data = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res_data); 
        if($count>0){

        while($row = mysqli_fetch_array($res_data)){
        
             
     echo "<h4>".strtoupper($row['name'])."</h4>";
     echo "<p>".$row['comment']."</p><hr>";

             }
           }
           else{
            echo "<p>Be the first to comment!</p>";
           }
        mysqli_close($conn);
   
}
function search_book($name)
{
include ('connection.php');
$name='%'.$name.'%';
        $sql = "SELECT * FROM books where title like '$name'";
        $res_data = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res_data); 
        if($count>0)
        {
        while($row = mysqli_fetch_array($res_data))
        {
           if($row["published"]==1){
              $id=$row['id'];
            echo "<li><h3><a href='des.php?id=$id'>".$row["title"]."</a></h3> By  ".$row["author"]." "."</li>";
            rating_star($row["rating"]);
            echo " ".$row["rating"]."<hr>";
        }
        }
      }
      else
      {
        echo "No books Found!<br> Try a different Search!";
      }
        mysqli_close($conn);
      
   
}


?>