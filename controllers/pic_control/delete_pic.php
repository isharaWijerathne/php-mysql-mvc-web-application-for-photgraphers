<?php
//Security 

//database connection
require("../../include/dbconnect.php");


//File Delete Function
require("../../include/deleteDirectory.php");

if (isset($_GET['id'])) {

    $pic_path = $_GET["id"];

  
    if (deleteDirectory($pic_path)) {

        //Delete data in tblPicLocation
        $data_detete_tblPic = " DELETE FROM tblpic WHERE picPath = '${pic_path}' ";
        $data_detete_tblPic_result = mysqli_query($connection, $data_detete_tblPic);
        mysqli_close($connection);

        $message_list = [
            "status" => "success",
            "message" => "Delete Success"
        ];
        setcookie("delete_pic_success", true, time()+2,"/");
        echo json_encode($message_list);

    } else {
        $message_list = [
            "status" => "fail",
            "message" => "id is invalid"
        ];
         setcookie("delete_pic_success", false, time()+2,"/");
        echo json_encode($message_list);
    }



} else {
    $message_list = [
        "status" => "fail",
        "message" => "id is invalid"
    ];
    setcookie("delete_pic_success", false, time()+2,"/");
    echo json_encode($message_list);
}
