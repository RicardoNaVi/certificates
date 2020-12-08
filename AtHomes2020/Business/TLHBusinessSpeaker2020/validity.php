<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$servername = "localhost";
$username = "talentne_2020ah";
$password = "RnNxO=T56!{r";
$dbname = "talentne_2020certifathome";

$name = mb_strtoupper($_POST['nombre']);
$email = mb_strtolower($_POST['email']);


$code = "0";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Email,UPPER(Nombre_Ponente) as nameP,Panel,downloads FROM BusinessSpeaker WHERE email='$email' AND UPPER(Nombre_Ponente) LIKE '%$name%'";

		$result = $conn->query($sql);
		//$conn->close();

		if ($result->num_rows > 0) {
		    // output data of each row
		    //Existe el usuario1 en BD, no se puede vincular error 0
			//On page 2

		    global $code;
			$code = "0";
		}
		else{
			//No lo encuentra
			global $code;
			$code = "1";
		}

	echo $code;
?>
