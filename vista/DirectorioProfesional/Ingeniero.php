<?php
    //Se recibe el ID del afiliado comercial desde .php
    $UsuarioCifrado= $_GET["ID_Usuario"];
    // echo $UsuarioCifrado . "<br>";
 
    //se revierte el cifrado para obtener la llave y el ID_Usuario
    $sesion = base64_decode($UsuarioCifrado);
     // echo "llave y ID_Doctor= " . $sesion . "<br>";

    //Se sustrae la llave del valor cifrado para que quede el ID_Usuario
    $Llave= iconv_substr($sesion, 6) ;
    // echo "ID_Usuario: " . $Llave;

    //Se conecta a la base de datos
    include("../../conexion/Conexion_BD.php");
    include("../../modulos/muestraError.php");
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
		<title>Perfil Ingeniero</title>
		<meta charset="utf-8"/>
		<meta name="description" content="perfil de ingeniero"/>
		<meta name="keywords" content="perfil ingeniero"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../../images/logo.png">

        <script src="../../javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() -->
        <script type="text/javascript">
            //Ajuste el texto recuperado de la BD  del texarea donde va el nombre de la clinica del consultorio
            function resize_1(){
                var text = document.getElementById('PerfilProf_1');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
        </script>
    </head>
    <body onload="resize_1()">           
        <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->    
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- NOMBRE, APELLIDO Y LOGO O FOTOGRAFIA DE PERFIL -->
        <?php
            include("../../modulos/Datos_personales_directorioPer.php");
        ?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- BARRA DE NAVEGACION --> 
            <div class="contenedor_04_C"> 
                <p class="parrafo_2">Carro</p>
                <p class="parrafo_2"><?php echo $Afiliado_2["correo_Afi"];?></p>
                <p class="parrafo_2"><?php echo $Afiliado_2["telefono_Afi"];?></p>
                <a class="parrafo_2A" href="../../index.php"><p>Salir</p></a>
            </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- MENU SECUNDARIO -->
            <div class="contenedor_03_B">  
                <div class="grid_2">           
                    <a href="#marcador_01">Perfil</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">       
                    <a href="#marcador_02">Proyectos</a>
                </div>
            
                <div class="grid_2">         
                    <a href="#marcador_03">Logros</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">
                    <a href="#marcador_04">Servicios</a>
                </div>
            </div>  
        </div>    
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- PERFIL PROFESIONAL -->
            <div id="Perfil_2">
                <a id="marcador_01" class="ancla"></a>
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilProf" value="Perfil profesional">
                        <?php
                            $Consulta_5="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$Llave' ";
                            $Recordset_5= mysqli_query($conexion, $Consulta_5);
                            while($PerfilAfiliado= mysqli_fetch_array($Recordset_5)){  ?>
                                <textarea class="A_09" id="PerfilProf_1" readonly="readonly"><?php echo $PerfilAfiliado['perfil_profesional'];?></textarea><?php
                            } ?>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- PROYECTOS EN LOS QUE PARTICIPO -->
            <div id="Perfil_2">
                <a id="marcador_02" class="ancla"></a>
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilProf"  value="Proyectos en los que participo">
                        <?php
                            $Consulta_6="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$Llave' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            while($PerfilAfiliado= mysqli_fetch_array($Recordset_6)){  ?>
                                <textarea class="A_09" id="PerfilProf_1"><?php echo $PerfilAfiliado['proyecto_1'];?></textarea>
                                    <?php
                            } ?>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- CONTRATACIONE, UBICACIÓN Y DIRECCIÓN OFICINA-->
            <div class="contenedor_04">  
                <div id="Perfil_01A"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <?php
                    $Consulta_2="SELECT * FROM afiliados WHERE ID_Afiliado= '$Llave' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);
                    while($Ubicacion=mysqli_fetch_array($Recordset_2)){
                        //la unica razon por la que se toma el ID_Usuario de esta consulta es para enviarlo a 
                        $_SESSION["ID_Usuario"]= $Ubicacion[0];
                        ?>
                        <p class="Perfil_2a">Ubicación</p>
                        <input class="A_05" type="text" name="pais" readonly="readonly" value="<?php echo $Ubicacion['pais_Afi'];?>">
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Ubicacion['region_Afi'];?>">
                        <input class="A_05" type="text" name="ciudad" readonly="readonly" value="<?php echo $Ubicacion['subRegion_Afi'];?>">
                        <?php 
                    } 
                   mysqli_free_result($Recordset_2); // Liberamos los registros        
                    ?>
                </div>
                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <p class="Perfil_2a">Contacto</p>
                    <?php
                    $Consulta_3="SELECT * FROM afiliados WHERE ID_Afiliado= '$Llave' ";
                    $Recordset_3=mysqli_query($conexion,$Consulta_3);
                    while($Telefono=mysqli_fetch_array($Recordset_3)){
                    ?>
                    <div class="telefonos_03">
                        <div class="telefono_03A">
                                <span class="icon-phone A_05A" title="Teléfono Consultorio"></span>
                            <input class="A_05" type="text" name="telefono_movil" readonly="readonly" value="<?php echo $Telefono['telefono_Afi'];?>"><br>
                        </div>
                        <div class="telefono_03B">
                        <span class="icon-mobile A_05A" title="Teléfono Movil"></span>
                        <input class="A_05" type="text" name="telefono_consultorio" readonly="readonly" value="<?php echo $Telefono['telefono_Afi'];?>">
                        </div>
                    </div>
                    <div class="telefono_03C">
                        <span class="icon-envelop A_05A" title="Correo Electrónico"></span>
                        <input class="A_05A"  readonly="readonly" value="<?php echo $Telefono['correo_Afi'];?>">
                    </div>

                   <?php } 
                   mysqli_free_result($Recordset_3); // Liberamos los registros        
                    ?>
                </div>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- LOGROS -->
            <div id="Perfil_3">
                <a id="marcador_03" class="ancla"></a>
                <input class="Perfil_2a" readonly="readonly" type="text" name="" value="Logros">
                        <?php
                            $Consulta_6="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$Llave' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
                        ?>
                <div class="mostrar_1">
                    <textarea class="A_10" id="PerfilProfesional_2"><?php echo $PerfilAfiliado['servicio_5'];?></textarea>
                </div>
            </div>
            
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- SERVICIOS PROFESIONAL -->
            <div id="Perfil_3">
                <a id="marcador_04" class="ancla"></a>
                <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Servicios profesionales">
                        <?php
                            $Consulta_6="SELECT * FROM servicios_profesionales WHERE ID_Afiliado = '$Llave' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $Servicio= mysqli_fetch_array($Recordset_6);
                        ?>
                <ul>  
                    <?php
                        if(!empty($Servicio['servicioProf_1'])){  ?>
                            <li class="A_08" type="text" name="servicioUno"><?php echo $Servicio['servicioProf_1'];?></li>  <?php
                        } 
                        if(!empty($Servicio['servicioProf_2'])){  ?>                    
                            <li class="A_08" type="text" name="servicioUno"><?php echo $Servicio['servicioProf_2'];?></li>  <?php
                        }  
                    ?> 
                </ul>
            </div>
        </div>     
    </body>
</html>