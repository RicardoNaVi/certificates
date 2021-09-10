<?php

	global $cadena;
	$Table = "Future";
	$servername = "localhost";
	$username = "uhfqd5vcyivsh";
	$password = "mwssmgg8b8qk";
	$dbname = "dblazobsushgcp";

	ini_set('max_execution_time', 0);
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	ini_set('default_charset', 'utf-8');

	$name = mb_strtoupper($_POST['nombre']);
	$last_name = mb_strtoupper($_POST['apellido']);
	$email = mb_strtolower($_POST['email']);
	$curp = mb_strtolower($_POST['curp']);
	$genero = $_POST['genero'];
	$interest = $_POST['interest'];
	$hobbie = $_POST['hobbie'];
	$FirstDayConf = $_POST['FirstDayConf'];
	$SecDayConf = $_POST['SecDayConf'];
	$age = $_POST['edad'];
	$state = $_POST['estado'];
	$ocupation = $_POST['ocupation'];
	$school = mb_strtoupper($_POST['universidad']);
	$work = mb_strtoupper($_POST['empresa']);
	$social_media = $_POST['social_media'];
	$link_face_profile = $_POST['facelink'];
	$device = $_POST['device'];
	$topic_interest = $_POST['topic_interest'];
	$profesional = $_POST['profesional'];
	$studies = $_POST['studies'];
	$cadena = "".$name." ".$last_name;

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) return die("Connection failed: " . $conn->connect_error) ;
	
	$sql = "INSERT IGNORE INTO $Table (name,last_name,email,age,ocupation,school,work,link_face_profile,interest,state,first_day_conf,sec_day_conf,gender,device,hobbie,topic_interest,social_media,profesional,studies,curp) 
	VALUES('$name','$last_name','$email','$age','$ocupation','$school','$work','$link_face_profile','$interest','$state','$FirstDayConf','$SecDayConf','$genero','$device','$hobbie','$topic_interest','$social_media','$profesional','$studies','$curp')";
	
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
			$im     = imagecreatefrompng("img/Certificado.png");
			$color = imagecolorallocate($im, 0, 0, 0);
			$px     = (imagesx($im) - 7.5 * strlen($cadena)) / 2;
			//$fuente = "nutmegregular.ttf";
			$fuente = realpath('font/camber.ttf');
			$font = imageloadfont($fuente);
			$fontwidth = 4;
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($cadena)/2))*14;
			imagettftext($im, 80, 0, $center, 1340, $color, $fuente, $cadena);
			imagepng($im);
		} catch (Exception $e) {
			//throw $th;
			die($e);
		}
	}

?>