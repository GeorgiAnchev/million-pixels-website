<?php
session_start();
include('../dbconnection.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $request_id = $_POST['id'];
    $is_accepted = $_POST['is_accepted'];
    $your_id = $_SESSION['user_id'];
    
    $query = "UPDATE requests SET is_accepted = '$is_accepted', reviewer_id = '$your_id' WHERE id = '$request_id'";
    $run_query = mysqli_query($connection, $query);

    if($is_accepted == 0){
        $query_price = "SELECT price, user_id, points, img_path FROM requests INNER JOIN users ON users.id = requests.user_id WHERE requests.id = '$request_id'";
        $price_result = mysqli_query($connection, $query_price);
        $result = mysqli_fetch_array($price_result, MYSQLI_ASSOC);
        //echo "$result";
        
        $price = $result["price"];
        $user_id = $result["user_id"];
        $current_points = $result["points"];
        $path = $result["img_path"];
        unlink(realpath($path));
        
        $new_points = $price + $current_points;
        $return_points_query = "UPDATE users SET points='$new_points' WHERE id = '$user_id'";
        $query_result = mysqli_query($connection, $return_points_query);
    }
    
    if($run_query)
    {
        echo "Updated";
    }else
    {
        echo "Error executing the request";
    }
}
?>