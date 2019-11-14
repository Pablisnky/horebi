function SeleccionarProvincia(form){
    
    var Pais = form.pais.options;//se captura el elemento select que contiene los Paises
    var Provincia = form.provincia.options;//se captura el elemento select que contiene las regiones
    Provincia.length = null;

    if(Pais[0].selected == true){//si la opcion cero del array select esta seleccionada, la opcion cero del array Provincia valdra 
        var destino0 = new Option("espere","");
        Provincia[0] = destino0;
    }
    if(Pais[2].selected == true){//Ecuador)
        document.getElementById("Region_1A").style.display = 'block';
        document.getElementById("Region_1B").style.display = 'none';
        document.getElementById("Region_1C").style.display = 'none';
        document.getElementById("Regiones").style.display = 'none';
    }
    if(Pais[2].selected == true){//Ecuador
        Provincia[0] = new Option("");
        Provincia[1] = new Option("Azuay");  
        Provincia[2] = new Option("Bolívar");
        Provincia[3] = new Option("Cañar");
        Provincia[4] = new Option("Carchi");
        Provincia[5] = new Option("Chimborazo");
        Provincia[6] = new Option("Cotopaxi");
        Provincia[7] = new Option("El Oro");
        Provincia[8] = new Option("Esmeraldas"); 
        Provincia[9] = new Option("Galápagos");
        Provincia[10] = new Option("Imbabura");
        Provincia[11] = new Option("Loja");
        Provincia[12] = new Option("Los Ríos");
        Provincia[13] = new Option("Manabí");
        Provincia[14] = new Option("Morona Santiago");
        Provincia[15] = new Option("Napo");
        Provincia[16] = new Option("Orellana"); 
        Provincia[17] = new Option("Pastaza");
        Provincia[18] = new Option("Pichincha");
        Provincia[19] = new Option("Santa Elena");
        Provincia[20] = new Option("Santo Domingo de los Tsáchilas");
        Provincia[21] = new Option("Sucumbíos"); //Lago Agrio
        Provincia[22] = new Option("Tungurahua");
        Provincia[23] = new Option("Zamora Chinchipe");
        Provincia[24] = new Option("Guayas");  
    }    

    if(Pais[1].selected == true){//Colombia)
        document.getElementById("Region_1B").style.display = 'block';
        document.getElementById("Region_1A").style.display = 'none';
        document.getElementById("Region_1C").style.display = 'none';
        document.getElementById("Regiones").style.display = 'none';
    }
    if(Pais[1].selected == true){//Colombia
        Departamento[0] = new Option("");
        Departamento[1] = new Option("Amazonas"); //Leticia
        Departamento[2] = new Option("Antioquía"); // Medellin
        Departamento[3] = new Option("Arauca"); // Arauca
        Departamento[4] = new Option("Atlantico"); // Barranquilla
        Departamento[5] = new Option("Bolivar");// Cartagena de Indias
        Departamento[6] = new Option("Boyacá"); //Tunja
        Departamento[7] = new Option("Caldas"); //Manizales
        Departamento[8] = new Option("Casanare"); //Yopal
        Departamento[9] = new Option("Cauca"); //Popayan
        Departamento[10] = new Option("Caquetá"); //Florencia
        Departamento[11] = new Option("César"); //Valledupar
        Departamento[12] = new Option("Chocó");  //Quibdo
        Departamento[13] = new Option("Córdoba"); // Montería
        Departamento[14] = new Option("Cundinamarca"); // Bogota
        Departamento[15] = new Option("Guainía"); // Puerto Inírida
        Departamento[16] = new Option("Guaviare"); // San José
        Departamento[17] = new Option("Huila"); // Neiva
        Departamento[18] = new Option("La Guajira"); // Riohacha
        Departamento[19] = new Option("Magdalena"); // Santa Marta
        Departamento[20] = new Option("Meta"); // Villavicencio
        Departamento[21] = new Option("Nariño"); // Pasto
        Departamento[22] = new Option("Norte de Santander"); // Cucuta
        Departamento[23] = new Option("Putumayo"); // Mocoa
        Departamento[24] = new Option("Quindío"); // Armenia
        Departamento[25] = new Option("Risaralda"); // Pereira
        Departamento[26] = new Option("San Andrés"); // San Andrés
        Departamento[27] = new Option("Santander"); // Bucaramanga
        Departamento[28] = new Option("Sucre"); // Sincelejo
        Departamento[29] = new Option("Tolima"); // Ibagué
        Departamento[30] = new Option("Valle del Cauca"); // Cali
        Departamento[31] = new Option("Vaupés"); // Mitú
        Departamento[32] = new Option("Vichada"); // Puerto Carreño
    }

    if(Pais[3].selected == true){//Venezuela)
        document.getElementById("Region_1C").style.display = 'block';
        document.getElementById("Region_1A").style.display = 'none';
        document.getElementById("Region_1B").style.display = 'none';
        document.getElementById("Regiones").style.display = 'none';
    }
    if(Pais[3].selected == true){//Venezuela
        Estado[0] = new Option("");
        Estado[1] = new Option("Amazonas");  
        Estado[2] = new Option("Anzoátegui");
        Estado[3] = new Option("Apure");
        Estado[4] = new Option("Aragua");
        Estado[5] = new Option("Barinas");
        Estado[6] = new Option("Bolivar");
        Estado[7] = new Option("Carabobo");
        Estado[8] = new Option("Cojedes");
        Estado[9] = new Option("Delta Amacuro");
        Estado[10] = new Option("Distrito Capital");
        Estado[11] = new Option("Falcon");
        Estado[12] = new Option("Guárico"); 
        Estado[13] = new Option("Lara"); 
        Estado[14] = new Option("Mérida");
        Estado[15] = new Option("Miranda"); 
        Estado[16] = new Option("Monagas");
        Estado[17] = new Option("Nueva Esparta"); 
        Estado[18] = new Option("Portuguesa"); 
        Estado[19] = new Option("Sucre"); 
        Estado[20] = new Option("Táchira");
        Estado[21] = new Option("Trujillo"); 
        Estado[22] = new Option("Vargas"); 
        Estado[23] = new Option("Yaracuy"); // San Felipe
        Estado[24] = new Option("Zulia"); 
    }
}
