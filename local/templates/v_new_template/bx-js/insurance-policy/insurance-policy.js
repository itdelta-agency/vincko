"use strict";

$(document).ready(function () {
  $('.text-field').inputmask({
    regex: "[A-ZА-Яa-zа-я-]+"
  });
  $('.address-field').inputmask({
    regex: "[A-ZА-Яa-zа-я-.,:]+"
  });
  $('.street-field').inputmask({
    regex: "[A-ZА-Яa-zа-я-.,:/]+"
  });
  $('.house-field').inputmask({
    regex: "[1-9]+[A-ZА-Яa-zа-я-]+"
  });
  $('.flat-field').inputmask({
    regex: "[1-9]+"
  });
  $('.birthday-field').inputmask({
    alias: "datetime",
    inputFormat: "dd/mm/yyyy"
  });
  $('#email-field').inputmask("email");
  $('#phone-field').inputmask("+7(999) 999-9999");
  $('#passport').inputmask("99 99 999999");
  $('#code').inputmask("999-999");
  $('.index-field').inputmask("999999");
});