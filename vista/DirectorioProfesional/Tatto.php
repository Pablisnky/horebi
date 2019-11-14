<?php   
    session_start();  
    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 
    // Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario, porque esa pagina pedira el valor de $verifica, y a su vez, la sesion impide que se recargue el formulario de solicitud de citas mandandolo varias veces a la base de datos

    //Se recibe el ID del afiliado comercial desde directorio.php
    $UsuarioCifrado= $_GET["ID_Usuario"];
    // echo $UsuarioCifrado . "<br>";

    //se revierte el cifrado realizado en validarSesion.php para obtener la llave y el ID_Usuario
    $sesion = base64_decode($UsuarioCifrado);
     // echo "llave y ID_Doctor= " . $sesion . "<br>";

    //Se sustrae la llave del valor cifrado para que quede el ID_Usuario
    $Llave= iconv_substr($sesion, 6) ;
    // echo "ID_Usuario: " . $Llave . "<br>";

    //Se conecta a la base de datos
    include("../../conexion/Conexion_BD.php");
    include("../../modulos/muestraError.php");
?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
		<title>Tatuador</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Personas naturales indexadas en el directorio profesional"/>
		<meta name="keywords" content="directorio comercial, comerciante"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../../css/MediaQuery_Horebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_flechas_slider/flechas.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_ubicacion/ubicacion.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../css/slider_index.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../../images/logo.jpg"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script><!--Libreria del Calendario-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><!--Libreria del Calendario-->
        <script src="../../javascript/CalendarioJQwery.js"></script> <!--Formato Calendario-->
        <script src="../../javascript/Funciones_varias.js"></script>
    </head>
    <body>
        <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->    
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
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
                    <a href="#marcador_01">Servicios</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">       
                    <a href="#marcador_02">Contrataciones</a>
                </div>
            
                <div class="grid_2">         
                    <a href="#marcador_03">Galeria</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">
                    <a href="#marcador_04">Citas</a>
                </div>
            </div>  
        </div>    
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIOS PROFESIONALES-->
            <div class="contenedor_05_C">  
                <a id="marcador_01" class="ancla"></a>
                <h3 class="contenedor_06_C">Servicios.</h3> 
                <?php
                    $Consulta_6="SELECT * FROM servicios_profesionales WHERE ID_Afiliado = '$Llave'";
                    $Recordset_6= mysqli_query($conexion, $Consulta_6);
                    $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
                ?>
                <ul>
                    <li class="lista_1"><?php echo $PerfilAfiliado['servicioProf_1'];?></li>
                    <li class="lista_1"><?php echo $PerfilAfiliado['servicioProf_2'];?></li>
                </ul>
            </div>   
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- CONTRATACIONES -->
            <div class="contenedor_07_C"> 
                <a id="marcador_02" class="ancla"></a>
                <h3 class="contenedor_06_C">Contrataciones.</h3> 
                    <?php
                    $Consulta_3="SELECT * FROM afiliados WHERE ID_Afiliado= '$Llave' ";
                    $Recordset_3=mysqli_query($conexion,$Consulta_3);
                    while($Contacto=mysqli_fetch_array($Recordset_3)){ ?>
                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-phone A_05A" title="Teléfono"></span>
                                <input class="A_08" type="text" name="telefono_movil" readonly="readonly" value="<?php echo $Contacto['telefono_Afi'];?>"><br>
                            </div>
                        </div>
                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-envelop A_05A" title="Correo Electrónico"></span>
                                <input class="A_05A" readonly="readonly" value="<?php echo $Contacto['correo_Afi'];?>">
                            </div>
                        </div> 

                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-location2 A_05A" title="Ubicacion"></span>                                
                                <textarea class="A_06"><?php echo $Contacto['direccion_Afi'] . ", " . $Contacto['subRegion_Afi'] . ", " . $Contacto['region_Afi'];?></textarea>
                            </div>
                        </div>
                        <?php 
                    } 
                   mysqli_free_result($Recordset_3); // Liberamos los registros        
                    ?>
                </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- GALERIA -->
            <div class="contenedor_07_C"> 
                <a id="marcador_03" class="ancla"></a>
                <h3 class="contenedor_06_C">Galeria.</h3>  
                <div class="contenedor_08">
                    <?php
                    $Consulta_9="SELECT * FROM galeria INNER JOIN afiliados ON galeria.ID_Afiliado=afiliados.ID_Afiliado WHERE afiliados.ID_Afiliado = '$Llave'";
                    $Recordset_9= mysqli_query($conexion, $Consulta_9);
                    while($galeria= mysqli_fetch_array($Recordset_9)){  ?>
                        <br class="br">
                        <img class="imagen_6" src="../images/<?php echo $galeria['galeria_1'];?>">
                        <div class="" >
                            <label class="label_1">Descripcion:</label>
                            <textarea class="textarea_1" name="descripcionEdit" id="DescripcionEditCom" readonly="readonly"><?php echo $galeria["descripcion"];?></textarea>
                            <br>
                            <label class="label_1">Precio:</label>
                            <input class="input_2" type="text" name="precioMayEdit" id="PrecioMayEditCom" readonly="readonly" value="<?php echo $galeria["precio_Mayor"];?>">
                            <hr><br><br><br>
                        </div>
                        <?php 
                    }  ?>
                </div><!-- 
                <p class="parrafo_1">Más de mi trabajo contactandome en <a class="enlace_3">contrataciones</a></p> --> 
            </div>  
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- AGENDAR CITA -->
            <div class="contenedor_07_C"> 
                <a id="marcador_04" class="ancla"></a>
                <h3 class="contenedor_06_C">Agendar cita.</h3>  
                <div class="contenedor_09">
                <form action="../../controlador/recibe_agendarCita.php" method="POST" autocomplete="off" class="Afiliacion_0">
                    <fieldset>
                    <label>Nombre</label>
                    <input type="text" name="nombre_Solicitante" id="Nombre"/>
                    <br>
                    <label>Apellido</label>
                    <input type="text" name="apellido_Solicitante" id="Apellido"/>
                    <br>
                    <label>Cédula</label>
                    <input type="text" name="cedula_Solicitante" id="Cedula"/>
                    <br>
                    <label>Edad</label>
                    <input type="text" name="edad_Solicitante" id="Edad"/>
                    <br>
                    <label>Teléfono</label>
                    <input type="text" name="telefono_Solicitante" id="Telefono"/>
                    <br>
                    <hr>
                    <span class="" style="background-color:; margin: auto; display: block; text-align: center;margin-top: 5%; margin-bottom: 2%;">Fecha de la cita</span>
                    <input style="background-color: ; position: ; bottom: 49%; left: 20%; width: 60%;" type="text" id="Calendario_H" name="fechaCita"> 

                    <span style="height: 30px; width: 100%; margin-top: 1%;display: block; padding-top: 2%; text-align: center; box-sizing: border-box;">Horario de la cita</span>
                    <select style="background-color: ; bottom: 49%; margin: auto; display: block; width: 50% !important;" name="turnoCita">
                        <option></option>
                        <option>Mañana</option>
                        <option>Tarde</option>
                    </select>
                    <hr style="margin-top: 10%; margin-bottom: 4%;">
                    <input type="text" style="visibility: hidden;" id="Afiliado" name="afiliado" value="<?php echo $Llave;?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita--> 
                    <input type="submit" value="Agendar cita" style="display: block; margin: auto;" onclick=" return validar_06();" >
                    </fieldset>
                </form>
                </div> 
            </div>
        </div>    
        <footer style="margin-top: 5%;">    
            <?php
                // include("../header/footer.php");
            ?>
        </footer>   
    </body>
</html>