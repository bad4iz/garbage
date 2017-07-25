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
           width: 300px;
           height: 800px;
           background-image: url(imgg.png);
           background-size: contain;
           background-repeat: no-repeat;
           position: relative;
">
        <img id="bur" style="
                    transition: left cubic-bezier(0, 0, 1, 1);
                    position: absolute;
                    top: -74px;
                    left: 27%;
                    width: 16px;

                "
             src="nasadka2.png" alt="">
        <img id="water" class="water" style="
               opacity: 0;
                    /* transition: all 5s cubic-bezier(0, 0, 1, 1); */
                    position: absolute;
                    top: 100px;
                    left: 25%;
                    width: 51px;
                    z-index: 1;
                "
             src="поток.gif" alt="">

    </div>

    <div id="back" style="
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
<script>
    var visible = true;

    function isWater() {
        var waters = document.querySelectorAll('.water');

        waters.forEach(water => {
            water.style.opacity = +visible;
        });

        visible = !visible;
    }


    //    var bur = document.queri
    var bur = document.querySelector('#bur');
    var back = document.querySelector('#back');
    var water = document.querySelector('#water');


    function as(step) {
        var burPosition = +bur.style.top.replace(/px/, '');
        var backPosition = +back.style.backgroundPositionY.replace(/px/, '');


        bur.style.top = step - 74;
        water.style.top = bur.style.top;
        back.style.backgroundPositionY = 400 -4.2 * step + "px";


    }

    var range = document.querySelector('#range');

    read("mousedown");
    read("mousemove");

    function read(evtType) {
        range.addEventListener(evtType, function () {
            window.requestAnimationFrame(function () {
                as(range.value)
            });
        });
    }
</script>