<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_pic_id = $_GET["id"];


    $active_pic_query = " UPDATE tblpic SET isPublish = true WHERE picId = '{$pic_pic_id}'; ";
    $avtive_pic_result = mysqli_query($connection,$active_pic_query);

    mysqli_close($connection);
    setcookie("active_pic_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}



