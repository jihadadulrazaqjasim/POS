<?php

?>

<?php
include "connection.php";
include "functions.php";

if(isset($_POST['operation'])){
    $firstname=$_POST['first_name'];
    $lastname=$_POST['last_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    if($_POST['operation']=="Add"){
     
        
        $statement=$db->prepare("INSERT INTO users (firstname,lastname,username,password,role) VALUES (?,?,?,?,?)");

        $statement->bind_param("sssss",$firstname,$lastname,$username,$password,$role);

        $result=$statement->execute();

        if(!empty($result)){
            echo "Data Inserted";
        }else{
            echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);

        }
    } 
    if($_POST['operation']=="Edit"){
       
        $result=$db->prepare("UPDATE users SET firstname=?,lastname=?,username=?,password=?,role=? WHERE id=?");

        $result->bind_param("sssssi",$firstname,$lastname,$username,$password,$role,$_POST['user_id']);
        // $result->bind_param("sssssi",$firstname,$lastname,$username,$password,$role,$_POST['user_id']);

        $result->execute();

        if($result){
            echo "Data Updated";
        }else{
            echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);
        }
    }

    
}else{
    if(!$_SESSION['username']||empty($_SESSION['username'])){
        header("location:../../logout.php");
    }
    if($_SESSION['role']!='admin'){
        header("location:../../logout.php");
    }
}
?>