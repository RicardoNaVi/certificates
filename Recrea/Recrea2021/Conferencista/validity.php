<?php
	$Table = "RecreaConf2021";
	$servername = "localhost";
	$username = "uwdgjqube5wvj";
	$password = "mw1ucrn81jy0";
	$dbname = "dbvgisqd7bnkzg";

	$email = mb_strtolower($_POST['email']);

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$sql = "SELECT id,Email,UPPER(Nombre_Ponente) as nameP,Downloads FROM $Table WHERE Email = '$email'";
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
