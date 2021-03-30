<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    .container {
        padding-top: 10px;
    }
</style>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $raw_username = $_POST['username'];
        $raw_password = $_POST['password'];
        $raw_fn = $_POST['fn'];
        
        include('dbconnection.php');
        
        $query = "INSERT INTO `users` 
        (`id`, `username`, `password`, `points`, `is_admin`, `fn`) 
        VALUES
        (NULL, '$raw_username', '$raw_password', '1', '0', '$raw_fn')";

        $run_query = mysqli_query($connection, $query);

        echo "<div class='container' >";
        if($run_query){
            echo "Succesfull registration</br>";
            echo "<a class='btn btn-primary form-control-sm' href='loginForm.php'>Login</a>
            <a class='btn btn-primary form-control-sm' href='index.php'>Home</a>";
        }else{
            echo "There was an error creating your profile";
            echo "<a class='btn btn-primary form-control-sm' href='index.php'>Home</a>
            <button class='btn btn-primary form-control-sm' onclick='history.go(-1);'>Go back</button>" ;
        }
        
        echo "</div>";
        mysqli_close($connection);
        
    }
?>