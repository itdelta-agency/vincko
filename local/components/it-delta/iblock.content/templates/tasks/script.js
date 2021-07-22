var TaskManager = {
    viewSotulion: function (data) {
        var strLoadingText = '<div class="ready-des2__show-item"><div class="wrapper" style="display: flex; justify-content: center;"><img src="/upload/gif/circle.gif" loading="lazy"></div></div>'
        $.ajax({
        url: "/ajax/packages.php",
        type: "POST",
        dataType: "html",
        data: { packagesArray: data },
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
}
};