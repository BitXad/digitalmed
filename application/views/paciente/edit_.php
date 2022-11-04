<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Paciente Edit</h3>
            </div>
			<?php echo form_open('paciente/edit/'.$paciente['paciente_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
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
					<div class="col-md-6">
						<label for="genero_id" class="control-label">Genero</label>
						<div class="form-group">
							<select name="genero_id" class="form-control">
								<option value="">select genero</option>
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
						<label for="extencion_id" class="control-label">Extencion</label>
						<div class="form-group">
							<select name="extencion_id" class="form-control">
								<option value="">select extencion</option>
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
					<div class="col-md-6">
						<label for="paciente_edad" class="control-label">Paciente</label>
						<div class="form-group">
							<select name="paciente_edad" class="form-control">
								<option value="">select paciente</option>
								<?php 
								foreach($all_paciente as $paciente)
								{
									$selected = ($paciente['paciente_id'] == $paciente['paciente_edad']) ? ' selected="selected"' : "";

									echo '<option value="'.$paciente['paciente_id'].'" '.$selected.'>'.$paciente['paciente_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_nombre" class="control-label">Paciente Nombre</label>
						<div class="form-group">
							<input type="text" name="paciente_nombre" value="<?php echo ($this->input->post('paciente_nombre') ? $this->input->post('paciente_nombre') : $paciente['paciente_nombre']); ?>" class="form-control" id="paciente_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_direccion" class="control-label">Paciente Direccion</label>
						<div class="form-group">
							<input type="text" name="paciente_direccion" value="<?php echo ($this->input->post('paciente_direccion') ? $this->input->post('paciente_direccion') : $paciente['paciente_direccion']); ?>" class="form-control" id="paciente_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_ci" class="control-label">Paciente Ci</label>
						<div class="form-group">
							<input type="text" name="paciente_ci" value="<?php echo ($this->input->post('paciente_ci') ? $this->input->post('paciente_ci') : $paciente['paciente_ci']); ?>" class="form-control" id="paciente_ci" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>