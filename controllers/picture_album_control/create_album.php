<?php
//Security 

//database connection
require("../../include/dbconnect.php");

//get last used id -> tblPiccollection
$get_last_used_tblPicCollection_id_query = "SELECT picCollectionId from tblpiccollection ORDER BY picCollectionId DESC LIMIT 1 ;";
$get_last_used_tblPicCollection_id_result = mysqli_query($connection,$get_last_used_tblPicCollection_id_query);
$result_assc_array =  $get_last_used_tblPicCollection_id_result->fetch_assoc(); //PCT-XXXXX
$last_used_tblPicCollection_id = $result_assc_array["picCollectionId"];

//genarate next primary key -> tblPiccollection
$next_primary_key_for_tblPicCollection = null;
if($last_used_tblPicCollection_id == null)
{
    $next_primary_key_for_tblPicCollection = 'PCT-00001';
}
else 
{
    $next_available_int =  intval(substr($last_used_tblPicCollection_id,4,5)) + 1;
    $next_primary_key_for_tblPicCollection = "PCT-". str_pad(strval($next_available_int),5,"0",STR_PAD_LEFT);
}

//echo $next_primary_key_for_tblPicCollection;


$album_name = $_POST['album_name'];
$selected_cat_id = $_POST['selected_cat'];

//echo $album_name;
//echo $selected_cat_id;

//Insert tblpiccollection
$insert_tblPicCollection_query = " INSERT INTO `tblpiccollection` (`picCollectionId`, `picCategoryId`, `mainHeader`, `discription`, `isPublish`, `itemOrder`, `addedDate`) VALUES
                                    ('${next_primary_key_for_tblPicCollection}', '${selected_cat_id}', '${album_name}', 'discription', '1', '1', '${date('Y-m-d H:i:s')}'); ";

mysqli_query($connection,$insert_tblPicCollection_query);

$length = $_POST['cart_length'];
$index = 1;

$file_save_path = "../../storage/". $next_primary_key_for_tblPicCollection;

//Make directory

if (!file_exists($file_save_path)) {
    mkdir($file_save_path, 0777, true);
}

while( $index <= $length)
{

    //get last used id -> tblPic
    $get_last_used_tblPic_id_query = "SELECT picId FROM `tblpic` ORDER BY picId DESC LIMIT 1;";
    $get_last_used_tblPic_id_result = mysqli_query($connection,$get_last_used_tblPic_id_query);
    $result_assc_array =  $get_last_used_tblPic_id_result->fetch_assoc(); //PIC-XXXXX
    $last_used_tblPic_id = $result_assc_array["picId"];

    //genarate next primary key -> tblPic
    $next_primary_key_for_tblPic = null;
    if($last_used_tblPic_id == null)
    {
        $next_primary_key_for_tblPic = 'PIC-00001';
    }
    else 
    {
        $next_available_int =  intval(substr($last_used_tblPic_id,4,5)) + 1;
        $next_primary_key_for_tblPic = "PIC-". str_pad(strval($next_available_int),5,"0",STR_PAD_LEFT);
    }


    $title =  $_POST['titel_'. $index] ;
    $photograhpher_name =  $_POST['photographer_name_'. $index] ;
    $info =  $_POST['info_'. $index] ;
    $img_name =  $_FILES['img_'. $index]['name'] ;
    $img_tmp =  $_FILES['img_'. $index]['tmp_name'] ;
    $img_save_path = $file_save_path .'/'. $img_name;
    $date_now = date('Y-m-d H:i:s');
    
    move_uploaded_file($img_tmp, $img_save_path);

    $insert_tblPic_quary = "INSERT INTO `tblpic` (`picId`, `picCollectionId`, `picPath`, `picHeader`, `discription`, `isPublish`, `photographerName`, `addedDate`) 
                            VALUES ('${next_primary_key_for_tblPic}', '${next_primary_key_for_tblPicCollection}', '${img_save_path}', '${title}', '${info}', '1', '${photograhpher_name}', '${date_now}');  ";

    mysqli_query($connection,$insert_tblPic_quary);

    

    $index ++;
}
