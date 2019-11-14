<?php
session_start();  
    $corroborar = $_SESSION["verifica"];
    if ($corroborar == 44){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Juego de preguntas sobre suramerica."/>
        <meta name="keywords" content="suramerica, latinoamerica"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

        <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
    </head>	    
    <body>
    	<div class="Secundario">
            <!--titulo y menu principal-->
                    <?php include("../vista/modulos/header.html");?>

          <div onclick= "ocultarMenu()">
        	    <div id="AcuseContacto_01">    
                    <?php
                        // $Nombre=$_POST["nombre"];
                        $Cedula=$_POST["cedula"];
                        $Telefono=$_POST["telefono"];
                        $Deposito=$_POST["deposito"];
                        $Tema=$_POST["tema"];

                        /*
                        echo $Cedula . "<br>";
                        echo $Telefono . "<br>";
                        echo $Correo . "<br>";
                        echo $Tema . "<br>";
                        */
                        

                        $participante_1= $_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en entrada.php
                        $Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el ID del participante, sesion creada en validarSesion.php
                         // echo "$participante:" .  $participante . "<br>";
                        ?>
                            <div id="entrada_1">
                                <!--Se muestra en pantalla el nombre del participante-->
                            <span class='span_0'><?php echo $participante_1;?></span>
                        </div>
                        <?php
                
                        echo "<p class='Inicio_1'>Recibimos el codigo de tu deposito, verificaremos tu pago y en 24 horas tu prueba estará disponible para ser respondida.</p>";
                        echo "<p class='Inicio_1'>Una vez disponible su prueba tiene hasta el dia viernes a las 6:00 pm para responderla.</p>";

                        echo "<p class='Inicio_1'>Si resultas ganador el pago puedes retirarlo por una agencia J_Pita con tu cedula de identidad, a partir de las 07:00 pm del dia viernes.</p>";


                        include("../conexion/Conexion_BD.php");
                        mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

                        //se insertan los datos a la BD
                        $insertar= "INSERT INTO registro_pago(cedula, telefono, deposito, tema, fecha_registro) VALUES('$Cedula', '$Telefono', '$Deposito','$Tema', NOW())" ;
                        mysqli_query($conexion, $insertar);

                        $insertar_2= "INSERT INTO participantes_pruebas(ID_Participante, Tema, Deposito) VALUES('$Participante','$Tema','$Deposito')" ;
                        mysqli_query($conexion, $insertar_2);
                    ?>   
            	</div> 
        </div>
    </div>


<?php
 
    $email_to = "pcabeza7@gmail.com";
 
    $email_subject = "Nuevo registro en Vs_100";  

    $email_message = "Inscripción en la prueva Venezuelas";

    $headers = 'From: '. "pc@vs_100.com" . "\r\n".
 
    'Reply-To: '. "pc@vs_100.com" . "\r\n" .
 
    'X-Mailer: PHP/' . phpversion();
 
    @mail($email_to, $email_subject, $email_message, $headers); 

 }
 else{   
// Si no viene del formulario registro_Pago.php.php o trata de recargar página lo enviamos al index.html  
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
} 
?>

