<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>





<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="m-3 mt-5 p-2 border rounded ">

                <h5 class="text-center text-warning">Edit New Package</h5>

                <?php require("../../controllers/package_control/get_single_package.php");
                
                     $result_h = mysqli_fetch_assoc($get_package_result) ;
                ?>
                <form class="row g-3" method="post" action="../../controllers/package_control/edit_package.php" >

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Package Header</label>
                        <input type="text" class="form-control" name="package_header" value="<?php echo $result_h['pcakageHeader'] ?>" required/>
                        <input type="hidden" class="form-control" name="package_id" value="<?php echo $result_h['packageID'] ?>" required/>
                    </div>

                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Package Category</label>
                        <select id="selected_cat" class="form-select" name="selected_cat_">
                            <option value="" selected>Choose...</option>

                            <?php
                            //resutt -> $get_picture_category_active_result {get data from controller}
                            require("../../controllers/picture_category_control/get_active_category.php");

                            while ($result = mysqli_fetch_assoc($get_picture_category_active_result)) {
                                
                                if($result['picCategoryId'] == $result_h['picCategoryId'])
                                {
                                    echo "<option selected value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
                                }
                                else 
                                {
                                    echo "<option value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
                                }
                            }

                            ?>

                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line One</label>
                        <input type="text" class="form-control" name="line_one" value="<?php echo $result_h['packageInforLineOne'] ?>" >
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line Two</label>
                        <input type="text" class="form-control" name="line_two" value="<?php echo $result_h['packageInforLineTwo'] ?>" >
                    </div>


                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Line Three</label>
                        <input type="text" class="form-control" name="line_three" value="<?php echo $result_h['packageInforLineThree'] ?>" >
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Package Details</label>
                        <textarea class="form-control" name="package_details" ><?php echo $result_h['packageInfor'] ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Price</label>
                        <input class="form-control" name="price" value="<?php echo $result_h['price'] ?>" ></input>
                    </div>

                     <div class="col-md-12">
                        <button class="btn btn-primary" id="btn">Edit Package</button>
                    </div>
            </div>

           

        </div>


        </form>
    </div>

</div>
</div>
</div>