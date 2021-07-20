var EquipitemHandler = {
    addToBasket: function () {
        var data = $("#b-order-form").serializeArray();
        $.ajax({
            url: "/ajax/addtobasket.php",
            type: "POST",
            data: data,
            success: function (data) {
                console.log(data);
                location.href='/personal/order/make/';
            },
            error: function(data) {
                console.log('error');
            }
        });
    }
};