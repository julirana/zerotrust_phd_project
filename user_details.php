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
         <th>Full Name</th>
         <th>Role</th>
         <th>Email</th>         
         <th>Edit</th>
         <th>Delete</th>
    </thead>
    <tbody>
        

  <?php
    
    // database connection
    include('dbconnection.php'); 

    //   get userdetails data
    $getData = "SELECT * FROM userdetails";
    $result = mysqli_query($db,$getData); 
    // print_r($result); exit;
    //   if(is_array($getData)){      
      $sn=1;
      foreach($result as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name']??''; ?></td>
      <td><?php echo $data['role']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
      <td><a href="updateUser_details.php?id=<?php echo $data['id']??''; ?>" class="btn btn-primary">Edit</a></td>
      <td><a href="deletedata.php?id=<?php echo $data['id']??''; ?>" class="btn btn-danger">Delete</a></td>
      </tr>
     <?php
      $sn++;}
    //   }else{ 
        ?>
      <tr>
        <!-- <td colspan="3"> -->
    <?php 
    // echo $getData; 
    ?>
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

// enter user login time in user_activity_log table
// $sql_userlog = "UPDATE user_activity_log SET login_time = NOW() WHERE user_id = $userid"; 
// $query_userlog = mysqli_query($db, $sql_userlog);
  

// session logout
$now = time();
header("refresh: 5");
if (isset($_SESSION['expire'])) {
// echo $_SESSION['expire']; exit;
  if ($now > $_SESSION['expire']) {
    header("Location: logout.php");
  }
}
?>
