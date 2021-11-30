const footerParalax = (footerElem, mainElem) => {
  const footerHeight = footerElem.offsetHeight,
    mainMarginBoottom = (mainElem.style.marginBottom = `${footerHeight}px`);
};

const footerFormSubmit = (btn, form) => {
  btn.addEventListener("click", () => {
    form.submit();
  });
};

export { footerParalax, footerFormSubmit };
