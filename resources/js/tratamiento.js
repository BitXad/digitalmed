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
                        html += "<a class='btn btn-info btn-xs' data-toggle='modal' data-target='#modal_modificartratamiento' onclick='cargarmodal_modificartratamiento("+JSON.stringify(tratamientos[i])+")' title='Modificar registro'>";
                        html += "<span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"sesion/sesiones/"+tratamientos[i]['tratamiento_id']+"' class='btn btn-yahoo btn-xs' title='Sesiones'><span class='fa fa-list'></span></a>";
                        html += "<a href='"+base_url+"reportes/reportesesiones/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-facebook btn-xs' title='Reporte de Sesiones'><span class='fa fa-file-text'></span></a>";
                        if(tratamientos[i]['infmensual_id'] >0){
                            // modificar informe mensual
                            html += "<a class='btn btn-success btn-xs' data-toggle='modal' data-target='#modal_modificarinfmensual' onclick='cargarmodal_modificarinfmensual("+tratamientos[i]["infmensual_id"]+")' title='Modificar informe mensual'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                            html += "<a href='"+base_url+"reportes/informecmensual/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='Informe clinico mensual'><span class='fa fa-calendar'></span></a>";
                            html += "<a href='"+base_url+"reportes/medinsumos/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='medicamentos e insumos medicos otorgados y autorizados'><span class='fa fa-list-ol'></span></a>";
                        }else{
                            // nuevo informe mensual
                            html += "<a class='btn btn-success btn-xs' data-toggle='modal' data-target='#modal_nuevoinfmensual' onclick='cargarmodal_nuevoinfmensual("+tratamientos[i]["tratamiento_id"]+", "+JSON.stringify(tratamientos[i]["tratamiento_mes"])+", "+tratamientos[i]["tratamiento_gestion"]+")' title='Registrar informe mensual'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                        }
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

/* carga modal para registrar informe mensual de un determinado tratamiento */
function cargarmodal_nuevoinfmensual(tratamiento_id, elmes, gestion)
{
    let ultimo_informe = JSON.parse(obtener_ultimoinfmensual());
    document.getElementById('loaderinfmensual').style.display = 'none';
    if(ultimo_informe != ""){
        $("#infmensual_cabecera").val(ultimo_informe["infmensual_cabecera"]);
        $("#infmensual_accesouno").val(ultimo_informe["infmensual_accesouno"]);
        $("#infmensual_accesodos").val(ultimo_informe["infmensual_accesodos"]);
        $("#infmensual_laboratorio").val(ultimo_informe["infmensual_laboratorio"]);
        $("#infmensual_conclusion").val(ultimo_informe["infmensual_conclusion"]);
    }else{
        $("#infmensual_cabecera").val("");
        $("#infmensual_accesouno").val("");
        $("#infmensual_accesodos").val("");
        $("#infmensual_laboratorio").val("");
        $("#infmensual_conclusion").val("");
    }
    let num_mes = "";
    const mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    for (var i = 0; i < 12; i++) {
        if((mes[i]) == elmes){
            num_mes = i;
            break;
        }
    }
    num_mes = Number(num_mes+1);
    if(num_mes<10){
        num_mes = "0"+num_mes;
    }
    
    lafecha = gestion+"-"+num_mes+"-"+"05";
    var date = new Date(lafecha);
    var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    //alert (ultimoDia.getMonth());
    $("#infmensual_fecha").val(moment(ultimoDia).format("YYYY-MM-DD"));
    $("#tratamiento_id").val(tratamiento_id);
    $('#modal_nuevoinfmensual').on('shown.bs.modal', function (e) {
        $('#infmensual_cabecera').focus();
    });
}

/* regsitra el informe clinico mensual de un tratamiento  */
function registrar_infmensual()
{
    let infmensual_cabecera = document.getElementById("infmensual_cabecera").value;
    let infmensual_accesouno = document.getElementById("infmensual_accesouno").value;
    let infmensual_accesodos = document.getElementById("infmensual_accesodos").value;
    let infmensual_laboratorio = document.getElementById("infmensual_laboratorio").value;
    let infmensual_conclusion = document.getElementById("infmensual_conclusion").value;
    let infmensual_fecha = document.getElementById("infmensual_fecha").value;
    let tratamiento_id = document.getElementById("tratamiento_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/registrar_infmensual';
    document.getElementById('loaderinfmensual').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{infmensual_cabecera:infmensual_cabecera, infmensual_accesouno:infmensual_accesouno,
                infmensual_laboratorio:infmensual_laboratorio, infmensual_conclusion:infmensual_conclusion,
                infmensual_fecha:infmensual_fecha, tratamiento_id:tratamiento_id,
                infmensual_accesodos:infmensual_accesodos
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Informe mensual registrado con exito!.");
                    $('#boton_cerrarmodalinfmensual').click();
                    mostrar_tablastratamiento();
            },
    });
}

/* carga modal para registrar informe mensual de un determinado tratamiento */
function cargarmodal_modificarinfmensual(infmensual_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/get_informemensual';
    document.getElementById('loaderinfmensualmodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{infmensual_id:infmensual_id
            },
            success:function(result){
                res = JSON.parse(result);
                document.getElementById('loaderinfmensualmodif').style.display = 'none';
                $("#infmensual_cabeceramodif").val(res["infmensual_cabecera"]);
                $("#infmensual_accesounomodif").val(res["infmensual_accesouno"]);
                $("#infmensual_accesodosmodif").val(res["infmensual_accesodos"]);
                $("#infmensual_laboratoriomodif").val(res["infmensual_laboratorio"]);
                $("#infmensual_conclusionmodif").val(res["infmensual_conclusion"]);
                $("#infmensual_fechamodif").val(res["infmensual_fecha"]);
                $("#infmensual_id").val(infmensual_id);
                $('#modal_modificarinfmensual').on('shown.bs.modal', function (e) {
                    $('#infmensual_cabeceramodif').focus();
                });
            },
    }); 
}
/* modifica el informe clinico mensual de un tratamiento  */
function modificar_infmensual()
{
    let infmensual_cabecera = document.getElementById("infmensual_cabeceramodif").value;
    let infmensual_accesouno = document.getElementById("infmensual_accesounomodif").value;
    let infmensual_accesodos = document.getElementById("infmensual_accesodosmodif").value;
    let infmensual_laboratorio = document.getElementById("infmensual_laboratoriomodif").value;
    let infmensual_conclusion = document.getElementById("infmensual_conclusionmodif").value;
    let infmensual_fecha = document.getElementById("infmensual_fechamodif").value;
    let infmensual_id = document.getElementById("infmensual_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/modificar_infmensual';
    document.getElementById('loaderinfmensualmodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{infmensual_cabecera:infmensual_cabecera, infmensual_accesouno:infmensual_accesouno,
                infmensual_laboratorio:infmensual_laboratorio, infmensual_conclusion:infmensual_conclusion,
                infmensual_fecha:infmensual_fecha, infmensual_id:infmensual_id,
                infmensual_accesodos:infmensual_accesodos
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Informe mensual modificado con exito!.");
                    $('#boton_cerrarmodalinfmensualmodif').click();
                    mostrar_tablastratamiento();
            },
    });            
}

/* obtiene el ultimo informe mensual de un paciente */
function obtener_ultimoinfmensual()
{
    var base_url = document.getElementById('base_url').value;
    var paciente_id = document.getElementById('paciente_id').value;
    var controlador = base_url+'tratamiento/obtener_infmensual';
    let last_infmensual = "";
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{paciente_id:paciente_id
            },
            success:function(result){
                res = JSON.parse(result);
                if(res != null){
                    last_infmensual = JSON.stringify(res);
                }
            },
    });
    return last_infmensual;
    }