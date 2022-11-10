<?php 
$host = "mysql_db"; 
$username = "root";
$password = "root";
$dbname = "Chat_db";
// Create Connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} 
phpinfo();
