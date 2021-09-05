
<?php
//session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 1);

		$servername="localhost";
		$username="root1";
		$password="root1";
		$dbname="15minutes";
		
		// $servername="localhost";
		// $username="kilaqitu_peter";
		// $password="kilaqitu_peter";
		// $dbname="kilaqitu_kilaqitu";
		
		$img_url="http://192.168.0.101/nw/larsen/s/uploads/property/";
		
		// $img_url="https://losenviskas.com/app/s/uploads/property/";
/*
$servername="sql201.ultimatefreehost.in";
		$username="ltm_18946229";
		$password="alchemy771997";
		$dbname="ltm_18946229_v";
		*/
	$conn=mysqli_connect($servername,$username,$password,$dbname);

	if(!$conn){
		die("connection failed:".mysqli_connect_error());
	}
	$data = json_decode(file_get_contents('php://input'), true);
	// $data=$data1['fieldsValue'];

?>
