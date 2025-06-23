<?php
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $package_id = $_GET["id"];

   
    $delete_package_query = "DELETE FROM `tblpackages` where packageID = '{$package_id}' ;";
    $delete_package_result = mysqli_query($connection,$delete_package_query);

    mysqli_close($connection);
    setcookie("delete_package_success", true, time()+2,"/");

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

