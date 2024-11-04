<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");

?>

<h3 class="text-center mb-5 ">Create new pic album</h3>

<body>



<div class="container-fluid">
    <div class="row">
        <div class="col-6">

            <div class="m-3 p-2 border rounded ">
                <h5 class="text-center text-danger">Album Details</h5>

                <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Album Name</label>
                        <input type="text" id="album_name" class="form-control"/>
                </div>

                <div class="col-md-12">
                    <label for="inputState" class="form-label">Picture Category</label>
                    <select id="selected_cat" class="form-select">
                    <option value="" selected >Choose...</option>

                        <?php 
                            //resutt -> $get_picture_category_active_result {get data from controller}
                            require("../../controllers/picture_category_control/get_active_category.php");

                            while($result = mysqli_fetch_assoc($get_picture_category_active_result))
                            {
                                echo "<option value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
                            }

                        ?>

                    </select>
                </div>
            </div>

            <div class="m-3 mt-5 p-2 border rounded ">

                <h5 class="text-center text-warning">Picture Cart</h5>

                <form class="row g-3">
                        
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Picture Title</label>
                        <input type="text" class="form-control" id="title">
                    </div>


                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Photographer Name</label>
                        <input type="text" class="form-control" id="photographer_name">
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="inputEmail4" class="form-label">Photographer Details</label>
                        <div id="editor">        
                        </div>
                    </div>

                    <div class="mt-5 col-md-12">
                        <input type="file" class="form-control" id="file_location">
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary" id="btn">Add To Cart</button>
                    </div>
                        
                </form>
            </div>

        </div>
        <div class="col-6">
            <div class="m-5" id="cartTable">
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-8">
                                <label for="inputEmail4" class="form-label">Picture Title</label>
                                <input type="text" class="form-control" id="title_edit">
                            </div>

                            <div class="col-md-8">
                                <label for="inputEmail4" class="form-label">Photographer Name</label>
                                <input type="text" class="form-control" id="photographer_name_edit">
                            </div>

                            <div class="col-md-8 mb-5">
                                <label for="inputEmail4" class="form-label">Photographer Details</label>
                                <div id="editor_edit"></div>

                            </div>

                            <div class="mt-5 col-md-8">
                                <input type="file" class="form-control" id="file_location_edit">
                            </div>

                            <div class="mt-s col-md-8">
                            <img id="edit_img" class="img-thumbnail" style="width : 150px" alt="asd"/>
                            </div>
                            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnSaveChangeEdit" >Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>






      



    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="add-to-cart.js"></script>
</body>