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
           height: 900px;
           background-image: url(imgg.png);
           background-size: contain;
           background-repeat: no-repeat;
           position: relative;
">
        <img id="bur" style="
                transition: left cubic-bezier(0, 0, 1, 1);
                position: absolute;
                top: -100px;
                left: 30%;
                width: 21px;

                "
             src="nasadka2.png" alt="">
        <img id="water" style="
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
            height: 900px;
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
                "
             src="nasadka2.png" alt="">
        <img id="water" style="
               opacity: 1;
                    /* transition: all 5s cubic-bezier(0, 0, 1, 1); */
                    position: absolute;
                    top: 100px;
                    left: 25%;
                    width: 51px;
                    z-index: 1;
                "
             src="поток.gif" alt="">

    </div>
</div>
<button onclick="">water</button>
<script>
    var visible
    function water(){
        var water = document.querySelector('#water');

        water.style.opacity =
    }


//    var bur = document.queri
var bur = document.querySelector('#bur');
var back = document.querySelector('#back');
var water = document.querySelector('#water');
var step = 1;


function as (){
    var burPosition = +bur.style.top.replace(/px/, '');
    var backPosition = +back.style.backgroundPositionY.replace(/px/, '');


    bur.style.top =burPosition + step;
    water.style.top =bur.style.top;
    back.style.backgroundPositionY = backPosition - 3.65*step + "px";

//if(burPosition > 200){
//    water.style.opacity = 1;
////    console.log(burPosition);
//}else {
//    water.style.opacity = 0;
//}
//    console.log(burPosition, backPosition);

}


setInterval(as,100);
</script>