<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require("../../include/cdn.php");
    require("../../components/AdminHeader/index.php");
    ?>

    <?php {
        require("../../controllers/picture_album_control/get_single_album.php");
    }
    ?>

    <style>
        #pic__holder {
            width: 200px;
        }

        .tbl__Body 
        {
           padding: 20px; 
        }
    </style>
<h2 class="text-center text-primary mb-4 fw-bold">View Picture Album</h2>

    <?php
    if ($result = mysqli_fetch_assoc($get_picture_album_result)) {
        $active_status = null;
        if ($result['isPublish']) {
                    $active_status = "Active";
        } else {
                    $active_status = "Deactive";
        }

        echo "<h4 class='text-center text-success mb-4 fw-bold'>{$result['mainHeader']} > {$result['categoryName']} > {$active_status} {$result['picCollectionId']}</h4>
          <p class='text-center  text-muted mb-4 fw-bold'>{$result['discription']}</p>";

        echo " <input type='hidden' id='album_id' value='{$result['picCollectionId']}' />";
    }
    ?>
   
    <div class="container-fluid">
         <?php 
        if(isset($_COOKIE['active_pic_success']) && $_COOKIE['active_pic_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" id="server_msg" role="alert">
                    Picture activate Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['in_active_pic_success']) && $_COOKIE['in_active_pic_success'] == true){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="server_msg">
                    Picture Category Inactivate Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['delete_pic_success']) && $_COOKIE['delete_pic_success'] == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
                    Product Delete Successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };

        if(isset($_COOKIE['delete_pic_success']) && $_COOKIE['delete_pic_success'] == false){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="server_msg">
                    Please Try Again ! 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        };
    ?>
    </div>
    

    <div class="tbl__Body">
        <table id="" class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Picture Id</th>
                    <th>Picture</th>
                    <th>Header</th>
                    <th>Description</th>
                    <th>Photographer Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result_pic = mysqli_fetch_assoc($get_pictures_result)) {
                    echo "<tr>
                <td>{$result_pic['picId']}</td>
                <td><img id='pic__holder' src='{$result_pic['picPath']}' alt='{$result_pic['picId']}' class='img-thumbnail'/></td>
                <td>{$result_pic['picHeader']}</td>
                <td>{$result_pic['discription']}</td>
                <td>{$result_pic['photographerName']}</td>";
                    if ($result_pic['isPublish']) {
                        echo '<td class="text-success">Active</td>';
                    } else {
                        echo '<td class="text-danger">Inactive</td>';
                    }

                    if ($result_pic['isPublish']) {
                        echo "<td>
                                <a href='../../controllers/pic_control/in_activate_pic.php?id={$result_pic['picId']}' class='btn btn-warning btn-sm'>Inactive</a>
                              </td>";
                    } else {
                        echo "<td>
                                <a href='../../controllers/pic_control/activate_pic.php?id={$result_pic['picId']}' class='btn btn-success btn-sm'>Active</a>
                              </td>";
                    }


                    echo " 
                        <td>
                            <button id='btn-delete' value='{$result_pic['picPath']}' class='btn btn-danger btn-sm btn-delete'>Delete</button>
                        </td>
                    ";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<div id="msg__box__div"></div>
<script type="module" src="view-album.js"></script>
</body>

</html>