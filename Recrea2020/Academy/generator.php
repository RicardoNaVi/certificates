<?php
	function RemoveSpecialChar($str) { 
		$raro = array("á","Á","é","É","í","Í","ó","Ó","ú","Ú","ñ","Ñ","?");
		$normal = array("á","Á","é","É","í","Í","ó","Ó","ú","Ú","ñ","Ñ","?");
		$res = str_replace($raro, $normal, $str);
		return $res; 
	} 
	
	$Table = "academy";
	$servername = "10.9.4.40";
	$username = "recrea_2020";
	$password = "OX3g18IRGk@A";
	$dbname = "recrea_academy_certificados";

	$pedido = $_POST['pedido'];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$conn ->set_charset("utf8");
	$sql = "SELECT id,Email,UPPER(Name) as nameP,Downloads FROM $Table WHERE id= '$pedido'";
	$resultado = $conn->query($sql);
	$code = "0";
	if ($resultado->num_rows > 0) {
		try {
			$row = $resultado -> fetch_assoc();
			$sql = "UPDATE $Table SET Downloads=Downloads+1 WHERE id= '$pedido'";
			$conn -> query($sql);
			$nameP = RemoveSpecialChar($row["nameP"]);
			header('Content-Type: image/png');
			header ( "Content-Type: application/force-download" );
			header ( "Content-Type: application/download" );
			header ( "Content-Type: png" );
			header ( "Content-Disposition: attachment; filename=certificado.png" );
			$im     = imagecreatefrompng("img/Certificado.png");
			$color = imagecolorallocate($im, 0, 0, 0);
			$px     = (imagesx($im) - 7.5 * strlen($row["nameP"])) / 2;
			$fontwidth = 5;
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($row["nameP"])/2))*14;
			imagettftext($im, 80, 0, $center, 1620, $color, realpath("font/nutmegregular.ttf"),$nameP);
			imagepng($im);
			$code = "0";
		} catch (Exception $e) { die($e); }	
	}else{ $code = "1"; }
	echo $code;
	$conn->close();
?>