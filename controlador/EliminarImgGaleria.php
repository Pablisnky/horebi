<?php
    session_start();//Se reanUada la sesion abierta en validarSesion.php llamada AfiliadoCom

    if(!isset($_SESSION["AfiliadoCom"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login
        // echo "ID_Afiliado= " . $_SESSION["Afiliado"];
        if(!isset($_SESSION["Afiliado"])){
            header("location:../vista/ingresar.php");
        }
        else{
            $sesion= $_SESSION["Afiliado"];//aqui se almacena el ID_Afiliado en la variable $sesion
            // echo $sesion . "<br>";
            
            //Se conecta a la base de datos
            include("../conexion/Conexion_BD.php");
        }
    }
    else{
        $sesion= $_SESSION["AfiliadoCom"];//aqui se almacena el ID_Afiliado comercial en la variable $sesion
        // echo $sesion . "<br>";

        //Se conecta a la base de datos
        include("../conexion/Conexion_BD.php");
    }

    if(!empty($_GET["Imagen"])){
        $Imagen= $_GET["Imagen"];//se recibe el ID_Imagen de Galeria desde perfil_comerciante.php
        $Eliminar= "DELETE FROM galeria WHERE ID_Galeria= '$Imagen'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            header("location:../vista/tarjeta/configurar_perfil/perfil_comerciante.php");
        }
        else{
            // echo "Surgio un problema";
        }
    }
    else if(!empty($_GET["Imagen_Slid"])){
        $Imagen= $_GET["Imagen_Slid"];//se recibe el ID_Imagen de Slider desde perfil_comerciante.php
        $Eliminar= "DELETE FROM imagenes_comercial WHERE ID_Imagen= '$Imagen'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            header("location:../vista/tarjeta/configurar_perfil/perfil_comercio.php");
        }
        else{
            // echo "Surgio un problema";
        }
    }
    else if(!empty($_GET["Galeria"])){
        $Imagen= $_GET["Galeria"];//se recibe el ID_Imagen de Slider desde perfil_comerciante.php
        $Eliminar= "DELETE FROM galeria WHERE ID_Galeria= '$Imagen'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            header("location:../vista/tarjeta/configurar_perfil/perfil_comercio.php");
        }
        else{
            // echo "Surgio un problema";
        }
    }
    else if(!empty($_GET["Imagen_Slid_Tat"])){
        $Imagen= $_GET["Imagen_Slid_Tat"];//se recibe el ID_Imagen de Slider desde perfil_tatto.php
        $Eliminar= "DELETE FROM imagenes WHERE ID_Imagen= '$Imagen'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            header("location:../vista/tarjeta/configurar_perfil/perfil_tatto.php");
        }
        else{
            // echo "Surgio un problema";
        }
    }
    else{
        $Imagen= $_GET["ImagenTat"];//se recibe el ID_Imagen de la galeria de tattos desde perfil_tatto.php
        $Eliminar= "DELETE FROM galeria WHERE ID_Galeria= '$Imagen'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            header("location:../vista/tarjeta/configurar_perfil/perfil_tatto.php");
        }
        else{
            // echo "Surgio un problema";
        }
    }
?> 