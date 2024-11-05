<?php
require("../../include/cdn.php");
    require("../../components/mainHeader/mainHeader.php");

    require("../../components/mainFotter/mainFotter.php");

    //This import will provide AlbumCart function
    require("../../components/AlbumCart/AlbumCart.php");

  
    //this import provide get_album_details & get_pic_details
    require("../../controllers/picture_album_control/get_picAlbum_for_gallery_cart.php");

    $data_for_pic_cart = [];
    $first = 0;
    while($result = mysqli_fetch_assoc($get_ablum_details)){
        
        mysqli_data_seek($get_pic_details, 0);

        $data_for_pic_cart[$first]["pic_cat"] = $result["categoryName"];
        $data_for_pic_cart[$first]["header"] = $result['mainHeader'];

         $second = 0;
            while($result_innder = mysqli_fetch_assoc($get_pic_details)){

                if(  $result['picCollectionId'] == $result_innder["picCollectionId"] ){
                    //echo $result_innder['picPath'];
                    //echo " <img src= '{$result_innder['picPath']}' />";
                    
                    $data_for_pic_cart[$first]["img_".$second] = $result_innder['picPath'];

                    $second ++;
                }

                
            }

        $second = 0;
        $first ++;;
    }

       // print_r($data_for_pic_cart);

       echo "<div class='container-fluid'>
       <div class='row'> ";

        foreach ($data_for_pic_cart as $value) {
            echo "<div class='col-sm'>";
            AlbumCart(
                $value["img_0"],
                $value["img_1"],
                $value["img_2"],
                $value["img_3"],
                $value['pic_cat'],
                $value['header']
            );
            echo "</div>";

        }
   
        echo "</div>
        </div>";
       
      

   