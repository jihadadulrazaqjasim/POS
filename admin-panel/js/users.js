$(document).ready(function() {
    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add User");
        $('#action').val("Add");
        $('#operation').val("Add");
        $("input.required").next().hide();
       });

       var dataTable=$("#users_tbl").DataTable({
           "processing":false,
           "serverSide":true,
           "bPaginate": false,
           "bInfo" : false,
           "ordering": false,
           "serverMethod":"post",
           "ajax":{ 
               url:"includes/get_all_users.php",
               data:{"get_all_users":"true"},
               method:"POST",
               dataSrc:"",
           },
        //    "success":function(data){
        //        alert(data);
        //    },
        
           "columns":
           [
               {"data":"user_id",
               "render":function ( data, type, row, meta ) {
                return meta.row+1;
            }
        },
               {"data":"fullname"},
               {"data":"username"},
               {"data":"password"},
               {"data":"role"},
               {"data":"created_at"},
               {"data":"edit"},
               {"data":"delete"},
            ],
       });





       $(document).on("submit","#user_form",function(event){
           event.preventDefault();

           var firstName=$("#first_name").val();
           var lastName=$("#last_name").val();
           var username=$("#username").val();
           var password=$("#password").val();
           var role=$("#role").val();

           //If firstname is empty show the error div that i setted to display:none by default.
           firstName==''?$("#first_name").next().show():'';
           lastName==''?$("#last_name").next().show():'';
           username==''?$("#username").next().show():'';
           password==''?$("#password").next().show():'';
            
           $("input.required").keyup(function(){
            $(this).val()==''?$(this).next().show():$(this).next().hide();
           });
            
           if(firstName!=''&&lastName!=''&&username!=''&&password!=''&&role!=''){
           $.ajax({
               url:"includes/insert_user.php",
               method:"POST",
               contentType:false,
               processData:false,
               data:new FormData(this),
               success:function(data){
                  
                   $("#user_form")[0].reset();
                   $("#userModal").modal('hide');
                   dataTable.ajax.reload();
               },
           });        
           }
       });
       
      
       $(document).on("click",".update",function(){
        $("input.required").keyup(function(){
            $(this).val()==''?$(this).next().show():$(this).next().hide();
           });   
        
        var user_id=$(this).attr("id");
           
           $.ajax({
               url:"includes/fetch_single_user.php",
               method:"POST",
               data:{user_id:user_id},
               dataType:"json",
               success:function(data){
                   $("#userModal").modal("show");
                   $("#first_name").val(data.firstname);
                   $("#last_name").val(data.lastname);
                   $("#username").val(data.username);
                   $("#password").val(data.password);
                   $("#role").val(data.role);
                   $(".modal-title").text("Edit User");
                   $("#user_id").val(user_id);
                   $("#action").val("Edit");
                   $("#operation").val("Edit");
               },
           });
       });


       $(document).on("click",".delete",function(){
           if(confirm("Are you sure you want to delete this user?")){
               var user_id=$(this).attr("id");
                $.ajax({
                    url:"includes/delete_user.php",
                    method:"POST",
                    data:{user_id:user_id},
                    success:function(data){
                        alert(data);
                        dataTable.ajax.reload();
                    },
                });
           }
       });


});