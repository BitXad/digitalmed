$(document).on("ready",inicio);
function inicio(){
    mostrar_tablas();
} 

/* carga modal de nueva sesion  en limpio */
function cargarmodal_nuevasesion()
{
    let nueva_sesion = document.getElementById("nueva_sesion").value;
    if(nueva_sesion == 1){
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
    }else{
        alert("Usted no tiene permisos para generar nuevas Sesiones.\n por favor consulte con su Administrador!.");
    }
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
                        document.getElementById('una_nuevasesion').style.display = 'block';
                    }else{
                        document.getElementById('nuevas_sesiones').style.display = 'block';
                        document.getElementById('una_nuevasesion').style.display = 'none';
                    }
                    let html = "";
                    let total_sesion = 0;
                    let total_hierroev = 0;
                    let total_complejobamp = 0;
                    let total_costosesion = 0;
                    /*let total_omeprazol = 0;
                    let total_acidofolico = 0;
                    let total_calcio = 0;
                    let total_amlodipina = 0;
                    let total_enalpril = 0;
                    let total_losartan = 0;
                    let total_atorvastina = 0;
                    let total_asa = 0;
                    let total_complejob = 0;*/
                    
                    for(var i = 0; i < n ; i++){
                        total_sesion += Number(1);
                        if(registros[i]["sesion_hierroeve"] != "" || registros[i]["sesion_hierroeve"] != null){
                            total_hierroev += Number(1);
                        }
                        if(registros[i]["sesion_complejobampolla"] != "" || registros[i]["sesion_complejobampolla"] != null){
                            total_complejobamp += Number(1);
                        }
                        total_costosesion += Number(registros[i]["sesion_costosesion"]);
                        
                        /*if(registros[i]["sesion_omeprazol"] != "" || registros[i]["sesion_omeprazol"] != null){
                            total_omeprazol += Number(registros[i]["sesion_omeprazol"]);
                        }
                        if(registros[i]["sesion_acidofolico"] != "" || registros[i]["sesion_acidofolico"] != null){
                            total_acidofolico += Number(registros[i]["sesion_acidofolico"]);
                        }
                        if(registros[i]["sesion_calcio"] != "" || registros[i]["sesion_calcio"] != null){
                            total_calcio += Number(registros[i]["sesion_calcio"]);
                        }
                        if(registros[i]["sesion_amlodipina"] != "" || registros[i]["sesion_amlodipina"] != null){
                            total_amlodipina += Number(registros[i]["sesion_amlodipina"]);
                        }
                        if(registros[i]["sesion_enalpril"] != "" || registros[i]["sesion_enalpril"] != null){
                            total_enalpril += Number(registros[i]["sesion_enalpril"]);
                        }
                        if(registros[i]["sesion_losartan"] != "" || registros[i]["sesion_losartan"] != null){
                            total_losartan += Number(registros[i]["sesion_losartan"]);
                        }
                        if(registros[i]["sesion_atorvastina"] != "" || registros[i]["sesion_atorvastina"] != null){
                            total_atorvastina += Number(registros[i]["sesion_atorvastina"]);
                        }
                        if(registros[i]["sesion_asa"] != "" || registros[i]["sesion_asa"] != null){
                            total_asa += Number(registros[i]["sesion_asa"]);
                        }
                        if(registros[i]["sesion_complejob"] != "" || registros[i]["sesion_complejob"] != null){
                            total_complejob += Number(registros[i]["sesion_complejob"]);
                        }
                        */
                        //html += "<tr style='background-color: #"+registros[i]['estado_color']+"'>"; 
                        html += "<tr>"; 
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_eritropoyetina']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_hierroeve']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_complejobampolla']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_costosesion']+"</td>";
                        /*html += "<td class='text-center'>"+registros[i]['sesion_omeprazol']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_acidofolico']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_calcio']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_amlodipina']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_enalpril']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_losartan']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_atorvastina']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_asa']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['sesion_complejob']+"</td>";
                        */
                        html += "<td class='text-center' style='background-color: #"+registros[i]['estado_color']+"'>"+registros[i]['estado_descripcion']+"</td>";
                        html += "<td class='text-center'>"+moment(registros[i]["sesion_fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td class='text-center'>";
                        html += "<a href='"+base_url+"sesion/modificar/"+registros[i]['sesion_id']+"' class='btn btn-info btn-xs' title='Modificar medicacion oral y EV'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"sesion/detalle_procedimiento/"+registros[i]['sesion_id']+"' class='btn btn-facebook btn-xs' title='Detalle de procedimiento de hemodialisis'><span class='fa fa-file-text'></span></a>";
                        html += "<a href='"+base_url+"sesion/detalle_medicacion/"+registros[i]['sesion_id']+"' class='btn btn-soundcloud btn-xs' title='Medicamentos e insumos usados' target='_blank'><span class='fa fa-medkit'></span></a>";
                        html += "<a href='"+base_url+"reportes/detalle_procedimiento/"+registros[i]['sesion_id']+"' target='_blank' class='btn btn-success btn-xs' title='Imprimir detalle de procedimiento de hemodialisis'><span class='fa fa-file-text-o'></span></a>";
                        html += "<a onclick='eliminar_sesion("+registros[i]['sesion_id']+")' class='btn btn-danger btn-xs' title='Eliminar sesion del sistema'><span class='fa fa-trash'></span></a>";
                        html += "</td>";
                        html += "</tr>";
                    }
                    html += "<tr>";
                    html += "<td class='text-center'>"+total_sesion+"</td>"; 
                    html += "<td class='text-center'></td>"; 
                    html += "<td class='text-center'>"+total_hierroev+"</td>"; 
                    html += "<td class='text-center'>"+total_complejobamp+"</td>"; 
                    html += "<td class='text-center'>"+total_costosesion+"</td>";
                    /*html += "<td class='text-center'>"+total_omeprazol+"</td>";
                    html += "<td class='text-center'>"+total_acidofolico+"</td>";
                    html += "<td class='text-center'>"+total_calcio+"</td>";
                    html += "<td class='text-center'>"+total_amlodipina+"</td>";
                    html += "<td class='text-center'>"+total_enalpril+"</td>";
                    html += "<td class='text-center'>"+total_losartan+"</td>";
                    html += "<td class='text-center'>"+total_atorvastina+"</td>";
                    html += "<td class='text-center'>"+total_asa+"</td>";
                    html += "<td class='text-center'>"+total_complejob+"</td>";
                    */
                    html += "<td></td>";
                    
                    html += "<td class='text-center'></td>"; 
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

/* carga modal de una sola nueva sesion en limpio */
function cargarmodal_unanuevasesion()
{
    let tipousuario_id = document.getElementById("tipousuario_id").value;
    if(tipousuario_id == 1){
        document.getElementById('loaderunonuevo').style.display = 'none';
        $("#una_sesion_numero").val(1);
        $("#una_sesion_fechainicio").val(moment(Date()).format("YYYY-MM-DD"));
        $("#una_sesion_hierroev").val("100 Mg.");
        $("#una_sesion_complejobampolla").val("1 AMPOLLA");
        $("#una_sesion_costosesion").val("713");
        $('#modal_unanuevasesion').on('shown.bs.modal', function (e) {
            $('#una_sesion_numero').focus();
        });
    }else{
        alert("Usted no tiene permisos para generar una nueva Sesion.\n por favor consulte con su Administrador!.");
    }
}

function generar_unasesion()
{
    var sesion_numero = document.getElementById("una_sesion_numero").value;
    var sesion_fechainicio = document.getElementById("una_sesion_fechainicio").value;
    var sesion_eritropoyetina = document.getElementById("una_sesion_eritropoyetina").value;
    var sesion_hierroev = document.getElementById("una_sesion_hierroev").value;
    var sesion_complejobampolla = document.getElementById("una_sesion_complejobampolla").value;
    var sesion_costosesion = document.getElementById("una_sesion_costosesion").value;
    var tratamiento_id = document.getElementById("tratamiento_id").value;
    
    if(sesion_numero > 0){
        //let d = new Date(sesion_fechainicio);
        //alert(sesion_fechainicio);
        //alert(d.getDay());
        //if(d.getDay() > 0){
            var base_url = document.getElementById('base_url').value;
            var controlador = base_url+'sesion/generar_sesion';
            document.getElementById('loaderunonuevo').style.display = 'block';
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
                            document.getElementById('loaderunonuevo').style.display = 'none';
                        }else{
                            alert("Sesion(es) generada(s) correctamente");
                            $('#boton_cerrarmodaluna').click();
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

function eliminar_sesion(sesion_id){
    let eliminar_sesion = document.getElementById("eliminar_sesion").value;
    if(eliminar_sesion == 1){
        let confirmacion =  confirm('Esta seguro que quiere eliminar esta Sesion del sistema?\n Nota.- esta operacion es irreversible!.')
        if(confirmacion == true){
            let base_url = document.getElementById('base_url').value;
            dir_url = base_url+"sesion/remove/"+sesion_id;
            location.href =dir_url;
        }
    }else{
        alert("Usted no tiene permisos para eliminar Sesiones.\n por favor consulte con su Administrador!.");
    }
}

