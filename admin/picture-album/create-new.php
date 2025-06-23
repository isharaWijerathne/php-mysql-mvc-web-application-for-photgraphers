<?php
//cdn
require("../../include/cdn.php");

//Admin Header
require("../../components/AdminHeader/index.php");
?>

<h3 class="text-center mb-5">Create New Pic Album</h3>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">

      <div class="m-3 p-3 border rounded shadow-sm bg-light">
        <h5 class="text-center text-danger mb-4">Album Details</h5>

        <div class="mb-3">
          <label for="album_name" class="form-label">Album Name</label>
          <input type="text" id="album_name" class="form-control" />
        </div>

        <div class="mb-3">
          <label for="selected_cat" class="form-label">Picture Category</label>
          <select id="selected_cat" class="form-select">
            <option value="" selected>Choose...</option>

            <?php 
              require("../../controllers/picture_category_control/get_active_category.php");
              while($result = mysqli_fetch_assoc($get_picture_category_active_result)) {
                echo "<option value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
              }
            ?>
          </select>
        </div>
      </div>

      <div class="m-3 mt-5 p-3 border rounded shadow-sm bg-light">
        <h5 class="text-center text-warning mb-4">Picture Cart</h5>

        <form class="row g-3">
          <div class="mb-3">
            <label for="title" class="form-label">Picture Title</label>
            <input type="text" class="form-control" id="title" />
          </div>

          <div class="mb-3">
            <label for="photographer_name" class="form-label">Photographer Name</label>
            <input type="text" class="form-control" id="photographer_name" />
          </div>

          <div class="mb-5">
            <label for="editor" class="form-label">Photographer Details</label>
            <div id="editor" class="border rounded p-2" style="min-height:100px;"></div>
          </div>

          <div class="mb-3">
            <input type="file" class="form-control" id="file_location" />
          </div>

          <div>
            <button class="btn btn-primary" id="btn">Add To Cart</button>
          </div>
        </form>
      </div>

    </div>

    <div class="col-6">
      <div class="m-5" id="cartTable"></div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Picture</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
              <div class="mb-3">
                <label for="title_edit" class="form-label">Picture Title</label>
                <input type="text" class="form-control" id="title_edit" />
              </div>

              <div class="mb-3">
                <label for="photographer_name_edit" class="form-label">Photographer Name</label>
                <input type="text" class="form-control" id="photographer_name_edit" />
              </div>

              <div class="mb-5">
                <label for="editor_edit" class="form-label">Photographer Details</label>
                <div id="editor_edit" class="border rounded p-2" style="min-height:100px;"></div>
              </div>

              <div class="mb-3">
                <input type="file" class="form-control" id="file_location_edit" />
              </div>

              <div class="mb-3">
                <img id="edit_img" class="img-thumbnail" style="width: 150px;" alt="Preview Image" />
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSaveChangeEdit">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="add-to-cart.js"></script>
