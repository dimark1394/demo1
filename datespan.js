$(document).ready(function () {
    $("#box2").mouseenter(function () {
        $.ajax({
            type: 'POST',
            url: 'datespan.php',
            dataType: 'JSON',
            success: function (data) {
                var response = JSON.parse(JSON.stringify(data));
                document.getElementById("lastupload").innerText = response[0].lastupdt;
                document.getElementById("startdate").innerText = " Your data cover from: " + response[0].startdt;
                document.getElementById("enddate").innerText = " To: " + response[0].startdt;
                $("#lastupload").text =  response[0].lastupdt;
                console.log(response[0].lastupdt);
                console.log(response[0].startdt);
                console.log(response[0].lastdt);
            }
        })
    })
})