<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Packages</title>
</head>

<body>
    <?php
    require("../../include/cdn.php");
    require("../../components/mainHeader/mainHeader.php");

    require("../../components/mainFotter/mainFotter.php");
    ?>

    <style>
         body 
         {
            overflow-x: hidden;
        background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);
    
         }
    </style>

    <div class="container">
        <div class="row justify-content-center">


            <?php
            require("../../controllers/package_control/get_package.php");

            //Get Card Componet
            require("../../components/packageCard/packageCard.php");

            while ($result = mysqli_fetch_assoc($get_package_result)) {
                PackageCart($result['pcakageHeader'], $result['packageInforLineOne'], $result['packageInforLineTwo'], $result['packageInforLineThree'], $result['categoryName'], $result['packageInfor'], $result['price']);
            }
            ?>

        </div>
    </div>


</body>

</html>