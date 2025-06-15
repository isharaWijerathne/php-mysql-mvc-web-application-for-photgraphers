<?php 
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>

<h3 class="text-center mb-5 ">View Picture Album</h3>

<div class="container">
    <?php 
        if(isset($_COOKIE['active_album_pic_success']) && $_COOKIE['active_album_pic_success'] == true){
            echo ' <div class="alert alert-success" id="server_msg" role="alert">
                        Picture Album Activated Succesfully
                    </div>';
        };

        if(isset($_COOKIE['in_active_album_pic_success']) && $_COOKIE['in_active_album_pic_success'] == true){
            echo ' <div class="alert alert-warning" role="alert" id="server_msg" >
                         Picture Album Inactivated Succesfully
                    </div>';
        };

        if(isset($_COOKIE['active_categort_success']) && $_COOKIE['active_categort_success'] == true){
            echo ' <div class="alert alert-success" role="alert" id="server_msg" >
                        Product Category activate Successful
                    </div>';
        };

        if(isset($_COOKIE['delete_categort_success']) && $_COOKIE['delete_categort_success'] == true){
            echo ' <div class="alert alert-danger" role="alert" id="server_msg" >
                        Product Category Delete Successful
                    </div>';
        };

    
        
    ?>
   
</div>

<div class="container">
    <table class="table">
        <tr>
            <th>Picture Collection Id</th>
            <th>Picture Category Id</th>
            <th>Category Name</th>
            <th>Main Header</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
            <th>Delete</th>
            <th>View More</th>
        </tr>
        <?php 
        
        // << $get_picture_category_result >> variable from picture control
        require("../../controllers/picture_album_control/get_view_album.php");

        while ($result = mysqli_fetch_assoc($get_album_details_result)) {
           
                echo "<tr>";
                    echo "<td> {$result['picCollectionId']} </td>";
                    echo "<td> {$result['picCategoryId']} </td>";
                    echo "<td> {$result['categoryName']} </td>";
                    echo "<td> {$result['mainHeader']} </td>";
                    echo "<td> {$result['discription']} </td>";
                    if($result['isPublish'])
                    {
                        echo "<td>Active</td>";
                    }
                    else
                    {
                        echo "<td>Deactive</td>";
                    }

                    if ($result['isPublish']) {
                        echo "<td>
                            <a href='../../controllers/picture_album_control/in_active_picture_album.php?id={$result['picCollectionId']}' class='btn btn-warning'>Inactive</a>
                         </td>";
                    } else {
                        echo "<td>
                                <a href='../../controllers/picture_album_control/active_picture_album.php?id={$result['picCollectionId']}' class='btn btn-success'>Active</a>
                            </td>";
                    }

                    
                    echo "<td>
                        <button id='btn-delete' value='{$result['picCategoryId']}'  class='btn btn-danger btn-delete'>Delete</button>
                    </td>";

                    echo "<td> 
                        <a id='btn-delete'  class='btn btn-primary btn-delete' href='../../admin/picture-album/view-album.php?id={$result['picCollectionId']}' >View More</a>
                    </td>";

                echo "</tr>";
                
        }
        
        
        ?>
    </table>
</div>

 <script src="view-album-list.js"></script>