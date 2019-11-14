<!--Encabezado de todas las páginas que estan dentro de la cuenta de usuario de un afiliado-->

<?php
    // se busca que categoria de profesion tiene el afiliado.
    $Consulta= "SELECT * FROM afiliados INNER JOIN categoria ON afiliados.ID_Categoria=categoria.ID_Categoria WHERE afiliados.ID_Afiliado= '$sesion'";
    $Recordset= mysqli_query($conexion, $Consulta);
    $CategoriaAfiliado= mysqli_fetch_array($Recordset);
    $PlanAfiliado= $CategoriaAfiliado["nombre_categoria"]; 
    // echo "La categoria de afiliado es: " . $PlanAfiliado . "<br>";
    // echo "El ID_Afiliado es= " . $sesion . "<br>";
    switch($PlanAfiliado){
        case 'Arquitecto':
            $Categoria= "Arq";
        break;
        case 'Ingeniero civil':
            $Categoria= "Ing";
        break;
        case 'Comerciante':
            $Categoria= "Com";
        break;
        case 'Ingeniero mecánico':
            $Categoria= "Ing";
        break;
        case 'Tatuador':
            $Categoria= "Tat";
        break;
        case 'Tienda':
            $Categoria= "Tie";
        break;
        case 'Médico veterinario':
            $Categoria= "Med_Vet";
        break;
        case 'Programador páginas web':
            $Categoria= "Pro_Pag_Web";
        break;
        case 'Técnico control equipos informáticos':
            $Categoria= "Tec_Equ_Infor";
        break;
        }
?>
        <div class="header_01">
            <h1 class="header_02">horebi.com</h1>
        </div>
        <div class="header_03">
            <?php
            //Consulta para para colocar el nombre y apellido del afiliado que abre sesión
                $consulta_1="SELECT nombre_Afi, apellido_Afi FROM afiliados WHERE ID_Afiliado= '$sesion' ";
                $Recorset_1=mysqli_query($conexion,$consulta_1);
                $Afiliado= mysqli_fetch_array($Recorset_1);  ?>
                     
                <input  class="usuarioAfiliado" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Afiliado['nombre_Afi'] . ' ' . $Afiliado['apellido_Afi'] ;?>">
        </div>
        <?php
        if($Categoria == "Ing" || $Categoria == "Arq" || $Categoria =="Pro_Pag_Web" || $Categoria =="Tec_Equ_Infor"){ ?>
            <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
            <nav class="menuResponsive" id="MenuResponsive">
            	<ul>
                    <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                    <li class="listaOculta" ><a href="../muestra_tarjeta/configurarT.php">Tarjeta</a></li> 
                    <li class="listaOculta" ><a href="../mostrar_perfil/mostrar_Ingeniero.php">Ver perfil</a></li> 
                    <li class="listaOculta" ><a href="../configurar_perfil/perfil_ingeniero.php">Editar perfil</a></li> 
                </ul>        
            </nav>  <?php
        } 
        else if($Categoria == "Tat"){ ?>
            <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
            <nav class="menuResponsive" id="MenuResponsive">
                <ul>
                    <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                    <li class="listaOculta" ><a href="../muestra_tarjeta/configurarT.php">Tarjeta</a></li> 
                    <li class="listaOculta" ><a href="../mostrar_perfil/mostrar_tatto.php">Ver perfil</a></li> 
                    <li class="listaOculta" ><a href="../configurar_perfil/perfil_tatto.php">Editar perfil</a></li> 
                </ul>        
            </nav>  <?php
        } 
        else if($Categoria == "Dam"){ ?>
            <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
            <nav class="menuResponsive" id="MenuResponsive">
                <ul>
                    <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                    <li class="listaOculta" ><a href="../muestra_tarjeta/configurarT.php">Tarjeta</a></li> 
                    <li class="listaOculta" ><a href="../mostrar_perfil/mostrar_DamaCompania.php">Ver perfil</a></li> 
                    <li class="listaOculta" ><a href="../configurar_perfil/perfil_damaComp.php">Editar perfil</a></li> 
                </ul>        
            </nav>  <?php
        } 
        else if($Categoria == "Med_Vet"){ ?>
            <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
            <nav class="menuResponsive" id="MenuResponsive">
                <ul>
                    <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                    <li class="listaOculta" ><a href="../muestra_tarjeta/configurarT.php">Tarjeta</a></li> 
                    <li class="listaOculta" ><a href="../mostrar_perfil/mostrar_medico.php">Ver perfil</a></li> 
                    <li class="listaOculta" ><a href="../configurar_perfil/perfil_medico.php">Editar perfil</a></li> 
                </ul>        
            </nav>  <?php
        } 
        else if($Categoria == "Com"){ ?>
            <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
            <nav class="menuResponsive" id="MenuResponsive">
                <ul>
                    <li><a href="../../../controlador/CerrarSesion.php">Cerrar Sesión</a></li> 
                    <li class="listaOculta" ><a href="../muestra_tarjeta/configurarT.php">Tarjeta</a></li> 
                    <li class="listaOculta" ><a href="../mostrar_perfil/mostrar_comerciante.php">Ver perfil</a></li> 
                    <li class="listaOculta" ><a href="../configurar_perfil/perfil_comerciante.php">Editar perfil</a></li> 
                </ul>        
            </nav>  <?php
        }
        else{
            echo "No hay profesión asignada";
        } 

