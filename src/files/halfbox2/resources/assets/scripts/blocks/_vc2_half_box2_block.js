(function ($) {
  'use strict';
  $(document).ready(function () {

    $('.halfbox2 .tab-menu span.title').on('click', function (e) {
      e.preventDefault();

      if ($(this).next().hasClass('show')) {
        $(this).next().removeClass('show').hide().animate({ opacity: "0" }, 500);
        $(this).children('i.fa').css('transform', 'rotate(0deg)');
      }
      else {
        $(this).next().addClass('show').show().animate({ opacity: "1" }, 500);
        $(this).children('i.fa').css('transform', 'rotate(-90deg)');
      }
    });
  });
})(jQuery);
