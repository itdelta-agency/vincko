$(document).ready(function() {
    $('.ready-des2__title-info .item__content-company-not .solutions__bottom_column-select').on('change', function() {
        var strLoadingText = '<div class="ready-des2__show-item"><div class="wrapper" style="display: flex; justify-content: center;"><img src="/upload/gif/circle.gif" loading="lazy"></div></div>';
        let companyId = $(this).val();

        let task = $('.choice-slide input[name=goal]:checked').attr('data-params');
        if (Boolean(task))
        task = task.replace(/[^0-9,.]/g, '').split(',');
        else
        task = [];
        $.ajax({
            url: "/ajax/packages.php",
            type: "POST",
            dataType: "html",
            data: { 'PACKAGES_ARRAY': task, 'COMPANY': companyId },
            beforeSend: function() {
                $('.current-packages').html(strLoadingText);
            },
            success: function (data) {
                $('.current-packages').html(data)
            },
            error: function(data) {
                console.log('error');
            }
        })
    });

    let strGET = window.location.search.replace( '?', '');
    let arrGet = strGET.split("&");
    let task = null;
    let company = null;
    arrGet.forEach(function(item, i, arr) {
        if(item.indexOf('task') != -1)
            task = item.split("=");
        if(item.indexOf('company') != -1)
            company = item.split("=");
    })
    setTimeout(() => {
        $('.ready-des2__choice-item[for='+task[1]+']').click();
        }, 500);


})


var TaskManager = {
    viewSotulion: function (data) {
        var strLoadingText = '<div class="ready-des2__show-item"><div class="wrapper" style="display: flex; justify-content: center;"><img src="/upload/gif/circle.gif" loading="lazy"></div></div>';
        let companyId = $('.ready-des2__title-info .item__content-company-not .solutions__bottom_column-select').val();

        $.ajax({
        url: "/ajax/packages.php",
        type: "POST",
        dataType: "html",
        data: { 'PACKAGES_ARRAY': data, 'COMPANY': companyId },
         beforeSend: function() {
             $('.current-packages').html(strLoadingText);
         },

        success: function (data) {
            $('.current-packages').html(data)
        },
        error: function(data) {
            console.log('error');
        }
    });
}};
