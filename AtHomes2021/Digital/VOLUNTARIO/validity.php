<?php
	$Table = "DigitalVol";
	$servername = "localhost";
	$username = "uhfqd5vcyivsh";
	$password = "mwssmgg8b8qk";
	$dbname = "dblazobsushgcp";

	$name = mb_strtoupper($_POST['nombre']);
	$email = mb_strtolower($_POST['email']);

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Email,UPPER(Nombre_Ponente) as nameP,Panel,Downloads FROM $Table WHERE email='$email' AND UPPER(Nombre_Ponente) LIKE '%$name%'";
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
