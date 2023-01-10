<script src="<?php echo base_url('resources/js/tratamiento.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('ckeditor/adapters/jquery.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="registro_id" id="registro_id" value="<?php echo $registro["registro_id"]; ?>" />
<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente["paciente_id"]; ?>" />
<input type="hidden" name="tipousuario_id" id="tipousuario_id" value="<?php echo $tipousuario_id; ?>" />
<!--<input type="hidden" name="paciente_fechanac" id="paciente_fechanac" value="<?php //echo $paciente["paciente_fechanac"]; ?>" />-->
<!--<input type="hidden" name="elfirmante_nombre" id="elfirmante_nombre" value="<?php /*echo $paciente["paciente_nombrefirmante"]; ?>" />
<input type="hidden" name="elfirmante_ci" id="elfirmante_ci" value="<?php echo $paciente["paciente_cifirmante"];*/ ?>" />-->
<input type="hidden" name="rinicio_hemodialisis" id="rinicio_hemodialisis" value="<?php echo $registro["registro_iniciohemodialisis"]; ?>" />
<input type="hidden" name="nuevo_tratamiento" id="nuevo_tratamiento" value='<?php echo $rol[20-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modificar_eltratamiento" id="modificar_eltratamiento" value='<?php echo $rol[21-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="eliminar_eltratamiento" id="eliminar_eltratamiento" value='<?php echo $rol[22-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="reg_infmensual" id="reg_infmensual" value='<?php echo $rol[38-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modif_infmensual" id="modif_infmensual" value='<?php echo $rol[39-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="reg_certmedico" id="reg_certmedico" value='<?php echo $rol[41-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modif_certmedico" id="modif_certmedico" value='<?php echo $rol[42-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="reg_angli" id="reg_angli" value='<?php echo $rol[44-1]['rolusuario_asignado']; ?>' />
<input type="hidden" name="modif_angli" id="modif_angli" value='<?php echo $rol[45-1]['rolusuario_asignado']; ?>' />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<script type="text/javascript">
    CKEDITOR.config.toolbar = [
        ['Bold','Italic','Underline','StrikeThrough','Subscript','Superscript','-','Undo','Redo','-','Outdent','Indent'],
        ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Styles','Format','FontSize'],
        ['Table']
    ];
    CKEDITOR.config.height = 150; 
</script>
<div class="box-header">
    <font size='3' face='Arial'><b>TRATAMIENTOS DEL PACIENTE</b></font>
    <div class="text-center">
        <font size='3' face='Arial'><b><?php echo $paciente["paciente_apellido"]." ".$paciente["paciente_nombre"]; ?></b></font>
    </div>
    <font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
    <div class="box-tools no-print">
        <?php
        $data_target = "";
        if($rol[20-1]['rolusuario_asignado'] == 1){
            $data_target = 'data-target="#modal_nuevotratamiento"';
        }
        ?>
        <a class="btn btn-success btn-sm" data-toggle="modal" <?php echo $data_target; ?> onclick="cargarmodal_nuevotratamiento()">
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
                            <th>ESTADO</th>
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
                <b style="color: white;">REGISTRAR INFORME CLINICO MENSUAL</b>
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
                <!--<div class="col-md-12">
                    <label for="infmensual_laboratorio" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratorio" id="infmensual_laboratorio"></textarea>
                    </div>
                </div>-->
                <div class="col-md-12">
                    <label for="infmensual_laboratorio" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratorio" id="infmensual_laboratorio"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_laboratorio" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_paratohormona" class="control-label">Paratohormona</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_paratohormona" id="infmensual_paratohormona"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_paratohormona" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_glucemia" class="control-label">Glucemia</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_glucemia" id="infmensual_glucemia"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_glucemia" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_firmante" class="control-label">Firmante</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_firmante" id="infmensual_firmante"></textarea>
                    </div>
                </div>
                <div class="col-md-9">
                    <label for="infmensual_conclusion" class="control-label">Conclusiones</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_conclusion" id="infmensual_conclusion"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_conclusion" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
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
                <b style="color: white;">MODIFICAR INFORME CLINICO MENSUAL</b>
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
                <!--<div class="col-md-12">
                    <label for="infmensual_laboratoriomodif" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratoriomodif" id="infmensual_laboratoriomodif"></textarea>
                    </div>
                </div>-->
                <div class="col-md-12">
                    <label for="infmensual_laboratoriomodif" class="control-label">Laboratorio</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_laboratoriomodif" id="infmensual_laboratoriomodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_laboratoriomodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_paratohormonamodif" class="control-label">Paratohormona</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_paratohormonamodif" id="infmensual_paratohormonamodif" rows="5"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_paratohormonamodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_glucemiamodif" class="control-label">Glucemia</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_glucemiamodif" id="infmensual_glucemiamodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_glucemiamodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="infmensual_firmantemodif" class="control-label">Firmante</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_firmantemodif" id="infmensual_firmantemodif"></textarea>
                    </div>
                </div>
                <div class="col-md-9">
                    <label for="infmensual_conclusionmodif" class="control-label">Conclusiones</label>
                    <div class="form-group">
                        <textarea class="form-control" name="infmensual_conclusionmodif" id="infmensual_conclusionmodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "infmensual_conclusionmodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
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
                <div class="col-md-12">
                    <label for="certmedico_cabeceracuatro" class="control-label">Cabecera cuatro</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceracuatro" id="certmedico_cabeceracuatro"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "certmedico_cabeceracuatro" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_diagnostico" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_diagnostico" id="certmedico_diagnostico"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "certmedico_diagnostico" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
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
                        <textarea class="form-control" name="certmedico_cabeceraunomodif" id="certmedico_cabeceraunomodif" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceradosmodif" class="control-label">Cabecera dos</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceradosmodif" id="certmedico_cabeceradosmodif" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="certmedico_cabeceratresmodif" class="control-label">Cabecera tres</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceratresmodif" id="certmedico_cabeceratresmodif"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_cabeceracuatromodif" class="control-label">Cabecera cuatro</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_cabeceracuatromodif" id="certmedico_cabeceracuatromodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "certmedico_cabeceracuatromodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_diagnosticomodif" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_diagnosticomodif" id="certmedico_diagnosticomodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "certmedico_diagnosticomodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="certmedico_medicacionmodif" class="control-label">Medicación</label>
                    <div class="form-group">
                        <textarea class="form-control" name="certmedico_medicacionmodif" id="certmedico_medicacionmodif" rows="4"></textarea>
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
<!------------------------ INICIO modal para Registrar informe mensual de Anemia/Glicemia ------------------->
<div class="modal fade" id="modal_nueva_anemiaglicemia" tabindex="-1" role="dialog" aria-labelledby="modal_nueva_anemiaglicemialabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">REGISTRAR INFORME DE ANEMIA GLICEMIA</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderanemiaglicemia" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_titulo" class="control-label">Título</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_titulo"  class="form-control " id="anemiaglic_titulo" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_enfermedad" class="control-label">Enfermedad</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_enfermedad" id="anemiaglic_enfermedad"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_enfermedad" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_diagnostico" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_diagnostico" id="anemiaglic_diagnostico"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_diagnostico" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="anemiaglic_hemoglobina" class="control-label">Hemoglobina</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_hemoglobina"  class="form-control " id="anemiaglic_hemoglobina" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="anemiaglic_hematocrito" class="control-label">Hematrocito</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_hematocrito"  class="form-control " id="anemiaglic_hematocrito" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_administra" class="control-label">Admininstra</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_administra" id="anemiaglic_administra"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_administra" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="anemiaglic_fecha" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="anemiaglic_fecha" class="form-control" id="anemiaglic_fecha" />
                        <input type="hidden" name="tratamiento_idag" class="form-control" id="tratamiento_idag" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_infanemiaglicemia()"><fa class="fa fa-floppy-o"></fa> Registrar Informe Mensual Anemia</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalag"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Registrar informe mensual de Anemia/Glicemia ------------------->

<!------------------------ INICIO modal para Modificar informe mensual de Anemia/Glicemia ------------------->
<div class="modal fade" id="modal_modificaranemiaglicemia" tabindex="-1" role="dialog" aria-labelledby="modal_modificaranemiaglicemialabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR INFORME DE ANEMIA GLICEMIA</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderanemiaglicemiamodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_titulomodif" class="control-label">Título</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_titulomodif"  class="form-control " id="anemiaglic_titulomodif" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_enfermedadmodif" class="control-label">Enfermedad</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_enfermedadmodif" id="anemiaglic_enfermedadmodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_enfermedadmodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_diagnosticomodif" class="control-label">Diagnostico</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_diagnosticomodif" id="anemiaglic_diagnosticomodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_diagnosticomodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="anemiaglic_hemoglobinamodif" class="control-label">Hemoglobina</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_hemoglobinamodif"  class="form-control " id="anemiaglic_hemoglobinamodif" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="anemiaglic_hematocritomodif" class="control-label">Hematrocito</label>
                    <div class="form-group">
                        <input type="text" name="anemiaglic_hematocritomodif"  class="form-control " id="anemiaglic_hematocritomodif" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="anemiaglic_administramodif" class="control-label">Administra</label>
                    <div class="form-group">
                        <textarea class="form-control" name="anemiaglic_administramodif" id="anemiaglic_administramodif"></textarea>
                        <?php
                        $ck_config = array(
                            "replace" => "anemiaglic_administramodif" // id del objeto a reemplazar
                            , "options" => array( // las opciones (opcionales)
                                "skin" => "'v2'"
                            )
                        );
                        jquery_ckeditor($ck_config);
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="anemiaglic_fechamodif" class="control-label">Fecha de Informe</label>
                    <div class="form-group">
                        <input type="date" name="anemiaglic_fechamodif" class="form-control" id="anemiaglic_fechamodif" />
                        <input type="hidden" name="anemiaglic_id" class="form-control" id="anemiaglic_id" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="modificar_infanemiaglicemia()"><fa class="fa fa-floppy-o"></fa> Modificar Informe Mensual</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalagmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Modificar informe mensual de Anemia/Glicemia ------------------->

<div>
    <?php
    if($tipousuario_id  == 1){
    ?>
    <a href="<?php echo base_url("registro/registros/".$paciente["paciente_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Registros
    </a>
    <?php
    }else{
    ?>
    <a href="<?php echo base_url("paciente"); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Registros
    </a>
    <?php
    }
    ?>
</div>