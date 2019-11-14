<?php
    session_start();//Se reanuda la sesion abierta en validarSesion.php

    //Se verifica si se realizó login para entrar en este  archivo
    include("../../../modulos/verificar_Afiliado.php");
    //Se accede al servidor de base de datos
    include("../../../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../../../modulos/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="utf-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../../../images/logo.jpg">

        <script type="text/javascript" src="../../../javascript/Ajax_Cancelar.js"></script>
        <script type="text/javascript" src="../../../javascript/Ciudades.js"></script> 
        <script type="text/javascript" src="../../../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../../../javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../../../javascript/Provincias.js"></script>  
        <script type="text/javascript" src="../../../javascript/canton.js"></script> 
        <script type="text/javascript" src="../../../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../../../javascript/Municipios_Colombia.js"></script>
        <script type="text/javascript">//los eventos son necsarios introducirlos despues del archivo funciones Funciones_varias.js
            document.addEventListener("keydown", contar_1, false); 
            document.addEventListener("keyup", contar_1, false);
            document.addEventListener("keydown", valida_Longitud_2, false);//valida_Longitud_2() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud_2, false);//valida_Longitud_2() se encuentra en 
            document.addEventListener("DOMContentLoaded", resize_6, false);
            document.addEventListener("DOMContentLoaded", resize_7, false);
            document.addEventListener("DOMContentLoaded", resize_8, false);  
            document.addEventListener("keydown", valida_LongitudTelefono_1, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono_1, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keydown", valida_LongitudTelefono_2, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono_2, false);//validaLongitud() se encuentra en Funciones_varias.js   
        </script>          
    </head>     
    <body onload=" resize_1()">
        <header>
            <?php          
                include("../../header/headerAfiliado.php")
            ?>
        </header>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
        <div> 
            <section style="margin-top: 5%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>
                <?php
                    $consulta_1="SELECT * FROM afiliados INNER JOIN usuarios ON afiliados.ID_Afiliado=usuarios.ID_Usuario WHERE usuarios.ID_Usuario= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Usuario= mysqli_fetch_array($Recorset_1);
                ?>
                <form action="../../../controlador/recibe_perfilTatto.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- INFORMACION PERSONAL -->
                        <a id="marcador_01" class="ancla_2"></a>
                        <?php
                            //Muestra los errore en local e impide mostrarlos en remoto
                            include("../../../modulos/datosPersonales.php");
                        ?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- FOTOGRAFIA PERFIL-->
                        <a id="marcador_02" class="ancla_2"></a>
                        <?php
                            //Muestra la seccion del formulario que contiene la fotografia de perfil del afiliado
                            include("../../../modulos/FotoPerfil.php");
                        ?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- IMAGENES DE SLIDER; MAXIMO 5 -->
        <a id="marcador_03" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <legend>Imagenes de slider</legend>
                <?php
                    $Consulta_2="SELECT * FROM imagenes INNER JOIN afiliados ON imagenes.ID_Afiliado=afiliados.ID_Afiliado WHERE afiliados.ID_Afiliado = '$sesion'";
                    $Recordset_2= mysqli_query($conexion, $Consulta_2);
                    if(mysqli_num_rows($Recordset_2) < 5){ ?>
                        <label class="etiqueta_1B">Inserte una imagen a la vez, no mayor de 50 Kb</label><br><br>
                        <input name="imagenSlider_Tat" type="file" value="Seleccione un imagen" />  <?php
                        while($Slider_2= mysqli_fetch_array($Recordset_2)){  ?>
                            <hr style="margin: 5%;">
                            <img style="width: 200px; height: 100%" src="../../../images/<?php echo $Slider_2['imagen_slider'];?>">
                            <a href="../../../controlador/EliminarImgGaleria.php?Imagen_Slid_Tat=<?php echo $Slider_2['ID_Imagen'];?>" onclick="return Confirmacion()">Eliminar</a>
                            <?php 
                        } 
                    } 
                    else{
                        echo "<br>";
                        echo "Ha alcanzado el limite maximo de imagenes en el slider" .  "<br>";
                        while($Slider_2= mysqli_fetch_array($Recordset_2)){  ?>
                            <hr style="margin: 5%;">
                            <img style="width: 200px; height: 100%" src="../../../images/<?php echo $Slider_2['imagen_slider'];?>">
                            <a href="../../../controlador/EliminarImgGaleria.php?Imagen_Slid_Tat=<?php echo $Slider_2['ID_Imagen'];?>" onclick="return Confirmacion()">Eliminar</a>
                            <?php 
                        } 
                    } ?>
        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- GALERIA DE TATUAJES -->
        <a id="marcador_04" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">                            
            <legend>Galería de trabajos</legend>
            <label style="width: 90%;">Seleccione una imagen a la vez.</label><br><br>
            <!--<input type="hidden" name="MAX_FILE_SIZE" value="500000" />evita insertar una imagen mayor a 500000 bytes antesde enviarla al servidor, no da ninguna alerta-->
            <input name="tatuaje_1" type="file" onclick=""/>
            <br>
            <label>Descripcion:</label>
            <textarea class="textarea_2" name="descripcionTat" id="DescripcionTat"></textarea>
            <br>
            <label>Precio:</label>
            <input class="etiqueta_32" type="text" name="precioTat" id="PrecioTat"/>

                            <!-- Inicia seccion para mostrar en perfil -->
                            <?php
                                $Consulta_6="SELECT * FROM galeria INNER JOIN afiliados ON galeria.ID_Afiliado=afiliados.ID_Afiliado WHERE afiliados.ID_Afiliado = '$sesion'";
                                $Recordset_6= mysqli_query($conexion, $Consulta_6);
                                while($galeria= mysqli_fetch_array($Recordset_6)){
                            ?>
                            <hr style="margin: 5%;">
                            <img style="width: 200px; height: 100%" src="../../../images/<?php echo $galeria['galeria_1'];?>">
                            <br>
                            <label>Descripcion:</label>
                            <input type="text-align" name="descripcionEdit" id="DescripcionEdit" value="<?php echo $galeria["descripcion"];?>">
                            <br>
                            <label>Precio al mayor:</label>
                            <input type="text-align" name="precioMayEdit" id="PrecioMayEdit" value="<?php echo $galeria["precio_Mayor"];?>">
                            <a href="../../../controlador/EliminarImgGaleria.php?ImagenTat=<?php echo $galeria['ID_Galeria'];?>" onclick="return Confirmacion()">Eliminar</a>
                            <?php } ?>
                            <!-- Finaliza seccion para mostrar en perfil -->
                        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIOS PROFESIONALES-->
        <a id="marcador_05" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <?php
                $Consulta_10="SELECT * FROM servicios_profesionales WHERE ID_Afiliado= '$sesion'";
                $Recordset_10= mysqli_query($conexion, $Consulta_10);
                $PerfilAfiliado= mysqli_fetch_array($Recordset_10);
            ?>
            <legend>Servicios profesionales</legend>
            <label style="background-color: ; width: 90%;">Especifique sus servicios profesionales.</label><br><br>
            <textarea style="width: 90%; text-align: left;" name="servicioProf_Uno"><?php echo $PerfilAfiliado['servicioProf_1'];?></textarea>
            <br>
            <textarea style="width: 90%; text-align: left;" name="servicioProf_Dos"><?php echo $PerfilAfiliado['servicioProf_2'];?></textarea>
            <br>
        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- VERIFICACION DE USUARIO -->
                        
        <a id="marcador_06" class="ancla_2"></a>
        <fieldset class="Afiliacion_4"> 
            <?php
                $Consulta7="SELECT valor_A, valor_B FROM usuario_doctor WHERE  ID_Doctor = '$sesion'";
                $Resulset7 = mysqli_query($conexion,$Consulta7);
                $Valores= mysqli_fetch_array($Resulset7);
            ?>
            <legend>Verificación de usuario</legend>
            <input type="checkbox" hidden name="cambiarValores" id="CambiarValor" value="1"><!--esta funcion esta al final del archeivo-->
            <span style="font-size: 14px; margin-left: 2%; cursor: pointer; color: #040652;" onclick="cambiarValores()">¿Desea Cambiar valor "A" y valor "B"?</span><br><br><!--cambiarValores() se encuentra al final de este archivo--> 
            <label>Valor alfanumerico "A"</label>
            <input type="password" name="valorA" id="ValorA" disabled placeholder="4 digitos" value="<?php echo $Valores['valor_A'];?>"><br>
            <label>Valor alfanumerico "B"</label>
            <input type="password" name="valorB"  id="ValorB" disabled placeholder="4 digitos" value="<?php echo $Valores['valor_B'];?>">
            <Hr>
            <p>Es importante memorizar o guardar en un lugar seguro los valores "A" y "B", los mismos son requeridos para realizar su cambio de clave en un futuro.</p><br><br>
        </fieldset>
    </div>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- INIDCE LATERAL DERECHO -->
                    <div style="background-color:; width: 20%; margin-left: 65%; margin-top: 3%; float: right; position: fixed;">
                        <p style="background-color: #BEBFDD; text-align: center; margin-left: 0%; margin-bottom: 2%; font-size: 18px;">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_02">Fotografia de perfil</a><br>
                        <a class="marcador" href="#marcador_03">Imagenes de Slider</a><br>
                        <a class="marcador" href="#marcador_04">Galeria de trabajos</a><br>
                        <a class="marcador" href="#marcador_05">Servicios profesionales</a><br>
                        <a class="marcador" href="#marcador_06">Verificación de usuario</a>
                    </div>  
                    <div style="background-color:; width: 25%; margin-left: 62.5%; height: 20px; margin-top: 21%; float: right; position: fixed;">
                        <?php
                            $Consulta_8="SELECT mostrar FROM afiliados WHERE ID_Afiliado ='$sesion'";
                            $Recordset_8= mysqli_query($conexion, $Consulta_8);
                            $Most= mysqli_fetch_array($Recordset_8);
                        ?>
                        <label for="MostrarPerfil" class="perfil_1"><input type="checkbox" id="MostrarPerfil" name="mostrarPerfil" value="1" checked style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -85px;"  
                        <?php if(($Most['mostrar'])=='1') { echo ' checked'; } ?>>
                        Mostrar perfil en Directorio profesional.</label>
                    </div> 
                    <div id="Perfil_06" style="background-color:; position: fixed; width: 20%; margin-left: 63%; display: flex; justify-content: center; margin-top: 25%">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick=""> <!--return validar_10()-->
                        <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="../configurarT.php">Volver</a>         
                    </div>             
                </form>                 
            </section> 
       </div>
       <!-- <footer>   
            <?php
                include("../modulos/footer/footer.php");
            ?>
        </footer>-->
    </body>
    </html>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<script type="text/javascript">
    //Ajusta el texarea según se vaya escribiendo en el mismo
    document.querySelector('#Direccion').addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Ajusta el texarea según se vaya escribiendo en el mismo 
    document.querySelector('#CentroSalud').addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
    //Ajusta el texarea según se vaya escribiendo en el mismo
    document.querySelector('#PerfilProf').addEventListener('keydown', autosize);
             
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
    //Ajusta el texto recuperado de la BD en el texarea donde va el motivo de la consulta
    function resize_1(){
        var text = document.getElementById('PerfilProf');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
                           
    function cambiarValores(){
        var A= document.getElementById("CambiarValor");
        var B= document.getElementById("ValorA");
        var C= document.getElementById("ValorB");
        if(A.checked == false){
            B.disabled = false;
            C.disabled = false;
            //B.style.backgroundColor="red";
        }
        else{
            B.disabled = true;
            C.disabled = true;
        }
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    TelefonoMovil.addEventListener("input", function(){
        if (this.value.length == 4){
            this.value += "-"; 
        }
        else if  (this.value.length == 8){
            this.value += ".";  
        }
        else if  (this.value.length == 11){
            this.value += ".";  
        }
    }, false);


    //Validar el formato de telefono
    avisado=false;
    function validarFormatotelefonoMovil(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoMovil").value = "";
            document.getElementById("TelefonoMovil").style.backgroundColor = 'red'; 
            return false;
        }
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    TelefonoConsultorio.addEventListener("input", function(){
        if (this.value.length == 4){
            this.value += "-"; 
        }
        else if  (this.value.length == 8){
            this.value += ".";  
        }
        else if  (this.value.length == 11){
            this.value += ".";  
        }
    }, false);


    //Validar el formato de telefono
    avisado=false;
    function validarFormatotelefonoConsultorio(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoConsultorio").value = "";
            document.getElementById("TelefonoConsultorio").style.backgroundColor = 'red'; 
            return false;
        }
    }
       

    function limpiarColorTelefonoMovil(){
        document.getElementById("TelefonoMovil").value = "";        
        document.getElementById("TelefonoMovil").style.backgroundColor = "white";
    }

    function limpiarColorTelefonoConsultorio(){
        document.getElementById("TelefonoConsultorio").value = "";        
        document.getElementById("TelefonoConsultorio").style.backgroundColor = "white";
    }


</script>
