<?php

	global $cadena;
	$Table = "Iron";
	$servername = "localhost";
	$username = "talentne_2020ah";
	$password = "RnNxO=T56!{r";
	$dbname = "talentne_2020certifathome";

	ini_set('max_execution_time', 0);
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	ini_set('default_charset', 'utf-8');

	$name = mb_strtoupper($_POST['nombre']);
	$last_name = mb_strtoupper($_POST['apellido']);
	$email = mb_strtolower($_POST['email']);
	$age = $_POST['edad'];
	$ocupation = $_POST['ocupation'];
	$state = $_POST['estado'];
	$school = mb_strtoupper($_POST['universidad']);
	$work = mb_strtoupper($_POST['empresa']);
	$link_face_profile = $_POST['facelink'];
	$interest = $_POST['interest'];
	$especific_topic = $_POST['topics'];
	$FirstDayConf = $_POST['FirstDayConf'];
	$SecDayConf = $_POST['SecDayConf'];
	$cadena = "".$name." ".$last_name;

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) return die("Connection failed: " . $conn->connect_error) ;
	
	$sql = "INSERT IGNORE INTO $Table (name,last_name,email,age,ocupation,school,work,link_face_profile,interest,state,especific_topic,first_day_conf,sec_day_conf) 
	VALUES('$name','$last_name','$email','$age','$ocupation','$school','$work','$link_face_profile','$interest','$state','$especific_topic','$FirstDayConf','$SecDayConf')";
	
	if ($conn->query($sql) === TRUE) {
		try {
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
			$px     = (imagesx($im) - 7.5 * strlen($cadena)) / 2;
			//$fuente = "nutmegregular.ttf";
			$fuente = realpath('font/nutmegregular.ttf');
			$font = imageloadfont($fuente);
			$fontwidth = 5;
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($cadena)/2))*14;
			imagettftext($im, 80, 0, $center, 1340, $color, $fuente, $cadena);
			imagepng($im);
		} catch (Exception $e) {
			//throw $th;
			die($e);
		}
	}

?>