<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_package_id = $_GET["id"];


    $get_package_query = "SELECT tblpackages.packageID, tblpackages.picCategoryId, tblpiccategory.categoryName,tblpackages.pcakageHeader,
                            tblpackages.packageInforLineOne, tblpackages.packageInforLineTwo,tblpackages.packageInforLineThree,tblpackages.packageInfor, tblpackages.price
                            FROM tblpackages
                            INNER JOIN tblpiccategory
                            ON tblpackages.picCategoryId = tblpiccategory.picCategoryId
                            WHERE tblpackages.packageID = '${pic_package_id}'";
    $get_package_result = mysqli_query($connection,$get_package_query);


    mysqli_close($connection);
    
}
