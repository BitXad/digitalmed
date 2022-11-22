<script src="<?php echo base_url('resources/js/medicamentos_usados.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="sesion_id" id="sesion_id" value="<?php echo $sesion["sesion_id"]; ?>" />

<!-- ---------------- ESTILO DE LAS TABLAS --------------- -->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-- ---------------------------------------------------- -->

<div class="box-header text-center">
    <span class="box-title"><b>MEDICAMENTOS USADOS</b></span>
    <div class="box-tools">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_asignarmedicamento" onclick="cargarmodal_asignarmedicamento()">
            <span class="fa fa-pencil-square-o"></span> Medicamentos / Insumos </a>
    </div>
</div>
<div class="box-header">
    <span class="box-title"><b>Paciente: </b><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"] ?></span>
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
                        <th>FECHA SESION</th>
                        <th>ERITROPOYETINA</th>
                        <th>HIERRO E.V.</th>
                        <th>COMPEJO B</th>
                        <th>COSTO SESION</th>
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

<!------------------------ INICIO modal para Generar nuevas sesiones ------------------->
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
                        <tbody class="buscar" id="tabla_asignarmedicamentos"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Generar nuevas sesiones ------------------->
<div>
    <a href="<?php echo base_url("tratamiento/tratamientos/".$paciente["registro_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Tratamientos
    </a>
</div>
