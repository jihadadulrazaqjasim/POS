<?php
include "connection.php";
include "functions.php";
$output=array();
if(isset($_POST['user_id'])){
$result=$db->query("SELECT * FROM users WHERE id='".$_POST['user_id']."' LIMIT 1");

if(!$result){
    echo ("QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db));
}

else{
    while ($row = mysqli_fetch_array($result)) {
$output['user_id']=$row['id'];
$output['firstname']=$row['firstname'];
$output['lastname']=$row['lastname'];
$output['username']=$row['username'];
$output['password']=$row['password'];
$output['role']=$row['role'];

echo json_encode($output);
}
}
}
//If the user doesn't send a request instead types this address to url check if it is logged in and is an admin
else{
    if(!$_SESSION['username']||empty($_SESSION['username']||$_SESSION['role']!='admin')){
        header("location:../../login_form.php");
    }
}
?>