<?php
    session_start(); //Se reanuda la sesion abierta en validarSesion.php

    //Se verifica si se realizó login para entrar en este archivo
    include("../../../modulos/Verificar_Afiliado.php");
    //Se conecta a la base de datos
    include("../../../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../../../modulos/muestraError.php");
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
		<title>Perfil Ingeniero</title>
		<meta charset="utf-8"/>
		<meta name="description" content="perfil ingeniro"/>
		<meta name="keywords" content="perfil ingeniero"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" href="../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
    </head>
    <body>
        <header>
            <?php
                include("../../header/headerAfiliado.php")
            ?>
        </header>       
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div  class="encabezado_03" style="margin-top: 2%;">
                <?php 
                    //Consulta para para colocar el nombre y apellido del afiliado que abre sesión
                    $consulta_1="SELECT * FROM afiliados WHERE ID_Afiliado= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Afiliado= mysqli_fetch_array($Recorset_1); ;
                ?>  
                    <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Afiliado['nombre_Afi'] . ' ' . $Afiliado['apellido_Afi'] ;?>">
                
                    <input class="A_04" readonly="readonly" type="text" name="especialidad"  value="<?php echo $Afiliado['profesion_Afi'];?>">

                    <input class="A_04" readonly="readonly" type="text" name="especialidad"  value="<?php echo $Afiliado['profesion_Afi_2'];?>">
                    
                    <input  type="text" hidden name="CodigoDoctor" value="<?php echo $Afiliado['ID_Afiliado'];?>">
            </div>
            
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- FOTOGRAFIA -->
        
            <div class="Perfil_00_A"> 
                <div id="Perfil_1">
                    <div  class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Afiliado['fotografia'];?>" >
                    </div>
                    <div  id="Perfil_05">
                        <div id="Perfil_06">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="perfil_ingeniero.php">Editar Perfil</a>
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
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Ubicacion['region_Afi'];?>">
                        <input class="A_05" type="text" name="ciudad" readonly="readonly" value="<?php echo $Ubicacion['subRegion_Afi'];?>">
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
<!-- PERFIL PROFESIONAL -->
            <div id="Perfil_2">
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilProf"  value="Perfil profesional">
                        <?php
                            $Consulta_6="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            while($PerfilAfiliado= mysqli_fetch_array($Recordset_6)){
                        ?>
                <textarea class="A_09" id="PerfilProf_1"><?php echo $PerfilAfiliado['perfil_profesional'];?></textarea>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- LOGROS -->
            <div id="Perfil_3">
                <input class="Perfil_2a" readonly="readonly" type="text" name="" value="Logros">
                        <?php
                            $Consulta_6="SELECT * FROM perfil_afiliado WHERE ID_Afiliado = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion, $Consulta_6);
                            $PerfilAfiliado= mysqli_fetch_array($Recordset_6);
                        ?>
                <div class="mostrar_1">
                    <textarea class="A_10" id="PerfilProfesional_2"><?php echo $PerfilAfiliado['proyecto_1'];?>Creador y programador fullstack de la plataforma www.consultamedica.com.ve la cual gestiona historias médicas de pacientes y solicitudes de citas en linea.</textarea>
                    <figure style="margin-bottom: 8%;">
                        <figcaption class="Inicio_0">Página de inicio de la plataforma www.consultamedica.com.ve</figcaption>
                        <img class="imagen" src="../images/34.jpg" alt="Se muestra la imagen del sitio web www.consultamedica.com.ve">
                    </figure>
                    <figure>
                        <figcaption class="Inicio_0">Historia Médica de pacientes</figcaption>
                        <img class="imagen" src="../images/33.jpg" alt="Se muestra la imagen del sitio web www.consultamedica.com.ve">
                    </figure>
                </div>

                <div class="mostrar_1">
                    <textarea class="A_10" id="PerfilProfesional_3"><?php echo $PerfilAfiliado['proyecto_1'];?>Creador y programador  fullstack de la plataforma www.horebi.com aplicación movil que conecta tarjetas de presentación con la web por medio de Código QR personalizados. (aún en desarrollo)</textarea>
                    <figure>
                        <figcaption class="Inicio_0">Detalle de la plataforma www.horebi.com</figcaption>
                        <img class="imagen" src="../images/35.jpg" alt="Se muestra la imagen del sitio web www.consultamedica.com.ve">
                    </figure>
                </div>
            </div>
            
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- SERVICIOS PROFESIONAL -->
            <div id="Perfil_3">
                <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Servicios profesionales">
                        <ul>  
                            <?php
                            if(!empty($PerfilAfiliado['servicio_1'])){
                            ?>
                                <li class="A_08" type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_1'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_2'])){
                            ?>
                                <li class="A_08" type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_2'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_3'])){
                            ?>
                                <li class="A_08" type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_3'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_4'])){
                            ?>
                                <li class="A_08" type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_4'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_5'])){
                            ?>
                                <li class="A_08" type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_5'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_6'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_6'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['servicio_7'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_7'];?></li>
                            <?php }  

                            if(!empty($PerfilAfiliado['servicio_8'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_8'];?></li>
                            <?php }  

                            if(!empty($PerfilAfiliado['servicio_9'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_9'];?></li>
                            <?php }  

                            if(!empty($PerfilAfiliado['servicio_10'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilAfiliado['servicio_10'];?></li>
                            <?php } 
                            ?> 
                        </ul>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- TRABAJOS ANTERIORES -->
            <div id="Perfil_3">
                <input class="Perfil_2a" readonly="readonly" type="text" name="trabajoAnterior" value="Trabajos anteriores">
                        <ul>  
                            <?php
                            if(!empty($PerfilAfiliado['trabajo_1'])){
                            ?>
                                <li class="A_08" type="text" name="trabajoUno"><?php echo $PerfilAfiliado['trabajo_1'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['trabajo_1'])){
                            ?>
                                <li class="A_08" type="text" name="trabajoDos"><?php echo $PerfilAfiliado['trabajo_2'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['trabajo_1'])){
                            ?>
                                <li class="A_08" type="text" name="trabajoTres"><?php echo $PerfilAfiliado['trabajo_3'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['trabajo_4'])){
                            ?>
                                <li class="A_08" type="text" name="trabajoCuatro"><?php echo $PerfilAfiliado['trabajo_4'];?></li>
                            <?php } 

                            if(!empty($PerfilAfiliado['trabajo_5'])){
                            ?>
                                <li class="A_08" type="text" name="trabajoQuinto"><?php echo $PerfilAfiliado['trabajo_5'];?></li>
                            <?php }  
                            ?> 

                        </ul>
                <?php } ?>       
            </div> 
    
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->        
</body>
</html>

