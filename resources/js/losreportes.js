/*
$(document).on("ready",inicio);
function inicio(){
    //mostrar_tablastratamiento();
}*/


/*
 * Funcion que buscara pacientes al precioonar enter
 */
function buscarpaciente(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        mostrar_tablapacientes();
    }
}

function mostrar_tablapacientes()
{
    limpiar_inf_asociado();
    let base_url = document.getElementById('base_url').value;
    let filtrar = document.getElementById('filtrar').value;
    let controlador = base_url+'tratamiento/get_pacientes';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $("#encontrados").html(0);
    $.ajax({url: controlador,
            type:"POST",
            data:{filtrar:filtrar},
            success:function(respuesta){
                var pacientes =  JSON.parse(respuesta);
                if (pacientes != null){
                    let n = pacientes.length;
                    $("#encontrados").html(n);
                    let html = "";
                    html += "<div class='box'>";
                    html += "<div class='box-body table-responsive no-padding'>";
                    html += "<table id='mitabla' class='table table-striped'>";
                    html += "<thead>";
                    html += "    <tr>";
                    html += "        <th>#</th>";
                    html += "        <th>APELLIDO</th>";
                    html += "        <th>NOMBRE</th>";
                    html += "        <th>CI</th>";
                    html += "        <th>DIRECCION</th>";
                    html += "        <th>TELEFONO</th>";
                    html += "        <th>CELULAR</th>";
                    html += "    </tr>";
                    html += "</thead>";
                    html += "<tbody class='buscar'>";
                    for(var i = 0; i < n ; i++){
                        html += "<tr onclick='este_pacientereportes("+JSON.stringify(pacientes[i])+"); ocultar_tabla()' style='cursor: pointer'>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td>"+pacientes[i]['paciente_apellido']+"</td>";
                        html += "<td>"+pacientes[i]['paciente_nombre']+"</td>";
                        html += "<td>"+pacientes[i]['paciente_ci']+"</td>";
                        html += "<td>"+pacientes[i]['paciente_direccion']+"</td>";
                        html += "<td>"+pacientes[i]['paciente_telefono']+"</td>";
                        html += "<td>"+pacientes[i]['paciente_celular']+"</td>";
                        html += "</tr>";
                    }
                    html += "</tbody>";
                    html += "</div>";
                    html += "</div>";
                    html += "</table";
                    
                    $("#tablaresultadospaciente").html(html);
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

function ocultar_tabla(){
    var html = "";
    $("#tablaresultadospaciente").html(html);
}

function limpiar_inf_asociado(){
    var html = "";
    $("#tablaresultadostratamiento").html(html);
    $("#elpaciente").val("");
    $("#nombre_paciente").html("-");
    $("#ci_paciente").html("-");
    $("#telefono_paciente").html("-");
    $("#direccion_paciente").html("-");
    $("#reporte_gestion").html("-");
    $("#reporte_mes").html("-");
    $("#reporte_elegido").css("display", "none");
    $("#los_reportes").css("display", "none");
}

/* Poner información del paciente seleccionado y obtiene
*  las sesiones no cerradas (pendiente, proceso)
*/
function este_pacientereportes(paciente)
{
    let paciente_id = paciente['paciente_id'];
    //let registro = get_registro_paciente(paciente_id);
    //if(registro != ""){
        //registro = JSON.parse(registro);
        let elpaciente = JSON.stringify(paciente);
        $("#elpaciente").val(elpaciente);
        $("#paciente_id").val(paciente_id);
        //$("#registro_id").val(registro['registro_id']);
        $("#nombre_paciente").html(paciente['paciente_apellido']+" "+paciente['paciente_nombre']);
        $("#ci_paciente").html(paciente['paciente_ci']);
        $("#telefono_paciente").html(paciente['paciente_telefono']+" - "+paciente['paciente_celular']);
        $("#direccion_paciente").html(paciente['paciente_direccion']);

        let base_url = document.getElementById('base_url').value;
        let controlador = base_url+'sesion/mostrar_sesionesde_paciente';

        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
        $("#encontrados").html(0);
        $.ajax({url: controlador,
                type:"POST",
                data:{paciente_id:paciente_id},
                success:function(respuesta){
                    var sesiones =  JSON.parse(respuesta);
                    if (sesiones != null){
                        //if(sesiones[0]["sesion_id"] > 0){
                            let n = sesiones.length;
                            $("#encontrados").html(n);
                            let html = "";
                            html += "<div class='box'>";
                            html += "<div class='box-body table-responsive no-padding'>";
                            html += "<table id='mitabla' class='table table-striped'>";
                            html += "<thead>";
                            html += "    <tr>";
                            html += "        <th>#</th>";
                            html += "        <th>GESTION</th>";
                            html += "        <th>MES</th>";
                            html += "        <th>Nro. SESION</th>";
                            html += "        <th>FECHA SESION</th>";
                            html += "        <th>ERITROPOYETINA</th>";
                            html += "        <th>HIERRO E.V.</th>";
                            html += "        <th>COMPEJO B</th>";
                            //html += "        <th>COSTO SESION</th>";
                            html += "    </tr>";
                            html += "</thead>";
                            html += "<tbody class='buscar'>";
                            for(var i = 0; i < n ; i++){
                                html += "<tr onclick='elegir_sesionmes("+JSON.stringify(sesiones[i])+");' style='cursor: pointer'>";
                                html += "<td class='text-center'>"+(i+1)+"</td>";
                                html += "<td class='text-center'>"+sesiones[i]['tratamiento_gestion']+"</td>";
                                html += "<td class='text-center'>"+sesiones[i]['tratamiento_mes']+"</td>";
                                html += "<td class='text-center text-bold'>"+sesiones[i]['sesion_numero']+"</td>";
                                html += "<td class='text-center'>"+moment(sesiones[i]["sesion_fecha"]).format("DD/MM/YYYY")+"</td>";
                                html += "<td class='text-center'>"+sesiones[i]['sesion_eritropoyetina']+"</td>";
                                html += "<td class='text-center'>"+sesiones[i]['sesion_hierroeve']+"</td>";
                                html += "<td class='text-center'>"+sesiones[i]['sesion_complejobampolla']+"</td>";
                                //html += "<td class='text-center'>"+sesiones[i]['sesion_costosesion']+"</td>";
                                html += "</tr>";
                            }
                            html += "</tbody>";
                            html += "</div>";
                            html += "</div>";
                            html += "</table";

                            $("#tablaresultadostratamiento").html(html);
                            document.getElementById('loader').style.display = 'none';
                        //}
                    }
                    document.getElementById('loader').style.display = 'none';
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            }

        });
    /*}else{
        alert("No tiene registro este paciente, consulte con su administrador!.");
    }*/
}

function elegir_sesionmes(sesion){
    let dirurl = document.getElementById('base_url').value;
    $("#reporte_gestion").html(sesion['tratamiento_gestion']);
    $("#reporte_mes").html(sesion['tratamiento_mes']);
    $("#sesion_numero").html(sesion['sesion_numero']);
    $("#reporte_elegido").css("display", "block");
    $("#los_reportes").css("display", "block");
    
    html = "<a style='width: 150px; height: 50px;' href='"+dirurl+"reportes/reportesesiones/"+sesion['tratamiento_id']+"' target='_blank' class='btn btn-facebook btn-xs' title='Planilla oral y EV'>";
    html += "    <span class='fa fa-file-text fa-2x'></span><br> Planilla oral y EV";
    html += "</a>";
    $("#planilla_oral").html(html);
    
    let ladireccion = "";
    if(sesion['infmensual_id'] > 0){
        ladireccion = "href='"+dirurl+"reportes/informecmensual/"+sesion['tratamiento_id']+"'";
    }else{
        let mensaje = "Aun no se registro el Informe Clinico Mensual !.";
        ladireccion = "onclick='mostrar_mensaje("+JSON.stringify(mensaje)+")'";
    }
    html = "<a style='width: 150px; height: 50px;' "+ladireccion+" target='_blank' class='btn btn-dropbox btn-xs' title='Informe clinico mensual'>";
    html += "    <span class='fa fa-calendar fa-2x'></span><br> Informe Clinico Mensual";
    html += "</a>";
    $("#informe_cmensual").html(html);
    
    ladireccion = "";
    if(sesion['anemiaglic_id'] > 0){
        ladireccion = "href='"+dirurl+"reportes/infanemiaglicemia/"+sesion['tratamiento_id']+"'";
    }else{
        let mensaje = "Aun no se registro el Informe Mensual de Anemia y/o Glicemia !.";
        ladireccion = "onclick='mostrar_mensaje("+JSON.stringify(mensaje)+")'";
    }
    html = "<a style='width: 150px; height: 50px;' "+ladireccion+" target='_blank' class='btn btn-yahoo btn-xs' title='Informe mensual de anemia/glicemia'>";
    html += "    <span class='fa fa-calendar fa-2x'></span><br> Informe Anemia/Glicemia";
    html += "</a>";
    $("#informe_anemiaglicemia").html(html);
    
    ladireccion = "";
    if(sesion['certmedico_id'] > 0){
        ladireccion = "href='"+dirurl+"reportes/certificadomedico/"+sesion['certmedico_id']+"'";
    }else{
        let mensaje = "Aun no se registro el certificado medico!.";
        ladireccion = "onclick='mostrar_mensaje("+JSON.stringify(mensaje)+")'";
    }
    //html = "<a style='width: 150px; height: 50px;' href='"+dirurl+"reportes/certificadomedico/"+sesion['certmedico_id']+"' target='_blank' class='btn btn-google btn-xs' title='Certificado medico mensual'>";
    html = "<a style='width: 150px; height: 50px;' "+ladireccion+" target='_blank' class='btn btn-google btn-xs' title='Certificado medico mensual'>";
    html += "    <span class='fa fa-file-text fa-2x'></span><br> Certificado Medico Mensual";
    html += "</a>";
    $("#certificadom_mensual").html(html);
    
    html = "<a style='width: 150px; height: 50px;' href='"+dirurl+"reportes/detalle_procedimiento/"+sesion['sesion_id']+"' target='_blank' class='btn btn-success btn-xs' title='Detalle de procedimiento de hemodialisis'>";
    html += "    <span class='fa fa-file-text-o fa-2x'></span><br> Detalle del Procedimiento";
    html += "</a>";
    $("#detalle_procedimiento").html(html);
    
    html = "<a style='width: 150px; height: 50px;' href='"+dirurl+"reportes/medinsumos/"+sesion['tratamiento_id']+"' target='_blank' class='btn btn-dropbox btn-xs' title='Medicamentos e insumos medicos otorgados y autorizados'>";
    html += "    <span class='fa fa-list-ol fa-2x'></span><br> Medicamentos e insumos";
    html += "</a>";
    $("#medicamentos_einsumos").html(html);
    
    
    
    
    
    
    // nota: los meses en java script cuentan dedsde 0..... ojo con eso!... comprara menores al 01 de marzo del 2019
    let fecha_limite = new Date('2019-02-01');
    let fecha_iniciohemod = new Date(sesion['registro_iniciohemodialisis']);
    if(fecha_iniciohemod < fecha_limite){
        $("#el_certificadomedico").css("display", "block");
    }
    
    
    let base_url = document.getElementById('base_url').value;
    //let dir_url  = base_url+"sesion/detalle_procedimientoed/"+sesion_id;
    //window.open(dir_url, '_blank');
}

function mostrar_mensaje(mensaje){
    alert(mensaje);
}
