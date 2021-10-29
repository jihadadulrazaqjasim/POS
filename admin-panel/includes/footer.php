<?php
if(!$_SESSION['username']||empty($_SESSION['username'])){
        header("location:../../logout.php");
    }
    if($_SESSION['role']!='admin'){
        header("location:../../logout.php");
    }

$is_admin_panel="admin-panel";
    $is_admin_panel_and_includes_folder="includes";

     $url= $_SERVER['REQUEST_URI'];
    

    if(strpos($url,$is_admin_panel)){
        $location="";
    }else{
        $location="admin-panel/";
    }
    ?>


<script src="<?php echo $location;?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $location?>vendor/bootstrap/js/bootstrap.min.js" ></script>
<script src="<?php echo $location;?>DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $location?>DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
