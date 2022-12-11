$(document).on("ready",inicio);
function inicio(){
    mostrar_tablas();
} 

/* carga modal de nueva sesion  en limpio */
function cargarmodal_nuevasesion()
{
    document.getElementById('loadernuevo').style.display = 'none';
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

function generar_sesiones()
{
    var sesion_numero = document.getElementById("sesion_numero").value;
    var sesion_fechainicio = document.getElementById("sesion_fechainicio").value;
    var sesion_eritropoyetina = document.getElementById("sesion_eritropoyetina").value;
    var sesion_hierroev = document.getElementById("sesion_hierroev").value;
    var sesion_complejobampolla = document.getElementById("sesion_complejobampolla").value;
    var sesion_costosesion = document.getElementById("sesion_costosesion").value;
    var tratamiento_id = document.getElementById("tratamiento_id").value;
    
    if(sesion_numero > 0){
        //let d = new Date(sesion_fechainicio);
        //alert(sesion_fechainicio);
        //alert(d.getDay());
        //if(d.getDay() > 0){
            var base_url = document.getElementById('base_url').value;
            var controlador = base_url+'sesion/generar_sesion';
            document.getElementById('loadernuevo').style.display = 'block';
            $.ajax({url:controlador,
                    type:"POST",
                    data:{sesion_numero:sesion_numero, sesion_fechainicio:sesion_fechainicio,
                        sesion_eritropoyetina:sesion_eritropoyetina, sesion_hierroev:sesion_hierroev,
                        sesion_complejobampolla:sesion_complejobampolla, sesion_costosesion:sesion_costosesion,
                        tratamiento_id:tratamiento_id
                    },
                    success:function(result){
                        res = JSON.parse(result);
                        if(res == "no"){
                            alert("Debe elegir otro dia que no sea Domingo.");
                            document.getElementById('loadernuevo').style.display = 'none';
                        }else{
                            alert("Sesiones generadas correctamente");
                            $('#boton_cerrarmodal').click();
                            mostrar_tablas();
                            
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

function mostrar_tablas()
{
    let base_url = document.getElementById('base_url').value;
    let tratamiento_id = document.getElementById('tratamiento_id').value;
    let controlador = base_url+'sesion/mostrar_sesiones';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{tratamiento_id:tratamiento_id},
            success:function(respuesta){
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    let n = registros.length;
                    if(n >0){
                        document.getElementById('nuevas_sesiones').style.display = 'none';
                    }else{
                        document.getElementById('nuevas_sesiones').style.display = 'block';
                    }
                    let html = "";
                    let total_sesion = 0;
                    let total_hierroev = 0;
                    let total_complejob = 0;
                    let total_costosesion = 0;
                    for(var i = 0; i < n ; i++){
                        total_sesion += Number(1);
                        if(registros[i]["sesion_hierroeve"] != "" || registros[i]["sesion_hierroeve"] != null){
                            total_hierroev += Number(1);
                        }
                        if(registros[i]["sesion_complejobampolla"] != "" || registros[i]["sesion_complejobampolla"] != null){
                            total_complejob += Number(1);
                        }
                        total_costosesion += Number(registros[i]["sesion_costosesion"]);
                        
                        html += "<tr style='background-color: #"+registros[i]['estado_color']+"'>"; 
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td class='text-center'>"+moment(registros[i]["sesion_fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_eritropoyetina']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_hierroeve']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_complejobampolla']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_costosesion']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['estado_descripcion']+"</td>";
                        html += "<td class='text-center'>";
                        html += "<a href='"+base_url+"sesion/detalle_procedimiento/"+registros[i]['sesion_id']+"' class='btn btn-facebook btn-xs' title='Detalle de procedimiento de hemodialisis'><span class='fa fa-file-text'></span></a>";
                        html += "<a href='"+base_url+"sesion/detalle_medicacion/"+registros[i]['sesion_id']+"' class='btn btn-soundcloud btn-xs' title='Medicamentos e insumos usados' target='_blank'><span class='fa fa-medkit'></span></a>";
                        html += "<a href='"+base_url+"sesion/modificar/"+registros[i]['sesion_id']+"' class='btn btn-info btn-xs' title='Modificar medicacion oral y EV'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"reportes/detalle_procedimiento/"+registros[i]['sesion_id']+"' target='_blank' class='btn btn-success btn-xs' title='Imprimir detalle de procedimiento de hemodialisis'><span class='fa fa-file-text-o'></span></a>";
                        html += "<a onclick='eliminar_sesion("+registros[i]['sesion_id']+")' class='btn btn-danger btn-xs' title='Eliminar sesion del sistema'><span class='fa fa-trash'></span></a>";
                        html += "</td>";
                        html += "</tr>";
                    }
                    html += "<tr>";
                    html += "<td class='text-center'>"+total_sesion+"</td>"; 
                    html += "<td class='text-center'></td>"; 
                    html += "<td class='text-center'></td>"; 
                    html += "<td class='text-center'>"+total_hierroev+"</td>"; 
                    html += "<td class='text-center'>"+total_complejob+"</td>"; 
                    html += "<td class='text-center'>"+total_costosesion+"</td>";
                    html += "<td></td>";
                    html += "<td></td>";
                    html += "<tr>";
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

function eliminar_sesion(sesion_id){
    let confirmacion =  confirm('Esta seguro que quiere eliminiar esta Sesion del sistema?\n Nota.- esta operacion es irreversible!.')
    if(confirmacion == true){
        let base_url = document.getElementById('base_url').value;
        dir_url = base_url+"sesion/remove/"+sesion_id;
        location.href =dir_url;
    }
    
}

