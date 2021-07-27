var reputationRatingFilter = {
    setFilter: function () {
        var str = document.querySelector(".reputation__rating_select-js")
        BX.setCookie("selected_city", str.value, {expires: 86400, path: '/'});
        BX.reload();
    }
};