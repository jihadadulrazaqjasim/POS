$(document).ready(function(){
    /*:::::::::::DEFAULTS::::::::::::::::*/
    $("#save_invoice").addClass("no-click");
    $("#cancel").addClass("no-click");
    $(".no-click").css("pointer-events","none");

    var items;
    //When the page loads get all items.
    $.ajax({ 
        url:"includes/get_all_items_info.php",
        method:"POST",
        contentType:"applicatopn/json",
        data:{"get_all_items_info":"yes"},
        // dataType:"json",
        success:function(data){
             items=$.parseJSON(data);
            $.each(items,function(index,value){
                var item_id=value.item_id;
                var photo=value.photo;
                var item_name=value.item_name;
                var category_name=value.category_name;
                var item_price=value.item_price;
                
                var content=`<div id="`+item_id+`" name="`+item_name+`" category="`+category_name+`" price="`+item_price+ 
                `" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter `+category_name+`">
                <a>
                <p>`+item_name+`</p>
                <img  src="images/`+photo+`" class="img-responsive">
                </a>
            <p class="prices-text">`+item_price+`-ID</p>
          </div>`;
          
                $("#all_items_div").append(content);
                
            });
            
            // Default is drinks.
            $(".filter").each(function(){
                var value="drinks";
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
            
            });
        },

        error: function(xhr, status, error){
            var errorMessage = xhr. status + ': ' + xhr. statusText;
            alert('Error - ' + errorMessage);
        },
    });

    var item_name="";
    var item_price="";

//Scripts for right side of the POS.
    $(".filter-button").click(function(){
         value = $(this).attr('data-filter');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
    });

     
    if ($(".filter-button").removeClass("active")) {
    $(this).removeClass("active");
    }

    $(this).addClass("active");


    // Scripts for left side of the POS
    var i=1;
    var not_allowed = [];
    var item_id;
    $(document).on("click",".gallery_product",function(){
        $(".no-click").css("pointer-events","auto");

        b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');

        //Get the information of the element that's clicked.
        item_id=$(this).attr('id');
        item_name=$(this).attr('name');
        item_price=$(this).attr('price');

        //push the id of the item that's clicked to not_allowed array :)
        not_allowed.push(item_id);

        //set the property of the clicked item to disabled so that can't be clicked.
        $(this).prop("disabled", true);

        //set the cursor of the clicked item to not-allowed cursor type.
        $(this).css("cursor","not-allowed");
        
        //find the id, product and price classes from last appended row and set values. 
        $('#addr'+i).find('.id').val(item_id);
        $('#addr'+i).find('.product').val(item_name);
        $('#addr'+i).find('.price').val(item_price);
        
        //increment index.
        i++;

        calc();

        // alert("i= "+i);
    });


    
        //When plus is clicked
        // $('#tab_logic').on( 'click', '.plus', function( event ) {
        //     count++;
        //     var $tr = $(this).closest('tr');
        //      var curQty=$tr.find('.qty').val(count);
        //     calc();
        // });

        $(document).on("click","#cancel",function(event){
            //when cancel is clicked change the index of the row to 1 again(like reseting) i=1.
            //and reset not_allowed array.
            i=1;
            // alert("i= "+i);
            not_allowed = [];

            $(".no-click").css("pointer-events","none");
            event.preventDefault();

            $('#tab_logic tbody').html(`<tr id='addr0' style="display:none;">
            <td>1</td>
            <td><input type="text" name='product[]' readonly class="form-control product"/></td>
            <td><input type="number" value=1 min=1 name='qty[]'  class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' readonly class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            <td hidden><input type="hidden" name='id[]' class="id"></td>
            <!-- <td><img style="cursor:pointer;" name="pluses[]" class="plus" src="images/plus.png" class="img-responsive"></td> -->
           </tr>
          <tr id='addr1'></tr>`);

          
          //Loop through all products and 
          $(".gallery_product").each(function(){
            $(this).prop("disabled", false);
            $(this).css("cursor","cell");
        });

        $("#sub_total").val('');
        });

    
    $("#delete_row").click(function(){
        
        if(i>1){
            //when delete clicked pop the last added item id to the array, 
            //loop through all products and set the property
            //disabled to false and change the cursor to cell
            var id=not_allowed.pop(item_id);
            $(".gallery_product[id='"+id+"']").each(function(){
                $(this).prop("disabled", false);
                $(this).css("cursor","cell");
            });

        //set the last added row to empty.
        $("#addr"+(i-1)).html('');
        i--;

        // alert("i= "+i);    
    }

    if(i<=1){
        $(".no-click").css("pointer-events","none");
    }

        calc();
    });
    
    $('#tab_logic tbody').on('keyup change',function(){
        calc();
    });

//When submit button is clicked We send form data to server
//and in server data is saved into two tables.

// $("#printable").find('#save_invoice').on('click', function() {
                
    
    
//     });

$("#save_invoice").on("click",function(event){
    $(".no-click").css("pointer-events","none");
    event.preventDefault();
    var id=new Array();
    var product = new Array();
    var qty=new Array();
    var price=new Array();
    var total=new Array();
    var invoiceTotal=$('#sub_total').val();
       
    $('#tab_logic tbody tr').not('#addr0').not(':last-child').each(function(i, el) {     
        // alert ( $(this).attr ('id' ) );
        id[i]=$(this).find('.id').val();
        product[i]=$(this).find('.product').val();
        qty[i]=$(this).find('.qty').val();
        price[i]=$(this).find('.price').val();
        total[i]=$(this).find('.total').val();

        // alert("product: "+product[i]+", qty:"+qty[i]+", price"+price[i]+", total: "+total[i]+", invoiceTot: "+invoiceTotal)
     });

      var mydata={"id":id,"product":product,"qty":qty,"price":price,"total":total,"invioceTotal":invoiceTotal};

        $.ajax({
        type:"POST",
        datatype:"json",
        url:"includes/add_invoice.php",
        data:mydata,
            success:function(result){
                alert(result);
                /*add this class to quantity input so 
                we can hide appearance of the
                spinners(increment,decrement)
                during print.*/
                $('.qty').addClass('hide_spin');
                
                var dt = new Date();
                var sec= dt.getSeconds()<=9?"0"+dt.getSeconds():dt.getSeconds();
                var min=dt.getMinutes()<=9?"0"+dt.getMinutes():dt.getMinutes();
                var hour=dt.getHours()<=9?"0"+dt.getHours():dt.getHours();

                var time = hour + ":" + min + ":" + sec;
                
                //LET'S PRINT THIS HERE.
                $("#printable").print({
                    noPrintSelector : "#delete_row",
                    // prepend:"<h1>SAID ANAS</h1>",
                    title:"_____________________________________________SAID ANAS____________________________________ "+time,
                    append:$("#include"),
                });

                //when cancel is clicked change the index of the row to 1 again(like reseting) i=1.
                //and reset not_allowed array.
                $("#sub_total").val('');
                i=1;
                not_allowed = [];
                // $('#myform :input').val('');

                $('#tab_logic tbody').html(`<tr id='addr0' style="display:none;">
                    <td>1</td>
                    <td><input type="text" name='product[]' readonly class="form-control product"/></td>
                    <td><input type="number" value=1 min=1 name='qty[]'  class="form-control qty" step="0" min="0"/></td>
                    <td><input type="number" name='price[]' readonly class="form-control price" step="0.00" min="0"/></td>
                    <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                    <td hidden><input type="hidden" name='id[]' class="id"></td>
                    <!-- <td><img style="cursor:pointer;" name="pluses[]" class="plus" src="images/plus.png" class="img-responsive"></td> -->
                </tr>
            <tr id='addr1'></tr>`);


                //Loop through all products and 
                $(".gallery_product").each(function(){
                    $(this).prop("disabled", false);
                    $(this).css("cursor","cell");
                });


            },
            error: function(xhr, status, error){
                var errorMessage = xhr. status + ': ' + xhr. statusText;
                alert('Error - ' + errorMessage);
            },
            
         });
    
    });

});



//Functions of calculating the total and subtotal.
function calc()
{
    $('#tab_logic tbody tr').each(function(i, element) {
        var html = $(this).html();
        if(html!='')
        { 
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var t=qty*price;
            t=Number.isInteger(t)?t+".00":t+"";
            $(this).find('.total').val(t);

            calc_total();
        }
    });
}

function calc_total()
{
    total=0.00;
    $('.total').each(function() {
        total += parseFloat($(this).val());
    });
    $('#sub_total').val(total.toFixed(2));
}