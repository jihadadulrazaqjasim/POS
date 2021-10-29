<?php
/*I send this parameter (fetchItems) to check if the request is sent 
otherwise(user type the address in url check for if not logged in or not an admin send back to logout)*/
if(isset($_POST['fetchItems'])){
include "connection.php";
include "functions.php";
?>
<?php 
$query='';
$output=array();
$query.="SELECT i.photo as photo,i.id as item_id,i.name as item_name,i.price as item_price,categ.name as category_name 
FROM items as i INNER JOIN categories as categ ON i.category_id=categ.id";
if(isset($_POST['search']['value'])){
    $query.=' WHERE i.name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query.=' OR categ.name LIKE "%'.$_POST["search"]["value"].'%" ';   
}

// if($_POST['order']){
// $query.=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// else{
//     $query.=' ORDER BY item_id DESC ';
// }
// if($_POST["length"]!=-1){

//     $query.=' LIMIT '.$_POST['start'].', '.$_POST['length'];
// }


// $query="SELECT * FROM items";

$result=mysqli_query($db,$query);


if(!$result){
    echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);
}

$data=array();


// $filtered_rows=mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result)) {
    $image='';
    if($row["photo"]!=''){
        $image='<img src="../images/'.$row["photo"].'" 
        class="img-thumbnail" width="70" height="55" />';
    }
    
    else{
        $image='';   
    }
    
    $data[]=array(
        "photo"=>$image,
        "item_id"=>$row['item_id'],
        "item_name"=>$row['item_name'],
        "category_name"=>$row['category_name'],
        "item_price"=>$row['item_price'],
        "edit"=>'<button type="button" name="update" id="'.$row["item_id"].'" class="btn btn-warning btn-xs update">Update</button>',
        "delete"=>'<button type="button" name="delete" id="'.$row["item_id"].'" class="btn btn-danger btn-xs delete">Delete</button>'
    );
}

echo json_encode($data);
}else{
    if(!$_SESSION['username']||empty($_SESSION['username'])){
        header("location:../../logout.php");
    }
    if($_SESSION['role']!='admin'){
        header("location:../../logout.php");
    }
}

?>