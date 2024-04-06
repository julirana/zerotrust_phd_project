
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head> 

<body>    
    <center> <h1> Login Form </h1> </center>   
    <form action="login.php" method="post">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="email" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>   
            <label>PKI certificate : </label> 
            <input type="text" placeholder="PKI certificate" name="certificate" required> <br><br>  
            <label>Resource Type : </label>     
            <select id="resource_type" name="resource_type">
              <option value="1">User Details</option>
              <option value="2">User Activity log</option>
            </select><br><br>
            <!-- <button type="submit" name="submit">Login</button>  -->
            <input type="submit" value="Login" name="submit" />   <br><br>
            <a href="page.html"> Register </a>   <br>
            <!-- <a href="key_generation.php"> key </a>  -->
        </div>   
    </form>     
</body>     
</html>  

<?php    
 
session_start();
// database connection
include('dbconnection.php'); 

$error = "";

// *********************************************IDM*******************************************************

if(isset($_POST["submit"])){ 

  // user credentials
  $user=$_POST['email'];    
  $pass=$_POST['password']; 
  $certificate=$_POST['certificate'];
  $resource_type=$_POST['resource_type'];   
  // echo $access_time = time(); exit;

  // get user ip address
  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  }  
  $ip = getIPAddress();         
  $_SESSION["ip_address"] = $ip;
  // $ip = getenv("REMOTE_ADDR") ; 
  // echo $ip;  exit;

if(!empty($_POST['email']) && !empty($_POST['password'])) {    
    
    $myusername = mysqli_real_escape_string($db,$_POST['email']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);  
    
      // matching the id and password
      $sql = "SELECT id FROM userdetails WHERE email = '$myusername' AND password = '$mypassword' AND certificate='$certificate'";
      // $sql = "SELECT id FROM userdetails WHERE email = '$myusername' AND password = '$mypassword' AND certificate LIKE '%$certificate%'"; 
      $result = mysqli_query($db,$sql); 
      // if(mysqli_num_rows($result) > 0) {
      //     while($row = mysqli_fetch_assoc($result))
      //       echo $row["id"];
      //   }  else {
      //     echo 9;
      //   } exit;
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);             
      $count = mysqli_num_rows($result); 

      if($count == 1) {
        
        $userid = $row['id'];
      
    // matching the certificate
    // $matchCertificate = "SELECT * FROM userdetails WHERE id= '$userid' AND certificate='$certificate'";
    // $fetchCertificate = mysqli_query($db,$matchCertificate); // print_r($fetchCertificate); exit;
    // if(mysqli_num_rows($fetchCertificate) > 0) {
    //   while($row = mysqli_fetch_assoc($fetchCertificate))
    //     echo $row["id"];
    // }  else {
    //   echo 9;
    // } exit;

    //   get user session data
      $getData = "SELECT * FROM userdetails WHERE id= '$userid'";
      $userData = $db->query($getData); 
    //   if ($userData->num_rows > 0) {
          while($row = $userData->fetch_assoc()) {
            // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";  
            $userData2 = array('id'=>$row["id"],'name'=>$row["name"],'email'=>$row["email"],'role'=>$row["role"]); 
            // print_r($userData2); exit;
            $id = $row["id"];
            $role = $row["role"];
            $name = $row["name"];
          }
        // } else {
        //   echo "0 results";
        // }
        

        // session data
        $_SESSION["userid"] = $userid;  
        $_SESSION["name"] = $name; 
        $_SESSION["role"] = $role;
        $_SESSION["email"] = $user;
        $_SESSION["resource_type"] = $resource_type;  
        $_SESSION['start'] = time();  
        // echo $role; exit;    

        // session expiration time based on role
        // if ($role == "admin") {
        //   $_SESSION['expire'] = $_SESSION['start'] + (60 * 20) ; 
        // } else {
        //   $_SESSION['expire'] = $_SESSION['start'] + (60 * 10) ;  
        // } 

        $sessiondata = http_build_query($_SESSION); 
        // print_r($sessiondata); exit;
        
        $userData3 = http_build_query($userData2);
        // print_r($userData3); exit;
        
// ****************************************** requesting-verified user data store ***********************************
$verified_userdata = "INSERT INTO pds_information (id, user_id, role, resource_type) VALUES ('0', '$userid', '$role', '$resource_type')"; 
$query_userdata = mysqli_query($db, $verified_userdata);
// echo $verified_userdata; exit;
// *********************************************************************************
        
        // header('Location: PES.php?' . $userData3);
        // header('location: PES.php');


        // ***********user activity log store ********************************
        $user_id = $userid;
        $timestamp = time();
        $activity_description = 1;
        $ip_address = $ip;
        $device_info = 1;
        $request_details = 1;
        $status = 0;
        $resource_requested = 1;
        $login_time = 1; //now();
        $duration = 1;
        
      // using sql to create a data entry query
      $sql_userlog = "INSERT INTO user_activity_log (id, user_id, timestamp, activity_description, ip_address, device_info, request_details, status, resource_requested, login_time, duration) VALUES ('0', '$user_id', '$timestamp', '$activity_description', '$ip_address', '$device_info', '$request_details', '$status', '$resource_requested', '$login_time', '$duration')"; 
      // echo $sql_userlog; exit;    
      // send query to the database to add values and confirm if successful
      // $query_userlog = mysqli_query($db, $sql_userlog);
      // if($query_userlog)
      // {
      //     echo "Entries added!"; 
      // }
        // ***********************************************************************


// ********data send to PEP***********************
      $useragent=strtolower($_SERVER['HTTP_USER_AGENT']); //device use by  user
      $userCredentials = array('userId'=>$userid,'requestTime'=>$timestamp,'requesting_resource_type'=>$resource_type,'user_device'=>$useragent, 'ipAdd'=>$ip); 
      // print_r($userCredentials); exit;
      $userCredentials1 = http_build_query($userCredentials);               
      
// ***********************************************


      // data send to PDS
      header('Location: PDS.php?' . $userCredentials1);
      // header('Location: PES.php?' . $userData3);
      // header('location: PES.php');


      } else {
      // add data in access_attempt table
      $access_attempt_data = "INSERT INTO access_attempt (user_mail, requesting_resource, ip_address) VALUES ('$user', '$resource_type', '$ip')"; 
      $access_attempt_data2 = mysqli_query($db, $access_attempt_data);
      // echo $access_attempt_data; exit;   

      $error = "Your Login Name or Password is invalid";
      echo '<div style="color: red;">' . $error . '</div>';
      }   
}    
}    
?>    

