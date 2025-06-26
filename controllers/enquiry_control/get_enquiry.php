<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get 
$get_enquiry_query = "  SELECT tblenquiry.enquiryID,tblenquiry.packageID,tblpackages.pcakageHeader,tblenquiry.customerName,tblenquiry.contactNum,tblenquiry.email 
                        FROM tblenquiry
                        INNER JOIN tblpackages
                        ON tblenquiry.packageID = tblpackages.packageID  ";
                        
$get_enquiry_result = mysqli_query($connection,$get_enquiry_query);
