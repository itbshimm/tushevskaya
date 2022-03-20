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
      $(".product__item").show().removeClass("hide-product");
      if ($filterCategory == "all" || $filterCategory == undefined) {
        $filterCategory = !$(".filterCategory.active").attr(
          "data-filter-category"
        );
      } else {
        $(".product__item:not([data-item-category='" + $filterCategory + "'])")
          .hide()
          .addClass("hide-product");
      }
      if ($filterBrend == "all" || $filterBrend == undefined) {
        $filterBrend = !$(".filterBrend.active").attr("data-filter-brend");
      } else {
        $(".product__item:not([data-item-brend='" + $filterBrend + "'])")
          .hide()
          .addClass("hide-product");
      }
    });
  });
  if ($(".product__items__list").find(".product__item").is(":visible")) {
    $(".filters_test").hide();
  } else {
    $(".filters_test").show();
  }
  $(".search__filter input").bind("input", function () {
    let searchVal = $(this).val();
    console.log(searchVal);
    if (searchVal != "") {
      $(".product__item").show();
      $(
        ".product__item:not(.hide-product):not(:contains('" + searchVal + "'))"
      ).hide();
    } else {
      $(".product__item").show();
    }
  });
  $(".main__tabs .main__tab").click(function () {
    let tabName = $(this).attr("data-main-tab");
    if ($(this).hasClass("active")) {
    } else {
      $(".main__tab").toggleClass("active");
      $(".main__tab__content").hide();
      console.log(tabName);
      $(".main__tab__content[data-main-content='" + tabName + "']").show();
    }
  });
  $(".product__btn").click(function () {
    let productId = $(this).attr("id");
    console.log(productId);
    $('.product__modal[id="' + productId + '"]')
      .addClass("active")
      .show();
  });
  $(".modal__product__close").click(function () {
    $(this).closest(".product__modal").hide();
  });
  $(".product__form__tel").inputmask("+7 (999) 999 99-99");
  // $(".product__form__btn").click(function () {
  //   let val = $(this)
  //     .closest(".product__modal")
  //     .find('input[type="tel"]')
  //     .val();
  // });
  $(".table__sorter").tablesorter();
});
