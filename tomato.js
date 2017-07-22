var a 
= "1 3   1 1 1 ¼ 1 1 ¼ ⅛ ⅜ 1 ¾ ¼ 1 ⅛ 1 ¼ 1 4 ⅛ 1 1 5".split(' ');
sum = 0;
a.forEach(item => {
    sum+= +item?+item:0
})
console.log(sum);