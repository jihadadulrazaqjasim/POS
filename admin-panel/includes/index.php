<!-- When the user types admin-panel/includes redirect it to the logout -->
<?php
 if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../logout.php");
}
?>