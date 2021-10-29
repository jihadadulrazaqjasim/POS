<?php
if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
header('Location:../login_form.php');
}
?>

<script src="admin-panel/vendor/jquery/jquery.min.js"></script>
<script src="admin-panel/vendor/bootstrap/js/bootstrap.min.js" ></script>
<script src="admin-panel/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
<script src="admin-panel/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
