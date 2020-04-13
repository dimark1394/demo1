$(document).ready(function () {
    $("#heatmap").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "getlocations.php",
            data: {
                pickeddate: $("#datefilter").val(),
                submit: $("#heatmap").val()
            },
            success: function(data){
                    let test_data = data;
                    console.log(test_data);

            }
    })
})