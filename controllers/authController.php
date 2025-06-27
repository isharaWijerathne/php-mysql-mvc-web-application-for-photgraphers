<?php 
session_start();

require("../include/dbconnect.php");

$email_from_user = $_POST["email"];
$password_from_user = $_POST["password"];

$result = "";


$get_auth_query = " SELECT * FROM `tblauth` WHERE username = '${email_from_user}'";
$get_auth_result = mysqli_query($connection,$get_auth_query);
$result_assc_array =  $get_auth_result->fetch_assoc(); 
$db_hased_password= $result_assc_array["password"];


if(password_verify($password_from_user,$db_hased_password))
{
   $result = "done";
   $_SESSION['auth'] = 'This is auth sesstion';
}
else 
{
   $result =  "fail";
}

$message_list = [
   "status" => "success" ,
   "message" => $result
];

echo json_encode($message_list);


?> 