<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 25.07.2017
 * Time: 10:15
 */
?>
<div style="display: flex">
    <div style="
           width: 215px;
           height: 800px;
           background-image: url(imgg.png);
           background-size: contain;
           background-repeat: no-repeat;
           position: relative;
">
        <div id="koyl"
             style="position: absolute;
                   width: 100%;
                   top: -48px;
                   height: 400px;

            "
        >
            <div style="position: relative;
                        width: 100%;
                        height: 100%;
                        background: url(truba.png) 80px;
                        background-size: 20px;
                        background-repeat: repeat-y;
                        z-index: 3;
            "
            >

            </div>
            <div style="position: relative;
                        height: 54px;

            ">
                <img id="bur" style="
                    transition: left cubic-bezier(0, 0, 1, 1);
                    position: absolute;
                    bottom: 0;
                    left: 82px;
                    width: 16px;
                    z-index: 2;
                "
                     src="nasadka2.png" alt="">
                <img id="water" class="water" style="
               opacity: 0;
                    /* transition: all 5s cubic-bezier(0, 0, 1, 1); */
                    position: absolute;
                    bottom: -15px;
                    left: 64px;
                    width: 51px;
                    z-index: 1;
                "
                     src="поток.gif" alt="">
            </div>
        </div>
    </div>

    <div id="back" style="
    margin-left: 200px;
            transition-timing-function: cubic-bezier(0, 0, 1, 1);
            width: 800px;
            height: 800px;
            background-image: url(imgg.png);
            /* background-size: contain; */
            background-repeat: no-repeat;
            position: relative;
            background-position-y: 400px;
            border-radius: 50%;
">

        <img style="

                    position: absolute;
                    top: 10%;
                    left: 43%;
                    width: 69px;
                    z-index: 2;
                "
             src="nasadka2.png" alt="">
        <img style="

                    position: absolute;
                    top: 0;
                    left: 43%;
                    width: 69px;
                    z-index: 2;
                "
             src="truba.png" alt="">
        <img class="water" style="
                     opacity: 0;
                    /* transition: all 5s cubic-bezier(0, 0, 1, 1); */
                    position: absolute;
                    top: 144px;
                    left: 38%;
                    /* width: 51px; */
                    z-index: 1;
                "
             src="поток.gif" alt="">
    </div>
</div>
<p>
    <input id="range" style="width: 100%;" type="range" min="0" max="900" step="1" value="0">
</p>
<button onclick="isWater()">water</button>
<script src="anime.js"></script>