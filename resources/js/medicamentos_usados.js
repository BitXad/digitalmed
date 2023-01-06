$(document).on("ready",inicio);
function inicio(){
    mostrar_tablas();
} 

/* carga modal para asignar medicamentos */
function cargarmodal_asignarmedicamento()
{
    let asignar_insumo = document.getElementById("asignar_insumo").value;
    if(asignar_insumo == 1){
        document.getElementById('loaderasignarmedicamento').style.display = 'none';
        $("#filtrar2").val("");
        $("#tabla_asignarmedicamentos").val("");
        $('#modal_asignarmedicamento').on('shown.bs.modal', function (e) {
            $('#filtrar2').focus();
        });
    }else{
        alert("Usted no tiene permisos para Asignar Medicamento/Insumo.\n por favor consulte con su Administrador!.");
    }
}

/*
 * Funcion que busca medicamentos
 */
function buscar_medicamento(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        mostrarresultado_busquedamedicamentos();
    }
}

function mostrarresultado_busquedamedicamentos()
{
    let base_url = document.getElementById('base_url').value;
    let filtrar = document.getElementById('filtrar2').value;
    let controlador = base_url+'medicamento/mostrar_medicamentos';
    document.getElementById('loaderasignarmedicamento').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{filtrar:filtrar},
            success:function(respuesta){
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    let n = registros.length;
                    
                    let html = "";
                    for(var i = 0; i < n ; i++){
                        html += "<tr>"; 
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td>";
                        html += registros[i]['medicamento_nombre']+"<br>("+registros[i]['medicamento_codigo']+")";
                        html += "</td>";
                        html += "<td class='text-center'>"+registros[i]['medicamento_forma']+"<br>";
                        html += registros[i]['medicamento_concentracion'];
                        html += "</td>";
                        html += "<td>";
                        html += "<input type='number' step='any' name='cantidad"+registros[i]['medicamento_id']+"' class='form-control' id='cantidad"+registros[i]['medicamento_id']+"' required />";
                        html += "</td>";
                        html += "<td class='text-center'>";
                        html += "<a class='btn btn-success btn-xs' onclick='registrar_medicamento("+registros[i]['medicamento_id']+")' title='Registrar medicamento'><span class='fa fa-check'></span> Registrar</a>";
                        html += "</td>";
                        html += "</tr>";
                    }
                    $("#tabla_asignarmedicamentos").html(html);
                    document.getElementById('loaderasignarmedicamento').style.display = 'none';
                }
                document.getElementById('loaderasignarmedicamento').style.display = 'none';
        },
        error:function(respuesta){
          
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loaderasignarmedicamento').style.display = 'none'; //ocultar el bloque del loader 
        }
        
    });
}

function registrar_medicamento(medicamento_id)
{
    var sesion_id = document.getElementById("sesion_id").value;
    var cantidad  = document.getElementById("cantidad"+medicamento_id).value;
    if(cantidad > 0){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'medicamento/registrar_medicamento';
        document.getElementById('loaderasignarmedicamento').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{sesion_id:sesion_id, medicamento_id:medicamento_id,
                    cantidad:cantidad
                },
                success:function(result){
                    res = JSON.parse(result);
                    document.getElementById('loaderasignarmedicamento').style.display = 'none';
                    alert("El registro del medicamento fue exitoso!.");
                    mostrar_tablas();
                },
        });
    }else{
        alert("La cantidad debe ser mayor a 0; por favor verifique sus datos!.");
    }
}

function mostrar_tablas()
{
    let base_url = document.getElementById('base_url').value;
    let sesion_id = document.getElementById('sesion_id').value;
    let controlador = base_url+'sesion/mostrar_medicamentos';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{sesion_id:sesion_id},
            success:function(respuesta){
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    let modificar_insumo = document.getElementById("modificar_insumo").value;
                    let data_target = "";
                    if(modificar_insumo == 1){
                        data_target = 'data-target="#modal_modificarmedicamento"';
                    }
                    let n = registros.length;
                    html = "";
                    for(var i = 0; i < n ; i++){
                        html += "<tr style='background-color: #"+registros[i]['estado_color']+"'>"; 
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td class='text-center'>"+registros[i]['medicamento_nombre']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['medicamento_codigo']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['medicamento_forma']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['medicamento_concentracion']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['medicacion_cantidad']+"</td>";
                        html += "<td class='text-center'>"+registros[i]['estado_descripcion']+"</td>";
                        html += "<td class='text-center'>";
                        
                        html += "<a class='btn btn-info btn-xs' data-toggle='modal' "+data_target+" onclick='cargarmodal_modificarmedicamento("+JSON.stringify(registros[i])+")' title='Modificar medicamento asignado'>";
                        html += "<span class='fa fa-pencil-square-o'></span></a>";
                        if(registros[i]['estado_id'] == 1){
                            html += "<a class='btn btn-danger btn-xs' onclick='darde_baja("+registros[i]['medicacion_id']+")' title='Dar de baja el medicamento'><span class='fa fa-trash'></span></a>";
                        }else{
                            html += "<a class='btn btn-success btn-xs' onclick='darde_alta("+registros[i]['medicacion_id']+")' title='Dar de alta el medicamento'><span class='fa fa-check'></span></a>";
                        }
                        
                        
                        html += "</td>";
                        html += "</tr>";
                    }
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

/* carga modal para asignar medicamentos */
function cargarmodal_modificarmedicamento(la_medicacion)
{
    let modificar_insumo = document.getElementById("modificar_insumo").value;
    if(modificar_insumo == 1){
        document.getElementById('loadermodificarmedicamento').style.display = 'none';
        let los_medicamentos = JSON.parse(document.getElementById('los_medicamentos').value);
        let n = los_medicamentos.length;
        html2 = "<select name='medicamento_idmodif' id='medicamento_idmodif' class='form-control'>";
        for(var i = 0; i < n; i++) {
            selected = "";
            if(los_medicamentos[i]["medicamento_id"] == la_medicacion["medicamento_id"]){
                selected = "selected";
            }
            html2 += "<option value='"+los_medicamentos[i]["medicamento_id"]+"' "+selected+">"+los_medicamentos[i]["medicamento_nombre"]+"</option>";
        }
        html2 += "</select>";
        $("#medicamento_modificar").html(html2);

        $("#medicacion_cantidadmodif").val(la_medicacion["medicacion_cantidad"]);
        $("#medicacion_id").val(la_medicacion["medicacion_id"]);
        /*$('#modal_modificarmedicamento').on('shown.bs.modal', function (e) {
            $('#filtrar2').focus();
        });*/
    }else{
        alert("Usted no tiene permisos para modificar el Medicamento/Insumo.\n por favor consulte con su Administrador!.");
    }
}

function modificar_medicamento()
{
    let medicamento_id = document.getElementById("medicamento_idmodif").value;
    let medicacion_cantidad = document.getElementById("medicacion_cantidadmodif").value;
    let medicacion_id = document.getElementById("medicacion_id").value;

    if(medicacion_cantidad > 0){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'medicamento/modificar_medicamento';
        document.getElementById('loadermodificarmedicamento').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{medicamento_id:medicamento_id, medicacion_cantidad:medicacion_cantidad,
                    medicacion_id:medicacion_id
                },
                success:function(result){
                    res = JSON.parse(result);
                    document.getElementById('loadermodificarmedicamento').style.display = 'none';
                    alert("La modificacion del medicamento fue exitoso!.");
                    $('#boton_cerrarmodalmodif').click();
                    mostrar_tablas();
                },
        });
    }else{
        alert("La cantidad debe ser mayor a 0; por favor verifique sus datos!.");
    }
}

/* dar de baja el medicamente dede una sesion */
function darde_baja(medicacion_id)
{
    let dardebaja = document.getElementById("dardebaja").value;
    if(dardebaja == 1){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'medicamento/darde_baja';
        document.getElementById('loader').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{medicacion_id:medicacion_id
                },
                success:function(result){
                    res = JSON.parse(result);
                    document.getElementById('loader').style.display = 'none';
                    mostrar_tablas();
                },
        });
    }else{
        alert("Usted no tiene permisos para dar de baja el Medicamento/Insumo.\n por favor consulte con su Administrador!.");
    }
}

/* dar de baja el medicamente dede una sesion */
function darde_alta(medicacion_id)
{
    let dardealta = document.getElementById("dardealta").value;
    if(dardealta == 1){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'medicamento/darde_alta';
        document.getElementById('loader').style.display = 'block';
        $.ajax({url:controlador,
                type:"POST",
                data:{medicacion_id:medicacion_id
                },
                success:function(result){
                    res = JSON.parse(result);
                    document.getElementById('loader').style.display = 'none';
                    mostrar_tablas();
                },
        });
    }else{
        alert("Usted no tiene permisos para dar de alta el Medicamento/Insumo.\n por favor consulte con su Administrador!.");
    }
}
