<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<?php 
include "includes/header.php";
include "includes/navigation.php";
?>


<div class="container-fluid"> 
<br>

  <div class="table-responsive col-sm-12">
         <div align="left" style="margin-left:0px;">
            <button style="margin: 0px;" type="button" id="add_button" data-toggle="modal" 
            data-target="#userModal" class="btn btn-info btn-lg">New User</button>
         </div>
          <table id="users_tbl" class=" table table-bordered table-striped"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Full Name</th>
                            <th width="15%">Username</th>
                            <th width="15%">Password</th>
                            <th width="10%">Role</th>
                            <th width="10%">Created At</th>
                            <th width="10%">Edit</th>
                            <th width="10%">Delete</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                        <th width="5%">ID</th>
                            <th width="25%">Full Name</th>
                            <th width="15%">Username</th>
                            <th width="15%">Password</th>
                            <th width="10%">Role</th>
                            <th width="10%">Created At</th>
                            <th width="10%">Edit</th>
                            <th width="10%">Delete</th>
                        </tr>
                    </tfoot>
            </table>
      </div>

      <div id="userModal" class="modal fade">
          <div class="modal-dialog">
              <form method="post" id="user_form">
                <div class="modal-content">
                    <div class="modal-header alert alert-info">  
                             <h4 class="modal-title pull-left ">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">    
                        <label for="first_name"><h5>First Name:</h5></label>
                            <input type="text" name="first_name" id="first_name" class="form-control required">
                            <div class="alert alert-danger" style="display: none;">Firstname required</div>
                        </div>

                        <div class="form-group">
                        <label for="last_name"><h5>Last Name:</h5></label>
                        <input type="text" name="last_name" id="last_name" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Last Name Required</div>
                        </div>

                        <div class="form-group">
                        <label for="username"><h5>User Name:</h5></label>
                        <input type="text" name="username" id="username" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Username required</div>
                        </div>

                        <div class="form-group">
                        <label for="password"><h5>User Password:</h5></label>
                        <input type="text" name="password" id="password" class="form-control required">
                        <div class="alert alert-danger" style="display: none;">Password required</div>
                        </div>

                        <div class="form-group">
                        <label for="role"><h5>User Role:</h5></label>
                        <select name="role" id="role" class="form-control">
                            <option value="cashier">Cashier</option>
                            <option value="admin">Admin</option>
                        </select>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id">
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



<script src="js/users.js">

</script>
</footer>