<script src="<?php echo base_url('resources/js/sesion.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="tratamiento_id" id="tratamiento_id" value="<?php echo $tratamiento_id; ?>" />

<!-- ---------------- ESTILO DE LAS TABLAS --------------- -->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-- ---------------------------------------------------- -->

<div class="box-header">
    <span class="box-title"><b>Paciente: </b><?php echo $paciente["paciente_nombre"] ?></span>
    <div class="box-tools" id="nuevas_sesiones" style="display: none;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_nuevasesion" onclick="cargarmodal_nuevasesion()">
            <span class="fa fa-pencil-square-o"></span> Nuevas Sesiones </a>
    </div>
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
<div class="modal fade" id="modal_nuevasesion" tabindex="-1" role="dialog" aria-labelledby="modalnuevasesionlabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">GENERAR SESIONES NUEVAS</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadernuevo" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="sesion_numero" class="control-label">Nº Sesiones</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_numero" value="0" class="form-control" id="sesion_numero" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_fechainicio" class="control-label">Fecha Inicio de Sesion</label>
                    <div class="form-group">
                        <input type="date" name="sesion_fechainicio" class="form-control" id="sesion_fechainicio" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_eritropoyetina" class="control-label">Eritropoyetina</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_eritropoyetina" class="form-control" id="sesion_eritropoyetina" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_hierroev" class="control-label">Hierro E.V.</label>
                    <div class="form-group">
                        <input type="input" name="sesion_hierroev" class="form-control" id="sesion_hierroev" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_complejobampolla" class="control-label">Complejo B</label>
                    <div class="form-group">
                        <input type="input" name="sesion_complejobampolla" class="form-control" id="sesion_complejobampolla" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_costosesion" class="control-label">Costo Sesión</label>
                    <div class="form-group">
                        <input type="number" min="0" step="any" name="sesion_costosesion" class="form-control" id="sesion_costosesion" onclick="this.select();" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-success" onclick="generar_sesiones()"><fa class="fa fa-floppy-o"></fa> Registrar Sesiones</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Generar nuevas sesiones ------------------->
