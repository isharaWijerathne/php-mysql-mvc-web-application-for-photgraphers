<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>

<div class="container mt-1">
    <?php 
        if(isset($_COOKIE['create_package_success']) && $_COOKIE['create_package_success'] == true){
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



<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="m-3 mt-5 p-2 border rounded ">

                <h5 class="text-center text-warning">Create New Package</h5>

                <form class="row g-3" method="post" action="../../controllers/package_control/create_package.php" >

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Package Header</label>
                        <input type="text" class="form-control" name="package_header" required/>
                    </div>

                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Package Category</label>
                        <select id="selected_cat" class="form-select" name="selected_cat_">
                            <option value="" selected>Choose...</option>

                            <?php
                            //resutt -> $get_picture_category_active_result {get data from controller}
                            require("../../controllers/picture_category_control/get_active_category.php");

                            while ($result = mysqli_fetch_assoc($get_picture_category_active_result)) {
                                echo "<option value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
                            }

                            ?>

                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line One</label>
                        <input type="text" class="form-control" name="line_one">
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line Two</label>
                        <input type="text" class="form-control" name="line_two">
                    </div>


                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line Three</label>
                        <input type="text" class="form-control" name="line_three">
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Package Details</label>
                        <textarea class="form-control" name="package_details" ></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Price</label>
                        <input class="form-control" name="price"></input>
                    </div>

                     <div class="col-md-12">
                        <button class="btn btn-primary" id="btn">Create Package</button>
                    </div>
            </div>

           

        </div>


        </form>
    </div>

</div>
</div>
</div>