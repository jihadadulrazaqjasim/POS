<?php
include "login.php";
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header('Location:../cashier-system/login_form.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!--To give the browser instructions on how to control the page's dimension and scalling-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    

        <!-- For Main content of the admin panel -->    
        <link rel="stylesheet" href="admin-panel/vendor/bootstrap3.3.7.min.css">
        
        
        <link href="admin-panel/font-awesome-4.7.0/css/metisMenu.min.css" rel="stylesheet" type="text/css">
        <link href="admin-panel/font-awesome-4.7.0/css/morris.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="admin-panel/font-awesome-4.7.0/css/sb-admin-2.min.css" type="text/css">
        <link rel="stylesheet" href="admin-panel/font-awesome-4.7.0/css/font-awesome.min.css">
            

        <link rel="stylesheet" src="admin-panel/DataTables-1.10.21/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" src="admin-panel/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">

        <!-- This links are related to DATATABLES -->

<link rel="stylesheet" type="text/css" href="admin-panel/DataTables-1.10.21/datatables.min.css"/>

 
            <!-- All styles of the app goes here -->
        <link rel="stylesheet" href="admin-panel/styles/main.css" type="text/css">

    </head>


    <?php
        include "connection.php";
    ?>