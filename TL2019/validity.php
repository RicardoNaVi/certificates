<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$servername = "localhost";
$username = "talentne_certif";
$password = "Estado81zeus";
$dbname = "talentne_certif";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$cod_event = $_POST['cod_event'];


$code = "0";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id_usuario FROM usuario2019 WHERE cod_event = '$cod_event' ";

		$result = $conn->query($sql);
		//$conn->close();

		if ($result->num_rows > 0) {
		    // output data of each row
		    //Existe el usuario1 en BD, no se puede vincular error 0
			//On page 2
			session_start(); # start session handling.
			$_SESSION['cadena']= $nombre1;
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
