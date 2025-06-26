<?php 

//database connection
require("../../include/dbconnect.php");

$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_contact_num = $_POST['customer_contact_number'];
$package_id = $_POST['selected_package_'];
$start_date_input = $_POST['str_date'];
$end_date_input = $_POST['end_date'];



//create enquiry

//get last used id -> tblenquiry
$get_last_used_enquiry_id_query = " SELECT enquiryID FROM tblenquiry ORDER BY enquiryID DESC LIMIT 1 ";
$get_last_used_enquiry_id_result = mysqli_query($connection,$get_last_used_enquiry_id_query);
$result_assc_array =  $get_last_used_enquiry_id_result->fetch_assoc(); //PAK-XXXXX
$last_used_tblenquiry_id = $result_assc_array["enquiryID"];


//genarate next primary key -> tblenquiry
$next_primary_key_for_tblenquiry = null;
if($last_used_tblenquiry_id == null)
{
    $next_primary_key_for_tblenquiry = 'EQR-00001';
}
else 
{
    $next_available_int =  intval(substr($last_used_tblenquiry_id,4,5)) + 1;
    $next_primary_key_for_tblenquiry = "EQR-". str_pad(strval($next_available_int),5,"0",STR_PAD_LEFT);
}


$tblenquiry_insert = "INSERT INTO `tblenquiry` (`enquiryID`, `packageID`, `customerName`, `email`, `contactNum`) 
                        VALUES ('${next_primary_key_for_tblenquiry}', '${package_id}', '${customer_name}', '${customer_email}', '${customer_contact_num}'); ";



$tblenquiry_insert = mysqli_query($connection,$tblenquiry_insert);
//mysqli_close($connection);


//Create Date Recodes
$start = new DateTime($start_date_input);
$end = new DateTime($end_date_input);
$end->modify('+1 day');
$interval = new DateInterval('P1D'); 
$date_range = new DatePeriod($start, $interval, $end);

foreach ($date_range as $date) 
{

 $formatted_date = $date->format("Y-m-d");
    
//get last used id -> tblenquiryDate
$get_last_used_enquiryDate_id_query = " SELECT enquiryDateID FROM `tblenquirydates` ORDER BY enquiryDateID DESC LIMIT 1 ";
$get_last_used_enquiryDate_id_result = mysqli_query($connection,$get_last_used_enquiryDate_id_query);
$result_assc_array =  $get_last_used_enquiryDate_id_result->fetch_assoc(); //PAK-XXXXX
$last_used_tblenquiryDate_id = $result_assc_array["enquiryDateID"];


$next_primary_key_for_tblenquiryDate = null;
if($last_used_tblenquiryDate_id == null)
{
    $next_primary_key_for_tblenquiryDate = 'EQD-00001';
}
else 
{
    $next_available_int =  intval(substr($last_used_tblenquiryDate_id,4,5)) + 1;
    $next_primary_key_for_tblenquiryDate = "EQD-". str_pad(strval($next_available_int),5,"0",STR_PAD_LEFT);
}

$tblenquiryDate_insert = " INSERT INTO `tblenquirydates` (`enquiryDateID`, `selectedDate`, `enquiryID`) 
                            VALUES ('${next_primary_key_for_tblenquiryDate}', '${formatted_date}', '${next_primary_key_for_tblenquiry}'); ";

$tblenquiryDate_insert = mysqli_query($connection,$tblenquiryDate_insert);

}

mysqli_close($connection);
setcookie("create__enquiry_success", true, time()+2,"/");
header("Location: {$_SERVER['HTTP_REFERER']}");


