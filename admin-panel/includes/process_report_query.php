<?php
if(isset($_POST['process_report_query'])&&$_POST['process_report_query']=="yes"){
include "connection.php";

//Get all data send via post request by dataTable.

// $draw = $_POST['draw'];
// $row = $_POST['start'];
// $rowperpage = $_POST['length']; // Rows display per page
// $columnIndex = $_POST['order'][0]['column']; // Column index
// $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
// $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value


$items=$_POST['items'];
$cashiers=$_POST['cashiers'];
$safes=$_POST['safes'];


$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];




// echo json_encode($start_date);

$filter_query=" ";


//if items is not empty(someting selected).

if($items!="empty"){
    $items=implode( "', '",  $_POST['items'] );
    $string="'";
     $items=substr_replace( $items, $string,strlen($items), 0 );
     $items=substr_replace( $items, $string,0, 0 );
     
     $filter_query.=" AND i.id IN ( " .$items. " )";
    }

// if the cashiers is not empty

if($cashiers!="empty"){
    $cashiers=implode( "', '",  $_POST['cashiers'] );
    $string="'";
     $cashiers=substr_replace( $cashiers, $string,strlen($cashiers), 0 );
     $cashiers=substr_replace( $cashiers, $string,0, 0 );

     $filter_query.=" AND s_t.user_id IN ( " .$cashiers. " ) ";
}

// //if the safes is not empty

if($safes!="empty"){
     $safes=implode( "', '",  $_POST['safes'] );
     $string="'";
     $safes=substr_replace( $safes, $string,strlen($safes), 0 );
     $safes=substr_replace( $safes, $string,0, 0 );

     $filter_query.=" AND s_t.safe_id IN ( " .$safes. " ) ";
}

if($searchValue != ''){
    $filter_query .= " and i.name like '%".$searchValue."%'";
 }


 //By default today
$date_query=" cast(s_t.transaction_date_time as date)=CURDATE() ";

 if($start_date!="empty"){
    $date_query=" cast(s_t.transaction_date_time as date) >= "."'".$start_date."'";

}

 if($end_date!="empty"){
    if($start_date!="empty")
    $date_query=" cast(s_t.transaction_date_time as date) BETWEEN "."'".$start_date."' AND '".$end_date."' ";
    
    else 
    $date_query=" cast(s_t.transaction_date_time as date) <= "."'".$end_date."'";

}

// echo json_encode($date_query);

## Total number of records without filtering

// $total="SELECT i.id FROM items as i 
// INNER JOIN items_in_transaction as i_trans ON i.id=i_trans.item_id ";
// $total .="INNER JOIN sales_transaction as s_t ON s_t.id=i_trans.transaction_id WHERE 
// cast(s_t.transaction_date_time as date)=CURDATE() GROUP BY i.id";

// $result = mysqli_query($db,$total);
// $records = mysqli_num_rows($result);
// $totalRecords =$records;



## Total number of records with filtering
// $filtered ="SELECT i.id FROM items as i 
// INNER JOIN items_in_transaction as i_trans ON i.id=i_trans.item_id ";
// $filtered .=" INNER JOIN sales_transaction as s_t ON s_t.id=i_trans.transaction_id
// WHERE " .$date_query." ".$filter_query." GROUP BY i.id";

// $result = mysqli_query($db,$filtered);
// $records = mysqli_num_rows($result);
// $totalRecordwithFilter = $records;



// //By default Today.
$sql ="SELECT i.id as i_id, i.name as item_name, sum(quantity) as quantity, price, 
cast(s_t.transaction_date_time as date) as invoice_date, s_t.id as s_t_id FROM items as i 
INNER JOIN items_in_transaction as i_trans ON i.id=i_trans.item_id ";
$sql .=" INNER JOIN sales_transaction as s_t ON s_t.id=i_trans.transaction_id 
WHERE  ".$date_query." ".$filter_query." GROUP BY i_id";



// $sql ="SELECT i.id as i_id, i.name as item_name, sum(quantity) as quantity, price, 
// cast(s_t.transaction_date_time as date) as invoice_date, s_t.id as s_t_id FROM items as i 
// INNER JOIN items_in_transaction as i_trans ON i.id=i_trans.item_id ";
// $sql .=" INNER JOIN sales_transaction as s_t ON s_t.id=i_trans.transaction_id
// WHERE cast(s_t.transaction_date_time as date)=CURDATE() ".$filter_query." GROUP BY i.id order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;


$result=mysqli_query($db,$sql);

 

if(!$result){ 
    echo "QUERY FAILED " . mysqli_error($db)."<br>".mysqli_errno($db);
}

else{
$rows=array();
        while ($row = mysqli_fetch_array($result)) {
            $total=$row['quantity']*$row['price'];
            $rows[]=array(
                "i_id"=>$row['i_id'],
                "item_name"=>$row['item_name'],
                "quantity"=>$row['quantity'],
                "price"=>$row['price'],
                "total"=>$total,
                "invoice_date"=>$row['invoice_date'],
            );
        }


## Response
// $response = array(
//     "draw" => intval($draw),
//     "iTotalRecords" => $totalRecords,
//     "iTotalDisplayRecords" => $totalRecordwithFilter,
//     "aaData" => $rows
//   );


       echo json_encode($rows);
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
