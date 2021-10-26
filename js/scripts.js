'use sctrict'


let x = document.querySelector('.header__navigation-btn');
let d = document.querySelector('.header__navigation-wrap');

let f = document.querySelector('.wpcf7-form input[type="email"]')
let l = document.querySelector(".wpcf7-form .subscribe-form label");
let b = document.querySelector(".subscribe-form__wrap-button");

let searchBtn = document.querySelector(".search-main__input-del");
let searchForm = document.querySelector('#search-input')

let departmentBtn = document.querySelector(".dropdown-department-btn");
let locationBtn = document.querySelector(".dropdown-department-btn");

let defaultDepartmentValue = departmentBtn.value;
let defaultLocationValue = locationBtn.value;


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
         searchBtn.classList.remove('search-main__input-del--show');
 
} )

searchForm.addEventListener('input', () => {
    searchBtn.classList.add('search-main__input-del--show');
})

// custom multiselect 
let arr = [];
    arr_2 = [];
    flag = "";
    inputs = document.querySelectorAll(
      ".search-main__dropdown-checkbox"
    );
    console.log(inputs)

for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change' , (e) => {
    let parentElem = e.target.closest(".search-main__dropdown-wrap");
        btnElem = parentElem.querySelector(".search-main__dropdown-btn");
        btnElemDefaultValue = btnElem.getAttribute("data-title");
        console.log(parentElem,btnElem,btnElemDefaultValue);

         if (flag == "") {
             flag =  btnElemDefaultValue;             
         } 

         if (flag == btnElemDefaultValue) {
              
             if (e.target.checked) {
               let elem = e.target.getAttribute("data-title");
               arr.push(elem);

               btnElem.innerHTML = arr.join();
             } else {
               let elem = e.target.getAttribute("data-title");
               index = arr.indexOf(elem);
               arr.splice(index, 1);

               if (arr.length == 0) {
                 btnElem.innerHTML = btnElemDefaultValue;
               } else {
                 btnElem.innerHTML = arr.join();
               }
             }

         } else {
                
              if (e.target.checked) {
                let elem = e.target.getAttribute("data-title");
                arr_2.push(elem);

                btnElem.innerHTML = arr_2.join();
              } else {
                let elem = e.target.getAttribute("data-title");
                index = arr_2.indexOf(elem);
                arr_2.splice(index, 1);

                if (arr_2.length == 0) {
                  btnElem.innerHTML = btnElemDefaultValue;
                } else {
                  btnElem.innerHTML = arr_2.join();
                }
              }
         }
      
       
    })
    
}

// check - uncheck all checkboxes
    
let tooggleBtns = document.querySelectorAll(".search-main__dropdown-checkbox--toggle");
console.log(tooggleBtns)
for (let i = 0; i < tooggleBtns.length; i++) {
  const elem = tooggleBtns[i];
  


    elem.addEventListener('click', () => {
    let parentCheckboxes = elem.closest(".search-main__dropdown-list");
    checkboxes = parentCheckboxes.querySelectorAll(
      ".search-main__dropdown-checkbox"
    );    
        
        if(!elem.checked) {
            elem.classList.remove('hide')
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
                triggerEvent(checkboxes[i], "change");
            }
        }else{
            elem.classList.add("hide");
              for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true; 
                 triggerEvent(checkboxes[i], "change");
              }
        }
    })
}

function triggerEvent (element, eventName) {
let event = new Event(eventName);
element.dispatchEvent(event);
};


