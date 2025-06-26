<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get 
$get_package_query_for_booking = " SELECT tblpackages.packageID,tblpiccategory.categoryName,tblpackages.pcakageHeader,tblpackages.price
                                    FROM tblpackages
                                    INNER JOIN tblpiccategory
                                    ON tblpackages.picCategoryId = tblpiccategory.picCategoryId ";
                        
$get_package_query_for_booking = mysqli_query($connection,$get_package_query_for_booking);

