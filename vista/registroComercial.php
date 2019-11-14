<?php   
    session_start();  
    $verifica_5 = 1909;  
    $_SESSION["verifica_5"] = $verifica_5; 

    //Se crea una sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos; esta sesión se abre nuevamente en Doctores.php

    include("../modulos/muestraError.php");
    include("../conexion/Conexion_BD.php"); 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro comercial</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Afiliación a la plataforma horebi."/>
		<meta name="keywords" content="afiliado, tarjeta."/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
		<script type="text/javascript" src="../javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../javascript/Ajax_Cancelar.js"></script> 
        <script type="text/javascript" src="../javascript/Provincias.js"></script>  
        <script type="text/javascript" src="../javascript/canton.js"></script>  
        <script type="text/javascript" src="../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){foco('NombreCom')}, false);//foco() se encuentra en Funciones_varias.js
            document.addEventListener("keydown", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js  
        </script>
	</head>	
	<body>
        <header class="fixed_1">
    		<?php 
                include("header/headerPrincipal.php");
    		?>
		</header>
        <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Registrar cuenta para comercios.</h3>

			<div id="Afiliacion_1">
                <!-- <p class="Inicio_8" style="line-height: 160%;">Registra una cuenta y escala al siguiente nivel.</p> -->
            </div>
            <div class="Afili_3">
                <form action="../controlador/recibeRegistroCom.php" method="POST" name="Afiliacion" autocomplete="off" class="Afiliacion_0">    
                    <fieldset>
                        <legend>Datos del establecimiento comercial.</legend>                        
                        <label>Nombre:</label>
                        <input type="text" name="nombreCom" id="NombreCom" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Categoria de establecimiento:</label>
                        <select name="categoriaCom">
                            <option></option>
                            <?php
                                //Se consultan las categorias en la tabla catalogo llamada categorias de la BD .
                                $Consulta="SELECT ID_CategoriaCom, nombre_CategoriaComm FROM categoria_comercial ORDER BY nombre_CategoriaComm ASC";
                                $Recordset = mysqli_query($conexion, $Consulta);
                                while($Categoria= mysqli_fetch_array($Recordset)){
                                    echo '<option value="'. $Categoria['ID_CategoriaCom'].'">' . $Categoria["nombre_CategoriaComm"] . '</option>';
                                    echo  '';
                                }
                            ?>
                        </select> 
                        <label>Numero de registro fiscal:</label>
                        <input type="text" name="rifCom" id="RIFCom" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Teléfono:</label>
                             <input type="text" name="telefonoCom" id="TelefonoCom" onblur="" onfocus="limpiarColorTelefono()" style="text-transform: lowercase;"/><!--validarFormatoTelefono() y limpiarColorTelefono() estan al final del archivo   validarFormatoTelefono(this.value)-->
                        <br/>
                        <label>Correo electronico:</label>
                             <input type="text" name="correoCom" id="CorreoCom" onblur="validarFormatocorreo()" onclick="limpiarColorCorreo()" style="text-transform: lowercase;"/><!--validarFormatoCorreo() y limpiarColorCorreo() estan al final del archivo-->
                    </fieldset>  
                    <br>
                    <fieldset>
                        <legend>Datos persona responsable</legend>
                        
                        <label>Nombre:</label>
                        <input type="text" name="nombreCom_1" id="NombreCom_1" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Apellido:</label>
                        <input type="text" name="apellidoCom_1" id="ApellidoCom_1" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Cedula:</label>
                             <input type="text" name="cedulaCom_1" id="CedulaCom_1"/>
                        <br/>
                        <label>Teléfono:</label>
                             <input type="text" name="telefonoCom_1" id="TelefonoCom_1" onfocus="limpiarColorTelefono()"/><!--   validarFormatoTelefono(this.value)validarFormatoTelefono() y limpiarColorTelefono() estan al final del archivo-->
                        <br/>
                        <label>Correo electronico:</label>
                             <input class="correo" type="text" name="correoCom_1" id="CorreoCom_1" onblur="validarFormatocorreo()" onclick="limpiarColorCorreo()" style="text-transform: lowercase;"/><!--validarFormatoCorreo() y limpiarColorCorreo() estan al final del archivo-->
                        <br/>
                        <label>Cargo:</label>
                             <input type="text" name="cargoCom_1" id="CargoCom_1" style="text-transform: capitalize;" onblur="validarFormatocorreo()" onclick="limpiarColorCorreo()"/><!--validarFormatoCorreo() y limpiarColorCorreo() estan al final del archivo-->
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
                                <select class="etiqueta_24" name="provincia" id="Provincia" onchange="SeleccionarCanton(this.form)">
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
                                <select class="etiqueta_24" name="municipio_Col" id="Municipio_Col"> 
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

                        <div id="Regiones"></div>  <!--Este div es necesario por su id es solicitado en la funcion SeleccionarProvincia() uicada en provincias.js, no tiene una razon mas de estar en el documento-->

                    </fieldset>               
                    <fieldset class="Afiliacion_4">
                        <legend>Datos de accceso a la plataforma</legend>  
                        <div>
                            <label>Usuario:</label>
                                <input type="text" name="usuarioCom" id="UsuarioCom">
                            <label>Contraseña:</label>
                                <input type="password" name="contrasenaCom" id="contrasenaCom">                 
                            <label>Repetir contraseña:</label>
                                <input type="password" name="repiteContrasenaCom" id="repiteContrasenaCom">       
                            <br>
                        </div>                               
                    </fieldset> 
                    <input id="AfiliacionSubmit" type="submit" value="Enviar" style="margin: 5% auto !important;" onclick="return validar_05();" /><!--validar_05() se encuentra en validar_Campos.js    -->
                </form>
            </div> 
                  
				</div>
			</div>
		</div>
        <footer>
            <?php
                include("modulos/footer/footer.php")
            ?>
        </footer>
	</body>
</html>
