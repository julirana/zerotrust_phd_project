<?php

    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
      echo  $resource_name = $_POST['resource_name']; exit;
    }
    
// database connection
// include('dbconnection.php'); 
    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zerotrust";
    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $resource_sql = "INSERT INTO resource_type (id, resource_name) VALUES ('0', '$resource_name')"; 
    // echo $resource_sql; 
  
    // send query to the database to add values and confirm if successful
    $resource_query = mysqli_query($con, $resource_sql);
    if($resource_query)
    {
        echo "Entries added!";
    }
  
    // close connection
    // mysqli_close($con);

?>
