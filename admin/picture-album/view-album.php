<?php 
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>


<?php
//Single Picture 
// if(isset($_GET['id'])) 
{
    require("../../controllers/picture_album_control/get_single_album.php");

    // if ($result = mysqli_fetch_assoc($get_picture_album_result)) 
    // {
    //     echo $result['picCollectionId'];
    //     echo $result['picCategoryId'];
    //     echo $result['categoryName'];
    //     echo $result['mainHeader'];
    //     echo $result['discription'];
    //     echo $result['isPublish'];
    // }

    // while ($result_pic = mysqli_fetch_assoc($get_pictures_result))
    // {
    //     echo $result_pic['picId'];
    //     echo $result_pic['picPath'];
    //     echo $result_pic['picHeader'];
    //     echo $result_pic['discription'];
    //     echo $result_pic['isPublish'];
    //     echo $result_pic['photographerName'];
    //     echo "<br>";

    //     echo " <img src='{$result_pic['picPath']}' alt='path' />  ";
    // }
    
}

?>


<style>
        #pic__holder 
        {
            width: 200px;
        }

        #table__picList 
        {
            margin: 20px;
           
        }
</style>



<?php 

     if($result = mysqli_fetch_assoc($get_picture_album_result))
     {
        echo "<h1>{$result['mainHeader']}</h1>
                <h4>{$result['categoryName']}</h4>
                <h4>{$result['discription']}</h4>
               ";

                if($result['discription'])
                {
                    echo ' <h4>Active</h4>';
                }
                else
                {
                    echo ' <h4>InActive</h4>';
                }
     }

?>

<table id="table__picList" class="table">
    <tr>
        <th>Picture Id</th>
        <th>Picture</th>
        <th>Header</th>
        <th>Description</th>
        <th>Photographer Name</th>
        <th>Status</th>
    </tr>

   
    <?php 

    while($result_pic = mysqli_fetch_assoc($get_pictures_result))
    {
        echo "
        <tr>
        <td>{$result_pic['picId']}</td>
        <td>
            <img id='pic__holder' src='{$result_pic['picPath']}' alt='{$result_pic['picId']}' class='img-thumbnail'/>
        </td>
        <td>{$result_pic['picHeader']}</td>
        <td>{$result_pic['discription']}</td>
        <td>{$result_pic['photographerName']}</td>
            ";
        if($result_pic['isPublish'])
        {
            echo '<td>Active</td>';
        }
        else 
        {
            echo "<td>InActive</td>";
        }
    
        echo "</tr>";
    
        }

    ?>
</table>
