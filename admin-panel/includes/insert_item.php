<?php 
include "connection.php";
include "functions.php";

if(isset($_POST['operation'])){
    if($_POST['operation']=="Add"){

        $image='';
        if($_FILES['item_photo']['name']!=''){
            $image=upload_image();
        }
        
        $statement=$db->prepare("INSERT INTO items (name,photo,category_id,price) 
        VALUES(?,?,?,?)");

        echo $_POST['item_name']." ".$_POST['item_category'].", ".$_POST['item_price'];

        $statement->bind_param('ssid',$_POST['item_name'],$image,$_POST['item_category'],$_POST['item_price']);

        $result=$statement->execute();
        
        if(!empty($result)){
            echo "Data Inserted";
        }else{
            echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);

        }
    }
    if($_POST['operation']=="Edit"){
        $image='';
        if($_FILES["item_photo"]["name"]!=''){
            $image=upload_image();
        }else{
            $image=$_POST['hidden_item_photo'];
        }
        
        $result=$db->prepare("UPDATE items SET name=?,photo=?,category_id=?,price=? WHERE id=?");

        $result->bind_param("ssidi",$_POST['item_name'],$image,$_POST['item_category'],$_POST['item_price'],$_POST['item_id']);
        $result->execute();

        if($result){
            echo "Data Updated";
        }else{
            echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);
        }
    }
}

?>