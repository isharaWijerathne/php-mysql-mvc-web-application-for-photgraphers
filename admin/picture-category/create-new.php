<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");
?>

<h1 class="text-center my-4">Create New Picture Category</h1>

<div class="container">

    <?php 
        if(isset($_COOKIE['create_categort_success']) && $_COOKIE['create_categort_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" id="server_msg" role="alert">
                    Product Category Create Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['in_active_categort_success']) && $_COOKIE['in_active_categort_success'] == true){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="server_msg">
                    Product Category Inactivate Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['active_categort_success']) && $_COOKIE['active_categort_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
                    Product Category activate Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['delete_categort_success']) && $_COOKIE['delete_categort_success'] == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="server_msg">
                    Product Category Delete Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };
    ?>
   
</div>

<form method="POST" action="../../controllers/picture_category_control/create_category.php" class="m-5 p-4 border rounded shadow-sm bg-light">
  <div class="mb-3">
    <label for="category_name" class="form-label fw-semibold">Picture Category</label>
    <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Picture Category Id</th>
                    <th>Picture Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // << $get_picture_category_result >> variable from picture control
                require("../../controllers/picture_category_control/get_category.php");

                while ($result = mysqli_fetch_assoc($get_picture_category_result)) {
                    echo "<tr>
                            <td>{$result['picCategoryId']}</td>
                            <td>{$result['categoryName']}</td>
                            <td>" . ($result['isCategoryActive'] ? "Active" : "Inactive") . "</td>";
                    
                    if ($result['isCategoryActive']) {
                        echo "<td>
                                <a href='../../controllers/picture_category_control/in_active_category.php?id={$result['picCategoryId']}' class='btn btn-warning btn-sm'>Inactive</a>
                              </td>";
                    } else {
                        echo "<td>
                                <a href='../../controllers/picture_category_control/active_category.php?id={$result['picCategoryId']}' class='btn btn-success btn-sm'>Active</a>
                              </td>";
                    }

                    echo "<td>
                            <button id='btn-delete' value='{$result['picCategoryId']}' class='btn btn-danger btn-sm btn-delete'>Delete</button>
                          </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div id="msg__box__div"></div>
<script type="module" src="create-new-category.js"></script>
