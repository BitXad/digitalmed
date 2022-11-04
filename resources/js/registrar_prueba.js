function validar(e,opcion){    
    var tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){
        
        if (opcion==1){
            var ci = document.getElementById("paciente_ci").value;
            
            if (ci == ''){
                //alert("por aquii");
                var cod = generar_codigo();
                $("#paciente_ci").val(cod);
                $("#paciente_nombre").focus();
                $("#paciente_nombre").select();                
            }
            else{
                buscarpaciente_ci();                
            }
            
        }
        
        if (opcion==2){
            buscarpaciente_codigo();
        }
        
        if (opcion==3){
            
            var paciente_ci = document.getElementById("paciente_ci").value;
            
            if (paciente_ci == "0"){
                buscarpaciente_nombre();                
            }                
            else{
                $("#paciente_edad").focus();                
            }
            
        }
        
    }
}

function seleccionar(opcion){    
 
    if (opcion==1){
        $("#paciente_ci").select();
        $("#paciente_ci").focus();
    }

    if (opcion==2){
       // buscarpaciente_codigo();
    }

    if (opcion==3){
        $("#paciente_nombre").select();
        $("#paciente_nombre").focus();
    }

    if (opcion==7){
        $("#prueba_precio").select();
        $("#prueba_precio").focus();
    }

    if (opcion==8){
        $("#prueba_acuenta").select();
        $("#prueba_acuenta").focus();
    }

    if (opcion==9){
        $("#prueba_saldo").select();
        $("#prueba_saldo").focus();
    }

}

function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    //alert(i);
    return i;
}

function generar_codigo(){
    
    var hoy = new Date();       
    var dd = hoy.getDate().toString();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getYear().toString();
    var hh = hoy.getHours().toString();
    var nn = hoy.getMinutes().toString();
    var ss = hoy.getSeconds().toString();
        
        dd = addZero(dd);
        mm = addZero(mm);
    
    return yyyy+mm+dd+hh+nn+ss
}

function buscarpaciente_ci(){
    
    var paciente_ci = document.getElementById('paciente_ci').value;
    var parametro = " paciente_ci = '"+paciente_ci+"'";
    
    buscar_paciente(parametro,1);
    
}

function buscarpaciente_codigo(){
    var paciente_codigo = document.getElementById('paciente_codigo').value;
    var parametro = " paciente_codigo = '"+paciente_codigo+"'";
    
    buscar_paciente(parametro,1);
}

function buscarpaciente_nombre(){
    
    var paciente_nombre = document.getElementById('paciente_nombre').value;
    var parametro = " paciente_nombre like '%"+paciente_nombre+"%'";
    
    buscar_paciente(parametro,2); //buscar paciente por nombre
    
}

function cargar_datos(p){
    var paciente = JSON.parse(p)
    
    if(paciente!=null){
        $("#paciente_id").val(paciente["paciente_id"]);
        $("#paciente_ci").val(paciente["paciente_ci"]);
        $("#paciente_codigo").val(paciente["paciente_codigo"]);
        $("#paciente_nombre").val(paciente["paciente_nombre"]);
        $("#paciente_edad").val(paciente["paciente_edad"]);
        $("#genero_nombre").val(paciente["genero_id"]);
        $("#paciente_direccion").val(paciente["paciente_direccion"]);
        $("#paciente_telefono").val(paciente["paciente_telefono"]);
        $("#paciente_celular").val(paciente["paciente_celular"]);
        $("#paciente_nit").val(paciente["paciente_nit"]);
        $("#paciente_razon").val(paciente["paciente_razon"]);
        $("#tipoprueba_id").focus();
        
    }
    else{
       // $("#paciente_ci").val(0);
        $("#paciente_id").val(0);
        $("#paciente_codigo").val("-");
        $("#paciente_nombre").val("SIN NOMBRE");
        $("#paciente_edad").val(0);
        $("#genero_nombre").val(1);
        $("#paciente_direccion").val("S/N");
        $("#paciente_telefono").val(0);
        $("#paciente_celular").val(0);
        $("#paciente_nit").val(0);
        $("#paciente_razon").val("SIN NOMBRE");
        
        $("#paciente_nombre").focus();
        $("#paciente_nombre").select();
    }
        
}

function buscar_paciente(parametro,opcion){
//    alert(parametro);
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/buscar"
    
    //alert(controlador);
    
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
               
               var paciente = JSON.parse(respuesta);
                var html = "";
                
               if (paciente.length>0){
                   
                   for(var i = 0; i<paciente.length; i++){
                       
                       if (opcion==1){
                            cargar_datos(null);
                            cargar_datos(JSON.stringify(paciente[i]));                           
                       }
                       
                       if (opcion==2){ //buscar por nombre y cargar el datalist                           
                           html += "<option value='"+paciente[i]["paciente_id"]+"'>"+paciente[i]["paciente_nombre"]+"</option>";                     
                       }
                           
                   }
                   if(opcion==2){
                            $("#listapacientes").html(html);
                   }
                   
               }
               else{                
                    //alert("hola para por aqui...");
                    cargar_datos(null); 
               }
           
        },
        error:function(respuesta){
               cargar_datos(null);
        }
        
    });
}

function cargar_precio(){
//    alert(parametro);
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/buscar_tipoprueba"
    var tipoprueba_id = document.getElementById("tipoprueba_id").value;
    
    //alert(controlador);
    
    $.ajax({url: controlador,
           type:"POST",
           data:{tipoprueba_id:tipoprueba_id},
           success:function(respuesta){     
               
               var tipoprueba = JSON.parse(respuesta);
                
               if (tipoprueba != null){
                   $("#prueba_precio").val(0);
                   
                   for(var i = 0; i < tipoprueba.length; i++){
                       
                        $("#prueba_precio").val(tipoprueba[i]["tipoprueba_precio"]);
                        $("#prueba_acuenta").val(0);
                        $("#prueba_saldo").val(tipoprueba[i]["tipoprueba_precio"]);
                       
                   }
                   
               }
               else{ cargar_datos(null); }
           
        },
        error:function(respuesta){
               cargar_datos(null);
        }
        
    });
}

function calcular(){
    
    var prueba_precio = document.getElementById("prueba_precio").value;
    var prueba_acuenta = document.getElementById("prueba_acuenta").value;
    var prueba_saldo = document.getElementById("prueba_saldo").value;
    
    prueba_saldo = Number(prueba_precio) - Number(prueba_acuenta);
    $("#prueba_saldo").val(prueba_saldo);

}

function guardar_prueba(){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/registrar"           
       
    var tipoprueba_id = document.getElementById("tipoprueba_id").value;
    var paciente_id = document.getElementById("paciente_id").value;
    //var prueba_codigo = document.getElementById("prueba_codigo").value;
    var prueba_fechasolicitud = "";
        prueba_fechasolicitud = document.getElementById("prueba_fechasolicitud").value;
        prueba_fechasolicitud = prueba_fechasolicitud.replace("T"," ");
        
    var prueba_medicolab = document.getElementById("prueba_medicolab").value;
    //var prueba_fecharecepcion = document.getElementById("prueba_fecharecepcion").value;
    var prueba_procedencia = document.getElementById("prueba_procedencia").value;
    var prueba_fechainforme = "";
        prueba_fechainforme = document.getElementById("prueba_fechainforme").value;
        prueba_fechainforme = prueba_fechainforme.replace("T"," ");

    var prueba_nombreanalisis = document.getElementById("prueba_nombreanalisis").value;
    var prueba_descricpion = document.getElementById("prueba_descricpion").value;
    var prueba_resultados = document.getElementById("prueba_resultados").value;
    var prueba_observacion = document.getElementById("prueba_observacion").value;
    var prueba_precio = document.getElementById("prueba_precio").value;
    var prueba_acuenta = document.getElementById("prueba_acuenta").value;
    var prueba_fechacuenta = "";
        prueba_fechacuenta = document.getElementById("prueba_fechacuenta").value;
        prueba_fechacuenta = prueba_fechacuenta.replace("T"," ");
    
    var prueba_saldo = document.getElementById("prueba_saldo").value;
    //var prueba_fechasaldo = document.getElementById("prueba_fechasaldo").value;
    var estado_id = 1; // document.getElementById("estado_id").value;    
    
    //alert(tipoprueba_id+", "+paciente_id+", "+", "+prueba_fechasolicitud+", "+prueba_medicolab+", "+", "+prueba_procedencia+", "+prueba_fechainforme+", "+prueba_nombreanalisis+", "+prueba_descricpion+", "+prueba_resultados+", "+prueba_observacion+", "+prueba_precio+", "+prueba_acuenta+", "+prueba_fechacuenta+", "+prueba_saldo+", "+estado_id);

    var paciente_id = document.getElementById('paciente_id').value;
    //var estado_id = document.getElementById('estado_id').value;
    var genero_id = document.getElementById('genero_id').value;
    var extencion_id = 0; //document.getElementById('extencion_id').value;
    var paciente_nombre = document.getElementById('paciente_nombre').value;
    var paciente_edad = document.getElementById('paciente_edad').value;
    var paciente_direccion = document.getElementById('paciente_direccion').value;
    var paciente_codigo = document.getElementById('paciente_codigo').value;
    var paciente_ci = document.getElementById('paciente_ci').value;
    var paciente_celular = document.getElementById('paciente_celular').value;
    var paciente_telefono = document.getElementById('paciente_telefono').value;
    var paciente_nit = document.getElementById('paciente_nit').value;
    var paciente_razon = document.getElementById('paciente_razon').value;
    var paciente_foto = "foto.jpg";//document.getElementById('paciente_foto').value;
  
    
    
    $.ajax({url: controlador,
           type:"POST",
           data:{tipoprueba_id:tipoprueba_id, paciente_id:paciente_id, prueba_fechasolicitud:prueba_fechasolicitud,
                 prueba_medicolab:prueba_medicolab, prueba_procedencia:prueba_procedencia, prueba_procedencia:prueba_procedencia,
                 prueba_fechainforme: prueba_fechainforme, prueba_nombreanalisis:prueba_nombreanalisis, prueba_descricpion:prueba_descricpion,prueba_resultados:prueba_resultados,
                 prueba_observacion:prueba_observacion, prueba_precio:prueba_precio, prueba_acuenta:prueba_acuenta, prueba_fechacuenta:prueba_fechacuenta, prueba_saldo:prueba_saldo,estado_id:estado_id, 
                 paciente_id:paciente_id,genero_id:genero_id,extencion_id:extencion_id,paciente_nombre:paciente_nombre,
                 paciente_edad:paciente_edad,paciente_direccion:paciente_direccion,paciente_codigo:paciente_codigo,paciente_ci:paciente_ci,
                 paciente_celular:paciente_celular,paciente_telefono:paciente_telefono,paciente_nit:paciente_nit,paciente_razon:paciente_razon,paciente_foto:paciente_foto
                },
           success:function(respuesta){     
               
               var tipoprueba = JSON.parse(respuesta);
                
               if (tipoprueba != null){
                   $("#prueba_precio").val(0);
                   
                   for(var i = 0; i < tipoprueba.length; i++){
                       
                        $("#prueba_precio").val(tipoprueba[i]["tipoprueba_precio"]);
                        $("#prueba_acuenta").val(0);
                        $("#prueba_saldo").val(tipoprueba[i]["tipoprueba_precio"]);
                       
                   }
                   
               }
               else{ cargar_datos(null); }
           
        },
        error:function(respuesta){
               cargar_datos(null);
        }
        
    });    
    
    window.open(base_url+"prueba/", "_self");
}

function seleccionar_paciente(){
    
    var paciente_id = document.getElementById('paciente_nombre').value;
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/seleccionar_paciente";

//        alert(paciente_id)
        $.ajax({url: controlador,
            type:"POST",
            data:{paciente_id: paciente_id},
            success:function(respuesta){
                
                paciente = JSON.parse(respuesta);
                tam = paciente.length;
                                
                if (tam>=1){
                    
                    cargar_datos(JSON.stringify(paciente[0]));
                
                }
       

            },
            error: function(respuesta){
            }
        });    
    
}


