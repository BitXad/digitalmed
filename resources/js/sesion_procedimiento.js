/*$(document).on("ready",inicio);
function inicio(){
    mostrar_tablas();
}*/

/* calcula Ingest */
function calcular_ingest()
{
    //document.getElementById('loadernuevo').style.display = 'none';
    let peso_seco = $("#sesion_pesoseco").val();
    let peso_egreso = $("#sesion_pesoegreso").val();
    $("#sesion_ingest").val(peso_egreso-peso_seco);
}

/* carga modal de nueva sesion  en limpio */
function mostrar_modalhora()
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