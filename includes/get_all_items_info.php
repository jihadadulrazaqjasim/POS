<?php
    // if(isset($_POST['data'])){
include "connection.php";
?> 
<?php 
$query='';
$output=array();
$query.="SELECT i.photo as photo,i.id as item_id,i.name as item_name,i.price as item_price,categ.name as category_name 
FROM items as i INNER JOIN categories as categ ON i.category_id=categ.id";

$result=mysqli_query($db,$query);


if(!$result){
    echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);
}

$data=array();

while ($row = mysqli_fetch_array($result)) {
    $data[]=array(
        "photo"=>$row["photo"],
        "item_id"=>$row['item_id'],
        "item_name"=>$row['item_name'],
        "category_name"=>$row['category_name'],
        "item_price"=>$row['item_price'],
    );
}

// header('Content-type: application/json');
echo json_encode($data);
    // }else{
    //    echo json_encode( "erjhvbr");
    //    if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
        // header('Location:../logout.php');
    //    }
    // }
?>