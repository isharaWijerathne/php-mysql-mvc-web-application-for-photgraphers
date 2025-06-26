<?php 
//Security 

//database connection
require("../../include/dbconnect.php");

if(isset($_GET['id']))
{

    $eqnuiry_id = $_GET["id"];


    $eqnuiry_query = " SELECT * FROM tblenquirydates WHERE enquiryID = '${eqnuiry_id}' ";
    $eqnuiry_result = mysqli_query($connection,$eqnuiry_query);


    mysqli_close($connection);
}
