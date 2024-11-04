<?php
    $server = "localhost";
    $user_name = "root";
    $password = "";
    $database = "hnd_web";

    $connection =  mysqli_connect($server,$user_name,$password,$database);

    if(mysqli_connect_error())
    {
        die("db connection err".mysqli_connect_error());
    }
    
?>