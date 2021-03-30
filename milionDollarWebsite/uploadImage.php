<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    .container {
        padding: 10px;
    }
    .redError{
        color: red;
    }
</style>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $row = $_POST['row'];
    $height = $_POST['height'] == "" ? 0 : $_POST['height'];
    $col = $_POST['col'];
    $width = $_POST['width'] == "" ? 0 : $_POST['width'];
    $raw_url = $_POST['url'];
    $raw_caption = $_POST['caption'];

    $err_msg = "";
    if($row % 10 != 0 || $row < 0){
        $err_msg = $err_msg . "<div class='redError'>The row index must be a non-negative multiple of 10</div>";
    }
    if($height % 10 != 0 || $height <= 0){
        $err_msg = $err_msg . "<div class='redError'>The height must be a positive multiple of 10</div>";
    }
    if($col % 10 != 0 || $col < 0){
        $err_msg = $err_msg . "<div class='redError'>The col index must be a non-negative multiple of 10</div>";
    }
    if($width % 10 != 0 || $width <= 0){
        $err_msg = $err_msg . "<div class='redError'>The width must be a positive multiple of 10</div>";
    }

    $file_tmp = $_FILES['image']['tmp_name'];
    list($uploaded_width, $uploaded_height) = getimagesize($file_tmp);

    if($width != $uploaded_width || $height != $uploaded_height){
        $err_msg = $err_msg . "<div class='redError'>Dimensions of the uploaded image does not match the provided dimensions.</div>";
    }

    session_start();
    $user_id = $_SESSION['user_id'];

    include('dbconnection.php');

    $pictures_query = "SELECT * FROM requests WHERE is_accepted=1";
    $points_result = mysqli_query($connection, $pictures_query);
    $position_is_empty = true;

    while($result = mysqli_fetch_assoc($points_result))
    {
        if(areOverlapping($row, $col, $row + $height, $col + $width, $result['row'], $result['col'], $result['row'] + $result['height'], $result['col'] + $result['width']))
        {
            $position_is_empty = false;
            $err_msg = $err_msg . "<div class='redError'>This position is taken by another picture</div>";
            break;
        }
    }

    $points_query = "Select points from users where id=$user_id";
    $points_result = mysqli_query($connection, $points_query);
    $result = mysqli_fetch_array($points_result, MYSQLI_ASSOC);
    $available_points = $result["points"];

    $price = $uploaded_width * $uploaded_height / 100;

    if($available_points < $price){
        $err_msg = $err_msg . "<div class='redError'>You do not have enough points to upload a picture this big. Price is $price and you have $available_points </div>";
    }

    if($err_msg != ""){
        $err_msg = "<div class='container'>" . $err_msg 
            . "</br><button class='btn btn-primary form-control-sm' onclick='history.go(-1);'>Go back</button>" . "</div>";
        echo $err_msg;
    }else
    {
        $is_admin = $_SESSION['is_admin'];
        $fn = $_SESSION['fn'];
        $file_name = $_FILES['image']['name'];

        $new_points = $available_points - $price;

        $newImageName = "images/". uniqid() . "_" .$file_name;
        move_uploaded_file($file_tmp, $newImageName);

        $insert_query = "INSERT INTO `requests` 
        (`id`, `user_id`, `reviewer_id`, `is_accepted`, `row`, `height`, `col`, `width`, `img_path`, `placed_on`, `price`, `url`, `caption`) VALUES 
        (NULL, '$user_id', NULL, NULL, '$row', '$height', '$col', '$width', '$newImageName', now(), '$price', '$raw_url', '$raw_caption')";

        $new_points = $available_points - $price;
        $update_query = "UPDATE `users` SET `points` = '$new_points' WHERE `users`.`id` = '$user_id'";

        $run_query = mysqli_query($connection, $insert_query);
        $run_query2 = mysqli_query($connection, $update_query);

        if($run_query){
            echo "<div class='container'> Request submitted</br>";
        }else{
            echo "<div class='container'> There was an error creating your request";
        }
        echo "</br><a class='btn btn-primary form-control-sm' href='index.php'>Home</a></div>";
    }
    mysqli_close($connection);
}

function areOverlapping($top1, $left1, $bottom1, $right1, $top2, $left2, $bottom2, $right2)
{
    if($right1 <= $left2 || $right2 <= $left1)
    {
        return false;
    }
    if($top1 >= $bottom2 || $top2 >= $bottom1)
    {
        return false;
    }
    return true;
}

?>