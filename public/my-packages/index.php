<?php
require("../../include/cdn.php");
require("../../components/mainHeader/mainHeader.php");

require("../../components/mainFotter/mainFotter.php");
?>

<div class="container">
    <div class="row justify-content-center">


<?php
require("../../controllers/package_control/get_package.php");

//Get Card Componet
  require("../../components/packageCard/packageCard.php");

    while ($result = mysqli_fetch_assoc($get_package_result)) {
        PackageCart($result['pcakageHeader'],$result['packageInforLineOne'],$result['packageInforLineTwo'],$result['packageInforLineThree'],$result['categoryName'],$result['packageInfor'],$result['price']);
    }
?>

    </div>
</div>

