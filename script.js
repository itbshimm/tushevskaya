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
  // $(".filter__item").click(function () {
  //   $(this)
  //     .closest(".products__filter__block")
  //     .find(".filter__item")
  //     .removeClass("active");
  //   $(this).addClass("active");
  //   $(".product__item").each(function () {
  //     $model = $(".product__item");
  //     $model_data = $(this).data();
  //     $array_model = $.makeArray($model);
  //     console.log($array_model["ariaAtomic"]);

  //     $categoryFilter = $(".filter__item.active").attr("data-filter-category");

  //     if ($categoryFilter == "all") {
  //       $categoryFilter = !$(".filter__item.active").attr(
  //         "data-filter-category"
  //       );
  //     }

  //     $brendFilter = $(".filter__item.active").attr("data-filter-brend");

  //     if ($brendFilter == "all") {
  //       $brendFilter = !$(".filter__item.active").attr("data-filter-brend");
  //     }

  //     $model.show();

  //     if (
  //       $(".filter__item.active").attr("data-filter-category") ==
  //       $categoryFilter
  //     ) {
  //       $(".product__item")
  //         .filter(":not([data-item-category='" + $categoryFilter + "'])")
  //         .show();
  //     }

  //     if ($(".filter__item.active").attr("data-filter-brend") == $brendFilter) {
  //       $(".product__item")
  //         .filter(":not([data-item-category='" + $brendFilter + "'])")
  //         .hide();
  //     }
  //     $array_model.sort(function (a, b) {
  //       return $(a).data("itemCategory") - $(b).data("itemCategory");
  //     });
  //     console.log($array_model);
  //     $($array_model).appendTo(".product__items__list");
  //   });

  //   if ($(".product__item").is(":visible")) {
  //     $(".filters_test").hide();
  //   } else {
  //     $(".filters_test").show();
  //   }
  // });
  $(".filter__item").click(function () {
    $(this)
      .closest(".products__filter__block")
      .find(".filter__item")
      .removeClass("active");
    $(this).addClass("active");
    $(".product__item").each(function () {
      $filterCategory = $(".filterCategory.active").attr(
        "data-filter-category"
      );

      $filterBrend = $(".filterBrend.active").attr("data-filter-brend");
      console.log($filterCategory, $filterBrend);
      $(".product__item").show();
      if ($filterCategory == "all" || $filterCategory == undefined) {
        $filterCategory = !$(".filterCategory.active").attr(
          "data-filter-category"
        );
      } else {
        $(
          ".product__item:not([data-item-category='" + $filterCategory + "'])"
        ).hide();
      }
      if ($filterBrend == "all" || $filterBrend == undefined) {
        $filterBrend = !$(".filterBrend.active").attr("data-filter-brend");
      } else {
        $(
          ".product__item:not([data-item-brend='" + $filterBrend + "'])"
        ).hide();
      }
    });
  });
  if ($(".product__items__list").find(".product__item").is(":visible")) {
    $(".filters_test").hide();
  } else {
    $(".filters_test").show();
  }
});
