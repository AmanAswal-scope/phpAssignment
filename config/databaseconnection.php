<?php

  function connect_db(){
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "phpLogin";



$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

return $conn;
  }
?>
