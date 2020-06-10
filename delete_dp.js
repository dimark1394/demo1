(document).ready(function(){
    $('#delete').click()(function(event) {
        event.preventDefault();
        $.ajax({
            url: 'delete_db.php',
            method: 'POST',
            dataType
        })

    })
    }
)