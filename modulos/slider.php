 <div class="contenedor_SliderCom_2"><!--Este contenedor solo se muestra en vista telefonos y tables-->
                <!-- <span class="icon-arrow-left2" onclick="CambiarImagen()"></span>CambiarImagen() se encuentra en Funciones_varias.js-->
                <!-- <span class="icon-arrow-right2"></span> -->
                <ul class="slider">
                    <?php
                    $Consulta_6="SELECT * FROM imagenes INNER JOIN afiliados ON imagenes.ID_Afiliado=afiliados.ID_Afiliado WHERE afiliados.ID_Afiliado = '$Llave'";
                    $Recordset_6= mysqli_query($conexion, $Consulta_6);                       
                    while($Imag= mysqli_fetch_array($Recordset_6)){ ?>
                        <li>
                            <input type="radio" name="imagen" id="Radio_2" checked>
                            <label for="Radio_2"></label>
                            <img src="../images/<?php echo $Imag['imagen_slider'];?>" >
                        </li><?php
                    } ?>
                </ul>                        
            </div>