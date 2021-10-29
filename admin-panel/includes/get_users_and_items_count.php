<?php include "connection.php";


$items="SELECT count(*) as items_total FROM items"; 

$items_result=mysqli_query($db,$items);


$users="SELECT COUNT(*) as users_total FROM users";

$users_result=mysqli_query($db,$users);

if(!$items_result||!$users_result){
    die( "One of the queries FAILED" . mysqli_error($db)."<br>".mysqli_errno($db));
}

$items_count=mysqli_fetch_assoc($items_result);
$users_count=mysqli_fetch_assoc($users_result);


$output=array();

$output[]=$items_count;
$output[]=$users_count;

echo json_encode($output);

?>