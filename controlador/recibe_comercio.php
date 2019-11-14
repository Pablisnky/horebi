<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php llamada AfiliadoCom

        //Se verifica si se realizó login para entrar en este archivo
        include("../modulos/VerificaAfiliado_comercio.php");
        //conexion a la BD
        include("../conexion/Conexion_BD.php");
        //Administra los errores del sistema e impide mostrarlos en remoto
        include("../modulos/muestraError.php");
    

    //se capturan todos los campos del formulario perfil_comercio.php Seccion datos persona responsable, se almacenará en la tabla afiliado_comercial
    $Nombre= $_POST['nombre'];
    $Apellido=$_POST['apellido'];
	$Cedula=$_POST['cedula'];
	$Telefono=$_POST['telefono'];
	$Correo=$_POST['correo']; 
    $Cargo=$_POST['cargo'];
    // echo "Nombre=" . $Nombre . "<br>";
    // echo "Apellido=" . $Apellido . "<br>";
    // echo "Cedula=" . $Cedula . "<br>";
    // echo "Telefono= " . $Telefono . "<br>";
    // echo "Correo=" . $Correo . "<br>";
    // echo "Cargo=" . $Cargo . "<br><br>";

    //Seccion datos estalecimiento comercial, se almacenará en la tabla afiliado_comercial
    $Nombre_Comercio=$_POST['nombre_Com'];
    $Rif_Comercio=$_POST['rif_Com'];
    $Telefono_Comercio=$_POST['telefono_Com'];
    $Correo_Comercio=$_POST['correo_Com'];
    $Categoria=$_POST['categoria_Com'];
    $Descripcion=$_POST['descripcion_1'];
    $Pais=$_POST['pais']; 
        if(!empty($_POST["provincia"])){
            $Region= $_POST["provincia"];
        }
        else if(!empty($_POST["provincia_BD"])){
            $Region= $_POST["provincia_BD"];
        }

        if(!empty($_POST["canton"])){
            $Sub_Region= $_POST["canton"];
        }
        else if(!empty($_POST["canton_BD"])){
            $Sub_Region= $_POST["canton_BD"];
        }

        if(!empty($_POST["departamento"])){
            $Region= $_POST["departamento"];
        } 
        else if(!empty($_POST["departamento_BD"])){
            $Region= $_POST["departamento_BD"];
        } 

        if(!empty($_POST["municipio_Col"])){
            $Sub_Region= $_POST["municipio_Col"];
        }   
        else if(!empty($_POST["municipioCol_BD"])){
            $Sub_Region= $_POST["municipioCol_BD"];
        }
        if(!empty($_POST["estado"])){
            $Region= $_POST["estado"];
        }
        else if(!empty($_POST["estado_BD"])){
            $Region= $_POST["estado_BD"];
        }
        if(!empty($_POST["municipio"])){
            $Sub_Region= $_POST["municipio"];
        }
        else if(!empty($_POST["municipio_BD"])){
            $Sub_Region= $_POST["municipio_BD"];
        }   
        if(empty($_POST['mostrarPerfil'])){
            $MostrarPerfil= 0;
        }
        else{
            $MostrarPerfil= $_POST["mostrarPerfil"];  
        }
    $Direccion= $_POST["direccion"];


//-------------------------------
    if(empty($_POST["descripcionEditCom"])){/*Es la descripcion de un producto especifico*/
        $DescripcionEditCom= $_POST["descripcionProCom"];
    }
    else if(empty($_POST["descripcionEditCom"])){

    }
    else{        
        $DescripcionEditCom= $_POST["descripcionProCom"];
    }
//-------------------------------


    if(empty($_POST["precioMayEditCom"])){
        $PrecioMayor= $_POST["precio_MayProCom"];
    }
    if(empty($_POST["precioMenEditCom"])){
        $PrecioMenor= $_POST["precio_MenProCom"];
    }

    // echo "Nombre del comercio= " . $Nombre_Comercio .  "<br>";
    // echo "Rif del comercio= " . $Rif_Comercio . "<br>";
    // echo "Telefono comercio= " . $Telefono_Comercio . "<br>";
    // echo "Correo comercio= " . $Correo_Comercio . "<br>";
    // echo "Categoria comercio= " . $Categoria . "<br>";
    // echo "Descripcion comercio= " . $Descripcion . "<br>";   
    // echo "Pais=" . $Pais . "<br>";
    // echo "Region del comerciante= " . $Region . "<br>";
    // echo "Sub Region del comerciante= " . $Sub_Region . "<br>";
    // echo "Mostrar en directorio= " . $MostrarPerfil . "<br><br>";
    // echo "Direccion del comerciante= " . $Direccion . "<br>";

// ---------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------
// SECCION LOGO
    //Seccion fotografia, se reciben los datos de la imagen de perfil
    $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $tipo = $_FILES['imagen']['type'];
    $tamaño = $_FILES['imagen']['size'];
        
    // echo "Nombre de la imagen = " . $nombre_img . "<br>";
    // echo "Tipo de archivo = " .$tipo .  "<br>";
    // echo "Tamaño = " . $tamaño . "<br>";
    // echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
    // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";
         
    //Si existe imagen y tiene un tamaño correcto
    if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
        //indicamos los formatos que permitimos subir a nuestro servidor
        if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                
            // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
            // La imagen se guarda en la carpeta de archivos de la aplicación, en la BD solo se guarda el nombre de la imagen.
            // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/Usuarios/'; //usar en remoto
            $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_6/images/Usuarios/'; //usar en local

            //se muestra el directorio temporal donde se guarda el archivo
            //echo $_FILES['imagen']['tmp_name'];
            // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);
        } 
        else{
            //si no cumple con el formato
            //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
        }
    } 
    else{
        //si existe la variable pero se pasa del tamaño permitido
       if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
    }

    //Para actualizar fotografia solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagen']['name']) != ""){
        $insertarImagen= "UPDATE afiliado_comercial SET logo_Comercio='$nombre_img' WHERE ID_AfiliadoCom= '$sesion' ";
    
        mysqli_query($conexion, $insertarImagen);
    }
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
    
    //Seccion servicios profesionales, se almacenará en la tabla servicios_comerciales
    $Servicio_1=$_POST["servicioUno"];
    $Servicio_2=$_POST["servicioDos"];

    // echo "Servicio 1= " . $Servicio_1 . "<br>";
    // echo "Servicio 2= " . $Servicio_2 . "<br>";

    //Seccion datos horarios de atencion al cliente, se almacenará en la tabla horarios
    $InicioMañana= $_POST["inicioMañana"];
    $CulminaMañana= $_POST['culminaMañana'];
    $LunesMañana= isset($_POST["lunes_mañana"]) == "lunes" ? $_POST['lunes_mañana'] : "";
    $MartesMañana= isset($_POST["martes_mañana"]) == "martes" ? $_POST['martes_mañana'] : "";
    $MiercolesMañana= isset($_POST["miercoles_mañana"]) == "miercoles" ? $_POST['miercoles_mañana'] : "";
    $JuevesMañana= isset($_POST["jueves_mañana"]) == "jueves" ? $_POST['jueves_mañana'] : "";
    $ViernesMañana= isset($_POST["viernes_mañana"]) == "viernes" ? $_POST['viernes_mañana'] : "";
    $SabadoMañana= isset($_POST["sabado_mañana"]) == "sabado" ? $_POST['sabado_mañana'] : "";
    $DomingoMañana= isset($_POST["domingo_mañana"]) == "domingo" ? $_POST['domingo_mañana'] : "";

    $IniciaTarde=$_POST["iniciaTarde"];
    $CulminaTarde=$_POST["culminaTarde"];
    $LunesTarde= isset($_POST["lunes_tarde"]) == "lunes" ? $_POST['lunes_tarde'] : "";
    $MartesTarde= isset($_POST["martes_tarde"]) == "martes" ? $_POST['martes_tarde'] : "";
    $MiercolesTarde= isset($_POST["miercoles_tarde"]) == "miercoles" ? $_POST['miercoles_tarde'] : "";
    $JuevesTarde= isset($_POST["jueves_tarde"]) == "jueves" ? $_POST['jueves_tarde'] : "";
    $ViernesTarde= isset($_POST["viernes_tarde"]) == "viernes" ? $_POST['viernes_tarde'] : "";
    $SabadoTarde= isset($_POST["sabado_tarde"]) == "sabado" ? $_POST['sabado_tarde'] : "";
    $DomingoTarde= isset($_POST["domingo_tarde"]) == "domingo" ? $_POST['domingo_tarde'] : "";

    $InicioMañanaEsp_1= $_POST["inicioMañanaEsp_1"];
    $CulminaMañanaEsp_1= $_POST['culminaMañanaEsp_1'];
    $LunesMañanaEsp_1= isset($_POST["lunes_mañanaEsp_1"]) == "lunes" ? $_POST['lunes_mañanaEsp_1'] : "";
    $MartesMañanaEsp_1= isset($_POST["martes_mañanaEsp_1"]) == "martes" ? $_POST['martes_mañanaEsp_1'] : "";
    $MiercolesMañanaEsp_1= isset($_POST["miercoles_mañanaEsp_1"]) == "miercoles" ? $_POST['miercoles_mañanaEsp_1'] : "";
    $JuevesMañanaEsp_1= isset($_POST["jueves_mañanaEsp_1"]) == "jueves" ? $_POST['jueves_mañanaEsp_1'] : "";
    $ViernesMañanaEsp_1= isset($_POST["viernes_mañanaEsp_1"]) == "viernes" ? $_POST['viernes_mañanaEsp_1'] : "";
    $SabadoMañanaEsp_1= isset($_POST["sabado_mañanaEsp_1"]) == "sabado" ? $_POST['sabado_mañanaEsp_1'] : "";
    $DomingoMañanaEsp_1= isset($_POST["domingo_mañanaEsp_1"]) == "domingo" ? $_POST['domingo_mañanaEsp_1'] : "";

    $IniciaTardeEsp_1=$_POST["iniciaTardeEsp_1"];
    $CulminaTardeEsp_1=$_POST["culminaTardeEsp_1"];
    $LunesTardeEsp_1= isset($_POST["lunes_tardeEsp_1"]) == "lunes" ? $_POST['lunes_tardeEsp_1'] : "";
    $MartesTardeEsp_1= isset($_POST["martes_tardeEsp_1"]) == "martes" ? $_POST['martes_tardeEsp_1'] : "";
    $MiercolesTardeEsp_1= isset($_POST["miercoles_tardeEsp_1"]) == "miercoles" ? $_POST['miercoles_tardeEsp_1'] : "";
    $JuevesTardeEsp_1= isset($_POST["jueves_tardeEsp_1"]) == "jueves" ? $_POST['jueves_tardeEsp_1'] : "";
    $ViernesTardeEsp_1= isset($_POST["viernes_tardeEsp_1"]) == "viernes" ? $_POST['viernes_tardeEsp_1'] : "";
    $SabadoTardeEsp_1= isset($_POST["sabado_tardeEsp_1"]) == "sabado" ? $_POST['sabado_tardeEsp_1'] : "";
    $DomingoTardeEsp_1= isset($_POST["domingo_tardeEsp_1"]) == "domingo" ? $_POST['domingo_tardeEsp_1'] : "";

    $InicioMañanaEsp_2= $_POST["iniciaMañanaEsp_2"];
    $CulminaMañanaEsp_2= $_POST['culminaMañanaEsp_2'];
    $LunesMañanaEsp_2= isset($_POST["lunes_mañanaEsp_2"]) == "lunes" ? $_POST['lunes_mañanaEsp_2'] : "";
    $MartesMañanaEsp_2= isset($_POST["martes_mañanaEsp_2"]) == "martes" ? $_POST['martes_mañanaEsp_2'] : "";
    $MiercolesMañanaEsp_2= isset($_POST["miercoles_mañanaEsp_2"]) == "miercoles" ? $_POST['miercoles_mañanaEsp_2'] : "";
    $JuevesMañanaEsp_2= isset($_POST["jueves_mañanaEsp_2"]) == "jueves" ? $_POST['jueves_mañanaEsp_2'] : "";
    $ViernesMañanaEsp_2= isset($_POST["viernes_mañanaEsp_2"]) == "viernes" ? $_POST['viernes_mañanaEsp_2'] : "";
    $SabadoMañanaEsp_2= isset($_POST["sabado_mañanaEsp_2"]) == "sabado" ? $_POST['sabado_mañanaEsp_2'] : "";
    $DomingoMañanaEsp_2= isset($_POST["domingo_mañanaEsp_2"]) == "domingo" ? $_POST['domingo_mañanaEsp_2'] : "";

    $IniciaTardeEsp_2=$_POST["iniciaTardeEsp_2"];
    $CulminaTardeEsp_2=$_POST["culminaTardeEsp_2"];
    $LunesTardeEsp_2= isset($_POST["lunes_tardeEsp_2"]) == "lunes" ? $_POST['lunes_tardeEsp_2'] : "";
    $MartesTardeEsp_2= isset($_POST["martes_tardeEsp_2"]) == "martes" ? $_POST['martes_tardeEsp_2'] : "";
    $MiercolesTardeEsp_2= isset($_POST["miercoles_tardeEsp_2"]) == "miercoles" ? $_POST['miercoles_tardeEsp_2'] : "";
    $JuevesTardeEsp_2= isset($_POST["jueves_tardeEsp_2"]) == "jueves" ? $_POST['jueves_tardeEsp_2'] : "";
    $ViernesTardeEsp_2= isset($_POST["viernes_tardeEsp_2"]) == "viernes" ? $_POST['viernes_tardeEsp_2'] : "";
    $SabadoTardeEsp_2= isset($_POST["sabado_tardeEsp_2"]) == "sabado" ? $_POST['sabado_tardeEsp_2'] : "";
    $DomingoTardeEsp_2= isset($_POST["domingo_tardeEsp_2"]) == "domingo" ? $_POST['domingo_tardeEsp_2'] : "";
    // echo "Inicio mañana= " . $InicioMañana . "<br>";
    // echo "Culmina mañana= " . $CulminaMañana . "<br>";
    // echo "Lunes mañana= " . $LunesMañana . "<br>";
    // echo "Martes mañana= " . $MartesMañana . "<br>";
    // echo "Miercoles mañana= " . $MiercolesMañana . "<br>";
    // echo "Jueves mañana= " . $JuevesMañana . "<br>";
    // echo "Viernes mañana= " . $ViernesMañana . "<br>";
    // echo "Sabado mañana= " . $SabadoMañana . "<br>";
    // echo "Domingo mañana= " . $DomingoMañana . "<br>";
    // echo "Inicio tarde= " . $IniciaTarde . "<br>";
    // echo "Culmina tarde= " . $CulminaTarde . "<br>";
    // echo "Lunes tarde= " . $LunesTarde . "<br>";
    // echo "Martes tarde= " . $MartesTarde . "<br>";
    // echo "Miercoles tarde= " . $MiercolesTarde . "<br>";
    // echo "Jueves tarde= " . $JuevesTarde . "<br>";
    // echo "Viernes tarde= " . $ViernesTarde . "<br>";
    // echo "Sabado tarde= " . $SabadoTarde . "<br>"; 
    // echo "Domingo tarde= " . $DomingoTarde . "<br>";


    // echo "Inicio mañanaEsp_1= " . $InicioMañanaEsp_1 . "<br>";
    // echo "Culmina mañanaEsp_1= " . $CulminaMañanaEsp_1 . "<br>";
    // echo "Lunes mañanaEsp_1= " . $LunesMañanaEsp_1 . "<br>";
    // echo "Martes mañanaEsp_1= " . $MartesMañanaEsp_1 . "<br>";
    // echo "Miercoles mañanaEsp_1= " . $MiercolesMañanaEsp_1 . "<br>";
    // echo "Jueves mañanaEsp_1= " . $JuevesMañanaEsp_1 . "<br>";
    // echo "Viernes mañanaEsp_1= " . $ViernesMañanaEsp_1 . "<br>";
    // echo "Sabado mañanaEsp_1= " . $SabadoMañanaEsp_1 . "<br>";
    // echo "Domingo mañanaEsp_1= " . $DomingoMañanaEsp_1 . "<br>";
    // echo "Inicio tardeEsp_1= " . $IniciaTardeEsp_1 . "<br>";
    // echo "Culmina tardeEsp_1= " . $CulminaTardeEsp_1 . "<br>";
    // echo "Lunes tardeEsp_1= " . $LunesTardeEsp_1 . "<br>";
    // echo "Martes tardeEsp_1= " . $MartesTardeEsp_1 . "<br>";
    // echo "Miercoles tardeEsp_1= " . $MiercolesTardeEsp_1 . "<br>";
    // echo "Jueves tardeEsp_1= " . $JuevesTardeEsp_1 . "<br>";
    // echo "Viernes tardeEsp_1= " . $ViernesTardeEsp_1 . "<br>";
    // echo "Sabado tardeEsp_1= " . $SabadoTardeEsp_1 . "<br>"; 
    // echo "Domingo tardeEsp_1= " . $DomingoTardeEsp_1 . "<br>";


    // echo "Inicio mañanaEsp_2= " . $InicioMañanaEsp_2 . "<br>";
    // echo "Culmina mañanaEsp_2= " . $CulminaMañanaEsp_2 . "<br>";
    // echo "Lunes mañanaEsp_2= " . $LunesMañanaEsp_2 . "<br>";
    // echo "Martes mañanaEsp_2= " . $MartesMañanaEsp_2 . "<br>";
    // echo "Miercoles mañanaEsp_2= " . $MiercolesMañanaEsp_2 . "<br>";
    // echo "Jueves mañanaEsp_2= " . $JuevesMañanaEsp_2 . "<br>";
    // echo "Viernes mañanaEsp_2= " . $ViernesMañanaEsp_2 . "<br>";
    // echo "Sabado mañanaEsp_2= " . $SabadoMañanaEsp_2 . "<br>";
    // echo "Domingo mañanaEsp_2= " . $DomingoMañanaEsp_2 . "<br>";
    // echo "Inicio tardeEsp_2= " . $IniciaTardeEsp_2 . "<br>";
    // echo "Culmina tardeEsp_2= " . $CulminaTardeEsp_2 . "<br>";
    // echo "Lunes tardeEsp_2= " . $LunesTardeEsp_2 . "<br>";
    // echo "Martes tardeEsp_2= " . $MartesTardeEsp_2 . "<br>";
    // echo "Miercoles tardeEsp_2= " . $MiercolesTardeEsp_2 . "<br>";
    // echo "Jueves tardeEsp_2= " . $JuevesTardeEsp_2 . "<br>";
    // echo "Viernes tardeEsp_2= " . $ViernesTardeEsp_2 . "<br>";
    // echo "Sabado tardeEsp_2= " . $SabadoTardeEsp_2 . "<br>"; 
    // echo "Domingo tardeEsp_2= " . $DomingoTardeEsp_2 . "<br>";
/*
    //seccion cambio de contraseña, se almacenará en la tabla usuario_doctor
    $ValorA= $_POST["valorA"];
    $ValorB= $_POST["valorB"];
    //se cifran los valores A y B con un algoritmo de encriptación
    //$ValorA_Cifrado= password_hash($ValorA,PASSWORD_DEFAULT);
    //$ValorB_Cifrado= password_hash($ValorB,PASSWORD_DEFAULT);
*/

//Datos para almacenar en la tabla horarios
    $insertar3="UPDATE horarios SET inicio_mañana= '$InicioMañana', culmina_mañana= '$CulminaMañana', lunes_mañana= '$LunesMañana', martes_mañana= '$MartesMañana', miercoles_mañana= '$MiercolesMañana', jueves_mañana= '$JuevesMañana', viernes_mañana= '$ViernesMañana', sabado_mañana= '$SabadoMañana', domingo_mañana= '$DomingoMañana', inicia_tarde= '$IniciaTarde', culmina_tarde= '$CulminaTarde', lunes_tarde= '$LunesTarde', martes_tarde= '$MartesTarde', miercoles_tarde= '$MiercolesTarde', jueves_tarde= '$JuevesTarde', viernes_tarde= '$ViernesTarde', sabado_tarde= '$SabadoTarde', domingo_tarde= '$DomingoTarde', inicia_mañanaEsp_1= '$InicioMañanaEsp_1', culmina_mañanaEsp_1= '$CulminaMañanaEsp_1', lunes_mañanaEsp_1= '$LunesMañanaEsp_1', martes_mañanaEsp_1= '$MartesMañanaEsp_1', miercoles_mañanaEsp_1= '$MiercolesMañanaEsp_1', jueves_mañanaEsp_1= '$JuevesMañanaEsp_1', viernes_mañanaEsp_1= '$ViernesMañanaEsp_1', sabado_mañanaEsp_1= '$SabadoMañanaEsp_1', domingo_mañanaEsp_1= '$DomingoMañanaEsp_1', inicia_tardeEsp_1= '$IniciaTardeEsp_1', culmina_tardeEsp_1= '$CulminaTardeEsp_1', lunes_tardeEsp_1= '$LunesTardeEsp_1', martes_tardeEsp_1= '$MartesTardeEsp_1', miercoles_tardeEsp_1= '$MiercolesTardeEsp_1', jueves_tardeEsp_1= '$JuevesTardeEsp_1', viernes_tardeEsp_1= '$ViernesTardeEsp_1', sabado_tardeEsp_1= '$SabadoTardeEsp_1', domingo_tardeEsp_1= '$DomingoTardeEsp_1', inicia_mañanaEsp_2= '$InicioMañanaEsp_2', culmina_mañanaEsp_2= '$CulminaMañanaEsp_2', lunes_mañanaEsp_2= '$LunesMañanaEsp_2', martes_mañanaEsp_2= '$MartesMañanaEsp_2', miercoles_mañanaEsp_2= '$MiercolesMañanaEsp_2', jueves_mañanaEsp_2= '$JuevesMañanaEsp_2', viernes_mañanaEsp_2= '$ViernesMañanaEsp_2', sabado_mañanaEsp_2= '$SabadoMañanaEsp_2', domingo_mañanaEsp_2= '$DomingoMañanaEsp_2', inicia_tardeEsp_2= '$IniciaTardeEsp_2', culmina_tardeEsp_2= '$CulminaTardeEsp_2', lunes_tardeEsp_2= '$LunesTardeEsp_2', martes_tardeEsp_2= '$MartesTardeEsp_2', miercoles_tardeEsp_2= '$MiercolesTardeEsp_2', jueves_tardeEsp_2= '$JuevesTardeEsp_2', viernes_tardeEsp_2= '$ViernesTardeEsp_2', sabado_tardeEsp_2= '$SabadoTardeEsp_2', domingo_tardeEsp_2= '$DomingoTardeEsp_2' WHERE ID_Afiliado= '$sesion'";
    mysqli_query($conexion,$insertar3);

//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------

    //insercion de los datos capturados del formulario en la base de datos 
    //Datos para almacenar en la tabla afiliado_comercial
    $actualizar1= "UPDATE afiliado_comercial SET Nombre_Comercio= '$Nombre_Comercio', RIF= '$Rif_Comercio', Telefono_Comercio= '$Telefono_Comercio', Correo_Electronico_Comercio= '$Correo_Comercio', ID_Categoria= '$Categoria', descripcion_Comercio= '$Descripcion', Nombre= '$Nombre', Apellido= '$Apellido', Cedula= '$Cedula', Telefono= '$Telefono', Correo_Electronico= '$Correo', Cargo= '$Cargo', Pais_Comercio= '$Pais', Region_Comercio= '$Region', SubRegion_Comercio= '$Sub_Region', direccion_Comercio= '$Direccion', mostrar= '$MostrarPerfil' WHERE ID_AfiliadoCom= '$sesion'";
    mysqli_query($conexion, $actualizar1);

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
// SECCION IMAGENES DE SLIDER  
   //Recibo los datos de la imagen
    $Slider_1 = $_FILES['imagenSlider_A']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Slider_1_tipo = $_FILES['imagenSlider_A']['type'];
    $Slider_1_tamaño = $_FILES['imagenSlider_A']['size'];
        
        // echo "Nombre de la imagen = " . $Slider_1 . "<br>";
        // echo "Tipo de archivo = " . $Slider_1_tipo .  "<br>";
        // echo "Tamaño = " . $Slider_1_tamaño . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Slider_1 == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagenSlider_A"]["type"] == "image/gif") || ($_FILES["imagenSlider_A"]["type"] == "image/jpeg")
                || ($_FILES["imagenSlider_A"]["type"] == "image/jpg") || ($_FILES["imagenSlider_A"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                // $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/images/Usuarios/';//usar en remoto
                $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_6/images/Usuarios/';//usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagenSlider_A']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagenSlider_A']['tmp_name'], $directorio_5 . $Slider_1);

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        // else{
        //    //si existe la variable pero se pasa del tamaño permitido
        //    if($Slider_1 == NULL) echo "La imagen es demasiado grande"; 
        // }

        //Se introducen en la BD las fotografias de la galeria y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagenSlider_A']['name']) != ""){
        $Insertar= "INSERT INTO imagenes_comercial(ID_AfiliadoCom, imagen_Slider, tamaño_imagen, tipo_imagen) VALUES ('$sesion','$Slider_1','$Slider_1_tamaño','$Slider_1_tipo')";
        mysqli_query($conexion, $Insertar);
    }
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
// SECCION GALERIA DE PRODUCCTOS
    $Galeria_Com = $_FILES['producto_com']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Gal_1_tipoCom = $_FILES['producto_com']['type'];
    $Gal_1_tamañoCom = $_FILES['producto_com']['size'];
        
        // echo "Nombre de la imagen = " . $Galeria_Com . "<br>";
        // echo "Tipo de archivo = " . $Gal_1_tipoCom .  "<br>";
        // echo "Tamaño = " . $Gal_1_tamañoCom . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Galeria_Com == !NULL) && ($_FILES['producto_com']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["producto_com"]["type"] == "image/gif") || ($_FILES["producto_com"]["type"] == "image/jpeg")
                || ($_FILES["producto_com"]["type"] == "image/jpg") || ($_FILES["producto_com"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                // $directorio_Com = $_SERVER['DOCUMENT_ROOT'] . '/images/Usuarios/';//usar en remoto
                $directorio_Com = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_6/images/Usuarios/';//usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['producto_com']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['producto_com']['tmp_name'], $directorio_Com . $Galeria_Com);

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($Galeria_Com == !NULL) echo "La imagen es demasiado grande"; 
        }

        //Se introducen en la BD las fotografias de la galeria de productos o servicios y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['producto_com']['name']) != ""){
        $Insertar_2= "INSERT INTO galeria(ID_Afiliado, galeria_1, espacio, tipoArchivo, descripcion, precio_Mayor, precio_Menor) VALUES ('$sesion','$Galeria_Com','$Gal_1_tamañoCom','$Gal_1_tipoCom','$DescripcionEditCom','$PrecioMayor','$PrecioMenor')";
        mysqli_query($conexion, $Insertar_2);
    }
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

/*
//Datos para almacenar en la tabla direcciones
    $insertar2= "UPDATE direcciones SET direccion= '$Direccion', clinica= '$Clinica', consultorio= '$Consultorio' WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar2);
*/

//Datos para almacenar en la tabla perfil_afiliado
    $Actualizar_4= "UPDATE servicios_comerciales SET servicio_1= '$Servicio_1', servicio_2= '$Servicio_2' WHERE ID_AfiliadoCom= '$sesion' ";
    mysqli_query($conexion,$Actualizar_4);

 //--------------------------------------------------------------------------------------------------------------------------
 //--------------------------------------------------------------------------------------------------------------------------

    header("location: ../vista/tarjeta/mostrar_perfil/mostrar_Comercio.php"); 
?>