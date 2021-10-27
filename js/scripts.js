'use sctrict'


let x = document.querySelector('.header__navigation-btn');
let d = document.querySelector('.header__navigation-wrap');

let f = document.querySelector('.wpcf7-form input[type="email"]')
let l = document.querySelector(".wpcf7-form .subscribe-form label");
let b = document.querySelector(".subscribe-form__wrap-button");

let filterBtn = document.querySelector(".filter-main__input-del");
let filterForm = document.querySelector('#filter-input')

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


//set input filter value to 0 , when x btn clicked

filterBtn.addEventListener('click' , () => {
        filterForm.value = "";
         filterBtn.classList.remove('filter-main__input-del--show');
 
} )

filterForm.addEventListener('input', () => {
    filterBtn.classList.add('filter-main__input-del--show');
})

// custom multiselect 
let arr = [];
    arr_2 = [];
    flag = "";
    inputs = document.querySelectorAll(
      ".filter-main__dropdown-checkbox"
    );

for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change' , (e) => {
    let parentElem = e.target.closest(".filter-main__dropdown-wrap");
        btnElem = parentElem.querySelector(".filter-main__dropdown-btn");
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
    
let tooggleBtns = document.querySelectorAll(".filter-main__dropdown-checkbox--toggle");
for (let i = 0; i < tooggleBtns.length; i++) {
  const elem = tooggleBtns[i];
  


    elem.addEventListener('click', () => {
    let parentCheckboxes = elem.closest(".filter-main__dropdown-list");
    checkboxes = parentCheckboxes.querySelectorAll(
      ".filter-main__dropdown-checkbox"
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

let tags = document.querySelectorAll(".filter-main__tag-btn");
    more = document.querySelector(".filter-main__tag.more");
    less = document.querySelector(".filter-main__tag.less");


 for (let i = 0; i < tags.length; i++) {
     if ( i > 10) {
         tags[i].classList.add('tag-hide')
     }
     
 } 

more.addEventListener('click', ()=> {
   for (let i = 0; i < tags.length; i++) {
     if (i > 10) {
       tags[i].classList.remove("tag-hide");
     }
   } 
});

less.addEventListener("click", () => {
  for (let i = 0; i < tags.length; i++) {
    if (i > 10) {
      tags[i].classList.add("tag-hide");
    }
  }
});



