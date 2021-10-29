<?php
include "connection.php";
include "functions.php";
if(isset($_POST['item_id'])){
$output=array();

$result=$db->query("SELECT * FROM items WHERE id= '".$_POST['item_id']."' LIMIT 1");


if(!$result){
    die ("QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db));
    
}
else{
while ($row = mysqli_fetch_array($result)) {

    $output["item_name"]=$row["name"];
    $output["item_category"]=$row["category_id"];
    $output["item_price"]=$row["price"];

    if($row["image"!='']){
        $output["item_photo"]='<img src="../images/'.$row["photo"].'" 
        class="img-thumbnail" width="70" height="55" />
        <input type="hidden" name="hidden_item_photo" 
        value="'.$row["photo"].'"/>';
    }
    else{
        $output["item_photo"]='<input type="hidden" name="hidden_item_photo" 
        value=""/>';
    }
}
}
echo json_encode($output);
}

//If the user doesn't send a request instead types this address to url check if it is logged in and is an admin
else{
    if(!$_SESSION['username']||empty($_SESSION['username']||$_SESSION['role']!='admin')){
        header("location:../../login_form.php");
    }
}
?>