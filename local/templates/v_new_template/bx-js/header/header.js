"use strict";

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