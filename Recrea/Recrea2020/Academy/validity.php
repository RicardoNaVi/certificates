<?php
	$Table = "academy";
	$servername = "10.9.4.40";
	$username = "recrea_2020";
	$password = "OX3g18IRGk@A";
	$dbname = "recrea_academy_certificados";

	$pedido = $_POST['pedido'];

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$sql = "SELECT id,Email,UPPER(Name) as nameP,Downloads FROM $Table WHERE id = '$pedido'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		global $code;
		$code = "0";
	}else{
		global $code;
		$code = "1";
	}
	echo $code;
?>
