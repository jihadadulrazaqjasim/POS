<?php
include "connection.php";
include "functions.php";

if(isset($_POST['item_id'])){

    $result=$db->prepare("DELETE FROM items WHERE id=?");
    
    $result->bind_param("i",$_POST['item_id']);
    $result->execute();
    
    if($result){

        echo "Deleted Succesfully!";
    }else{
        die ("QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db));
    }
}else{
    //If the user doesn't send a request instead types this address to url check if it is logged in and is an admin
    if(!$_SESSION['username']||empty($_SESSION['username'])){
        header("location:../../logout.php");
    }
    if($_SESSION['role']!='admin'){
        header("location:../../logout.php");
    }
}
?>