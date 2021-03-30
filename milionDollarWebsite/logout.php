<?php
   session_start();
   unset($_SESSION["valid"]);
   unset($_SESSION["username"]);
   unset($_SESSION["user_id"]);
   unset($_SESSION["points"]);
   unset($_SESSION["is_admin"]);
   unset($_SESSION["fn"]);
   
//   echo 'You have logged out.</br><a href="index.php">Go to home page</a>';

    header("Location: http://localhost:9090/dashboard/working-files/milionDollarWebsite/index.php"); 
    exit();
   //header('Refresh: 2; URL = login.php');
?>