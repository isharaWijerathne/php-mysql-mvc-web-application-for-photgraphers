<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcolm Lismore Photography</title>
     <?php
        //Cdn
        require("../include/cdn.php");
        //Main Header
        require("../components/mainHeader/mainHeader.php");
        //Main Fotter
        require("../components/mainFotter/mainFotter.php");
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
      
            background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);

        }
        .hero {
            background: url('./malcom-photo.jpg') center/cover no-repeat;
            height: 600px;
            position: relative;
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            text-align: center;
        }
        .bio {
            padding: 40px 20px;
            
           
       
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    
    <div class="hero">
        <div class="hero-overlay">
            Malcolm Lismore Photography
        </div>
    </div>

  
    <section class="bio text-center">
        <div class="container">
            <h2 class="mb-3">About Malcolm</h2>
            <p class="lead">
                Malcolm Lismore is a freelance photographer based on the North West coast of Scotland. His biggest passion in photography is for the natural world. 
                He captures the rugged Scottish landscape, coastal birds, and wildlife in their raw beauty.
            </p>
            <p>
                Beyond nature, Malcolm is also available for weddings, portraits, and special events. His versatile style makes him suitable for both personal and commercial photography needs.
            </p>
        </div>
    </section>
</body>
</html>
