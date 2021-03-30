<?php
include('../dbconnection.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_POST['id'];
    $points = $_POST['points'];
    $is_admin = $_POST['admin'];
   
    $query = "UPDATE users SET is_admin = '$is_admin', points = '$points' WHERE users.id = '$user_id'";
    $run_query = mysqli_query($connection, $query);
//
//    if($run_query)
//    {
//        echo "Updated";
//    }else
//    {
//        echo "Error executing the request";
//    }
}
?>