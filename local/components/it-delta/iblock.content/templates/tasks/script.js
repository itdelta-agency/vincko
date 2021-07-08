var Itd = {
    viewSotulion: function (data) {
        var strLoadingText = "Loading ..."
        $.ajax({
        url: "/ajax/packages.php",
        type: "POST",
        dataType: "html",
        data: { packagesArray: data },
        // beforeSend: function() {
        //     $('#preloader_call').html(strLoadingText);
        // },
        success: function (data) {
            $('.current-packages').html(data)
        },
        error: function(data) {
            console.log('error');
        }
    });
}
};