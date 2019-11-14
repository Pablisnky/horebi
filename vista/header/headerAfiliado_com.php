<!--Encabezado de todas las páginas que estan dentro de la cuenta de usuario de un doctor-->

    <head>
        <link rel="stylesheet" type="text/css" href="../iconos/icono_menu/style_menu.css"/><!--galeria de icomoon.io--> 
    </head>
        <div class="header_01">
            <h1 class="header_02">horebi.com</h1>
        </div>
        <div class="header_03">
            <?php
            //Consulta para para colocar el nombre y apellido del comercio que abre sesión
            $consulta_1="SELECT Nombre_Comercio FROM afiliado_comercial WHERE ID_AfiliadoCom= '$sesion' ";
            $Recorset_1=mysqli_query($conexion,$consulta_1);
            $AfiliadoCom= mysqli_fetch_array($Recorset_1);  ?>
                     
            <input  class="usuarioAfiliado" readonly="readonly" type="text" name="NombreCom" value="<?php echo $AfiliadoCom['Nombre_Comercio'];?>">
        </div>

        
        <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
        <nav class="menuResponsive" id="MenuResponsive">
            <ul>
                <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                <li><a href="../muestra_tarjeta/configurarT_com.php">Tarjeta</a></li> 
                <li><a href="../mostrar_perfil/mostrar_Comercio.php">Ver perfil</a></li> 
                <li><a href="../configurar_perfil/perfil_comercio.php">Editar perfil</a></li> 
            </ul>        
        </nav>

