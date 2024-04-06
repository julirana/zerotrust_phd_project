<?php


// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "zerotrust";
$db = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  

?>