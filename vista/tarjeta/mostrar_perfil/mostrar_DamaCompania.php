<?php
session_start();  //Se reanuda la sesion abierta en validarSesion.php
    
    if(!isset($_SESSION["Afiliado"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login
        // echo "ID_Afiliado= " . $_SESSION["Afiliado"];
        // header("location:../vista/ingresar.php");           
    }
    else{
        $sesion= $_SESSION["Afiliado"];//aqui se almacena el ID_Usuario en $sesion
        // echo "ID_Afiliado registrado= " . $sesion;

        include("../conexion/Conexion_BD.php");
    }
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    // se busca que tipo de plan tienen el Dr.
 /*   $Consulta= "SELECT * FROM afiliados INNER JOIN usuario_doctor ON afiliados.ID_Afiliado=usuario_doctor.ID_Afiliado WHERE afiliados.ID_Afiliado='$sesion'";
    $Recordset= mysqli_query($conexion,$Consulta);
    $DatosDoctor= mysqli_fetch_array($Recordset);
    $PlanAfiliado= $DatosDoctor["planAfiliado"]; //se obtiene el plan afiliado del doctor.
    // echo "EL plan del Dr es: " . $PlanAfiliado . "<br>";

    switch($PlanAfiliado){
        case 'Ini':
            $Plan= "Ini";
        break;
        case 'Bas':
            $Plan= "Bas";
        break;
        case 'Esp':
            $Plan= "Esp";
        break;
    } */
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
		<title>Perfil Acompañante</title>
		<meta charset="utf-8"/>
		<meta name="description" content="perfil de doctor, direccion de consultorio, horario de consulta, telefono, directorio medico"/>
		<meta name="keywords" content="consulta, horario, perfil doctor"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" href="../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        <script type="text/javascript">
            //Ajuste el texto del texarea donde va el nombre de la clinica del consultorio
            function resize_1(){
                var text = document.getElementById('CentroMedico');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
            //Ajusta el texto recuperado de la BD en el texarea donde va 
            function resize_2(){
                var text = document.getElementById('PerfilProfesional_2');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
            //Ajusta el texto recuperado de la BD en el texarea donde va 
            function resize_3(){
                var text = document.getElementById('PerfilProfesional_3');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
            //Ajusta el texto recuperado de la BD en el texarea donde va el perfil profesional
            function resize_4(){
                var text = document.getElementById('PerfilProf_1');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
        </script>

    </head>
    <body onload="resize_3(); resize_2();resize_4()">
        <header>
            <?php
                include("../vista/modulos/header/headerAfiliado.php")
            ?>
        </header>
            
            
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- NOMBRE Y APELLIDO -->
           
            <div  class="encabezado_03" style="margin-top: 2%;">
                <?php 
            //Consulta para para colocar el nombre y apellido del afiliado que abre sesión
                $consulta_1="SELECT * FROM afiliados WHERE ID_Afiliado= '$sesion' ";
                $Recorset_1=mysqli_query($conexion,$consulta_1);
                $Afiliado= mysqli_fetch_array($Recorset_1); ;

                    ?>  
                    <input class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Afiliado['nombre_Afi'] . ' ' . $Afiliado['apellido_Afi'] ;?>">
                
                    <input class="A_04" readonly="readonly" type="text" name="especialidad" value="<?php echo $Afiliado['profesion_Afi'];?>">
                    <?php
                        if($Afiliado['profesion_Afi_2']== "no especificó"){
                            echo "";
                        }
                        else{ ?>
                            <input class="A_04" readonly="readonly" type="text" name="especialidad" value="<?php echo $Afiliado['profesion_Afi_2'];?>">
                        <?php } ?>
                    <input type="text" hidden name="CodigoDoctor" value="<?php echo $Afiliado['ID_Afiliado'];?>">
            </div>
            
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- FOTOGRAFIA -->
        
            <div id="Perfil_00_A"> 
                <div id="Perfil_1">
                    <div  class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Afiliado['fotografia'];?>" >
                    </div>
                    <div  id="Perfil_05">
                        <div id="Perfil_06">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="MiPerfil.php">Editar Perfil</a>
                        </div> 
                        <?php
                    /*        if($Plan == "Ini"){
                                $Enviar_1="Promo.php";
                            }
                            else if($Plan == "Bas"){
                                $Enviar_1 ="mostrarPublicaciones.php";
                            }
                            else if($Plan == "Esp")
                                $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";                       
                     */       ?>
                        <div id="Perfil_06" style="margin-top: 10%;">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_SubirArchivo" href="<?php echo $Enviar_1;?>">Publicaciones</a>
                        </div> 
                    </div>
                </div> 
            </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- UBICACIÓN Y DIRECCIÓN OFICINA-->

            <div class="contenedor_03_A">  
                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    
                    <?php
                    $Consulta_2="SELECT * FROM afiliados WHERE ID_Afiliado= '$sesion' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);
                    while($Ubicacion=mysqli_fetch_array($Recordset_2)){
                        //la unica razon por la que se toma el ID_Afiliado de esta consulta es para enviarlo a 
                        $_SESSION["ID_Afiliado"]= $Ubicacion[0];
                    ?>
                        <p class="Perfil_2a">Ubicación</p>
                        <input class="A_05" type="text" name="pais" readonly="readonly" value="<?php echo $Ubicacion['pais_Afi'];?>">
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Ubicacion['provincia_Afi'];?>">
                        <input class="A_05" type="text" name="ciudad" readonly="readonly" value="<?php echo $Ubicacion['canton_Afi'];?>">
                   <?php } 
                   mysqli_free_result($Recordset_2); // Liberamos los registros        
                    ?>
                </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- CONTACTOS -->

                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <p class="Perfil_2a">Contacto</p>
                    <?php
                    $Consulta_3="SELECT * FROM afiliados WHERE ID_Afiliado= '$sesion' ";
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
<!-- RASGOS FISICOS -->
      
            <div id="Perfil_2">
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilProf"  value="Rasgos físicos">
                        <?php
                            $Consulta_6="SELECT * FROM rasgos_fisicos WHERE ID_Afiliado = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $RasgosFisicos= mysqli_fetch_array($Recordset_6);
                        ?>
                        
                        <label>Estatura:
                        <input class="etiqueta_32" type="text" readonly="readonly" value="<?php echo $RasgosFisicos['Estatura'];?>">
                        </label><br>
                        <label>Peso:
                        <input class="etiqueta_32" type="text" readonly="readonly" value="<?php echo $RasgosFisicos['Peso'];?>">
                        </label><br>
                        <label>Ojos:</label>
                        <input class="etiqueta_32" type="text" readonly="readonly" value="<?php echo $RasgosFisicos['Color_ojos'];?>"><br>
                        <label>Cirugía:</label>
                        <input class="etiqueta_32" type="text" readonly="readonly" value="<?php echo $RasgosFisicos['cirugia'];?>">
            </div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- SERVICIOS PROFESIONAL -->
            <div id="Perfil_3">
                <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Servicios profesionales">
                        <?php
                            $Consulta_6="SELECT * FROM servicios_damacompania WHERE ID_Afiliado = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $Servicios_Dama= mysqli_fetch_array($Recordset_6);
                        ?>
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
            </div>
    
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- GALERÍA DE FOTOGRAFIAS -->
        
            <div id="Perfil_00_A"> 
                <div id="Perfil_1">
                <?php 
                    //Consulta para para buscar las fotografias del afiliado que abre sesión
                    $consulta_1="SELECT * FROM galeria WHERE ID_Afiliado= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Galeria= mysqli_fetch_array($Recorset_1); 
                ?>
                <input class="Perfil_2a" readonly="readonly" type="text" name="galeriaFotografi" value="Galería">
                    <div  class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Galeria['gal_1'];?>" >
                    </div>
                    <div  id="Perfil_05">
                        <div id="Perfil_06">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="MiPerfil.php">Editar Perfil</a>
                        </div> 
                        <?php
                    /*        if($Plan == "Ini"){
                                $Enviar_1="Promo.php";
                            }
                            else if($Plan == "Bas"){
                                $Enviar_1 ="mostrarPublicaciones.php";
                            }
                            else if($Plan == "Esp")
                                $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";                       
                     */       ?>
                        <div id="Perfil_06" style="margin-top: 10%;">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_SubirArchivo" href="<?php echo $Enviar_1;?>">Publicaciones</a>
                        </div> 
                    </div>
                </div> 
            </div>        
</body>
</html>

