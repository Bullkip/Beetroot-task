export const mobileHeaderMoveOutMenu = (btn, wrapBtn) => {
  btn.addEventListener("click", function () {
    btn.toggle("change");
    wrapBtn.classList.toggle("change");
  });
};
