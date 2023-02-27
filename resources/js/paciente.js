$(document).on("ready",inicio);
function inicio(){
    //mostrar_tablastratamiento(); 
} 

function cargartratamientos_afinalizar(paciente_id, paciente_nombre){
    let base_url = document.getElementById('base_url').value;
    let controlador = base_url+'paciente/tratamientos_porfinalizar';
    
    document.getElementById('loadertratamientofinalizar').style.display = 'block'; //muestra el bloque del loader
    
    $("#encontrados").html("Encontrados: 0");
    $.ajax({url: controlador,
            type:"POST",
            data:{paciente_id:paciente_id},
            success:function(respuesta){
                var lostratamientos =  JSON.parse(respuesta);
                if (lostratamientos != null){
                    let m = lostratamientos.length;
                    //$("#encontrados").html(n);
                    let html = "";
                    let totalencontrados = 0;
                    for(var k = 0; k< m ; k++){
                        let tratamientos = lostratamientos[k];
                        let n = tratamientos.length;
                        for(var i = 0; i < n ; i++){
                            totalencontrados ++;
                            html += "<tr style='background-color: #"+tratamientos[i]['estado_color']+"'>";
                            html += "<td class='text-center'>"+(i+1)+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_mes']+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_gestion']+"</td>";
                            html += "<td class='text-center'>"+moment(tratamientos[i]["tratamiento_fecha"]).format("DD/MM/YYYY")+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_hora']+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['estado_descripcion']+"</td>";
                            html += "<td class='text-center'>"; 
                            html += "<a onclick='cambiar_tratamiento_aterminado("+tratamientos[i]['tratamiento_id']+")' class='btn btn-success btn-xs' title='Finalizar tratamiento'><span class='fa fa-check-circle-o'></span></a>";
                            html += "</td>";
                            html += "</tr>";
                        }
                    }
                    $("#elpaciente").html(paciente_nombre);
                    $("#encontrados").html("Encontrados: "+totalencontrados);
                    $("#tratamientos_afinalizar").html(html);
                    document.getElementById('loadertratamientofinalizar').style.display = 'none';
                }
                document.getElementById('loadertratamientofinalizar').style.display = 'none';
        },
        error:function(respuesta){
          
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loadertratamientofinalizar').style.display = 'none'; //ocultar el bloque del loader 
        }
        
    });
}

function cambiar_tratamiento_aterminado(tratamiento_id){
    let base_url = document.getElementById('base_url').value;
    let controlador = base_url+'tratamiento/tratamiento_a_terminado';
    let confirmacion =  confirm('Esta seguro que quiere dar por terminado este Tratamiento?')
    if(confirmacion == true){
        document.getElementById('loadertratamientofinalizar').style.display = 'block'; //muestra el bloque del loader
        $.ajax({url: controlador,
                type:"POST",
                async: false,
                data:{tratamiento_id:tratamiento_id},
                success:function(respuesta){
                    var lostratamientos =  JSON.parse(respuesta);
                    if (lostratamientos != null){
                        alert("Tratamiento terminado con exito!.");
                        document.getElementById('loadertratamientofinalizar').style.display = 'none';
                    }else{
                        alert("Revisar  datos!.");
                    }
                    document.getElementById('loadertratamientofinalizar').style.display = 'none';
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loadertratamientofinalizar').style.display = 'none'; //ocultar el bloque del loader 
            }

        });
        
        dir_url = base_url+"paciente";
        location.href =dir_url;
    }
    
}

/*
function cambiar_tratamientoenproceso(tratamiento_id){
    
    //let eliminar_eltratamiento = document.getElementById("eliminar_eltratamiento").value;
    //if(eliminar_eltratamiento == 1){
        let confirmacion =  confirm('Esta seguro que quiere volver a EN PROCESO este Tratamiento?')
        if(confirmacion == true){
            let base_url = document.getElementById('base_url').value;
            dir_url = base_url+"tratamiento/tratamiento_enproceso/"+tratamiento_id;
            location.href =dir_url;
        }
        
}*/
