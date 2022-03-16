$(function () {
  $(".table__tabs").find(".table__tab:first").addClass("active");
  $(".table__content__item").hide();
  $(".table__content__item:first").show();
  $('.table__tab').click(function () {
      let currentTab = $(this).attr('data-dashboard-tab');
      $('.table__tab').removeClass('active');
      $(this).addClass('active');
      $('.table__content__item').hide();
      $('.table__content').find('.table__content__item[data-dashboard-content="'+currentTab+'"]').show();
  })
  $('.filter__item').click(function () {
    $(this).toggleClass('active');
  })
});
