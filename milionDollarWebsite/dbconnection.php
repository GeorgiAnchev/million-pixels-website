<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "million_pixels";

try
{
    $connection = mysqli_connect($server, $username, $password, $database);
    
}catch (Exception $errormsg)
{
    echo $errormsg->getMessage();
}

?>