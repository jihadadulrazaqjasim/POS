$(document).ready(function() {
    $('#add_button').click(function(){
        $('#item_form')[0].reset();
        $('.modal-title').text("Add Item");
        $('#action').val("Add");
        $('#operation').val("Add");
        $('#item_uploaded_photo').html('');
        $("input.required").next().hide();
       });

    var dataTable=$('#items_list_tbl').DataTable({
        "processing":false,
        "serverSide":true,
        "bPaginate": false,
        "bInfo" : false,
        "ordering": false,
        // "order":[],
        'serverMethod': 'post',
        "ajax":{
            url:"includes/fetchItems.php",
            method:"POST",
            data:{"fetchItems":"true"},
            dataSrc:""
        },
        // "success":function(data){
        //    alert(data);
        // },

        // "columnDefs":{
        //     "target":[0,5,6],
        //     "orderable":false
        // },
        "columns": [
            {"data":"photo"},
            { "data": "item_id" ,
            "render":function ( data, type, row, meta ) {
                return meta.row+1;
            }
        },
            { "data": "item_name" },
            { "data": "category_name" },
            { "data": "item_price" },
            { "data": "edit" },
            { "data": "delete" },
        ],
    });


   
        
     


// $(window).click(function(event) {
//     if (($(event.target).closest('.ui-dialog')).length>0) {
//         // if clicked on a dialog, do nothing
//         return false;
//     } else {
//         //When the dialog is in the closed state reset the settings.(hide the errors).
//         $("#item_name").next().hide();
//         $("#item_price").next().hide();
//         $("#item_photo").next().hide();
//     }
// });

$(document).on("submit","#item_form",function(event){
    event.preventDefault();
    var itemName=$("#item_name").val();
    var itemCategory=$("#item_category").val();
    var itemPrice=$("#item_price").val();
    var extention=$("#item_photo").val().split('.').pop().toLowerCase();
    if(extention!=''){
        if(jQuery.inArray(extention,['gif','png','jpg','jpeg']) ==- 1){
         //Show error
         $("#item_photo").next().show();
         return false;
        }
    }

    itemName==''?$("#item_name").next().show():'';
    itemPrice==''?$("#item_price").next().show():'';


/*This is when the input content is changed.(useful when we use arrows in number 
type input because keyup not work in this situations). */
    $("input.required").change(function(){
        $(this).val()==''?$(this).next().show():$(this).next().hide();
    });
    
    $("input.required").keyup(function(){
        $(this).val()==''?$(this).next().show():$(this).next().hide();
       });



    if(itemName!='' && itemCategory!=''&&itemPrice!=''){
        $.ajax({
            url:"includes/insert_item.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data){
                // alert(data);
                $("#item_form")[0].reset();
                $("#itemModal").modal('hide');
                dataTable.ajax.reload();
            }
        });
    }
   
});


$(document).on("click",".update",function(){
    var item_id=$(this).attr("id");
    $.ajax({
        url:"includes/fetch_single_item.php",
        method:"POST",
        data:{item_id:item_id},
        dataType:"json",
        success:function(data){
            $("#itemModal").modal("show");
            $("#item_name").val(data.item_name);
            $("#item_category").val(data.item_category);
            $("#item_price").val(data.item_price);
            $(".modal-title").text("Edit Item");
            $("#item_id").val(item_id);
            $("#item_uploaded_photo").html(data.item_photo);
            $("#action").val("Edit");
            $("#operation").val("Edit");

        },
    });

});

$(document).on("click",".delete",function(){
    var item_id=$(this).attr("id");
    if(confirm("Are you sure to delete this item?")){

        $.ajax({
            url:"includes/delete_item.php",
            method:"POST",
            data:{item_id:item_id},
            success:function(data){
                // alert(data);
                dataTable.ajax.reload();
            }
        });
    }    
});
});