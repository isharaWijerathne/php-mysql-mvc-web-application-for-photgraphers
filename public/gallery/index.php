<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<style>
    body {
        overflow-x: hidden;
        background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);

    }
</style>
<body>
    <?php
    //Cdn
    require("../../include/cdn.php");
    //Main header
    require("../../components/mainHeader/mainHeader.php");
    //Main fotter
    require("../../components/mainFotter/mainFotter.php");

    // AlbumCart function
    require("../../components/AlbumCart/AlbumCart.php");

    // Controller get_pic_details
    require("../../controllers/picture_album_control/get_picAlbum_for_gallery_cart.php");

    $data_for_pic_cart = [];
    $first = 0;

    while ($result = mysqli_fetch_assoc($get_ablum_details)) {
        mysqli_data_seek($get_pic_details, 0);

        $data_for_pic_cart[$first]["pic_cat"] = $result["categoryName"];
        $data_for_pic_cart[$first]["header"] = $result['mainHeader'];

        $second = 0;

        while ($result_inner = mysqli_fetch_assoc($get_pic_details)) {
            if ($result['picCollectionId'] == $result_inner["picCollectionId"]) {
                $data_for_pic_cart[$first]["img_" . $second] = $result_inner['picPath'];
                $second++;
            }
        }

        $first++;
    }

    // Pagination logic
    $items_per_page = 4;
    $total_items = count($data_for_pic_cart);
    $total_pages = ceil($total_items / $items_per_page);

    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $current_page = max(1, min($current_page, $total_pages));

    $start_index = ($current_page - 1) * $items_per_page;
    $data_for_pic_cart_paginated = array_slice($data_for_pic_cart, $start_index, $items_per_page);

    // Album show
    echo "<div class='container-fluid'>
            <div class='row'>";

    foreach ($data_for_pic_cart_paginated as $value) {
        echo "<div class='col-12 col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center'>";
        //print_r($value);
        AlbumCart(
            $value["img_0"] ?? "",
            $value["img_1"] ?? "",
            $value["img_2"] ?? "",
            $value["img_3"] ?? "",
            $value['pic_cat'],
            $value['header'],
            preg_match('/PCT-\d{5}/', $value["img_2"] ?? "", $m) ? $m[0] : null
        );
        echo "</div>";
    }

    echo "</div></div>";

    // Pagination Controls
    echo "<div class='d-flex justify-content-center mt-4'>
            <nav>
                <ul class='pagination'>";

    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i === $current_page) ? "active" : "";
        echo "<li class='page-item $active'><a class='page-link' href='?page=$i'>$i</a></li>";
    }

    echo "  </ul>
            </nav>
        </div>";
    ?>
</body>
</html>
