<?php
    session_start();  
    $verifica_5 = $_SESSION["verifica_5"];
    // echo $verifica_5 ;
    // if($verifica_5 == 1909){// Anteriormente en registroProfesional.php se generó la variable $_SESSION["verfica_5"] con un valor de 1909; aqui se constata que se halla pasado por la pagina registroProfesional.php, si no es asi no se puede entrar en esta página.
        // unset($_SESSION['verifica_5']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;
    
    include("../modulos/muestraError.php");
   
        //Se verifica si los campo estan vacios y lo devuelve al formulario
        // if(empty($Nombre) || empty($Apellido) || empty($Cedula) || empty($Telefono) || empty($Correo) || empty($Profesion) || empty($Categoria) || empty($Pais) || empty($Region) || empty($Sub_Region) || empty($Usuario) || empty($Clave) || empty($RepiteClave)){
        //     echo "<script>
        //             alert('Debe Llenar los campos vacios');
        //             window.location.href='../vista/registroProfesional.php';
        //         </script>";
        // }
        
        //Captura todos los campos del formulario de afiliación; se recibe desde Afiliacion.php
        $Nombre=ucfirst($_POST["nombre"]);
        $Apellido=ucfirst($_POST["apellido"]);
        $Cedula= (int)$_POST["cedula"];
        $Telefono= (int)$_POST["telefono"];
        $Correo=strtolower($_POST["correo"]);        
        $Profesion=ucfirst($_POST["profesion"]);
        $Categoria=$_POST["categoria"]; 
        $Pais=$_POST["pais"];
        if(!empty($_POST["provincia"])){
            $Region= $_POST["provincia"];
        }
        if(!empty($_POST["canton"])){
            $Sub_Region= $_POST["canton"];
        }
        if(!empty($_POST["departamento"])){
            $Region= $_POST["departamento"];
        }  
        if(!empty($_POST["municipio_Col"])){
            $Sub_Region= $_POST["municipio_Col"];
        } 
        if(!empty($_POST["estado"])){
            $Region= $_POST["estado"];
        }  
        if(!empty($_POST["municipio"])){
            $Sub_Region= $_POST["municipio"];
        }                
        $Usuario=$_POST["usuario"];
        $Clave=$_POST["contrasena"];
        $RepiteClave= $_POST["contrasena"];

        // echo "ID_Categoria= " . $Categoria . "<br>";
        // echo "Nombre afiliado= " . $Nombre . "<br>";
        // echo "Apellido afiliado= " . $Apellido . "<br>";
        // echo "Cedula afiliado= " . $Cedula . "<br>";
        // echo "Telefono afiliado= " . $Telefono . "<br>";
        // echo "Correo afiliado= " . $Correo . "<br>";
        // echo "Profesion afiliado= " . $Profesion . "<br>";
        // echo "Categoria afiliado= " . $Categoria . "<br>";
        // echo "Pais afiliado= " . $Pais . "<br>";
        // echo "Region afiliado= " . $Region . "<br>";
        // echo "Sub_Region afiliado= " . $Sub_Region . "<br>";
        // echo "Contraseña= " . $Clave . "<br>";
        // echo "Repite contraseña= " . $RepiteClave . "<br>";

        include("../conexion/Conexion_BD.php"); 

        //se almacena en la tabla afiliacion el usuario que ha solicitado información del servicio
        $insertar2= "INSERT INTO afiliados(ID_Categoria, nombre_Afi, apellido_Afi, cedula_Afi, telefono_Afi, correo_Afi, profesion_Afi, pais_Afi, region_Afi, subRegion_Afi, fecha_registro) VALUES('$Categoria', '$Nombre', '$Apellido', '$Cedula', '$Telefono', '$Correo', '$Profesion', '$Pais', '$Region', '$Sub_Region', NOW())";                
        mysqli_query($conexion,$insertar2);  

        //se cifran la contraseña con un algoritmo de encriptación
        $ClaveCifrada= password_hash($Clave, PASSWORD_DEFAULT);

        //Se consulta en la tabla afiliado el ID_Usuario del usuario que se esta afiliando
        $Consulta= "SELECT ID_Afiliado FROM afiliados WHERE cedula_Afi ='$Cedula'";
        $Recordset= mysqli_query($conexion, $Consulta); 
        $Resultado= mysqli_fetch_array($Recordset);
        $ID_Usuario= $Resultado["ID_Afiliado"];
        // echo "El ID_Afiliado es= " . $ID_Usuario . "<br>";

        //En la tabla usuarios se inserta el ID_Usuario, se crea el usuario para almacenar la contraseña.
        $Insertar_11= "INSERT INTO usuarios(ID_Usuario, nombre_usuario, clave) VALUES('$ID_Usuario','$Usuario','$ClaveCifrada')";
        mysqli_query($conexion,$Insertar_11);  

        //En la tabla galeria se inserta el ID_Afiliado.
        $Insertar_3= "INSERT INTO galeria(ID_Afiliado) VALUES('$ID_Usuario')";            
        mysqli_query($conexion, $Insertar_3); 
// -------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------

    //Configuración de envio de correo de afiliación ConsultaMedica.com.ve
/*
    include("../Clases/actualizar_precio.php");

    if($Afiliacion == "Ini"){

            $Envia= "ConsultaMedica@consultamedica.com.ve";//Quien envia                     

            $email_to = $Correo;//correo a quien se le envia

            $email_subject = "Afiliación ConsultaMedica.com.ve";//titulo que llega a la bandeja del solicitante

            $email_message = '
Saludos ' . $Nombre . ' ' . $Apellido . '
Su solicitud de afiliación al Plan de Inicio fue procesada exitosamente, su cuenta está activada y los datos de acceso a la plataforma son:

Usuario: ' . $Usuario .  '
Contraseña: ' . $Contraseña .  ' 

Estos valores de acceso pueden ser modificados a su conveniencia en el momento que usted lo requiera, Horebi.com nunca le solicitará sus datos de confidencialidad; cualquier información o requerimiento puede enviarnos un mensaje por el formulario de contacto de la plataforma o escribir un correo a pc@consultamedica.com.ve

Los valores para realizar cambios de usuario y contraseña son:
Valor A: ' . $ValorA . '
Valor B: ' . $ValorB . ' 
Estos últimos siempre serán exigidos para realizar los cambios de usuario y contraseña, por lo que se recomienda resguardarlos.

OBSERVACIÓN  IMPORTANTE:
La construcción de su perfil al igual que operaciones de edición y carga de datos sensibles personales o de sus pacientes, no son posibles realizarlas por medio de teléfonos, esto es así por motivos de seguridad de la información, mediante estos dispositivos solo es posible la consulta de  información que usted ha alojado en su cuenta (pacientes, diagnósticos, tratamientos, informes médicos, citas pendientes al consultorio, entre otros funcionabilidades.)
                              
                    ';
                    
            //cabecera para el envío en formato HTML 
            $headers = 'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


            //-----------------------------------------------------------------------------------------------------------------
            $headers= 'From: ' . $Envia . "\r\n" .

            'Reply-To: ' . $Envia . "\r\n" .
    
            'Bcc: pcabeza7@gmail.com' . "\r\n" . //copia oculta utilizada para ser notificado cuando hay una afiliacion
         
            'X-Mailer: PHP/' . phpversion();
            
            $envio= mail($email_to, $email_subject, $email_message, $headers);
                            
        }
        else if($Afiliacion == "Bas"){
            $Envia= "ConsultaMedica@consultamedica.com.ve";//Quien envia                     

            $email_to = $Correo;//correo a quien se le envia

            $email_subject = "Afiliación ConsultaMedica.com.ve";//titulo que llega a la bandeja del solicitante

            $email_message = 
'Usted ha solicitado la información para formar parte del equipo que cambiará la forma de administrar la información médica en nuestro país; juntos, lograremos grandes cambios que nos permitirán ser más productivos y efectivos, asi como mejoraremos la atención en salud en lo que a manejo de informacón se refiere, crearemos una delicada red digital que tendrá disponible la información profesional especifica, en cualquier punto geografico de Venezuela.

               
                
Solicitud de afiliación al Plan de Pago Básico.

                            Banco: Mercantil
                            Cuenta: Corriente
                            Número: 0105-0062-10-1062261763
                            Monto: ' . $PrecioBasico . '
                            Titular: Pablo Cabeza
                            Cedula: 12.728.036
                            Correo: pc@consultamedica.com.ve


                             
Una vez realizado el pago de afiliación, ingrese a nuestro sitio web y registre el pago con el código de su deposito o transferencia.



                Atte. Pablo Cabeza.
                Director General 
                ConsultaMedica.com.ve
                    ';
                    
            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0"."\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8"."\r\n";
            //-----------------------------------------------------------------------------------------------------------------
            $headers= 'From:'.$Envia."\r\n".

            'Reply-To: '.$Envia."\r\n" .
         
            'X-Mailer: PHP/' . phpversion();

            $envio= mail($email_to, $email_subject, $email_message, $headers);
                            
        } */    
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------

   ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Inicio Sesión</title>
                <meta charset="utf-8"/>
                <meta name="description" content="contactar a viajes en carro particular pagando por puesto occupado entre las ciudades de Barquisimeto y Caracas"/>
                <meta name="keywords" content="viajes privados, Caracas, Barquisimeto, viaje particular, servicio de taxi, HOREBI diseños de web_site"/>
                <meta name="author" content="Pablo Cabeza"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                <link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/>  
                <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_Horebi_Tablet.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_Horebi_1280px.css">
                <link rel="shortcut icon" type="image/png" href="images/logo.png">
                
                <script src="Javascript/Funciones_varias.js"></script>  

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
                </style>         
            </head>     
            <body>
                <div style="min-height: 85%;">
                    <header class="fixed_1">
                        <?php
                            include("../vista/header/headerPrincipal_2.php");
                        ?>
                    </header>  
                    <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, ocultarMenu() se encuentra en funciones_varias.js-->
                        <div class="contenedor_02">
                            <p class='Inicio_5'><?php echo $Nombre;?></p>
                            <p class='Inicio_4'>Recibimos sus datos de afiliación, puede acceder a la plataforma para configurar su tarjeta de presentación, y afiliarse a un plan de pago para activarla.</p>
                            <a class='' href="../vista/ingresar.php">Iniciar sesión</a>
                        </div>       
                        <div class="contenedor_01">
                            <h6>Gracias por ser parte de la comunidad.</h6>
                            <h3>horebi</h3>
                        </div>
                    </div> 
                </div>  
                <footer>
                    <?php
                        include("vista/footer.php");
                    ?>
                </footer>
            </body>
        </html>

            <?php   
   // }
   //  else{   
   //      // Si no viene del formulario registroEspecialista.php o trata de recargar página lo enviamos al formulario  
   //      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../vista/Afiliacion.php'>";  
   //  } ?>
            

