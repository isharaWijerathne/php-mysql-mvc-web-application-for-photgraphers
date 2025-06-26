<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Dates</title>
</head>

<body>
    <?php
    // CDN
    require("../../include/cdn.php");

    // Admin Header
    require("../../components/AdminHeader/index.php");
    ?>

    <div class="container mt-5">
        <h3 class="text-center mb-4 fw-bold text-primary">Enquiry Dates For <?php echo $_GET["id"]; ?> </h3>

        <div class="table-responsive shadow-sm rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Enquiry Date ID</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../../controllers/enquiry_control/get_enquiry_date.php");

                    while ($result = mysqli_fetch_assoc($eqnuiry_result)) {
                        echo "<tr>
                            <td>{$result['enquiryDateID']}</td>
                            <td>{$result['selectedDate']}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>