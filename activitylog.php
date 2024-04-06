
<html>
 <head>
 </head>
 <body>
   <div class="form">
    <!-- <form method="POST" action="resource.php">
      <p>
      <label for="resource_name">Resource Name </label>
      <input type="text" name="resource_name" id="resource_name">
      <label for="access_duration">Access Duration </label>
      <input type="text" name="access_duration" id="access_duration">
      <label for="access_permission">Access Permission </label>
      <input type="text" name="access_permission" id="access_permission">
      </p>
      <p>
      <input type="submit" name="submit" id="submit" value="Submit">
      </p>
    </form> -->
 </body>
</html>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>ID</th>
         <th>Timestamp</th>
    </thead>
    <tbody>
        

  <?php    
    // database connection
    include('dbconnection.php'); 

    //   get user_activity_log data
    $getData = "SELECT * FROM user_activity_log";
    $result = mysqli_query($db,$getData); 
    // print_r($result); exit;     
      $sn=1;
      foreach($result as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['user_id']??''; ?></td>
      <td><?php echo $data['timestamp']??''; ?></td>
     </tr>
     <?php
      $sn++;} 
        ?>
      <tr>
  </td>
    <tr>
    <?php
    // } 
  ?>
    </tbody>
     </table>
   </div>
            <a href="logout.php"> Logout </a>   
</div>
</div>
</div>
</body>
</html>


<?php
session_start();

//   get login user ID 
$userid = "1"; //$_SESSION['userid']; 
// $login_time = $_SESSION['start'];

// enter user login time in user_activity_log table
// $sql_userlog = "UPDATE user_activity_log SET login_time = NOW() WHERE user_id = $userid"; 
// $query_userlog = mysqli_query($db, $sql_userlog);
   

// session logout
// $now = time();
header("refresh: 5");
if (isset($_SESSION['expire'])) {
  if ($now > $_SESSION['expire']) {
    header("Location: logout.php");
  }

}
?>

















<?php

    // if(isset($_POST['submit']))
    // {
    //     $name = $_POST['name'];
    //     $role = $_POST['role'];
    //     $email = $_POST['email'];
    //     $user_password = $_POST['password'];
    // }
    // // database details
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "zerotrust";

    // // creating a connection
    // $con = mysqli_connect($host, $username, $password, $dbname);

    // // to ensure that the connection is made
    // if (!$con)
    // {
    //     die("Connection failed!" . mysqli_connect_error());
    // }

    // // using sql to create a data entry query
    // $sql = "INSERT INTO user_activity_log (id, user_id, timestamp, activity_description, ip_address, device_info, request_details, status, resource_requested, duration) VALUES ('0', '$name', '$role', '$email', '$user_password')"; echo $sql; exit;
  
    // // send query to the database to add values and confirm if successful
    // $rs = mysqli_query($con, $sql);
    // if($rs)
    // {
    //     echo "Entries added!";
    // }
  
    // // close connection
    // mysqli_close($con);

?>
