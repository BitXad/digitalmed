<script src="<?php echo base_url('resources/js/registro.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente_id; ?>" />
<input type="hidden" name="nuevo_registro" id="nuevo_registro" value='<?php echo $rol[14-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modificar_elregistro" id="modificar_elregistro" value='<?php echo $rol[15-1]['rolusuario_asignado']; ?>' />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--------------------------------------------------------> 

<div class="box-header">
    <font size='3' face='Arial'><b>REGISTROS DEL PACIENTE</b></font>
    <div class="text-center">
        <font size='3' face='Arial'><b><?php echo $paciente["paciente_apellido"]." ".$paciente["paciente_nombre"]; ?></b></font>
    </div>
        <font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
    <div class="box-tools no-print">
        <?php
        $data_target = "";
        if($rol[14-1]['rolusuario_asignado'] == 1){
            $data_target = 'data-target="#modal_nuevoregistro"';
        }
        ?>
        <a class="btn btn-success btn-sm" data-toggle="modal" <?php echo $data_target; ?> onclick="cargarmodal_nuevoregistro()">
            <span class="fa fa-pencil-square-o"></span> Nuevo Registro </a>
    </div>
</div>
<div class="box-header">
    <a href="<?php echo base_url("acceso_vascular/historial/".$paciente["paciente_id"]); ?>" class="btn btn-dropbox btn-sm" title="Historial de accesos" target="_blank">
        <span class="fa fa-list-ol"></span> Historial de Accesos
    </a>
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
                <div class="col-md-4 hidden">
                    <label for="registro_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="registro_fecha" class="form-control" id="registro_fecha" />
                    </div>
                </div>
                <div class="col-md-4 hidden">
                    <label for="registro_hora" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" step="any" name="registro_hora" value="0" class="form-control" id="registro_hora"/>
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
                <div class="col-md-4">
                    <label for="registro_iniciohemodialisis" class="control-label">Inicio de Hemodialisis para Certificado Medico</label>
                    <div class="form-group">
                        <input type="date" name="registro_iniciohemodialisis" class="form-control" id="registro_iniciohemodialisis" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_numaquina" class="control-label">Maquina N°</label>
                    <div class="form-group">
                        <input type="number" min="0" name="registro_numaquina" class="form-control" id="registro_numaquina"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_tipofiltro" class="control-label">Tipo de Filtro</label>
                    <div class="form-group">
                        <select class="form-control" name="registro_tipofiltro" id="registro_tipofiltro">
                            <option value="F8HPS">F8HPS</option>
                            <option value="FX100">FX100</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="avascular_nombre" class="control-label">Tipo de Acceso</label>
                    <div class="form-group">
                        <select class="form-control" name="avascular_nombre" id="avascular_nombre" onchange="detalle_acceso()">
                            <option value="0">-- Acceso Vascular --</option>
                            <option value="Cateter">Cateter</option>
                            <option value="Fistula">Fistula</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="avascular_detalle" class="control-label">Acceso Vascular</label>
                    <div class="form-group">
                        <span id="avasculardetalle"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_numerosesion" class="control-label">Numero Sesión</label>
                    <div class="form-group">
                        <input type="number" min="1" name="registro_numerosesion" class="form-control" id="registro_numerosesion" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_filtro" class="control-label">Reutilización Filtro</label>
                    <div class="form-group">
                        <input type="number" name="registro_filtro" class="form-control" id="registro_filtro" />
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
                    <button type="button" class="btn btn-success" onclick="registrar_registro()"><fa class="fa fa-floppy-o"></fa> Guardar Registro</button>
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
                <div class="col-md-4 hidden">
                    <label for="registro_fechamodif" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="registro_fechamodif" class="form-control" id="registro_fechamodif" />
                    </div>
                </div>
                <div class="col-md-4 hidden">
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
                <div class="col-md-4">
                    <label for="registro_iniciohemodialisismodif" class="control-label">Inicio de Hemodialisis para  Certificado Médico</label>
                    <div class="form-group">
                        <input type="date" name="registro_iniciohemodialisismodif" class="form-control" id="registro_iniciohemodialisismodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_numaquinamodif" class="control-label">Maquina N°</label>
                    <div class="form-group">
                        <input type="number" min="0" name="registro_numaquinamodif" class="form-control" id="registro_numaquinamodif"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_tipofiltromodif" class="control-label">Tipo de Filtro</label>
                    <div class="form-group">
                        <select class="form-control" name="registro_tipofiltromodif" id="registro_tipofiltromodif">
                            <option value="F8HPS">F8HPS</option>
                            <option value="FX100">FX100</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_numerosesionmodif" class="control-label">Numero Sesión</label>
                    <div class="form-group">
                        <input type="number" min="1" name="registro_numerosesionmodif" class="form-control" id="registro_numerosesionmodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="registro_filtromodif" class="control-label">Reutilización Filtro</label>
                    <div class="form-group">
                        <input type="number" name="registro_filtromodif" class="form-control" id="registro_filtromodif" />
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