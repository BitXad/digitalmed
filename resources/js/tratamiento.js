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
    let fechainicio_hemodialisis = document.getElementById('rinicio_hemodialisis').value;
    
    let fecha_hemodialisis = new Date(fechainicio_hemodialisis);
    let fecha_tope = new Date('2019-02-28');
    let hay_certmedico = "0";
    if(fecha_hemodialisis.getTime() <= fecha_tope.getTime()){
        hay_certmedico = "1";
    }
    
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
                        html += "<a href='"+base_url+"reportes/reportesesiones/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-facebook btn-xs' title='Planilla oral y EV'><span class='fa fa-file-text'></span></a>";
                        if(tratamientos[i]['infmensual_id'] >0){
                            // modificar informe mensual
                            html += "<a class='btn btn-dropbox btn-xs' data-toggle='modal' data-target='#modal_modificarinfmensual' onclick='cargarmodal_modificarinfmensual("+tratamientos[i]["infmensual_id"]+")' title='Modificar informe mensual'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                            html += "<a href='"+base_url+"reportes/informecmensual/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='Informe clinico mensual'><span class='fa fa-calendar'></span></a>";
                            html += "<a href='"+base_url+"reportes/medinsumos/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='medicamentos e insumos medicos otorgados y autorizados'><span class='fa fa-list-ol'></span></a>";
                        }else{
                            // nuevo informe mensual
                            html += "<a class='btn btn-dropbox btn-xs' data-toggle='modal' data-target='#modal_nuevoinfmensual' onclick='cargarmodal_nuevoinfmensual("+tratamientos[i]["tratamiento_id"]+", "+JSON.stringify(tratamientos[i]["tratamiento_mes"])+", "+tratamientos[i]["tratamiento_gestion"]+")' title='Registrar informe mensual'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                        }
                        if(hay_certmedico >0){
                            if(tratamientos[i]['certmedico_id'] >0){
                                html += "<a class='btn btn-google btn-xs' data-toggle='modal' data-target='#modal_modificarcertmedico' onclick='cargarmodal_modificarcertmedico("+tratamientos[i]["certmedico_id"]+")' title='Modificar certificado medico'>";
                                html += "<span class='fa fa-pencil-square-o'></span></a>";
                                html += "<a href='"+base_url+"reportes/certificadomedico/"+tratamientos[i]['certmedico_id']+"' target='_blank' class='btn btn-google btn-xs' title='Certificado medico mensual'><span class='fa fa-calendar'></span></a>";
                            }else{
                                html += "<a class='btn btn-google btn-xs' data-toggle='modal' data-target='#modal_nuevocertmedico' onclick='cargarmodal_nuevocertmedico("+tratamientos[i]["tratamiento_id"]+", "+JSON.stringify(tratamientos[i]["tratamiento_mes"])+", "+tratamientos[i]["tratamiento_gestion"]+")' title='Registrar certificado médico'>";
                                html += "<span class='fa fa-pencil-square-o'></span></a>";
                            }
                        }
                        if(tratamientos[i]['anemiaglic_id'] >0){
                            // modificar informe mensual
                            html += "<a class='btn btn-yahoo btn-xs' data-toggle='modal' data-target='#modal_modificaranemiaglicemia' onclick='cargarmodal_modificar_anemiaglicemia("+tratamientos[i]["anemiaglic_id"]+")' title='Modificar informe mensual de anemia/glicemia'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                            html += "<a href='"+base_url+"reportes/infanemiaglicemia/"+tratamientos[i]['tratamiento_id']+"' target='_blank' class='btn btn-yahoo btn-xs' title='Informe mensual de anemia/glicemia'><span class='fa fa-calendar'></span></a>";
                        }else{
                            // nuevo informe mensual
                            html += "<a class='btn btn-yahoo btn-xs' data-toggle='modal' data-target='#modal_nueva_anemiaglicemia' onclick='cargarmodal_nueva_anemiaglicemia("+tratamientos[i]["tratamiento_id"]+", "+JSON.stringify(tratamientos[i]["tratamiento_mes"])+", "+tratamientos[i]["tratamiento_gestion"]+")' title='Registrar informe mensual de anemia/glicemia'>";
                            html += "<span class='fa fa-pencil-square-o'></span></a>";
                        }
                        html += "<a onclick='eliminar_tratamiento("+tratamientos[i]['tratamiento_id']+")' class='btn btn-danger btn-xs' title='Eliminar tratamiento del sistema'><span class='fa fa-trash'></span></a>";
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
    let elultimo_informe = obtener_ultimoinfmensual();
    let ultimo_informe = "";
    document.getElementById('loaderinfmensual').style.display = 'none';
    if(elultimo_informe != ""){
        ultimo_informe = JSON.parse(elultimo_informe);
        $("#infmensual_cabecera").val(ultimo_informe["infmensual_cabecera"]);
        $("#infmensual_accesouno").val(ultimo_informe["infmensual_accesouno"]);
        $("#infmensual_accesodos").val(ultimo_informe["infmensual_accesodos"]);
        $("#infmensual_laboratorio").val(ultimo_informe["infmensual_laboratorio"]);
        $("#infmensual_paratohormona").val(ultimo_informe["infmensual_paratohormona"]);
        $("#infmensual_glucemia").val(ultimo_informe["infmensual_glucemia"]);
        $("#infmensual_firmante").val(ultimo_informe["infmensual_firmante"]);
        $("#infmensual_conclusion").val(ultimo_informe["infmensual_conclusion"]);
    }else{
        $("#infmensual_cabecera").val("con antecedentes de Litiasis Renoureteral el 2018 y Atrofia Renal Izquierda ha desarrollado Enfermedad Renal Crónica V por Nefropatia Obstructiva Secundaria a Litiasis Renoureteral.");
        $("#infmensual_accesouno").val("con adecuado funcionamiento. Desarrolla sus actividades cotidianas de forma regular.");
        $("#infmensual_accesodos").val("con excesivas ganacias de peso iinterdialitico, se insiste restriccion hidrica. se modifica peso seco a tolerancia. Triage COVID 19 negativo.");
        $("#infmensual_laboratorio").val("Laboratorio");
        $("#infmensual_paratohormona").val("Paciente tiene reporte de Paratohormona de ");
        $("#infmensual_glucemia").val("");
        $("#infmensual_firmante").val("");
        
        
        $("#infmensual_conclusion").val("Conclusiones Paciente debe cumplir restriccion hidrica, adedmaas de continuar tratamiento hemodialitico. es cuanto iniormo para los fines consiguientes");
    }
    /*let elfirmante = $("#elfirmante_nombre").val();
    if(elfirmante != "" && elfirmante != null){
        let elfirmanteci = $("#elfirmante_ci").val();
        if(elfirmanteci != "" && elfirmanteci != null){
            $("#infmensual_firmante").val(elfirmante+" con C.I.: "+elfirmanteci);
        }else{
            $("#infmensual_firmante").val(elfirmante);
        }
    }*/
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
    //let infmensual_laboratorio = document.getElementById("infmensual_laboratorio").value;
    let infmensual_laboratorio = CKEDITOR.instances.infmensual_laboratorio.getData();
    let infmensual_paratohormona = CKEDITOR.instances.infmensual_paratohormona.getData();
    let infmensual_glucemia = document.getElementById("infmensual_glucemia").value;
    let infmensual_firmante = document.getElementById("infmensual_firmante").value;
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
                infmensual_accesodos:infmensual_accesodos, infmensual_paratohormona:infmensual_paratohormona,
                infmensual_glucemia:infmensual_glucemia, infmensual_firmante:infmensual_firmante
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
                $("#infmensual_paratohormonamodif").val(res["infmensual_paratohormona"]);
                $("#infmensual_glucemiamodif").val(res["infmensual_glucemia"]);
                $("#infmensual_firmantemodif").val(res["infmensual_firmante"]);
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
    //let infmensual_laboratorio = document.getElementById("infmensual_laboratoriomodif").value;
    let infmensual_laboratorio = CKEDITOR.instances.infmensual_laboratoriomodif.getData();
    let infmensual_paratohormona = CKEDITOR.instances.infmensual_paratohormonamodif.getData();
    //let infmensual_laboratorio = document.getElementById("cke_infmensual_laboratoriomodif").value;
    let infmensual_glucemia = document.getElementById("infmensual_glucemiamodif").value;
    let infmensual_firmante = document.getElementById("infmensual_firmantenmodif").value;
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
                infmensual_accesodos:infmensual_accesodos, infmensual_paratohormona:infmensual_paratohormona,
                infmensual_glucemia:infmensual_glucemia, infmensual_firmante:infmensual_firmante
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

/* carga modal para registrar certificado medico de un determinado tratamiento */
function cargarmodal_nuevocertmedico(tratamiento_id, elmes, gestion)
{
    let elultimo_certmedico = obtener_ultimocertmedico();
    let ultimo_certmedico = "";
    document.getElementById('loadercertmedico').style.display = 'none';
    if(elultimo_certmedico != ""){
        ultimo_certmedico = JSON.parse(elultimo_certmedico);
        $("#certmedico_nombre").val(ultimo_certmedico["certmedico_nombre"]);
        $("#certmedico_codigo").val(ultimo_certmedico["certmedico_codigo"]);
        $("#certmedico_cabecerauno").val(ultimo_certmedico["certmedico_cabecerauno"]);
        $("#certmedico_cabecerados").val(ultimo_certmedico["certmedico_cabecerados"]);
        $("#certmedico_cabeceratres").val(ultimo_certmedico["certmedico_cabeceratres"]);
        $("#certmedico_cabeceracuatro").val(ultimo_certmedico["certmedico_cabeceracuatro"]);
        //$("#certmedico_medicacion").val(ultimo_certmedico["certmedico_medicacion"]);
    }else{
        $("#certmedico_nombre").val("Dr. Jose Enrique Gutiérrez Méndez");
        $("#certmedico_codigo").val("G-795/G-156");
        $("#certmedico_cabecerauno").val("Con Antencedente de Pre-Eclampsia previa y Glomerulonefritis Mesangioproliferativa que evolucionó a Enfermedad Renal Crónica, con requerimiento de tratamiento Hemodialitico");
        $("#certmedico_cabecerados").val("Al momento el paciente se encuentra estable, realiza sus sesiones de dialisis en la Unidad de hemodialisis José E. Gutiérrez M.en turno mañana los dias Martes, Jueves y Sabado, maquina Hemodiafiltración seronegativa, 4 horas a travez de");
        $("#certmedico_cabeceratres").val("QB 450 ml/min, QD 540 ml/min, UF controlada, buffer bicarbonato");
        $("#certmedico_cabeceracuatro").val("Triage COVID 19 negativo");
        //$("#certmedico_medicacion").val("");
    }
    $("#certmedico_medicacion").val("");
    let medicamentos_mes = get_medicamentosmes(tratamiento_id);
    let medicamentos = "";
    if(medicamentos_mes != ""){
        medicamentos = JSON.parse(medicamentos_mes);
        let medicacion = "";
        if(medicamentos["eritropoyetina"] > 0){
            medicacion += "Eritropoyetina "+medicamentos["eritropoyetina"]+" al mes, ";
        }
        if(medicamentos["hierro"] > 0){
            medicacion += "Hierro 100 mg EV 1 ampolla cada semana post hemodialisis, total ";
            medicacion += medicamentos["hierro"]+" ampollas al mes, ";
        }
        if(medicamentos["complejobampolla"] > 0){
            medicacion += "Complejo B 1 Ampolla post Hemodialisis total ";
            medicacion += medicamentos["complejobampolla"]+" ampollas en el mes, ";
        }
        if(medicamentos["omeprazol"] > 0){
            medicacion += "Omeprazol 20 mg VO cada dia total en el mes "+medicamentos["omeprazol"]+" capsulas, ";
        }
        if(medicamentos["acidofolico"] > 0){
            medicacion += "Ac. Folico 5 mg. VO cada dia total en el mes "+medicamentos["acidofolico"]+" comprimidos";
        }
        if(medicamentos["calcio"] > 0){
            medicacion += "Carbonato de Calcio / Calcitrol 0.25 mcg VO 4 capsulas al dia total en el mes "+medicamentos["calcio"]+" comprimidos, ";
        }
        if(medicamentos["amlodipina"] > 0){
            medicacion += "Amlodipina "+medicamentos["amlodipina"]+" al mes, ";
        }
        if(medicamentos["enalpril"] > 0){
            medicacion += "Enalapril "+medicamentos["enalpril"]+" al mes, ";
        }
        if(medicamentos["losartan"] > 0){
            medicacion += "Losartan "+medicamentos["losartan"]+" al mes, ";
        }
        if(medicamentos["atorvastina"] > 0){
            medicacion += "Atorvastatina "+medicamentos["atorvastina"]+" al mes, ";
        }
        if(medicamentos["asa"] > 0){
            medicacion += "Asa "+medicamentos["asa"]+" al mes, ";
        }
        if(medicamentos["complejob"] > 0){
            medicacion += "Complejo B 1 comp. VO cada dia total en el mes "+medicamentos["complejob"]+" comprimidos. ";
        }
        
        $("#certmedico_medicacion").val(medicacion);
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
    $("#certmedico_fecha").val(moment(ultimoDia).format("YYYY-MM-DD"));
    $("#tratamiento_idcertmedico").val(tratamiento_id);
    $('#modal_nuevocertmedico').on('shown.bs.modal', function (e) {
        $('#certmedico_nombre').focus();
    });
}

/* obtiene el ultimo certificado medico de un paciente */
function obtener_ultimocertmedico()
{
    var base_url = document.getElementById('base_url').value;
    var paciente_id = document.getElementById('paciente_id').value;
    var controlador = base_url+'tratamiento/obtener_certmedico';
    let last_certmedico = "";
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{paciente_id:paciente_id
            },
            success:function(result){
                res = JSON.parse(result);
                if(res != null){
                    last_certmedico = JSON.stringify(res);
                }
            },
    });
    return last_certmedico;
}

/* obtiene medicamentos usados en el mes de un paciente */
function get_medicamentosmes(tratamiento_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/obtener_medicamentosmes';
    let last_medicamentomes = "";
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{tratamiento_id:tratamiento_id
            },
            success:function(result){
                res = JSON.parse(result);
                if(res != null){
                    last_medicamentomes = JSON.stringify(res);
                }
            },
    });
    return last_medicamentomes;
}

/* registra el certificado medico mensual de un tratamiento  */
function registrar_certmedico()
{
    let certmedico_nombre = document.getElementById("certmedico_nombre").value;
    let certmedico_codigo = document.getElementById("certmedico_codigo").value;
    let certmedico_cabecerauno = document.getElementById("certmedico_cabecerauno").value;
    let certmedico_cabecerados = document.getElementById("certmedico_cabecerados").value;
    let certmedico_cabeceratres = document.getElementById("certmedico_cabeceratres").value;
    let certmedico_cabeceracuatro = document.getElementById("certmedico_cabeceracuatro").value;
    let certmedico_medicacion = document.getElementById("certmedico_medicacion").value;
    let certmedico_fecha = document.getElementById("certmedico_fecha").value;
    let tratamiento_id = document.getElementById("tratamiento_idcertmedico").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/registrar_certmedico';
    document.getElementById('loadercertmedico').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{certmedico_nombre:certmedico_nombre, certmedico_codigo:certmedico_codigo,
                  certmedico_cabecerauno:certmedico_cabecerauno, certmedico_cabecerados:certmedico_cabecerados,
                  certmedico_cabeceratres:certmedico_cabeceratres, certmedico_cabeceracuatro:certmedico_cabeceracuatro,
                  certmedico_medicacion:certmedico_medicacion, certmedico_fecha:certmedico_fecha,
                  tratamiento_id:tratamiento_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Certificado medico registrado con exito!.");
                    $('#boton_cerrarmodalcertmedico').click();
                    mostrar_tablastratamiento();
            },
    });
}

/* cargar modal para modificar certificado medico mensual */
function cargarmodal_modificarcertmedico(certmedico_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/get_certificadomedico';
    document.getElementById('loadercertmedicomodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{certmedico_id:certmedico_id
            },
            success:function(result){
                res = JSON.parse(result);
                document.getElementById('loadercertmedicomodif').style.display = 'none';
                $("#certmedico_nombremodif").val(res["certmedico_nombre"]);
                $("#certmedico_codigomodif").val(res["certmedico_codigo"]);
                $("#certmedico_cabeceraunomodif").val(res["certmedico_cabecerauno"]);
                $("#certmedico_cabeceradosmodif").val(res["certmedico_cabecerados"]);
                $("#certmedico_cabeceratresmodif").val(res["certmedico_cabeceratres"]);
                $("#certmedico_cabeceracuatromodif").val(res["certmedico_cabeceracuatro"]);
                $("#certmedico_medicacionmodif").val(res["certmedico_medicacion"]);
                $("#certmedico_fechamodif").val(res["certmedico_fecha"]);
                $("#certmedico_id").val(res["certmedico_id"]);
                
                $('#modal_modificarcertmedico').on('shown.bs.modal', function (e) {
                    $('#certmedico_nombremodif').focus();
                });
            },
    }); 
}

/* modificar el certificado medico mensual de un tratamiento */
function modificar_certmedico()
{
    let certmedico_nombre = document.getElementById("certmedico_nombremodif").value;
    let certmedico_codigo = document.getElementById("certmedico_codigomodif").value;
    let certmedico_cabecerauno = document.getElementById("certmedico_cabeceraunomodif").value;
    let certmedico_cabecerados = document.getElementById("certmedico_cabeceradosmodif").value;
    let certmedico_cabeceratres = document.getElementById("certmedico_cabeceratresmodif").value;
    let certmedico_cabeceracuatro = document.getElementById("certmedico_cabeceracuatromodif").value;
    let certmedico_medicacion = document.getElementById("certmedico_medicacionmodif").value;
    let certmedico_fecha = document.getElementById("certmedico_fechamodif").value;
    let certmedico_id = document.getElementById("certmedico_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/modificar_certmedico';
    document.getElementById('loadercertmedicomodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{certmedico_nombre:certmedico_nombre, certmedico_codigo:certmedico_codigo,
                  certmedico_cabecerauno:certmedico_cabecerauno, certmedico_cabecerados:certmedico_cabecerados,
                  certmedico_cabeceratres:certmedico_cabeceratres, certmedico_cabeceracuatro:certmedico_cabeceracuatro,
                  certmedico_medicacion:certmedico_medicacion, certmedico_fecha:certmedico_fecha,
                  certmedico_id:certmedico_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Certificado medico modificado con exito!.");
                    $('#boton_cerrarmodalcertmediconodif').click();
                    mostrar_tablastratamiento();
            },
    });
}

function eliminar_tratamiento(tratamiento_id){
    let confirmacion =  confirm('Esta seguro que quiere eliminiar a este Tratamiento del sistema?\n Nota.- esta operacion es irreversible!.')
    if(confirmacion == true){
        let base_url = document.getElementById('base_url').value;
        dir_url = base_url+"tratamiento/remove/"+tratamiento_id;
        location.href =dir_url;
    }
    
}

/* carga modal para registrar informe mensual de un determinado tratamiento */
function cargarmodal_nueva_anemiaglicemia(tratamiento_id, elmes, gestion)
{
    document.getElementById('loaderanemiaglicemia').style.display = 'none';
    $("#anemiaglic_titulo").val("ANEMIA");
    $("#anemiaglic_enfermedad").val("");
    $("#anemiaglic_diagnostico").val("");
    $("#anemiaglic_hemoglobina").val("");
    $("#anemiaglic_hematocrito").val("");
    $("#anemiaglic_administra").val("");
    
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
    $("#anemiaglic_fecha").val(moment(ultimoDia).format("YYYY-MM-DD"));
    $("#tratamiento_idag").val(tratamiento_id);
    $('#modal_nueva_anemiaglicemia').on('shown.bs.modal', function (e) {
        $('#anemiaglic_titulo').focus();
    });
}

/* regsitra el informe clinico mensual de anemia/glicemia */
function registrar_infanemiaglicemia()
{
    let anemiaglic_titulo = document.getElementById("anemiaglic_titulo").value;
    let anemiaglic_enfermedad = document.getElementById("anemiaglic_enfermedad").value;
    let anemiaglic_diagnostico = document.getElementById("anemiaglic_diagnostico").value;
    let anemiaglic_hemoglobina = document.getElementById("anemiaglic_hemoglobina").value;
    let anemiaglic_hematocrito = document.getElementById("anemiaglic_hematocrito").value;
    let anemiaglic_administra = document.getElementById("anemiaglic_administra").value;
    let anemiaglic_fecha = document.getElementById("anemiaglic_fecha").value;
    let tratamiento_id = document.getElementById("tratamiento_idag").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/registrar_infanemiaglicemia';
    document.getElementById('loaderinfmensual').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{tratamiento_id:tratamiento_id, anemiaglic_titulo:anemiaglic_titulo, 
                  anemiaglic_enfermedad:anemiaglic_enfermedad, anemiaglic_diagnostico:anemiaglic_diagnostico,
                  anemiaglic_hemoglobina:anemiaglic_hemoglobina, anemiaglic_hematocrito:anemiaglic_hematocrito,
                  anemiaglic_administra:anemiaglic_administra, anemiaglic_fecha:anemiaglic_fecha
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Informe mensual de Anemia y Glicemia registrado con exito!.");
                    $('#boton_cerrarmodalag').click();
                    mostrar_tablastratamiento();
            },
    });
}

/* carga modal para modificar informe de anemi/glicecmia de un  determinado tratamiento */
function cargarmodal_modificar_anemiaglicemia(anemiaglic_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/get_informeanemiaglicemia';
    document.getElementById('loaderanemiaglicemiamodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{anemiaglic_id:anemiaglic_id
            },
            success:function(result){
                res = JSON.parse(result);
                document.getElementById('loaderanemiaglicemiamodif').style.display = 'none';
                $("#anemiaglic_titulomodif").val(res["anemiaglic_titulo"]);
                $("#anemiaglic_enfermedadmodif").val(res["anemiaglic_enfermedad"]);
                $("#anemiaglic_diagnosticomodif").val(res["anemiaglic_diagnostico"]);
                $("#anemiaglic_hemoglobinamodif").val(res["anemiaglic_hemoglobina"]);
                $("#anemiaglic_hematocritomodif").val(res["anemiaglic_hematocrito"]);
                $("#anemiaglic_administramodif").val(res["anemiaglic_administra"]);
                $("#anemiaglic_fechamodif").val(res["anemiaglic_fecha"]);
                $("#anemiaglic_id").val(anemiaglic_id);
                $('#modal_modificaranemiaglicemia').on('shown.bs.modal', function (e) {
                    $('#anemiaglic_titulomodif').focus();
                });
            },
    }); 
}
/* modifica el informe mensual de anemia/glicemia */
function modificar_infanemiaglicemia()
{
    let anemiaglic_titulo = document.getElementById("anemiaglic_titulomodif").value;
    let anemiaglic_enfermedad = document.getElementById("anemiaglic_enfermedadmodif").value;
    let anemiaglic_diagnostico = document.getElementById("anemiaglic_diagnosticomodif").value;
    let anemiaglic_hemoglobina = document.getElementById("anemiaglic_hemoglobinamodif").value;
    let anemiaglic_hematocrito = document.getElementById("anemiaglic_hematocritomodif").value;
    let anemiaglic_administra = document.getElementById("anemiaglic_administramodif").value;
    let anemiaglic_fecha = document.getElementById("anemiaglic_fechamodif").value;
    let anemiaglic_id = document.getElementById("anemiaglic_id").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/modificar_infanemiaglicemia';
    document.getElementById('loaderanemiaglicemiamodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{anemiaglic_id:anemiaglic_id, anemiaglic_titulo:anemiaglic_titulo, 
                  anemiaglic_enfermedad:anemiaglic_enfermedad, anemiaglic_diagnostico:anemiaglic_diagnostico,
                  anemiaglic_hemoglobina:anemiaglic_hemoglobina, anemiaglic_hematocrito:anemiaglic_hematocrito,
                  anemiaglic_administra:anemiaglic_administra, anemiaglic_fecha:anemiaglic_fecha
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Informe mensual de Anemia/Glicemia modificado con exito!.");
                    $('#boton_cerrarmodalagmodif').click();
                    mostrar_tablastratamiento();
            },
    });            
}