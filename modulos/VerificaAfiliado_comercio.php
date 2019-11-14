<?php
    if(!isset($_SESSION["AfiliadoCom"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login
        // echo "ID_Afiliado= " . $_SESSION["Afiliado"];
        header("location:../vista/ingresar.php");
    }
    else{
        $sesion= $_SESSION["AfiliadoCom"];//aqui se almacena el ID_Afiliado en la variable $sesion
         // echo "La sesion ID_AfiliadoCom esta declarada= " .  $sesion . "<br>";
    }
?>