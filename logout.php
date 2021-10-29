<?php
session_start();

session_unset();
session_destroy();
 

ob_start();
header("location:login_form.php");

ob_end_flush(); 
exit();
?>