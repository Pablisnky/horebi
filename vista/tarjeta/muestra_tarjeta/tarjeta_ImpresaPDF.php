 <?php
	 //Agregamos la libreria FPDF
	 require('../librerias/F_PDF/fpdf.php');
	 
	 $pdf = new FPDF('L','mm','A5'); //Creamos un objeto de la librería
	 $pdf->AddPage(); //Agregamos una Pagina
	 $pdf->SetFont('Arial'); //Establecemos tipo de fuente, negrita y tamaño 16
	//Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha
	 $pdf->WriteHTML('hola');
	 $pdf->Output(); //Mostramos el PDF creado
?>