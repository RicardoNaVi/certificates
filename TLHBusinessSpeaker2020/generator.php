<?php
	ini_set('max_execution_time', 0);

	mb_internal_encoding('UTF-8');
	
	mb_http_output('UTF-8');

	ini_set('default_charset', 'utf-8');

	$servername = "localhost";
	$username = "talentne_2020ah";
	$password = "RnNxO=T56!{r";
	$dbname = "talentne_2020certifathome";

	$name = mb_strtoupper($_POST['nombre']);
	$email = mb_strtolower($_POST['email']);
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Email,UPPER(Nombre_Ponente) as nameP,Panel,downloads FROM BusinessSpeaker WHERE email='$email' AND UPPER(Nombre_Ponente) LIKE '%$name%'";
	$resultado = $conn->query($sql);
	if ($resultado -> num_rows > 0) {
		try {
			$row = $resultado -> fetch_assoc();
			header('Content-Type: image/png');
			header ( "Content-Type: application/force-download" );
			header ( "Content-Type: application/octet-stream" );
			header ( "Content-Type: application/download" );
			header ( "Content-Type: png" );
			header ( "Content-Disposition: attachment; filename=certificado.png" );
			header ( "Content-Transfer-Encoding: binary" );
			header ( "Accept-Ranges: bytes" );
			$im     = imagecreatefrompng("Certificado.png");
			$color = imagecolorallocate($im, 0, 0, 0);
			$px     = (imagesx($im) - 7.5 * strlen($row["nameP"])) / 2;
			//$fuente = "nutmegregular.ttf";
			$fuente = realpath('font/nutmegregular.ttf');
			$font = imageloadfont($fuente);
			$fontwidth = 5;
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($row["nameP"])/2))*14;
			imagettftext($im, 80, 0, $center, 1340, $color, $fuente, $row["nameP"]);
			imagepng($im);
		} catch (Exception $e) {
			//throw $th;
			die($e);
		}	
	}else{
	}

?>