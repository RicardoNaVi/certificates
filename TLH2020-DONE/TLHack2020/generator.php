<?php
ini_set('max_execution_time', 0);
header('Content-Type: image/png');
 header ( "Content-Type: application/force-download" );
 
   header ( "Content-Type: application/octet-stream" );
 
   header ( "Content-Type: application/download" );
 
   header ( "Content-Type: png" );
 
   header ( "Content-Disposition: attachment; filename=image.png" );
 
   header ( "Content-Transfer-Encoding: binary" );
 
   header ( "Accept-Ranges: bytes" );
 


$cadena = $_POST['nombre'];
 # start session handling again.
//echo  # prints out 'hello world'
$im     = imagecreatefrompng("certificate.png");
$color = imagecolorallocate($im, 0, 0, 0);
$px     = (imagesx($im) - 7.5 * strlen($cadena)) / 2;

// El texto a dibujar
//$texto = 'Testing...';
// Reemplace la ruta por la de su propia fuente
$fuente = 'camber.ttf';
$save = "Bonetos.png";

// Añadir el texto
/*imagettftext($im, 100, 0, 230, 1370, $color, $fuente, $cadena);

//imagestring($im, 5, $px, 700, $cadena, $color);
if (imagepng($im,$save)) {
	echo "La imagen se ha creado correctamente";
	imagedestroy($im);
}
else{
	echo "Ocurrio un error";
}*/


//$fileHandle = fopen("lista.csv", "r");
 //$i = 0;
//Loop through the CSV rows.
//while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
	//Print out my column data.
	//$nombre = $row[0];
	//$apellido = $row[1];
	//$cadena = $nombre . ' '.$apellido;
	//$save = 'Certificado '.$i.'.png';
	/*echo $cadena;
	echo 'Nombre: ' . $nombre . ' '.$apellido. '<br>';
	//echo 'Apellido: ' . $row[1] . '<br>';
	echo '<br>'; */
	//echo $i;
	//echo "<br>";
	imagettftext($im, 90, 0, 230, 1240, $color, $fuente, $cadena);
	imagepng($im);
	/*if (imagepng($im,$save)) {
		echo "La imagen se ha creado correctamente";
		$i++;
	}
	else{
		echo "Ocurrio un error";
	}
	imagedestroy($im);
	$im = imagecreatefrompng("Certificado.png");
	*/
//}


?>
