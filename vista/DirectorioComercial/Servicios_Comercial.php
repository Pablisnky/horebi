<?php
    //Se recibe el ID del afiliado comercial desde .php
    $UsuarioCifrado= $_GET["ID_AfiliadoCom"];
    // echo $UsuarioCifrado . "<br>";

    //se revierte el cifrado realizado en directorio_Com.php para obtener la llave y el ID_Usuario
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
		<title>Tienda afiliada</title>
		<meta charset="utf-8"/>
		<meta name="description" content="tiendas indexadas en el directorio comercial"/>
		<meta name="keywords" content="directorio comercial"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1400px)" href="../css/MediaQuery_Horebi_MonitorGrande.css"/> 
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_flechas_slider/flechas.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../iconos/icono_ubicacion/ubicacion.css"/><!--galeria de icomoon.io-->
        <link rel="stylesheet" type="text/css" href="../../css/slider_index.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.jpg">

        <script src="../../javascript/Funciones_varias.js"></script>
    </head>
    <body>
        <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->    
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- LOGO -->
            <div class="Perfil_00_C"> 
                <?php 
                    //Consulta para buscar el logotipo del afiliado que esta siendo visitado
                    $consulta_2="SELECT logo_comercio, descripcion_Comercio,Correo_Electronico_Comercio,Telefono_Comercio FROM afiliado_comercial WHERE ID_AfiliadoCom= '$Llave' ";
                    $Recorset_2=mysqli_query($conexion,$consulta_2);
                    $Afiliado_2= mysqli_fetch_array($Recorset_2); 
                ?>
                <div class="Perfil_1C">
                    <div  class="imagen_Div">                
                       <img class="imagen" src="../../images/Usuarios/<?php echo $Afiliado_2['logo_comercio'];?>" >
                    </div>
                </div> 
            </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- BARRA DE NAVEGACION --> 
            <div class="contenedor_04_C"> 
                <p class="parrafo_2">Carro</p>
                <p class="parrafo_2"><?php echo $Afiliado_2["Correo_Electronico_Comercio"];?></p>
                <p class="parrafo_2"><?php echo $Afiliado_2["Telefono_Comercio"];?></p>
                <a class="parrafo_2A" href="../../index.php"><p>Salir</p></a>
            </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- DESCRIPCION DEL PRODUCTO U OFICIO -->
            <div class="contenedor_03_C">
                <textarea class="contenido_3" name="descripcion_1" readonly="readonly"><?php echo $Afiliado_2['descripcion_Comercio'];?></textarea>
            </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SLIDER --> 
            <div class="contenedor_SliderCom_2"><!--Este contenedor solo se muestra en vista telefonos y tables-->
                <!-- <span class="icon-arrow-left2" onclick="CambiarImagen()"></span>CambiarImagen() se encuentra en Funciones_varias.js-->
                <!-- <span class="icon-arrow-right2"></span> -->
                <ul class="slider">
                    <?php
                    $Consulta_6="SELECT * FROM imagenes_comercial INNER JOIN afiliado_comercial ON imagenes_comercial.ID_AfiliadoCom=afiliado_comercial.ID_AfiliadoCom WHERE afiliado_comercial.ID_AfiliadoCom = '$Llave'";
                    $Recordset_6= mysqli_query($conexion, $Consulta_6);                       
                    while($Imag= mysqli_fetch_array($Recordset_6)){ ?>
                        <li>
                            <input type="radio" name="imagen" id="Radio_2" checked>
                            <label for="Radio_2"></label>
                            <img class="imagen_5" src="../../images/Usuarios/<?php echo $Imag['imagen_slider'];?>" >
                        </li><?php
                    } ?>
                </ul> 
            </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- MENU SECUNDARIO -->
            <div class="contenedor_03_A">  
                <div class="grid_2">           
                    <a href="#marcador_01">Servicios</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">       
                    <a href="#marcador_02">Contacto</a>
                </div>
            
                <div class="grid_2">         
                    <a class="marcador" href="#marcador_03">Horario</a>
                </div>
                <div class="">           
                </div>

                <div class="grid_2">
                    <a href="#marcador_04">Tarifas</a>
                </div>
            </div>  
        </div>    
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIOS -->
            <div class="contenedor_05_C">  
                <a class="ancla_2" id="marcador_01"></a>
                <h3 class="contenedor_06_C">Servicios.</h3> 
                <?php
                    $Consulta_6="SELECT * FROM servicios_comerciales WHERE ID_AfiliadoCom = '$Llave'";
                    $Recordset_6= mysqli_query($conexion, $Consulta_6);
                    $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
                ?>
                <ul>
                    <li class="lista_1"><?php echo $PerfilAfiliado['servicio_1'];?></li>
                    <li class="lista_1"><?php echo $PerfilAfiliado['servicio_2'];?></li>
                </ul>
            </div>   
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- CONTACTOS -->
            <div class="contenedor_07_C"> 
                <a class="ancla_2" id="marcador_02"></a>
                <h3 class="contenedor_06_C">Contacto.</h3> 
                    <?php
                    $Consulta_3="SELECT * FROM afiliado_comercial WHERE ID_AfiliadoCom= '$Llave' ";
                    $Recordset_3=mysqli_query($conexion,$Consulta_3);
                    while($Contacto=mysqli_fetch_array($Recordset_3)){ ?>
                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-phone A_05A" title="Teléfono"></span>
                                <input class="A_08" type="text" name="telefono_movil" readonly="readonly" value="<?php echo $Contacto['Telefono_Comercio'];?>"><br>
                            </div>
                        </div>
                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-envelop A_05A" title="Correo Electrónico"></span>
                                <input class="A_05A" readonly="readonly" value="<?php echo $Contacto['Correo_Electronico_Comercio'];?>">
                            </div>
                        </div> 
                        <div class="contacto_2">
                            <div class="contacto_2A">
                                <span class="icon-location2 A_05A" title="Ubicacion"></span>                                
                                <textarea class="A_06"><?php echo $Contacto['direccion_Comercio'];?></textarea>
                                <textarea class="A_07"><?php echo $Contacto['SubRegion_Comercio'] . ", " . $Contacto['Region_Comercio']?></textarea>
                            </div>
                        </div>
                        <?php 
                    } 
                   mysqli_free_result($Recordset_3); // Liberamos los registros        
                    ?>
                </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- HORARIO -->
            <div class="contenedor_07_C"> 
                <a class="ancla_2" id="marcador_03"></a>
                <h3 class="contenedor_06_C">Horarios.</h3>
                <div class="horario_1">
                    <?php
                        $Consulta_5="SELECT * FROM horarios WHERE ID_Afiliado = '$Llave' ";
                        $Recordset_5= mysqli_query($conexion,$Consulta_5);
                        while($horario= mysqli_fetch_array($Recordset_5)){
                            if(!empty($horario["inicio_mañana"])){ 
                                ?>
                                <table name="horario_mañana">
                                    <tr>
                                        <td class="horario_2">
                                            <?php
                                                echo $horario["inicio_mañana"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["culmina_mañana"] . "&nbsp";
                                            ?>                               
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=4; $i<10; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }?>                                
                                        </td>
                                    </tr>
                                </table>                            
                                <?php 
                            } 
                            if(!empty($horario["inicia_tarde"])){  ?>           
                                <table name="horario_tarde" class="horario_3">
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["inicia_tarde"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo  $horario["culmina_tarde"] . "&nbsp";
                                            ?>                                
                                        </td>
                                    </tr>
                                </table>                    
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=13; $i<19; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }  ?>                                
                                        </td>
                                    <tr>
                                </table>                           
                                <?php 
                            } 
                                /*HORARIO ESPECIAL 1*/
                            if(!empty($horario["inicia_mañanaEsp_1"])){  ?>           
                                <table name="horario_tarde" class="horario_3">
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["inicia_mañanaEsp_1"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo  $horario["culmina_mañanaEsp_1"] . "&nbsp";
                                            ?>                                
                                        </td>
                                    </tr>
                                </table>                    
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=22; $i<29; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }  ?>                                
                                        </td>
                                    <tr>
                                </table>                            
                                <?php 
                            } 
                            if(!empty($horario["inicia_tardeEsp_1"])){  ?>           
                                <table name="horario_tarde" class="horario_3">
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["inicia_tardeEsp_1"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo  $horario["culmina_tardeEsp_1"] . "&nbsp";
                                            ?>                                
                                        </td>
                                    </tr>
                                </table>                    
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=31; $i<37; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }  ?>                                
                                        </td>
                                    <tr>
                                </table>                           
                                <?php 
                            }           
                                /*HORARIO ESPECIAL 2*/
                            if(!empty($horario["inicia_mañanaEsp_2"])){  ?>           
                                <table name="horario_tarde" class="horario_3">
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["inicia_mañanaEsp_2"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo  $horario["culmina_mañanaEsp_2"] . "&nbsp";
                                            ?>                                
                                        </td>
                                    </tr>
                                </table>                    
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=40; $i<47; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }  ?>                                
                                        </td>
                                    <tr>
                                </table>                            
                                <?php 
                            } 
                            if(!empty($horario["inicia_tardeEsp_2"])){  ?>           
                                <table name="horario_tarde" class="horario_3">
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                echo $horario["inicia_tardeEsp_2"] . "&nbsp";
                                            ?>                                
                                        </td>
                                        <td class="horario_2"> A&nbsp</td>
                                        <td class="horario_2">
                                            <?php 
                                                echo  $horario["culmina_tardeEsp_2"] . "&nbsp";
                                            ?>                                
                                        </td>
                                    </tr>
                                </table>                    
                                <table>
                                    <tr>
                                        <td class="horario_2">
                                            <?php 
                                                $longitud = count($horario);
                                                for ($i=50; $i<56; $i++){
                                                    echo  $horario["$i"] . "&nbsp";
                                                }  ?>                                
                                        </td>
                                    <tr>
                                </table>                           
                                <?php 
                            } 
                        } ?>
                </div>     
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- TRABAJOS -->
            <div class="contenedor_07_C"> 
                <a class="ancla_2" id="marcador_04"></a>
                <h3 class="contenedor_06_C">Tarifas.</h3>  
                <div class="contenedor_08">
                    <?php
                    $Consulta_9="SELECT * FROM galeria INNER JOIN afiliado_comercial ON galeria.ID_Afiliado=afiliado_comercial.ID_AfiliadoCom WHERE afiliado_comercial.ID_AfiliadoCom = '$Llave'";
                    $Recordset_9= mysqli_query($conexion, $Consulta_9);
                    while($galeria= mysqli_fetch_array($Recordset_9)){  ?>
                        <br class="br">
                        <img class="imagen_6" src="../../images/Usuarios/<?php echo $galeria['galeria_1'];?>">
                        <div class="contenedor_10" >
                            <label class="label_1">Descripcion:</label>
                            <textarea class="textarea_1" name="descripcionEdit" id="DescripcionEditCom" readonly="readonly"><?php echo $galeria["descripcion"];?></textarea>
                            <br>
                            <label class="label_1">Precio al mayor:</label>
                            <input class="input_2" type="text" name="precioMayEdit" id="PrecioMayEditCom" readonly="readonly" value="<?php echo $galeria["precio_Mayor"];?>">
                            <br>
                            <label class="label_1">Precio por unidad:</label>
                            <input class="input_2" type="text" name="precioMenEdit" id="PrecioMenEditCom" readonly="readonly" value="<?php echo $galeria["precio_Menor"];?>">
                        </div>
                        <?php 
                    }  ?>
                </div>
            </div>  
        </div>    
        <footer style="clear: left; margin-top: 5%;">    
            <?php
                // include("../header/footer.php");
            ?>
        </footer>   
    </body>
</html>