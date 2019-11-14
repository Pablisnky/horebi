<?php
    include("../modulos/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
		<title>Directorio comercial</title>
    	<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
    	<meta name="description" content="Directorio comercial, listado de tiendas"/>
    	<meta name="keywords" content="directorio comercial"/>
    	<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	    
        <link rel="stylesheet" type="text/css" href="../css/EstilosHorebi.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_Horebi.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_Horebi_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_Horebi_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_Horebi_1280px.css">
        <link rel="stylesheet" type="text/css" href="../css/hint_CSS/hint.css"><!--Formato de barra de abecedario-->
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 
            
        <script src="../javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() -->
    </head>	
        <body>
            <?php
                if(!isset($_GET["Bandera"])){// si no Hemos recibido el Pais, se muestra la ventana modal 
                $variableip="II_Entrada";         
            ?>
            <!-- Ventana modal -->
            <div class="modal">
                <a href="../index.php?V_1=<?php echo base64_encode($variableip);?>"><h2>www.horebi.com</h2></a>
                <p class="Inicio_19">Directorio Comercial</p>
                <div>
                    <p class="Inicio_18">Seleccione un pais.</p>
                    <div class="Directorio_5">
                        <a class="enlace_1" href="directorio_Comercial.php?Bandera=Colombia"><img src="../images/web/Bandera_Colombia.jpg" alt="Bandera de Colombia"/></a>
                        <a class="enlace_1" href="directorio_Comercial.php?Bandera=Ecuador"><img src="../images/web/Bandera_Ecuador.jpg" alt="Bandera de Ecuador"/></a>
                        <a class="enlace_1" href="directorio_Comercial.php?Bandera=Venezuela"><img src="../images/web/Bandera_Venezuela.jpg" alt="Bandera de Venezuela"/></a>
                    </div>
                </div>  
                <a class="salir" href="../index.php">Salir</a>
            </div>
            <?php 
        }
        else{//Hemos recibido el pais selecionado en el select de este mismo archivo, no aparece la ventana modal
            $Pais= $_GET["Bandera"];
        ?>
            <header>    
                <?php
                    include("header/headerPrincipal.php");
                ?>
            </header>        
            <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                    <div> 
                        <nav id="Menu" style=" text-align: center; width: 95%; margin: auto;"><!--alfabeto del directorio, en el archivo menu.js esta el código para fijar el abecedario a la parte superior-->
                            <h3 class="directorio_02">Directorio Comercial</h3>                             
                            <p class="Inicio_13"><?php echo $Pais;?><a href="directorio_Comercial.php">(Cambiar)</a></p>
                                
                            <div class="ocultarAlfabeto">
                                <ul style="background:; display: flex; list-style: none; justify-content: space-between; ">
                                    <li><span class="hint--top-right hint--info hint--rounded" data-hint="Alergólogo Anestesiólogo Angiólogo"><a href="#marcadorA">A</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorB">B</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Cardiólogo, Cirujano Plástico"><a href="#marcadorC">C</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Dermatólogo"><a href="#marcadorD">D</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorE">E</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Fisiátra"><a href="#marcadorF">F</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Gastroenterólogo, Geriatra, Ginecologo, Gineco-Obstetra"><a href="#marcadorG">G</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorH">H</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Imagenólogo Internista"><a href="#marcadorI">I</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorJ">J</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorK">K</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorL">L</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorM">M</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Neurocirujano Neurólogo"><a href="#marcadorN">N</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorÑ">Ñ</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Odontólogo Oftalmólogo Oncólogo Otorrino"><a href="#marcadorO">O</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Pediatra Psicologo Psquiatra Psicopedagogo"><a href="#marcadorP">P</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorQ">Q</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorR">R</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorS">S</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Traumatólogo"><a href="#marcadorT">T</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Urológo"><a href="#marcadorU">U</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorV">V</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorW">W</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorX">X</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorY">Y</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorZ">Z</a></span></li>
                                </ul>
                            </div>
                        </nav>
                    <hr style="margin-top: 1%;"> 

                    <div id="Directorio_00">
                        <a name="marcadorA"></a>
                        <div class="directorio">               
                                <?php
                                include("../conexion/Conexion_BD.php");
                                $Consulta="SELECT * FROM afiliado_comercial INNER JOIN categoria_comercial ON afiliado_comercial.ID_Categoria=categoria_comercial.ID_CategoriaCom WHERE afiliado_comercial.ID_Categoria= 19 AND Pais_Comercio= '$Pais' AND mostrar=1 ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){   
                                    echo "<p class='color'>Artes graficas</p>";
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["Nombre_Comercio"];
                                        $ID_Afiliado= $Directorio["ID_AfiliadoCom"];
                                        $Key= "qwerty";
                                        $ID_AfiliadoComCifrado= base64_encode($Key . $ID_Afiliado);
                                        echo "<a class='directorio_3' href='DirectorioComercial/Servicios_Comercial.php?ID_AfiliadoCom=$ID_AfiliadoComCifrado'>" . $nombre . "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    }
                                } ?> 
                        </div>


                        <a name="marcadorA"></a>
                        <div class="directorio">           
                                <?php
                                $Consulta_1="SELECT * FROM afiliado_comercial INNER JOIN categoria_comercial ON afiliado_comercial.ID_Categoria=categoria_comercial.ID_CategoriaCom WHERE afiliado_comercial.ID_Categoria= 17 AND Pais_Comercio= '$Pais' AND mostrar=1 ";
                                $Recordset_1 = mysqli_query($conexion,$Consulta_1);
                                if(mysqli_num_rows($Recordset_1) != 0){       
                                    echo "<p class='color'>Concesionarios de Carros</p>";
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["Nombre_Comercio"];
                                        $ID_Afiliado=$Directorio["ID_AfiliadoCom"];
                                        $Key= "qwerty";
                                        $ID_AfiliadoComCifrado= base64_encode($Key . $ID_Afiliado); 
                                        echo "<a class='directorio_3' href='Tienda_Comercial.php?ID_AfiliadoCom=$ID_AfiliadoComCifrado'>" . $nombre .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }?> 
                        </div>

                        <a name="marcadorA"></a>
                        <div class="directorio">           
                                <?php
                                $Consulta_1="SELECT * FROM afiliado_comercial INNER JOIN categoria_comercial ON afiliado_comercial.ID_Categoria=categoria_comercial.ID_CategoriaCom WHERE afiliado_comercial.ID_Categoria= 17 AND Pais_Comercio= '$Pais' AND mostrar=1 ";
                                $Recordset_1 = mysqli_query($conexion,$Consulta_1);
                                if(mysqli_num_rows($Recordset_1) != 0){       
                                    echo "<p class='color'>Industria Textil</p>";
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["Nombre_Comercio"];
                                        $ID_Afiliado=$Directorio["ID_AfiliadoCom"];
                                        $Key= "qwerty";
                                        $ID_AfiliadoComCifrado= base64_encode($Key . $ID_Afiliado); 
                                        echo "<a class='directorio_3' href='Tienda_Comercial.php?ID_AfiliadoCom=$ID_AfiliadoComCifrado'>" . $nombre .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }?> 
                        </div>

                        <a name="marcadorA"></a>
                        <div class="directorio">           
                                <?php
                                $Consulta_1="SELECT * FROM afiliado_comercial INNER JOIN categoria_comercial ON afiliado_comercial.ID_Categoria=categoria_comercial.ID_CategoriaCom WHERE afiliado_comercial.ID_Categoria= 17 AND Pais_Comercio= '$Pais' AND mostrar=1 ";
                                $Recordset_1 = mysqli_query($conexion,$Consulta_1);
                                if(mysqli_num_rows($Recordset_1) != 0){       
                                    echo "<p class='color'>Zapateria</p>";
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["Nombre_Comercio"];
                                        $ID_Afiliado=$Directorio["ID_AfiliadoCom"];
                                        $Key= "qwerty";
                                        $ID_AfiliadoComCifrado= base64_encode($Key . $ID_Afiliado); 
                                        echo "<a class='directorio_3' href='Tienda_Comercial.php?ID_AfiliadoCom=$ID_AfiliadoComCifrado'>" . $nombre .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }?> 
                        </div>
                    </div>
            </div>
        </div>
        <footer style="margin-top: 10%;">          
            <?php
                // include("../header/footer.php");
            ?>  
        </footer>
        <?php } ?>
    </body>
</html>