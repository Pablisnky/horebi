<?php
    session_start();//Se reanuda la sesion abierta en validarSesion.php llamada Afiliado

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
        <title>Perfil Profesional</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../../../images/logo.png">

        <script type="text/javascript" src="../../../javascript/Ajax_Cancelar.js"></script>
        <script type="text/javascript" src="../../../javascript/Ciudades.js"></script> 
        <script type="text/javascript" src="../../../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../../../javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../../../javascript/Provincias.js"></script>  
        <script type="text/javascript" src="../../../javascript/canton.js"></script> 
        <script type="text/javascript" src="../../../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../../../javascript/Municipios_Colombia.js"></script>
        <script type="text/javascript">//los eventos son necesarios introducirlos despues del archivo funciones Funciones_varias.js
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
    <body onload=" resize_1(), autosize()">
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
                
                <form action="../../../controlador/recibe_perfilIngeniero.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->   
<!-- INFORMACION PERSONAL -->
                        <a id="marcador_01" class="ancla_2"></a>
                        <?php
                            //Muestra la seccion del formulario que contiene los datos personales del afiliado
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
<!-- SERVICIO PROFESIONAL -->
<div>
        <a id="marcador_04" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <?php
                $Consulta_6="SELECT * FROM servicios_profesionales WHERE ID_Afiliado = '$sesion' ";
                $Recordset_6= mysqli_query($conexion, $Consulta_6);
                $Servicio= mysqli_fetch_array($Recordset_6);
            ?>
            <legend>Servicios Profesionales</legend>
            <label style="background-color: ; width: 90%;">Especifique sus servicios profesionales.</label><br><br>
            <textarea class="contenido_1" name="servicioUno"><?php echo $Servicio['servicioProf_1'];?></textarea>
            <br>
            <textarea class="contenido_1" name="servicioDos"><?php echo $Servicio['servicioProf_2'];?></textarea>
            <br>
            <p class="contenido_1B" id="lateral" onclick="Agregar_Servicio()">Añadir servicio</p>
            <script type="text/javascript">
                //Función para añadir un nuevo texarea
                function Agregar_Servicio(){    
                    var elemento = document.createElement("textarea");
                    elemento.name = "texarea_Agregado";
                    elemento.maxLength = 5000;
                    elemento.cols = 30;
                    elemento.rows = 1;
                    // elemento.className = 'myCustomTextarea';
                    padre= document.getElementById("lateral");
                    padre.appendChild(elemento);
                }
            </script>
        </fieldset>
</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- PERFIL PROFESIONAL -->
        <a id="marcador_05" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <legend>Perfil profesional</legend>
            <?php
                            $Consulta_6="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
            ?>
            <textarea class="contenido_1" id="PerfilProf" name="textoPerfil"><?php echo $PerfilAfiliado['perfil_profesional'];?></textarea>
            <input type="text" class="contador" id="Contador_2" name="contadorBD" value="800">
        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- PROYECTOS EN LOS QUE PARTICIPO -->                        
                        <a id="marcador_06" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">   
                            <legend>Proyectos en los que participo.</legend>
                            <label>Nombre proyecto:</label>
                            <input type="text" name="">
                            <br/>
                            <label>Cliente:</label>
                            <input type="text" name="">
                            <br/>
                            <label>Cargo:</label>
                            <input class="etiqueta_32" type="text" name="registroSanitario" id="RegistroSanitario"  value="<?php echo $Usuario['RegistroSanitario'];?>" style="text-transform: lowercase;" />
                            <br/>
                            <label>Descripcion de las tareas realizadas:</label>
                            <input class="etiqueta_32" type="text" name="telefonoConsultorio" id="TelefonoConsultorio" value="<?php echo $Usuario['telefono_consultorio'];?>" onclick="limpiarColorTelefonoConsultorio()"  onblur="validarFormatotelefonoConsultorio(this.value)"/>
                            <br/>
                            <label>Estado:</label>
                            <select class="etiqueta_26" name="estado" id="Estado"> <!-- esta funcion esta en CIudad.js-->
                                <option value=""></option>
                                    <option>Amazonas</option>
                                    <option>Anzoátegui</option>
                                    <option>Apure</option>
                                    <option>Aragua</option>
                                    <option>Barinas</option>
                                    <option>Bolivar</option>
                                    <option>Carabobo</option>
                                    <option>Cojedes</option>
                                    <option>Delta Amacuro</option>
                                    <option>Distrito Capital</option>
                                    <option>Falcon</option>
                                    <option>Guárico</option>
                                    <option>Lara</option>
                                    <option>Mérida</option>
                                    <option>Miranda</option>
                                    <option>Monagas</option> 
                                    <option>Nueva Esparta</option>
                                    <option>Portuguesa</option>
                                    <option>Sucre</option>
                                    <option>Táchira</option>
                                    <option>Trujillo</option>                           
                                    <option>Vargas</option>-->
                                    <option>Yaracuy</option>
                                   <option>Zulia</option>
                            </select>                  
                            <br><br>

                            <label>Ciudad:</label>
                            <input class="etiqueta_32" type="text" name="ciudad" id="Ciudad" value="<?php echo $Usuario['ciudad'];?>"> 
                        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- CONTRATACION -->
                        <fieldset>
                            <legend>Contratación</legend>

                            <label>Precio honorarios profesionales:</label>
                            <input class="etiqueta_32" type="text" name="precioConsulta" id="PrecioConsulta" value="<?php echo $Usuario['precio_consulta'];?>"/>
                        </fieldset>
                            <br/>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- CAMBIAR CONTRASEÑA -->
                        <a id="marcador_07" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4"> 
                            <legend>Cambiar contraseña</legend>
                            <input type="checkbox" hidden name="cambiarValores" id="CambiarValor" value="1"><!--esta funcion esta al final del archeivo-->
                            <p style="font-size: 14px; margin-left: 2%; color: #040652;">Le enviaremos un codigo a su correo, el cual debe introducir al realizar la solicitud de cambio de contraseña.</p><br><br>
                            
                            <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="EnviarCorreo.php">Solicitar código</a> 
                            <br>
                            <label>Insertar código</label>
                            <input type="password" name="valorB"  id="ValorB"  placeholder="4 digitos">
                            <Hr>
                        </fieldset>
                    </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- INIDCE LATERAL DERECHO -->
                    <div style="background-color:; width: 20%; margin-left: 65%; margin-top: 3%; float: right; position: fixed;">
                        <p style="background-color: #BEBFDD; text-align: center; margin-left: 0%; margin-bottom: 2%; font-size: 18px;">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_02">Fotografia</a><br>
                        <a class="marcador" href="#marcador_04">Servicios profesionales</a><br>
                        <a class="marcador" href="#marcador_05">Perfil profesional</a><br>
                        <a class="marcador" href="#marcador_06">Proyectos</a><br>
                        <a class="marcador" href="#marcador_07">Cambiar contraseña</a>
                    </div>  
                    <div style="background-color:; width: 25%; margin-left: 62.5%; height: 20px; margin-top: 21%; float: right; position: fixed;">
                        <?php
                            $Consulta_8="SELECT mostrar FROM afiliados WHERE ID_Afiliado ='$sesion'";
                            $Recordset_8= mysqli_query($conexion, $Consulta_8);
                            $Mostrar_Directorio= mysqli_fetch_array($Recordset_8);
                        ?>
                        <label for="MostrarPerfil" class="perfil_1"><input type="checkbox" id="MostrarPerfil" name="mostrarPerfil" value="1" checked style="float: left; margin-top: 0.5%; margin-right: -15%;  margin-left: -85px;"  
                        <?php if(($Mostrar_Directorio['mostrar']) == "1"){ echo 'checked'; } ?>>
                        Mostrar perfil en Directorio Profesional.</label>
                    </div> 
                    <div id="Perfil_06" style="background-color:; position: fixed; width: 20%; margin-left: 63%; display: flex; justify-content: center; margin-top: 25%">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick=""> <!--return validar_10()-->
                        <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="configurarT.php">Volver</a>         
                    </div>             
                </form>                 
            </section> 
       </div>
       <!-- <footer>   
            <?php
                // include("../modulos/footer/footer.php");
            ?>
        </footer>-->
    </body>
    </html>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<script type="text/javascript">
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
