'use sctrict'


let x = document.querySelector('.header__navigation-btn');
let d = document.querySelector('.header__navigation-wrap');

x.addEventListener("click",
function(){
    x.classList.toggle('change');
    d.classList.toggle('change');
    console.log(x);
})