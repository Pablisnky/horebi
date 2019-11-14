<?php
session_start();//se inicia una sesion para crear una $_SESSION que almacene el ID_Afiliado, esta sesion sera exigida cada vez que se entre en una pagina del area de afiliados, con esto se garantiza que se accedio a la cuenta del afiliado haciendo login
    
    //Muestra los errore en local e impide mostrarlos en remoto
    include("../modulos/muestraError.php");
    include("../conexion/Conexion_BD.php");

    $Usuario= htmlentities(addslashes($_POST["usuario"]));
    $Clave=  htmlentities(addslashes($_POST["clave"]));

    //Verifica si los campo estan vacios y lo devuelve al formulario
    // if(empty($Nombre) || empty($Apellido) || empty($Cedula) || empty($Telefono) || empty($Correo) || empty($Profesion) || empty($Afiliacion) || empty($Pais) || empty($Provincia) || empty($Canton)){
    //     echo "<script>
    //             alert('Debe Llenar los campos vacios');
    //             window.location.href='../vista/Afiliacion.php';
    //         </script>";
    // }
    //Coloca la primera letra en mayuscula ucfirst();
    //Coloca toda la cadena en minuscula strtolower();
    //Elimina los espacios en blanco delante y al final de un texto trim();
    //Elimina etiquetas HTML strip_tags($cadena);
    //Convierte a un valor de tipo integer que automáticamente se deshará de cualquier carácter no numérico. util para campo que solo deben recibir numero (int)$_POST['edad'];

    // echo $Usuario . "<br>";
    // echo $Clave . "<br>";

        $Consulta="SELECT * FROM usuarios WHERE nombre_usuario='$Usuario'";
        $Recordset = mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) == 1){

            $Afiliado= mysqli_fetch_array($Recordset);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila porque solo existe un unico usuario con ese nombre

            // // Parte del código no es necesariamente util para el funcionamiento, solo para verificar que se descifra la clave
            // echo "Clave cifrada= " . $Afiliado["clave"] . "<br>";
            // //se descifra la contraseña con un algoritmo de desencriptado.
            $Clave_2 = password_verify($Clave, $Afiliado["clave"]);
            // echo "Clave descifrada= " . $Clave_2;

            //se descifra la contraseña con un algoritmo de desencriptado.
            if($Usuario == $Afiliado["nombre_usuario"] AND $Clave == password_verify($Clave, $Afiliado["clave"])){
                //se crea una sesion que almacena el ID_Usuario exigida en todas las páginas de su cuenta
                $_SESSION["Afiliado"]= $Afiliado["ID_Usuario"];
                // echo "La sesión creada es = " . $_SESSION["Afiliado"];
                header("location:../vista/tarjeta/muestra_tarjeta/configurarT.php");
            }
            else{  ?>
                <script>
                    alert("USUARIO y CONTRASEÑA no son correctas");
                    history.back();
                </script> 
                <?php
            }
        }
        else{
            $Consulta_2="SELECT * FROM usuario_comercial WHERE nombre_usuarioCom='$Usuario'";
            $Recordset_2 = mysqli_query($conexion,$Consulta_2);
            $AfiliadoCom= mysqli_fetch_array($Recordset_2);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila.

            if($Usuario == $AfiliadoCom["nombre_usuarioCom"] AND $Clave == password_verify($Clave, $AfiliadoCom["clave_usuarioCom"])){
            //se crea una sesion que almacena el ID_UsuarioComercial exigida en todas las páginas de su cuenta
                $_SESSION["AfiliadoCom"]= $AfiliadoCom["ID_UsuarioCom"];
                // echo "La sesión creada es = " . $_SESSION["AfiliadoCom"];
                header("location: ../vista/tarjeta/muestra_tarjeta/configurarT_com.php");
            }
            else{ ?> 
                <script>
                    alert("su USUARIO y CONTRASEÑA no son correctas");
                    history.back();
                </script>        
                    <?php
            }
        } ?>