<?php 
session_start();


$email_from_user = $_POST["email"];
$password_from_user = $_POST["password"];

$result = "";


if($email_from_user == "admin@test.com" && $password_from_user == "12345")
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