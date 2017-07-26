var visible = true;
var waterTime = 0;

function isWater() {
    var waters = document.querySelectorAll('.water');
    var setInt ;
    waters.forEach(water => {
        water.style.opacity = +visible;
        setInt = setInterval(()=>{
            waterTime++;

            if(waterTime>50){
                cork.style.opacity=0;
                switWisibles.forEach(item=>{
                    item.style.opacity=1;
                });
                propantpost.style.height='100%';
            } else {
                switWisibles.forEach(item=>{
                    item.style.opacity=0;
                })
            }
            },100);

    });
if(!visible){
    clearInterval(setInt);
    console.log(waterTime);
}
    visible = !visible;


}


//    var bur = document.queri
var koyl = document.querySelector('#koyl');
var back = document.querySelector('#back');
var hopper = document.querySelector('#hopper');
var cork = document.querySelector('#cork');
var switWisibles = document.querySelectorAll('.switWisible');
var propantpost = document.querySelector('#propantpost');


const DEPTH = 200;

cork.style.bottom=DEPTH;
propantpost.style.height=DEPTH;

function as(step) {
    koyl.style.height = step  + "px";

    back.style.backgroundPositionY = 400 -4.2 * step + "px";
    hopper.style.top =  2480-4.2 * step + "px";

    if (step>410 && step<590) {
        hopper.style.opacity=1;


    } else {
        hopper.style.opacity=0;

    }

    if (cork.style.top < koyl.style.height){
        console.log(56654)
    }


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
