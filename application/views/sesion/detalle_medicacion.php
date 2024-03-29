<script src="<?php echo base_url('resources/js/medicamentos_usados.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar2').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar2 tr').hide();
                $('.buscar2 tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="sesion_id" id="sesion_id" value="<?php echo $sesion["sesion_id"]; ?>" />
<input type="hidden" name="los_medicamentos" id="los_medicamentos" value='<?php echo json_encode($medicamentos); ?>' />
<input type="hidden" name="asignar_insumo" id="asignar_insumo" value='<?php echo $rol[33-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modificar_insumo" id="modificar_insumo" value='<?php echo $rol[34-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="dardebaja" id="dardebaja" value='<?php echo $rol[35-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="dardealta" id="dardealta" value='<?php echo $rol[36-1]['rolusuario_asignado']; ?>' />
<!-- ---------------- ESTILO DE LAS TABLAS --------------- -->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-- ---------------------------------------------------- -->

<div class="box-header text-center">
    <span class="box-title"><b>MEDICAMENTOS USADOS</b></span>
    <div class="box-tools">
        <?php
        $data_target = "";
        if($rol[33-1]['rolusuario_asignado'] == 1){
            $data_target = 'data-target="#modal_asignarmedicamento"';
        }
        ?>
        <a class="btn btn-success btn-sm" data-toggle="modal" <?php echo $data_target; ?> onclick="cargarmodal_asignarmedicamento()">
            <span class="fa fa-pencil-square-o"></span> Medicamentos / Insumos </a>
    </div>
</div>
<div class="box-header">
    <span class="box-title"><b>Paciente: </b><?php echo $paciente["paciente_apellido"]." ".$paciente["paciente_nombre"] ?></span>
    <br>
    <span style="font-size:15px"><b>Gestión: </b><?php echo $tratamiento["tratamiento_gestion"] ?></span>&nbsp;&nbsp;
    <span style="font-size:15px"><b>Mes: </b><?php echo $tratamiento["tratamiento_mes"] ?></span>&nbsp;&nbsp;
    <span style="font-size:15px"><b>Sesion N°: </b><?php echo $sesion["sesion_numero"] ?></span>&nbsp;&nbsp;
    <span style="font-size:15px"><b>Fecha: </b><?php echo date("d/m/Y", strtotime($sesion['sesion_fecha'])); ?></span>
    <br>
    
</div>
<?php echo $this->session->flashdata('alert_msg');?>
<div class="col-md-12 text-center" id="loader" style="display:none;">
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="mitabla" class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>MEDICAMENTO</th>
                        <th>CODIGO</th>
                        <th>FORMA</th>
                        <th>CONCENTRACION</th>
                        <th>CANTIDAD</th>
                        <th>ESTADO</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultados"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!------------------------ INICIO modal para registrar nuevos medicamentos ------------------->
<div class="modal fade" id="modal_asignarmedicamento" tabindex="-1" role="dialog" aria-labelledby="modal_asignarmedicamentolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">ASIGNAR MEDICAMENTOS E INSUMOS</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderasignarmedicamento" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-12">
                    <div class="input-group"> <span class="input-group-addon">Buscar</span>
                        <input id="filtrar2" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, forma, concentracion" onkeypress="buscar_medicamento(event)" >
                        <div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="buscarcliente()" title="Buscar por número de documento"><span class="fa fa-search" aria-hidden="true" id="span_buscar_cliente"></span></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table id="mitabla" class="table table-striped">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>MEDICAMENTO/INSUMO</th>
                            <th>FORMA/<br>CONCENTRACION</th>
                            <th>CANTIDAD</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="buscar2" id="tabla_asignarmedicamentos"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para registrar nuevos medicamentos ------------------->

<!------------------------ INICIO modal para modificar uun medicamento ------------------->
<div class="modal fade" id="modal_modificarmedicamento" tabindex="-1" role="dialog" aria-labelledby="modal_modificarmedicamentolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR MEDICAMENTO/INSUMO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadermodificarmedicamento" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-8">
                    <label for="medicamento_modificar" class="control-label">Medicamento</label>
                    <div class="form-group">
                        <span id="medicamento_modificar"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="medicacion_cantidadmodif" class="control-label">Cantidad</label>
                    <div class="form-group">
                        <input type="number" step="any" name="medicacion_cantidadmodif" class="form-control" id="medicacion_cantidadmodif" />
                        <input type="hidden" name="medicacion_id" class="form-control" id="medicacion_id" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_medicamento()"><fa class="fa fa-floppy-o"></fa> Guardar Medicamento Modificado</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para modificar uun medicamento ------------------->
<div>
    <a href="<?php echo base_url("sesion/sesiones/".$tratamiento["tratamiento_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Sesiones
    </a>
</div>
