<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get 
$get_picture_category_active_query = "SELECT * FROM tblpiccategory where isCategoryActive = true ;";
$get_picture_category_active_result = mysqli_query($connection,$get_picture_category_active_query);

