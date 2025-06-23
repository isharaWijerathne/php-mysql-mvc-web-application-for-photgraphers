<?php
//Security 

//database connection
require("../../include/dbconnect.php");


//File Delete Function
require("../../include/deleteDirectory.php");

if (isset($_GET['id'])) {

    $pic_album_id = $_GET["id"];

    //Delete Save File
    $file_path_pic = "../../storage/" . $pic_album_id;

    if (deleteDirectory($file_path_pic)) {

        //Delete data in tblPic
        $data_detete_tblPic = " DELETE FROM tblpic WHERE picCollectionId = '${pic_album_id}' ";
        $data_detete_tblPic_result = mysqli_query($connection, $data_detete_tblPic);
        //mysqli_close($connection);

        //Delete data intblPicCollection
        $data_detete_tblPicCollection = " DELETE FROM tblpiccollection WHERE picCollectionId = '${pic_album_id}' ";
        $data_detete_tblPicCollection_result = mysqli_query($connection, $data_detete_tblPicCollection);
        mysqli_close($connection);

        $message_list = [
            "status" => "success",
            "message" => "Delete Success"
        ];
        setcookie("delete_album_success", true, time()+2,"/");
        echo json_encode($message_list);

    } else {
        $message_list = [
            "status" => "fail",
            "message" => "id is invalid"
        ];
         setcookie("delete_album_success", false, time()+2,"/");
        echo json_encode($message_list);
    }



} else {
    $message_list = [
        "status" => "fail",
        "message" => "id is invalid"
    ];
    setcookie("delete_album_success", false, time()+2,"/");
    echo json_encode($message_list);
}
