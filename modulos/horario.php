
        <fieldset class="Afiliacion_4">  
            <legend>Horario</legend>
            <?php
                $Consulta_5="SELECT * FROM horarios WHERE ID_Afiliado = '$sesion' ";
                $Recordset_5= mysqli_query($conexion,$Consulta_5);
                $horario= mysqli_fetch_array($Recordset_5);
            ?>

                            <br><br>
                            <label  style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Horario de mañana:</label>
                            <br>
                            <label>Inicio</label>
                            <select class="etiqueta_26" name="inicioMañana" id="Ciudad"> 
                                <option><?php echo $horario['inicio_mañana'];?></option>
                                <option></option>
                                <option>06:00 am</option>
                                <option>06:30 am</option>
                                <option>07:00 am</option>
                                <option>07:30 am</option>
                                <option>08:00 am</option>
                                <option>08:30 am</option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                            </select> <br>

                            <label>Culmina</label>  
                            <select class="etiqueta_26" name="culminaMañana" id="Ciudad">
                                <option><?php echo $horario['culmina_mañana'];?></option> 
                                <option></option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                                <option>12:30 pm</option>
                                <option>01:00 pm</option>
                                <option>01:30 pm</option>
                                <option>02:00 pm</option>
                            </select> 
                            <br>
                            <label class="etiqueta_9" for="Lunes_Mañana">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_mañana" id="Lunes_Mañana" value="lunes" 
                                    <?php 
                                        if(($horario['lunes_mañana'])=='lunes'){
                                            echo 'checked';
                                    }?>> 
                            <br>                   
                            <label class="etiqueta_9" for="Martes_Mañana">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_mañana" id="Martes_Mañana" value="martes"  
                                    <?php if(($horario['martes_mañana'])=='martes'){ 
                                        echo ' checked'; 
                                    } ?>> 
                            <br>
                            <label class="etiqueta_9" for="Miercoles_Mañana">miercoles</label>
                            <input class="etiqueta_10" type="checkbox" name="miercoles_mañana" id="Miercoles_Mañana" value="miercoles"  <?php if(($horario['miercoles_mañana'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Mañana">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_mañana" id="Jueves_Mañana" value="jueves" <?php if(($horario['jueves_mañana'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Mañana">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_mañana" id="Viernes_Mañana" value="viernes" <?php if(($horario['viernes_mañana'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Mañana">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_mañana" id="Sabado_Mañana" value="sabado" <?php if(($horario['sabado_mañana'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_Mañana">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_mañana" id="Domingo_Mañana" value="domingo" <?php if(($horario['domingo_mañana'])=='domingo') { echo ' checked'; } ?>> <br>
                           
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Horario de tarde:</label>
                            <br>

                            <label>Inicio</label>
                                <select class="etiqueta_26" name="iniciaTarde" id=""> 
                                    <option><?php echo $horario['inicia_tarde'];?></option>
                                    <option></option>
                                    <option>12:00 m</option>
                                    <option>12:30 pm</option>
                                    <option>01:00 pm</option>
                                    <option>01:30 pm</option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select> <br> 
                            <label>Culmina</label>
                                <select class="etiqueta_26" name="culminaTarde" id="Ciudad"> 
                                    <option><?php echo $horario['culmina_tarde'];?></option>
                                    <option></option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select>
                            
                            <br>
                            <label class="etiqueta_9" for="Lunes_Tarde">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_tarde" id="Lunes_Tarde" value="lunes"  <?php if(($horario['lunes_tarde'])=='lunes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Martes_Tarde">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_tarde" id="Martes_Tarde" value="martes" <?php if(($horario['martes_tarde'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Tarde">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_tarde" id="Miercoles_Tarde" value="miercoles" <?php if(($horario['miercoles_tarde'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Tarde">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_tarde" id="Jueves_Tarde" value="jueves" <?php if(($horario['jueves_tarde'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Tarde">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_tarde" id="Viernes_Tarde" value="viernes" <?php if(($horario['viernes_tarde'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Tarde">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_tarde" id="Sabado_Tarde" value="sabado" <?php if(($horario['sabado_tarde'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_Tarde">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_tarde" id="Domingo_Tarde" value="domingo" <?php if(($horario['domingo_tarde'])=='domingo') { echo ' checked'; } ?>> <br>


                            <!--HORARIO ESPECIAL 1-->
                             <br><hr>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Añadir horario especial:</label>
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Mañana:</label>
                            <br>
                            <label>Inicio</label>
                            <select class="etiqueta_26" name="iniciaMañanaEsp_1"> 
                                <option><?php echo $horario['inicia_mañanaEsp_1'];?></option>
                                <option></option>
                                <option>06:00 am</option>
                                <option>06:30 am</option>
                                <option>07:00 am</option>
                                <option>07:30 am</option>
                                <option>08:00 am</option>
                                <option>08:30 am</option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                            </select> <br>

                            <label>Culmina</label>  
                            <select class="etiqueta_26" name="culminaMañanaEsp_1" id="CiudadEsp">
                                <option><?php echo $horario['culmina_mañanaEsp_1'];?></option> 
                                <option></option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                                <option>12:30 pm</option>
                                <option>01:00 pm</option>
                                <option>01:30 pm</option>
                                <option>02:00 pm</option>
                            </select> 
                            <br>
                            <label class="etiqueta_9" for="Lunes_Mañana">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_mañanaEsp_1" value="lunes" 
                                    <?php 
                                        if(($horario['lunes_mañanaEsp_1'])=='lunes'){
                                            echo 'checked';
                                    }?> > 
                            <br>                   
                            <label class="etiqueta_9" for="Martes_Mañana">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_mañanaEsp_1" value="martes"  <?php if(($horario['martes_mañanaEsp_1'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Mañana">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_mañanaEsp_1" value="miercoles"  <?php if(($horario['miercoles_mañanaEsp_1'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Mañana">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_mañanaEsp_1" value="jueves" <?php if(($horario['jueves_mañanaEsp_1'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Mañana">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_mañanaEsp_1" value="viernes" <?php if(($horario['viernes_mañanaEsp_1'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Mañana">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_mañanaEsp_1" value="sabado" <?php if(($horario['sabado_mañanaEsp_1'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_MañanaEsp_1">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_mañanaEsp_1" value="domingo" <?php if(($horario['domingo_mañanaEsp_1'])=='domingo') { echo ' checked'; } ?>> <br>
                           
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Tarde:</label>
                            <br>
                            <label>Inicio</label>
                                <select class="etiqueta_26" name="iniciaTardeEsp_1"> 
                                    <option><?php echo $horario['inicia_tardeEsp_1'];?></option>
                                    <option></option>
                                    <option>12:00 m</option>
                                    <option>12:30 pm</option>
                                    <option>01:00 pm</option>
                                    <option>01:30 pm</option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select> <br> 
                            <label>Culmina</label>
                                <select class="etiqueta_26" name="culminaTardeEsp_1"> 
                                    <option><?php echo $horario['culmina_tardeEsp_1'];?></option>
                                    <option></option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select>
                            
                            <br>
                            <label class="etiqueta_9" for="Lunes_Tarde">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_tardeEsp_1" value="lunes"  <?php if(($horario['lunes_tardeEsp_1'])=='lunes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Martes_Tarde">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_tardeEspEsp_1" value="martes" <?php if(($horario['martes_tardeEsp_1'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Tarde">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_tardeEsp_1" value="miercoles" <?php if(($horario['miercoles_tardeEsp_1'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Tarde">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_tardeEsp_1" value="jueves" <?php if(($horario['jueves_tardeEsp_1'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Tarde">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_tardeEsp_1" value="viernes" <?php if(($horario['viernes_tardeEsp_1'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Tarde">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_tardeEsp_1" value="sabado" <?php if(($horario['sabado_tardeEsp_1'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_TardeEsp_1">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_tardeEsp_1" value="domingo" <?php if(($horario['domingo_tardeEsp_1'])=='domingo') { echo ' checked'; } ?>> <br>

                            <!--HORARIO ESPECIAL 2-->
                             <br><hr>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Añadir horario especial:</label>
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Mañana:</label>
                            <br>
                            <label>Inicio</label>
                            <select class="etiqueta_26" name="iniciaMañanaEsp_2"> 
                                <option><?php echo $horario['inicia_mañanaEsp_2'];?></option>
                                <option></option>
                                <option>06:00 am</option>
                                <option>06:30 am</option>
                                <option>07:00 am</option>
                                <option>07:30 am</option>
                                <option>08:00 am</option>
                                <option>08:30 am</option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                            </select> <br>

                            <label>Culmina</label>  
                            <select class="etiqueta_26" name="culminaMañanaEsp_2" id="CiudadEsp">
                                <option><?php echo $horario['culmina_mañanaEsp_2'];?></option> 
                                <option></option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                                <option>12:30 pm</option>
                                <option>01:00 pm</option>
                                <option>01:30 pm</option>
                                <option>02:00 pm</option>
                            </select> 
                            <br>
                            <label class="etiqueta_9" for="Lunes_Mañana">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_mañanaEsp_2" value="lunes" 
                                    <?php 
                                        if(($horario['lunes_mañanaEsp_2'])=='lunes'){
                                            echo 'checked';
                                    }?> > 
                            <br>                   
                            <label class="etiqueta_9" for="Martes_Mañana">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_mañanaEsp_2" value="martes"  <?php if(($horario['martes_mañanaEsp_2'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Mañana">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_mañanaEsp_2" value="miercoles"  <?php if(($horario['miercoles_mañanaEsp_2'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Mañana">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_mañanaEsp_2" value="jueves" <?php if(($horario['jueves_mañanaEsp_2'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Mañana">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_mañanaEsp_2" value="viernes" <?php if(($horario['viernes_mañanaEsp_2'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Mañana">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_mañanaEsp_2" value="sabado" <?php if(($horario['sabado_mañanaEsp_2'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_MañanaEsp_2">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_mañanaEsp_2" value="domingo" <?php if(($horario['domingo_mañanaEsp_2'])=='domingo') { echo ' checked'; } ?>> <br>
                           
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Tarde:</label>
                            <br>
                            <label>Inicio</label>
                                <select class="etiqueta_26" name="iniciaTardeEsp_2"> 
                                    <option><?php echo $horario['inicia_tardeEsp_2'];?></option>
                                    <option></option>
                                    <option>12:00 m</option>
                                    <option>12:30 pm</option>
                                    <option>01:00 pm</option>
                                    <option>01:30 pm</option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select> <br> 
                            <label>Culmina</label>
                                <select class="etiqueta_26" name="culminaTardeEsp_2"> 
                                    <option><?php echo $horario['culmina_tardeEsp_2'];?></option>
                                    <option></option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select>
                            
                            <br>
                            <label class="etiqueta_9" for="Lunes_Tarde">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_tardeEsp_2" value="lunes"  <?php if(($horario['lunes_tardeEsp_2'])=='lunes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Martes_Tarde">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_tardeEsp_2" value="martes" <?php if(($horario['martes_tardeEsp_2'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Tarde">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_tardeEsp_2" value="miercoles" <?php if(($horario['miercoles_tardeEsp_2'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Tarde">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_tardeEsp_2" value="jueves" <?php if(($horario['jueves_tardeEsp_2'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Tarde">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_tardeEsp_2" value="viernes" <?php if(($horario['viernes_tardeEsp_2'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Tarde">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_tardeEsp_2" value="sabado" <?php if(($horario['sabado_tardeEsp_2'])=='sabado') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Domingo_TardeEsp_2">domingo</label>
                            <input class="etiqueta_10"  type="checkbox" name="domingo_tardeEsp_2" value="domingo" <?php if(($horario['domingo_tardeEsp_2'])=='domingo') { echo ' checked'; } ?>> <br>

                             <br>
        </fieldset>