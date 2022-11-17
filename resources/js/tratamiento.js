$(document).on("ready",inicio);
function inicio(){
    mostrar_tablastratamiento();
} 

/* carga modal de nuevo tratamiento */
function cargarmodal_nuevotratamiento()
{
    document.getElementById('loadertratamiento').style.display = 'none';
    $("#tratamiento_fecha").val(moment(Date()).format("YYYY-MM-DD"));
    $("#tratamiento_hora").val(moment(Date()).format("HH:mm:ss"));
    const mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    html = "<select name='tratamiento_mes' id='tratamiento_mes' class='form-control'>";
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
    let elaniook = (elanio+17);
    html2 = "<select name='tratamiento_gestion' id='tratamiento_gestion' class='form-control'>";
    for(var j = elanio; j < elaniook; j++) {
        selected = "";
        if((elanio+6) == j){
            selected = "selected";
        }
        html2 += "<option value='"+(j)+"' "+selected+">"+(j)+"</option>";
    }
    html2 += "</select>";
    $("#lagestion").html(html2);
    /*$('#modal_nuevotratamiento').on('shown.bs.modal', function (e) {
        $('#tratamiento_mes').focus();
    });*/
}

function registrar_tratamiento()
{
    let tratamiento_fecha = document.getElementById("tratamiento_fecha").value;
    let tratamiento_hora = document.getElementById("tratamiento_hora").value;
    let tratamiento_mes = document.getElementById("tratamiento_mes").value;
    let tratamiento_gestion = document.getElementById("tratamiento_gestion").value;
    let registro_id = document.getElementById("registro_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/registrar_tratamiento';
    document.getElementById('loadertratamiento').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{tratamiento_fecha:tratamiento_fecha, tratamiento_hora:tratamiento_hora,
                tratamiento_mes:tratamiento_mes, tratamiento_gestion:tratamiento_gestion,
                registro_id:registro_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Tratamiento registrado correctamente");
                    $('#boton_cerrarmodal').click();
                    mostrar_tablastratamiento();
            },
    });
            
}

function mostrar_tablastratamiento()
{
    let base_url = document.getElementById('base_url').value;
    let registro_id = document.getElementById('registro_id').value;
    let controlador = base_url+'tratamiento/mostrar_tratamientos';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $("#encontrados").html(0);
    $.ajax({url: controlador,
            type:"POST",
            data:{registro_id:registro_id},
            success:function(respuesta){
                var tratamientos =  JSON.parse(respuesta);
                if (tratamientos != null){
                    let n = tratamientos.length;
                    $("#encontrados").html(n);
                    let html = "";
                    for(var i = 0; i < n ; i++){
                        //html += "<tr style='background-color: #"+tratamientos[i]['estado_color']+"'>"; 
                        html += "<tr>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td class='text-center'>"+tratamientos[i]['tratamiento_mes']+"</td>";
                        html += "<td class='text-center'>"+tratamientos[i]['tratamiento_gestion']+"</td>";
                        html += "<td class='text-center'>"+moment(tratamientos[i]["tratamiento_fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td class='text-center'>"+tratamientos[i]['tratamiento_hora']+"</td>";
                        html += "<td class='text-center'>"; 
                        html += "<a class='btn btn-info btn-xs' data-toggle='modal' data-target='#modal_modificartratamiento' onclick='cargarmodal_modificartratamiento("+JSON.stringify(tratamientos[i])+")' title='Modifcar registro'>";
                        html += "<span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"sesion/sesiones/"+tratamientos[i]['tratamiento_id']+"' class='btn btn-success btn-xs' title='Sesiones'><span class='fa fa-list'></span></a>";
                        html += "<a href='"+base_url+"reportes/reportesesiones/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-facebook btn-xs' title='Reporte de Sesiones'><span class='fa fa-file-text'></span></a>";
                        html += "<a href='"+base_url+"reportes/informecmensual/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='Informe clinico mensual'><span class='fa fa-calendar'></span></a>";
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

/* carga modal para modificar tratamiento */
function cargarmodal_modificartratamiento(tratamiento)
{
    document.getElementById('loadertratamientomodif').style.display = 'none';
    $("#tratamiento_idmodif").val(tratamiento["tratamiento_id"]);
    $("#tratamiento_fechamodif").val(tratamiento["tratamiento_fecha"]);
    $("#tratamiento_horamodif").val(tratamiento["tratamiento_hora"]);
    const mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    html = "<select name='tratamiento_mesmodif' id='tratamiento_mesmodif' class='form-control'>";
    let fecha = new Date();
    //let elmes = fecha.getMonth()+1;
    for (var i = 0; i < 12; i++) {
        selected = "";
        if(mes[i] == tratamiento["tratamiento_mes"]){
            selected = "selected";
        }
        html += "<option value='"+mes[i]+"' "+selected+">"+mes[i]+"</option>";
    }
    html += "</select>";
    $("#elmesmodif").html(html);
    let elanio = tratamiento["tratamiento_gestion"];
    //let elaniook = fecha.getFullYear();
    elanio = (elanio-15);
    let elaniook = (elanio+50);
    html2 = "<select name='tratamiento_gestionmodif' id='tratamiento_gestionmodif' class='form-control'>";
    for(var j = elanio; j < elaniook; j++) {
        selected = "";
        if((elanio+15) == j){
            selected = "selected";
        }
        html2 += "<option value='"+(j)+"' "+selected+">"+(j)+"</option>";
    }
    html2 += "</select>";
    $("#lagestionmodif").html(html2);
    $("#tratamiento_idmodif").val(tratamiento["tratamiento_id"]);
}

function modificar_tratamiento()
{
    let tratamiento_id = document.getElementById("tratamiento_idmodif").value;
    let tratamiento_mes = document.getElementById("tratamiento_mesmodif").value;
    let tratamiento_gestion = document.getElementById("tratamiento_gestionmodif").value;
    let tratamiento_fecha = document.getElementById("tratamiento_fechamodif").value;
    let tratamiento_hora = document.getElementById("tratamiento_horamodif").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/modificar_tratamiento';
    document.getElementById('loadertratamientomodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{tratamiento_fecha:tratamiento_fecha, tratamiento_hora:tratamiento_hora,
                tratamiento_mes:tratamiento_mes, tratamiento_gestion:tratamiento_gestion,
                tratamiento_id:tratamiento_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Tratamiento modificado con exito!.");
                    $('#boton_cerrarmodalmodif').click();
                    mostrar_tablastratamiento();
            },
    });
            
}