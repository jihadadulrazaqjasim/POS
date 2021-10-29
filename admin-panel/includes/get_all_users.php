<?php
if(isset($_POST['get_all_users'])&&$_POST['get_all_users']=="true"){
include "connection.php";
include "functions.php";
 
$query='SELECT * FROM users';

if(isset($_POST['search']['value'])){
    $search=$_POST['search']['value'];
    $query.=' WHERE firstname LIKE "%'.$search.'%" OR
  lastname LIKE "%'.$search.'%" OR username LIKE "%'.$search.'%" OR role LIKE "%'.$search.'%" ';
}


$result=$db->query($query);

if(!$result){
    echo "QUERY FAILED".$db->error."<br>". $db->errno;
}

$data=array();

while($row=mysqli_fetch_array($result)){
    $fullname=$row['firstname']." ".$row['lastname'];
    $data[]=array(
        "user_id"=>$row['id'],
        "fullname"=>$fullname,
        "username"=>$row['username'],
        "password"=>$row['password'],
        "role"=>$row['role'],
        "created_at"=>$row['created_at'],
        "edit"=>'<button type="button" name="update" class="btn btn-warning btn-xs update" id="'.$row['id'].'">Update</button>',
        "delete"=>'<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row['id'].'">Delete</button>',

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