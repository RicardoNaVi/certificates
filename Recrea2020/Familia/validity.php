<?php
	$Table = "familia";
	$servername = "localhost";
	$username = "recre_familia";
	$password = "0bv$tr16dG7*SRCfB2C91t";
	$dbname = "wp_recrea_familia";

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
