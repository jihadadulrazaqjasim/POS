<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<?php 
include "includes/header.php";
include "includes/navigation.php";
?>


<!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->

<div class="container-fluid">
<br>

  <div class="table-responsive col-sm-12">
         <div align="left" style="margin-left:15px;">
            <button style="margin: 0px;" type="button" id="add_button" data-toggle="modal" 
            data-target="#itemModal" class="btn btn-info btn-lg">New Item</button>
         </div>
          <table id="items_list_tbl" class="table table-bordered table-striped"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;" width="8%">Image</th>
                            <th width="8%">ID</th>
                            <th width="24%">Name</th>
                            <th width="20%">Category</th>
                            <th width="10%">Price</th>
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th style="text-align: center;" width="8%">Image</th>
                            <th width="8%">ID</th>
                            <th width="24%">Name</th>
                            <th width="20%">Category</th>
                            <th width="10%">Price</th>
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </tfoot>
            </table>
      </div>

      <div id="itemModal" class="modal fade">
          <div class="modal-dialog">
              <form method="post" id="item_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header alert alert-info">  
                             <h4 class="modal-title pull-left">Add Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">
                    <div class="form-group"  style="text-align: center;">    
                    <label for="item_name"><h5>Enter Item Name:</h5></label>
                        <input type="text" name="item_name" id="item_name" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Item name is required</div>
                    </div>

                        <div class="form-group">
                        <label for="item_category"><h5>Choose Category:</h5></label>
                        <select name="item_category" id="item_category" class="form-control">
                            <option value="1">Ice-Creams</option>
                            <option value="2">Drinks</option>
                            <option value="3">Sweets</option>
                        </select> 
                        </div>

                        <div class="form-group">
                        <label for="item_price"><h5>Enter Item Price:</h5></label>
                        <input type="number" min=0 step="0.01" name="item_price" id="item_price" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Item Price is required</div>
                        </div>

                        <div class="form-group">
                        <label for="item_photo"><h5>Choose Item Photo:</h5></label>
                        <input type="file" name="item_photo" id="item_photo" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Invalid Image File</div>
                        <span id="item_uploaded_photo"></span>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <input type="hidden" name="item_id" id="item_id">
                        <input type="hidden" name="operation" id="operation">
                        <input type="submit" name="action" id="action" class="btn btn-success form-control" value="Add">
                    </div>
                </div>
              </form>
          </div>
      </div>

<footer>


<?php 
include "includes/footer.php";
?>

<!-- <script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->

<script src="js/items_list.js">

</script>
</footer>