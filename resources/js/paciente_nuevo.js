$(document).on("ready",inicio);
function inicio(){
    datospara_nuevoregistro();
} 

/* carga modal de nuevo registro */
function datospara_nuevoregistro()
{
    $("#registro_fecha").val(moment(Date()).format("YYYY-MM-DD"));
    $("#registro_hora").val(moment(Date()).format("HH:mm:ss"));
    const mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    html = "<select name='registro_mes' id='registro_mes' class='form-control'>";
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
    html2 = "<select name='registro_gestion' id='registro_gestion' class='form-control'>";
    for(var j = elanio; j < elaniook; j++) {
        selected = "";
        if((elanio+6) == j){
            selected = "selected";
        }
        html2 += "<option value='"+(j)+"' "+selected+">"+(j)+"</option>";
    }
    html2 += "</select>";
    $("#lagestion").html(html2);
    $("#registro_numaquina").val(1);
    $("#registro_numerosesion").val(0);
    $("#registro_iniciohemodialisis").val(moment(Date()).format("YYYY-MM-DD"));
    $("#registro_filtro").val(0);
    $("#registro_diagnostico").val("");
    $('#modal_nuevoregistro').on('shown.bs.modal', function (e) {
        $('#registro_fecha').focus();
    });
}

function detalle_acceso()
{
    let avascular_nombre = document.getElementById("avascular_nombre").value;
    if(avascular_nombre ==  "Cateter"){
        html = "<select name='avascular_detalle' id='avascular_detalle' class='form-control'>";
        html += "<option value='P-YSCD'>P-YSCD</option>";
        html += "<option value='P-YSCI'>P-YSCI</option>";
        html += "<option value='T-YSCD'>T-YSCD</option>";
        html += "<option value='T-YSCI'>T-YSCI</option>";
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