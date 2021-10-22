'use sctrict'


let x = document.querySelector('.header__navigation-btn');
let d = document.querySelector('.header__navigation-wrap');

let f = document.querySelector('.wpcf7-form input[type="email"]')
let l = document.querySelector(".wpcf7-form .subscribe-form label");
let b = document.querySelector(".subscribe-form__wrap-button");

let searchBtn = document.querySelector(".search-main__input-del");
let searchForm = document.querySelector('#search-input')



// header nav
x.addEventListener("click",
function(){
    x.classList.toggle('change');
    d.classList.toggle('change');
})

//  footer toggle label from subscription form
f.addEventListener("click" , (e) => {
    l.classList.add('form-focus')
})

document.addEventListener('click', (e) => {
    if(e.target != f) {
        l.classList.remove("form-focus");
    }
})

b.addEventListener('click',() => {
 document.querySelector(".wpcf7-form").submit();
})


//set input search value to 0 , when x btn clicked

searchBtn.addEventListener('click' , () => {
        searchForm.value = "";
         searchBtn.classList.remove("search-main__input-del---show");
 
} )

searchForm.addEventListener('input', () => {
    searchBtn.classList.add('search-main__input-del--show');
})