/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/blocks/modules/addSensors/addSensors.js":
/*!*****************************************************!*\
  !*** ./src/blocks/modules/addSensors/addSensors.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$(".price__bonuses-info").on("click", function () {
  $(".price__bonuses-info-m").addClass("vis");
  $(".price__bonuses-close").addClass("vis");
  $(".section-result__price-bonuses-container").addClass("vis");
  $(".section-result__price-rub-container").removeClass("vis");
  $(".price__bonuses").addClass("h-full");
});
$(".price__bonuses-close").on("click", function () {
  $(".price__bonuses-info-m").removeClass("vis");
  $(".price__bonuses-close").removeClass("vis");
  $(".section-result__price-bonuses-container").removeClass("vis");
  $(".section-result__price-rub-container").addClass("vis");
  $(".price__bonuses").removeClass("h-full");
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/bonuses/bonuses.js":
/*!***********************************************!*\
  !*** ./src/blocks/modules/bonuses/bonuses.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$("#useless").on("click", function () {
  $(".useless-modal").addClass("vis");
});
$(".useless-modal__close").on("click", function () {
  $(".useless-modal").removeClass("vis");
});

if ($(window).width() <= '767') {
  $('.useless-modal__text').attr('placeholder', 'Напишите Ваши' + '\n' + 'пожелания');
  $('.useless-modal__text').attr('rows', '3');
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/complect/complect.js":
/*!*************************************************!*\
  !*** ./src/blocks/modules/complect/complect.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {var сomplectSliderItems = document.querySelectorAll('.complect__slider-wrapper-item'),
    сomplectSliderTabs = document.querySelectorAll('.complect__slider-wrapper-tabs > li');

if (сomplectSliderTabs && сomplectSliderItems) {
  сomplectSliderTabs.forEach(function (item) {
    item.addEventListener('click', function () {
      сomplectSliderTabs.forEach(function (el) {
        el.classList.remove('active');
      });
      сomplectSliderItems.forEach(function (slide) {
        slide.classList.remove('active');

        if (item.getAttribute('data-tab') == slide.getAttribute('data-tab')) {
          item.classList.add('active');
          slide.classList.add('active');
        }
      });
    });
  });
} // слайдер


$('.slick-slider-datchiki').slick({
  variableWidth: true,
  centerMode: true,
  arrows: true,
  centerPadding: '60px',
  slidesToShow: 5,
  prevArrow: '<div class="arrow-prev arrow"><img src="/img/cartochka/prew.svg"></div>',
  nextArrow: '<div class="arrow-next arrow"><img src="/img/cartochka/next.svg"></div>'
});
$('.slide-box-slider-item').slick({
  arrows: true,
  slidesToShow: 1,
  prevArrow: '<div class="arrow-prev-mini arrow-mini"><img src="/img/cartochka/arrow-prev-mini.svg"></div>',
  nextArrow: '<div class="arrow-next-mini arrow-mini"><img src="/img/cartochka/arrow-next-mini.svg"></div>'
});
var activeSlide = document.querySelector('.slick-slide.slick-center'),
    infoBlocks = document.querySelectorAll('.info'),
    allSlides = document.querySelectorAll('.slick-slide');
allSlides.forEach(function (item, i) {
  var dataSlickIndex = item.getAttribute('data-slick-index');
  item.setAttribute('data-slider-info', +dataSlickIndex + 1);
});
document.querySelectorAll('.slick-slide').forEach(function (item) {
  item.classList.remove('prev-next-slide');

  if (document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') - 1 == item.getAttribute('data-slick-index')) {
    item.classList.add('prev-next-slide');
  }

  if (+document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') + 1 == item.getAttribute('data-slick-index')) {
    item.classList.add('prev-next-slide');
  }

  infoBlocks.forEach(function (item) {
    item.classList.remove('show');

    if (activeSlide.getAttribute('data-slider-info') == item.getAttribute('data-slider-info')) {
      item.classList.add('show');
    }
  });
});
document.querySelectorAll('.slick-arrow').forEach(function (arrow) {
  arrow.addEventListener('click', function () {
    document.querySelectorAll('.slick-slide').forEach(function (item) {
      item.classList.remove('prev-next-slide');

      if (document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') - 1 == item.getAttribute('data-slick-index')) {
        item.classList.add('prev-next-slide');
      }

      if (+document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') + 1 == item.getAttribute('data-slick-index')) {
        item.classList.add('prev-next-slide');
      }

      infoBlocks.forEach(function (item) {
        item.classList.remove('show');

        if (activeSlide.getAttribute('data-slider-info') == item.getAttribute('data-slider-info')) {
          item.classList.add('show');
        }
      });
    });
  });
});
$('.slick-slider-datchiki').on('swipe', function (event) {
  document.querySelectorAll('.slick-slide').forEach(function (item) {
    item.classList.remove('prev-next-slide');

    if (document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') - 1 == item.getAttribute('data-slick-index')) {
      item.classList.add('prev-next-slide');
    }

    if (+document.querySelector('.slick-slide.slick-center').getAttribute('data-slick-index') + 1 == item.getAttribute('data-slick-index')) {
      item.classList.add('prev-next-slide');
    }
  });
}); // Блоки с характеристикой

function closeOpenBlock(blockSelector, btnSelector) {
  var block = document.querySelector(blockSelector),
      btn = document.querySelector(btnSelector);

  if (btn) {
    btn.addEventListener('click', function () {
      if (block.classList.contains('close')) {
        block.classList.remove('close');
        btn.innerHTML = 'Свернуть';
      } else {
        block.classList.add('close');
        btn.innerHTML = 'Развернуть';
      }
    });
  }
}

closeOpenBlock('.slider__under-block-1', '.close-btn');
closeOpenBlock('.slider__under-block-2', '.close-btn-2');
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/complect_obor/complect_obor.js":
/*!***********************************************************!*\
  !*** ./src/blocks/modules/complect_obor/complect_obor.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/blocks/modules/footer/footer.js":
/*!*********************************************!*\
  !*** ./src/blocks/modules/footer/footer.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/blocks/modules/header/header.js":
/*!*********************************************!*\
  !*** ./src/blocks/modules/header/header.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(jQuery) {

jQuery(document).ready(function ($) {
  // header burger
  $(".burger-js").on("click", function () {
    $(this).toggleClass('active');
    $(".submenu-js").toggleClass("active");
  }); // modal

  function modal() {
    var openModalButtons = document.querySelectorAll("[data-modal-target]");
    var closeModalButtons = document.querySelectorAll("[data-close-button]");
    var body = document.body;
    openModalButtons.forEach(function (button) {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        var modal = document.querySelector(button.dataset.modalTarget);
        openModal(modal);
        body.style.overflow = "hidden";
      });
    });
    closeModalButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var modal = button.closest(".modal");
        closeModal(modal);
      });
    });

    function openModal(modal) {
      if (modal == null) return;
      modal.classList.add("active");
    }

    function closeModal(modal) {
      if (modal == null) return;
      modal.classList.remove("active");
      body.style.overflow = "auto";
      body.style.overflowX = "hidden";
    }
  }

  modal(); // js-select
  // let select = document.querySelector('#header__select_town-js')
  // new Choices(select, {
  //     searchEnabled: false,
  //     itemSelectText: '',
  // });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/installment/installment.js":
/*!*******************************************************!*\
  !*** ./src/blocks/modules/installment/installment.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$(document).ready(function () {
  $(".polzunok-1").slider({
    min: 0,
    max: 100,
    step: 5,
    range: "min",
    animate: "slow",
    slide: function slide(event, ui) {
      $(".installment__calculator-sub-value-1").html(ui.value);
    }
  });
  $(".polzunok-2").slider({
    min: 0,
    max: 100,
    step: 5,
    range: "min",
    animate: "slow",
    slide: function slide(event, ui) {
      $(".installment__calculator-sub-value-2").html(ui.value);
    }
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/insurance/insurance.js":
/*!***************************************************!*\
  !*** ./src/blocks/modules/insurance/insurance.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$(document).ready(function () {
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
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/loyalty/loyalty_program.js":
/*!*******************************************************!*\
  !*** ./src/blocks/modules/loyalty/loyalty_program.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(jQuery) {

jQuery(document).ready(function ($) {
  // tabs
  var tab = function tab() {
    var tabLink = document.querySelectorAll(".tab-js .item");
    var tabContent = document.querySelectorAll(".tabs__content-js");
    var tabName;
    tabLink.forEach(function (item) {
      item.addEventListener("click", selsectTabLink);
    });

    function selsectTabLink() {
      tabLink.forEach(function (item) {
        item.classList.remove("active");
      });
      this.classList.add("active");
      tabName = this.getAttribute("datat-tab-name");
      selectTabContent(tabName);
    }

    var selectTabContent = function selectTabContent(tabName) {
      tabContent.forEach(function (item) {
        item.classList.contains(tabName) ? item.classList.add("active") : item.classList.remove("active");
      });
    };
  };

  tab(); // loyality__calculator

  $("#calculator__range-js").on("input change", function () {
    var $value = $(this).val();
    $(".result-number").html($value);
  });
  $(document).on("change", function () {
    var selectVal = $("#calculator__select-js option:selected").val();
    var output = $(".content__items-left--bottom .number");
    output.html(selectVal);
  }); // js-select
  // const select = document.querySelector('#calculator__select-js');
  // new Choices(select, {
  //     searchEnabled: false,
  //     itemSelectText: '',
  //     classNames: {
  //     }
  // });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/main__content/main__content.js":
/*!***********************************************************!*\
  !*** ./src/blocks/modules/main__content/main__content.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/blocks/modules/modal/modal.js":
/*!*******************************************!*\
  !*** ./src/blocks/modules/modal/modal.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var btns_modals = document.getElementsByClassName("click-any-modal");
var close_modals = document.getElementsByClassName("any-modal__close");
var win_modals = document.getElementsByClassName("any-modal");

var _loop = function _loop(i) {
  btns_modals[i].addEventListener("click", function () {
    win_modals[i].classList.add("vis");
  });
  close_modals[i].addEventListener("click", function () {
    win_modals[i].classList.remove("vis");
  });
};

for (var i = 0; i < btns_modals.length; i++) {
  _loop(i);
}

/***/ }),

/***/ "./src/blocks/modules/ready-des/ready-des.js":
/*!***************************************************!*\
  !*** ./src/blocks/modules/ready-des/ready-des.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var packerContainer = document.getElementById("packer");
var packs = packerContainer.getElementsByClassName("pack");

for (var i = 0; i < packs.length; i++) {
  packs[i].addEventListener("mouseover", function () {
    var current = document.getElementsByClassName("shadow");
    current[0].className = current[0].className.replace(" shadow", "");
    this.className += " shadow";
  });
}

/***/ }),

/***/ "./src/blocks/modules/reviews/reviews.js":
/*!***********************************************!*\
  !*** ./src/blocks/modules/reviews/reviews.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {// "use strict"
jQuery(document).ready(function ($) {
  // js-select
  var select = $(".sort__form-select-js"); // const choices = new Choices(select[0], {
  //     searchEnabled: false,
  //     itemSelectText: '',
  // });

  $(".reviews__item-left .person__items .icon").on("mouseover", function () {
    $(".client__icon-pseudo").addClass("active"), $(this).on("mouseleave", function () {
      $(".client__icon-pseudo").removeClass("active");
    });
  }); // add__form

  var hiddenForm = $(".reviews__form-top--hidden");
  $(".pseudo__search,.pseudo__range,.text-js").on("click", function () {
    $(".reviews__form-top").addClass("active");
    hiddenForm.addClass("active");
    $(".text-js").addClass("active");
  });
  $(".close-js").on("click", function () {
    $(".reviews__form-top").removeClass("active");
    hiddenForm.removeClass("active");
    $(".text-js").removeClass("active");
  }); // filter_city

  $("#filter_city-js").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".left__filter_city-items li").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  }); // all checkbox

  var $btnAllCenter = $("#center__all_item-js");
  var $btnAllRight = $("#right__all_item-js");
  var $center__not_selected = $(".reviews__form-top--hidden .center__not_selected");
  var $center__selected = $(".reviews__form-top--hidden .center__selected");
  var $right__selected = $(".reviews__form-top--hidden .right__top");
  var $right__not_selected = $(".reviews__form-top--hidden .right__bottom");
  $btnAllCenter.on("click", function () {
    $center__selected.show(100);

    if ($(this).is(':checked')) {
      $(".reviews__form-top--hidden .center__not_selected input:checkbox").prop('checked', true);
    } else {
      $(".reviews__form-top--hidden .center__not_selected input:checkbox").prop('checked', false);
      $center__selected.hide(100);
    }
  });
  $btnAllRight.on("click", function () {
    $right__selected.show(100);

    if ($(this).is(':checked')) {
      $(".reviews__form-top--hidden .right__bottom input:checkbox").prop('checked', true);
    } else {
      $(".reviews__form-top--hidden .right__bottom input:checkbox").prop('checked', false);
      $right__selected.hide(100);
    }
  });
  $(document).on("change", function () {
    var $center__selected_input = $(".reviews__form-top--hidden .center__selected input:checkbox");
    var $right__selected_input = $(".reviews__form-top--hidden .right__top input:checkbox");

    if ($center__selected_input.attr("checked") != "checked") {
      $center__selected_input.prop('checked', true);
    }

    if ($right__selected_input.attr("checked") != "checked") {
      $right__selected_input.prop('checked', true);
    }

    if ($center__selected_input) {
      $center__selected_input.parent('label').on("click", function () {
        $this = $(this);
        $this.remove();
      });
    }

    if ($right__selected_input) {
      $right__selected_input.parent('label').on("click", function () {
        $this = $(this);
        $this.remove();
      });
    } // if (!$center__selected.children('label').length > 0) {
    //     $center__selected.hide(100)
    // }

  });
  $center__not_selected.on("click", "input:checkbox", function () {
    var $this = $(this);

    if ($this.is(':checked')) {
      $parent = $this.parent();
      $center__selected.show(100);
      $center__selected.append("<label class=\"center__selected-label\">".concat($parent.html(), "</label>"));
    }

    $parent.toggleClass("disabled");
  });
  $right__not_selected.on("click", "input:checkbox", function () {
    var $this = $(this);

    if ($this.is(':checked')) {
      $parent = $this.parent();
      $right__selected.show(100);
      $right__selected.append("<label class=\"center__selected-label\">".concat($parent.html(), "</label>"));
    }

    $parent.toggleClass("disabled");
  }); // range

  var $range = $("#pseudo__range");
  $range.on("input change", function () {
    var $value = $(this).val();
    var $text = $(".pseudo__range-text__select");

    if ($value >= 2) {
      $text.html("Низкий");
      $text.css({
        color: "#FF5252"
      });

      if ($value > 3) {
        $text.html("Средний");
        $text.css({
          color: "#FFC85C"
        });

        if ($value > 7) {
          $text.html("Высокий");
          $text.css({
            color: "#31CB40"
          });
        }
      }
    } else {
      $text.html("Все");
      $text.css({
        color: "#000000"
      });
    }
  });
  $(".reviews__item").each(function () {
    var $this = $(this);
    $btn = $(".comment__btn-js .text");
    $comments = $(".reviews__item__comments");
    $btnClose = $(".comments__close_btn-js");
    $comments__add = $(".add__new_comment-js");
    $add__new_comment_form = $(".add__new_comment-form");
    icon = "<svg width=\"13\" height=\"12\" viewBox=\"0 0 13 12\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7.38173 5.9864L12.3557 1.0257C12.454 0.911231 12.5054 0.76398 12.4996 0.613378C12.4937 0.462776 12.4311 0.319916 12.3243 0.213345C12.2174 0.106774 12.0742 0.0443419 11.9232 0.0385248C11.7722 0.0327077 11.6245 0.0839342 11.5097 0.181967L6.53573 5.14266L1.56173 0.175983C1.44874 0.063303 1.29551 0 1.13573 0C0.975945 0 0.822708 0.063303 0.709726 0.175983C0.596744 0.288663 0.533271 0.44149 0.533271 0.600844C0.533271 0.760197 0.596744 0.913024 0.709726 1.0257L5.68973 5.9864L0.709726 10.9471C0.646917 11.0007 0.595905 11.0668 0.559891 11.141C0.523877 11.2152 0.503639 11.2961 0.500447 11.3785C0.497255 11.4609 0.511179 11.5431 0.541343 11.6199C0.571508 11.6967 0.617263 11.7664 0.675736 11.8247C0.734209 11.8831 0.804137 11.9287 0.881132 11.9588C0.958127 11.9889 1.04053 12.0027 1.12316 11.9996C1.20579 11.9964 1.28687 11.9762 1.36131 11.9403C1.43575 11.9044 1.50194 11.8535 1.55573 11.7908L6.53573 6.83014L11.5097 11.7908C11.6245 11.8889 11.7722 11.9401 11.9232 11.9343C12.0742 11.9285 12.2174 11.866 12.3243 11.7595C12.4311 11.6529 12.4937 11.51 12.4996 11.3594C12.5054 11.2088 12.454 11.0616 12.3557 10.9471L7.38173 5.9864Z\" fill=\"#A0A0A0\"/></svg>";
    $this.find($btn).on("click", function () {
      $this.find($comments).show(300);
    });
    $this.find($btnClose).on("click", function () {
      $this.find($comments).hide(300);
    });
    $this.find($comments__add).on("click", function () {
      $this.find($add__new_comment_form).toggle(300);

      if ($this.find($comments__add).text() == "Написать комментарий") {
        $this.find($comments__add).text("Закрыть поле комментария");
        $this.find($comments__add).addClass("active");
        $this.find($comments__add).append("<span class=\"icon\">".concat(icon, "</span>"));
      } else {
        $this.find($comments__add).text("Написать комментарий");
        $this.find($comments__add).removeClass("active");
      }
    });

    function reply_comments() {
      $(".comments__item").each(function () {
        var $this = $(this);
        $send__to = $(".send__to");
        $comments__item__reply = $(".comments__item__reply");
        $this.find($send__to).on("click", function () {
          $this.find($comments__item__reply).show(300);
          console.log($this);
        });
      });
    }

    reply_comments();
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/blocks/modules/solutions/solutions.js":
/*!***************************************************!*\
  !*** ./src/blocks/modules/solutions/solutions.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery, $) {jQuery(document).ready(function () {
  $('.solutions-card__circles_item').on('click', function () {
    $(this).removeClass('hide').addClass('show').siblings().removeClass('show').addClass('hide');
  });
  $('.contract__item').on('click', function () {
    $(this).removeClass('no-active').addClass('active').siblings().removeClass('active').addClass('no-active');
  });
  $('.closed-card').on('click', function () {
    $(this).parents('.solutions-card').addClass('hide');
  });
  $('.solutions-card__icon-plus').on('click', function () {
    $(this).parents('.solutions-card').removeClass('hide');
  });
  $('.select').on('click', '.select__head', function () {
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
      $(this).next().fadeOut();
    } else {
      $('.select__head').removeClass('open');
      $('.select__list').fadeOut();
      $(this).addClass('open');
      $(this).next().fadeIn();
    }
  });
  $(document).mouseup(function (e) {
    var div = $(".select__list");

    if (!div.is(e.target) && div.has(e.target).length === 0) {
      $('.select__head').hasClass('open');
      $('.select__head').removeClass('open');
      $(div).fadeOut();
    }
  });
  $('.select').on('click', '.select__item', function () {
    $('.select__head').removeClass('open');
    $('.select__list').fadeOut();
    $(this).parents('.solutions-card__top_text-subtitle').prev().text($(this).find('.select__item_text').text());
    $(this).parents('.select__list').prev().siblings('.select__input').val($(this).find('.select__item_text').text());
  });
  $('.select').on('click', '.select__list-item_policy', function () {
    $('.select__head').removeClass('open');
    $('.select__list').fadeOut();
    $(this).parents('.solutions-card__top_text-subtitle').prev().text($(this).find('.policy-title p').text());
    $(this).parents('.solutions-card__top_text-subtitle').prev().siblings('p').text($(this).find('.policy').text());
    $(this).parents('.select__list').prev().siblings('.select__input').val($(this).find('.policy-title').text());
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery"), __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./src/js/import/modules.js":
/*!**********************************!*\
  !*** ./src/js/import/modules.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_header_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! %modules%/header/header */ "./src/blocks/modules/header/header.js");
/* harmony import */ var _modules_header_header__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_header_header__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _modules_main_content_main_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! %modules%/main__content/main__content */ "./src/blocks/modules/main__content/main__content.js");
/* harmony import */ var _modules_main_content_main_content__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_main_content_main_content__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! %modules%/footer/footer */ "./src/blocks/modules/footer/footer.js");
/* harmony import */ var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_modules_footer_footer__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _modules_loyalty_loyalty_program__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! %modules%/loyalty/loyalty_program */ "./src/blocks/modules/loyalty/loyalty_program.js");
/* harmony import */ var _modules_loyalty_loyalty_program__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_modules_loyalty_loyalty_program__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _modules_solutions_solutions__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! %modules%/solutions/solutions */ "./src/blocks/modules/solutions/solutions.js");
/* harmony import */ var _modules_solutions_solutions__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_modules_solutions_solutions__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _modules_reviews_reviews__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! %modules%/reviews/reviews */ "./src/blocks/modules/reviews/reviews.js");
/* harmony import */ var _modules_reviews_reviews__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_modules_reviews_reviews__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _modules_insurance_insurance__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! %modules%/insurance/insurance */ "./src/blocks/modules/insurance/insurance.js");
/* harmony import */ var _modules_insurance_insurance__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_modules_insurance_insurance__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _modules_complect_complect__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! %modules%/complect/complect */ "./src/blocks/modules/complect/complect.js");
/* harmony import */ var _modules_complect_complect__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_modules_complect_complect__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _modules_bonuses_bonuses__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! %modules%/bonuses/bonuses */ "./src/blocks/modules/bonuses/bonuses.js");
/* harmony import */ var _modules_bonuses_bonuses__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_modules_bonuses_bonuses__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _modules_modal_modal__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! %modules%/modal/modal */ "./src/blocks/modules/modal/modal.js");
/* harmony import */ var _modules_modal_modal__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_modules_modal_modal__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _modules_addSensors_addSensors__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! %modules%/addSensors/addSensors */ "./src/blocks/modules/addSensors/addSensors.js");
/* harmony import */ var _modules_addSensors_addSensors__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_modules_addSensors_addSensors__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _modules_installment_installment__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! %modules%/installment/installment */ "./src/blocks/modules/installment/installment.js");
/* harmony import */ var _modules_installment_installment__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_modules_installment_installment__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _modules_complect_obor_complect_obor__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! %modules%/complect_obor/complect_obor */ "./src/blocks/modules/complect_obor/complect_obor.js");
/* harmony import */ var _modules_complect_obor_complect_obor__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_modules_complect_obor_complect_obor__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _modules_ready_des_ready_des__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! %modules%/ready-des/ready-des */ "./src/blocks/modules/ready-des/ready-des.js");
/* harmony import */ var _modules_ready_des_ready_des__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_modules_ready_des_ready_des__WEBPACK_IMPORTED_MODULE_13__);















/***/ }),

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _import_modules__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./import/modules */ "./src/js/import/modules.js");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });
//# sourceMappingURL=main.js.map