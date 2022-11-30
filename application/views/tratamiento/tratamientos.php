<script src="<?php echo base_url('resources/js/tratamiento.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="registro_id" id="registro_id" value="<?php echo $registro["registro_id"]; ?>" />
<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente["paciente_id"]; ?>" />
<input type="hidden" name="rinicio_hemodialisis" id="rinicio_hemodialisis" value="<?php echo $registro["registro_iniciohemodialisis"]; ?>" />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--------------------------------------------------------> 

<div class="box-header">
    <font size='3' face='Arial'><b>TRATAMIENTOS DEL PACIENTE</b></font>
    <div class="text-center">
        <font size='3' face='Arial'><b><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"]; ?></b></font>
    </div>
    <font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
    <div class="box-tools no-print">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_nuevotratamiento" onclick="cargarmodal_nuevotratamiento()">
            <span class="fa fa-pencil-square-o"></span> Nuevo Tratamiento </a>
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
                <div class="col-md-4 hidden">
                    <label for="tratamiento_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="tratamiento_fecha" class="form-control" id="tratamiento_fecha" />
                    </div>
                </div>
                <div class="col-md-4 hidden">
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

<!------------------------ INICIO modal para Registrar informe mensual de paciente ------------------->
<div class="modal fade" id="modal_nuevoinfmensual" tabindex="-1" role="dialog" aria-labelledby="modal_nuevoinfmensuallabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">REGISTRAR INFORME MENSUAL</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderinfmensual" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-12">
                    <label for="infmensual_cabecera" class="control-label">Cabecera</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_cabecera" id="infmensual_cabecera"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="infmensual_accesouno" class="control-label">Acceso uno</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_accesouno" id="infmensual_accesouno"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="infmensual_accesodos" class="control-label">Acceso dos</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_accesodos" id="infmensual_accesodos"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_laboratorio" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratorio" id="infmensual_laboratorio"></textarea>
                    </div>
                </div>
                <div class="col-md-9">
                    <label for="infmensual_conclusion" class="control-label">Conclusiones</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_conclusion" id="infmensual_conclusion"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="infmensual_fecha" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="infmensual_fecha" class="form-control" id="infmensual_fecha" />
                        <input type="hidden" name="tratamiento_id" class="form-control" id="tratamiento_id" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_infmensual()"><fa class="fa fa-floppy-o"></fa> Registrar Informe Mensual</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalinfmensual"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Registrar informe mensual de paciente ------------------->

<!------------------------ INICIO modal para Modificar informe mensual de paciente ------------------->
<div class="modal fade" id="modal_modificarinfmensual" tabindex="-1" role="dialog" aria-labelledby="modal_modificarinfmensuallabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR INFORME MENSUAL</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderinfmensualmodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-12">
                    <label for="infmensual_cabeceramodif" class="control-label">Cabecera</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_cabeceramodif" id="infmensual_cabeceramodif"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="infmensual_accesounomodif" class="control-label">Acceso uno</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_accesounomodif" id="infmensual_accesounomodif"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="infmensual_accesodosmodif" class="control-label">Acceso dos</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_accesodosmodif" id="infmensual_accesodosmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_laboratoriomodif" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratoriomodif" id="infmensual_laboratoriomodif"></textarea>
                    </div>
                </div>
                <div class="col-md-9">
                    <label for="infmensual_conclusionmodif" class="control-label">Conclusiones</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_conclusionmodif" id="infmensual_conclusionmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="infmensual_fechamodif" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="infmensual_fechamodif" class="form-control" id="infmensual_fechamodif" />
                        <input type="hidden" name="infmensual_id" class="form-control" id="infmensual_id" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_infmensual()"><fa class="fa fa-floppy-o"></fa> Modificar Informe Mensual</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalinfmensualmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Modificar informe mensual de paciente ------------------->

<!------------------------ INICIO modal para Registrar certificado medico de paciente ------------------->
<div class="modal fade" id="modal_nuevocertmedico" tabindex="-1" role="dialog" aria-labelledby="modal_nuevocertmedicolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">REGISTRAR CERTIFICADO MEDICO MENSUAL</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadercertmedico" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-6">
                    <label for="certmedico_nombre" class="control-label">Medico</label>
                    <div class="form-group">
                        <input type="text" name="certmedico_nombre" class="form-control" id="certmedico_nombre" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_codigo" class="control-label">Codigo</label>
                    <div class="form-group">
                        <input type="text" name="certmedico_codigo" class="form-control" id="certmedico_codigo" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabecerauno" class="control-label">Cabecera uno</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabecerauno" id="certmedico_cabecerauno"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabecerados" class="control-label">Cabecera dos</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabecerados" id="certmedico_cabecerados"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceratres" class="control-label">Cabecera tres</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceratres" id="certmedico_cabeceratres"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceracuatro" class="control-label">Cabecera cuatro</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceracuatro" id="certmedico_cabeceracuatro"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_medicacion" class="control-label">Medicación</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_medicacion" id="certmedico_medicacion"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="certmedico_fecha" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="certmedico_fecha" class="form-control" id="certmedico_fecha" />
                        <input type="hidden" name="tratamiento_idcertmedico" class="form-control" id="tratamiento_idcertmedico" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_certmedico()"><fa class="fa fa-floppy-o"></fa> Registrar Certificado Medico</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalcertmedico"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Registrar certificado medico de paciente ------------------->

<!------------------------ INICIO modal para Modificar certificado medico de paciente ------------------->
<div class="modal fade" id="modal_modificarcertmedico" tabindex="-1" role="dialog" aria-labelledby="modal_modificarcertmedicolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR CERTIFICADO MEDICO MENSUAL</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadercertmedicomodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-6">
                    <label for="certmedico_nombremodif" class="control-label">Medico</label>
                    <div class="form-group">
                        <input type="text" name="certmedico_nombremodif" class="form-control" id="certmedico_nombremodif" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_codigomodif" class="control-label">Codigo</label>
                    <div class="form-group">
                        <input type="text" name="certmedico_codigomodif" class="form-control" id="certmedico_codigomodif" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceraunomodif" class="control-label">Cabecera uno</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceraunomodif" id="certmedico_cabeceraunomodif"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceradosmodif" class="control-label">Cabecera dos</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceradosmodif" id="certmedico_cabeceradosmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceratresmodif" class="control-label">Cabecera tres</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceratresmodif" id="certmedico_cabeceratresmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceracuatromodif" class="control-label">Cabecera cuatro</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceracuatromodif" id="certmedico_cabeceracuatromodif"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_medicacionmodif" class="control-label">Medicación</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_medicacionmodif" id="certmedico_medicacionmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="certmedico_fechamodif" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="certmedico_fechamodif" class="form-control" id="certmedico_fechamodif" />
                        <input type="hidden" name="certmedico_id" class="form-control" id="certmedico_id" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_certmedico()"><fa class="fa fa-floppy-o"></fa> Modificar Certificado Medico</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalcertmediconodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Modificar certificado medico de paciente ------------------->
<div>
    <a href="<?php echo base_url("registro/registros/".$paciente["paciente_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Registros
    </a>
</div>