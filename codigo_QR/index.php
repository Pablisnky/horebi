<?php
	//Agrego la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Declaro una carpeta temporal para guardar la imagenes generadas
	$dir = 'codigosRegistrados/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
    //Declaramos la ruta y nombre del archivo a generar (archivo que contiene el codigo_QR)
	$filename = $dir . 'Curriculo_Pablo';

    //Parametros de Condiguración
	$tamaño = 6; //Tamaño de Pixel
	$level = 'H'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco

	//Se inserta la ruta a donde va a llevar el código QR
	$contenido = "https://www.horebi.com/codigo_QR/Soportes_HV_Pablo_Cabeza.html"; 
	
    //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
    //Mostramos la imagen generada
	echo '<img src="'.$filename.'"/><hr/>';  
?>
<!-- Linea 13, Se escribe el nombre del afiliado, la extención seguira siendo .png, este sera el nombre del archivo donde esta el codigo QR-->
<!-- Linea 20, Se introduce la url asignada al afiliado en el archivo .php -->
<!-- Se abre el proyecto horebi en localhost y se añade a la url de inicio ( codigo_QR/index.php ) para generar el código QR del afiliado -->