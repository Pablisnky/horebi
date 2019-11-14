<?php   
    session_start();  
    $verifica_5 = 1909;  
    $_SESSION["verifica_5"] = $verifica_5; 

    //Se crea una sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos; esta sesión se abre nuevamente en recibeRegistro.php

    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../modulos/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro profesional</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Afiliación de profesionales al directorio profesional"/>
		<meta name="keywords" content="Profesional, registro."/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../javascript/validar_campos.js"></script>
        <script type="text/javascript" src="../javascript/Provincias.js"></script>  
        <script type="text/javascript" src="../javascript/canton.js"></script>  
        <script type="text/javascript" src="../javascript/Municipios.js"></script> 
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>  
        <script type="text/javascript" src="../javascript/Funciones_Ajax.js"></script>  
        <script type="text/javascript" src="../javascript/Funciones_varias.js"></script>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(){foco('Nombre')}, false);
        </script>
	</head>	
	<body>
        <header class="fixed_1">
    		<?php 
                include("header/headerPrincipal.php");
    		?>
		</header>
        <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Registrar cuenta para profesionales.</h3>
            <div class="Afili_3">
                <form action="../controlador/recibeRegistro.php" method="POST" name="AfiliacionProfesional" autocomplete="off" class="Afiliacion_0">
                    <fieldset>
                        <legend>Datos personales</legend>                        
                        <label>Nombre:</label>
                        <input class="mayuscula" type="text" name="nombre" id="Nombre"/>
                        <br/>
                        <label>Apellido:</label>
                        <input class="mayuscula" type="text" name="apellido" id="Apellido"/>
                        <br/>
                        <label>Cedula:</label>
                             <input type="text" name="cedula" id="Cedula"/>
                        <br/>
                        <label>Teléfono:</label>
                             <input type="text" name="telefono" id="Telefono"/>
                        <br/>
                        <label>Correo electronico:</label>
                             <input class="correo" type="text" name="correo" id="Correo" onblur="validarFormatoCorreo();setTimeout(llamar_verificaCorreo,200);" onfocus="limpiarColorCorreo()"/>
                        <div class="contenedor_11" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
                        <br/>
                        <label>Profesión u Oficio</label>
                        <input class="mayuscula" type="text" name="profesion" id="Profesion"/>
                        <br/>
                        <label>Categoria de Profesión: <br><small style="display: block; font-size: 13px; padding-top: 3%;">(Segun CIUO - Clasificación Internacional Uniforme de Ocupaciones.)</small></label>
                        <select name="categoria">
                            <option></option>
                            <?php
                                //Se consultan las categorias en la tabla catalogo llamada categorias de la BD .
                                $Consulta="SELECT ID_Categoria, nombre_categoria FROM categoria ORDER BY nombre_categoria ASC";
                                $Recordset = mysqli_query($conexion, $Consulta);
                                while($Categoria= mysqli_fetch_array($Recordset)){
                                    echo '<option value="'.$Categoria['ID_Categoria'].'">' . $Categoria["nombre_categoria"] . '</option>';
                                    echo  '';
                                }
                            ?>
                        </select>                 
                    </fieldset>   
                    <br>                    
                    <fieldset class="Afiliacion_4">
                        <legend>Datos de Ubicacion Geografica</legend>
                        <label>Pais:</label>
                            <select class="etiqueta_24" name="pais" id="Pais" onchange="SeleccionarProvincia(this.form)"> 
                                <option></option>
                                <option>Colombia</option>
                                <option>Ecuador</option>
                                <option>Venezuela</option>
                            </select>                  
                        <br>  
                        <div id="Region_1A" style="display: none;"><!--Aplica solo a Ecuador-->
                            <label>Provincia:</label>
                                <select class="etiqueta_24" name="provincia" id="Provincia" onchange="SeleccionarCanton(this.form)"><!--SeleccionarCanton() se encuentra en -->
                                    <option></option>                            
                                </select>                  
                                
                            <label>Canton:</label>
                                <select class="etiqueta_24" name="canton" id="Canton"> 
                                    <option></option>
                                </select>                  
                            <br>
                        </div>  
                        <div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
                            <label>Departamento:</label>
                                <select class="etiqueta_24" name="departamento" id="Departamento" onchange="SeleccionarMunicipio_Colombia(this.form)">
                                    <option></option>                            
                                </select>                  
                                
                            <label>Municipio:</label>
                                <select class="etiqueta_24" name="municipio_Col"> 
                                    <option></option>
                                </select>                  
                            <br>
                        </div> 
                        <div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
                            <label>Estado:</label>
                                <select class="etiqueta_24" name="estado" id="Estado" onchange="SeleccionarMunicipio(this.form)">
                                    <option></option>                            
                                </select>                  
                                
                            <label>Municipio:</label>
                                <select class="etiqueta_24" name="municipio" id="Municipio"> 
                                    <option></option>
                                </select>                  
                            <br>
                        </div>                 
                        
                        <div id="Regiones"></div>  <!--Este div es necesario porque su id es solicitado en la funcion SeleccionarProvincia() uicada en provincias.js, no tiene una razon mas de estar en el documento-->            
                    </fieldset>             
                    <fieldset class="Afiliacion_4">
                        <legend>Datos de accceso a la plataforma</legend>  
                        <div>
                            <label>Usuario:</label>
                                <input type="text" name="usuario" id="Usuario">
                            <label>Contraseña (4 digitos):</label>
                                <input type="password" name="contrasena" id="Contrasena">                 
                                
                            <label>Repetir contraseña:</label>
                                <input type="password" name="repiteContrasena" id="RepiteContrasena">       
                            <br>
                        </div>                               
                    </fieldset> 
                    <input id="AfiliacionSubmit" type="submit" value="Enviar" style="margin: 5% auto !important;" onclick="return validar_04();" /><!--validar_04() se encuentra en validar_Campos.js    -->
                </form>
            </div> 
				</div>
			</div>
		</div>
        <footer>
            <?php
                // include("modulos/footer/footer.php")
            ?>
        </footer>
	</body>
</html>
