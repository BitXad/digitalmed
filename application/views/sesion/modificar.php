<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modificar Registro de <?php echo $paciente["paciente_nombre"]; ?></h3>
                <?php echo form_open('sesion/modificar/'.$sesion['sesion_id']); ?>
                    <div class="box-body">
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="sesion_eritropoyetina" class="control-label">  <span class="text-danger"></span>ERITROPOYETINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_eritropoyetina" value="<?php echo ($this->input->post('sesion_eritropoyetina') ? $this->input->post('sesion_eritropoyetina') : $sesion['sesion_eritropoyetina']); ?>" class="form-control" id="sesion_eritropoyetina" />
                                    <span class="text-danger"><?php echo form_error('sesion_eritropoyetina');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_hierroeve" class="control-label">  <span class="text-danger"></span>HIERRO E.V.</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_hierroeve" value="<?php echo ($this->input->post('sesion_hierroeve') ? $this->input->post('sesion_hierroeve') : $sesion['sesion_hierroeve']); ?>" class="form-control" id="sesion_hierroeve" />
                                    <span class="text-danger"><?php echo form_error('sesion_hierroeve');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_complejobampolla" class="control-label">  <span class="text-danger"></span>COMPLEJO B</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_complejobampolla" value="<?php echo ($this->input->post('sesion_complejobampolla') ? $this->input->post('sesion_complejobampolla') : $sesion['sesion_complejobampolla']); ?>" class="form-control" id="sesion_complejobampolla" />
                                    <span class="text-danger"><?php echo form_error('sesion_complejobampolla');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_costosesion" class="control-label">  <span class="text-danger"></span>COSTO SESION</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_costosesion" value="<?php echo ($this->input->post('sesion_costosesion') ? $this->input->post('sesion_costosesion') : $sesion['sesion_costosesion']); ?>" class="form-control" id="sesion_costosesion" />
                                    <span class="text-danger"><?php echo form_error('sesion_costosesion');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_omeprazol" class="control-label">  <span class="text-danger"></span>OMEPRAZOL</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_omeprazol" value="<?php echo ($this->input->post('sesion_omeprazol') ? $this->input->post('sesion_omeprazol') : $sesion['sesion_omeprazol']); ?>" class="form-control" id="sesion_omeprazol" />
                                    <span class="text-danger"><?php echo form_error('sesion_omeprazol');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_acidofolico" class="control-label">  <span class="text-danger"></span>ACIDO FOLICO</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_acidofolico" value="<?php echo ($this->input->post('sesion_acidofolico') ? $this->input->post('sesion_acidofolico') : $sesion['sesion_acidofolico']); ?>" class="form-control" id="sesion_acidofolico" />
                                    <span class="text-danger"><?php echo form_error('sesion_acidofolico');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_calcio" class="control-label">  <span class="text-danger"></span>CALCIO CARBONATO/CALCITROL</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_calcio" value="<?php echo ($this->input->post('sesion_calcio') ? $this->input->post('sesion_calcio') : $sesion['sesion_calcio']); ?>" class="form-control" id="sesion_calcio" />
                                    <span class="text-danger"><?php echo form_error('sesion_calcio');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_amlodipina" class="control-label">  <span class="text-danger"></span>AMLODIPINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_amlodipina" value="<?php echo ($this->input->post('sesion_amlodipina') ? $this->input->post('sesion_amlodipina') : $sesion['sesion_amlodipina']); ?>" class="form-control" id="sesion_amlodipina" />
                                    <span class="text-danger"><?php echo form_error('sesion_amlodipina');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_enalpril" class="control-label">  <span class="text-danger"></span>ENALAPRIL</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_enalpril" value="<?php echo ($this->input->post('sesion_enalpril') ? $this->input->post('sesion_enalpril') : $sesion['sesion_enalpril']); ?>" class="form-control" id="sesion_enalpril" />
                                    <span class="text-danger"><?php echo form_error('sesion_enalpril');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_losartan" class="control-label">  <span class="text-danger"></span>LOSARTAN</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_losartan" value="<?php echo ($this->input->post('sesion_losartan') ? $this->input->post('sesion_losartan') : $sesion['sesion_losartan']); ?>" class="form-control" id="sesion_losartan" />
                                    <span class="text-danger"><?php echo form_error('sesion_losartan');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_atorvastina" class="control-label">  <span class="text-danger"></span>ATORVASTATINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_atorvastina" value="<?php echo ($this->input->post('sesion_atorvastina') ? $this->input->post('sesion_atorvastina') : $sesion['sesion_atorvastina']); ?>" class="form-control" id="sesion_atorvastina" />
                                    <span class="text-danger"><?php echo form_error('sesion_atorvastina');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_asa" class="control-label">  <span class="text-danger"></span>ASA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_asa" value="<?php echo ($this->input->post('sesion_asa') ? $this->input->post('sesion_asa') : $sesion['sesion_asa']); ?>" class="form-control" id="sesion_asa" />
                                    <span class="text-danger"><?php echo form_error('sesion_asa');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sesion_complejob" class="control-label">  <span class="text-danger"></span>COMPLEJO B</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_complejob" value="<?php echo ($this->input->post('sesion_complejob') ? $this->input->post('sesion_complejob') : $sesion['sesion_complejob']); ?>" class="form-control" id="sesion_complejob" />
                                    <span class="text-danger"><?php echo form_error('sesion_complejob');?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="estado_id" class="control-label">Estado</label>
                                <div class="form-group">
                                    <select name="estado_id" class=" form-control" id="estado_id">
                                        <?php 
                                        foreach($all_estado as $estado)
                                        {
                                            $selected = ($estado['estado_id'] == $sesion['estado_id']) ? ' selected="selected"' : "";
                                            echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <!--<div class="col-md-6">
                                <label for="sesion_eritropoyetina" class="control-label">  <span class="text-danger"></span>ERITROPOYETINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_eritropoyetina" value="<?php echo ($this->input->post('sesion_eritropoyetina') ? $this->input->post('sesion_eritropoyetina') : $sesion['sesion_eritropoyetina']); ?>" class="form-control" id="sesion_eritropoyetina" />
                                    <span class="text-danger"><?php echo form_error('sesion_eritropoyetina');?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sesion_eritropoyetina" class="control-label">  <span class="text-danger"></span>ERITROPOYETINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_eritropoyetina" value="<?php echo ($this->input->post('sesion_eritropoyetina') ? $this->input->post('sesion_eritropoyetina') : $sesion['sesion_eritropoyetina']); ?>" class="form-control" id="sesion_eritropoyetina" />
                                    <span class="text-danger"><?php echo form_error('sesion_eritropoyetina');?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sesion_eritropoyetina" class="control-label">  <span class="text-danger"></span>ERITROPOYETINA</label>
                                <div class="form-group">
                                    <input type="number" min="0" name="sesion_eritropoyetina" value="<?php echo ($this->input->post('sesion_eritropoyetina') ? $this->input->post('sesion_eritropoyetina') : $sesion['sesion_eritropoyetina']); ?>" class="form-control" id="sesion_eritropoyetina" />
                                    <span class="text-danger"><?php echo form_error('sesion_eritropoyetina');?></span>
                                </div>
                            </div>-->
                            
                            
                          
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
