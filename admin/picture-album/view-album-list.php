<?php 
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");
?>

<h3 class="text-center mb-5">View Picture Album</h3>

<div class="container mb-4">
    <?php 
        if(isset($_COOKIE['active_album_pic_success']) && $_COOKIE['active_album_pic_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" id="server_msg" role="alert">
                    Picture Album Activated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

        if(isset($_COOKIE['in_active_album_pic_success']) && $_COOKIE['in_active_album_pic_success'] == true){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="server_msg">
                    Picture Album Inactivated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

        if(isset($_COOKIE['active_categort_success']) && $_COOKIE['active_categort_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
                    Product Category Activated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

        if(isset($_COOKIE['delete_categort_success']) && $_COOKIE['delete_categort_success'] == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="server_msg">
                    Product Category Deleted Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    ?>
</div>

<div class="container">
    <div class="table-responsive shadow-sm rounded border">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
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
            </thead>
            <tbody>
                <?php 
                require("../../controllers/picture_album_control/get_view_album.php");

                while ($result = mysqli_fetch_assoc($get_album_details_result)) {
                    echo "<tr>";
                    echo "<td>{$result['picCollectionId']}</td>";
                    echo "<td>{$result['picCategoryId']}</td>";
                    echo "<td>{$result['categoryName']}</td>";
                    echo "<td>{$result['mainHeader']}</td>";
                    echo "<td>{$result['discription']}</td>";
                    
                    echo "<td>" . ($result['isPublish'] ? "Active" : "Deactive") . "</td>";
                    
                    if ($result['isPublish']) {
                        echo "<td>
                                <a href='../../controllers/picture_album_control/in_active_picture_album.php?id={$result['picCollectionId']}' class='btn btn-warning btn-sm'>Inactive</a>
                              </td>";
                    } else {
                        echo "<td>
                                <a href='../../controllers/picture_album_control/active_picture_album.php?id={$result['picCollectionId']}' class='btn btn-success btn-sm'>Active</a>
                              </td>";
                    }

                    echo "<td>
                            <button id='btn-delete' value='{$result['picCategoryId']}' class='btn btn-danger btn-sm btn-delete'>Delete</button>
                          </td>";

                    echo "<td>
                            <a href='../../admin/picture-album/view-album.php?id={$result['picCollectionId']}' class='btn btn-primary btn-sm'>View More</a>
                          </td>";
                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="view-album-list.js"></script>
