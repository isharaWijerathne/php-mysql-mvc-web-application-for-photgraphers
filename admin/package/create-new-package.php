<?php
// CDN
require("../../include/cdn.php");
// Admin Header
require("../../components/AdminHeader/index.php");
?>

<div class="container mt-5">

    <?php if (isset($_COOKIE['create_package_success']) && $_COOKIE['create_package_success'] == true): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
            <i class="bi bi-check-circle-fill me-2"></i>
            Package Created Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-4 p-4 mt-4 mx-auto" style="max-width: 700px;">
        <h3 class="text-center text-primary mb-4 fw-bold">Create New Package</h3>
        

        <form method="post" action="../../controllers/package_control/create_package.php" class="row g-3">

            <div class="col-12">
                <label for="packageHeader" class="form-label fw-semibold">Package Header <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="packageHeader" name="package_header" required placeholder="Enter package header">
            </div>

            <div class="col-12">
                <label for="selectedCat" class="form-label fw-semibold">Package Category</label>
                <select id="selectedCat" class="form-select form-select-lg" name="selected_cat_">
                    <option value="" selected>Choose category...</option>
                    <?php
                    require("../../controllers/picture_category_control/get_active_category.php");
                    while ($result = mysqli_fetch_assoc($get_picture_category_active_result)) {
                        echo "<option value='{$result['picCategoryId']}'> {$result['categoryName']} </option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="lineOne" class="form-label fw-semibold">Line One</label>
                <input type="text" class="form-control" id="lineOne" name="line_one" placeholder="Line One">
            </div>
            <div class="col-md-4">
                <label for="lineTwo" class="form-label fw-semibold">Line Two</label>
                <input type="text" class="form-control" id="lineTwo" name="line_two" placeholder="Line Two">
            </div>
            <div class="col-md-4">
                <label for="lineThree" class="form-label fw-semibold">Line Three</label>
                <input type="text" class="form-control" id="lineThree" name="line_three" placeholder="Line Three">
            </div>

            <div class="col-12">
                <label for="packageDetails" class="form-label fw-semibold">Package Details</label>
                <textarea class="form-control" id="packageDetails" name="package_details" rows="4" placeholder="Describe the package"></textarea>
            </div>

            <div class="col-md-6">
                <label for="price" class="form-label fw-semibold">Price</label>
                <input type="number" min="0" step="0.01" class="form-control form-control-lg" id="price" name="price" placeholder="Enter price">
            </div>

            <div class="col-md-6 d-flex align-items-end justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg px-4 fw-semibold">
                    <i class="bi bi-plus-circle me-2"></i> Create Package
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    // Hide alert message after 5 seconds automatically
    const serverMessage = document.getElementById("server_msg");
    if (serverMessage) {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(serverMessage);
            bsAlert.close();
        }, 5000);
    }
</script>
