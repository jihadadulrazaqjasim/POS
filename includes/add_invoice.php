<?php
include "../admin-panel/includes/connection.php";
session_start();
$user_id=$_SESSION['id'];
   if(isset($_POST['product'])){
      
    //   var_dump ($_POST['product']);
    //   echo "<br>";
    //   var_dump ($_POST['id']);
    //   echo "<br>";
    //   var_dump($_POST['qty']);

      $transaction_amount=$_POST['invioceTotal'];

      $statement=$db->prepare("INSERT INTO sales_transaction(user_id,safe_id,transaction_amount) VALUES(?,?,?)");
      
      /*for now we will set user_id to 1 and safe_id 1 (in normal case we should get the user from session and 
      safe_id to the safe that ther corresponging user is interact with)*/
      
    //  $user_id=1;
     $safe_id=1;
      $statement->bind_param("iid",$user_id,$safe_id,$transaction_amount);

      $result=$statement->execute();

      if(!$result){
         die ("QUERY FAILED First Query" . mysqli_error($db)."<br>".mysqli_errno($db));
     }
     
      // Get last insert id
      $lastid = mysqli_insert_id($db);
      
      $quantities=$_POST['qty'];
      $ids=$_POST['id'];

      $statement2=$db->prepare("INSERT INTO items_in_transaction(transaction_id,item_id,quantity) VALUES(?,?,?)");

      for($i=0;$i<sizeof($ids);$i++){

         $id=$ids[$i];
         $quantity=$quantities[$i];
         $statement2->bind_param("iii",$lastid,$id,$quantity); 

        //  echo "<br>";
        //  echo "ID: ".$id." Qty: ".$quantity;

         $result=$statement2->execute();

         if(!$result){
            die ("QUERY FAILED, Second Query" . mysqli_error($db)."<br>".mysqli_errno($db));
   
        }   
      }

  $result=$db->query("UPDATE safe SET balance = balance + ".$transaction_amount." WHERE id=1");
  if(!$result){
    die ("QUERY FAILED, Third Query" . mysqli_error($db)."<br>".mysqli_errno($db));

  }else{
      echo "Data Inserted";
  }
 }else{
  if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
    header('Location:../logout.php');
  }
 }
?>