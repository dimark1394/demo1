$("#export").click(function() {
    $.ajax({
        method: 'GET',
        url:'export.php',
        dataType:'json',
        success:function(data){
            console.log(data);
        }
    })

})