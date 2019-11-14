<?php
    //Muestra los errore en local e impide mostrarlos en remoto
    include("../Clases/muestraError.php");
    //conexion a la BD
    include("../conexion/Conexion_BD.php");

    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["Afiliado"];//aqui se almacena el ID_Afiliado en la variable $sesion
    // echo $sesion . "<br>";

    //se capturan todos los campos del formulario perfil_ingeniero.php

    //Seccion datos personales, se almacenará en la tabla afiliados
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
    $Categoria= $_POST["categoria"];
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

        if(empty($_POST['mostrarPerfil'])){
            $MostrarPerfil= 0;
        }
        else{
            $MostrarPerfil= $_POST["mostrarPerfil"];  
        }
    $Descripcion_2= $_POST["descripcion_2"];/*Es la descripcion en general de lo que se decica,lo que vende*/

    if(empty($Descripcion= $_POST["descripcionEdit"])){/*Es la descripcion de un producto especifico*/
        $Descripcion= $_POST["descripcionPro"];
    }
    if(empty($PrecioMayor= $_POST["precioMayEdit"])){
        $PrecioMayor= $_POST["precio_MayPro"];
    }
    if(empty($PrecioMenor= $_POST["precioMenEdit"])){
        $PrecioMenor= $_POST["precio_MenPro"];
    }
    // echo "Nombre=" . $Nombre . "<br>";
    // echo "Apellido=" . $Apellido . "<br>";
    // echo "Cedula=" . $Cedula . "<br>";
    // echo "Telefono movil= " . $TelefonoMovil . "<br>";
    // echo "Profesión= " . $Profesion . "<br>";
    // echo "Profesión_2= " . $Profesion_2 . "<br>";
    // echo "Categoria= " . $Categoria . "<br>";
    // echo "Correo=" . $Correo . "<br>";
    // echo "Pais=" . $Pais . "<br>";
    // echo "Region= " . $Region . "<br>";
    // echo "Sub Region= " . $Sub_Region . "<br>";
    // echo "Mostrar perfil= " . $MostrarPerfil . "<br><br>";
    // echo "La descripcion del producto es= " . $Descripcion . "<br>";
    // echo "Precio al mayor= " . $PrecioMayor . "<br>";
    // echo "Precio al menor= " . $PrecioMenor . "<br>";

    //Seccion servicios profesionales, se almacenará en la tabla perfil_afiliado
    $TextoPerfil=$_POST["textoPerfil"];
    $Servicio_1=$_POST["servicioUno"];
    $Servicio_2=$_POST["servicioDos"];
    $Servicio_3=$_POST["servicioTres"];
    $Servicio_4=$_POST["servicioCuatro"];
    $Servicio_5=$_POST["servicioCinco"];
    $Servicio_6=$_POST["servicioSeis"];
    $Servicio_7=$_POST["servicioSiete"];
    $Servicio_8=$_POST["servicioOcho"];
    $Servicio_9=$_POST["servicioNueve"];
    $Servicio_10=$_POST["servicioDiez"];
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
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 // SECCION FOTOGRAFIA PERFIL 
    //Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $tipo = $_FILES['imagen']['type'];
    $tamaño = $_FILES['imagen']['size'];
        

        // echo "Nombre de la imagen = " . $nombre_img . "<br>";
        // echo "Tipo de archivo = " .$tipo .  "<br>";
        // echo "Tamaño = " . $tamaño . "<br>";
        // // echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";
         
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
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
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
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
// SECCION GALERIA DE PRODUCCTOS
   //Recibo los datos de la imagen
    $Galeria_1 = $_FILES['producto_1']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Gal_1_tipo = $_FILES['producto_1']['type'];
    $Gal_1_tamaño = $_FILES['producto_1']['size'];
        
        // echo "Nombre de la imagen = " . $Galeria_1 . "<br>";
        // echo "Tipo de archivo = " . $Gal_1_tipo .  "<br>";
        // echo "Tamaño = " . $Gal_1_tamaño . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Galeria_1 == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["producto_1"]["type"] == "image/gif") || ($_FILES["producto_1"]["type"] == "image/jpeg")
                || ($_FILES["producto_1"]["type"] == "image/jpg") || ($_FILES["producto_1"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/images/';//usar en remoto
                // $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_5/images/';//usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['producto_1']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['producto_1']['tmp_name'], $directorio_1 . $Galeria_1);

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($Galeria_1 == !NULL) echo "La imagen es demasiado grande"; 
        }

        //Se introducen en la BD las fotografias de la galeria y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['producto_1']['name']) != ""){
        $Insertar= "INSERT INTO galeria(ID_Afiliado, galeria_1, espacio, tipoArchivo, descripcion, precio_Mayor, precio_Menor) VALUES ('$sesion','$Galeria_1','$Gal_1_tamaño','$Gal_1_tipo','$Descripcion','$PrecioMayor','$PrecioMenor')";
        mysqli_query($conexion, $Insertar);
    }
        header("location:../tarjeta/perfil_Comerciante.php");
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
// SECCION IMAGENES DE SLIDER  
   //Recibo los datos de la imagen
    $Slider_1 = $_FILES['imagenSlider']['name'];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $Slider_1_tipo = $_FILES['imagenSlider']['type'];
    $Slider_1_tamaño = $_FILES['imagenSlider']['size'];
        
        // echo "Nombre de la imagen = " . $Slider_1 . "<br>";
        // echo "Tipo de archivo = " . $Slider_1_tipo .  "<br>";
        // echo "Tamaño = " . $Slider_1_tamaño . "<br>";
        // // echo "Tamaño maximo permitido = 500.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

        //Si existe imagen y tiene un tamaño correcto
        if (($Slider_1_1 == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagenSlider"]["type"] == "image/gif") || ($_FILES["imagenSlider"]["type"] == "image/jpeg")
                || ($_FILES["imagenSlider"]["type"] == "image/jpg") || ($_FILES["imagenSlider"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/images/';//usar en remoto
                // $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_5/images/';//usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagenSlider']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagenSlider']['tmp_name'], $directorio_5 . $Slider_1_1);

                // echo "La imagen se ha cargado con exito";
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($Galeria_1 == !NULL) echo "La imagen es demasiado grande"; 
        }

        //Se introducen en la BD las fotografias de la galeria y sus datos descriptivos, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagenSlider']['name']) != ""){
        $Insertar= "INSERT INTO imagenes(ID_Afiliado, imagen_Slider, tamaño_imagen, tipo_imagen) VALUES ('$sesion','$Slider_1','$Slider_1_tamaño','$Slider_1_tipo')";
        mysqli_query($conexion, $Insertar);
    }
    
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
        
// mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla afiliados
   $actualizar1= "UPDATE afiliados SET nombre_Afi= '$Nombre', apellido_Afi= '$Apellido', cedula_Afi= '$Cedula', telefono_Afi= '$TelefonoMovil', correo_Afi= '$Correo', profesion_Afi= '$Profesion', profesion_Afi_2= '$Profesion_2', ID_Categoria = '$Categoria', pais_Afi= '$Pais', region_Afi= '$Region', subRegion_Afi= '$Sub_Region', direccion_Afi='$Direccion', descripcion_Producto= '$Descripcion_2', mostrar= '$MostrarPerfil' WHERE ID_Afiliado= '$sesion'";
    mysqli_query($conexion, $actualizar1);

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
//Se introduce en la BD la fotografia de perfil, solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagen']['name']) != ""){
        $insertarImagen= "UPDATE afiliados SET fotografia='$nombre_img' WHERE ID_Afiliado= '$sesion' ";
    }
    mysqli_query($conexion,$insertarImagen);
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
//Datos para almacenar en la tabla direcciones
//     $insertar2= "UPDATE direcciones SET direccion= '$Direccion', clinica= '$Clinica', consultorio= '$Consultorio' WHERE ID_Doctor= '$sesion'";
//     mysqli_query($conexion,$insertar2);
// */

// //Datos para almacenar en la tabla perfil_afiliado
//     $insertar4= "UPDATE perfil_afiliado SET perfil_profesional= '$TextoPerfil', servicio_1= '$Servicio_1', servicio_2= '$Servicio_2', servicio_3= '$Servicio_3', servicio_4= '$Servicio_4', servicio_5= '$Servicio_5', servicio_6= '$Servicio_6', servicio_7=  '$Servicio_7', servicio_8= '$Servicio_8', servicio_9= '$Servicio_9', servicio_10= '$Servicio_10' WHERE ID_Afiliado= '$sesion' ";
//     mysqli_query($conexion,$insertar4);

//  //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: ../tarjeta/mostrarPerfil_comerciante.php"); 
?>