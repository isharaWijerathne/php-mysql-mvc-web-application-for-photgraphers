<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get each ablum with categoryName, mainHeader and PicID 
$get_ablum_details_query = "SELECT 
                            tblpiccollection.picCollectionId,
                            tblpiccollection.mainHeader,
                            tblpiccategory.categoryName
                            FROM 
                                tblpiccollection
                            JOIN 
                                tblpiccategory ON tblpiccollection.picCategoryId = tblpiccategory.picCategoryId
";


//get each album first four pic
$get_pic_details_query = "WITH RankedPictures AS (
                        SELECT 
                            picId, 
                            picCollectionId, 
                            picPath,
                            ROW_NUMBER() OVER (PARTITION BY picCollectionId ORDER BY picId) AS rn
                        FROM 
                            tblpic
                    )
                        SELECT 
                            picId, 
                            picCollectionId, 
                            picPath
                        FROM 
                            RankedPictures
                        WHERE 
                            rn <= 4
                        ORDER BY 
                            picCollectionId, 
                            rn;
                        ";

$get_ablum_details = mysqli_query($connection,$get_ablum_details_query);

$get_pic_details = mysqli_query($connection,$get_pic_details_query);

