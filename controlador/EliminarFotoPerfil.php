<?php
    session_start();//Se reaunada la sesion abierta en validarSesion.php llamada AfiliadoCom

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
            echo $Categoria = $_GET["categoria"];
            echo $FotoPerfil = $_GET["FotoPerfil"];
exit();
        }
    }
    else{
        $sesion= $_SESSION["AfiliadoCom"];//aqui se almacena el ID_Afiliado comercial en la variable $sesion
        // echo $sesion . "<br>";

        //Se conecta a la base de datos
        include("../conexion/Conexion_BD.php");
    }

    if(!empty($_GET["FotoPerfil"])){
        $Fotografia= $_GET["FotoPerfil"];//se recibe el ID_Imagen de Galeria desde perfil_comerciante.php
        $Eliminar= "UPDATE afiliados SET fotografia= 'Perfil.jpg' WHERE ID_Afiliado= '$sesion'"; 
        $Eliminado= mysqli_query( $conexion, $Eliminar);  

        if($Eliminado){
            switch($Categoria = $_GET["categoria"]){
                case 'Ingeniero civil':
                    header("location:../tarjeta/perfil_ingeniero.php");
                break;
                case 'Tatuador':
                    header("location:../tarjeta/perfil_tatto.php");
                break;
            }  
        }         
    
        else{
            // echo "Surgio un problema";
        }
    }
?> 