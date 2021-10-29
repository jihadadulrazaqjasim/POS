$(document).ready(function() {

//     $(function() {
//     $('#toggle').bootstrapToggle({
//       on: 'Chart',
//       off: 'Table'
//     });
//   });


var itemss;
//When the page loads get all items.
$.ajax({
    url:"../includes/get_all_items_info.php",
    method:"GET",
    contentType:"applicatopn/json",
    success:function(data){
         itemss=$.parseJSON(data);
        $.each(itemss,function(index,value){
            var item_id=value.item_id;
            // var photo=value.photo;
            var item_name=value.item_name;

            // alert("ID: "+item_id+", Name: "+item_name);
            // var category_name=value.category_name;
            // var item_price=value.item_price;
            
            var content=`<option value="`+item_id+`">`+item_name+`</option`;
            $("#items").append(content);
            
        });

    // When items select dropdown changed..
    $('#items').multiselect({
    selectAllValue: 'multiselect-all',
    includeSelectAllOption: true,
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            buttonWidth: '235',
            numberDisplayed: 2,
            nonSelectedText: 'Select Item',

            // onCheckAll:function () {
            //     alert("all");
            //     dataTable.draw();
            //           return false;
            //       },

            onChange :function(option, checked) {
                dataTable.draw();
            },

    });

    $("#items").multiselect('selectAll',false);
    $("#items").multiselect('updateButtonText');
    
    },
 
    error: function(xhr, status, error){
        var errorMessage = xhr. status + ': ' + xhr. statusText;
        alert('Error - ' + errorMessage);
    },
});

//Get ALL users

$.ajax({
    url:"includes/get_id_and_name_users.php",
    method:"GET",
    contentType:"applicatopn/json",
    data:{"get_id_and_name_users":"yes"},
    success:function(data){
         var users=$.parseJSON(data);
        $.each(users,function(index,value){
            var user_id=value.user_id;
            var firstname=value.firstname;
            var content=`<option value="`+user_id+`">`+firstname+`</option`;
            $("#cashiers").append(content);
            
        });

    // When items select dropdown changed..
    $('#cashiers').multiselect({
    selectAllValue: 'multiselect-all',
    // includeSelectAllOption: true,
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            buttonWidth: '235',
            numberDisplayed: 2,
            nonSelectedText: 'Select Cashier',
            onChange :function(option, checked) {
                dataTable.draw();
            },
    });

    $("#cashiers").multiselect('selectAll',false);
    $("#cashiers").multiselect('updateButtonText');
    
    },

    error: function(xhr, status, error){
        var errorMessage = xhr. status + ': ' + xhr. statusText;
        alert('Error - ' + errorMessage);
    },
});



var start_date;
var end_date;
var today;

  //DATA TABLE
var  dataTable= $("#dataTable").DataTable({
    // dom: 'Bfrtip',
    //     buttons: [
    //         'excel',
    //     ],
    'processing': false,
    'serverSide': true,
    "bPaginate": false,
    "bInfo" : false,
    "ordering": false,
    'serverMethod': 'post',

    "fnInitComplete": function (oSettings, json) {
        //Do something when the complete datatable is loaded
        $("#excel_button").click(function(){
            $("#dataTable").table2excel({
              // exclude CSS class
              exclude: ".noExl",
              name: "SAID-ANAS",
              filename: "report", //do not include extension
              fileext: ".xls" // file extension
            }); 
          });

          $("#print_button").click(function(){
          $("#print_table").print({
            noPrintSelector :".dataTables_filter",
            prepend:"<h1>SAID ANAS</h1>",
            // title:"<h1>SAID ANAS</h1>",
            append:$("#include"),
        });
    });

    },

    "ajax": {
        "url": "includes/process_report_query.php",
        "dataSrc":"",
        
        "data":function(data){
            //Read values of select dropwowns always!
            var items=$("#items").val();
            var cashiers=$("#cashiers").val();
            var safes=$("#safes").val();
            var start_date=$("#start_date").val();
            var end_date=$("#end_date").val();
            var process_report_query='';
            if(items==""){
                items="empty";
                // alert(items);
            }
            if(cashiers==""){
                cashiers="empty";
                // alert(cashiers);
            }
            if(safes==""){
                safes="empty";
                // alert(safes);
            }

            if(start_date==""){
            
                start_date="empty";
            // alert(start_date);
            }
            if(end_date==""){
                end_date="empty";
            // alert(safes);
            }

            //Append values to data.
            data.items=items;
            data.cashiers=cashiers;
            data.safes=safes;
            data.start_date=start_date;
            data.end_date=end_date;
            data.process_report_query="yes";

        },

        // "success":function(data){
        //     alert(data);
        // },
    },

    "columns": [
        { "data": "i_id" ,
        "render":function ( data, type, row, meta ) {
            return meta.row+1;
        }
        },
        { "data": "item_name" },
        { "data": "quantity" },
        { "data": "price" },
        { "data": "total",
          "render":function ( data, type, row, meta ) {
            return Number.isInteger(data)?data+".00":data+"";
        }
        },
        { "data": "invoice_date",
        "render":function ( data, type, row, meta ) {
            if(start==false){
                if(end==true){
                    if(end_date==today){
                        return today;
                    }else{
                        return "<span style='color:red'> till </span>"+end_date;
                    }
                } 
               return today;
            }

            if(start==true&&end==false){
                if(start_date!=today)
                return start_date+"<span style='color:red'> to </span>"+today;
            else{ return today;}
            }
            else if(start==true&&end==true){
                return start_date +"<span style='color:red'> to </span>"+end_date;
            }
            
                return data;
            
            // return start=true?; },
           } 
          }
    ],
    
    "language": {
        "emptyTable":"No Data Found"
    },
   
});




$('#safes').multiselect({

selectAllValue: 'multiselect-all',
// includeSelectAllOption: true,
        enableCaseInsensitiveFiltering: true,
        enableFiltering: true,
        maxHeight: '300',
        buttonWidth: '235',
        numberDisplayed: 2,
        nonSelectedText: 'Select Safe',

        onChange :function(option, checked) {
            dataTable.draw();
        },
});

$("#safes").multiselect('selectAll',false);
$("#safes").multiselect('updateButtonText');




        //set max values for start and end dates to today.
        today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;

        $("#end_date").attr("max",today);
        $("#start_date").attr("max",today);

        var start=false;
        var end=false;
        $("#start_date").change(function(){
            start=true;
            start_date=$(this).val();
            dataTable.draw();
        });
        

        $("#end_date").change(function(){
            end=true;
            end_date=$(this).val();
            dataTable.draw();
        });

    //When a change is occured to the datatable this function will be triggered!.
    $('#dataTable').on( 'draw.dt', function () {
        var totalOfTable=0;
        dataTable.rows( function (idx, data, node) {
            totalOfTable= dataTable.cell( idx, 4 ).data() +totalOfTable;
       });
       var theText="TOTAL: "+totalOfTable;
       if(Number.isInteger(totalOfTable)){
        $("#totalOfTable").html(theText+".00 ID");
       }else{
        $("#totalOfTable").html(theText+"0 ID");
       }
    } );
    
    
//     $('#typeOfReport').multiselect({
//         multiple:false,
//         selectedList: 1,
//         maxHeight: '300',
//         buttonWidth: '235',
//         nonSelectedText: 'Select Report Type',

// });
    
});