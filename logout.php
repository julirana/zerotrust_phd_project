<?php


    include('dbconnection.php');
    //   get login user ID 
    $userid = "1"; //$_SESSION['userid'];

    session_destroy();
    // update user logout time in user_activity_log table
    $sql_userlogout = "UPDATE user_activity_log SET logout_time = NOW() WHERE user_id = $userid"; 
    $query_userlogout = mysqli_query($db, $sql_userlogout);
    header("Location: login.php");

?>
