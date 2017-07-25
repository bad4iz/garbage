var visible = true;

function isWater() {
    var waters = document.querySelectorAll('.water');

    waters.forEach(water => {
        water.style.opacity = +visible;
    });

    visible = !visible;
}


//    var bur = document.queri
var koyl = document.querySelector('#koyl');
var back = document.querySelector('#back');



function as(step) {



    koyl.style.height = step  + "px";

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
