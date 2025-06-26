<?php
// CDN
require("../../include/cdn.php");

// Admin Header
require("../../components/AdminHeader/index.php");
?>

<div class="container mt-5">
    <h3 class="text-center mb-4 fw-bold text-primary">My Enquiry</h3>

    <?php if (isset($_COOKIE['delete__enquiry_success']) && $_COOKIE['delete__enquiry_success'] == true): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
                <i class="bi bi-check-circle-fill me-2"></i>
                Enquiry deleted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm rounded-3 border">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Enquiry ID</th>
                    <th>Package ID</th>
                    <th>Package Header</th>
                    <th>Customer Name</th>
                    <th>Customer Number</th>
                    <th>Email</th>
                    <th>View Dates</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("../../controllers/enquiry_control/get_enquiry.php");
                while ($result = mysqli_fetch_assoc($get_enquiry_result)) {
                    echo "<tr>
                            <td>{$result['enquiryID']}</td>
                            <td>{$result['packageID']}</td>
                            <td>{$result['pcakageHeader']}</td>
                            <td>{$result['customerName']}</td>
                            <td>{$result['contactNum']}</td>
                            <td>{$result['email']}</td>
                            <td>
                                <a href='../../admin/enquiry/dates.php?id={$result['enquiryID']}' class='btn btn-sm btn-outline-primary'>
                                     Show enquiry dates
                                </a>
                            </td>
                             <td>
                                <a href='../../controllers/enquiry_control/delete_enquiry.php?id={$result['enquiryID']}' class='btn btn-sm btn-outline-danger  btn-delete'>
                                    Delete
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
    const serverMessage = document.getElementById("server_msg");
        if (serverMessage) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(serverMessage);
                bsAlert.close();
            }, 5000);
        }

</script>