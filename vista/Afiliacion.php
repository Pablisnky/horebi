<?php
     include("../modulos/actualizar_precio.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Afiliacion</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Planes de afiliacion al directorio comercial y directorio profesional"/>
        <meta name="keywords" content="directorio comercial, directorio profesional, afiliacion, membresia"/>
        <meta http-equiv="Last-Modified" content="0"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="rating" content="General" /><!-- indica si el contenido es apropiado para menores-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.jpg">

        <script src="../javascript/Funciones_varias.js"></script> 

        <style>
            td{
                background-color: ;
                text-align: center;
                height: 27px;
            }
            
            @media screen and (max-width: 325px){
                tr:hover{
                    background-color:#F4FCFB;
                }
            }
        </style>         
    </head>	
    <body>
        <div>   <!--Principal-->   
            <header class="fixed_1">       
                <?php
                    include("header/headerPrincipal.php");
                ?>
            </header>            
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->        
                <h3>Conecta tu tarjeta de presentación a la web.</h3> 
                <div style="background-color: ; float: left; margin-bottom: 3%; width: 45%"><!-- Aplica a Colombia-->
                    <p class="Inicio_8">Planes para profesionales.</p>
                    <a style="background-color: ; display: block; text-align: center;" href="registroProfesional.php">comprar</a>
                    <!-- <table id="planes" style="border-collapse: ; margin: auto">                    
                        <thead>
                            <th>CARACTERISITICA</th>
                            <th>PLAN MENSUAL</th>
                            <th>PLAN SEMESTRAL</th>
                            <th>PLAN ANUAL</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tablaTexto">Tarjeta de presentación con código QR indexado.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr>
                            <tr>
                                <td class="tablaTexto">Directorio profesional.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Portafolio de proyectos realizados.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Perfil profesional.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Logros profesionales.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Agendamiento de citas.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Catalogo de productos (hasta 50 productos).</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Pedidos en linea.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>
                            <tr colspan>
                                <td class="tablaTexto" style="margin-top: 3%;">Inversión</td>
                                <td class="afiliado_02" style="background-color: "><a href="registroEspecialista.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>
                                <td class="afiliado_02"><a href="registro.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>
                                <td class="afiliado_02"><a href="registro.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>                 
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <div style="background-color: ; margin-bottom: 3%; float: right; width: 45%"><!-- Aplica a Colombia-->
                    <p class="Inicio_8">Planes para tiendas comerciales.</p>
                    <a style="background-color: ; display: block; text-align: center;" href="registroComercial.php">comprar</a>
                    <!-- <table id="planes" style="border-collapse: ; margin: auto">                    
                        <thead>
                            <th>CARACTERISITICA</th>
                            <th>PLAN MENSUAL</th>
                            <th>PLAN SEMESTRAL</th>
                            <th>PLAN ANUAL</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tablaTexto">Tarjeta de presentación con código QR indexado.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr>
                            <tr>
                                <td class="tablaTexto">Directorio comercial.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Portafolio de proyectos realizados.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Perfil profesional.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Logros profesionales.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Agendamiento de citas.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                            </tr>  
                            <tr>
                                <td class="tablaTexto_1">Catalogo de productos (hasta 50 productos).</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Pedidos en linea.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>
                            <tr colspan>
                                <td class="tablaTexto" style="margin-top: 3%;">Inversión</td>
                                <td class="afiliado_02" style="background-color: "><a href="registroEspecialista.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>
                                <td class="afiliado_02"><a href="registro.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>
                                <td class="afiliado_02"><a href="registro.php" class="tablaPrecio">Proximamente</a><a style='margin: auto; display: block;'  href='registro.php' class='buttonCuatro_2'>Comprar</a></td>                 
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>  
                    <div id="Perfil_09">
                        <a class="btn_publicaciones" name="boton_Publicaciones" href="registroComercial.php">Planes para tiendas y comercio</a>
                        <a class="btn_publicaciones" name="boton_Publicaciones" href="registroProfesional.php">Planes personales</a>
                    </div>
        </div>   
        <footer>    
            <?php
                // include("../header/footer.php");
            ?>
        </footer>
    </body>
</html>

