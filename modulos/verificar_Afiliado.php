<?php    
    if(!isset($_SESSION["Afiliado"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login; esta sesion se inicio en validarSesion.php
        // echo "La sesion ID_Afiliado no esta declarada= ";
        header("location:../vista/ingresar.php");           
    }
    else{
        $sesion= $_SESSION["Afiliado"];//aqui se almacena el ID_Usuario en $sesion
        // echo "La sesion ID_Afiliado esta declarada= " . $sesion;
    }
?>