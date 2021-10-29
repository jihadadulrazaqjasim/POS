<?php
include "../login.php";
// $is_admin_panel="includes";
//     $url= $_SERVER['REQUEST_URI'];   
    
//     if(strpos($url,$is_admin_panel)){
//         $location="";
//     }else{
//         $location="admin-panel/";
//     }

if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../logout.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!--To give the browser instructions on how to control the page's dimension and scalling-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php
    $is_admin_panel="admin-panel";
    $url= $_SERVER['REQUEST_URI'];   
    
    if(strpos($url,$is_admin_panel)){
        $location="";
    }else{
        $location="admin-panel/";
    }
    ?>

        <!-- For Main content of the admin panel -->
        
        <?php if(!strpos($url,"items_list.php")&&!strpos($url,"users.php")){ ?> 
            
        <link rel="stylesheet" href="<?php echo $location;?>vendor/bootstrap3.3.7.min.css">
        <?php }?>
        
        <link href="<?php echo $location;?>font-awesome-4.7.0/css/metisMenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $location;?>font-awesome-4.7.0/css/morris.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo $location;?>font-awesome-4.7.0/css/sb-admin-2.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $location;?>font-awesome-4.7.0/css/font-awesome.min.css">
            

        <link rel="stylesheet" src="<?php echo $location;?>DataTables-1.10.21/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" src="<?php echo $location;?>DataTables-1.10.21/css/dataTables.bootstrap4.min.css">

        <!-- This links are related to DATATABLES -->

<link rel="stylesheet" type="text/css" href="<?php echo $location;?>DataTables-1.10.21/datatables.min.css"/>

 
            <!-- All styles of the app goes here -->
        <link rel="stylesheet" href="<?php echo $location;?>styles/main.css" type="text/css">

    </head>

    <?php
    $is_admin_panel="admin-panel";
    $url= $_SERVER['REQUEST_URI'];   
    
    if(strpos($url,$is_admin_panel)){
        include "includes/connection.php";
    }else{
        include "admin-panel/includes/connection.php";
    }
    ?>