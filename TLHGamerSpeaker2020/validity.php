<?php
	$Table = "GamerSpeaker";
	$servername = "localhost";
	$username = "talentne_2020ah";
	$password = "RnNxO=T56!{r";
	$dbname = "talentne_2020certifathome";

	$name = mb_strtoupper($_POST['nombre']);
	$email = mb_strtolower($_POST['email']);

	$code = "0";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Email,UPPER(Nombre_Ponente) as nameP,Panel,downloads FROM $Table WHERE email='$email' AND UPPER(Nombre_Ponente) LIKE '%$name%'";
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
