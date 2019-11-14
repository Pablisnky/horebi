<?php 
session_start(); //Se reaunada la sesion abierta en validarSesion.php llamada Afiliado

    // Se verifica si se realizó login para entrar en este  archivo
    include("../../../modulos/verificar_Afiliado.php");
    //Se conecta a la base de datos
    include("../../../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../../../modulos/muestraError.php");
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Horebi_Perfil</title>
        <meta charset="utf-8"/>
        <meta name="description" content="tarjeta de presentacion"/>
        <meta name="keywords" content=""/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1400px)" href="../css/MediaQuery_Horebi_MonitorGrande.css"/>
        <link rel="stylesheet" type="text/css" href="../css/iconos_2/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        
        <script src="../javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() -->
    </head>
    <body>
        <header>
            <?php
                include("../../header/headerAfiliado.php");
            ?>
        </header>
        <div onclick="ocultarMenu()" style="margin-top: 5%;"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js--> 
            <h3 style="background-color: ">Tarjeta de presentación</h3>
            <div class="tarjeta_1" style="background-color: ; width: 80%"> 
                <div style="background-image: url(../../../images/tarjeta_horizontal_2.jpg); border: solid 1px; margin: 8% 0% 0% 10%; width: 400px; height: 220px; float: left;">    
                    <?php
                        $consulta_1="SELECT * FROM afiliados INNER JOIN usuarios ON afiliados.ID_Afiliado=usuarios.ID_Usuario WHERE usuarios.ID_Usuario= '$sesion' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        $Usuario= mysqli_fetch_array($Recorset_1);
                    ?>            
                    <input class="Inicio_1" type="text" value="<?php echo $Usuario['nombre_Afi'] . " " . $Usuario['apellido_Afi'];?>">
                    <input class="Inicio_2" readonly="readonly" type="text" name="especialidad" value="<?php echo $Usuario['profesion_Afi'];?>">
                    <?php
                        if($Usuario['profesion_Afi_2'] == "no especificó"){ ?>
                            <input class="Inicio_2">   <?php
                        }
                        else{ ?>
                            <input class="Inicio_2" readonly="readonly" type="text" name="especialidad" value="<?php echo $Usuario['profesion_Afi_2'];?>">
                    <?php } ?>
                    <div style="margin: 0% 0% 7% 0%">
                        <?php
                            switch($Usuario["ID_Categoria"]){
                                case '36':   // Ingeniero civil 
                                case '33':  //  Arquitecto 
                                case '1':  ?>    <!-- Ingeniero mecánico -->          
                                    <textarea class="contenido" name="sinapsys">Portafolio de proyectos y servicios profesionales ingresando a la aplicación movil.</textarea>   <?php
                                break;
                                case '2': ?>  <!-- Comerciante --> 
                                    <textarea class="contenido" name="sinapsys">Productos, precios y pedidos,
                                        ingresando a la aplicación movil.</textarea>   <?php
                                break;
                                case '3':  //  Neumonólogo 
                                case '7':  //  Internista 
                                case '8':  //  Radiólogo 
                                case '65':  //  Bacteriólogo
                                case '71':  //  Genetista  
                                case '72':  //  Inmunológo 
                                case '73':  //  Microbíologo 
                                case '74':  //  Parasiólogo 
                                case '90':  //  Médico veterinario 
                                case '5': ?>  <!-- Anestesiólogo -->
                                    <textarea class="contenido" name="sinapsys">Citas, horarios y servicios,
                                        ingresando a la aplicación movil.</textarea>   <?php
                                break;
                                case '15': ?>    <!-- Tatuador -->          
                                    <textarea class="contenido" name="sinapsys">Servicos, precios y galería de fotografias
                                        ingresando a la aplicación movil.</textarea>   <?php
                                break; 
                            }  
                        ?>
                    </div>
                    <img class="imagen_1" src="../../../images/web/correo.png">                        
                    <input class="Inicio_12" type="text" name="" value="<?php echo $Usuario['correo_Afi'];?>">
                    <img class="imagen_1" src="../../../images/web/ubicacion.jpg">
                    <input class="Inicio_12" type="text" name="" value="<?php echo $Usuario['subRegion_Afi'] . ", " . $Usuario['region_Afi'] . ", " . $Usuario['pais_Afi'];?>">
                    <img class="imagen_1" src="../../../images/web/whatsapp_icon.jpg">
                    <input class="Inicio_12" type="text" name="" value="<?php echo $Usuario['telefono_Afi'];?>">
                    <input style="visibility: hidden;"><!--no se ejecuta ninguna accion, pero se mantiene el espacio del input--> 
                    <div class="imagen_Div_2"><!--Codigo QR-->
                       <img class="imagen_2" src="../../../images/Usuarios/CurriculoPabloCabeza_Ecuador.png">
                    </div>
                </div>
                <br>
                <div style="background-image: url(../../../images/tarjeta_vertical.jpg); transform: rotate(180deg); width: 250px; height: 400px; background-color: yellow; float: right; border: solid 1px;"> 
                </div>
                <div style="clear: left; display: block; margin-top: 40%;"> 
                    <a href="pagos.php">Active su producto</a>
                    <br>
                    <p style="background-color: red; width: 100%; ">Hasta ahora su producto no esta activado, eso impide que el Código QR funcione, su página web este en internet y su perfil sea mostrado en el directorio profesional.</p>
                </div>
            </div>
        </div>
</html>