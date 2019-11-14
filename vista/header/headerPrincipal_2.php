<!--Encabezado de todas las páginas que no estan dentro de una cuenta de usuario y que no llevan el texto "horebi"-->
    <style type="text/css">
            nav li{
                float:left;
            }
            nav li a {
                text-align: left !important;
            }
            nav li ul{/*caja de contenido de los enlaces#BCBEDA*/
                background-color: yellow !important;
                display:none !important;
                position:absolute;
                width:400px !important;
                text-align: left !important;
                padding-left: -90px !important;
            }
            nav li ul li a{
                background-color: blue;
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
    </style>

    <?php  
        $variableip="II_Entrada";
    ?>
    <a class="enlace_desactivado" href="../index.php?V_1=<?php echo base64_encode($variableip);?>"><h1>horebi.com</h1></a>
    <label id="ComandoMenu" class="comandoMenu" style=" padding-bottom: 10%;" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
    <nav class="menuResponsive" id="MenuResponsive" >
        <ul>
            <li><a href="../index.php?V_1=<?php echo base64_encode($variableip);?>">Inicio</a></li>
            <li><a href="../vista/directorio_Comercial.php">Directorio comercial</a></li>
            <li><a href="../vista/directorio_Profesional.php">Directorio profesional</a></li>
            <li><a href="../vista/contactenos.php">Contacto</a></li>
            <li><a href="../vista/Afiliacion.php">Afiliacion</a></li>
            <li><a href="../vista/ingresar.php">Ingresar</a></li>
        </ul>
    </nav>   