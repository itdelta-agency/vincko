"use strict";

$(document).ready(function () {
  $('.slick-slider-reviews').slick({
    // variableWidth: true,
    arrows: true,
    slidesToShow: 1,
    prevArrow: "\n\t\t\t\t<div class=\"arrow-prev arrow\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 80 80\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n\t\t\t\t<g filter=\"url(#filter0_d)\">\n\t\t\t\t<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M64 36C64 22.7452 53.2548 12 40 12C26.7452 12 16 22.7452 16 36C16 49.2548 26.7452 60 40 60C53.2548 60 64 49.2548 64 36Z\" fill=\"white\"/>\n\t\t\t\t<path d=\"M40 11.5C53.531 11.5 64.5 22.469 64.5 36C64.5 49.531 53.531 60.5 40 60.5C26.469 60.5 15.5 49.531 15.5 36C15.5 22.469 26.469 11.5 40 11.5Z\" stroke=\"#E3E3E3\"/>\n\t\t\t\t</g>\n\t\t\t\t<path d=\"M34.5452 36.8287L41.7866 44.0497C42.2472 44.5093 42.9941 44.5093 43.4545 44.0497C43.9149 43.5905 43.9149 42.8458 43.4545 42.3867L37.047 35.9971L43.4543 29.6078C43.9147 29.1485 43.9147 28.4038 43.4543 27.9446C42.9938 27.4853 42.247 27.4853 41.7864 27.9446L34.545 35.1658C34.3148 35.3955 34.1998 35.6962 34.1998 35.9971C34.1998 36.2981 34.315 36.5991 34.5452 36.8287Z\" fill=\"#989898\"/>\n\t\t\t\t<defs>\n\t\t\t\t<filter id=\"filter0_d\" x=\"0\" y=\"0\" width=\"80\" height=\"80\" filterUnits=\"userSpaceOnUse\" color-interpolation-filters=\"sRGB\">\n\t\t\t\t<feFlood flood-opacity=\"0\" result=\"BackgroundImageFix\"/>\n\t\t\t\t<feColorMatrix in=\"SourceAlpha\" type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0\"/>\n\t\t\t\t<feOffset dy=\"4\"/>\n\t\t\t\t<feGaussianBlur stdDeviation=\"7.5\"/>\n\t\t\t\t<feColorMatrix type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0\"/>\n\t\t\t\t<feBlend mode=\"normal\" in2=\"BackgroundImageFix\" result=\"effect1_dropShadow\"/>\n\t\t\t\t<feBlend mode=\"normal\" in=\"SourceGraphic\" in2=\"effect1_dropShadow\" result=\"shape\"/>\n\t\t\t\t</filter>\n\t\t\t\t</defs>\n\t\t\t\t</svg>\n\t\t\t\t</div>",
    nextArrow: "<div class=\"arrow-next arrow\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 80 80\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n<g filter=\"url(#filter0_d)\">\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M16 36C16 22.7452 26.7452 12 40 12C53.2548 12 64 22.7452 64 36C64 49.2548 53.2548 60 40 60C26.7452 60 16 49.2548 16 36Z\" fill=\"white\"/>\n<path d=\"M40 11.5C26.469 11.5 15.5 22.469 15.5 36C15.5 49.531 26.469 60.5 40 60.5C53.531 60.5 64.5 49.531 64.5 36C64.5 22.469 53.531 11.5 40 11.5Z\" stroke=\"#E3E3E3\"/>\n</g>\n<path d=\"M45.4548 36.8287L38.2134 44.0497C37.7528 44.5093 37.0059 44.5093 36.5455 44.0497C36.0851 43.5905 36.0851 42.8458 36.5455 42.3867L42.953 35.9971L36.5457 29.6078C36.0853 29.1485 36.0853 28.4038 36.5457 27.9446C37.0062 27.4853 37.753 27.4853 38.2136 27.9446L45.455 35.1658C45.6852 35.3955 45.8002 35.6962 45.8002 35.9971C45.8002 36.2981 45.685 36.5991 45.4548 36.8287Z\" fill=\"#989898\"/>\n<defs>\n<filter id=\"filter0_d\" x=\"0\" y=\"0\" width=\"80\" height=\"80\" filterUnits=\"userSpaceOnUse\" color-interpolation-filters=\"sRGB\">\n<feFlood flood-opacity=\"0\" result=\"BackgroundImageFix\"/>\n<feColorMatrix in=\"SourceAlpha\" type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0\"/>\n<feOffset dy=\"4\"/>\n<feGaussianBlur stdDeviation=\"7.5\"/>\n<feColorMatrix type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0\"/>\n<feBlend mode=\"normal\" in2=\"BackgroundImageFix\" result=\"effect1_dropShadow\"/>\n<feBlend mode=\"normal\" in=\"SourceGraphic\" in2=\"effect1_dropShadow\" result=\"shape\"/>\n</filter>\n</defs>\n</svg>\n</div>",
    infinity: true
  });
  $(".range-1").slider({
    min: 1,
    max: 12,
    step: 1,
    range: "min",
    animate: "slow",
    slide: function slide(event, ui) {
      $(".calculator-sub-value-1").html(ui.value);
      $(".range__number-1").html(ui.value);
    }
  });
  $(".range-2").slider({
    min: 1,
    max: 12,
    step: 1,
    range: "min",
    animate: "slow",
    slide: function slide(event, ui) {
      $(".calculator-sub-value-2").html(ui.value);
      $(".range__number-2").html(ui.value);
    }
  });
});