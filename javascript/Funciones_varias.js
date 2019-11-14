//coloca el foco autotmaticamente en el primer input de los formularios
    function foco(id){
        document.getElementById(id).focus();   
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------ 
function Confirmacion(){
	 	if(confirm('¿Esta seguro de eliminar el registro?')==true){
			//alert('El registro ha sido eliminado correctamente!!!');
		    return true;
		}
		else{
		    //alert('Cancelo la eliminacion');
		    return false;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//menu responsive principal, llamado desde todos los archivos headerXxxxxxx.php
    function mostrarMenu(){
        var A= document.getElementById("MenuResponsive");//nav
        if(A.style.marginLeft < "0%"){
            A.style.marginLeft = "0%";
        }
        else if(A.style.marginLeft == "0%"){
            A.style.marginLeft = "-52%";
        }
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//menu responsive, llamado desde todas las paginas vistas desde un telefono. 
    function ocultarMenu(){
        if(window.screen.availWidth <= 800){//solo funciona si la pantalla es menor a 800px   
            var A= document.getElementById("MenuResponsive");
            if(A.style.marginLeft == "0%"){
                A.style.marginLeft = "-52%";
            }
        }
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//va dando en pantalla la cantidad de caracteres que quedan mientra se escribe un total de 150, llamada desde perfil_comercio.php

  function contar_2(){
         var max = 150; 
         var cadena = document.getElementById("Descripcion_1").value; 
         var longitud = cadena.length; 

             if(longitud <= max) { 
                  document.getElementById("Contador_2").value = max-longitud; 
             } else { 
                  document.getElementById("Descripcion_1").value = cadena.subtring(0, max);
             } 
    } 
        
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde contactenos.php y perfil_cpmercio.php 
	var contenido_textarea = ""; 	
	function valida_Longitud(){  
		var num_caracteres_permitidos = 800;

		//se averigua la cantidad de caracteres escritos
	   	num_caracteres = document.forms[0].contenido.value.length; 

	   	if(num_caracteres > num_caracteres_permitidos){ 
	      	document.forms[0].contenido.value = contenido_textarea; 
	   	}
	   	else{ 
	      	contenido_textarea = document.forms[0].contenido.value;	
	   	} 
	} 
       
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde perfil_comercio.php 
    var contenido_textarea_2 = "";     
    function valida_Longitud_2(){ 
        var num_caracteres_permitidos = 150;

        //se averigua la cantidad de caracteres escritos
        num_caracteres = document.forms[0].descripcion_1.value.length; 

        if(num_caracteres > num_caracteres_permitidos){ 
            document.forms[0].descripcion_1.value = contenido_textarea_2; 
        }
        else{ 
            contenido_textarea_2 = document.forms[0].descripcion_1.value; 
        } 
    } 
   
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde .php
    function resize_6(){
        var text = document.getElementById("PerfilProf");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde MiPerfil_Basico.php
    function resize_7(){
        var text = document.getElementById("Direccion");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde MiPerfil_Basico.php
    function resize_8(){
        var text = document.getElementById("CentroSalud");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

//Impide que se siga introduciendo caracteres al alcanzar el limite maximo en el telefono, llamado desde registroEspecialista.php
    var contenidoTelefono = ""; 
    var num_caracteres_permitidos = 14; 

    function valida_LongitudTelefono(){ 
       num_caracteres = document.forms[0].telefono.value.length; 

       if(num_caracteres > num_caracteres_permitidos){ 
          document.forms[0].telefono.value = contenidoTelefono; 
       }
       else{ 
          contenidoTelefono = document.forms[0].telefono.value;   
       } 
    } 

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
    //Mascara de entrada para el telefono
    // Telefono.addEventListener("input", function(){
    //     if(this.value.length == 4){
    //         this.value += "-"; 
    //     }
    //     else if(this.value.length == 8){
    //         this.value += ".";  
    //     }
    //     else if(this.value.length == 11){
    //         this.value += ".";  
    //     }
    // }, false);

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    // //Validar el formato de telefono
    // avisado=false;
    // function validarFormatoTelefono(campo){
    //     var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
    //     if((campo.match(RegExPattern)) && (campo!='')){
    //         return true;
    //     }
    //     else{
    //         alert("Telefono con formato incorrecto");
    //         document.getElementById("Telefono").value = "";
    //         document.getElementById("Telefono").style.backgroundColor = 'red'; 
    //         return false;
    //     }
    // }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
//Cambia la imagen del slider. invocada desde Tienda_Comercio.php
    function CambiarImagen(){
        var A= document.getElementById("Radio_2");
        var B= document.getElementById("Radio_4");
        var C= document.getElementById("Radio_5");
        var D= document.getElementById("Radio_6");
        var E= document.getElementById("Radio_7");
        if(B.checked ="true"){
            B.checked = "true";
        }
        else if(C.checked ="true"){
            C.checked = "true";
        }
        else if(D.checked ="true"){
            D.checked = "true";
        }
        else if(E.checked ="true"){
            E.checked = "true";
        }
    }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
//Impide que se inserte un correo repetido invocada desde registroProfesional.php
    function verificaCorreo(){
        alert("Hola");
    }
