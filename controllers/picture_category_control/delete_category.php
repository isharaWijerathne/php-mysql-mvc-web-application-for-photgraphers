<?php
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_category_id = $_GET["id"];

   
    $delete_picture_category_query = "DELETE FROM `tblpiccategory` where picCategoryId = '{$pic_category_id}' ;";
    $delete_picture_category_result = mysqli_query($connection,$delete_picture_category_query);

    mysqli_close($connection);
    setcookie("delete_categort_success", true, time()+2,"/");

    $message_list = [
        "status" => "success" ,
        "message" => "Delete Success"
     ];
     
     echo json_encode($message_list);

}
else 
{
    $message_list = [
        "status" => "fail" ,
        "message" => "id is invalid"
     ];
     
     echo json_encode($message_list);
}

