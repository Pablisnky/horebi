<!DOCTYPE html>
<html lang="es">
	<head>
		<title>HOREBI_Inicio</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="Tarjetas de presentación conectadas a la web.">
		<meta name="keywords" content="Directorio profesional, directorio comercial, tarjetas de presentación">
		<meta name="author" content="Pablo Cabeza">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta http-equiv="expires" content="01 de enero de 2018"> -->

		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">

		<link rel="stylesheet" type="text/css" href="css/EstilosHorebi.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="css/MediaQuery_Horebi_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="css/MediaQuery_Horebi_1280px.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1400px)" href="css/MediaQuery_Horebi_Otras.css">
		<link rel="stylesheet" type="text/css" href="css/slider_index.css">
		<link rel="stylesheet" type="text/css" href="css/Modal.css">
		<link rel="manifest" href="manifest.json">
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
		<link rel="shortcut icon" type="image/png" href="images/logo_ThermosControl-Recuperado.png">
    	<link rel="stylesheet" type="text/css" href="iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->
        <link rel="stylesheet" type="text/css" href="iconos/icono_flechas_slider/flechas.css"/><!--galeria de icomoon.io-->
        
        <script src="javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117655324-5"></script>
		<script>
		  	window.dataLayer = window.dataLayer || [];
		  	function gtag(){dataLayer.push(arguments);}
		  	gtag('js', new Date());

		  	gtag('config', 'UA-117655324-5');
		</script>
	</head>	
	<body>
        <!--Construcion de ventanan modal-->
			<!-- <input type="checkbox" id="Cerrar">
			<label for="Cerrar" id="btnCerrar">Cerrar</label>
			<div class="modal">
				<div class="contenedor_modal">
					<p style="color: #040652; text-align: center; margin: 2%; font-size: 18px;">En HOREBI.COM premiamos al conocimiento, por lo que promocionamos a nuestro aliado comercial  <span class="span_1">Versus_20</span> </p>

					<p style="color: #040652; text-align: center; font-size: 18px;">Toma una prueba demostrativa y gana con lo que sabes</p>
					<a href="Vs_100/index.php" class="a_1">Entrar a Versus_20.</a>
				</div>
			</div> -->
		<!-- Termina ventana modal -->
		<div class="menuIndex">
			<p class="Inicio_7">www.horebi.com</p>
		    <label id="ComandoMenu" class="comandoMenu comandoMenu_Index" onclick="mostrarMenu()"><span class="icon-menu"></span></label><!-- mostrarMenu() se encuentra en Funciones_varias.js-->
			<nav class="menuResponsive menuResponsiveIndex" id="MenuResponsive">
		        <ul>
			        <li><a class="enlace_2" href="vista/directorio_Comercial.php">Directorio comercial</a></li>
					<li><a class="enlace_2" href="vista/directorio_Profesional.php">Directorio profesional</a></li>
	            	<li><a class="enlace_2" href="vista/contactenos.php">Contacto</a></li>
			        <li><a class="enlace_2" href="vista/Afiliacion.php">Afiliacion</a></li>
			        <li><a class="enlace_2" href="vista/ingresar.php">Ingresar</a></li>
				</ul>
			</nav> 
		</div>
        <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->
			<img class="imagen" src="images/web/00.jpg" alt="Hombre saludando"/> 
			<p class="Inicio_8">Dale vida a tu tarjeta de presentación y has que tus clientes, contactos, socios o amigos interactuen con tus servicios o productos desde nuestra aplicación.</p>

			<p class="Inicio_10">Tarjetas de presentación conectadas a la web.</p> 
			<img class="imagen_4" src="images/web/tarjeta_2.jpg" alt="Tarjeta modelo"/>
			<p class="Inicio_8 Inicio_11">Aplica a todas las profesiones y oficios.</p>
		<!--	<div class="contenedor_SliderCom_1"><!--Este div esta disponible solo para pantallas de telefonos -->
                <!-- <span class="icon-arrow-left2" onclick="CambiarImagen()"></span><!--CambiarImagen() se encuentra en Funciones_varias.js--> 
                <!-- <span class="icon-arrow-right2"></span> -->
		<!--		<ul class="slider">
					<li>
						<input type="radio" name="imagen" id="Radio_1" checked>
						<label for="Radio_1"></label>
						<img src="images/web/07.jpg" alt="Medicos">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_2">
						<label for="Radio_2"></label>
						<img src="images/web/05.jpg" alt="Trabajadores">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_3">
						<label for="Radio_3"></label>
						<img src="images/web/08.jpg" alt="Dama de compañia">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_4">
						<label for="Radio_4"></label>
						<img src="images/web/15.jpg" alt="Atletas">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_5">
						<label for="Radio_5"></label>
						<img src="images/web/24.jpg" alt="Varistas">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_6">
						<label for="Radio_6"></label>
						<img src="images/web/31.jpg" alt="Profesores">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_7">
						<label for="Radio_7"></label>
						<img src="images/web/14.jpg" alt="Operadores">
					</li>
					<li>
						<input type="radio" name="imagen" id="Radio_8">
						<label for="Radio_8"></label>
						<img src="images/web/27.jpg" alt="Musicos">
					</li>
				</ul>
			</div>
			<div class="contenedor"><!--Este div no esta disponible para pantallas de telefonos -->
		<!--		<img class="imagen_3" src="images/web/04.jpg" alt=""/>
				<img class="imagen_3" src="images/web/05.jpg" alt=""/>
				<img class="imagen_3" src="images/web/06.jpg" alt=""/>
				<img class="imagen_3" src="images/web/07.jpg" alt=""/>
				<img class="imagen_3" src="images/web/08.jpg" alt=""/>
				<img class="imagen_3" src="images/web/09.jpg" alt=""/>
				<img class="imagen_3" src="images/web/11.jpg" alt=""/>
				<img class="imagen_3" src="images/web/32.jpg" alt=""/>
				<img class="imagen_3" src="images/web/14.jpg" alt=""/>
				<img class="imagen_3" src="images/web/15.jpg" alt=""/>
				<img class="imagen_3" src="images/web/16.jpg" alt=""/>
				<img class="imagen_3" src="images/web/17.jpg" alt=""/>
				<img class="imagen_3" src="images/web/18.jpg" alt=""/>
				<img class="imagen_3" src="images/web/19.jpg" alt=""/>
				<img class="imagen_3" src="images/web/20.jpg" alt=""/>
				<img class="imagen_3" src="images/web/21.jpg" alt=""/>
				<img class="imagen_3" src="images/web/22.jpg" alt=""/>
				<img class="imagen_3" src="images/web/23.jpg" alt=""/>
				<img class="imagen_3" src="images/web/24.jpg" alt=""/>
				<img class="imagen_3" src="images/web/25.jpg" alt=""/>
				<img class="imagen_3" src="images/web/27.jpg" alt=""/>
				<img class="imagen_3" src="images/web/28.jpg" alt=""/>
				<img class="imagen_3" src="images/web/10.jpg" alt=""/>
				<img class="imagen_3" src="images/web/29.jpg" alt=""/>
				<img class="imagen_3" src="images/web/30.jpg" alt=""/>
				<img class="imagen_3" src="images/web/31.jpg" alt=""/>    -->
				<!-- <img class="imagen_3" src="images/32.jpg" alt="Imagen de tatuador"/>
				<img class="imagen_3" src="images/32.jpg" alt="Imagen de gerente"/>
				<img class="imagen_3" src="images/32.jpg" alt="Imagen de bailador de tango"/> -->
			</div>
			<p class="Inicio_4">Crea tu portafolio de trabajos, tu perfil, tus logros, tus servicios, tus productos y aumenta tus probabilidades de participación en la sociedad que construye tu pais.</p>
		</div>		
        <footer>    
            <?php
                // include("../header/footer.php");
            ?>
        </footer>
	</body>
</html>
