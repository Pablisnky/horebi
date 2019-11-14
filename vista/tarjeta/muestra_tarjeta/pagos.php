<?php   
    session_start();  
    $verifica_5 = 1909;  
    $_SESSION["verifica_5"] = $verifica_5; 
    //Se crea una sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos; esta sesión se abre nuevamente en recibeRegistro.php
    
    // Se verifica si se realizó login para entrar en este  archivo
    include("../../../modulos/verificar_Afiliado.php");
    //Se conecta a la base de datos
    include("../../../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../../../modulos/muestraError.php");
    //COnsulta en la BD los datos del afiliado
    include("../../../modelo/Consulta_AfiliadoProfesional.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pago de afiliación</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Afiliación de profesionales al directorio profesional"/>
		<meta name="keywords" content="Profesional, registro."/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../../../css/EstilosHorebi.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../../../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../../../css/MediaQuery_Horebi_movilModerno.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../../../images/logo.png">

		<script type="text/javascript" src="../../../javascript/Funciones_varias.js"></script>
		<script type="text/javascript" src="../../../javascript/validar_Campos.js"></script> 
	</head>	
	<body onload= "autofocusRegistroProfesional()">
        <header class="fixed_1">
    		<?php 
                include("../../header/headerAfiliado_2.php");
    		?>
		</header>
        <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Pagos de afiliación.</h3>
			<div id="Afiliacion_1">
                <!-- <p class="Inicio_8" style="line-height: 160%;">Registra una cuenta y escala al siguiente nivel.</p> -->
            </div>
            <div class="Afili_3">
                <form action="../controlador/recibeRegistro.php" method="POST" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <fieldset>
                        <legend>Datos personales</legend>                        
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="Nombre" readonly="readonly" style="text-transform: capitalize;" value="<?php echo $DatosAfiliado['nombre_Afi'];?>"/>
                        <br/>
                        <label>Apellido:</label>
                        <input type="text" name="apellido" id="Apellido" readonly="readonly" style="text-transform: capitalize;" value="<?php echo $DatosAfiliado['apellido_Afi'];?>"/>
                        <br/>
                        <label>Cedula:</label>
                             <input type="text" name="cedula" id="Cedula" readonly="readonly" value="<?php echo $DatosAfiliado['cedula_Afi'];?>"/>
                        <br/>
                        <label>Teléfono:</label>
                             <input type="text" name="telefono" id="Telefono" readonly="readonly" onblur="validarFormatoTelefono(this.value)" onfocus="limpiarColorTelefono()"/ value="<?php echo $DatosAfiliado['telefono_Afi'];?>"><!--validarFormatoTelefono() y limpiarColorTelefono() estan al final del archivo-->
                        <br/>
                        <label>Correo electronico:</label>
                             <input class="correo" type="text" name="correo" id="Correo" readonly="readonly" onblur="validarFormatoCorreo();setTimeout(llamar_verificaCorreo,200);" onfocus="limpiarColorCorreo()" style="text-transform: lowercase;" value="<?php echo $DatosAfiliado['correo_Afi'];?>"/><!--estan al final del archivo-->
                        <div class="contenedor_11" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax  validarFormatoCorreo()-->          
                    </fieldset>   
                    <br>                    
                    <fieldset class="Afiliacion_4">
                        <legend>Información de pago:</legend>
                        <label>Plan afiliacion:</label>
                            <select name="afiliacion" id="Afiliacion_3">  
                                <option></option>
                                <option value="mensual">Mensual</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                            </select>
                        <br/>             
                        <label>Nº referencia de pago:</label>
                        <input type="text" name="usuario">
                        <label>Entidad:</label>
                        <input type="password" name="contrasena">                   
                        <label>Fecha de pago:</label>
                        <input type="password" name="repiteContrasena">                                
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