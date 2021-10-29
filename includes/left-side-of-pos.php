<?php
if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
header('Location:login_form.php');
}
?>

        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title">POS</h1>
        </div>

        <!-- <div class="row col-sm-3 ">
        <a href=""><img src="images/print.ico" height="50" weight="50"></img></a>
        </div> -->

        <!-- <h3 class="hi">dadas</h3> -->
    <!-- <div id="printable">   -->
        <div class="row clearfix " id="printable">
         <div class="col-md-12">
            <form method="post" name="" id="myform">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr> 
                        <th class="text-center"> # </th>
                        <th class="text-center"> Product </th>
                        <th class="text-center"> Quantity </th>
                        <th class="text-center"> Price(ID) </th>
                        <th class="text-center"> Total </th>
                        <!-- <th class="text-center"> Inc.QtY </th> -->
                    </tr>
                    </thead>

                    <tbody>
                    <tr id='addr0' style="display:none;">
                        <td>1</td>
                        <td><input type="text" name='product[]' readonly class="form-control product"/></td>
                        <td><input require value="1" type="number" min="1" name='qty[]'  class="form-control qty" step="0" /></td>
                        <td><input type="number" name='price[]' readonly class="form-control price" step="0.00" min="0"/></td>
                        <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                        <td hidden><input type="hidden" name='id[]' class="id"></td>
                        <!-- <td><img style="cursor:pointer;" name="pluses[]" class="plus" src="images/plus.png" class="img-responsive"></td> -->
                    </tr>
                    <tr id='addr1'></tr>
                    </tbody>
                    
                </table>
        </div>
     </div>

     <div class="row clearfix">
        <div class="col-sm-6" style="margin-top:5px;">
            <!-- <input id="add_row" class="btn btn-default float-left alert-info" value="Add Row"> -->
            <input type="" id='delete_row' style="margin-top:10px;" class="float-right btn btn-default alert-danger" value="Delete Row">
        </div>


        <div class="float-right col-sm-6" id="include">
            <table class="table table-bordered table-hover" id="tab_logic_total">
                <tbody>
                <tr>
                    <th class="text-center">Total</th>
                    <td class="text-center" ><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                </tr>


                </tbody>
            </table>
            <div></div>
            
            <!-- <label class="text-center">Total</label>
            <input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly> -->

        </div>

    <!-- </div>End of Print area -->
  
        <br>
        <br>
        <hr>
    </div>

    <div class="row clearfix">
    <div class="col-sm-6">
    <input name="cancel" type="button" id="cancel" value="Cancel" class="btn form-control btn-danger">
    </div>

    <div class="col-sm-6">
    <input name="save_invoice" type="submit" value="Save" class="btn form-control btn-success" id="save_invoice">
    </div>

    </div>
    
    </form
    </div>