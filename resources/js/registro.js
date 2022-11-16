$(document).on("ready",inicio);
function inicio(){
    mostrar_tablasregistro();
} 

/* carga modal de nuevo registro */
function cargarmodal_nuevoregistro()
{
    document.getElementById('loaderregistro').style.display = 'none';
    $("#registro_fecha").val(moment(Date()).format("YYYY-MM-DD"));
    $("#registro_hora").val(moment(Date()).format("HH:mm:ss"));
    const mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    html = "<select name='registro_mes' id='registro_mes' class='form-control'>";
    let fecha = new Date();
    let elmes = fecha.getMonth()+1;
    for (var i = 0; i < 12; i++) {
        selected = "";
        if((i+1) == elmes){
            selected = "selected";
        }
        html += "<option value='"+mes[i]+"' "+selected+">"+mes[i]+"</option>";
    }
    html += "</select>";
    $("#elmes").html(html);
    let elanio = fecha.getFullYear();
    //let elaniook = fecha.getFullYear();
    elanio = (elanio-6);
    let elaniook = (elanio+12);
    html2 = "<select name='registro_gestion' id='registro_gestion' class='form-control'>";
    for(var j = elanio; j < elaniook; j++) {
        selected = "";
        if((elanio+6) == j){
            selected = "selected";
        }
        html2 += "<option value='"+(j)+"' "+selected+">"+(j)+"</option>";
    }
    html2 += "</select>";
    $("#lagestion").html(html2);
    $('#modal_nuevoregistro').on('shown.bs.modal', function (e) {
        $('#registro_fecha').focus();
    });
}

function registrar_registro()
{
    let registro_fecha = document.getElementById("registro_fecha").value;
    let registro_hora = document.getElementById("registro_hora").value;
    let registro_mes = document.getElementById("registro_mes").value;
    let registro_gestion = document.getElementById("registro_gestion").value;
    let registro_diagnostico = document.getElementById("registro_diagnostico").value;
    let paciente_id = document.getElementById("paciente_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'registro/registrar_registro';
    document.getElementById('loaderregistro').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{registro_fecha:registro_fecha, registro_hora:registro_hora,
                registro_mes:registro_mes, registro_gestion:registro_gestion,
                registro_diagnostico:registro_diagnostico, paciente_id:paciente_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Registro generado correctamente");
                    $('#boton_cerrarmodal').click();
                    mostrar_tablasregistro();
            },
    });
            
}

function mostrar_tablasregistro()
{
    let base_url = document.getElementById('base_url').value;
    let paciente_id = document.getElementById('paciente_id').value;
    let controlador = base_url+'registro/mostrar_registros';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{paciente_id:paciente_id},
            success:function(respuesta){
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    let n = registros.length;
                    let html = "";
                    for(var i = 0; i < n ; i++){
                        //html += "<tr style='background-color: #"+registros[i]['estado_color']+"'>"; 
                        html += "<tr>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td class='text-center'>"+moment(registros[i]["registro_fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td class='text-center'>"+registros[i]['registro_hora']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['registro_mes']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['registro_gestion']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['registro_diagnostico']+"</td>";
                        html += "<td class='text-center'>";
                        html += "<a href='"+base_url+"tratamiento/edit/"+registros[i]['registro_id']+"' class='btn btn-info btn-xs' title='Modificar información de la sesión'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"tratamiento/tratamientos/"+registros[i]['registro_id']+"' class='btn btn-facebook btn-xs' title='Tratamientos de un registro'><span class='fa fa-file-text'></span></a>";
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


