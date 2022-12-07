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
                        html += "<tr onclick='este_pacientesesiones("+JSON.stringify(pacientes[i])+"); ocultar_tabla()' style='cursor: pointer'>";
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
}

/* Poner información del paciente seleccionado y obtiene
*  las sesiones no cerradas (pendiente, proceso)
*/
function este_pacientesesiones(paciente)
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
        let controlador = base_url+'sesion/mostrar_sesiones_aregistrar';

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
                                html += "<tr onclick='ir_adetalleprocedimiento("+sesiones[i]["sesion_id"]+"); ocultar_tabla()' style='cursor: pointer'>";
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

function ir_adetalleprocedimiento(sesion_id){
    let base_url = document.getElementById('base_url').value;
    let dir_url  = base_url+"sesion/detalle_procedimientoed/"+sesion_id;
    window.open(dir_url, '_blank');
}
