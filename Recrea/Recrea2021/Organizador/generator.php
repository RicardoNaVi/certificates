<?php
	function RemoveSpecialChar($str) { 
		$raro = array("á","Á","é","É","í","Í","ó","Ó","ú","Ú","ñ","Ñ","?");
		$normal = array("á","Á","é","É","í","Í","ó","Ó","ú","Ú","ñ","Ñ","?");
		$res = str_replace($raro, $normal, $str);
		return $res; 
	} 
	$Table = "Digital";
	$servername = "localhost";
	$username = "uhfqd5vcyivsh";
	$password = "mwssmgg8b8qk";
	$dbname = "dblazobsushgcp";

	$pedido = $_POST['pedido'];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$conn ->set_charset("utf8");
	$sql = "SELECT id,email,UPPER(name) as nameP,Downloads FROM $Table WHERE id= '$pedido'";
	$resultado = $conn->query($sql);
	$code = "0";
	if ($resultado->num_rows > 0) {
		try {
			$row = $resultado -> fetch_assoc();
			$sql = "UPDATE $Table SET Downloads=Downloads+1 WHERE id= '$pedido'";
			$conn -> query($sql);
			header('Content-Type: image/png');
			header ( "Content-Type: application/force-download" );
			header ( "Content-Type: application/download" );
			header ( "Content-Type: png" );
			header ( "Content-Disposition: attachment; filename=Certificado.png" );
			$im     = imagecreatefrompng("img/Certificado.png");
			$fontwidth = 4;
			$nameP = RemoveSpecialChar($row["nameP"]);
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($row["nameP"])/2))*14;
			$color = imagecolorallocate($im, 0, 0, 0);
			imagettftext($im, 80, 0, $center, 1370, $color, realpath("font/camber.ttf"),$nameP);
			imagepng($im);
			$code = "0";
		} catch (Exception $e) { die($e); }	
	}else{ $code = "1"; }
	echo $code;
	$conn->close();
?>