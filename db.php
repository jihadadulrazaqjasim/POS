<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "said_anas";

//Check Connection
try {
	$connection = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
	echo "Connection failed".$e->getMesssage();
}

?>