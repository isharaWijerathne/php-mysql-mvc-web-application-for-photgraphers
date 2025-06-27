<?php 

require("../../include/dbconnect.php");

$user_name = $_POST['user_name'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$create_user_password = " INSERT INTO `tblauth` (`id`, `username`, `password`) VALUES (NULL, '${user_name}', '${hashedPassword}'); "; 

mysqli_query($connection,$create_user_password);

mysqli_close($connection);
setcookie("user_created", true, time()+2,"/");
header("Location: {$_SERVER['HTTP_REFERER']}");
