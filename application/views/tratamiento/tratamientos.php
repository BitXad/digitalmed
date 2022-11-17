<script src="<?php echo base_url('resources/js/tratamiento.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="registro_id" id="registro_id" value="<?php echo $registro["registro_id"]; ?>" />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--------------------------------------------------------> 

<div class="box-header">
    <font size='4' face='Arial'><b>TRATAMIENTOS DEL PACIENTE</b></font><br>
    <font size='3' face='Arial'><b><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"]; ?></b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
    <div class="box-tools no-print">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_nuevotratamiento" onclick="cargarmodal_nuevotratamiento()">
            <span class="fa fa-pencil-square-o"></span> Nuevo Registro </a>
    </div>
</div>
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
                            <th>MES</th>
                            <th>GESTION</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultados"></tbody>
                    <!--<tbody>-->
                    <?php
                    /*$i=1;
                    foreach($tratamiento as $t){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_mes']; ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_gestion']; ?></td>
                            <td class="text-center"><?php echo date("d/m/Y", strtotime($t['tratamiento_fecha'])); ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_hora']; ?></td>
                            <td><a href="<?php echo site_url('tratamiento/edit/'.$t['tratamiento_id']); ?>" class="btn btn-info btn-xs" title="Modificar registro"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo site_url('sesion/sesiones/'.$t['tratamiento_id']); ?>" class="btn btn-success btn-xs" title="Sesiones"><span class="fa fa-list "></span></a> 
                                <a href="<?php echo site_url('reportes/reportesesiones/'.$t['tratamiento_id']); ?>" class="btn btn-facebook btn-xs" title="Reporte de Sesiones"><span class="fa fa-file-text"></span></a>
                            </td>
                        </tr>
                    <?php
                    }*/
                    ?>
                    <!--</tbody>-->
                </table>
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para registrar tratamiento de paciente ------------------->
<div class="modal fade" id="modal_nuevotratamiento" tabindex="-1" role="dialog" aria-labelledby="modal_nuevotratamientolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">NUEVO TRATAMIENTO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadertratamiento" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_mes" class="control-label">Mes</label>
                    <div class="form-group">
                        <span id="elmes"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_gestion" class="control-label">Gestión</label>
                    <div class="form-group">
                        <span id="lagestion"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="tratamiento_fecha" class="form-control" id="tratamiento_fecha" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_hora" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" name="tratamiento_hora" value="0" class="form-control" id="tratamiento_hora"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_tratamiento()"><fa class="fa fa-floppy-o"></fa> Registrar Tratamiento</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para registrar tratamiento de paciente ------------------->

<!------------------------ INICIO modal para Modificar tratamiento de paciente ------------------->
<div class="modal fade" id="modal_modificartratamiento" tabindex="-1" role="dialog" aria-labelledby="modal_modificartratamientolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR TRATAMIENTO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadertratamientomodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_mesmodif" class="control-label">Mes</label>
                    <div class="form-group">
                        <span id="elmesmodif"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_gestionmodif" class="control-label">Gestión</label>
                    <div class="form-group">
                        <span id="lagestionmodif"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_fechamodif" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="tratamiento_fechamodif" class="form-control" id="tratamiento_fechamodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_horamodif" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" name="tratamiento_horamodif" value="0" class="form-control" id="tratamiento_horamodif"/>
                        <input type="hidden" name="tratamiento_idmodif" class="form-control" id="tratamiento_idmodif" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_tratamiento()"><fa class="fa fa-floppy-o"></fa> Guardar Tratamiento Modificado</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Modificar tratamiento de paciente ------------------->

<div>
    <a href="<?php echo base_url("registro/registros/".$paciente["paciente_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Registros
    </a>
</div>