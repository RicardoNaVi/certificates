<?php
	$Table = "LATAM";
	$servername = "localhost";
	$username = "talentne_2020ah";
	$password = "RnNxO=T56!{r";
	$dbname = "talentne_2020certifathome";

	$pedido = $_POST['pedido'];

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id,Email,UPPER(Nombre) as nameP,Downloads FROM $Table WHERE id = '$pedido'";
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
