<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <div class="text-center">
                <h3 class="text-center box-title">DETALLE DE PROCEDIMIENTO DE HEMODIALISIS</h3><br>
                </div>
                <h2 class="box-title"><?php echo $paciente["paciente_nombre"]; ?></h2>
                <?php echo form_open('sesion/modificar/'.$sesion['sesion_id']); ?>
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
                                    <input type="number" min="0" step="any" name="sesion_pesoseco" value="<?php echo ($this->input->post('sesion_pesoseco') ? $this->input->post('sesion_pesoseco') : $sesion['sesion_pesoseco']); ?>" class="form-control" id="sesion_pesoseco" />
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
                                    <input type="number" min="0" step="any" name="sesion_pesoegreso" value="<?php echo ($this->input->post('sesion_pesoegreso') ? $this->input->post('sesion_pesoegreso') : $sesion['sesion_pesoegreso']); ?>" class="form-control" id="sesion_pesoegreso" />
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
                                    <input type="text" name="sesion_tipofiltro" value="<?php echo ($this->input->post('sesion_tipofiltro') ? $this->input->post('sesion_tipofiltro') : $sesion['sesion_tipofiltro']); ?>" class="form-control" id="sesion_tipofiltro" />
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
                                <label for="sesion_tipofiltro" class="control-label">  <span class="text-danger"></span>TIPO DE FILTRO</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_tipofiltro" value="<?php echo ($this->input->post('sesion_tipofiltro') ? $this->input->post('sesion_tipofiltro') : $sesion['sesion_tipofiltro']); ?>" class="form-control" id="sesion_tipofiltro" />
                                    <span class="text-danger"><?php echo form_error('sesion_tipofiltro');?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="sesion_tipofiltro" class="control-label">  <span class="text-danger"></span>TIPO DE FILTRO</label>
                                <div class="form-group">
                                    <input type="text" name="sesion_tipofiltro" value="<?php echo ($this->input->post('sesion_tipofiltro') ? $this->input->post('sesion_tipofiltro') : $sesion['sesion_tipofiltro']); ?>" class="form-control" id="sesion_tipofiltro" />
                                    <span class="text-danger"><?php echo form_error('sesion_tipofiltro');?></span>
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
