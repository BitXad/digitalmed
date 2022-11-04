
function validar(e,opcion){    
    var tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){
        
        if (opcion==1){
  
            buscar_pruebas();
            
        }

        
//        if (opcion==2){
//            buscarpaciente_codigo();
//        }
//        
//        if (opcion==3){
//            
//            var paciente_ci = document.getElementById("paciente_ci").value;
//            
//            if (paciente_ci == "0"){
//                buscarpaciente_nombre();                
//            }                
//            else{
//                $("#paciente_edad").focus();                
//            }
//            
//        }
        
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

function formato_fecha(string){
    fecha = string.substr(0,10);
    hora = string.substr(11,string.length-1);
//    alert(fecha+" "+hora);
    
    var info = "";
    
    if(fecha != null){
       info = fecha.split('-').reverse().join('/')+" "+hora;
    }
   // alert(info);
    return info;
}

function formato_numerico(numero){
        nStr = Number(numero).toFixed(2);
        nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	
	return x1 + x2;
}

function cargar_datos(respuesta){
   
    var p = JSON.parse(respuesta);
    var base_url = document.getElementById('base_url').value;
//    alert(p.length);
//    alert(p);
//    
    if(p!=null){
             
        var fuente = 'font-family: Arial; font-size: 14px; ';
        var fuente2 = 'font-family: Arial; font-size: 12px; ';
        var html = "";
        var total_precio = 0;
        var total_acuenta = 0;
        var total_saldo = 0;
        
        //alert(p.length);
        for (var i=0; i< p.length; i++){
            
           // alert(p[i]['estado_color']);
                               
            html +="    <tr style='background-color: #"+p[i]['estado_color']+"'>";
            
            html +="            <td>"+(i+1)+"</td>";
//            html +="            <td>"+p[i]['prueba_id']+"</td>";
            html +="            <td> <img  src='"+base_url+"resources/img/"+p[i]['paciente_foto']+"' width='60' height='60' class='img img-circle'/></td>";
            html +="            <td style='white-space: nowrap'>";
            html +="            <font style='"+fuente+"'><b>"+p[i]['paciente_nombre']+"</b></font>";
            html +="            <a href='"+base_url+"paciente/edit/1/"+p[i]['paciente_id']+"' class='btn btn-info btn-xs'><span class='fa fa-user' title='Modificar Paciente'></span> <span class='fa fa-pencil'></span> </a>" 
            html +="            <br>";
            html +="            <b>"+p[i]['paciente_codigo']+": </b>"+p[i]['paciente_ci'];
            html +="            <b>CODIGO: </b>"+p[i]['prueba_codigo'];
            html +="            <br>";
            html +="            <b>EDAD: </b>"+p[i]['paciente_edad'];
            html +="            <b>GENERO: </b>"+p[i]['genero_nombre'];
            html +="            </td>";
                        
            html +="            <td>";
            html +="            <center>";
            html +="            <b>"+p[i]['tipoprueba_descripcion']+"</b><br>";
            html +="            <a href='"+base_url+"prueba/resultado/"+p[i]['prueba_id']+"' class='btn btn-facebook btn-block btn-xs' target='_blank' title='Imprimir Resultado'><span class='fa fa-vcard-o'></span> Imprimir </a>";
            html +="            <center>";
            html +=        "</td>";
            html +="            <td style='white-space: nowrap'>";
            html +="            <b>SOLIC.:</b>";
                            
                                if(p[i]['prueba_fechasolicitud']!=null){
                                    html += formato_fecha(p[i]['prueba_fechasolicitud']);
                                }
                                
            html +="            <br>";
            html +="            <b>RECEPC.:</b>";
                            
                            if(p[i]['prueba_fecharecepcion']!=null){
                                html += formato_fecha(p[i]['prueba_fecharecepcion']); 
                            }
            html +="            <br>";
            html +="            <b>INFORME:</b>";
            
                            if(p[i]['prueba_fechainforme']!=null){
                                html+= formato_fecha(p[i]['prueba_fechainforme']); 
                            }
            html +="            </td>";
                        
            html +="            <td>"+p[i]['prueba_procedencia']+"<br>"+p[i]['prueba_medicolab']+"</td>";
                        

            html +="            <td>";
            html +="            <b style='"+fuente+"'>"+formato_numerico(p[i]['prueba_precio'])+"</b>";
                        
            html +="            </td>";
                        
            html +="            <td style='white-space: nowrap; text-align: center;'><b  style='"+fuente+"'>"+formato_numerico(p[i]['prueba_acuenta'])+"</b><br>";
                                if(p[i]['prueba_fechacuenta']!=null)
                                    html +=  formato_fecha(p[i]['prueba_fechacuenta']);
            html +=             "</td>";
                        
            html +="            <td style='white-space: nowrap; text-align: center;'><b  style='"+fuente+"'>"+formato_numerico(p[i]['prueba_precio'] - p[i]['prueba_acuenta'])+"</b><br>";

                            if(p[i]['prueba_fechasaldo']!=null)
                                html += formato_fecha(p[i]['prueba_fechasaldo'])
            html +="            </td>";
                        
            html +="            <td>";
            html +="            <b  style='"+fuente+"'>";
            html +="            "+p[i]['estado_descripcion'];
            html +="            </b><br>";
            html +="            "+p[i]['usuario_nombre'];
            html +="            </td>";
                        
            html +="            <td style='white-space: nowrap; text-align: center;'>";
//            html +="            <a href='"+base_url+"prueba/resultado/"+p[i]['prueba_id']+"' class='btn btn-facebook btn-xs' target='_blank' title='Imprimir Resultado'><span class='fa fa-vcard-o'></span> </a>";
            html +="            <a href='"+base_url+"prueba/edit/"+p[i]['prueba_id']+"' class='btn btn-info btn-xs' title='Modificar prueba'><span class='fa fa-vcard-o'></span> <span class='fa fa-pencil'></span> </a>";
//            html +="            <a href='"+base_url+"prueba/remove/'+p[i]['prueba_id']"+"' class='btn btn-danger btn-xs' target='_blank' ><span class='fa fa-trash' title='Eliminar'></span> </a>";
            if (p[i]['estado_id'] == 1)
                html +="             <button class='btn btn-danger btn-xs' onclick='cargar_modal("+p[i]['prueba_id']+")'><fa class='fa fa-heartbeat'></fa> </button>";
            
            html +="            </td>";
                        
            html +="            </tr>";

            total_precio += Number(p[i]['prueba_precio']);
            total_acuenta += Number(p[i]['prueba_acuenta']);
            total_saldo += Number(p[i]['prueba_precio']) - Number(p[i]['prueba_acuenta']);


        }
        html += "<tr>";
        html += "<th colspan='3'>TOTALES Bs</th>";
        html += "<th> </th>";
        html += "<th> </th>";
        html += "<th> </th>";
        html += "<th>"+formato_numerico(total_precio)+"</th>";
        html += "<th><b>"+formato_numerico(total_acuenta)+"</b></th>";
        html += "<th>"+formato_numerico(total_saldo)+"</th>";
        html += "<th> </th>";
        html += "<th> </th>";
        html += "</tr>";
        
        $("#tabla_pacientes").html(html);
        
        $("#filtro").focus();
        $("#filtro").select();
    }
    
        
}

function mostrar_ocultar_buscador(parametro){
    
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function buscar_pruebas(){
//    alert(parametro);
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/buscar_prueba";
    
    var estado_id = document.getElementById('select_estados').value; 
    var prueba_dia = document.getElementById('select_pruebas').value; 
    var filtro = document.getElementById('filtrar').value; 
    var parametros = " 1 = 1 "; 
    
    if(filtro.length>0){
        
        parametros += " and p.paciente_nombre like '%"+filtro+"%'"; 
    }
    else{
    
        if (estado_id>0){
            parametros = " r.estado_id = "+estado_id; 
        }
    
        if (prueba_dia>0){

            if (prueba_dia == 1)//pedidos de hoy
            {
                parametros += " and date(r.prueba_fecharegistro) = date(now())";           
                mostrar_ocultar_buscador("ocultar");
            }

            if (prueba_dia == 2)//pedidos de ayer
            {
                parametros += " and date(r.prueba_fecharegistro) = date_add(date(now()), INTERVAL -1 DAY)";
                mostrar_ocultar_buscador("ocultar");
            }

            if (prueba_dia == 3) //pedidos de la semana
            {
                parametros += " and date(r.prueba_fecharegistro) >= date_add(date(now()), INTERVAL -1 WEEK)";
                mostrar_ocultar_buscador("ocultar");
            }

            if (prueba_dia == 4) //todos los pedidos
            {   parametros += " ";
                mostrar_ocultar_buscador("ocultar");
            }

            if (prueba_dia == 5)// Por fecha 
            {
                mostrar_ocultar_buscador("mostrar");
            }

        }
    }
    
    $.ajax({url: controlador,
           type:"POST",
           data:{parametros:parametros},
           success:function(respuesta){     
                    
                    var res = JSON.parse(respuesta);
                    
                    if (res.length>0){
                        
                        cargar_datos(respuesta);                                            
                    }
                    else{                        
                        html = "";
                        $("#tabla_pacientes").html(html);
                    }
                    
               
               
               
//               var paciente = JSON.parse(respuesta);
//                
//               if (paciente.length>0){
//                   //alert(paciente.length);
//                   
//                    cargar_datos(respuesta);                           
//                    //cargar_datos(JSON.stringify(paciente));                           
//                 
//               }
//               else{                
//                    //alert("hola para por aqui...");
//                    cargar_datos(null); 
//               }
           
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
    var prueba_descricpion = "-"; //document.getElementById("prueba_descricpion").value;
    var prueba_resultados = "-"; //document.getElementById("prueba_resultados").value;
    var prueba_observacion = "-"; //document.getElementById("prueba_observacion").value;
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
    
    /////window.open(base_url+"prueba/", "_self");
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

function cargar_modal(prueba_id){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/buscar_prueba"
    var parametros = " r.prueba_id = "+prueba_id;
    //alert(controlador);
    
    $.ajax({url: controlador,
           type:"POST",
           data:{parametros:parametros},
           success:function(respuesta){     
               
               var paciente = JSON.parse(respuesta);
                
               if (paciente != null){
                   //alert(paciente.length);
                   
                   for(var i = 0; i < paciente.length; i++){
                        $("#prueba_id").val(paciente[i]["prueba_id"]);
                        $("#prueba_fechasolicitud").val(paciente[i]["prueba_fechasolicitud"]);
                        $("#prueba_fechainforme").val(paciente[i]["prueba_fechainforme"]);
                        $("#prueba_medicolab").val(paciente[i]["prueba_medicolab"]);
                        $("#prueba_procedencia").val(paciente[i]["prueba_procedencia"]);
                        $("#prueba_procedencia").val(paciente[i]["prueba_procedencia"]);
                        $("#prueba_nombreanalisis").val(paciente[i]["prueba_nombreanalisis"]);
                        $("#prueba_descricpion").val(paciente[i]["prueba_descricpion"]);
                        $("#prueba_resultados").val(paciente[i]["prueba_resultados"]);
                        $("#prueba_observacion").val(paciente[i]["prueba_observacion"]);
                        $("#prueba_precio").val(paciente[i]["prueba_precio"]);
                        $("#prueba_acuenta").val(paciente[i]["prueba_acuenta"]);
                        $("#prueba_saldo").val(paciente[i]["prueba_precio"] - paciente[i]["prueba_acuenta"]);

                       
                   }
                   $("#boton_modalprueba").click();
               }
               else{ cargar_datos(null); }
           
        },
        error:function(respuesta){
               cargar_datos(null);
        }
        
    });   
        
}

function actualizar_prueba(tipo){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/actualizar_prueba"           

    var prueba_id = document.getElementById("prueba_id").value;
    var prueba_fechasolicitud = "";
        prueba_fechasolicitud = document.getElementById("prueba_fechasolicitud").value;
        prueba_fechasolicitud = prueba_fechasolicitud.replace("T"," ");
        
    var prueba_medicolab = document.getElementById("prueba_medicolab").value;
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
    var prueba_saldo = document.getElementById("prueba_saldo").value;
    var estado_id = 3; // document.getElementById("estado_id").value;    
    
    
    $.ajax({url: controlador,
           type:"POST",
           data:{prueba_fechasolicitud:prueba_fechasolicitud, prueba_id:prueba_id,
                 prueba_medicolab:prueba_medicolab, prueba_procedencia:prueba_procedencia, prueba_procedencia:prueba_procedencia,
                 prueba_fechainforme: prueba_fechainforme, prueba_nombreanalisis:prueba_nombreanalisis, prueba_descricpion:prueba_descricpion,prueba_resultados:prueba_resultados,
                 prueba_observacion:prueba_observacion, prueba_precio:prueba_precio, prueba_acuenta:prueba_acuenta, prueba_saldo:prueba_saldo,estado_id:estado_id
                },
           success:function(respuesta){     
              
           
        },
        error:function(respuesta){
               cargar_datos(null);
        }
        
    });    
    
    $("#cerrar_modalprueba").click();
    window.open(base_url+"prueba/", "_self");
    
    
}

