<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["Afiliado"];//aqui se almacena el ID_Afiliado en la variable $sesion
    // echo $sesion . "<br>";

    //conexion a la BD
    include("../conexion/Conexion_BD.php");

    //se capturan todos los campos del formulario perfil_tatto.php Seccion datos personales, se almacenará en la tabla afiliados
    $Nombre= $_POST['nombre'];
    $Apellido=$_POST['apellido'];
	$Cedula=$_POST['cedula'];
	$TelefonoMovil=$_POST['telefonoMovil'];
    $Profesion=$_POST['profesion_Afi'];  
    if(!empty($_POST['profesion_Afi_2'])){ 
        $Profesion_2=$_POST['profesion_Afi_2'];
    }
    else{ 
        $Profesion_2="no especificó";
    }
	$Correo=$_POST['correo']; 
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
    $Direccion= $_POST["direccion"];
    $Descripcion= $_POST["descripcion_2"];

        if(empty($_POST['mostrarPerfil'])){
            $MostrarPerfil= 0;
        }
        else{
            $MostrarPerfil= $_POST["mostrarPerfil"];  
        }

    $DescripcionTat= $_POST["descripcionTat"];
    $PrecioTat= $_POST["precioTat"];
    // echo "Nombre=" . $Nombre . "<br>";
    // echo "Apellido=" . $Apellido . "<br>";
    // echo "Cedula=" . $Cedula . "<br>";
    // echo "Telefono movil= " . $TelefonoMovil . "<br>";
    // echo "Profesión= " . $Profesion . "<br>";
    // echo "Profesión_2= " . $Profesion_2 . "<br>";
    // echo "Correo=" . $Correo . "<br>";
    // echo "Pais=" . $Pais . "<br>";
    // echo "Region= " . $Region . "<br>";
    // echo "Sub Region= " . $Sub_Region . "<br>";
    // echo "Direccion= " . $Direccion . "<br>";
    // echo "Descripcion= " . $Descripcion . "<br>";
    // echo "Mostrar perfil= " . $MostrarPerfil . "<br>";
    // echo "Descripcion= " . $DescripcionTat . "<br>";
    // echo "Precio= " . $PrecioTat . "<br><br>";
    
    //Seccion servicios profesionales, se almacenará en la tabla perfil_afiliado
    $ServicioProf_Uno=$_POST["servicioProf_Uno"];
    $ServicioProf_Dos=$_POST["servicioProf_Dos"];
/*
    // echo "Perfil= " . $TextoPerfil . "<br>";
    //echo "Servicio 1= " . $Servicio_1 . "<br>";
    //echo "Servicio 2= " . $Servicio_2 . "<br>";
    //echo "Servicio 3= " . $Servicio_3 . "<br>";
    //echo "Servicio 4= " . $Servicio_4 . "<br>";
    //echo "Servicio 5= " . $Servicio_5 . "<br>";
    //echo "Servicio 6= " . $Servicio_6 . "<br>";
    //echo "Servicio 7= " . $Servicio_7 . "<br>";
    //echo "Servicio 8= " . $Servicio_8 . "<br>";
    //echo "Servicio 9= " . $Servicio_9 . "<br>";
    //echo "Servicio 10= " . $Servicio_10 . "<br>";


    //seccion cambio de contraseña, se almacenará en la tabla usuario_doctor
    $ValorA= $_POST["valorA"];
    $ValorB= $_POST["valorB"];
    //se cifran los valores A y B con un algoritmo de encriptación
    //$ValorA_Cifrado= password_hash($ValorA,PASSWORD_DEFAULT);
    //$ValorB_Cifrado= password_hash($ValorB,PASSWORD_DEFAULT);

*/
// ---------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------
// SECCION FOTOGRAFIA PERFIL
    //Seccion fotografia
    //Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $tipo = $_FILES['imagen']['type'];
    $tamaño = $_FILES['imagen']['size'];
        
        //echo "Nombre de la imagen = " . $nombre_img . "<br>";
        //echo "Tipo de archivo = " .$tipo .  "<br>";
        //echo "Tamaño = " . $tamaño . "<br>";
        //echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        //echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
         
        //Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/'; //usar en remoto
                // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_5/images/'; //usar en local

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
        $insertarImagen= "UPDATE afiliados SET fotografia='$nombre_img' WHERE ID_Afiliado= '$sesion' ";
    }
    mysqli_query($conexion,$insertarImagen);
//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------
// SECCION GALERIA DE TATUAJES
    $Galeria_Tat = $_FILES['tatuaje_1']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Gal_1_tipoTat = $_FILES['tatuaje_1']['type'];
    $Gal_1_tamañoTat = $_FILES['tatuaje_1']['size'];
        
        // echo "Nombre de la imagen = " . $Galeria_Tat . "<br>";
        // echo "Tipo de archivo = " . $Gal_1_tipoTat .  "<br>";
        // echo "Tamaño = " . $Gal_1_tamañoTat . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Galeria_Tat == !NULL) && ($_FILES['tatuaje_1']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["tatuaje_1"]["type"] == "image/gif") || ($_FILES["tatuaje_1"]["type"] == "image/jpeg")
                || ($_FILES["tatuaje_1"]["type"] == "image/jpg") || ($_FILES["tatuaje_1"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                $directorio_Tat = $_SERVER['DOCUMENT_ROOT'] . '/images/';//usar en remoto
                // $directorio_Tat = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_5/images/'; //usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['tatuaje_1']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['tatuaje_1']['tmp_name'], $directorio_Tat . $Galeria_Tat);

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($Galeria_Tat == !NULL) echo "La imagen es demasiado grande"; 
        }

        //Se introducen en la BD las fotografias de la galeria de productos o servicios y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['tatuaje_1']['name']) != ""){
        $Insertar_2= "INSERT INTO galeria(ID_Afiliado, galeria_1, espacio, tipoArchivo, descripcion, precio_Mayor) VALUES ('$sesion','$Galeria_Tat','$Gal_1_tamañoTat','$Gal_1_tipoTat','$DescripcionTat','$PrecioTat')";
        mysqli_query($conexion, $Insertar_2);
    }
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
// SECCION SLIDER 
    $Galeria_Tat_Sli = $_FILES['imagenSlider_Tat']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Gal_1_tipoTat_Sli  = $_FILES['imagenSlider_Tat']['type'];
    $Gal_1_tamañoTat_Sli  = $_FILES['imagenSlider_Tat']['size'];
        
        // echo "Nombre de la imagen = " . $Galeria_Tat_Sli  . "<br>";
        // echo "Tipo de archivo = " . $Gal_1_tipoTat_Sli  .  "<br>";
        // echo "Tamaño = " . $Gal_1_tamañoTat_Sli  . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Galeria_Tat == !NULL) && ($_FILES['imagenSlider_Tat']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagenSlider_Tat"]["type"] == "image/gif") || ($_FILES["imagenSlider_Tat"]["type"] == "image/jpeg")
                || ($_FILES["imagenSlider_Tat"]["type"] == "image/jpg") || ($_FILES["imagenSlider_Tat"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                $directorio_Tat_Sli  = $_SERVER['DOCUMENT_ROOT'] . '/images/';//usar en remoto
                // $directorio_Tat_Sli  = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_5/images/'; //usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagenSlider_Tat']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagenSlider_Tat']['tmp_name'], $directorio_Tat_Sli  . $Galeria_Tat_Sli );

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($Galeria_Tat_Sli  == !NULL) echo "La imagen es demasiado grande"; 
        }

        //Se introducen en la BD las fotografias de la galeria de productos o servicios y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagenSlider_Tat']['name']) != ""){
        $Insertar_2= "INSERT INTO imagenes(ID_Afiliado, imagen_slider, tamaño_imagen, tipo_imagen) VALUES ('$sesion','$Galeria_Tat_Sli ','$Gal_1_tamañoTat_Sli ','$Gal_1_tipoTat_Sli')";
        mysqli_query($conexion, $Insertar_2);
    }
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla doctores
   $actualizar1= "UPDATE afiliados SET nombre_Afi= '$Nombre', apellido_Afi= '$Apellido', cedula_Afi= '$Cedula', telefono_Afi= '$TelefonoMovil', correo_Afi= '$Correo', profesion_Afi= '$Profesion', profesion_Afi_2= '$Profesion_2', descripcion_Producto='$Descripcion', pais_Afi= '$Pais', region_Afi= '$Region', subRegion_Afi= '$Sub_Region', direccion_Afi='$Direccion',  mostrar= '$MostrarPerfil' WHERE ID_Afiliado= '$sesion'";
    mysqli_query($conexion,$actualizar1);

/*
//Datos para almacenar en la tabla direcciones
    $insertar2= "UPDATE direcciones SET direccion= '$Direccion', clinica= '$Clinica', consultorio= '$Consultorio' WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar2);
*/

//Datos para almacenar en la tabla servicios_profesionales
    $insertar4= "UPDATE servicios_profesionales SET servicioProf_1= '$ServicioProf_Uno', servicioProf_2= '$ServicioProf_Dos' WHERE ID_Afiliado= '$sesion' ";
    mysqli_query($conexion,$insertar4);

 //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: ../vista/tarjeta/mostrar_perfil/mostrar_Tatto.php"); 
?>