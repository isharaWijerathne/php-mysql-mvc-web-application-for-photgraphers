<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_pic_id = $_GET["id"];


    $in_active_pic_query = "  UPDATE tblpic SET isPublish = false WHERE picId = '{$pic_pic_id}'; ";
    $in_avtive_pic_result = mysqli_query($connection,$in_active_pic_query);

    mysqli_close($connection);
    setcookie("in_active_pic_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}



