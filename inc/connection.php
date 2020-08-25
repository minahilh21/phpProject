<?php
class db{
  protected $conn;
  function __construct() {
    $servername = "localhost";
    $username = "mina";
    $password = "Square63#";
    $dbname = "myDB";
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    } 
  }
  function __destruct() {
    $this->conn->close();
  }
  function query($sql) {
    return $this->conn->query($sql);
  }
  function prepare($sql,$param,$n,$e,$p,$t){
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param($param, $n1,$e1,$p1,$t1);
    $n1=mysqli_real_escape_string($this->conn,$n);
    $e1=mysqli_real_escape_string($this->conn, $e);
    $p1=mysqli_real_escape_string($this->conn,$p);
    $t1=mysqli_real_escape_string($this->conn,$t);
    $stmt->execute();
    $stmt->close();
  }
}
?>
