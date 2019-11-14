<?php
    session_start();//Se reanada la sesion abierta en validarSesion.php llamada AfiliadoCom

    //Se verifica si se realizó login para entrar en este archivo
    include("../../../modulos/VerificaAfiliado_comercio.php");
    //Se conecta a la base de datos
    include("../../../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../../../modulos/muestraError.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script type="text/javascript" src="../../../javascript/Ajax_Cancelar.js"></script>
        <script type="text/javascript" src="../../../javascript/Ciudades.js"></script> 
        <script type="text/javascript" src="../../../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../../../javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../../../javascript/Provincias.js"></script> 
        <script type="text/javascript" src="../../../javascript/canton.js"></script>  
        <script type="text/javascript" src="../../../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../../../javascript/Municipios_Colombia.js"></script> 
        <script type="text/javascript">//los eventos son necsarios introducirlos despues del archivo funciones Funciones_varias.js
            document.addEventListener("keydown", contar_2, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", contar_2, false);//contar() se encuentra en Funciones_varias.js
            document.addEventListener("keydown", valida_Longitud_2, false);//valida_Longitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud_2, false);//valida_Longitud() se encuentra en Funciones_varias.js  
        </script>      
    </head>     
    <body onload=" resize_1()">
        <header>
            <?php          
                include("../../header/headerAfiliado_com.php")
            ?>
        </header>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- DATOS PERSONA RESPONSABLE Y COMERCIO -->
        <div> 
            <section style="margin-top: 5%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>

                <?php
                    $consulta_1="SELECT * FROM afiliado_comercial WHERE ID_AfiliadoCom= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Usuario= mysqli_fetch_array($Recorset_1);
                ?>
                
                <form action="../../../controlador/recibe_comercio.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0"> 
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">
                        
                        <a id="marcador_01" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Datos persona responsable</legend>
                            <label>Nombre:</label>
                            <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Usuario['Nombre'];?>" />
                            <br/>
                            <label>Apellido:</label>
                            <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Usuario['Apellido'];?>"/>
                            <br/>
                            <label>Cédula:</label>
                            <input class="etiqueta_32" type="text" name="cedula" id="Cedula" value="<?php echo $Usuario['Cedula'];?>"/>
                            <br/>
                            <label>Teléfono:</label>
                            <input class="etiqueta_32" type="text" name="telefono" id="TelefonoMovil" value="<?php echo $Usuario['Telefono'];?>"/> <!--  onclick="limpiarColorTelefonoMovil()"  onblur="validarFormatotelefonoMovil(this.value)"-->
                            <br/>
                            <label>Correo electronico:</label>
                            <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['Correo_Electronico'];?>"/>    
                            <br/>
                            <label>Cargo:</label>
                            <input class="etiqueta_32" type="text" name="cargo" value="<?php echo $Usuario['Cargo'];?>"/>                     
                        </fieldset>

                        <a id="marcador_01A" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Datos establecimiento comercial</legend>
                            <label>Nombre:</label>
                            <input class="etiqueta_32" type="text" name="nombre_Com" value="<?php echo $Usuario['Nombre_Comercio'];?>" />
                            <br/>
                            <label>RIF:</label>
                            <input class="etiqueta_32" type="text" name="rif_Com" value="<?php echo $Usuario['RIF'];?>" />
                            <br/>
                            <label>Telefono comercio:</label>
                            <input class="etiqueta_32" type="text" name="telefono_Com" value="<?php echo $Usuario['Telefono_Comercio'];?>" />
                            <br/>
                            <label>Correo electronico comercio:</label>
                            <input class="etiqueta_32" type="text" name="correo_Com" value="<?php echo $Usuario['Correo_Electronico_Comercio'];?>" />
                            <br/>
                            <label>Categoria:</label>
                            <select name="categoria_Com">
                            <?php
                            //Se consulta que categoria tiene actualmente el afiliado
                                $Consulta_4="SELECT * FROM categoria_comercial INNER JOIN afiliado_comercial ON categoria_comercial.ID_CategoriaCom=afiliado_comercial.ID_Categoria WHERE afiliado_comercial.ID_AfiliadoCom = '$sesion'" ;
                                $Recordset_4= mysqli_query($conexion, $Consulta_4);
                                while($categoria = mysqli_fetch_array($Recordset_4)){  
                                    echo '<option value="'.$categoria['ID_CategoriaCom'].'">'. $categoria["nombre_CategoriaComm"] .'</option>';
                                }
                                //Se consultan las categorias en la tabla catalogo llamada categorias de la BD .
                                $Consulta="SELECT ID_CategoriaCom, nombre_CategoriaComm FROM categoria_comercial ORDER BY nombre_CategoriaComm ASC";
                                $Recordset = mysqli_query($conexion, $Consulta);
                                while($Categoria= mysqli_fetch_array($Recordset)){
                                    echo '<option value="'.$Categoria['ID_CategoriaCom'].'">' . $Categoria["nombre_CategoriaComm"] . '</option>';
                                    echo  '';
                                }
                                ?> 
                            </select> 
                            <br/>
                            <label>Descripcion:</label>
                            <textarea class="contenido_4" name="descripcion_1" id="Descripcion_1"><?php echo $Usuario['descripcion_Comercio'];?></textarea>
                            <input class="contador" type="text" name="contador_2" id="Contador_2" value="150">
                            <br/>
                            <label>Pais:</label>
                                <select style="width: 49% !important;" name="pais" id="Pais" onclick="SeleccionarProvincia(this.form)"> <!-- SeleccionarProvincia() se encuentra en Provincias.js-->
                                    <option><?php echo $Usuario['Pais_Comercio'];?></option>
                                    <option>Colombia</option>
                                    <option>Ecuador</option>
                                    <option>Venezuela</option>
                                </select>                  
                            <br>   
                            <div id="Region_1A" style="display: none;"><!--Aplica solo a Ecuador-->
                                <label>Provincia:</label>
                                    <select style="width: 49% !important;" name="provincia" id="Provincia" onclick="SeleccionarCanton(this.form)">
                                        <option></option>                            
                                    </select>                  
                                <br>         
                                <label>Canton:</label>
                                    <select style="width: 49% !important;" name="canton" id="Canton"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div> 
                            <div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
                                <label>Departamento:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="departamento" id="Departamento" onclick="SeleccionarMunicipio_Colombia(this.form)">
                                        <option></option>                            
                                    </select>                  
                                    
                                <label>Municipio:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="municipio_Col" id="Municipio_Col"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div> 
                            <div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
                                <label>Estado:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="estado" id="Estado" onclick="SeleccionarMunicipio(this.form)">
                                        <option></option>                            
                                    </select>                  
                                    
                                <label>Municipio:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="municipio" id="Municipio"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div>  

                        <!-- Muestra la region y sub region que existe en la base de datos-->
                        <div id="Regiones">
                        <?php
                            if($Usuario['Pais_Comercio'] == "Venezuela"){ ?>
                                <label>Estado:</label>
                                <input type="text" name="estado_BD" readonly="readonly" value="<?php echo $Usuario['Region_Comercio']?>"> 
                                <label>Municipio:</label>
                                <input type="text" name="municipio_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion_Comercio']?>">
                                <?php       
                            }  
                            else if($Usuario['Pais_Comercio'] == "Colombia"){ ?>
                                <label>Departamento:</label>
                                <input type="text" name="departamento_BD" readonly="readonly" value="<?php echo $Usuario['Region_Comercio']?>"> 
                                <label>Municipio:</label>
                                <input type="text" name="municipioCol_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion_Comercio']?>">
                                <?php       
                            }
                            if($Usuario['Pais_Comercio'] == "Ecuador"){ ?>
                                <label>Provincia:</label>
                                <input type="text" name="provincia_BD" readonly="readonly" value="<?php echo $Usuario['Region_Comercio']?>"> 
                                <label>Canton:</label>
                                <input type="text" name="canton_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion_Comercio']?>">
                                <?php       
                            }    ?>
                        </div>
                        <label>Direccion:</label>
                        <textarea class="contenido_4" name="direccion" id="Direccion"><?php echo $Usuario['direccion_Comercio'];?></textarea>      
                    </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- LOGO -->
                        <a id="marcador_02" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Logo</legend>
                            <label class="etiqueta_1B">Inserte una imagen no mayor de 50 Kb</label><br><br>
                            <input name="imagen" type="file" value="Seleccione un fotografia" />
                            <img src="../../../images/Usuarios/<?php echo $Usuario['logo_comercio'];?>">
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- GALERIA DE SLIDER; MAXIMO 5 -->
        <a id="marcador_05" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <legend>Imagenes de slider</legend>
                <?php
                    $Consulta_2="SELECT * FROM imagenes_comercial INNER JOIN afiliado_comercial ON imagenes_comercial.ID_AfiliadoCom=afiliado_comercial.ID_AfiliadoCom WHERE afiliado_comercial.ID_AfiliadoCom = '$sesion'";
                    $Recordset_2= mysqli_query($conexion, $Consulta_2);
                    if(mysqli_num_rows($Recordset_2) < 5){ ?>
                        <label class="etiqueta_1B">Inserte una imagen a la vez, no mayor de 50 Kb</label><br><br>
                        <input name="imagenSlider_A" type="file" value="Seleccione un imagen" />  <?php
                        while($Slider_2= mysqli_fetch_array($Recordset_2)){  ?>
                            <hr style="margin: 5%;">
                            <img style="width: 200px; height: 100%" src="../../../images/Usuarios/<?php echo $Slider_2['imagen_slider'];?>">
                            <a href="../../../controlador/EliminarImgGaleria.php?Imagen_Slid=<?php echo $Slider_2['ID_Imagen'];?>" onclick="return Confirmacion()">Eliminar</a>
                            <?php 
                        } 
                    } 
                    else{
                        echo "<br>";
                        echo "Ha alcanzado el limite maximo de imagenes en el slider" .  "<br>";
                        while($Slider_2= mysqli_fetch_array($Recordset_2)){  ?>
                            <hr style="margin: 5%;">
                            <img style="width: 200px; height: 100%" src="../images/Usuarios/<?php echo $Slider_2['imagen_slider'];?>">
                            <a href="../controlador/EliminarImgGaleria.php?Imagen_Slid=<?php echo $Slider_2['ID_Imagen'];?>" onclick="return Confirmacion()">Eliminar</a>
                            <?php 
                        } 
                    } ?>
        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- HORARIO-->
        <a id="marcador_02B" class="ancla_2"></a>
        <?php
        //Muestra la seccion del formulario que contiene el horario
            include("../../../modulos/horario.php");
        ?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIOS -->
        <a id="marcador_04" class="ancla_2"></a>
        <fieldset class="Afiliacion_4">
            <?php
                $Consulta_6="SELECT * FROM servicios_comerciales WHERE ID_AfiliadoCom = '$sesion'";
                $Recordset_6= mysqli_query($conexion, $Consulta_6);
                $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
            ?>
            <legend>Servicios</legend>
            <label style="background-color: ; width: 90%;">Especifique sus servicios profesionales.</label><br><br>
            <textarea style="width: 90%; text-align: left;" name="servicioUno"><?php echo $PerfilAfiliado['servicio_1'];?></textarea>
            <br>
            <textarea style="width: 90%; text-align: left;" name="servicioDos"><?php echo $PerfilAfiliado['servicio_2'];?></textarea>
            <br>
        </fieldset>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- TARIFAS -->
                        <a id="marcador_03" class="ancla_2"></a>
                        <fieldset class="Afiliacion_3">
                            <legend>Tarifas</legend>
                            <?php
                                $Consulta_9="SELECT * FROM galeria INNER JOIN afiliado_comercial ON galeria.ID_Afiliado=afiliado_comercial.ID_AfiliadoCom WHERE afiliado_comercial.ID_AfiliadoCom = '$sesion'";
                                $Recordset_9= mysqli_query($conexion, $Consulta_9);
                                if(mysqli_num_rows($Recordset_9) < 5){ ?>
                                    <label style="background-color: ; width: 90%;">Inserte una imagen a la vez, no mayor de 50 Kb</label><br><br>
                                    <input name="producto_com" type="file" value="Seleccione un imagen" /> 
                                    <br>
                                    <label>Descripcion:</label>
                                    <textarea class="textarea_2" name="descripcionProCom" id="DescripcionPro"></textarea>
                                    <br>
                                    <label>Precio al mayor:</label>
                                    <input class="etiqueta_32" type="text" name="precio_MayProCom" id="Precio_MayPro"/>
                                    <br>
                                    <label>Precio por unidad:</label>
                                    <input class="etiqueta_32" type="text" name="precio_MenProCom" id="Precio_MenPro"/>
                                    <?php
                                     // Inicia seccion para mostrar en perfil                            
                                    while($galeria= mysqli_fetch_array($Recordset_9)){  ?>
                                        <hr style="margin: 5%;">
                                        <img style="width: 200px; height: 100%" src="../../../images/Usuarios/<?php echo $galeria['galeria_1'];?>">
                                        <br>
                                        <label>Descripcion:</label>
                                        <textarea class="textarea_2" name="descripcionEditCom" id="DescripcionEditCom"><?php echo $galeria["descripcion"];?></textarea>
                                        <br>
                                        <label>Precio al mayor:</label>
                                        <input type="text" name="precioMayEdit" id="PrecioMayEditCom" value="<?php echo $galeria["precio_Mayor"];?>">
                                        <br>
                                        <label>Precio por unidad:</label>
                                        <input type="text" name="precioMenEdit" id="PrecioMenEditCom" value="<?php echo $galeria["precio_Menor"];?>">
                                        <a href="../../../controlador/EliminarImgGaleria.php?Galeria=<?php echo $galeria['ID_Galeria'];?>" onclick="return Confirmacion()">Eliminar</a>
                                        <?php 
                                    }
                                }
                                else{ 
                                    echo "Ha alcanzado el limite maximo de productos o servicios para mostrar" .  "<br>";                         
                                    while($galeria= mysqli_fetch_array($Recordset_9)){  ?>
                                        <hr style="margin: 5%;">
                                        <img style="width: 200px; height: 100%" src="../../../images/Usuarios/<?php echo $galeria['galeria_1'];?>">
                                        <br>
                                        <label>Descripcion:</label>
                                        <textarea class="textarea_2" name="descripcionEdit" id="DescripcionEditCom"><?php echo $galeria["descripcion"];?></textarea>
                                        <br>
                                        <label>Precio al mayor:</label>
                                        <input type="text" name="precioMayEdit" id="PrecioMayEditCom" value="<?php echo $galeria["precio_Mayor"];?>">
                                        <br>
                                        <label>Precio por unidad:</label>
                                        <input type="text" name="precioMenEdit" id="PrecioMenEditCom" value="<?php echo $galeria["precio_Menor"];?>">
                                        <a href="../../../controlador/EliminarImgGaleria.php?Galeria=<?php echo $galeria['ID_Galeria'];?>" onclick="return Confirmacion()">Eliminar</a>
                                        <?php 
                                    }
                                } ?>
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
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- MENU FIJO LATERAL DERECHO -->
                    <div style="background-color:; width: 25%; margin-left: 62.5%; margin-top: 0%; float: right; position: fixed;">
                        <p style="background-color: #BEBFDD; text-align: center; margin-left: 0%; margin-bottom: 2%; font-size: 18px;">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_01A">Datos establecimiento comercial</a><br>
                        <a class="marcador" href="#marcador_02">Logo</a><br>
                        <a class="marcador" href="#marcador_05">Imgenes de Slider</a><br>
                        <a class="marcador" href="#marcador_02B">Horario</a><br>
                        <a class="marcador" href="#marcador_04">Servicios</a><br>
                        <a class="marcador" href="#marcador_03">Tarifas</a><br>
                        <a class="marcador" href="#marcador_06">Verificación de usuario</a>
                    </div>  
                    <div style="background-color:; width: 25%; margin-left: 62.5%; height: 20px; margin-top: 21%; float: right; position: fixed;">
                        <?php
                            $Consulta_8="SELECT mostrar FROM afiliados WHERE ID_Afiliado ='$sesion'";
                            $Recordset_8= mysqli_query($conexion, $Consulta_8);
                            $Most= mysqli_fetch_array($Recordset_8);
                        ?>
                        <label for="MostrarPerfil" class="perfil_1"><input type="checkbox" id="MostrarPerfil" name="mostrarPerfil" value="1" checked style="float: left; margin-top: 0.5%; margin-right: -15%;   margin-left: -85px;"  
                        <?php if(($Most['mostrar'])=='1') { echo ' checked'; } ?>>
                        Mostrar perfil en Directorio Comercial.</label>
                    </div> 
                    <div id="Perfil_06" style="background-color:; position: fixed; width: 20%; margin-left: 63%; display: flex; justify-content: center; margin-top: 25%">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick=""> <!--return validar_10()-->
                        <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="configurarT_com.php">Volver</a>         
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
    document.querySelector('#Descripcion_1').addEventListener('keydown', autosize);
                     
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
        var text = document.getElementById('Descripcion_1');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
      
// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    // TelefonoMovil.addEventListener("input", function(){
    //     if (this.value.length == 4){
    //         this.value += "-"; 
    //     }
    //     else if  (this.value.length == 8){
    //         this.value += ".";  
    //     }
    //     else if  (this.value.length == 11){
    //         this.value += ".";  
    //     }
    // }, false);


    //Validar el formato de telefono
    // avisado=false;
    // function validarFormatotelefonoMovil(campo){
    //     var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
    //     if((campo.match(RegExPattern)) && (campo!='')){
    //         return true;
    //     }
    //     else{
    //         alert("Telefono con formato incorrecto");
    //         document.getElementById("TelefonoMovil").value = "";
    //         document.getElementById("TelefonoMovil").style.backgroundColor = 'red'; 
    //         return false;
    //     }
    // }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    // TelefonoConsultorio.addEventListener("input", function(){
    //     if (this.value.length == 4){
    //         this.value += "-"; 
    //     }
    //     else if  (this.value.length == 8){
    //         this.value += ".";  
    //     }
    //     else if  (this.value.length == 11){
    //         this.value += ".";  
    //     }
    // }, false);


    //Validar el formato de telefono
    // avisado=false;
    // function validarFormatotelefonoConsultorio(campo){
    //     var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
    //     if((campo.match(RegExPattern)) && (campo!='')){
    //         return true;
    //     }
    //     else{
    //         alert("Telefono con formato incorrecto");
    //         document.getElementById("TelefonoConsultorio").value = "";
    //         document.getElementById("TelefonoConsultorio").style.backgroundColor = 'red'; 
    //         return false;
    //     }
    // }
       

    // function limpiarColorTelefonoMovil(){
    //     document.getElementById("TelefonoMovil").value = "";        
    //     document.getElementById("TelefonoMovil").style.backgroundColor = "white";
    // }

    // function limpiarColorTelefonoConsultorio(){
    //     document.getElementById("TelefonoConsultorio").value = "";        
    //     document.getElementById("TelefonoConsultorio").style.backgroundColor = "white";
    // }


</script>
