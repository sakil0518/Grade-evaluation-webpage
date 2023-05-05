<?php
    $host = "localhost";
    $user_name = "root";
    $password = '';
    $database = "soen287";

    $con = mysqli_connect($host, $user_name, $password, $database);
    if(mysqli_connect_errno()) {
        die("Can't connect with MySQL: ". mysqli_connect_error());  
    }
?>
