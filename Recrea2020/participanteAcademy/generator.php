<?php
	function RemoveSpecialChar($str) { 
		$raro = array("á","Á","é","É","í","Í","ó","Ó","ú","Ú","ñ","Ñ");
		$normal = array("a","A","e","E","i","I","o","O","u","U","n","N");
		$res = str_replace($raro, $normal, $str);
		return $res; 
	} 
	
	$Table = "Recrea2020";
	$servername = "localhost";
	$username = "talentne_2020ah";
	$password = "RnNxO=T56!{r";
	$dbname = "talentne_2020certifathome";

	ini_set('max_execution_time', 0);
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	ini_set('default_charset', 'utf-8');

	$pedido = $_POST['pedido'];
	
	error_reporting(E_ERROR | E_PARSE);

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	$sql = "SELECT id,Email,UPPER(Name) as nameP,Downloads FROM $Table WHERE id= '$pedido'";
	$resultado = $conn->query($sql);
	$code = "0";
	if ($resultado->num_rows > 0) {
		try {
			$row = $resultado -> fetch_assoc();
			$sql = "UPDATE $Table SET Downloads=Downloads+1 WHERE id= '$pedido'";
			$conn -> query($sql);
			$nameP = $row["nameP"];
			//$nameP = RemoveSpecialChar($row["nameP"]);
			echo $nameP;
			var_dump($resultado);
			header('Content-Type: image/png');
			header ( "Content-Type: application/force-download" );
			header ( "Content-Type: application/download" );
			header ( "Content-Type: png" );
			header ( "Content-Disposition: attachment; filename=certificado.png" );
			$im     = imagecreatefrompng("img/Certificado.png");
			$color = imagecolorallocate($im, 0, 0, 0);
			$px     = (imagesx($im) - 7.5 * strlen($row["nameP"])) / 2;
			$fuente = realpath('font/nutmegregular.ttf');
			$font = imageloadfont($fuente);
			$fontwidth = 5;
			$center = (imagesx($im) / 2) - ($fontwidth * (strlen($row["nameP"])/2))*14;
			imagettftext($im, 80, 0, $center, 1620, $color, $fuente,$nameP);
			imagepng($im);
			$code = "0";
		} catch (Exception $e) { die($e); }	
	}else{ $code = "1"; }
	echo $code;
?>