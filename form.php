<?php

    // // database details
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "zerotrust";
    // // creating a connection
    // $con = mysqli_connect($host, $username, $password, $dbname);
    
// database connection
include('dbconnection.php'); 


// echo $_POST['password']; exit;
    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $user_password = $_POST['password'];
    }


    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO userdetails (id, name, role, email, password) VALUES ('0', '$name', '$role', '$email', '$user_password')"; 
    // echo $sql; exit;
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
    }
  
    // close connection
    mysqli_close($con);

?>
