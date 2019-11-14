<!-- Utilizado en perfil_comerciante.php  perfil_tatto.php   perfil_ingeniero.php-->
        <fieldset>
        <legend>Datos personales</legend>
        <label>Nombre:</label>
        <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Usuario['nombre_Afi'];?>" style="text-transform: capitalize;" />
        <br/>
        <label>Apellido:</label>
        <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Usuario['apellido_Afi'];?>" style="text-transform: capitalize;"/>
        <br/>
        <label>Cédula:</label>
        <input class="etiqueta_32" type="text" name="cedula" id="Cedula" value="<?php echo $Usuario['cedula_Afi'];?>"/>
        <br/>
        <label>Teléfono movil:</label>
        <input class="etiqueta_32" type="text" name="telefonoMovil" id="TelefonoMovil" value="<?php echo $Usuario['telefono_Afi'];?>"/> <!--  onclick="limpiarColorTelefonoMovil()"  onblur="validarFormatotelefonoMovil(this.value)"-->
        <br/>
        <label>Profesión:</label>
        <input class="etiqueta_32" type="text" name="profesion_Afi" id="Profesion_Afi" value="<?php echo $Usuario['profesion_Afi'];?>" style="text-transform: capitalize;"/>
        <br/>
        <label>Oficio, especialidad u otra profesión:</label>
        <input class="etiqueta_32" style="margin-bottom: 5%;" type="text" name="profesion_Afi_2" id="Profesion_Afi_2" value="<?php echo $Usuario['profesion_Afi_2'];?>" style="text-transform: capitalize;"/>
        <br/>
        <label>Categoria:</label>
        <select name="categoria">
        <?php
        //Se consulta que categoria tiene actualmente el afiliado
            $Consulta_4="SELECT * FROM categoria INNER JOIN afiliados ON categoria.ID_Categoria=afiliados.ID_Categoria WHERE ID_Afiliado = '$sesion'";
            $Recordset_4= mysqli_query($conexion, $Consulta_4);
            while($categoria = mysqli_fetch_array($Recordset_4)){  
                echo '<option value="'.$categoria['ID_Categoria'].'">'. $categoria["nombre_categoria"] .'</option>';
            }
            //Se consultan las categorias en la tabla catalogo llamada categorias de la BD .
            $Consulta="SELECT ID_Categoria, nombre_categoria FROM categoria";
            $Recordset = mysqli_query($conexion, $Consulta);
            while($Categoria= mysqli_fetch_array($Recordset)){
                echo '<option value="'.$Categoria['ID_Categoria'].'">' . $Categoria["nombre_categoria"] . '</option>';
                echo  '';
            }
            ?> 
        </select>        
        <br>   
        <label>Correo electronico:</label>
        <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['correo_Afi'];?>" style="text-transform: lowercase;"/>
        <br/>  
                            <label>Pais:</label>
                                <select style="width: 49% !important;" name="pais" id="Pais" onclick="SeleccionarProvincia(this.form)"> <!-- SeleccionarProvincia() se encuentra en Provincias.js-->
                                    <option><?php echo $Usuario['pais_Afi'];?></option>
                                    <option>Colombia</option>
                                    <option>Ecuador</option>
                                    <option>Venezuela</option>
                                </select>                  
                            <br>   
                            <div id="Region_1A" style="display: none;"><!--Aplica solo a Ecuador-->
                                <label>Provincia:</label>
                                    <select style="width: 49% !important;" name="provincia" id="Provincia" onclick="SeleccionarCanton(this.form)">
                                        <option></option>                            
                                    </select>                  
                                <br>         
                                <label>Canton:</label>
                                    <select style="width: 49% !important;" name="canton" id="Canton"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div> 
                            <div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
                                <label>Departamento:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="departamento" id="Departamento" onclick="SeleccionarMunicipio_Colombia(this.form)">
                                        <option></option>                            
                                    </select>                  
                                    
                                <label>Municipio:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="municipio_Col" id="Municipio_Col"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div> 
                            <div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
                                <label>Estado:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="estado" id="Estado" onclick="SeleccionarMunicipio(this.form)">
                                        <option></option>                            
                                    </select>                  
                                    
                                <label>Municipio:</label>
                                    <select style="width: 49% !important;" class="etiqueta_24" name="municipio" id="Municipio"> 
                                        <option></option>
                                    </select>                  
                                <br>
                            </div>   

                        <!-- Muestra la region y sub region que existe en la base de datos-->
                        <div id="Regiones">
                        <?php
                            if($Usuario['pais_Afi'] == "Venezuela"){ ?>
                                <label>Estado:</label>
                                <input type="text" name="estado_BD" readonly="readonly" value="<?php echo $Usuario['region_Afi']?>"> 
                                <label>Municipio:</label>
                                <input type="text" name="municipio_BD" readonly="readonly" value="<?php echo $Usuario['subRegion_Afi']?>">
                                <?php       
                            }  
                            else if($Usuario['pais_Afi'] == "Colombia"){ ?>
                                <label>Departamento:</label>
                                <input type="text" name="departamento_BD" readonly="readonly" value="<?php echo $Usuario['region_Afi']?>"> 
                                <label>Municipio:</label>
                                <input type="text" name="municipioCol_BD" readonly="readonly" value="<?php echo $Usuario['subRegion_Afi']?>">
                                <?php       
                            }
                            if($Usuario['pais_Afi'] == "Ecuador"){ ?>
                                <label>Provincia:</label>
                                <input type="text" name="provincia_BD" readonly="readonly" value="<?php echo $Usuario['region_Afi']?>"> 
                                <label>Canton:</label>
                                <input type="text" name="canton_BD" readonly="readonly" value="<?php echo $Usuario['subRegion_Afi']?>">
                                <?php       
                            }    ?>
                        </div> 
               
        <br> 
        <label>Direccion:</label>
        <textarea class="contenido_4" name="direccion" id="Direccion"><?php echo $Usuario['direccion_Afi'];?></textarea>  
        <br> 
        <label>Descripcion del producto o servicio:</label>
        <textarea class="contenido_4" name="descripcion_2" id="Descripcion_2"><?php echo $Usuario['descripcion_Producto'];?></textarea>
        <input class="contador" type="text" name="contador_2" id="Contador_2" value="150">                 
    </fieldset>