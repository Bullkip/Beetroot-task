jQuery(document).ready(function ($) {
  $("#search").keypress(function () {
    var searchTerm = $(this).val();
    // проверим, если в поле ввода более 2 символов, запускаем ajax
    if (searchTerm.length > 2) {
      $.ajax({
        url: "wp-admin/admin-ajax.php",
        type: "POST",
        data: {
          action: "beetroot_ajax_search",
          term: searchTerm,
        },
        success: function (result) {
          $(".search-main__results").fadeIn().html(result);
        },
      });
    }
  });
});
