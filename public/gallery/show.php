<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album Slideshow</title>
</head>

<body>
  <?php
  require("../../include/cdn.php");
  require("../../components/mainHeader/mainHeader.php");

  require("../../components/mainFotter/mainFotter.php");


  require("../../controllers/picture_album_control/get_pic_for_show.php");

  
  ?>
  <style>
    body {
      overflow-x: hidden;
    }
    .text__color {
      color: white;
    }

    .img__l {
      max-height: 100vh;
      width: 100%;
      object-fit: cover;
    }
  </style>
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner bg-prim-ary">

      <?php
      $isFirst = true; // flag for first slide
      while ($result = mysqli_fetch_assoc($get_picture_result)) {
        $activeClass = $isFirst ? 'active' : '';
        echo "
                <div class='carousel-item $activeClass' data-bs-interval='2000'>
                    <div class='d-flex justify-content-center' >
                      <img src='{$result['picPath']}' class='d-block w-100- img__l' alt='...'>
                    </div>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5 class=' bg-dark text__color'>{$result['picHeader']}</h5>
                        <div class=' bg-dark text__color' >{$result['discription']}</div>
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

</body>

</html>