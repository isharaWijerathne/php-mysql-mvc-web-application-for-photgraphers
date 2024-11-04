<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get 
$get_picture_category_query = "SELECT * FROM `tblpiccategory` ";
$get_picture_category_result = mysqli_query($connection,$get_picture_category_query);

