<?php
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");

	$Verifica= $_GET["val_1"];
	// echo $Verifica . "<br>";

	$Consulta= "SELECT correo_Afi FROM afiliados";
    $Recordset= mysqli_query($conexion, $Consulta);
    $Correo= mysqli_fetch_array($Recordset);
    if($Correo["correo_Afi"] == $Verifica){
    	echo "El correo que introdujo ya existe en nuestros registros";  ?>
         <style>
            .contenedor_11{
            	background-color:yellow;  
                display: block;
                text-align: center;     
            }
        </style>
        <?php
    }
    else{

    }

?>


                    