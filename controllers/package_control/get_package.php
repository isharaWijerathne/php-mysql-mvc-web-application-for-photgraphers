<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get 
$get_package_query = " SELECT tblpackages.packageID, tblpackages.picCategoryId, tblpiccategory.categoryName,tblpackages.pcakageHeader,
                        tblpackages.packageInforLineOne, tblpackages.packageInforLineTwo,tblpackages.packageInforLineThree,tblpackages.packageInfor, tblpackages.price
                        FROM tblpackages
                        INNER JOIN tblpiccategory
                        ON tblpackages.picCategoryId = tblpiccategory.picCategoryId ";
                        
$get_package_result = mysqli_query($connection,$get_package_query);

