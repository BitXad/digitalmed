$(document).on("ready",inicio);
function inicio(){
    mostrar_tablamedicamentoinsumo();
}


function mostrar_tablamedicamentoinsumo()
{
    //let base_url = document.getElementById('base_url').value;
    let sesiones = JSON.parse(document.getElementById('sesiones').value);
    let med_insumo = JSON.parse(document.getElementById('medicamento_insumo').value);
    let m = sesiones.length;
    let n = med_insumo.length;
    html = "";
    for(var i = 0; i < n ; i++){
        html += "<tr style='font-size: 6.6px'>";
        html += "<td class='borde text-center' style='padding-left: 1px; padding-right: 1px'>"+med_insumo[i]['medicamento_id']+"</td>";
        let tamanio_nombre = "font-size: 7.5px";
        if(med_insumo[i]['medicamento_id'] == 8 || med_insumo[i]['medicamento_id'] == 11){
            tamanio_nombre = "font-size: 6.3px";
        }
        if(med_insumo[i]['medicamento_id'] == 17 || med_insumo[i]['medicamento_id'] == 18 || med_insumo[i]['medicamento_id'] == 19){
            tamanio_nombre = "font-size: 7px";
        }
        if(med_insumo[i]['medicamento_id'] == 27){
            tamanio_nombre = "font-size: 4.8px";
        }
        html += "<td class='borde' style='padding-left: 1px; "+tamanio_nombre+"'>"+med_insumo[i]['medicamento_nombre']+"</td>";
        let tamanio_forma = "";
        if(med_insumo[i]['medicamento_id'] == 25){
            tamanio_forma = "font-size: 4px";
        }
        html += "<td class='borde' style='padding-left: 1px; "+tamanio_forma+"'>"+med_insumo[i]['medicamento_forma']+"</td>";
        let tamanio = "";
        if(med_insumo[i]['medicamento_concentracion'] == "Según disponibilidad"){
                tamanio = "font-size: 6px";
        }
        html += "<td class='borde' style='padding-left: 1px; "+tamanio+"'>"+med_insumo[i]['medicamento_concentracion']+"</td>";
        let totalmed = 0;
        for(var j = 0; j < m ; j++){
            let cant_medicamento = "";
            let lacant_medicamento = ""
            if(med_insumo[i]['medicamento_id'] == 7){
                lacant_medicamento = sesiones[j]["sesion_complejobampolla"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 9){
                lacant_medicamento = sesiones[j]["sesion_eritropoyetina"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 14){
                lacant_medicamento = sesiones[j]["sesion_hierroeve"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 34){
                lacant_medicamento = sesiones[j]["sesion_acidofolico"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 35){
                lacant_medicamento = sesiones[j]["sesion_amlodipina"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 36){
                lacant_medicamento = sesiones[j]["sesion_atorvastina"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 37){
                lacant_medicamento = sesiones[j]["sesion_calcio"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 39){
                lacant_medicamento = sesiones[j]["sesion_complejob"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 40){
                lacant_medicamento = sesiones[j]["sesion_enalpril"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 41){
                lacant_medicamento = sesiones[j]["sesion_losartan"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else if(med_insumo[i]['medicamento_id'] == 42){
                lacant_medicamento = sesiones[j]["sesion_omeprazol"];
                if(lacant_medicamento > 0){
                    totalmed = Number(Number(totalmed)+Number(lacant_medicamento));
                    cant_medicamento = lacant_medicamento;
                }
            }else{
                let res_medusados = getmedicamento_usado(med_insumo[i]['medicamento_id'], sesiones[j]["sesion_id"])
                let med_usado = null;
                if(res_medusados != ""){
                    med_usado = JSON.parse(res_medusados);
                }

                if(med_usado != null){
                    totalmed = Number(Number(totalmed)+Number(med_usado["medicacion_cantidad"]));
                    cant_medicamento = med_usado["medicacion_cantidad"];
                }
            }

            html += "<td class='borde text-center'>";
                html += cant_medicamento;
            html += "</td>";
        }
        html += "<td class='borde text-center'>";
        html += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        html += "</td>";
        html += "<td class='borde text-center'>";
        html += totalmed;
        html += "</td>";
        html += "<td class='borde text-center'>";
        html += totalmed;
        html += "</td>";
        html += "</tr>";
    }
    document.getElementById('loader').style.display = 'none';
    $("#tablamedicamentosinsumos").html(html);
    
}

/* obtiene el ultimo informe mensual de un paciente */
function getmedicamento_usado(medicamento_id, sesion_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'reportes/obtener_medicamentousado';
    let la_medicacion = "";
    $.ajax({url:controlador,
            type:"POST",
            async: false,
            data:{medicamento_id:medicamento_id, sesion_id:sesion_id
            },
            success:function(result){
                res = JSON.parse(result);
                if(res != null){
                    la_medicacion = JSON.stringify(res);
                }/*else{
                    la_medicacion = JSON.stringify("");
                }*/
            },
    });
    return la_medicacion;
}