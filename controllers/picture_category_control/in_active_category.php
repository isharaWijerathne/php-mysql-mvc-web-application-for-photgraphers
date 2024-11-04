<?php
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_category_id = $_GET["id"];

    $hide_picture_category_query = "UPDATE `tblpiccategory` SET isCategoryActive = false where picCategoryId = '{$pic_category_id}' ;";
    $hide_picture_category_result = mysqli_query($connection,$hide_picture_category_query);

    mysqli_close($connection);
    setcookie("in_active_categort_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}



