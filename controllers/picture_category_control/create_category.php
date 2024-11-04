<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

//get last used id
$get_last_used_id_query = "SELECT picCategoryId FROM `tblpiccategory` ORDER BY picCategoryId DESC LIMIT 1; ";
$get_last_used_id_result = mysqli_query($connection,$get_last_used_id_query);
$result_assc_array =  $get_last_used_id_result->fetch_assoc(); //CAT-XXX
$last_used_id = $result_assc_array["picCategoryId"];

//genarate next primary key
$next_available_int =  intval(substr($last_used_id,4,3)) + 1;
$next_primary_key = "CAT-". str_pad(strval($next_available_int),3,"0",STR_PAD_LEFT);
echo $_SERVER['HTTP_REFERER'];




$category_name = $_POST["category_name"];
$insert_quary ="INSERT INTO `tblpiccategory` (`picCategoryId`, `categoryName`, `isCategoryActive`) VALUES ('{$next_primary_key}', '{$category_name}', true);";

$insert_quary_result = mysqli_query($connection,$insert_quary);
if(mysqli_affected_rows($connection) == 1)
{
   
    mysqli_close($connection);
    setcookie("create_categort_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
