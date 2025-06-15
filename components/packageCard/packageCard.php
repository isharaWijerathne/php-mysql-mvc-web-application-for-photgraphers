

<style>
    .package__body 
    {
        width: 250px;
        height: 470px;

        background-color: #dcf5f4;
        border-radius: 6px;
        margin: 5px;

        border: 1px solid black;
    }

    .pacage__min__para
    {
        height: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 3px;
        text-align: center;
    }

    .package__para
    {
    
        font-size: x-small;
    }

    .package__price
    {
        padding: 15px;    
    }

    .btn__select
    {
        padding: 5px;
        background: #06d1ca;
        border-radius: 12px;
    }

     
    .ribbon {
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    }
    .ribbon {
    --f: .5em; /* control the folded part */
    
    position:  relative;
    top: 0;
    left: 0;
    line-height: 1.8;
    padding-inline: 1lh;
    padding-bottom: var(--f);
    border-image: conic-gradient(#0008 0 0) 51%/var(--f);
    clip-path: polygon(
        100% calc(100% - var(--f)),100% 100%,calc(100% - var(--f)) calc(100% - var(--f)),var(--f) calc(100% - var(--f)), 0 100%,0 calc(100% - var(--f)),999px calc(100% - var(--f) - 999px),calc(100% - 999px) calc(100% - var(--f) - 999px));
    transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
    transform-origin: 100% 100%;
    background-color: #f642ff; /* the main color  */
    }
</style>

<?php 

function PackageCart($header,$l1,$l2,$l3,$catName,$info,$price)
{
    echo "
        <div class='col-sm'>
        <div class='package__body'>

        <div class='ribbon'>${catName}</div>
        <div class='package__price'>
            <h1 class='text-center'>${header}</h1>
        </div>

        <h6 class='text-center'>${l1}</h6>
        <h6 class='text-center'>${l2}</h6>
        <h6 class='text-center'>${l3}</h6>

        <div class='pacage__min__para'>
            <p class='package__para'>${info}</p>
        </div>
        <div class='package__price'>
            <h3 class='text-center'>Rs : ${price}</h3>
        </div>

        <div class='d-flex justify-content-center'>
            <button class='btn__select'>Book Now
                <i class='fas fa-camera-retro'></i>
            </button>
        </div>
    </div>
    </div>
";
}