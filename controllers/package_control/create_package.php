<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get last used id -> tblPacageID
$get_last_used_package_id_query = " SELECT packageID FROM tblpackages ORDER BY packageID DESC LIMIT 1 ";
$get_last_used_package_id_result = mysqli_query($connection,$get_last_used_package_id_query);
$result_assc_array =  $get_last_used_package_id_result->fetch_assoc(); //PAK-XXXXX
$last_used_tblPackage_id = $result_assc_array["packageID"];


//genarate next primary key -> tblPiccollection
$next_primary_key_for_tblPackage = null;
if($last_used_tblPackage_id == null)
{
    $next_primary_key_for_tblPackage = 'PAK-00001';
}
else 
{
    $next_available_int =  intval(substr($last_used_tblPackage_id,4,5)) + 1;
    $next_primary_key_for_tblPackage = "PAK-". str_pad(strval($next_available_int),5,"0",STR_PAD_LEFT);
}


$picCat = $_POST['selected_cat_'];
$header = $_POST['package_header'];
$l1 = $_POST['line_one'];
$l2 = $_POST['line_two'];
$l3 = $_POST['line_three'];
$info = $_POST['package_details'];
$price = $_POST['price'];

$insert_tblPackage_quary = " INSERT INTO `tblpackages` (`packageID`, `picCategoryId`, `pcakageHeader`, `packageInforLineOne`, `packageInforLineTwo`, `packageInforLineThree`, `packageInfor`, `price`) 
                            VALUES ('${next_primary_key_for_tblPackage}', '${picCat}', '${header}', '${l1}', '${l2}', '${l3}', '${info}', '${price}'); ";



$insert_quary_result = mysqli_query($connection,$insert_tblPackage_quary);
if(mysqli_affected_rows($connection) == 1)
{
   
    mysqli_close($connection);
    setcookie("create_package_success", true, time()+2,"/");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
