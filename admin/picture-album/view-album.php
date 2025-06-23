<?php 
require("../../include/cdn.php");
require("../../components/AdminHeader/index.php");
?>

<?php
{
    require("../../controllers/picture_album_control/get_single_album.php");
}
?>

<style>
    #pic__holder {
        width: 200px;
    }
    #table__picList {
        margin: 20px 0;
    }
</style>

<?php 
if($result = mysqli_fetch_assoc($get_picture_album_result))
{
    echo "<h1 class='mb-3'>{$result['mainHeader']}</h1>
          <h4 class='mb-1'>{$result['categoryName']}</h4>
          <h5 class='mb-3'>{$result['discription']}</h5>";
    if($result['discription']) {
        echo '<h5 class="text-success">Active</h5>';
    } else {
        echo '<h5 class="text-danger">Inactive</h5>';
    }
}
?>

<div class="table-responsive">
<table id="table__picList" class="table table-striped table-hover align-middle">
    <thead class="table-primary">
        <tr>
            <th>Picture Id</th>
            <th>Picture</th>
            <th>Header</th>
            <th>Description</th>
            <th>Photographer Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    while($result_pic = mysqli_fetch_assoc($get_pictures_result))
    {
        echo "<tr>
                <td>{$result_pic['picId']}</td>
                <td><img id='pic__holder' src='{$result_pic['picPath']}' alt='{$result_pic['picId']}' class='img-thumbnail'/></td>
                <td>{$result_pic['picHeader']}</td>
                <td>{$result_pic['discription']}</td>
                <td>{$result_pic['photographerName']}</td>";
        if($result_pic['isPublish']) {
            echo '<td class="text-success">Active</td>';
        } else {
            echo '<td class="text-danger">Inactive</td>';
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</div>
