<?php

// echo "PDS"; exit;

session_start();
// database connection
include('dbconnection.php'); 

// ****************************************** retrive ALL info. ***********************************
    //   get resource info.
    $resourceData = "SELECT * FROM resource_type";
    $resource_result = mysqli_query($db,$resourceData); 
    
    //   get session info.
    $userid = $_SESSION['userid'];
    $role = $_SESSION['role'];
    $resource_type = $_SESSION['resource_type']; 
    $ip_address = $_SESSION["ip_address"];
    // $userid = "1"; 
    // $role = "admin"; 
    // $resource_type = "1";     
    // $ip_address = "1";     
    
    // //   get userdetails data(search requested user details)
    // $userData = "SELECT * FROM userdetails";
    // // $user_result = mysqli_query($db,$userData);
    //   $user_result = $db->query($userData); 
    //     if ($user_result->num_rows > 0) {
    //         while($row = $user_result->fetch_assoc()) {
    //           echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";  exit;
    //           $userData2 = array('id'=>$row["id"],'name'=>$row["name"],'email'=>$row["email"],'role'=>$row["role"]); 
    //           // print_r($userData2); exit;
    //           $id = $row["id"];
    //           $role = $row["role"];
    //           $name = $row["name"];
    //         }
    //       }
    



    
// *********************************************************************************

// ****************************************** PIP ***********************************
// // admin have no limit to access the resource

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
// manager & user cann't access the userDetails 
// *********************************************************************************


// ****************************************** TA ***********************************

    // check weather user's role & resource name are matchings or not    
    $requesting_user_info = "SELECT * FROM resource_type WHERE access_permission = '$role' and id = '$resource_type'";
    $requesting_user_info1 = mysqli_query($db,$requesting_user_info);
    $requesting_user_info2 = mysqli_fetch_array($requesting_user_info1,MYSQLI_ASSOC);
    // echo json_encode($requesting_user_info2); exit;    
    $requesting_user_info1 = $db->query($requesting_user_info); 
    $count = mysqli_num_rows($requesting_user_info1);

    // if access decision is allowed then PA executes
    if ($count > 0) {
      // session_start();

            while($row = $requesting_user_info1->fetch_assoc()) {
              $access_duration = $row["access_duration"];
            }
          // echo $access_duration; exit;

        // ******************************** Policy Administrator ******************************
        // PA is making authentication file/token
        // $authentication_file = array('user_id'=>$userid,'resource_type'=>$resource_type,'access_duration'=>$access_duration); 
        // print_r($authentication_file); exit;
        setcookie("user_id", "$userid", time() + 3600, "/");
        setcookie("resource_type", "$resource_type", time() + 3600, "/");
        setcookie("access_duration", "$access_duration", time() + 3600, "/");
        // header('Location: PES.php?' . $authentication_file);
         
        // session expiration time in hour
        $_SESSION['start'] = time();
        $hour = $access_duration * 10;
        $_SESSION['expire'] = $_SESSION['start'] + (60 * $hour) ;

        header('location: PES.php');
        // *********************************************************************************

    } else {
      // if access decision is denied then 
      header('location: logout.php');
      // $_SESSION['deny'] = "deny";
      // header('location: PES.php');      
    }

   
// *********************************************************************************





?>