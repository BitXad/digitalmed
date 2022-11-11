$(document).on("ready",inicio);
function inicio(){
    mostrar_tablashora();
}

/* calcula Ingest */
function calcular_ingest()
{
    //document.getElementById('loadernuevo').style.display = 'none';
    let peso_seco = $("#sesion_pesoseco").val();
    let peso_egreso = $("#sesion_pesoegreso").val();
    $("#sesion_ingest").val(peso_egreso-peso_seco);
}

/* carga modal del nuevo registro de una hora */
function mostrar_modalhora()
{
    let detallehora_numero = obtener_numerohora();
    document.getElementById('loaderhora').style.display = 'none';
    
    $("#detallehora_numero").val(Number(Number(detallehora_numero)+Number(1)));
    $("#detallehora_pa").val();
    $("#detallehora_fc").val();
    $("#detallehora_temp").val();
    $("#detallehora_flujosangre").val();
    $("#detallehora_pv").val();
    $("#detallehora_ptm").val();
    $("#detallehora_conductividad").val();
    $('#modal_horasesion').on('shown.bs.modal', function (e) {
    $('#detallehora_pa').focus();
    });
}

/* Obtener Numero de hora */
function obtener_numerohora()
{
    let base_url = document.getElementById('base_url').value;
    let sesion_id = document.getElementById('sesion_id').value;
    let controlador = base_url+'detalle_hora/obtener_numero';
    let numero = 0;
    document.getElementById('loaderhora').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{sesion_id:sesion_id},
            async: false,
            success:function(result){
                res = JSON.parse(result);
                document.getElementById('loaderhora').style.display = 'none';
                numero = res;
            },
    });
    return numero;
}



function registrar_hora()
{
    var sesion_id = document.getElementById("sesion_id").value;
    var detallehora_numero = document.getElementById("detallehora_numero").value;
    var detallehora_pa = document.getElementById("detallehora_pa").value;
    var detallehora_fc = document.getElementById("detallehora_fc").value;
    var detallehora_temp = document.getElementById("detallehora_temp").value;
    var detallehora_flujosangre = document.getElementById("detallehora_flujosangre").value;
    var detallehora_pv = document.getElementById("detallehora_pv").value;
    var detallehora_ptm = document.getElementById("detallehora_ptm").value;
    var detallehora_conductividad = document.getElementById("detallehora_conductividad").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'detalle_hora/registrar_hora';
    document.getElementById('loaderhora').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{sesion_id:sesion_id, detallehora_numero:detallehora_numero, detallehora_pa:detallehora_pa,
                detallehora_fc:detallehora_fc, detallehora_temp:detallehora_temp,
                detallehora_flujosangre:detallehora_flujosangre, detallehora_pv:detallehora_pv,
                detallehora_ptm:detallehora_ptm, detallehora_conductividad:detallehora_conductividad
            },
            success:function(result){
                res = JSON.parse(result);
                if(res == "no"){
                    alert("Debe elegir otro dia que no sea Domingo.");
                    document.getElementById('loadernuevo').style.display = 'none';
                }else{
                    alert("Detalle de hora generada correctamente");
                    $('#boton_cerrarmodal').click();
                    mostrar_tablashora();

                }
            },
    });
}

function mostrar_tablashora()
{
    let base_url = document.getElementById('base_url').value;
    let sesion_id = document.getElementById('sesion_id').value;
    let controlador = base_url+'detalle_hora/mostrar_detallehora';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{sesion_id:sesion_id},
            success:function(respuesta){
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    let n = registros.length;
                    let html = "";
                    for(var i = 0; i < n ; i++){
                        html += "<tr>"; 
                        html += "<td class='text-center'>"+registros[i]['detallehora_numero']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_pa']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_fc']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_temp']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_flujosangre']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_pv']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_ptm']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_conductividad']+"</td>";
                        html += "<td class='text-center'>";
                        html += "<a href='"+base_url+"sesion/detalle_procedimiento/"+registros[i]['sesion_id']+"' class='btn btn-facebook btn-xs' title='Detalle de procedimiento de hemodialisis'><span class='fa fa-file-text'></span></a>";
                        html += "<a href='"+base_url+"sesion/modificar/"+registros[i]['sesion_id']+"' class='btn btn-info btn-xs' title='Modificar información de la sesión'><span class='fa fa-pencil'></span></a>";
                        html += "</td>";
                        html += "</tr>";
                    }
                   $("#tablaresultados").html(html);
                   document.getElementById('loader').style.display = 'none';
                }
                document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
          
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
        }
        
    });
}
