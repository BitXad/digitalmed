<script src="<?php echo base_url('resources/js/sesion_procedimiento.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="tratamiento_id" id="tratamiento_id" value="<?php echo $sesion['tratamiento_id']; ?>" />
<input type="hidden" name="sesion_id" id="sesion_id" value="<?php echo $sesion['sesion_id']; ?>" />

<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <div class="text-center">
                <h3 class="text-center box-title text-bold">DETALLE DE PROCEDIMIENTO DE HEMODIALISIS</h3><br>
                </div>
                <h2 class="box-title">PACIENTE: <?php echo $paciente["paciente_nombre"]; ?></h2>
                <?php echo form_open('sesion/detalle_procedimiento/'.$sesion['sesion_id']); ?>
                <div class="col-md-12 text-center" id="loader" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                    <div class="box-body">
                        <div class="row clearfix">
                            <div class="col-md-2">
                                <label for="sesion_horaingreso" class="control-label">  <span class="text-danger"></span>HORA DE INGRESO</label>
                                <div class="form-group">
                                    <input type="time" step="any" name="sesion_horaingreso" value="<?php echo ($this->input->post('sesion_horaingreso') ? $this->input->post('sesion_horaingreso') : $sesion['sesion_horaingreso']); ?>" class="form-control" id="sesion_horaingreso" autofocus="true" />
                                    <span class="text-danger"><?php echo form_error('sesion_horaingreso');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_horasalida" class="control-label">  <span class="text-danger"></span>HORA DE SALIDA</label>
                                <div class="form-group">
                                    <input type="time" step="any" name="sesion_horasalida" value="<?php echo ($this->input->post('sesion_horasalida') ? $this->input->post('sesion_horasalida') : $sesion['sesion_horasalida']); ?>" class="form-control" id="sesion_horasalida" />
                                    <span class="text-danger"><?php echo form_error('sesion_horasalida');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_numerosesionhd" class="control-label">  <span class="text-danger"></span>N° Ses HD</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_numerosesionhd" value="<?php echo ($this->input->post('sesion_numerosesionhd') ? $this->input->post('sesion_numerosesionhd') : $sesion['sesion_numerosesionhd']); ?>" class="form-control" id="sesion_complejobampolla" />
                                    <span class="text-danger"><?php echo form_error('sesion_numerosesionhd');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_fecha" class="control-label">  <span class="text-danger"></span>FECHA</label>
                                <div class="form-group">
                                    <input type="date" name="sesion_fecha" value="<?php echo ($this->input->post('sesion_fecha') ? $this->input->post('sesion_fecha') : $sesion['sesion_fecha']); ?>" class="form-control" id="sesion_fecha" />
                                    <span class="text-danger"><?php echo form_error('sesion_fecha');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_paingreso" class="control-label">  <span class="text-danger"></span>P/A INGRESO</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_paingreso" value="<?php echo ($this->input->post('sesion_paingreso') ? $this->input->post('sesion_paingreso') : $sesion['sesion_paingreso']); ?>" class="form-control" id="sesion_paingreso" />
                                    <span class="text-danger"><?php echo form_error('sesion_paingreso');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_ingest" class="control-label">  <span class="text-danger"></span>INGEST</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_ingest" value="<?php echo ($this->input->post('sesion_ingest') ? $this->input->post('sesion_ingest') : $sesion['sesion_ingest']); ?>" class="form-control" id="sesion_ingest" readonly />
                                    <span class="text-danger"><?php echo form_error('sesion_ingest');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_pesoseco" class="control-label">  <span class="text-danger"></span>PESO SECO</label>
                                <div class="form-group">
                                    <input type="number" min="0" step="any" name="sesion_pesoseco" value="<?php echo ($this->input->post('sesion_pesoseco') ? $this->input->post('sesion_pesoseco') : $sesion['sesion_pesoseco']); ?>" class="form-control" id="sesion_pesoseco" onkeyup="calcular_ingest()" />
                                    <span class="text-danger"><?php echo form_error('sesion_pesoseco');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_pesoingreso" class="control-label">  <span class="text-danger"></span>PESO INGRESO</label>
                                <div class="form-group">
                                    <input type="number" min="0" step="any" name="sesion_pesoingreso" value="<?php echo ($this->input->post('sesion_pesoingreso') ? $this->input->post('sesion_pesoingreso') : $sesion['sesion_pesoingreso']); ?>" class="form-control" id="sesion_pesoingreso" />
                                    <span class="text-danger"><?php echo form_error('sesion_pesoingreso');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_pesoegreso" class="control-label">  <span class="text-danger"></span>PESO EGRESO</label>
                                <div class="form-group">
                                    <input type="number" min="0" step="any" name="sesion_pesoegreso" value="<?php echo ($this->input->post('sesion_pesoegreso') ? $this->input->post('sesion_pesoegreso') : $sesion['sesion_pesoegreso']); ?>" class="form-control" id="sesion_pesoegreso" onkeyup="calcular_ingest()" />
                                    <span class="text-danger"><?php echo form_error('sesion_pesoegreso');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_nummaquina" class="control-label">  <span class="text-danger"></span>MAQUINA N°</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_nummaquina" value="<?php echo ($this->input->post('sesion_nummaquina') ? $this->input->post('sesion_nummaquina') : $sesion['sesion_nummaquina']); ?>" class="form-control" id="sesion_nummaquina" />
                                    <span class="text-danger"><?php echo form_error('sesion_nummaquina');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_ultrafilsesion" class="control-label">  <span class="text-danger"></span>ULTRAFIL. SESION</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_ultrafilsesion" value="<?php echo ($this->input->post('sesion_ultrafilsesion') ? $this->input->post('sesion_ultrafilsesion') : $sesion['sesion_ultrafilsesion']); ?>" class="form-control" id="sesion_ultrafilsesion" />
                                    <span class="text-danger"><?php echo form_error('sesion_ultrafilsesion');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_ultrafilfinal" class="control-label">  <span class="text-danger"></span>ULTRAFILIACION FINAL</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_ultrafilfinal" value="<?php echo ($this->input->post('sesion_ultrafilfinal') ? $this->input->post('sesion_ultrafilfinal') : $sesion['sesion_ultrafilfinal']); ?>" class="form-control" id="sesion_ultrafilfinal" />
                                    <span class="text-danger"><?php echo form_error('sesion_ultrafilfinal');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_tipofiltro" class="control-label">  <span class="text-danger"></span>TIPO DE FILTRO</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_tipofiltro" value="<?php echo ($this->input->post('sesion_tipofiltro') ? $this->input->post('sesion_tipofiltro') : $sesion['sesion_tipofiltro']); ?>" class="form-control" id="sesion_tipofiltro" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                    <span class="text-danger"><?php echo form_error('sesion_tipofiltro');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_reutlizacionfiltro" class="control-label">  <span class="text-danger"></span>REUTILIZACION FILTRO</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_reutlizacionfiltro" value="<?php echo ($this->input->post('sesion_reutlizacionfiltro') ? $this->input->post('sesion_reutlizacionfiltro') : $sesion['sesion_reutlizacionfiltro']); ?>" class="form-control" id="sesion_reutlizacionfiltro" />
                                    <span class="text-danger"><?php echo form_error('sesion_reutlizacionfiltro');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_lineasav" class="control-label">  <span class="text-danger"></span>REUTILIZ. LINEAS A/V</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_lineasav" value="<?php echo ($this->input->post('sesion_lineasav') ? $this->input->post('sesion_lineasav') : $sesion['sesion_lineasav']); ?>" class="form-control" id="sesion_lineasav" />
                                    <span class="text-danger"><?php echo form_error('sesion_lineasav');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_devolucion" class="control-label">  <span class="text-danger"></span>DEVOL.</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_devolucion" value="<?php echo ($this->input->post('sesion_devolucion') ? $this->input->post('sesion_devolucion') : $sesion['sesion_devolucion']); ?>" class="form-control" id="sesion_devolucion" />
                                    <span class="text-danger"><?php echo form_error('sesion_devolucion');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_heparina" class="control-label">  <span class="text-danger"></span>HEPARINA</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_heparina" value="<?php echo ($this->input->post('sesion_heparina') ? $this->input->post('sesion_heparina') : $sesion['sesion_heparina']); ?>" class="form-control" id="sesion_heparina" />
                                    <span class="text-danger"><?php echo form_error('sesion_heparina');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_ktv" class="control-label">  <span class="text-danger"></span>K/TV</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_ktv" value="<?php echo ($this->input->post('sesion_ktv') ? $this->input->post('sesion_ktv') : $sesion['sesion_ktv']); ?>" class="form-control" id="sesion_ktv" />
                                    <span class="text-danger"><?php echo form_error('sesion_ktv');?></span>
                                </div>
                            </div>
                            <div class="col-md-6" style="font-size: 10px">
                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_horasesion" onclick="mostrar_modalhora()">
                                    <span class="fa fa-plus-circle"></span> Registrar Hora 
                                </a>
                                <div class="box-body table-responsive no-padding">
                                    <table id="mitabla" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Ho<br>ra</th>
                                            <th>PA</th>
                                            <th>FC</th>
                                            <th>TEMP.</th>
                                            <th>FLUJO DE<br>SANGRE</th>
                                            <th>PV</th>
                                            <th>PTM</th>
                                            <th>CONDUCTIVIDAD</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody class="buscar" id="tablaresultados"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sesion_evaluacionenfermeria" class="control-label">  <span class="text-danger"></span>EVALUACION DE ENFERMERIA</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="sesion_evaluacionenfermeria" id="sesion_evaluacionenfermeria" rows="5"><?php echo $sesion['sesion_evaluacionenfermeria']; ?></textarea>
                                    <span class="text-danger"><?php echo form_error('sesion_evaluacionenfermeria');?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sesion_cateter_fistula" class="control-label">  <span class="text-danger"></span>ACCESO VASCULAR</label>
                                <div class="input-group">
                                    <div class="input-group-addon" >CATETER: </div>
                                    <input type="text" name="sesion_cateter" value="<?php echo ($this->input->post('sesion_cateter') ? $this->input->post('sesion_cateter') : $sesion['sesion_cateter']); ?>" class="form-control" id="sesion_cateter" />
                                    <div class="input-group-addon" >FISTULA: </div>
                                    <input type="text" name="sesion_fistula" value="<?php echo ($this->input->post('sesion_fistula') ? $this->input->post('sesion_fistula') : $sesion['sesion_fistula']); ?>" class="form-control" id="sesion_fistula" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="sesion_evaluacionclinica" class="control-label">  <span class="text-danger"></span>EVALUACION CLINICA DURANTE LA SESION</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="sesion_evaluacionclinica" id="sesion_evaluacionclinica" rows="5"><?php echo $sesion['sesion_evaluacionclinica']; ?></textarea>
                                    <span class="text-danger"><?php echo form_error('sesion_evaluacionclinica');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Guardar
                        </button>
                        <a href="<?php echo site_url('sesion/sesiones/'.$sesion['tratamiento_id']); ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Cancelar</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para registrar hora de sesiones ------------------->
<div class="modal fade" id="modal_horasesion" tabindex="-1" role="dialog" aria-labelledby="modal_horasesionlabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">REGISTRAR HORA DE LA SESION</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderhora" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="detallehora_numero" class="control-label">Nº</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_numero" class="form-control" id="detallehora_numero" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_pa" class="control-label">PA</label>
                    <div class="form-group">
                        <input type="text" name="detallehora_pa" class="form-control" id="detallehora_pa" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_fc" class="control-label">FC</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_fc" class="form-control" id="detallehora_fc" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_temp" class="control-label">TEMP.</label>
                    <div class="form-group">
                        <input type="number" min="0" step="any" name="detallehora_temp" class="form-control" id="detallehora_temp" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_flujosangre" class="control-label">FLUJO DE SANGRE</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_flujosangre" class="form-control" id="detallehora_flujosangre"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_pv" class="control-label">PV</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_pv" class="form-control" id="detallehora_pv" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_ptm" class="control-label">PTM</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_ptm" class="form-control" id="detallehora_ptm" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_conductividad" class="control-label">CONDUCTIVIDAD</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_conductividad" class="form-control" id="detallehora_conductividad" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_hora()"><fa class="fa fa-floppy-o"></fa> Registrar hora</button>
                    <butto]n type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para registrar hora de sesiones ------------------->
<!------------------------ INICIO modal para modifcar hora de sesiones ------------------->
<div class="modal fade" id="modal_modificarhorasesion" tabindex="-1" role="dialog" aria-labelledby="modal_modificarhorasesionlabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">MODIFICAR HORA DE LA SESION</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderhoramodif" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="detallehora_numeromodif" class="control-label">Nº</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_numeromodif" class="form-control" id="detallehora_numeromodif" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_pamodif" class="control-label">PA</label>
                    <div class="form-group">
                        <input type="text" name="detallehora_pamodif" class="form-control" id="detallehora_pamodif" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_fcmodif" class="control-label">FC</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_fcmodif" class="form-control" id="detallehora_fcmodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_tempmodif" class="control-label">TEMP.</label>
                    <div class="form-group">
                        <input type="number" min="0" step="any" name="detallehora_tempmodif" class="form-control" id="detallehora_tempmodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_flujosangremodif" class="control-label">FLUJO DE SANGRE</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_flujosangremodif" class="form-control" id="detallehora_flujosangremodif"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_pvmodif" class="control-label">PV</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_pvmodif" class="form-control" id="detallehora_pvmodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_ptmmodif" class="control-label">PTM</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_ptmmodif" class="form-control" id="detallehora_ptmmodif" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="detallehora_conductividadmodif" class="control-label">CONDUCTIVIDAD</label>
                    <div class="form-group">
                        <input type="number" min="0" name="detallehora_conductividadmodif" class="form-control" id="detallehora_conductividadmodif" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <input type="hidden" name="detallehora_idmodif" class="form-control" id="detallehora_idmodif" />
                    <button type="button" class="btn btn-success" onclick="registrar_horamodificada()"><fa class="fa fa-floppy-o"></fa> Guardar modificación</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para modifcar hora de sesiones ------------------->