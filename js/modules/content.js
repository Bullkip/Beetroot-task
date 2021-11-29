const customMultiSelect = (checkboxes, closestWrap, btndropdown) => {
  let arrCheckboxes = [],
    arrCheckboxes_2 = [],
    flag = "";
  for (let i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", (e) => {
      let parentElem = e.target.closest(closestWrap),
        btnElem = parentElem.querySelector(btndropdown),
        btnElemDefaultValue = btnElem.getAttribute("data-title");

      if (flag == "") {
        flag = btnElemDefaultValue;
      }

      if (flag == btnElemDefaultValue) {
        if (e.target.checked) {
          let elemCheckbox = e.target.getAttribute("data-title");
          arrCheckboxes.push(elemCheckbox);

          btnElem.innerHTML = arrCheckboxes.join();
        } else {
          let elemCheckbox = e.target.getAttribute("data-title"),
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
          let elemCheckbox = e.target.getAttribute("data-title"),
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
};

const toggleCheckboxesCondition = (items, closestParent, checkbox) => {
  for (let i = 0; i < items.length; i++) {
    const toggleBtn = items[i];

    toggleBtn.addEventListener("click", () => {
      let parentCheckboxes = toggleBtn.closest(closestParent),
        currentCheckboxes = parentCheckboxes.querySelectorAll(checkbox);

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
};

const layoutPostsToggleBtns = (
  btns,
  classActive,
  parent,
  classItem,
  classRow
) => {
  const setIndex = (arr) => {
    for (let i = 0; i < arr.length; i++) {
      arr[i].setAttribute("data-index", i);
    }
  };
  let newArr = [];

  for (let i = 0; i < btns.length; i++) {
    const layoutBtn = btns[i];
    setIndex(btns);

    layoutBtn.addEventListener("click", () => {
      if (!layoutBtn.classList.contains(classActive)) {
        layoutBtn.classList.add(classActive);
      }
      const elemIndex = layoutBtn.getAttribute("data-index");
      newArr = [...btns];
      newArr.splice(elemIndex, 1);
      newArr[0].classList.remove(classActive);

      if (layoutBtn.classList.contains(classItem)) {
        parent.classList.add(classRow);
      } else {
        parent.classList.remove(classRow);
      }
    });
  }
};

const removeClassOnMediaQuery = (windowSize, element, elementClass) => {
  if (windowSize.matches && element.classList.contains(elementClass)) {
    element.classList.remove(elementClass);
  }
};

const moreTagsCollaps = (tags, btn, textMore, textLess) => {
  for (let i = 0; i < tags.length; i++) {
    if (i > 10) {
      tags[i].classList.add("tag-hide");
    }
  }
  if (btn) {
    btn.addEventListener("click", () => {
      for (let i = 0; i < tags.length; i++) {
        if (i > 10) {
          tags[i].classList.toggle("tag-hide");
        }
      }
      if (btn.textContent == textMore) {
        btn.innerText = textLess;
      } else {
        btn.innerText = textMore;
      }
    });
  }
}; 

export {
  customMultiSelect,
  toggleCheckboxesCondition,
  layoutPostsToggleBtns,
  removeClassOnMediaQuery,
  moreTagsCollaps,
};