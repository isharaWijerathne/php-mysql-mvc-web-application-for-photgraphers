<?php 
require("../../include/cdn.php");
require("../../components/mainHeader/mainHeader.php");

require("../../components/mainFotter/mainFotter.php");


require("../../controllers/picture_album_control/get_pic_for_show.php");


?>
<style>
    .text__color 
    {
        color: white;
    }

    .img__l 
    {
        width: 500px;
    }
</style>
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

    <?php 
        $isFirst = true; // flag for first slide
        while($result = mysqli_fetch_assoc($get_picture_result)) {
            $activeClass = $isFirst ? 'active' : '';
            echo "
                <div class='carousel-item $activeClass' data-bs-interval='2000'>
                    <img src='{$result['picPath']}' class='d-bloc-k w-100' alt='...'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5 class='text__color'>{$result['picHeader']}</h5>
                        <div class='text__color' >{$result['discription']}</div>
                    </div>
                </div>
            ";
            $isFirst = false; // reset after first iteration
        }
    ?> 

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
