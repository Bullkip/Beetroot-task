"use sctrict";
import { mobileHeaderMoveOutMenu } from "../js/modules/header.js";

import {
  customMultiSelect,
  toggleCheckboxesCondition,
  layoutPostsToggleBtns,
  removeClassOnMediaQuery,
  moreTagsCollaps,
} from "../js/modules/content.js";

import { footerParalax, footerFormSubmit } from "../js/modules/footer.js";

  
// header nav
const headerNavBtn = document.querySelector(".header__navigation-btn"),
  headerNavWrap = document.querySelector(".header__navigation-wrap");

mobileHeaderMoveOutMenu(headerNavBtn, headerNavWrap);

//  submit on click footer form  btn
const footerFormBtnSubmit = document.querySelector(".subscribe-form__wrap-button"),
footerForm = document.querySelector("footer .wpcf7-form");

footerFormSubmit(footerFormBtnSubmit, footerForm);

// footer paralax
const footer = document.querySelector("footer.footer"),
  main = document.querySelector("main");

footerParalax(footer, main);

// custom multiselect
const dropdownsCheckboxes = document.querySelectorAll(".dropdown__checkbox"),
  closestWrap = ".filter__wrap--dropdown",
  btndropdown = ".dropdown__btn";

customMultiSelect(dropdownsCheckboxes, closestWrap, btndropdown);

// check - uncheck all checkboxes

const tooggleBtns = document.querySelectorAll(".dropdown__checkbox--toggle"),
  closestParent = ".dropdown__items",
  checkboxItem = ".dropdown__checkbox";

toggleCheckboxesCondition(tooggleBtns, closestParent, checkboxItem);

// more , less collapse

const tags = document.querySelectorAll(".filter__tag-btn"),
  moreBtn = document.querySelector(".tag-more"),
  textMore = 'more',
  textLess = 'less';

moreTagsCollaps(tags, moreBtn, textMore, textLess);


// layout post tab
const layoutBtns = document.querySelectorAll("button.filter__tag-layout-item"),
  postsParent = document.querySelector(".filter__items"),
  activeElements = "filter__tag-layout-item--active",
  itemRow = "filter__items--row",
  listClass = "list";

layoutPostsToggleBtns(
  layoutBtns,
  activeElements,
  postsParent,
  listClass,
  itemRow
);

// delete list post when
const windowSize = window.matchMedia("(max-width: 767px)"),
  parentPosts = document.querySelector(".filter__items"),
  itemClass = "filter__items--row";

window.addEventListener("resize", () =>
  removeClassOnMediaQuery(windowSize, parentPosts, itemClass)
);
