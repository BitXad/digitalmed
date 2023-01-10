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
    $("#detallehora_pa").val("");
    $("#detallehora_fc").val("");
    $("#detallehora_temp").val("");
    $("#detallehora_flujosangre").val("");
    $("#detallehora_pv").val("");
    $("#detallehora_ptm").val("");
    $("#detallehora_conductividad").val("14");
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
                    alert("Detalle de hora generada correctamente");
                    $('#boton_cerrarmodal').click();
                    mostrar_tablashora();
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
                    let estado_color = "";
                    for(var i = 0; i < n ; i++){
                        estado_color = ""
                        if(registros[i]['estado_id'] == 6){
                            estado_color = registros[i]['estado_color'];
                        }
                        html += "<tr style='background-color: #"+estado_color+"'>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_numero']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_pa']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_fc']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_temp']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_flujosangre']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_pv']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_ptm']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['detallehora_conductividad']+"</td>";
                        html += "<td class='text-center'>";
                        html += "<a class='btn btn-info btn-xs' data-toggle='modal' data-target='#modal_modificarhorasesion' onclick='mostrar_modalmodificarhora("+JSON.stringify(registros[i])+")'>";
                        html += "    <span class='fa fa-pencil'></span>";
                        html += "</a>";
                        /*if(registros[i]['estado_id'] == 5){
                            html += "<a class='btn btn-danger btn-xs' title='Anular el detalle de registro de la hora' onclick='anular_registrohora("+registros[i]["detallehora_id"]+")'><span class='fa fa-minus-circle'></span></a>";
                        }else{
                            html += "<a class='btn btn-success btn-xs' title='Activar el detalle de registro de la hora' onclick='activar_registrohora("+registros[i]["detallehora_id"]+")'><span class='fa fa-check'></span></a>";
                        }*/
                        html += "<a class='btn btn-danger btn-xs' title='Eliminar el detalle de registro de la hora' onclick='eliminar_registrohora("+registros[i]["detallehora_id"]+")'><span class='fa fa-trash'></span></a>";
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

/* carga modal con la informacion del registro de una hora a modificar */
function mostrar_modalmodificarhora(detalle_hora)
{
    //detalle_hora = JSON.stringify(detalle_hora);
    document.getElementById('loaderhoramodif').style.display = 'none';
    
    $("#detallehora_idmodif").val(detalle_hora["detallehora_id"]);
    $("#detallehora_numeromodif").val(detalle_hora["detallehora_numero"]);
    $("#detallehora_pamodif").val(detalle_hora["detallehora_pa"]);
    $("#detallehora_fcmodif").val(detalle_hora["detallehora_fc"]);
    $("#detallehora_tempmodif").val(detalle_hora["detallehora_temp"]);
    $("#detallehora_flujosangremodif").val(detalle_hora["detallehora_flujosangre"]);
    $("#detallehora_pvmodif").val(detalle_hora["detallehora_pv"]);
    $("#detallehora_ptmmodif").val(detalle_hora["detallehora_ptm"]);
    $("#detallehora_conductividadmodif").val(detalle_hora["detallehora_conductividad"]);
    $('#modal_modificarhorasesion').on('shown.bs.modal', function (e) {
    $('#detallehora_pamodif').focus();
    $('#detallehora_pamodif').select();
    });
}

function registrar_horamodificada()
{
    var detallehora_id = document.getElementById("detallehora_idmodif").value;
    var detallehora_numero = document.getElementById("detallehora_numeromodif").value;
    var detallehora_pa = document.getElementById("detallehora_pamodif").value;
    var detallehora_fc = document.getElementById("detallehora_fcmodif").value;
    var detallehora_temp = document.getElementById("detallehora_tempmodif").value;
    var detallehora_flujosangre = document.getElementById("detallehora_flujosangremodif").value;
    var detallehora_pv = document.getElementById("detallehora_pvmodif").value;
    var detallehora_ptm = document.getElementById("detallehora_ptmmodif").value;
    var detallehora_conductividad = document.getElementById("detallehora_conductividadmodif").value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'detalle_hora/modificar_hora';
    document.getElementById('loaderhoramodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{detallehora_id:detallehora_id, detallehora_numero:detallehora_numero, detallehora_pa:detallehora_pa,
                detallehora_fc:detallehora_fc, detallehora_temp:detallehora_temp,
                detallehora_flujosangre:detallehora_flujosangre, detallehora_pv:detallehora_pv,
                detallehora_ptm:detallehora_ptm, detallehora_conductividad:detallehora_conductividad
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Detalle de hora modificada correctamente");
                    $('#boton_cerrarmodalmodif').click();
                    mostrar_tablashora();
            },
    });
}

function anular_registrohora(detallehora_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'detalle_hora/anular_detallehora';
    document.getElementById('loaderhoramodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{detallehora_id:detallehora_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Anulación exitosa");
                    mostrar_tablashora();
            },
    });
}

function activar_registrohora(detallehora_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'detalle_hora/activar_detallehora';
    document.getElementById('loaderhoramodif').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            data:{detallehora_id:detallehora_id
            },
            success:function(result){
                res = JSON.parse(result);
                    alert("Activación exitosa");
                    mostrar_tablashora();
            },
    });
}

function eliminar_registrohora(detallehora_id)
{
    let confirmacion =  confirm('Esta seguro que quiere eliminiar este Registro Hora del sistema?\n Nota.- esta operacion es irreversible!.')
    if(confirmacion == true){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'detalle_hora/eliminar_detallehora';
        document.getElementById('loader').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{detallehora_id:detallehora_id
                },
                success:function(result){
                    res = JSON.parse(result);
                        alert("Eliminación exitosa");
                        mostrar_tablashora();
                },
        });
    }
}

/* carga el modal para reajustar el numero de sesion Hemodialisis */
function mostrarmodal_cambionumsesion(registro_id, sesion_id, sesion_numerosesionhd)
{
    document.getElementById('loadercambionumsesion').style.display = 'none';
    $("#reajustar_sesnumero_hd").val(sesion_numerosesionhd);
    $("#reajustar_registro_id").val(registro_id);
    $("#reajustar_sesion_id").val(sesion_id);
    $('#modal_cambionumsesion').on('shown.bs.modal', function (e) {
        $('#reajustar_sesnumero_hd').focus();
        $('#reajustar_sesnumero_hd').select();
    });
}

function reajustar_numerosesionhd()
{
    let sesnumero_hd = document.getElementById("reajustar_sesnumero_hd").value;
    let registro_id = document.getElementById("reajustar_registro_id").value;
    let sesion_id = document.getElementById("reajustar_sesion_id").value;
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'sesion/reajustar_numerosesion';
    document.getElementById('loadercambionumsesion').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{sesnumero_hd:sesnumero_hd, registro_id:registro_id, sesion_id:sesion_id
            },
            success:function(result){
                res = JSON.parse(result);
                $('#sesion_numerosesionhd').val(res);
                alert("Reajuste del número de sesion realizado correctamente");
                $('#boton_cerrarmodalreajustar').click();
                //mostrar_tablastratamiento();
            },
    });
}

/* carga el modal para cambiar el numero de maquina */
function mostrarmodal_cambionummaquina(registro_id, sesion_id, sesion_nummaquina)
{
    document.getElementById('loadercambionummaquina').style.display = 'none';
    $("#cambiar_sesion_nummaquina").val(sesion_nummaquina);
    $("#cambiar_registro_id").val(registro_id);
    $("#cambiar_sesion_id").val(sesion_id);
    $('#modal_cambionummaquina').on('shown.bs.modal', function (e) {
        $('#cambiar_sesion_nummaquina').focus();
        $('#cambiar_sesion_nummaquina').select();
    });
}

function cambiar_numerodemaquina(uno_omas)
{
    let sesion_nummaquina = document.getElementById("cambiar_sesion_nummaquina").value;
    let registro_id = document.getElementById("cambiar_registro_id").value;
    let sesion_id = document.getElementById("cambiar_sesion_id").value;
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'sesion/cambiar_numeromaquina';
    document.getElementById('loadercambionummaquina').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{sesion_nummaquina:sesion_nummaquina, registro_id:registro_id, sesion_id:sesion_id, uno_omas:uno_omas
            },
            success:function(result){
                res = JSON.parse(result);
                $('#sesion_nummaquina').val(res);
                alert("El cambio del número de maquinia se realizo correctamente");
                $('#boton_cerrarmodalcambiar').click();
                //mostrar_tablastratamiento();
            },
    });
}

/* carga el modal para cambiar el numero de reutilizacion del filtro */
function mostrarmodal_cambioreutlizacionfiltro(registro_id, sesion_id, sesion_reutlizacionfiltro)
{
    document.getElementById('loadercambioreutlizacionfiltro').style.display = 'none';
    $("#cambiar_sesion_reutlizacionfiltro").val(sesion_reutlizacionfiltro);
    $("#reutfiltro_registro_id").val(registro_id);
    $("#reutfiltro_sesion_id").val(sesion_id);
    $('#modal_cambioreutlizacionfiltro').on('shown.bs.modal', function (e) {
        $('#cambiar_sesion_reutlizacionfiltro').focus();
        $('#cambiar_sesion_reutlizacionfiltro').select();
    });
}

function cambiar_reutfiltro()
{
    let sesion_reutlizacionfiltro = document.getElementById("cambiar_sesion_reutlizacionfiltro").value;
    if(sesion_reutlizacionfiltro >= 1 && sesion_reutlizacionfiltro <= 12){
        let registro_id = document.getElementById("reutfiltro_registro_id").value;
        let sesion_id = document.getElementById("reutfiltro_sesion_id").value;
        var base_url = document.getElementById('base_url').value;

        var controlador = base_url+'sesion/cambiar_reutfiltro';
        document.getElementById('loadercambioreutlizacionfiltro').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                async: false,
                data:{sesion_reutlizacionfiltro:sesion_reutlizacionfiltro, registro_id:registro_id, sesion_id:sesion_id
                },
                success:function(result){
                    res = JSON.parse(result);
                    $('#sesion_reutlizacionfiltro').val(res);
                    $('#sesion_lineasav').val(res);
                    alert("El cambio del número de reutilizacion de filtro fue realizado correctamente");
                    $('#boton_cerrarmodalreutfiltro').click();
                    //mostrar_tablastratamiento();
                },
        });
    }else{
        alert("Por favor solo poner numeros que esten entre los valores 1 al 12");
    }
}

/* carga el modal para cambiar el tipo de filtro */
function mostrarmodal_cambiotipofiltro(registro_id, sesion_id, sesion_tipofiltro)
{
    document.getElementById('loadercambiotipofiltro').style.display = 'none';
    $("#cambiar_sesion_tipofiltro").val(sesion_tipofiltro);
    $("#cambiartfiltro_registro_id").val(registro_id);
    $("#cambiartfiltro_sesion_id").val(sesion_id);
    
    $('#modal_cambiotipofiltro').on('shown.bs.modal', function (e) {
        $('#cambiar_sesion_tipofiltro').focus();
    });
}

function cambiar_tipofiltro()
{
    let sesion_tipofiltro = document.getElementById("cambiar_sesion_tipofiltro").value;
    let registro_id = document.getElementById("cambiartfiltro_registro_id").value;
    let sesion_id = document.getElementById("cambiartfiltro_sesion_id").value;
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'sesion/cambiar_tipofiltro';
    document.getElementById('loadercambiotipofiltro').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{sesion_tipofiltro:sesion_tipofiltro, registro_id:registro_id, sesion_id:sesion_id
            },
            success:function(result){
                res = JSON.parse(result);
                $('#sesion_tipofiltro').val(res);
                alert("El cambio del tipo de filtro se realizo correctamente");
                $('#boton_cerrarmodalcambiartipofiltro').click();
                //mostrar_tablastratamiento();
            },
    });
}

/* carga el modal para cambiar Devolucion */
function mostrarmodal_cambiodevol(registro_id, sesion_id, sesion_devolucion)
{
    document.getElementById('loadercambiodevol').style.display = 'none';
    $("#cambiar_sesion_devolucion").val(sesion_devolucion);
    $("#cambiardevol_registro_id").val(registro_id);
    $("#cambiardevol_sesion_id").val(sesion_id);
    
    $('#modal_cambiodevol').on('shown.bs.modal', function (e) {
        $('#cambiar_sesion_devolucion').focus();
    });
}

function cambiar_devol(uno_omas)
{
    let sesion_devolucion = document.getElementById("cambiar_sesion_devolucion").value;
    let sesion_id = document.getElementById("cambiardevol_sesion_id").value;
    let registro_id = document.getElementById("cambiardevol_registro_id").value;
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'sesion/cambiar_devol';
    document.getElementById('loadercambiodevol').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{sesion_devolucion:sesion_devolucion, sesion_id:sesion_id, registro_id:registro_id, uno_omas:uno_omas
            },
            success:function(result){
                res = JSON.parse(result);
                $('#sesion_devolucion').val(res);
                alert("El cambio de Devol. se realizo correctamente");
                $('#boton_cerrarmodalcambiardevol').click();
            },
    });
}

/* carga el modal para cambiar Heparina */
function mostrarmodal_cambioheparina(registro_id, sesion_id, sesion_heparina)
{
    document.getElementById('loadercambioheparina').style.display = 'none';
    $("#cambiar_sesion_heparina").val(sesion_heparina);
    $("#cambiarheparina_registro_id").val(registro_id);
    $("#cambiarheparina_sesion_id").val(sesion_id);
    
    $('#modal_cambioheparina').on('shown.bs.modal', function (e) {
        $('#cambiar_sesion_heparina').focus();
    });
}

function cambiar_heparina(uno_omas)
{
    let sesion_heparina = document.getElementById("cambiar_sesion_heparina").value;
    let sesion_id = document.getElementById("cambiarheparina_sesion_id").value;
    let registro_id = document.getElementById("cambiarheparina_registro_id").value;
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'sesion/cambiar_heparina';
    document.getElementById('loadercambioheparina').style.display = 'block';
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{sesion_heparina:sesion_heparina, sesion_id:sesion_id, registro_id:registro_id, uno_omas:uno_omas
            },
            success:function(result){
                res = JSON.parse(result);
                $('#sesion_heparina').val(res);
                alert("El cambio de Heparina se realizo correctamente");
                $('#boton_cerrarmodalcambiarheparina').click();
            },
    });
}