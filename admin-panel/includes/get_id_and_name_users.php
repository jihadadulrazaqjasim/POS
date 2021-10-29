<?php
if(isset($_GET['get_id_and_name_users'])&&$_GET['get_id_and_name_users']=="yes"){
include "connection.php";

$query='SELECT id,firstname FROM users';

$result=$db->query($query);

if(!$result){
    echo "QUERY FAILED".$db->error."<br>". $db->errno;
}

$data=array();

while($row=mysqli_fetch_array($result)){
    $data[]=array(
        "user_id"=>$row['id'],
        "firstname"=>$row['firstname'],

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