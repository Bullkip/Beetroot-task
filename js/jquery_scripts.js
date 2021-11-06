jQuery(function ($) {
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

  let arr = [],
    newArr,
    qsRegex;

  let $grid = $(".filter-main__items");
  $grid.isotope({
    itemSelector: ".filter-main__item",
    layoutMode: "none",
    filter: function () {
      let $this = $(this);
      let searchResult = qsRegex ? $this.text().match(qsRegex) : true,
        buttonResult = newArr ? $(this).is(newArr) : true;

      return searchResult && buttonResult;
    },
  });

  $(".filter-main__tags").on("click", ".filter-main__tag-btn", function () {
    if ($(this).hasClass("is-checked")) {
      let filterValue = $(this).attr("data-filter");
      indexElem = arr.indexOf(filterValue);
      arr.splice(indexElem, 1);
      $(this).removeClass("is-checked");
    } else {
      let filterValue = $(this).attr("data-filter");
      arr.push(filterValue);
      $(this).addClass("is-checked");
    }
    newArr = arr.join("");
    $grid.isotope();
  });

  let filterBtn = $(".filter-main__input-del");
  let filterForm = $("#filter-input");

  // use value of search field to filter
  $("#filter-input").keyup(
    debounce(function () {
      qsRegex = new RegExp($("#filter-input").val(), "gi");
      filterBtn.addClass("filter-main__input-del--show");
       if(qsRegex =='/(?:)/gi') {
        filterBtn.removeClass("filter-main__input-del--show"); 
       }
      $grid.isotope();
    })
  );

  filterBtn.click(function () {
    filterBtn.removeClass("filter-main__input-del--show");
    qsRegex = $("#filter-input").val("");
    $grid.isotope();
  });

  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    let timeout;
    threshold = threshold || 100;
    return function debounced() {
      clearTimeout(timeout);
      let args = arguments;
      let _this = this;
      function delayed() {
        fn.apply(_this, args);
      }
      timeout = setTimeout(delayed, threshold);
    };
  }


  $("#filterform").change(function () {
    let filter = $(this);

    $.ajax({
      url: true_obj.ajaxurl,
      data: filter.serialize(),
      type: "POST",
      beforeSend: "",
      success: function (data) {
        console.log(data);
        $(".filter-main__items").html(data);
        // reload isotope items to display it
        $grid.isotope("reloadItems");
        // set filter parametrs before reload isotope items
        $grid.isotope({
          filter: function () {
            let searchResult = qsRegex ? $(this).text().match(qsRegex) : true;
            buttonResult = newArr ? $(this).is(newArr) : true;
            return searchResult && buttonResult;
          },
        });
      },
    });
    return false;
  });
});
