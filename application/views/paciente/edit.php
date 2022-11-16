            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Datos</h3>
            </div>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <?php echo form_open_multipart('paciente/edit/'.$paciente['paciente_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="paciente_nombre" class="control-label"><span class="text-danger">*</span>Nombre (s)</label>
                            <div class="form-group">
                                <input type="text" name="paciente_nombre" value="<?php echo ($this->input->post('paciente_nombre') ? $this->input->post('paciente_nombre') : $paciente['paciente_nombre']); ?>" class="form-control" id="paciente_nombre" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_apellido" class="control-label"><span class="text-danger">*</span>Apellido (s)</label>
                            <div class="form-group">
                                <input type="text" name="paciente_apellido" value="<?php echo ($this->input->post('paciente_apellido') ? $this->input->post('paciente_apellido') : $paciente['paciente_apellido']); ?>" class="form-control" id="paciente_apellido" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_ci" class="control-label">Cedula Identidad</label>
                            <div class="form-group">
                                <input type="text" name="paciente_ci" value="<?php echo ($this->input->post('paciente_ci') ? $this->input->post('paciente_ci') : $paciente['paciente_ci']); ?>" class="form-control" id="paciente_ci" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="extencion_id" class="control-label">Extencion</label>
                            <div class="form-group">
                                <select name="extencion_id" class="form-control">
                                    <option value="">- EXTENSION -</option>
                                    <?php 
                                    foreach($all_extencion as $extencion)
                                    {
                                        $selected = ($extencion['extencion_id'] == $paciente['extencion_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$extencion['extencion_id'].'" '.$selected.'>'.$extencion['extencion_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="paciente_fechanac" class="control-label">Fecha de Nacimiento</label>
                            <div class="form-group">
                                <input type="date" name="paciente_fechanac" value="<?php echo ($this->input->post('paciente_fechanac') ? $this->input->post('paciente_fechanac') : $paciente['paciente_fechanac']); ?>" class="form-control" id="paciente_fechanac" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_codigo" class="control-label">Código</label>
                            <div class="form-group">
                                <input type="text" name="paciente_codigo" value="<?php echo ($this->input->post('paciente_codigo') ? $this->input->post('paciente_codigo') : $paciente['paciente_codigo']); ?>" class="form-control" id="paciente_codigo" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="genero_id" class="control-label">Genero</label>
                            <div class="form-group">
                                <select name="genero_id" class="form-control">
                                    <option value="">- GENERO -</option>
                                    <?php 
                                    foreach($all_genero as $genero)
                                    {
                                        $selected = ($genero['genero_id'] == $paciente['genero_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_direccion" class="control-label">Dirección</label>
                            <div class="form-group">
                                <input type="text" name="paciente_direccion" value="<?php echo ($this->input->post('paciente_direccion') ? $this->input->post('paciente_direccion') : $paciente['paciente_direccion']); ?>" class="form-control" id="paciente_direccion" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                <input type="text" name="paciente_celular" value="<?php echo ($this->input->post('paciente_celular') ? $this->input->post('paciente_celular') : $paciente['paciente_celular']); ?>" class="form-control" id="paciente_celular" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="paciente_telefono" value="<?php echo ($this->input->post('paciente_telefono') ? $this->input->post('paciente_telefono') : $paciente['paciente_telefono']); ?>" class="form-control" id="paciente_telefono" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="user_imagen" class="control-label">Imagen</label>
                            <div class="form-group">
                                <input type="file" name="paciente_foto"  id="paciente_foto" class="form-control input"  value="<?php echo $this->input->post('paciente_foto'); ?>"  onchange="cargar_imagen()">
                                <input type="hidden" name="paciente_foto1" value="<?php echo ($this->input->post('paciente_foto') ? $this->input->post('paciente_foto') : $paciente['paciente_foto']); ?>" class="form-control" id="paciente_foto1" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_nombrefirmante" class="control-label">Nombre Completo Firmante</label>
                            <div class="form-group">
                                <input type="text" name="paciente_nombrefirmante" value="<?php echo ($this->input->post('paciente_nombrefirmante') ? $this->input->post('paciente_nombrefirmante') : $paciente['paciente_nombrefirmante']); ?>" class="form-control" id="paciente_nombrefirmante" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_cifirmante" class="control-label">C.I. Firmante</label>
                            <div class="form-group">
                                <input type="text" name="paciente_cifirmante" value="<?php echo ($this->input->post('paciente_cifirmante') ? $this->input->post('paciente_cifirmante') : $paciente['paciente_cifirmante']); ?>" class="form-control" id="paciente_cifirmante" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <option value="">- ESTADO -</option>
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $paciente['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-floppy-o"></i> Guardar
                        </button>
                        <a href="<?php echo base_url("paciente"); ?>" type="submit" class="btn btn-danger">
                            <i class="fa fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>