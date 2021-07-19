var HeaderFilter = {

    setFilter: function () {
        var str = $("#b-header_filter").serialize();
        var arrayOfStrings = str.split('&');
        arrayOfStrings.forEach(function (element) {
            let s = element.split('=');
            BX.setCookie(s[0], s[1], {expires: 86400, path: '/'});
        });
    }
};