<!--Encabezado de todas las páginas que no estan dentro de una cuenta de usuario y que se encuentren en la carpeta vista (aplica a todas las paginas excepto al archivos index.php)-->
    <style type="text/css">
            nav li{
                float:left;
            }
            nav li a {
                text-align: left !important;
            }
            nav li ul{/*caja de contenido de los enlaces*/
                background-color: #BCBEDA !important;
                display:none !important;
                position:absolute;
                width:175px !important;
                text-align: left !important;
                padding-left: -90px !important;
            }
            nav li ul li a{
                background-color: ;
                margin-left: 13px !important;
                width: 160px !important;
                line-height: 200% !important;
            }            
            nav li:hover ul{
                display:block  !important;
            }            
            nav li ul li{
                position:relative;
                padding-left: 5px !important;
            }

            @media screen and (max-width: 800px){
                nav li ul{/*caja de contenido de los enlaces*/
                    background-color: #BCBEDA !important;
                    display:none !important;
                    position:absolute;
                    width:400px !important;
                    text-align: left !important;
                    padding-left: -10px !important;
                }
                nav li ul li a{
                    background-color: ;
                    margin-left: 13px !important;
                    width: 400px !important;
                    line-height: 150% !important;
                }     
            }
    </style>
 
    <link rel="stylesheet" type="text/css" href="../iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->   
  
    <p class="Inicio_7">www.horebi.com</p>
    <label id="ComandoMenu" class="comandoMenu comandoMenu_Index" onclick="mostrarMenu()"><span class="icon-menu"></span>
    <nav class="menuResponsive" id="MenuResponsive" style="background-color: red;">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="directorio_Com.php">Directorio comercial</a></li>
            <li><a href="directorio.php">Directorio profesional</a></li>
            <li><a href="contactenos.php">Contacto</a></li>
            <li><a href="Afiliacion.php">Afiliacion</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>
        </ul>
    </nav>  