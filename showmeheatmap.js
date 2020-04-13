var myArray = [];
$(document).ready(function () {
    $("#heatmap").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "getlocations.php",
            dataType: 'JSON',
            data: {
                datefilter: $("#datefilter").val(),
                submit: $("#heatmapsubmit").val()
            },
            success: function (data) {
                var test = data;
                $.each(test,function (i,object) {
                    myArray.push(object.lat,object.lng);
                })
                console.log(myArray);

            }
        })
    })
})