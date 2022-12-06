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
                        html += "<tr onclick='este_asociado("+JSON.stringify(pacientes[i])+"); ocultar_tabla()' style='cursor: pointer'>";
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
    $("#registro_id").val("");
    $("#nombre_paciente").html("-");
    $("#ci_paciente").html("-");
    $("#telefono_paciente").html("-");
    $("#direccion_paciente").html("-");
    $("#nueva_sesion").css("display", "none");
}

/* poner informacion del paciente seleccionado */
function este_asociado(paciente)
{
    let paciente_id = paciente['paciente_id'];
    let registro = get_registro_paciente(paciente_id);
    if(registro != ""){
        registro = JSON.parse(registro);
        let elpaciente = JSON.stringify(paciente);
        $("#elpaciente").val(elpaciente);
        $("#paciente_id").val(paciente_id);
        $("#registro_id").val(registro['registro_id']);
        $("#nombre_paciente").html(paciente['paciente_apellido']+" "+paciente['paciente_nombre']);
        $("#ci_paciente").html(paciente['paciente_ci']);
        $("#telefono_paciente").html(paciente['paciente_telefono']+" - "+paciente['paciente_celular']);
        $("#direccion_paciente").html(paciente['paciente_direccion']);
        $("#nueva_sesion").css("display", "block");

        let base_url = document.getElementById('base_url').value;
        let controlador = base_url+'tratamiento/mostrar_tratamientospaciente';

        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
        $("#encontrados").html(0);
        $.ajax({url: controlador,
                type:"POST",
                data:{paciente_id:paciente_id},
                success:function(respuesta){
                    var tratamientos =  JSON.parse(respuesta);
                    if (tratamientos != null){
                        let n = tratamientos.length;
                        $("#encontrados").html(n);
                        let html = "";
                        html += "<div class='box'>";
                        html += "<div class='box-body table-responsive no-padding'>";
                        html += "<table id='mitabla' class='table table-striped'>";
                        html += "<thead>";
                        html += "    <tr>";
                        html += "        <th>#</th>";
                        html += "        <th>MES</th>";
                        html += "        <th>GESTION</th>";
                        html += "        <th>FECHA</th>";
                        html += "        <th>HORA</th>";
                        html += "    </tr>";
                        html += "</thead>";
                        html += "<tbody class='buscar'>";
                        for(var i = 0; i < n ; i++){
                            //html += "<tr style='background-color: #"+tratamientos[i]['estado_color']+"'>"; 
                            html += "<tr>";
                            html += "<td class='text-center'>"+(i+1)+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_mes']+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_gestion']+"</td>";
                            html += "<td class='text-center'>"+moment(tratamientos[i]["tratamiento_fecha"]).format("DD/MM/YYYY")+"</td>";
                            html += "<td class='text-center'>"+tratamientos[i]['tratamiento_hora']+"</td>";
                            html += "</tr>";
                        }
                        html += "</tbody>";
                        html += "</div>";
                        html += "</div>";
                        html += "</table";

                        $("#tablaresultadostratamiento").html(html);
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
    }else{
        alert("No tiene registro este paciente, consulte con su administrador!.");
    }
}

function get_registro_paciente(paciente_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'tratamiento/get_registropaciente';
    document.getElementById('loader').style.display = 'block';
    let registro = "";
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{paciente_id:paciente_id
            },
            success:function(result){
                res = JSON.parse(result);
                if(res != null){
                    if(res["registro_id"] > 0){
                        registro = JSON.stringify(res);
                        //alert(registro);
                    }
                    document.getElementById('loader').style.display = 'none';
                }
            },
    });
    return registro;
}

/* carga modal de nueva sesion en limpio */
function cargarmodal_nuevas_sesiones()
{
    document.getElementById('loadernuevo').style.display = 'none';
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
    
    $("#sesion_numero").val(0);
    $("#sesion_fechainicio").val(moment(Date()).format("YYYY-MM-DD"));
    $("#sesion_hierroev").val("100 Mg.");
    $("#sesion_complejobampolla").val("1 AMPOLLA");
    $("#sesion_costosesion").val("713");
    $('#modal_nuevasesion').on('shown.bs.modal', function (e) {
        $('#sesion_numero').focus();
        $('#sesion_numero').select();
    });
}

function generar_nuevas_sesiones()
{
    let tratamiento_fecha = document.getElementById("tratamiento_fecha").value;
    let tratamiento_hora = document.getElementById("tratamiento_hora").value;
    let tratamiento_mes = document.getElementById("tratamiento_mes").value;
    let tratamiento_gestion = document.getElementById("tratamiento_gestion").value;
    let registro_id = document.getElementById("registro_id").value;
    
    var sesion_numero = document.getElementById("sesion_numero").value;
    var sesion_fechainicio = document.getElementById("sesion_fechainicio").value;
    var sesion_eritropoyetina = document.getElementById("sesion_eritropoyetina").value;
    var sesion_hierroev = document.getElementById("sesion_hierroev").value;
    var sesion_complejobampolla = document.getElementById("sesion_complejobampolla").value;
    var sesion_costosesion = document.getElementById("sesion_costosesion").value;
    
    if(sesion_numero > 0){
        //let d = new Date(sesion_fechainicio);
        //alert(sesion_fechainicio);
        //alert(d.getDay());
        //if(d.getDay() > 0){
            var base_url = document.getElementById('base_url').value;
            var controlador = base_url+'tratamiento/registrar_tratamientosesiones';
            document.getElementById('loadernuevo').style.display = 'block';
            $.ajax({url:controlador,
                    type:"POST",
                    data:{tratamiento_fecha:tratamiento_fecha, tratamiento_hora:tratamiento_hora,
                          tratamiento_mes:tratamiento_mes, tratamiento_gestion:tratamiento_gestion,
                          registro_id:registro_id, sesion_numero:sesion_numero, sesion_fechainicio:sesion_fechainicio,
                          sesion_eritropoyetina:sesion_eritropoyetina, sesion_hierroev:sesion_hierroev,
                          sesion_complejobampolla:sesion_complejobampolla, sesion_costosesion:sesion_costosesion,
                    },
                    success:function(result){
                        res = JSON.parse(result);
                        if(res == "no"){
                            alert("Debe elegir otro dia que no sea Domingo.");
                            document.getElementById('loadernuevo').style.display = 'none';
                        }else{
                            alert("Sesiones generadas correctamente");
                            $('#boton_cerrarmodal').click();
                            
                            let paciente = document.getElementById('elpaciente').value;
                            paciente =  JSON.parse(paciente);
                            este_asociado(paciente);
                        }
                    },
            });
            
        /*}else{
            alert("Debe elegir otro dia que no sea Domingo.");
        }*/
    }else{
        alert("El Numero de Sesiones debe ser mayor a 0; por favor verifique sus datos!.");
    }
}
