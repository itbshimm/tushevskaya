$(function () {
  $(".table__tabs").find(".table__tab:first").addClass("active");
  $(".table__content__item").hide();
  $(".table__content__item:first").show();
  $(".table__tab").click(function () {
    let currentTab = $(this).attr("data-dashboard-tab");
    $(".table__tab").removeClass("active");
    $(this).addClass("active");
    $(".table__content__item").hide();
    $(".table__content")
      .find(
        '.table__content__item[data-dashboard-content="' + currentTab + '"]'
      )
      .show();
  });
  $(".filter__item").click(function () {
    $(this).toggleClass("active");
    $(".product__item").each(function () {
      $model = $(".product__item");
      $model_data = $(this).data();
      $array_model = $.makeArray($model);
      console.log($model_data);
      $categoryFilter = $(".filter__item.active").attr("data-filter-category");

      if ($categoryFilter == "all") {
        $categoryFilter = !$(".filter__item.active").attr(
          "data-filter-category"
        );
      }

      $brendFilter = $(".filter__item.active").attr("data-filter-brend");

      if ($brendFilter == "all") {
        $brendFilter = !$(".filter__item.active").attr("data-filter-brend");
      }

      $model.show();

      if (
        $(".filter__item.active").attr("data-filter-category") ==
        $categoryFilter
      ) {
        $(".product__item")
          .not("[data-item-category = '" + $categoryFilter + "']")
          .hide();
      }

      if ($(".filter__item.active").attr("data-filter-brend") == $brendFilter) {
        $(".product__item")
          .not("[data-item-brend= '" + $brendFilter + "']")
          .hide();
      }
      $array_model.sort(function (a, b) {
        return $(a).data("item-category") - $(b).data("item-brend");
      });
      $($array_model).appendTo(".product__items__list");
    });

    if ($(".product__item").is(":visible")) {
      $(".filters_test").hide();
    } else {
      $(".filters_test").show();
    }
  });
});
