$("#delete").click(function(event) {
    if(confirm('Are you sure you want to delete everything?')){
        $.ajax({
            url: 'delete_db.php',
            method: 'POST',
            success: function (){
               console.log('everything deleted successfully');
            }
        })
    }

})
