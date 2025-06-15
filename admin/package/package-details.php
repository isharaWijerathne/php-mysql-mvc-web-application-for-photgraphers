<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>
<h3 class="text-center mb-5 ">Package List</h3>

<div class="container mt-5">
    <?php 
        if(isset($_COOKIE['package_edit_success']) && $_COOKIE['package_edit_success'] == true){
            echo ' <div class="alert alert-success" id="server_msg" role="alert">
                        Package Create Successful
                    </div>';
        };
   
    ?>
   
</div>


<script>
    

//hide sesstion message
const server_mesasge_window = document.getElementById("server_msg");

//hide after show 5sec
if(server_mesasge_window !=null)
    {
         var hide_message =    setInterval(()=>
                                    {
                                        server_mesasge_window.style.display = "none";
                                        console.log("work");
                                        clearInterval(hide_message)
                                    },5000)

    }
</script>
<div class="container">
    <table class="table">
        <tr>
            <th>Package ID</th>
            <th>Pic Category ID</th>
            <th>Category Name</th>
            <th>Package Header</th>
            <th>Line One</th>
            <th>Line Two</th>
            <th>Line Three</th>
            <th>Package Infor</th>
            <th>Price</th>
            <th>Edit</th>
        </tr>
        <?php 
        
        // << $result >> variable from get_package_result
        require("../../controllers/package_control/get_package.php");

        while ($result = mysqli_fetch_assoc($get_package_result)) {
            echo "<tr>
                    <td>{$result['packageID']}</td>
                    <td>{$result['picCategoryId']}</td>
                    <td>{$result['categoryName']}</td>
                    <td>{$result['pcakageHeader']}</td>
                    <td>{$result['packageInforLineOne']}</td>
                    <td>{$result['packageInforLineTwo']}</td>
                    <td>{$result['packageInforLineThree']}</td>
                    <td>{$result['packageInfor']}</td>
                    <td>{$result['price']}</td> ";

             echo "<td> 
                        <a id='btn-delete'  class='btn btn-primary btn-delete' href='../../admin/package/edit-package.php?id={$result['packageID']}' >Edit</a>
                    </td>";
            echo  "</tr>";

        }
        
        
        ?>
    </table>
</div>
