<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["Afiliado"];//aqui se almacena el ID_Afiliado en la variable $sesion
    // echo $sesion . "<br>";

    //conexion a la BD
    include("../conexion/Conexion_BD.php");

    //se capturan todos los campos del formulario perfil_ingeniero.php Seccion datos personales, se almacenará en la tabla afiliados
    $Nombre= ucfirst($_POST['nombre']);
    $Apellido=ucfirst($_POST['apellido']);
	$Cedula=$_POST['cedula'];
	$TelefonoMovil=$_POST['telefonoMovil'];
    $Profesion=$_POST['profesion_Afi'];  
    if(!empty($_POST['profesion_Afi_2'])){ 
        $Profesion_2=$_POST['profesion_Afi_2'];
    }
    else{ 
        $Profesion_2="no especificó";
    }
	$Correo= $_POST['correo']; 
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
    // echo "Mostrar perfil= " . $MostrarPerfil . "<br><br>";

    //Seccion servicios profesionales, se almacenará en la tabla perfil_afiliado
    $TextoPerfil=$_POST["textoPerfil"];
    $Servicio_1=$_POST["servicioUno"];
    $Servicio_2=$_POST["servicioDos"];
/*
    // echo "Perfil= " . $TextoPerfil . "<br>";
    //echo "Servicio 1= " . $Servicio_1 . "<br>";
    //echo "Servicio 2= " . $Servicio_2 . "<br>";
    //echo "Servicio 3= " . $Servicio_3 . "<br>";
    //echo "Servicio 4= " . $Servicio_4 . "<br>";

    //seccion cambio de contraseña, se almacenará en la tabla usuario_doctor
    $ValorA= $_POST["valorA"];
    $ValorB= $_POST["valorB"];
    //se cifran los valores A y B con un algoritmo de encriptación
    //$ValorA_Cifrado= password_hash($ValorA,PASSWORD_DEFAULT);
    //$ValorB_Cifrado= password_hash($ValorB,PASSWORD_DEFAULT);

*/
// -----------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------
    //Seccion fotografia
    //Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $tipo = $_FILES['imagen']['type'];
    $tamaño = $_FILES['imagen']['size'];
        
        // echo "Nombre de la imagen = " . $nombre_img . "<br>";
        // echo "Tipo de archivo = " .$tipo .  "<br>";
        // echo "Tamaño = " . $tamaño . "<br>";
        // echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
        
        //Si existe imagen y tiene un tamaño correcto 
        if (($nombre_img == !NULL) AND ($tamaño <= 700000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                 // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/Usuarios/'; //usar en remoto
                  $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_7/images/Usuarios/'; //usar en local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagen']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);

                //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                if(($_FILES['imagen']['name']) != ""){
                    $insertarImagen= "UPDATE afiliados SET fotografia='$nombre_img' WHERE ID_Afiliado= '$sesion' ";
                    mysqli_query($conexion, $insertarImagen);
                }
            } 
            else{
                //si no cumple con el formato
                echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                exit();
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_img == !NULL){
                echo "La imagen es demasiado grande "; 
                echo "<a href='../vista/tarjeta/configurar_perfil/perfil_ingeniero.php'>Regresar</a>";
                exit();
            }
        }
    
// -----------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------

//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla doctores
   $actualizar1= "UPDATE afiliados SET nombre_Afi= '$Nombre', apellido_Afi= '$Apellido', cedula_Afi= '$Cedula', telefono_Afi= '$TelefonoMovil', correo_Afi= '$Correo', profesion_Afi= '$Profesion', profesion_Afi_2= '$Profesion_2', pais_Afi= '$Pais', region_Afi= '$Region', subRegion_Afi= '$Sub_Region', direccion_Afi='$Direccion', mostrar= '$MostrarPerfil' WHERE ID_Afiliado= '$sesion'";
    mysqli_query($conexion,$actualizar1);


//Datos para almacenar en la tabla direcciones
    $Actualizar2= "UPDATE servicios_profesionales SET servicioProf_1= '$Servicio_1', servicioProf_2= '$Servicio_2' WHERE ID_Afiliado= '$sesion' ";
    mysqli_query($conexion, $Actualizar2);

//Datos para almacenar en la tabla perfil_afiliado
    $insertar4= "UPDATE perfil_afiliado SET perfil_profesional= '$TextoPerfil', servicio_1= '$Servicio_1', servicio_2= '$Servicio_2', servicio_3= '$Servicio_3', servicio_4= '$Servicio_4', servicio_5= '$Servicio_5', servicio_6= '$Servicio_6', servicio_7=  '$Servicio_7', servicio_8= '$Servicio_8', servicio_9= '$Servicio_9', servicio_10= '$Servicio_10' WHERE ID_Afiliado= '$sesion' ";
    mysqli_query($conexion,$insertar4);

 //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: ../vista/tarjeta/mostrar_perfil/mostrar_Ingeniero.php"); 
?>