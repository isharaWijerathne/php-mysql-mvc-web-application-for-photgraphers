<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Malcums World</title>
     <link rel="stylesheet" href="style.css">
</head>
<body class="main__body">

<?php
    require("../include/cdn.php");
    require("../components/mainHeader/mainHeader.php");

    require("../components/mainFotter/mainFotter.php");

?>
<div class="container-fluid py-5">
    <div class="row align-items-center">
      <!-- Tagline -->
      <div class="col-md-6 d-flex justify-content-center mb-4 mb-md-0">
        <div class="tagline__div text-center">
          <h1 class="tag__line__one">Capturing</h1>
          <h1 class="tag__line__two">Moments,</h1>
          <h1 class="tag__line__three">Creating</h1>
          <h1 class="tag__line__four">Memories</h1>
        </div>
      </div>

      <!-- Photography Types -->
      <div class="col-md-6 ptgy__cart__holder px-4">
        <div class="ptgy__type__cart mb-4 text-center">
          <h1>Wildlife</h1>
          <h2>Photography</h2>
        </div>
        <div class="ptgy__type__cart mb-4 text-center">
          <h1>Wedding</h1>
          <h2>Photography</h2>
        </div>
        <div class="ptgy__type__cart mb-4 text-center">
          <h1>Portrait</h1>
          <h2>Photography</h2>
        </div>
        <div class="ptgy__type__cart text-center">
          <h1>Event</h1>
          <h2>Photography</h2>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

