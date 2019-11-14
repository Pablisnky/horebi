<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Producto desactivado</title>

		<meta charset="utf-8"/>
		<meta name="description" content="login al sistema de tarjetas de presentacion"/>
		<meta name="keywords" content="login, tarjetas de presentacion, directorio comercial, directorio profesional"/>
        <meta http-equiv="Last-Modified" content="0"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="rating" content="General" /><!-- indica si el contenido es apropiado para menores-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css"> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1400px)" href="../css/MediaQuery_Horebi_MonitorGrande.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../javascript/validar_Campos.js"></script> 
        <script src="../javascript/Funciones_varias.js"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", autofocusUsuario, false);//funcion se encuentra en Funciones_varias.js
        </script>
    </head>	
    <body>
        <div>
            <header class="fixed_1">
                <?php
                    include("modulos/header/headerPrincipal.php");
                ?>
            </header>
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->
                <h3>Producto desactivado</h3>
                <div class="Afili_2">
                    <p>No es responsabilidad de nuestra plataforma los productos desactivados, lo invitamos a visitar nuestro sitio web y formar parte de nuestra comunidad.</p>  
                </div>    
                <br><br>      
                <div class="contenedor_01">
                    <!-- <h6>Gracias por ser parte de la comunidad.</h6> -->
                    <h3>horebi</h3>
                </div>    
            </div>
        </div>
        <footer>                        
            <?php
                // include("../header/footer.php");
            ?>
        </footer>  
    </body>
</html>

    	