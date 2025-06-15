<?php
//Security 

//database connection
require("../../include/dbconnect.php");


$id = $_POST["package_id"];
$cat = $_POST["selected_cat_"];
$header = $_POST["package_header"];
$l1 = $_POST["line_one"];
$l2 = $_POST["line_two"];
$l3 = $_POST["line_three"];
$info = $_POST["package_details"];
$price = $_POST["price"];


$edit_package_query = " UPDATE tblpackages
                        SET picCategoryId = '${cat}', pcakageHeader = '${header}', 
                        packageInforLineOne = '${l1}' , packageInforLineTwo = '${l2}', packageInforLineThree = '${l3}' ,
                        packageInfor = '${info}' , price = '${price}'
                        WHERE packageID = '${id}'; ";

$edit_package_result = mysqli_query($connection,$edit_package_query);

mysqli_close($connection);
setcookie("package_edit_success", true, time()+2,"/");
header("Location:  /hnd/admin/package/package-details.php ");




