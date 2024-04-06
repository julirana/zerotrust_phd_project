<?php
// echo "PES"; exit;

session_start();

// database connection
include('dbconnection.php'); 

// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "zerotrust";
// $conn = mysqli_connect($host, $username, $password, $dbname); 
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
// include("database.php");


// *********************************************PEP*******************************************************

// data send to PDS
// if (isset($_SESSION['role']) && isset($_SESSION['email'])) {
//   $name = $_SESSION['name'];
//   $role = $_SESSION['role'];
//   $email = $_SESSION['email'];
  
//   header("Location: PDS.php");
// }

  
$ip = 1;
$todayDate = date('Y-m-d');

// check if in a day if the user accessing multiple failed login attempt
// $access_attempt_data = "SELECT * FROM access_attempt WHERE ip_address = '$ip' AND access_time = '$todayDate'"; 
// $access_attempt_data2 = $db->query($access_attempt_data);
// echo $access_attempt_data; exit;

// $db= $conn;
// $tableName="userdetails";
// $columns= ['id', 'name','role','email','password'];
// $fetchData = fetch_data($db, $tableName, $columns);

// function fetch_data($db, $tableName, $columns){
//  if(empty($db)){
//   $msg= "Database connection error";
//  }elseif (empty($columns) || !is_array($columns)) {
//   $msg="columns Name must be defined in an indexed array";
//  }elseif(empty($tableName)){
//    $msg= "Table Name is empty";
// }else{

// $columnName = implode(", ", $columns);
// $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id";
// $result = $db->query($query);

// if($result== true){ 
//  if ($result->num_rows > 0) {
//     $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
//     $msg= $row;
//  } else {
//     $msg= "No Data Found"; 
//  }
// }else{
//   $msg= mysqli_error($db);
// }
// }
// return $msg;
// }

// LOGIN HAPPENNING
// // session logout
// $now = time();
// header("refresh: 5");
// if ($now > $_SESSION['expire']) {
//   session_destroy();
//   header("Location: login.php");
// }

// if($role != 'admin') {
//     // session logout (10am - 5pm)
//     // Set the timezone
//     date_default_timezone_set('Asia/Kolkata');

//     $startTime1 = strtotime('10:00:00');
//     $endTime1 = strtotime('17:00:00');

//     // if the current time is within the session time range
//     if ($now >= $startTime1 && $now <= $endTime1) {
//       $_SESSION['isLoggedIn'] = true;
//     } else {
//       session_destroy();
//       header("Location: login.php");

//       // $_SESSION['isLoggedIn'] = false;
//     }
// }


// ****************************deny & allow access decision***************************************
// get PA data 
if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
  $resource_type = $_COOKIE['resource_type'];
  $access_duration = $_COOKIE['access_duration'];
  // echo $resource_type;  exit;

  // updating status in user_activity_log table
  $status = 1;
  $status_userlog = "UPDATE user_activity_log SET status = $status WHERE user_id = $user_id"; 
  $query_userlog = mysqli_query($db, $status_userlog);
  // echo $status_userlog; exit; 

  // if requested resource is 'user details', user will go 'user details' page
  if ($resource_type == "1") {
    header('location: user_details.php');
  }
  // if requested resource is 'user activity log', user will go 'activity log' page
  if ($resource_type == "2") {
    header('location: activitylog.php');
  }
} else {
  echo "no data found"; exit;
}

// deny the user
// if (isset($_SESSION['deny'])) {
//     $data = $_SESSION['deny'];
//     header('location: logout.php'); 
// }




?>

<html>
 <body>
   <div class="form">
    <form method="POST" action="r.php">
      <p>
      <br>
      <label>Request Resource: </label>   
                <select id="resource_type" name="resource_type">
                  <option value="1">User Details</option>
                  <option value="2">User Activity log</option>
                </select>
      <input type="submit" name="submit" id="submit" value="Send">
      <br>
      </p>
    </form>
 </body>
</html>
      
<a href="resource.html"> Enter Resource </a> 


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>Full Name</th>
         <th>Role</th>
         <th>Email</th>
    </thead>
    <tbody>
        

  <?php
      if($role == 'admin') {
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name']??''; ?></td>
      <td><?php echo $data['role']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="3">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    } } else { ?>

    <tr>
      <td><?php echo 1 ?></td>
      <td><?php echo $name??''; ?></td>
      <td><?php echo $role??''; ?></td>
      <td><?php echo $email??''; ?></td>
    </tr>

    <?php 
        }
    ?>
    </tbody>
     </table>
   </div> 
            <!-- <a href="page.html"> Register </a> <br>
            <a href="login.php"> Login </a>   <br> -->
            <a href="logout.php"> Logout </a>   
</div>
</div>
</div>
</body>
</html>