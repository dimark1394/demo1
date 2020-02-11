$(document).ready(function (e) {
    $("#upload").on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            type: POST,
            url: 'upload.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#upmsg").html(response);
            }

        })
    })

})