<?php
function get_total_all_records(){
    global $db;
    $query="SELECT * FROM items";
    $result=mysqli_query($db,$query);
    $total_num_rows=mysqli_num_rows($result);

return $total_num_rows;
}

function upload_image(){
$extension=explode('.',$_FILES['item_photo']['name']);
$new_name=rand(). ".". $extension[1];
$destination='../../images/'.$new_name;
move_uploaded_file($_FILES['item_photo']['tmp_name'],$destination);
return $new_name;
}
?>