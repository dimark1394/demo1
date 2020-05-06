$(document).ready(function () {
    $('#eco').change(function () {
        $.ajax({
            type:'POST',
            url:'eco_score.php',
            success: function(msg) {
                $('#eco').html(msg)


            }

        })
    })

});