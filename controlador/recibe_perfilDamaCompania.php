<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["Afiliado"];//aqui se almacena el ID_Afiliado en la variable $sesion
    // echo "ID_Usuario= " . $sesion . "<br>";

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
	$Correo=$_POST['correo']; 
    $Pais=$_POST['pais']; 
    $Provincia=$_POST['provincia']; 
    $Canton=$_POST['canton']; 
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
    // echo "Provincia=" . $Provincia . "<br>";
    // echo "Canton=" . $Canton . "<br>";
 
  
    //Seccion servicios profesionales, se almacenará en la tabla perfil_afiliado
    $Servicio_1=$_POST["servicioUno"];
    $Servicio_2=$_POST["servicioDos"];
    $Servicio_3=$_POST["servicioTres"];
    $Servicio_4=$_POST["servicioCuatro"];
    $Servicio_5=$_POST["servicioCinco"];
    $Servicio_6=$_POST["servicioSeis"];
    $Servicio_7=$_POST["servicioSiete"];
    $Servicio_8=$_POST["servicioOcho"];
    $Servicio_9=$_POST["servicioNueve"];

    // echo "Servicio 1= " . $Servicio_1 . "<br>";
    // echo "Servicio 2= " . $Servicio_2 . "<br>";
    // echo "Servicio 3= " . $Servicio_3 . "<br>";
    // echo "Servicio 4= " . $Servicio_4 . "<br>";
    // echo "Servicio 5= " . $Servicio_5 . "<br>";
    // echo "Servicio 6= " . $Servicio_6 . "<br>";
    // echo "Servicio 7= " . $Servicio_7 . "<br>";
    // echo "Servicio 8= " . $Servicio_8 . "<br>";
    // echo "Servicio 9= " . $Servicio_9 . "<br>";

    //Se reciben los rasgos fisicos
    $Estatura= $_POST["estatura"];
    $Peso= $_POST["peso"];
    $Ojos= $_POST["ojos"];
    $Cirugias= $_POST["cirugias"];

    // echo "Estatura= " . $Estatura . "<br>";
    // echo "Peso= " . $Peso . "<br>";
    // echo "Ojos= " . $Ojos . "<br>";
    // echo "Cirugias= " . $Cirugias . "<br>";

/*
    //seccion cambio de contraseña, se almacenará en la tabla usuario_doctor
    $ValorA= $_POST["valorA"];
    $ValorB= $_POST["valorB"];
    //se cifran los valores A y B con un algoritmo de encriptación
    //$ValorA_Cifrado= password_hash($ValorA,PASSWORD_DEFAULT);
    //$ValorB_Cifrado= password_hash($ValorB,PASSWORD_DEFAULT);

*/
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
                // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Horebi/Horebi_2/images/'; //usar en local

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
//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------

//conexion a la BD
include("../conexion/Conexion_BD.php");
mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla afiliados
   $actualizar1= "UPDATE afiliados SET nombre_Afi= '$Nombre', apellido_Afi= '$Apellido', cedula_Afi= '$Cedula', telefono_Afi= '$TelefonoMovil', correo_Afi= '$Correo', profesion_Afi= '$Profesion', profesion_Afi_2= '$Profesion_2', pais_Afi= '$Pais', provincia_Afi= '$Provincia', canton_Afi= '$Canton', mostrar= '$MostrarPerfil' WHERE ID_Afiliado= '$sesion'";
    mysqli_query($conexion,$actualizar1);

//Para actualizar fotografia solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagen']['name']) != ""){
        $insertarImagen= "UPDATE afiliados SET fotografia='$nombre_img' WHERE ID_Afiliado= '$sesion' ";
    
        mysqli_query($conexion, $insertarImagen);
    }
/*
//Datos para almacenar en la tabla direcciones
    $insertar2= "UPDATE direcciones SET direccion= '$Direccion', clinica= '$Clinica', consultorio= '$Consultorio' WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar2);
*/

//Datos para almacenar en la tabla servicios_damacompania
    $insertar4= "UPDATE servicios_damacompania SET servicio_1= '$Servicio_1', servicio_2= '$Servicio_2', servicio_3= '$Servicio_3', servicio_4= '$Servicio_4', servicio_5= '$Servicio_5', servicio_6= '$Servicio_6', servicio_7=  '$Servicio_7', servicio_8= '$Servicio_8', servicio_9= '$Servicio_9' WHERE ID_Afiliado= '$sesion' ";
    mysqli_query($conexion,$insertar4);


//Datos para almacenar en la tabla rasgos_fisicos
    $Actualizar_5= "UPDATE rasgos_fisicos SET Estatura= '$Estatura', Peso= '$Peso', Color_ojos= '$Ojos', cirugia= '$Cirugias' WHERE ID_Afiliado= '$sesion' ";
    mysqli_query($conexion, $Actualizar_5);

 //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: ../tarjeta/configurarT.php"); 
?>