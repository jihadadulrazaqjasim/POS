<?php
// if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
// header('Location:../login_form.php');
// }
?>

<?php
	define("DATABASE_SERVER", "localhost");
	define("DATABASE_USER", "root");
	define("DATABASE_PASS", "");
	define("DATABASE_NAME", "said_anas");

	$db = new mysqli(DATABASE_SERVER, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
// 	else{
// 	    echo "Connected";
//    }
	mysqli_set_charset($db, "utf8");
	date_default_timezone_set('Asia/Baghdad');