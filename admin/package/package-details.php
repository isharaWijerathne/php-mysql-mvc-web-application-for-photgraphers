<?php
// CDN
require("../../include/cdn.php");

// Admin Header
require("../../components/AdminHeader/index.php");
?>

<div class="container mt-5">
    <h3 class="text-center mb-4 fw-bold text-primary">Package List</h3>

    <?php if (isset($_COOKIE['package_edit_success']) && $_COOKIE['package_edit_success'] == true): ?>
        <div class="alert alert-success alert-dismissible fade show" id="server_msg" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            Package Edited Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm rounded-3 border">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Package ID</th>
                    <th>Pic Category ID</th>
                    <th>Category Name</th>
                    <th>Package Header</th>
                    <th>Line One</th>
                    <th>Line Two</th>
                    <th>Line Three</th>
                    <th>Package Info</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                            <td>\${$result['price']}</td>
                            <td>
                                <a href='../../admin/package/edit-package.php?id={$result['packageID']}' class='btn btn-sm btn-outline-primary'>
                                    <i class='bi bi-pencil-square'></i> Edit
                                </a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Auto hide alert after 5 seconds
    const serverMessage = document.getElementById("server_msg");
    if (serverMessage) {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(serverMessage);
            bsAlert.close();
        }, 5000);
    }
</script>
