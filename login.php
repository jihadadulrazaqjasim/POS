<?php
session_start();

// if(isset($_SESSION['username'])&&$_SESSION['role']=='cashier') 
// {
//     header('Location:pos.php');
// }
// if(isset($_SESSION['username'])&&$_SESSION['username']=='admin')
//  {
//     header('Location:admin-panel/index.php');
//  }
 
include "db.php";
if(isset($_POST['submit'])){

  if(isset($_POST['uname'])){
    $name=trim($_POST['uname']);  
  }    //username or pass

    if(isset($_POST['psw'])){
    $pass=trim($_POST['psw']); 
    }    //username password

  $query_user="SELECT * from users where username=:name and password=:pass ";

 
  $statement = $connection->prepare($query_user);
  $statement->execute(array(
   ':name' => $name,
    ':pass' => $pass

  ));


  $count= $statement->rowCount();
  if ($count > 0) {
        foreach ($statement as $row) 
        {
         $username=$row['username'];
         $role=$row['role'];

         
         $_SESSION['username']=$username;
         $_SESSION['role']=$role;
         $_SESSION['id']=$row['id'];
         
        }

        if($role=='admin'){
            header('Location:admin-panel/index.php');
        }


        else if($role=='cashier'){
        header('Location:pos.php');
        }
}else{
    header("Location:login_form.php");
}

    }
//ob_end_flush();
?>
