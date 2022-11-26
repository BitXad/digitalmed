$(document).on("ready",inicio);
function inicio(){
    //mostrar_tablasregistro();
} 

function detalle_acceso()
{
    let avascular_nombre = document.getElementById("avascular_nombre").value;
    if(avascular_nombre ==  "Cateter"){
        html = "<select name='avascular_detalle' id='avascular_detalle' class='form-control'>";
        html += "<option value='P-YSCD'>P-YSCD</option>";
        html += "<option value='P-YSCI'>P-YSCI</option>";
        html += "<option value='T-YSCD'>P-YSCD</option>";
        html += "<option value='T-YSCI'>P-YSCI</option>";
        html += "<option value='Femoral I'>Femoral I</option>";
        html += "<option value='Femoral D'>Femoral D</option>";
        html += "</select>";
        $('#avasculardetalle').html(html);
    }else{
        html = "<select name='avascular_detalle' id='avascular_detalle' class='form-control'>";
        html += "<option value='Protesis I'>Protesis I</option>";
        html += "<option value='Protesis D'>Protesis D</option>";
        html += "<option value='MSD'>MSD</option>";
        html += "<option value='MSI'>MSI</option>";
        html += "</select>";
        $('#avasculardetalle').html(html);
    }
}


function registrar_acceso()
{
    let paciente_id = document.getElementById("paciente_id").value;
    let registro_id = document.getElementById("registro_id").value;
    let avascular_nombre = document.getElementById("avascular_nombre").value;
    let avascular_detalle = document.getElementById("avascular_detalle").value;
    if(avascular_detalle != "" && avascular_detalle != null){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'acceso_vascular/registrar_accesovascular';
        document.getElementById('loaderacceso').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{paciente_id:paciente_id, registro_id:registro_id,
                      avascular_nombre:avascular_nombre, avascular_detalle:avascular_detalle
                },
                success:function(result){
                    res = JSON.parse(result);
                        alert("Nuevo Acceso Vascular generado correctamente");
                        $('#boton_cerrarmodal').click();
                        window.location.reload(); //mostrar_tablasregistro();
                        //window.reload(); //mostrar_tablasregistro();
                },
        });
    }else{
        alert("Se debe elegir un acceso vascular!.");
    }
            
}
