$(document).ready(function () {
        $("#uploadedfile").fileupload({
            url: 'upload.php',
            dataType: 'json',
            autoUpload: false
        })}).on('fileuploadadd', function (e, data) {
            var fileTypeAllowed = /.\.(json)$/i;
            var fileName = data.originalFiles[0]['name'];
            var fileSize = data.originalFiles[0]['size'];
            console.log(data);
            if (!fileTypeAllowed.test(fileName)) {
                $("#error").html('Only json files are allowed');
            }else{
                $("#submitupload").click(function() {
                    data.submit();
            })}}).on('fileuploaddone', function (e, data) {
            var msg = data.jqXHR.responseJSON.msg;
            $("#error").html(msg);
        }).on('fileuploadprogress', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#progress").html("Completed: " + progress + "%");
})