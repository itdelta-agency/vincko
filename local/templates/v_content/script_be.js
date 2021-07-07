$(document).ready(function(){
    $("#callback-form").submit(function(e){
        //console.log($(this));
        form=$(this);
        data=form.serializeArray();
        //console.log(data);
        $.post("/ajax/phone_.php",data,function(r){
            console.log(r);
            if(r.success)
            {
                $(".any-modal.callback-success").addClass("vis");
                $(".form__submit",form).prop("disabled",true);
            }
        },"json");
        e.preventDefault();
    });
});
//var btns_modals = document.getElementsByClassName("click-any-modal");
var close_modals = document.getElementsByClassName("any-modal__close");
var win_modals = document.getElementsByClassName("any-modal");



for (let i=0; i<win_modals.length; i++){
//    btns_modals[i].addEventListener("click", function(){
//        win_modals[i].classList.add("vis");
//    });

    close_modals[i].addEventListener("click", function(){
        win_modals[i].classList.remove("vis");
    });
}