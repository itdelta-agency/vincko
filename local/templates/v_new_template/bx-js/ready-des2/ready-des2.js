"use strict";

$(document).ready(function () {
  var $prevArrowImg = "<svg width=\"10\" height=\"18\" viewBox=\"0 0 10 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n    <path d=\"M0.545444 9.82854L7.78681 17.0496C8.24745 17.5092 8.9943 17.5092 9.45471 17.0496C9.91516 16.5904 9.91516 15.8457 9.45471 15.3865L3.04722 8.99701L9.45452 2.6077C9.91498 2.14834 9.91498 1.40367 9.45452 0.944496C8.99407 0.485135 8.24726 0.485135 7.78662 0.944496L0.545258 8.16567C0.315031 8.39537 0.200048 8.6961 0.200048 8.99697C0.200048 9.298 0.315254 9.59895 0.545444 9.82854Z\" fill=\"#989898\"/>\n    </svg>";
  var $nextArrowImg = "<svg width=\"10\" height=\"18\" viewBox=\"0 0 10 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n    <path d=\"M9.45456 9.82854L2.21319 17.0496C1.75255 17.5092 1.0057 17.5092 0.54529 17.0496C0.0848382 16.5904 0.0848382 15.8457 0.54529 15.3865L6.95278 8.99701L0.545477 2.6077C0.0850245 2.14834 0.0850245 1.40367 0.545477 0.944496C1.00593 0.485135 1.75274 0.485135 2.21338 0.944496L9.45474 8.16567C9.68497 8.39537 9.79995 8.6961 9.79995 8.99697C9.79995 9.298 9.68475 9.59895 9.45456 9.82854Z\" fill=\"#989898\"/>\n    </svg>";
  var prevArrowBtn = "<button type=\"button\" class=\"slick-prev\">".concat($prevArrowImg, "</button>");
  var netArrowBtn = "<button type=\"button\" class=\"slick-next\">".concat($nextArrowImg, "</button>");
  var copies = document.getElementsByClassName('r-d-s');

  for (var i = 0; i < copies.length; i++) {
    var inner = copies[i].innerHTML;
    inner += inner;
    copies[i].innerHTML = inner;
  }

  if ($(".r-d-s")) {
    $('.r-d-s').slick({
      variableWidth: true,
      centerMode: true,
      arrows: true,
      centerPadding: '60px',
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      initialSlide: 2,
      prevArrow: prevArrowBtn,
      nextArrow: netArrowBtn
    });
  }

  var items = document.getElementsByClassName("ready-des2__show-item");
  var openBtns = document.getElementsByClassName("ready-des2__show-more");
  var closeBtns = document.getElementsByClassName("ready-des2__show-close");
  $(".ready-des2__up").on("click", function () {
    var top = $('.ready-des2__choice').position().top;
    $('html').scrollTop(top);
  });

  var _loop = function _loop(_i) {
    openBtns[_i].addEventListener("click", function () {
      items[_i].classList.remove("close");
    });

    closeBtns[_i].addEventListener("click", function () {
      items[_i].classList.add("close");
    });
  };

  for (var _i = 0; _i < items.length; _i++) {
    _loop(_i);
  }

  $(".ready-des2__choice-item").on("click", function () {
    var top = $('.ready-des2__show').position().top;
    $('html').scrollTop(top);
    $(".ready-des2__show--open").removeClass("hidden");

    if (!$(".ready-des2__show--close").hasClass("hidden")) {
      $(".ready-des2__show--close").addClass("hidden");
    }
  });
  $("#allC").on("click", function () {
    $(".ready-des2__show-item:first").removeClass("close");
  });

  var companySelect = function companySelect() {
    var element = document.querySelector('.ready-des2__company-select');

    if (element) {
      var choices = new Choices(element, {
        searchEnabled: false,
        itemSelectText: ''
      });
    }
  };

  var citySelect = function citySelect() {
    var element = document.querySelector('.ready-des2__city-select');

    if (element) {
      var choices = new Choices(element, {
        searchEnabled: false,
        itemSelectText: ''
      });
    }
  };

  var rdSelect = function rdSelect() {
    var element = document.querySelectorAll('.ready__des_select-js-2');

    if (element) {
      element.forEach(function (el) {
        var choices = new Choices(el, {
          searchEnabled: false,
          itemSelectText: ''
        });
      });
    }
  };

  companySelect();
  citySelect();
  rdSelect();
});