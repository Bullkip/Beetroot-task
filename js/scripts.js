"use sctrict";

let headerNavBtn = document.querySelector(".header__navigation-btn"),
  headerNavWrap = document.querySelector(".header__navigation-wrap"),
  customFormBtnSubmit = document.querySelector(".subscribe-form__wrap-button"),
  departmentBtn = document.querySelector(".dropdown-department-btn"),
  locationBtn = document.querySelector(".dropdown-department-btn");

if (departmentBtn) {
  let defaultDepartmentValue = departmentBtn.value;
}

// header nav
headerNavBtn.addEventListener("click", function () {
  headerNavBtn.classList.toggle("change");
  headerNavWrap.classList.toggle("change");
});

//  global document click  cf7 
document.addEventListener("click", (e) => {
  if (e.target.closest(".wpcf7-form input:not(input[type='checkbox'])")) {
    const elem = e.target;
    elem.addEventListener("blur", (e) => {
      if (e.target.closest(".footer-subscribe")) {
        if(!elem.value) {
          elem
            .closest(".subscribe-form__wrap")
            .querySelector("label")
            .classList.remove("form-focus");
        }
        
      } else if (e.target.closest(".apply-form__container")) {
        if(!elem.value) {
          elem
            .closest(".apply-form__data-field")
            .querySelector("label")
            .classList.remove("focus");
        }
      }
    });
    elem.addEventListener("focus", (e) => {
      if (e.target.closest(".footer-subscribe")) {
        elem
          .closest(".subscribe-form__wrap")
          .querySelector("label")
          .classList.add("form-focus");
      } else if (e.target.closest(".apply-form__container")) {
        elem
          .closest(".apply-form__data-field")
          .querySelector("label")
          .classList.add("focus");
      }
    });
  }
});

customFormBtnSubmit.addEventListener("click", () => {
  document.querySelector(".wpcf7-form").submit();
});

// footer paralax

let footerHeight = document.querySelector("footer.footer").offsetHeight,
  mainMarginBoottom = (document.querySelector(
    "main"
  ).style.marginBottom = `${footerHeight}px`);

// custom multiselect
let arrCheckboxes = [];
arrCheckboxes_2 = [];
flag = "";
dropdownsCheckboxes = document.querySelectorAll(".filter__dropdown-checkbox");

for (let i = 0; i < dropdownsCheckboxes.length; i++) {
  dropdownsCheckboxes[i].addEventListener("change", (e) => {
    let parentElem = e.target.closest(".filter__wrap--dropdown");
    btnElem = parentElem.querySelector(".dropdown__btn");
    btnElemDefaultValue = btnElem.getAttribute("data-title");
    console.log(parentElem, btnElem, btnElemDefaultValue);

    if (flag == "") {
      flag = btnElemDefaultValue;
    }

    if (flag == btnElemDefaultValue) {
      if (e.target.checked) {
        let elemCheckbox = e.target.getAttribute("data-title");
        arrCheckboxes.push(elemCheckbox);

        btnElem.innerHTML = arrCheckboxes.join();
      } else {
        let elemCheckbox = e.target.getAttribute("data-title");
        index = arrCheckboxes.indexOf(elemCheckbox);
        arrCheckboxes.splice(index, 1);

        if (arrCheckboxes.length == 0) {
          btnElem.innerHTML = btnElemDefaultValue;
        } else {
          btnElem.innerHTML = arrCheckboxes.join();
        }
      }
    } else {
      if (e.target.checked) {
        let elemCheckbox = e.target.getAttribute("data-title");
        arrCheckboxes_2.push(elemCheckbox);

        btnElem.innerHTML = arrCheckboxes_2.join();
      } else {
        let elemCheckbox = e.target.getAttribute("data-title");
        index = arrCheckboxes_2.indexOf(elemCheckbox);
        arrCheckboxes_2.splice(index, 1);

        if (arrCheckboxes_2.length == 0) {
          btnElem.innerHTML = btnElemDefaultValue;
        } else {
          btnElem.innerHTML = arrCheckboxes_2.join();
        }
      }
    }
  });
}

// check - uncheck all checkboxes

let tooggleBtns = document.querySelectorAll(
  ".filter__dropdown-checkbox--toggle"
);
for (let i = 0; i < tooggleBtns.length; i++) {
  const toggleBtn = tooggleBtns[i];

  toggleBtn.addEventListener("click", () => {
    let parentCheckboxes = toggleBtn.closest(".filter__dropdown-list");
    currentCheckboxes = parentCheckboxes.querySelectorAll(
      ".filter__dropdown-checkbox"
    );

    if (!toggleBtn.checked) {
      toggleBtn.classList.remove("hide");
      for (let i = 0; i < currentCheckboxes.length; i++) {
        const currentCheckbox = currentCheckboxes[i];
        currentCheckbox.checked = false;
        triggerEvent(currentCheckbox, "change");
      }
    } else {
      toggleBtn.classList.add("hide");
      for (let i = 0; i < currentCheckboxes.length; i++) {
        const currentCheckbox = currentCheckboxes[i];
        currentCheckbox.checked = true;
        triggerEvent(currentCheckbox, "change");
      }
    }
  });
}

function triggerEvent(element, eventName) {
  let event = new Event(eventName);
  element.dispatchEvent(event);
}

// more , less collapse

let tags = document.querySelectorAll(".filter__tag-btn"),
  moreBtn = document.querySelector(".tag-more");

for (let i = 0; i < tags.length; i++) {
  if (i > 10) {
    tags[i].classList.add("tag-hide");
  }
}
if (moreBtn) {
  moreBtn.addEventListener("click", () => {
    for (let i = 0; i < tags.length; i++) {
      if (i > 10) {
        tags[i].classList.toggle("tag-hide");
      }
    }
    if (moreBtn.textContent == "more") {
      console.log("yes");
      moreBtn.innerText = "less";
    } else {
      console.log("no");
      moreBtn.innerText = "more";
    }
  });
}

// Isotope modify, for disable default grid layout
Isotope.Item.prototype._create = function () {
  this.id = this.layout.itemGUID++;
  this._transn = {
    ingProperties: {},
    clean: {},
    onEnd: {},
  };
  this.sortData = {};
};

Isotope.Item.prototype.layoutPosition = function () {
  this.emitEvent("layout", [this]);
};

Isotope.prototype.arrange = function (opts) {
  this.option(opts);
  this._getIsInstant();
  this.filteredItems = this._filter(this.items);
  this._isLayoutInited = true;
};

Isotope.LayoutMode.create("none");

// layout post tabs
let layoutBtns = document.querySelectorAll("button.filter__tag-layout-item");
postsParent = document.querySelector(".filter__items");

let setIndex = (arr) => {
  for (let i = 0; i < arr.length; i++) {
    arr[i].setAttribute("data-index", i);
  }
};

for (let i = 0; i < layoutBtns.length; i++) {
  const layoutBtn = layoutBtns[i];
  setIndex(layoutBtns);

  layoutBtn.addEventListener("click", () => {
    if (!layoutBtn.classList.contains("filter__tag-layout-item--active")) {
      layoutBtn.classList.add("filter__tag-layout-item--active");
    }
    let elemIndex = layoutBtn.getAttribute("data-index");
    newArr = [...layoutBtns];
    newArr.splice(elemIndex, 1);
    newArr[0].classList.remove("filter__tag-layout-item--active");

    if (layoutBtn.classList.contains("list")) {
      postsParent.classList.add("filter__items--row");
    } else {
      postsParent.classList.remove("filter__items--row");
    }
  });
}
