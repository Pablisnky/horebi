<?php
session_start();//Se reanuda la sesion abierta en validarSesion.php llamada Afiliado
    
    if(!isset($_SESSION["Afiliado"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login
        // echo "ID_Afiliado= " . $_SESSION["Afiliado"];
        // header("location:../vista/ingresar.php");           
    }
    else{
        $sesion= $_SESSION["Afiliado"];//aqui se almacena el ID_Usuario en $sesion
         // echo "ID_Afiliado registrado= " . $sesion;

        include("../conexion/Conexion_BD.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Dama de compañia</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/Ciudades.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../Javascript/Provincias.js"></script>  
        <script type="text/javascript" src="../Javascript/canton.js"></script> 
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

        <style>
            th{
                font-size: 0.9vw;
            }
            td{
               font-size: 0.85vw;
               box-sizing: border-box;
            }
            .a2{
               font-size: 0.88vw; 
               font-weight:bolder;
               color: #040652;
            }
            .a2:hover{
                color: white;
            }
            tr:hover{background-color:#BEBFDD; }
        </style>         

    </head>     
    <body onload=" resize_1()">
        <header>
            <?php          
                include("../vista/modulos/header/headerAfiliado.php")
            ?>
        </header>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- DATOS PERSONALES -->
        <div> 
            <section style="margin-top: 5%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>

                <?php
                    $consulta_1="SELECT * FROM afiliados INNER JOIN usuarios ON afiliados.ID_Afiliado=usuarios.ID_Usuario WHERE usuarios.ID_Usuario= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Usuario= mysqli_fetch_array($Recorset_1);
                ?>
                
                <form action="../controlador/recibe_perfilDamaCompania.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">
                        
                        <a id="marcador_01" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Datos personales</legend>
                            <label>Nombre:</label>
                            <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Usuario['nombre_Afi'];?>" />
                            <br/>
                            <label>Apellido:</label>
                            <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Usuario['apellido_Afi'];?>"/>
                            <br/>
                            <label>Cédula:</label>
                            <input class="etiqueta_32" type="text" name="cedula" id="Cedula" value="<?php echo $Usuario['cedula_Afi'];?>"/>
                            <br/>
                            <label>Teléfono movil:</label>
                            <input class="etiqueta_32" type="text" name="telefonoMovil" id="TelefonoMovil" value="<?php echo $Usuario['telefono_Afi'];?>"/> <!--  onclick="limpiarColorTelefonoMovil()"  onblur="validarFormatotelefonoMovil(this.value)"-->
                            <br/>
                            <label>Profesión:</label>
                            <input class="etiqueta_32" type="text" name="profesion_Afi" id="Profesion_Afi" value="<?php echo $Usuario['profesion_Afi'];?>"/>
                            <br/>
                            <label>Profesión_2:</label>
                            <input class="etiqueta_32" type="text" name="profesion_Afi_2" id="Profesion_Afi_2" value="<?php echo $Usuario['profesion_Afi_2'];?>"/>
                            <br/>
                            <label>Correo electronico:</label>
                            <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['correo_Afi'];?>"/>
                            <br/>  
                            <label>Pais:</label>
                                <select class="" name="pais" id="Pais_2" onclick="SeleccionarProvincia(this.form)"> 
                                    <option><?php echo $Usuario['pais_Afi'];?></option>
                                    <option>Colombia</option>
                                    <option>Ecuador</option>
                                    <option>Venezuela</option>
                                </select>                  
                            <br>   
                            <label>Provincia:</label>
                                <select class="etiqueta_24" name="provincia" id="Provincia_2" onclick="SeleccionarCanton(this.form)">
                                    <option><?php echo $Usuario['provincia_Afi'];?></option>                            
                                </select>                  
                            <br>         
                            <label>Canton:</label>
                                <select class="etiqueta_24" name="canton" id="Canton_2"> 
                                    <option><?php echo $Usuario['canton_Afi'];?></option>
                                </select>                  
                            <br>                         
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- RASGOS FISICOS -->
                        <?php
                            $consulta_8="SELECT * FROM rasgos_fisicos INNER JOIN usuarios ON rasgos_fisicos.ID_Afiliado=usuarios.ID_Usuario WHERE usuarios.ID_Usuario= '$sesion' ";
                            $Recorset_8=mysqli_query($conexion,$consulta_8);
                            $Usuario_1= mysqli_fetch_array($Recorset_8);
                        ?>

                        <a id="marcador_03" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Rasgos físicos</legend>
                            <label>Estatura:</label>
                            <input class="etiqueta_32" type="text" name="estatura" id="Estatura" value="<?php echo $Usuario_1['Estatura'];?>" />
                            <br/>
                            <label>Peso:</label>
                            <input class="etiqueta_32" type="text" name="peso" id="Peso" value="<?php echo $Usuario_1['Peso'];?>"/>
                            <br/>
                            <label>Color ojos:</label>
                            <input class="etiqueta_32" type="text" name="ojos" id="Ojos" value="<?php echo $Usuario_1['Color_ojos'];?>"/>
                            <br/>
                            <label>Cirugías:</label>
                            <input class="etiqueta_32" type="text" name="cirugias" id="Cirugias" value="<?php echo $Usuario_1['cirugia'];?>" />
                            <br/>
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- FOTOGRAFIA -->

                        <a id="marcador_02" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Fotografia de perfil</legend>
                            <label class="etiqueta_1B">Inserte una imagen no mayor de Kb</label><br><br>
                            <input name="imagen" type="file" value="Seleccione un fotografia" />
                        </fieldset>
    

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIO PROFESIONAL -->

        <a id="marcador_04" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <?php
                $Consulta_6="SELECT * FROM servicios_damacompania WHERE ID_Afiliado = '$sesion'";
                $Recordset_6= mysqli_query($conexion, $Consulta_6);
                $Servicios_Dama= mysqli_fetch_array($Recordset_6);
            ?>
            <legend>Servicios Profesionales</legend>
            <label for="Servicio_1" class="perfil_1"><input type="checkbox" id="Servicio_1" name="servicioUno" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_1']) == 1) { echo ' checked'; } ?>>
                Sexo oral con condon</label>
            <label for="Servicio_2" class="perfil_1"><input type="checkbox" id="Servicio_2" name="servicioDos" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_2']) == 1) { echo ' checked'; } ?> >
                Sexo oral sin condon</label>
            <label for="Servicio_3" class="perfil_1"><input type="checkbox" id="Servicio_3" name="servicioTres" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;"  
                        <?php if(($Servicios_Dama['servicio_3']) == 1) { echo ' checked'; } ?>>
                Masturbación</label>
            <label for="Servicio_4" class="perfil_1"><input type="checkbox" id="Servicio_4" name="servicioCuatro" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_4']) == 1) { echo ' checked'; } ?> >
                Sexo anal</label>
            <label for="Servicio_5" class="perfil_1"><input type="checkbox" id="Servicio_5" name="servicioCinco" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;"  
                        <?php if(($Servicios_Dama['servicio_5']) == 1) { echo ' checked'; } ?>>
                Eyacualación en la boca</label>
            <label for="Servicio_6" class="perfil_1"><input type="checkbox" id="Servicio_6" name="servicioSeis" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_6']) == 1) { echo ' checked'; } ?>>
                Trio (dos hombres)</label>
            <label for="Servicio_7" class="perfil_1"><input type="checkbox" id="Servicio_7" name="servicioSiete" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_7']) == 1) { echo ' checked'; } ?> >
                Trio (dos mujeres)</label>
            <label for="Servicio_8" class="perfil_1"><input type="checkbox" id="Servicio_8" name="servicioOcho" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;"  
                        <?php if(($Servicios_Dama['servicio_8']) == 1) { echo ' checked'; } ?>>
                Bukake<small> (Solo tragar semen de más de tres hombres)</small></label>
            <label for="Servicio_9" class="perfil_1"><input type="checkbox" id="Servicio_9" name="servicioNueve" value="1" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;" 
                        <?php if(($Servicios_Dama['servicio_9']) == 1) { echo ' checked'; } ?> >
                GangBang<small> (Sexo con más de tres hombres)</small></label>
            <br>
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
<!-- GALERÍA FOTOGRAFICA -->

                        <a id="marcador_05" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Galería Fotografica</legend>
                            <label class="etiqueta_1B">Inserte una imagen no mayor de Kb</label><br><br>
                            <input name="imagen" type="file" value="Seleccione un fotografia" />
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
                        <a class="marcador" href="#marcador_02">Fotografia</a><br>
                        <a class="marcador" href="#marcador_03">Rasgos físicos</a><br>
                        <a class="marcador" href="#marcador_04">Servicios profesionales</a><br>
                        <a class="marcador" href="#marcador_05">Galería fotografica</a><br>
                        <a class="marcador" href="#marcador_06">Verificación de usuario</a>
                    </div>  
                    <div style="background-color:; width: 25%; margin-left: 62.5%; height: 20px; margin-top: 21%; float: right; position: fixed;">
                        <?php
                            $Consulta_8="SELECT mostrar FROM afiliados WHERE ID_Afiliado ='$sesion'";
                            $Recordset_8= mysqli_query($conexion, $Consulta_8);
                            $Most= mysqli_fetch_array($Recordset_8);
                        ?>
                        <label for="MostrarPerfil" class="perfil_1"><input type="checkbox" id="MostrarPerfil" name="mostrarPerfil" value="1" checked style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;"  
                        <?php if(($Most['mostrar'])=='1') { echo ' checked'; } ?>>
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
