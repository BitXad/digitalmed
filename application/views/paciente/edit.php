            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Datos</h3>
            </div>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
			<?php echo form_open('paciente/edit/1/'.$paciente['paciente_id']); ?>
			<div class="box-body">
				<div class="row clearfix">

                                        <div class="col-md-6">
						<label for="paciente_nombre" class="control-label">Paciente</label>
						<div class="form-group">
							<input type="text" name="paciente_nombre" value="<?php echo ($this->input->post('paciente_nombre') ? $this->input->post('paciente_nombre') : $paciente['paciente_nombre']); ?>" class="form-control" id="paciente_nombre" />
						</div>
					</div>
                                    
					<div class="col-md-2">
						<label for="paciente_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input type="text" name="paciente_ci" value="<?php echo ($this->input->post('paciente_ci') ? $this->input->post('paciente_ci') : $paciente['paciente_ci']); ?>" class="form-control" id="paciente_ci" />
						</div>
					</div>
                                    
					<div class="col-md-2">
						<label for="paciente_codigo" class="control-label">Tipo Doc.</label>
						<div class="form-group">
							<input type="text" name="paciente_codigo" value="<?php echo ($this->input->post('paciente_codigo') ? $this->input->post('paciente_codigo') : $paciente['paciente_codigo']); ?>" class="form-control" id="paciente_codigo" />
						</div>
					</div>
                                    
					<div class="col-md-2">
						<label for="extencion_id" class="control-label">Extensión</label>
						<div class="form-group">
							<select name="extencion_id" class="form-control">
								<option value="">- EXTENSIÓN -</option>
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
                                    
                                    
					<div class="col-md-2">
						<label for="paciente_edad" class="control-label">Edad</label>
						<div class="form-group">
							<input type="text" name="paciente_edad" value="<?php echo ($this->input->post('paciente_edad') ? $this->input->post('paciente_edad') : $paciente['paciente_edad']); ?>" class="form-control" id="paciente_edad" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="genero_id" class="control-label">Género</label>
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
                                    
					<div class="col-md-6">
						<label for="paciente_direccion" class="control-label">Dirección</label>
						<div class="form-group">
							<input type="text" name="paciente_direccion" value="<?php echo ($this->input->post('paciente_direccion') ? $this->input->post('paciente_direccion') : $paciente['paciente_direccion']); ?>" class="form-control" id="paciente_direccion" />
						</div>
					</div>

                                    
					<div class="col-md-6">
						<label for="paciente_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="paciente_celular" value="<?php echo ($this->input->post('paciente_celular') ? $this->input->post('paciente_celular') : $paciente['paciente_celular']); ?>" class="form-control" id="paciente_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_telefono" class="control-label">Teléfono</label>
						<div class="form-group">
							<input type="text" name="paciente_telefono" value="<?php echo ($this->input->post('paciente_telefono') ? $this->input->post('paciente_telefono') : $paciente['paciente_telefono']); ?>" class="form-control" id="paciente_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_nit" class="control-label">N.I.T.</label>
						<div class="form-group">
							<input type="text" name="paciente_nit" value="<?php echo ($this->input->post('paciente_nit') ? $this->input->post('paciente_nit') : $paciente['paciente_nit']); ?>" class="form-control" id="paciente_nit" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_razon" class="control-label">Razón</label>
						<div class="form-group">
							<input type="text" name="paciente_razon" value="<?php echo ($this->input->post('paciente_razon') ? $this->input->post('paciente_razon') : $paciente['paciente_razon']); ?>" class="form-control" id="paciente_razon" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="text" name="paciente_foto" value="<?php echo ($this->input->post('paciente_foto') ? $this->input->post('paciente_foto') : $paciente['paciente_foto']); ?>" class="form-control" id="paciente_foto" />
						</div>
					</div>
                                    
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
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
			</div>
			<div class="box-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-floppy-o"></i> Guardar
				</button>
                            
                            <a  href="<?php 
                                        if ($origen==1) echo base_url("prueba"); 
                                        if ($origen==2) echo base_url("paciente"); 
                            ?>" type="submit" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Cancelar
				</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>