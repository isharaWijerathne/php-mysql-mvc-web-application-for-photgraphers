<?php   
//Security 

//database connection
require("../../include/dbconnect.php");

//Get Album Details
$get_album_details_query = "SELECT tblpiccollection.picCollectionId,tblpiccollection.picCategoryId,tblpiccategory.categoryName,tblpiccollection.mainHeader,
                            tblpiccollection.discription,tblpiccollection.isPublish
                            FROM tblpiccollection
                            INNER JOIN tblpiccategory
                            ON tblpiccollection.picCategoryId = tblpiccategory.picCategoryId
                            ";

$get_album_details_result = mysqli_query($connection,$get_album_details_query);
