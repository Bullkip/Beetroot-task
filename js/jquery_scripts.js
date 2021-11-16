jQuery(function ($) {
  
  let arrTags = [],
    newArrTags,
    qsRegex,
    filterBtn = $(".filter-main__input-del"),
    filterForm = $("#filter-input");  
  
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


  //  Isotope grid init , and setup

  let $grid = $(".filter-main__items");
  $grid.isotope({
    itemSelector: ".filter-main__item",
    layoutMode: "none",
    filter: function () {

      let $this = $(this),
        searchResult = qsRegex ? $this.text().match(qsRegex) : true,
        buttonResult = newArrTags ? $(this).is(newArrTags) : true;

      return searchResult && buttonResult;

      return searchResult
    },
  });

  // Configure array of tag if click on this

  $(".filter-main__tags").on("click", ".filter-main__tag-btn", function () {
    if ($(this).hasClass("is-checked")) {
      let filterValue = $(this).attr("data-filter");
      indexElem = arrTags.indexOf(filterValue);
      arrTags.splice(indexElem, 1);
      $(this).removeClass("is-checked");
    } else {
      let filterValue = $(this).attr("data-filter");
      arrTags.push(filterValue);
      $(this).addClass("is-checked");
    }
    console.log(arrTags);
    newArrTags = arrTags.join("");
    $grid.isotope();
  });

 
  // use value of search field to filter
  $("#filter-input").keyup(
    debounce(function () {
      qsRegex = new RegExp($("#filter-input").val(), "gi");
      filterBtn.addClass("filter-main__input-del--show");
      if (qsRegex == "/(?:)/gi") {
        filterBtn.removeClass("filter-main__input-del--show");
      }
      $grid.isotope();
    })
  );

  // click x btn on search field and set value to default
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

  // setup ajax query to add posts , reinit isotope

  $("#filterform").change(function () {
    let filterForm = $(this);

    $.ajax({
      url: true_obj.ajaxurl,
      data: filterForm.serialize(),
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
            buttonResult = newArrTags ? $(this).is(newArrTags) : true;
            return searchResult && buttonResult;
          },
        });
      },
    });
    return false;
  });
});
