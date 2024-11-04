
    <link rel="stylesheet" href="/hnd/components/AlbumCart/albumStyle.css">




    <?php 
        function AlbumCart($img_url_1,$img_url_2,$img_url_3,$img_url_4,$pic_cat,$album_header) :void    
        {
            echo "
            <div class='album__saerch__cart'>
                <div class='img__holder'>
                    <center>
                    <img src='{$img_url_1}'  class='img-thumbnail img_global img_set_one' alt=''/>
                    <img src='{$img_url_2}' class='img-thumbnail img_global img_set_two' alt=''>
                    <img src='{$img_url_3}' class='img-thumbnail img_global img_set_three' alt=''/>
                    <img src='{$img_url_4}' class='img-thumbnail img_global img_set_four' alt=''/>
                    </center>
                </div>
            <div class='info__holder'>
                    <center>
                        <h2>{$pic_cat}</h2>
                        <p>{$album_header}</p>
                        <div class='btn__view__album'>View Album</div>
                    </center>
            </div>
        
            </div>";
        }
    ?>