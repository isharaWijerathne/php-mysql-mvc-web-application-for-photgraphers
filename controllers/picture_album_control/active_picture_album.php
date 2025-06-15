<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_album_id = $_GET["id"];


    $active_picture_album_query = " UPDATE tblpiccollection SET isPublish = true WHERE picCollectionId = '{$pic_album_id}'; ";
    $avtive_picture_album_result = mysqli_query($connection,$active_picture_album_query);

    mysqli_close($connection);
    setcookie("active_album_pic_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}



