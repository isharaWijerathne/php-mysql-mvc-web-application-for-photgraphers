<?php
//Security 

//database connection
require("../../include/dbconnect.php");




if (isset($_GET['id'])) {

    $enquiry_id = $_GET["id"];

  

        //Delete data in tblPicLocation
        $data_detete = " DELETE FROM tblenquiry WHERE enquiryID = '${enquiry_id}' ";
        $data_detete_result = mysqli_query($connection, $data_detete);
        mysqli_close($connection);


        setcookie("delete__enquiry_success", true, time()+2,"/");
        header("Location: {$_SERVER['HTTP_REFERER']}");


  
 }