<?php
// include "connection.php";
// $query='';
// $output=array();
// $items="SELECT i.id as item_id,i.name as item_name FROM items i"; 

// $users="SELECT u.id as user_id,u.firstname as firstname FROM
// users u";


// //:::::ITEMS
// $items_result=mysqli_query($db,$items);
// if(!$items_result){
//     die( "First QUERY FAILED" . mysqli_error($db)."<br>".mysqli_errno($db));
// }


// $items_array=[];
// while($row=mysqli_fetch_array($items_result)){
// $items_array[]=array("item_id"=>$row['item_id'], "item_name"=>$row['item_name']);
// }


// //:::::USERS
// $users_result=mysqli_query($db,$users);
// if(!$users_result){
//     die("Second QUERY FAILED" . mysqli_error($db)."<br>".mysqli_errno($db));
//  }

// $users_array=[];
// while($row=mysqli_fetch_array($users_result)){
//     $users_array[]=array("user_id"=>$row['user_id'], "firstname"=>$row['firstname']);
//     }
    
//     //COMBINE BOTH ARRAYS
//     $output=array_merge($items_array,$users_array);

//     echo json_encode($output);

?>