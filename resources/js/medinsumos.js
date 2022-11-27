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
        html += "<tr style='font-size: 7.5px'>";
            html += "<td class='borde text-center'>"+med_insumo[i]['medicamento_id']+"</td>";
            html += "<td class='borde'>"+med_insumo[i]['medicamento_nombre']+"</td>";
            html += "<td class='borde'>"+med_insumo[i]['medicamento_forma']+"</td>";
            html += "<td class='borde'>"+med_insumo[i]['medicamento_concentracion']+"</td>";
            let totalmed = 0;
            for(var j = 0; j < m ; j++){
                let med_usado = JSON.parse(getmedicamento_usado(med_insumo[i]['medicamento_id'], sesiones[j]["sesion_id"]));
                let cant_medicamento = "";
                if(med_usado != null){
                    totalmed = Number(Number(totalmed)+Number(med_usado["medicacion_cantidad"]));
                    cant_medicamento = med_usado["medicacion_cantidad"];
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