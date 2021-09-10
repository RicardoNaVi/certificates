<?php
	$Table = "sep";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "talent_digital";
/*
	$pedido = $_POST['pedido'];

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$sql = "SELECT id,email,UPPER(name) as nameP,Downloads FROM $Table WHERE name LIKE '$pedido'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		global $code;
		$code = "0";
	}else{
		global $code;
		$code = "1";
	}
	*/
	$code = "0";
	echo $code;
?>
