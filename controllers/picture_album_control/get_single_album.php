<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_album_id = $_GET["id"];


    $get_picture_album_query = " SELECT tblpiccollection.picCollectionId,tblpiccollection.picCategoryId,tblpiccategory.categoryName,tblpiccollection.mainHeader,
                            tblpiccollection.discription,tblpiccollection.isPublish
                            FROM tblpiccollection
                            INNER JOIN tblpiccategory
                            ON tblpiccollection.picCategoryId = tblpiccategory.picCategoryId
                            WHERE tblpiccollection.picCollectionId = '{$pic_album_id}' ";
    $get_picture_album_result = mysqli_query($connection,$get_picture_album_query);

    $get_pictures_query = "SELECT * FROM tblpic WHERE tblpic.picCollectionId = '{$pic_album_id}'";
    $get_pictures_result = mysqli_query($connection,$get_pictures_query);

    mysqli_close($connection);
    
}
