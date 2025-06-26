<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
</head>
<body>
    <?php
// CDN
require("../../include/cdn.php");

// Admin Header
require("../../components/AdminHeader/index.php");

require("../../controllers/package_control/get_single_package.php");
$result_h = mysqli_fetch_assoc($get_package_result);

require("../../controllers/picture_category_control/get_active_category.php");
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-center">
                    <h5 class="mb-0 text-white">Edit Package</h5>
                </div>
                <div class="card-body">

                    <form method="post" action="../../controllers/package_control/edit_package.php" novalidate>

                        <input type="hidden" name="package_id" value="<?php echo htmlspecialchars($result_h['packageID']); ?>" />

                        <div class="mb-3">
                            <label for="package_header" class="form-label fw-semibold">Package Header <span class="text-danger">*</span></label>
                            <input type="text" id="package_header" name="package_header" class="form-control" value="<?php echo htmlspecialchars($result_h['pcakageHeader']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="selected_cat" class="form-label fw-semibold">Package Category <span class="text-danger">*</span></label>
                            <select id="selected_cat" name="selected_cat_" class="form-select" required>
                                <option value="" disabled <?php echo empty($result_h['picCategoryId']) ? 'selected' : ''; ?>>Choose...</option>
                                <?php
                                while ($result = mysqli_fetch_assoc($get_picture_category_active_result)) {
                                    $selected = ($result['picCategoryId'] == $result_h['picCategoryId']) ? "selected" : "";
                                    echo "<option value='{$result['picCategoryId']}' $selected>{$result['categoryName']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="line_one" class="form-label fw-semibold">Line One</label>
                            <input type="text" id="line_one" name="line_one" class="form-control" value="<?php echo htmlspecialchars($result_h['packageInforLineOne']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="line_two" class="form-label fw-semibold">Line Two</label>
                            <input type="text" id="line_two" name="line_two" class="form-control" value="<?php echo htmlspecialchars($result_h['packageInforLineTwo']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="line_three" class="form-label fw-semibold">Line Three</label>
                            <input type="text" id="line_three" name="line_three" class="form-control" value="<?php echo htmlspecialchars($result_h['packageInforLineThree']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="package_details" class="form-label fw-semibold">Package Details</label>
                            <textarea id="package_details" name="package_details" class="form-control" rows="4"><?php echo htmlspecialchars($result_h['packageInfor']); ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                            <input type="number" id="price" name="price" class="form-control" min="0" step="0.01" value="<?php echo htmlspecialchars($result_h['price']); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Edit Package</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>