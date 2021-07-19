"use strict";

$(document).ready(function () {
  if ($(window).width() >= '1024') {
    $('.included__items').slick({
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 3
    });
  } else if ($(window).width() >= '767') {
    $('.included__items').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 3
    });
  } else if ($(window).width() >= '560') {
    $('.included__items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });
  } else {
    $('.included__items').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 3
    });
  }
});