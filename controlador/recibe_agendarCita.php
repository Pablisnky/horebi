<?php   
    session_start();  
    $verifica = $_SESSION["verifica"];
    // echo $verifica;

    if($verifica == 1906){// Anteriormente en Director_Tatto.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina Director_Tatto.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        //conexion a la BD
        include("../conexion/Conexion_BD.php");

        //se capturan todos los campos del formulario Directorio_Tatto.php
        $Nombre= $_POST['nombre_Solicitante'];
        $Apellido=$_POST['apellido_Solicitante'];
    	$Cedula=$_POST['cedula_Solicitante'];
    	$Edad=$_POST['edad_Solicitante'];
        $Telefono=$_POST['telefono_Solicitante']; 
        $Fecha=$_POST['fechaCita'];
        $Turno=$_POST['turnoCita'];
        $Afiliado=$_POST['afiliado']; 

        // echo "Nombre= " . $Nombre . "<br>";
        // echo "Apellido= " . $Apellido . "<br>";
        // echo "Cedula= " . $Cedula . "<br>";
        // echo "Edad= " . $Edad . "<br>";
        // echo "Telefono= " . $Telefono . "<br>";
        // echo "Fecha formato PHP= " . $Fecha . "<br>";
        // echo "Turno= " . $Turno . "<br>";
        // echo "Afiliado= " . $Afiliado . "<br>";

        //se cambia el formato de la fecha antes de introducira a la base de datos para que mysql la pueda reconocer
        $fechaFormatoMySQL = date("Y-m-d", strtotime($Fecha));
        // echo "fecha formato MySQL= " . $fechaFormatoMySQL . "<br>";

        //Se insertan las datos en la tabla citas de la BD
        $Insertar_2= "INSERT INTO citas(ID_Afiliado, fecha, turno, nombre, apellido, cedula_Identidad, edad, telefono, fecha_solicitud) VALUES ('$Afiliado','$fechaFormatoMySQL','$Turno','$Nombre','$Apellido','$Cedula','$Edad','$Telefono',CURDATE())";
        mysqli_query($conexion, $Insertar_2);  ?>

        <!DOCTYPE html/>
        <html lang="es">
            <head>
                <title>Reservaciónes</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="description" content="Reservacion de citas">
                <meta name="keywords" content="horebi, citas, reservacion, reservaciones">
                <meta name="author" content="Pablo Cabeza">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                <link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css">
                <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/> 
                <link rel="shortcut icon" type="image/png" href="images/logo.png"> 

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
                </style>
            </head>
            <body>   
                <div style="min-height: 85%;">          
                    <p class="Inicio_24">www.horebi.com</p>
                    <div id="OcultarMenu" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, ocultarMenu() se encuentra en funciones_varias.js-->
                        <div>
                            <?php echo "<b class= >$Nombre</b>";?> 
                            <p class=Inicio_8>Hemos recibido su solicitud.</p>               
                            <p class= Inicio_8>Su reservación esta agendada para el <?php echo "$Fecha en la $Turno.</p>";?>
                            <?php  
                                $Key="qwerty";
                                $ID_AfiliadoCifrado= base64_encode($Key . $Afiliado); 
                                echo "<a class='Inicio_22' href=../vista/Directorio_Tatto.php?ID_Usuario=$ID_AfiliadoCifrado'>Regresar</a>";
                            ?>
                            <hr>   
                        </div>   

                        <div class="">
                            <h6>Gracias por confiar en nosotros.</h6>
                            <h3>www.horebi.com</h3>
                        </div>
                    </div>
                </div>
                <footer>    
                    <?php
                        // include("vista/footer.php");
                    ?>
                </footer>  
            </body>
        </html>
            <?php 
    }   
    else     
    {// Si no viene de Directorio_Tatto.php o trata de recargar página lo enviamos a Directorio_Tatto.php 
        $Afiliado=$_POST['afiliado'];  
        $Key= "qwerty";
        $ID_AfiliadoCifrado= base64_encode($Key . $Afiliado); 
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../vista/Directorio_Tatto.php?ID_Usuario=$ID_AfiliadoCifrado'>";  
    } ?>