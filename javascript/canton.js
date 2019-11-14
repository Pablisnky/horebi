function SeleccionarCanton(form){
    
    var Pais = form.pais.options;//se captura el elemento select que contiene los Paiss
    var Provincia = form.provincia.options;//se captura el elemento select que contiene los Paiss
    var Canton = form.canton.options;//se captura el elemento select que contiene los Paiss
    Canton.length = null;

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Pais[2].selected == true){//Ecuador
        if(Provincia[0].selected == true){
            Canton[0] = new Option("");
        }
        if(Provincia[1].selected == true){//Azuay
            Canton[0] = new Option("");
            Canton[1] = new Option("Cuenca");
            Canton[2] = new Option("Camilo Ponce Enríquez");
            Canton[3] = new Option("Chordeleg");
            Canton[4] = new Option("El Pan");
            Canton[5] = new Option("Girón");   
            Canton[6] = new Option("Guachapala"); 
            Canton[7] = new Option("Gualaceo"); 
            Canton[8] = new Option("Nabón"); 
            Canton[9] = new Option("Oña"); 
            Canton[10] = new Option("Paute"); 
            Canton[11] = new Option("Pucará");  
            Canton[12] = new Option("San Fernando");  
            Canton[13] = new Option("Santa Isabel");  
            Canton[14] = new Option("Sevilla de Oro");  
            Canton[15] = new Option("Sígsig");  
        }
        if(Provincia[2].selected == true){//Bolívar
            Canton[0] = new Option("");
            Canton[1] = new Option("Guaranda");
            Canton[2] = new Option("Caluma");
            Canton[3] = new Option("Chillanes");
            Canton[4] = new Option("Chimbo"); 
            Canton[5] = new Option("Echeandía");
            Canton[6] = new Option("Las Naves"); 
            Canton[7] = new Option("San Miguel");   
        }
        if(Provincia[3].selected == true){//Cañar
            Canton[0] = new Option("");
            Canton[1] = new Option("Azogues");
            Canton[2] = new Option("Biblián");
            Canton[3] = new Option("Cañar");
            Canton[4] = new Option("Déleg");  
            Canton[5] = new Option("El Tambo"); 
            Canton[6] = new Option("La Troncal"); 
            Canton[7] = new Option("Suscal");   
        }
        if(Provincia[4].selected == true){//Carchi
            Canton[0] = new Option("");
            Canton[1] = new Option("Tulcán");
            Canton[2] = new Option("Bolívar");
            Canton[3] = new Option("Espejo");
            Canton[4] = new Option("Mira");  
            Canton[5] = new Option("Montúfar"); 
            Canton[6] = new Option("San Pedro de Huaca");   
        }
        if(Provincia[5].selected == true){//Chimborazo
            Canton[0] = new Option("");
            Canton[1] = new Option("Riobamba");
            Canton[2] = new Option("Alausí");
            Canton[3] = new Option("Chambo");
            Canton[4] = new Option("Chunchi");  
            Canton[5] = new Option("Colta"); 
            Canton[6] = new Option("Cumandá"); 
            Canton[7] = new Option("Guamote"); 
            Canton[8] = new Option("Guano"); 
            Canton[9] = new Option("Pallatanga"); 
            Canton[10] = new Option("Penipe");   
        }
        if(Provincia[6].selected == true){//Cotopaxi
            Canton[0] = new Option("");
            Canton[1] = new Option("Latacunga");
            Canton[2] = new Option("La Maná");
            Canton[3] = new Option("Pangua");
            Canton[4] = new Option("Pujilí"); 
            Canton[5] = new Option("Salcedo");
            Canton[6] = new Option("Saquisilí");
            Canton[7] = new Option("Sigchos");   
        }
        if(Provincia[7].selected == true){//El Oro
            Canton[0] = new Option("");
            Canton[1] = new Option("Machala");
            Canton[2] = new Option("Arenillass");
            Canton[3] = new Option("Atahualpa");
            Canton[4] = new Option("Balsas");
            Canton[5] = new Option("Chilla");
            Canton[6] = new Option("El Guabo");
            Canton[7] = new Option("Huaquillas");
            Canton[8] = new Option("Las Lajas");
            Canton[9] = new Option("Marcabelí");
            Canton[10] = new Option("Pasaje");
            Canton[11] = new Option("Piñas");
            Canton[12] = new Option("Portovelo");
            Canton[13] = new Option("Santa Rosa"); 
            Canton[14] = new Option("Zaruma");    
        }
        if(Provincia[8].selected == true){//Esmeraldas
            Canton[0] = new Option("");
            Canton[1] = new Option("Esmeraldas");
            Canton[2] = new Option("Atacames");
            Canton[3] = new Option("Eloy Alfaro");
            Canton[4] = new Option("Muisne"); 
            Canton[5] = new Option("Quinindé"); 
            Canton[6] = new Option("Rioverde"); 
            Canton[7] = new Option("San Lorenzo");    
        }
        if(Provincia[9].selected == true){//Galápagos
            Canton[0] = new Option("");
            Canton[1] = new Option("San Cristóbal");
            Canton[2] = new Option("Isabela");
            Canton[3] = new Option("Santa Cruz");   
        }
        if(Provincia[10].selected == true){//Imbabura
            Canton[0] = new Option("");
            Canton[1] = new Option("Ibarra");
            Canton[2] = new Option("Antonio Ante");
            Canton[3] = new Option("Cotacachi");
            Canton[4] = new Option("Otavalo"); 
            Canton[5] = new Option("Pimampiro");
            Canton[6] = new Option("San Miguel de Urcuquí");  
        }
        if(Provincia[11].selected == true){//Loja
            Canton[0] = new Option("");
            Canton[1] = new Option("Loja");
            Canton[2] = new Option("Calvas");
            Canton[3] = new Option("Catamayo");
            Canton[4] = new Option("Celica"); 
            Canton[5] = new Option("Chaguarpamba"); 
            Canton[6] = new Option("Espíndola"); 
            Canton[7] = new Option("Gonzanamá"); 
            Canton[8] = new Option("Macará"); 
            Canton[9] = new Option("Olmedo"); 
            Canton[10] = new Option("Paltas"); 
            Canton[11] = new Option("Pindal"); 
            Canton[12] = new Option("Puyango"); 
            Canton[13] = new Option("Quilanga"); 
            Canton[14] = new Option("Saraguro"); 
            Canton[15] = new Option("Sozoranga"); 
            Canton[16] = new Option("Zapotillo");     
        }
        if(Provincia[12].selected == true){//Los Ríos
            Canton[0] = new Option("");
            Canton[1] = new Option("Babahoyo");
            Canton[2] = new Option("Baba");
            Canton[3] = new Option("Buena Fe");
            Canton[4] = new Option("Mocache"); 
            Canton[5] = new Option("Montalvo"); 
            Canton[6] = new Option("Palenque"); 
            Canton[7] = new Option("Puebloviejo"); 
            Canton[8] = new Option("Quevedo"); 
            Canton[9] = new Option("Quinsaloma"); 
            Canton[10] = new Option("Urdaneta"); 
            Canton[11] = new Option("Valencia"); 
            Canton[12] = new Option("Ventanas"); 
            Canton[13] = new Option("Vinces");   
        }
        if(Provincia[13].selected == true){//Manabí
            Canton[0] = new Option("");
            Canton[1] = new Option("Portoviejo");
            Canton[2] = new Option("24 de Mayo");
            Canton[3] = new Option("Bolívar");
            Canton[4] = new Option("Chone");
            Canton[5] = new Option("El Carmen"); 
            Canton[6] = new Option("Flavio Alfaro"); 
            Canton[7] = new Option("Jama"); 
            Canton[8] = new Option("Jaramijó"); 
            Canton[9] = new Option("Jipijapa"); 
            Canton[10] = new Option("Junín"); 
            Canton[11] = new Option("Cantón Manta"); 
            Canton[12] = new Option("Montecristi"); 
            Canton[13] = new Option("Olmedo"); 
            Canton[14] = new Option("Paján"); 
            Canton[15] = new Option("Pedernales"); 
            Canton[16] = new Option("Pichincha"); 
            Canton[17] = new Option("Puerto López"); 
            Canton[18] = new Option("Rocafuerte"); 
            Canton[19] = new Option("San Vicente"); 
            Canton[20] = new Option("Santa Ana"); 
            Canton[21] = new Option("Sucre"); 
            Canton[22] = new Option("Tosagua");    
        }
        if(Provincia[14].selected == true){//Morona Santiago
            Canton[0] = new Option("");
            Canton[1] = new Option("Morona");
            Canton[2] = new Option("Gualaquiza");
            Canton[3] = new Option("Huamboya");
            Canton[4] = new Option("Limón Indanza");   
            Canton[5] = new Option("Logroño"); 
            Canton[6] = new Option("Pablo Sexto"); 
            Canton[7] = new Option("Palora"); 
            Canton[8] = new Option("San Juan Bosco "); 
            Canton[9] = new Option("Santiago de Méndez"); 
            Canton[10] = new Option("Sucúa"); 
            Canton[11] = new Option("Taisha"); 
            Canton[12] = new Option("Tiwintza");   
        }
        if(Provincia[15].selected == true){//Napo
            Canton[0] = new Option("");
            Canton[1] = new Option("Tena");
            Canton[2] = new Option("Archidona");
            Canton[3] = new Option("Carlos Julio Arosemena Tola");
            Canton[4] = new Option("El Chaco"); 
            Canton[4] = new Option("Quijos");   
        }
        if(Provincia[16].selected == true){//Orellana
            Canton[0] = new Option("");
            Canton[1] = new Option("Francisco de Orellana");
            Canton[2] = new Option("Aguarico");
            Canton[3] = new Option("La Joya de los Sachas");
            Canton[4] = new Option("Loreto");   
        }
        if(Provincia[17].selected == true){//Pastaza
            Canton[0] = new Option("");
            Canton[1] = new Option("Pastaza");
            Canton[2] = new Option("Arajuno");
            Canton[3] = new Option("Mera");
            Canton[4] = new Option("Santa Clara");   
        }
        if(Provincia[18].selected == true){//Pichincha
            Canton[0] = new Option("");
            Canton[1] = new Option("Quito");
            Canton[2] = new Option("Cayambe");
            Canton[3] = new Option("Mejía");
            Canton[4] = new Option("Pedro Moncayo"); 
            Canton[5] = new Option("Pedro Vicente Maldonado");
            Canton[6] = new Option("Puerto Quito");
            Canton[7] = new Option("Rumiñahui");
            Canton[8] = new Option("San Miguel de los Bancos");   
        }
        if(Provincia[19].selected == true){//Santa Elena
            Canton[0] = new Option("");
            Canton[1] = new Option("Santa Elena");
            Canton[2] = new Option("La Libertad");
            Canton[3] = new Option("Salinas"); 
        }
        if(Provincia[20].selected == true){//Santo Domingo de los Tsáchilas
            Canton[0] = new Option("");
            Canton[1] = new Option("Santo Domingo");
            Canton[2] = new Option("La Concordia"); 
        }
        if(Provincia[21].selected == true){//Sucumbíos
            Canton[0] = new Option("");
            Canton[1] = new Option("Cascales");
            Canton[2] = new Option("Cuyabeno");
            Canton[3] = new Option("Gonzalo Pizarro");
            Canton[4] = new Option("Lago Agrio");  
            Canton[5] = new Option("Putumayo");
            Canton[6] = new Option("Shushufindi");
            Canton[7] = new Option("Sucumbíos");  
        }
        if(Provincia[22].selected == true){//Tungurahua
            Canton[0] = new Option("");
            Canton[1] = new Option("Ambato");
            Canton[2] = new Option("Baños");
            Canton[3] = new Option("Cevallos");
            Canton[4] = new Option("Mocha");    
            Canton[5] = new Option("Patate"); 
            Canton[6] = new Option("Pelileo");  
            Canton[7] = new Option("Quero"); 
            Canton[8] = new Option("Santiago de Píllaro"); 
            Canton[9] = new Option("Tisaleo"); 
        }
        if(Provincia[23].selected == true){//Zamora Chinchipe
            Canton[0] = new Option("");
            Canton[1] = new Option("Zamora");
            Canton[2] = new Option("Centinela del Cóndor");
            Canton[3] = new Option("Chinchipe");
            Canton[4] = new Option("El Pangui");  
            Canton[5] = new Option("Nangaritza");  
            Canton[6] = new Option("Palanda");  
            Canton[7] = new Option("Paquisha");  
            Canton[8] = new Option("Yacuambi");  
            Canton[9] = new Option("Yantzaza");   
        }
        if(Provincia[24].selected == true){//Guayas
            Canton[0] = new Option("");
            Canton[1] = new Option("Guayaquil");
            Canton[2] = new Option("Alfredo Baquerizo Moreno");
            Canton[3] = new Option("Balao");
            Canton[4] = new Option("Balzar"); 
            Canton[5] = new Option("Colimes"); 
            Canton[6] = new Option("Daule"); 
            Canton[7] = new Option("Durán"); 
            Canton[8] = new Option("El Empalme"); 
            Canton[9] = new Option("El Triunfo"); 
            Canton[10] = new Option("General Antonio Elizalde"); 
            Canton[11] = new Option("Isidro Ayora"); 
            Canton[12] = new Option("Lomas de Sargentillo"); 
            Canton[13] = new Option("Marcelino Maridueña"); 
            Canton[14] = new Option("Milagro"); 
            Canton[15] = new Option("Naranjal"); 
            Canton[16] = new Option("Naranjito"); 
            Canton[17] = new Option("Nobol"); 
            Canton[18] = new Option("Palestina"); 
            Canton[19] = new Option("Pedro Carbo"); 
            Canton[20] = new Option("Playas"); 
            Canton[21] = new Option("Salitre"); 
            Canton[22] = new Option("Samborondón"); 
            Canton[23] = new Option("Santa Lucía"); 
            Canton[24] = new Option("Simón Bolívar"); 
            Canton[25] = new Option("Yaguachi"); 
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Pais[1].selected == true){//Colombia
        if(Provincia[0].selected == true){
            Canton[0] = new Option("espere","");
        }
        if(Provincia[1].selected == true){//
            Canton[0] = new Option("");
            Canton[1] = new Option("Anaco");
            Canton[2] = new Option("San Joaquín");     
        }
        if(Provincia[2].selected == true){//
            Canton[0] = new Option("");
            Canton[1] = new Option("Cachipo");
            Canton[2] = new Option("Aragua de Barcelona");     
        }
        if(Provincia[3].selected == true){//Bolivar
            Canton[0] = new Option("");
            Canton[1] = new Option("Bergantín");
            Canton[2] = new Option("Caigua");
            Canton[3] = new Option("El Carmen");
            Canton[4] = new Option("El Pilar");
            Canton[5] = new Option("Naricual");
            Canton[6] = new Option("San Cristóbal");    
        }
        if(Provincia[4].selected == true){//Bruzual
            Canton[0] = new Option("");
            Canton[1] = new Option("Clarines");
            Canton[2] = new Option("Guanape");
            Canton[3] = new Option("Sabana de Uchire");     
        }
        if(Provincia[5].selected == true){//Carvajal
            Canton[0] = new Option("");
            Canton[1] = new Option("Valle de Guanape");
            Canton[2] = new Option("Santa Bárbara");    
        }
        if(Provincia[6].selected == true){//Cajigal
            Canton[0] = new Option("");
            Canton[1] = new Option("Onoto");
            Canton[2] = new Option("San Pablo");     
        }
        if(Provincia[7].selected == true){//Diego Bautista Urbaneja
            Canton[0] = new Option("");
            Canton[1] = new Option("Lechería");
            Canton[2] = new Option("El Morro");     
        }
        if(Provincia[8].selected == true){//Freites
            Canton[0] = new Option("");
            Canton[1] = new Option("Cantaura");
            Canton[2] = new Option("Libertador");
            Canton[3] = new Option("Santa Rosa");
            Canton[4] = new Option("Urica");     
        }
        if(Provincia[9].selected == true){//Guanta
            Canton[0] = new Option("");
            Canton[1] = new Option("Guanta");
            Canton[2] = new Option("Chorrerón");     
        }
        if(Provincia[10].selected == true){//Guanipa
            Canton[0] = new Option("");
            Canton[1] = new Option("San José de Guanipa");     
        }
        if(Provincia[11].selected == true){//Independencia
            Canton[0] = new Option("");
            Canton[1] = new Option("Mamo");
            Canton[2] = new Option("Soledad"); 
        }
        if(Provincia[12].selected == true){//Libertad
            Canton[0] = new Option("");
            Canton[1] = new Option("San Mateo");
            Canton[2] = new Option("El Carito");
            Canton[3] = new Option("Santa Inés");
            Canton[4] = new Option("La Romereña");     
        }
        if(Provincia[13].selected == true){//Miranda
            Canton[0] = new Option("");
            Canton[1] = new Option("Atapirire");
            Canton[2] = new Option("Boca del Pao");
            Canton[3] = new Option("El Pao");
            Canton[4] = new Option("Pariaguán");  
        }
        if(Provincia[14].selected == true){//Monagas
            Canton[0] = new Option("");
            Canton[1] = new Option("Mapire");
            Canton[2] = new Option("Piar");
            Canton[3] = new Option("Santa Clara");
            Canton[4] = new Option("San Diego de Cabrutica");
            Canton[5] = new Option("Uverito");
            Canton[6] = new Option("Zuata");    
        }
        if(Provincia[15].selected == true){//Peñalver
            Canton[0] = new Option("");
            Canton[1] = new Option("Puerto Píritu");
            Canton[2] = new Option("San Miguel");
            Canton[3] = new Option("Sucre");  
        }
        if(Provincia[16].selected == true){//Piritu
            Canton[0] = new Option("");
            Canton[1] = new Option("Píritu");
            Canton[2] = new Option("San Francisco");   
        }
        if(Provincia[17].selected == true){//San Juan de Capistrano
            Canton[0] = new Option("");
            Canton[1] = new Option("Boca de Uchire");
            Canton[2] = new Option("Boca de Chávez");    
        }
        if(Provincia[18].selected == true){//Santa Ana
            Canton[0] = new Option("");
            Canton[1] = new Option("Pueblo Nuevo");
            Canton[2] = new Option("Santa Ana");     
        }
        if(Provincia[19].selected == true){//Simón Rodríguez
            Canton[0] = new Option("");
            Canton[1] = new Option("Edmundo Barrios");
            Canton[2] = new Option("Miguel Otero Silva");    
        }
        if(Provincia[20].selected == true){//Sir Arthur McGregor
            Canton[0] = new Option("");
            Canton[1] = new Option("El Chaparro");
            Canton[2] = new Option("Tomás Alfaro");
            Canton[3] = new Option("Calatrava");     
        }
        if(Provincia[21].selected == true){//Sotillo
            Canton[0] = new Option("");
            Canton[1] = new Option("Puerto La Cruz");
            Canton[2] = new Option("Pozuelos");     
        }
    }       
}
    