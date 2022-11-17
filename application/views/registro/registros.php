<script src="<?php echo base_url('resources/js/registro.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente_id; ?>" />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--------------------------------------------------------> 

<div class="box-header">
    <font size='3' face='Arial'><b>REGISTROS DEL PACIENTE</b></font><br>
    <font size='2' face='Arial'><b><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"]; ?></b></font>
    
    <br><font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
    <div class="box-tools no-print">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_nuevoregistro" onclick="cargarmodal_nuevoregistro()">
            <span class="fa fa-pencil-square-o"></span> Nuevo Registro </a>
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
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>MES</th>
                        <th>GESTION</th>
                        <th>DIAGNOSTICO</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultados"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!------------------------ INICIO modal para registrar registro de paciente ------------------->
<div class="modal fade" id="modal_nuevoregistro" tabindex="-1" role="dialog" aria-labelledby="modal_nuevoregistrolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">NUEVO REGISTRO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderregistro" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="registro_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="registro_fecha" class="form-control" id="registro_fecha" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_hora" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" name="registro_hora" value="0" class="form-control" id="registro_hora"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_mes" class="control-label">Mes</label>
                    <div class="form-group">
                        <span id="elmes"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_gestion" class="control-label">Gestión</label>
                    <div class="form-group">
                        <span id="lagestion"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="registro_diagnostico" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <input type="text" name="registro_diagnostico" class="form-control" id="registro_diagnostico" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_registro()"><fa class="fa fa-floppy-o"></fa> Registrar el Registro</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para registrar registro de paciente ------------------->
<!------------------------ INICIO modal para Modificar registro de paciente ------------------->
<div class="modal fade" id="modal_modificarregistro" tabindex="-1" role="dialog" aria-labelledby="modal_modificarregistrolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR REGISTRO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderregistromodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="registro_fechamodif" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="registro_fechamodif" class="form-control" id="registro_fechamodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_horamodif" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" name="registro_horamodif" value="0" class="form-control" id="registro_horamodif"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_mesmodif" class="control-label">Mes</label>
                    <div class="form-group">
                        <span id="elmesmodif"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_gestionmodif" class="control-label">Gestión</label>
                    <div class="form-group">
                        <span id="lagestionmodif"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="registro_diagnosticomodif" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <input type="text" name="registro_diagnosticomodif" class="form-control" id="registro_diagnosticomodif" />
                        <input type="hidden" name="registro_idmodif" class="form-control" id="registro_idmodif" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_registro()"><fa class="fa fa-floppy-o"></fa> Guardar el Registro Modificado</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Modificar registro de paciente ------------------->

<div>
    <a href="<?php echo base_url("paciente"); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Pacientes
    </a>
</div>