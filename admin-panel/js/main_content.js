$(document).ready(function(){
   $.ajax({
       url:"includes/get_users_and_items_count.php",
       method:"GET",
       success:function(data){
        var parsed_data=$.parseJSON(data);
        $.each(parsed_data,function(index,value){
            $("#total_users").text(value.users_total);
            $("#total_items").text(value.items_total);
        });
    },
       error: function(xhr, status, error){
        var errorMessage = xhr. status + ': ' + xhr. statusText;
        alert('Error - ' + errorMessage);
    },
   });
});