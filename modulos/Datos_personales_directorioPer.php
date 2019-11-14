            <div class="Perfil_00_C"> 
                <?php 
                    //Consulta para para colocar el nombre y apellido del afiliado que se esta siendo visitado
                    $consulta_2="SELECT nombre_Afi, apellido_Afi, fotografia, descripcion_Producto, correo_Afi, telefono_Afi, profesion_Afi,  profesion_Afi_2 FROM afiliados WHERE ID_Afiliado= '$Llave' ";
                    $Recorset_2=mysqli_query($conexion,$consulta_2);
                    $Afiliado_2= mysqli_fetch_array($Recorset_2); 
                ?>
                <input class="input_3" type="text" readonly="readonly" value="<?php echo $Afiliado_2['nombre_Afi'] . " " . $Afiliado_2['apellido_Afi']; ?>">
                <input class="input_3A" type="text" readonly="readonly" value="<?php echo $Afiliado_2['profesion_Afi'];?>">
                    <?php 
                    if($Afiliado_2['profesion_Afi_2'] != "no especificó"){ ?>
                        <input class="input_3A" readonly="readonly" type="text" name="especialidad" value="<?php echo $Afiliado_2['profesion_Afi_2'];?>">  <?php
                    } 
                    else{ ?>
                        <input class="input_3A" style="visibility: hidden;"> <?php
                    } ?>
                <div class="Perfil_1C">
                    <div  class="">                
                       <img class="imagen_7" src="../../images/Usuarios/<?php echo $Afiliado_2['fotografia'];?>" >
                    </div>
                </div> 
            </div>