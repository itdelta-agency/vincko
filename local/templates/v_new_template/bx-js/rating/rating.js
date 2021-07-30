"use strict";

jQuery(document).ready(function () {
  $('.rating-center__items_top-btn').on('click', function () {
    $(this).addClass('act').siblings().removeClass('act');
  });
  $('.rating-center__item').on('click', function () {
    var itemRating = $(this).parent('.rating-center__item-wrapper').find('.itemRating-open');
    $(this).parent().addClass('item-rating-active');
    $(itemRating).addClass('show');
  });
  $('.itemRating-open__closed').on('click', function () {
    $(this).parent().removeClass('show');
    $(this).parents('.rating-center__item-wrapper').removeClass('item-rating-active');
  });
  $('.closed-card').on('click', function () {
    $('.itemRating-open').removeClass('show');
    $('.rating-center__item-wrapper').removeClass('item-rating-active');
  });
  $('.tab-one').on('click', function (event) {
    event.preventDefault();
    $(this).addClass('tab_active').siblings().removeClass('tab_active');
    $(this).parent().next().find('.content-one').addClass('tabs-content_active').siblings().removeClass('tabs-content_active');
  });
  $('.tab-two').on('click', function (event) {
    event.preventDefault();
    $(this).addClass('tab_active').siblings().removeClass('tab_active');
    $(this).parent().next().find('.content-two').addClass('tabs-content_active').siblings().removeClass('tabs-content_active');
  });
  $('.tab-three').on('click', function (event) {
    event.preventDefault();
    $(this).addClass('tab_active').siblings().removeClass('tab_active');
    $(this).parent().next().find('.content-three').addClass('tabs-content_active').siblings().removeClass('tabs-content_active');
  });
  $('.formation__left_btn').on('click', function () {
    $(this).addClass('formation__left_btn-active').siblings().removeClass('formation__left_btn-active');
  });
  $('.toggle__item').on('click', function () {
    var $this = $(this).find('.toggle__item_title');
    $(this).toggleClass('toggle__item_active');
    $('.toggle__item .toggle__item_descr').not($($this).next()).slideUp(300);
    $($this).next().slideToggle(300);
    $($this).toggleClass('toggle__item_title-active');
    $($this).parents('.toggle__item').siblings().find('div').removeClass('toggle__item_title-active');
    $(this).parents().siblings().find('div').removeClass('toggle__item_title-active');
  });
  $('.formation__left_btn-one').on('click', function () {
    $('.slide-one').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
  });
  $('.formation__left_btn-two').on('click', function () {
    $('.slide-two').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
  });
  $('.formation__left_btn-three').on('click', function () {
    $('.slide-three').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
  });
  $('.slide-one-btnTwo').on('click', function () {
    $('.slide-two').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
    $('.formation__left_btn-two').addClass('formation__left_btn-active').siblings().removeClass('formation__left_btn-active');
  });
  $('.slide-two-btnOne').on('click', function () {
    $('.slide-one').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
    $('.formation__left_btn-one').addClass('formation__left_btn-active').siblings().removeClass('formation__left_btn-active');
  });
  $('.slide-two-btnTwo').on('click', function () {
    $('.slide-three').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
    $('.formation__left_btn-three').addClass('formation__left_btn-active').siblings().removeClass('formation__left_btn-active');
  });
  $('.slide-three-btnOne').on('click', function () {
    $('.slide-two').addClass('formation__right_slide-active').siblings().removeClass('formation__right_slide-active');
    $('.formation__left_btn-two').addClass('formation__left_btn-active').siblings().removeClass('formation__left_btn-active');
  });
  /* $(function () {
      let $range = $(".js-range-slider"),
          $input = $(".js-input"),
          instance,
          min = 1,
          max = 12;
      $range.ionRangeSlider({
          skin: "big",
          type: "single",
          min: min,
          max: max,
          from: 1,
          onStart: function (data) {
              $input.prop("value", data.from);
          },
          onChange: function (data) {
              $input.prop("value", data.from);
          }
      });
      instance = $range.data("ionRangeSlider");
      $input.on("change keyup", function () {
          var val = $(this).prop("value");
          // validate
          if (val < min) {
              val = min;
          } else if (val > max) {
              val = max;
          }
          instance.update({
              from: val
          });
      });
  });
   $(function () {
      let $range = $(".js-range-slider2"),
          $input = $(".js-input2"),
          instance,
          min = 1,
          max = 3;
      $range.ionRangeSlider({
          skin: "big",
          type: "single",
          min: min,
          max: max,
          from: 1,
          onStart: function (data) {
              $input.prop("value", data.from);
          },
          onChange: function (data) {
              $input.prop("value", data.from);
          }
      });
      instance = $range.data("ionRangeSlider");
      $input.on("change keyup", function () {
          var val = $(this).prop("value");
          // validate
          if (val < min) {
              val = min;
          } else if (val > max) {
              val = max;
          }
          instance.update({
              from: val
          });
      });
  }); */

  $('.questions__text-show').on('click', function () {
    $('.questions__text-show').toggleClass('act');
    $('.questions__text').toggleClass('questions__textHide');

    if ($('.questions__text').hasClass('questions__textHide')) {
      $('.questions__text-show').text('Развернуть');
    } else {
      $('.questions__text-show').text('Свернуть');
    }
  });
});
/* var swiper = new Swiper(".mySwiper", {
    observer: true,
    observeParents: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
}); */