<?php
include "connection.php";
include "functions.php";

if(isset($_POST['user_id'])){
$result=$db->query("DELETE FROM users WHERE id=".$_POST['user_id']);


if($result){
    echo "User Deleted!";
}else{
    echo "QUERY FAILED ".$db->error. " ".$db->errno;
}
}

else{
//If the user doesn't send a request instead types this address to url check if it is logged in and is an admin
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../logout.php");
}
}
?>