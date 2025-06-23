<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $pic_album_id = $_GET["id"];


    $get_picture_query = " SELECT * FROM `tblpic` WHERE 
                            tblpic.picCollectionId = '${pic_album_id}' AND tblpic.isPublish = true ";
    $get_picture_result = mysqli_query($connection,$get_picture_query);
    
}
