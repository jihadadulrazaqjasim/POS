<?php
include "../login.php";
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../cashier-system/logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../cashier-system/logout.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" >
<html>
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title >SAID ANAS</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/multiselect/css/bootstrap-multiselect.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    
    <!-- Toggle Button -->
    <link rel="stylesheet" href="../bootstrap-toggle-master/css/bootstrap-toggle.css">
    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->


    <!-- For excel and print buttons of the datatable! -->
    <!-- <link rel="stylesheet" href="vendor/datatables/buttons.dataTables.min.css"> -->

<style>
li.dropdown:last-child .dropdown-menu {
  right: 0;
  left: auto;
}


/* Styling for bootstap multiselect dropdown plugin */
span.multiselect-native-select {
	position: relative
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 0
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
	font-weight: 400;
	padding: 3px 0 3px 30px
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}

</style>
</head>

<?php
include "includes/connection.php";
include "includes/navigation.php";
?>

<hr> 
    <div class="container-fluid">
    
<div class="card mb-3" style="margin-left: 10px;">

        <div class="card-header">
            <i class="fa fa-table"></i>
<div class="row">
<div class="col-sm-3" style="text-align: center;">
    <h4 for="items">Items:</h4>
        <select id="items" class="multiselect-ui form-control" multiple="multiple">
        </select>
</div>

<div class="col-sm-3" style="text-align: center;">
    <h4 for="cashiers">Cashiers:</h4>
        <select id="cashiers" class="form-control" multiple="multiple">
        </select>
    </div>


<div class="col-sm-3" style="text-align: center;">
    <h4 for="safes">Safes:</h4>
        <select id="safes" class="form-control" multiple="multiple">
             <option value=1>Upstairs Safe</option>
            <!-- <option value=2>Downstairs Safe</option>  -->
        </select>  
</div>


<div class="col-sm-3 form-group form-inline">
    <p for="start_date">Start date:
    <input type="date" name="start_date" id="start_date" class="form-control">
    </p>
    <p for="end_date">End date:&nbsp;
    <input type="date" name="end_date" id="end_date" class="form-control">
    </p>
</div>


</div>
<!-- End of row -->
</div>
<!-- End of card-header -->
<br>
<div class="row" style="margin-left: 18px;">
    <div class="col-sm-1">
    <button class="btn btn-info form-control" id="print_button">Print</button>
    </div>

    <div class="col-sm-1" style="text-align:right;">
    <button class="btn btn-success form-control" id="excel_button">Excel</button>
    </div>
    
    <!-- <div class="offset-sm-8 col-sm-2" style="text-align:center;">
    <a href="transactions.php" class="btn btn-primary" id="transactions">Transactions</a>
    </div> -->
    
    <div class="col-sm-2">    
    <!-- Default switch -->
    <!-- <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"> -->
    </div>

</div>
    <div class="card-body" id="print_table">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                 
                <thead >
                        
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                
                    <tbody>
                    
                    </tbody>
                    
                    <tfoot>
                    <tr>
                    <th>ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                    
                        
                     
                </tfoot>
                <!-- <div style="text-align: center;"> 
                    <h4 id="totalOfTable"></h4>  
                    </div>       -->
                
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted" id="include">
        <div class="row">
            <div class="offset-sm-9 col-sm-3">
                <h4 id="totalOfTable">
                    
                </h4> 
            </div>
        </div>
       
        </div>
    </div>
</div>
</html>
    

<script src="vendor/jquery/jquery.min.js"></script>
<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<script src="vendor/multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>


<script src="../Export-Html-Table-To-Excel-Spreadsheet-using-jQuery-table2excel/src/jquery.table2excel.js"></script>
<script src="../jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js"></script>


<!-- <script src="../Inline-Checkbox-Radio-Buttons-For-Bootstrap/src/js/TwbsToggleButtons.js"></script>
<script src="../Inline-Checkbox-Radio-Buttons-For-Bootstrap/src/js/jquery.twbs-toggle-buttons.js"></script> -->


<script src="../bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

<!-- My Custom scripts -->
<script src="js/reports.js"></script>