<?php
	$Consulta= "SELECT nombre_Afi, apellido_Afi, cedula_Afi, telefono_Afi, correo_Afi FROM afiliados WHERE ID_Afiliado = $sesion";
    $Recordset= mysqli_query($conexion, $Consulta);
    $DatosAfiliado= mysqli_fetch_array($Recordset);
?>


                    