//Verifica que no esten vacios los datos de los productos cargados, invocada desde perfil_comerciante.php
    function validar_galeria(){
        var A= document.getElementById("DescripcionPro");
        var B= document.getElementById("Precio_MayPro");
        var C= document.getElementById("Precio_MenPro");
        if(A.value == ""){
            alert("Es necesario dar la descripción del producto");
        }
        else if(B.value == ""){
            alert("Es necesario dar el precio al mayor del producto");
        }
        else if(C.value == ""){
            alert("Es necesario dar el precio por unidad del producto");
        }        
       return false;
    }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
//valida el formulario de registro de profesionales en registroProfesional.php
// el campo correo se valida en tiempo de ejecución por medio del evento onblur (avadona del foco)
    function validar_04(){
        var Nombre = document.AfiliacionProfesional.nombre;
        var Apellido = document.AfiliacionProfesional.apellido;
        var Cedula= document.AfiliacionProfesional.cedula;
        var Telefono= document.AfiliacionProfesional.telefono;
        // var Profesion = document.AfiliacionProfesional.categoria; -select
        // var Profesion = document.AfiliacionProfesional.pais; -select
        // var Profesion = document.AfiliacionProfesional.provincia; -select
        // var Profesion = document.AfiliacionProfesional.canton; -select
        // var Profesion = document.AfiliacionProfesional.departamento; -select
        // var Profesion = document.AfiliacionProfesional.municipio_Col; -select
        // var Profesion = document.AfiliacionProfesional.estado; -select
        // var Profesion = document.AfiliacionProfesional.municipio; -select
        // var Profesion = document.AfiliacionProfesional.usuario; -select
        var Contrasena = document.AfiliacionProfesional.contrasena; 
        var RepiteContrasena = document.AfiliacionProfesional.repiteContrasena;        

        if(Nombre.value =="" || Nombre.value.indexOf(" ") == 0 || (isNaN(Nombre.value)==false)  || Nombre.value.length>20){
            alert ("Indique su nombre");
            document.getElementById("Nombre").value = "";
            document.getElementById("Nombre").focus();
           return false;
        }
        else if(Apellido.value =="" || Apellido.value.indexOf(" ") == 0 || (isNaN(Apellido.value)==false) || Apellido.value.length>20){
           alert ("Indique su apellido");
           document.getElementById("Apellido").value = "";
           document.getElementById("Apellido").focus();
           return false;
        }
        else if(Cedula.value =="" || Cedula.value.indexOf(" ") == 0 || (isNaN(Cedula.value)==true) || Cedula.value.length>20){
            alert ("Indique su Cedula");
            document.getElementById("Cedula").value = "";
            document.getElementById("Cedula").focus();
           return false;
        }
        else if(Telefono.value =="" || Telefono.value.indexOf(" ") == 0 || (isNaN(Telefono.value)==true) || Telefono.value.length>20){
           alert ("Indique el Telefono");
           document.getElementById("Telefono").value = "";
           document.getElementById("Telefono").focus();
           return false;
        }
        else if(Usuario.value =="" || Usuario.value.indexOf(" ") == 0 || Usuario.value.length>20){
           alert ("Indique el usuario");
           document.getElementById("Usuario").value = "";
           document.getElementById("Usuario").focus();
           return false;
        }
        else if(Contrasena.value =="" || Contrasena.value.indexOf(" ") == 0 || Contrasena.value.length>4){
           alert ("Indique la Contraseña");
           document.getElementById("Contrasena").value = "";
           document.getElementById("Contrasena").focus();
           return false;
        }
        else if(RepiteContrasena.value =="" || RepiteContrasena.value.indexOf(" ") == 0 || RepiteContrasena.value.length>4){
           alert ("Repita la contraseña");
           document.getElementById("RepiteContrasena").value = "";
           document.getElementById("RepiteContrasena").focus();
           return false;
        }
        //verifica que las contraseñas sean iguales, invocada desde registroProfesional.php
            if(Contrasena.value != RepiteContrasena.value){
                alert("La contraseña no coincide");
                document.getElementById("RepiteContrasena").value = "";
                document.getElementById("RepiteContrasena").focus();
                return false;
            }
    }

//Impide que se inserte un correo invalido invocada desde registroProfesional.php
    function validarFormatoCorreo(){ 
        if(document.getElementById("Telefono").style.backgroundColor == 'red'){//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
            if(avisado== false){
                avisado= true; 
                setTimeout("avisado= false",50);
                document.getElementById("Correo").blur();           
            }
        }  
        else{
            campo = event.target;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if(emailRegex.test(campo.value)){      
               return true;
            } 
            else{
                alert("Correo no aceptado");      
                document.getElementById("Correo").style.backgroundColor="red"; 
                document.getElementById("Correo").value = "";
                //document.getElementById("Registro").blur();
            }
        }
    }

//corrige el color del campo correo, invocada desde registroProfesional.php
        function limpiarColorCorreo(){
            document.getElementById("Correo").value = "";        
            document.getElementById("Correo").style.backgroundColor = "white";

            var A= document.getElementById("Mostrar_verificaCorreo");
                if(A.style.display == "block"){
                    alert("si");
            }
        }


// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
