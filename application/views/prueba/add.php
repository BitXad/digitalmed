<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Prueba Add</h3>
            </div>
            <?php echo form_open('prueba/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Responsable</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">- USUARIO -</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipoprueba_id" class="control-label">Tipo Prueba</label>
						<div class="form-group">
							<select name="tipoprueba_id" class="form-control">
								<option value="">- TIPO DE PRUEBA -</option>
								<?php 
								foreach($all_tipo_prueba as $tipo_prueba)
								{
									$selected = ($tipo_prueba['tipoprueba_id'] == $this->input->post('tipoprueba_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_prueba['tipoprueba_id'].'" '.$selected.'>'.$tipo_prueba['tipoprueba_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="paciente_id" class="control-label">Paciente</label>
						<div class="form-group">
							<select name="paciente_id" class="form-control">
								<option value="">- PACIENTE -</option>
								<?php 
								foreach($all_paciente as $paciente)
								{
									$selected = ($paciente['paciente_id'] == $this->input->post('paciente_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$paciente['paciente_id'].'" '.$selected.'>'.$paciente['paciente_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_codigo" class="control-label">Prueba Codigo</label>
						<div class="form-group">
							<input type="text" name="prueba_codigo" value="<?php echo $this->input->post('prueba_codigo'); ?>" class="form-control" id="prueba_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_fechasolicitud" class="control-label">Prueba Fechasolicitud</label>
						<div class="form-group">
							<input type="text" name="prueba_fechasolicitud" value="<?php echo $this->input->post('prueba_fechasolicitud'); ?>" class="has-datetimepicker form-control" id="prueba_fechasolicitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_medicolab" class="control-label">Prueba Medicolab</label>
						<div class="form-group">
							<input type="text" name="prueba_medicolab" value="<?php echo $this->input->post('prueba_medicolab'); ?>" class="form-control" id="prueba_medicolab" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_fecharecepcion" class="control-label">Prueba Fecharecepcion</label>
						<div class="form-group">
							<input type="text" name="prueba_fecharecepcion" value="<?php echo $this->input->post('prueba_fecharecepcion'); ?>" class="has-datetimepicker form-control" id="prueba_fecharecepcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_procedencia" class="control-label">Prueba Procedencia</label>
						<div class="form-group">
							<input type="text" name="prueba_procedencia" value="<?php echo $this->input->post('prueba_procedencia'); ?>" class="form-control" id="prueba_procedencia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_fechainforme" class="control-label">Prueba Fechainforme</label>
						<div class="form-group">
							<input type="text" name="prueba_fechainforme" value="<?php echo $this->input->post('prueba_fechainforme'); ?>" class="has-datetimepicker form-control" id="prueba_fechainforme" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_precio" class="control-label"><span class="text-danger">*</span>Prueba Precio</label>
						<div class="form-group">
							<input type="text" name="prueba_precio" value="<?php echo $this->input->post('prueba_precio'); ?>" class="form-control" id="prueba_precio" />
							<span class="text-danger"><?php echo form_error('prueba_precio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_acuenta" class="control-label">Prueba Acuenta</label>
						<div class="form-group">
							<input type="text" name="prueba_acuenta" value="<?php echo $this->input->post('prueba_acuenta'); ?>" class="form-control" id="prueba_acuenta" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_fechacuenta" class="control-label">Prueba Fechacuenta</label>
						<div class="form-group">
							<input type="text" name="prueba_fechacuenta" value="<?php echo $this->input->post('prueba_fechacuenta'); ?>" class="has-datetimepicker form-control" id="prueba_fechacuenta" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_saldo" class="control-label">Prueba Saldo</label>
						<div class="form-group">
							<input type="text" name="prueba_saldo" value="<?php echo $this->input->post('prueba_saldo'); ?>" class="form-control" id="prueba_saldo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_fechasaldo" class="control-label">Prueba Fechasaldo</label>
						<div class="form-group">
							<input type="text" name="prueba_fechasaldo" value="<?php echo $this->input->post('prueba_fechasaldo'); ?>" class="has-datetimepicker form-control" id="prueba_fechasaldo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_nombreanalisis" class="control-label"><span class="text-danger">*</span>Prueba Nombreanalisis</label>
						<div class="form-group">
							<textarea name="prueba_nombreanalisis" class="form-control" id="prueba_nombreanalisis"><?php echo $this->input->post('prueba_nombreanalisis'); ?></textarea>
							<span class="text-danger"><?php echo form_error('prueba_nombreanalisis');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_descricpion" class="control-label">Prueba Descricpion</label>
						<div class="form-group">
							<textarea name="prueba_descricpion" class="form-control" id="prueba_descricpion"><?php echo $this->input->post('prueba_descricpion'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_resultados" class="control-label">Prueba Resultados</label>
						<div class="form-group">
							<textarea name="prueba_resultados" class="form-control" id="prueba_resultados"><?php echo $this->input->post('prueba_resultados'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_observacion" class="control-label">Prueba Observacion</label>
						<div class="form-group">
							<textarea name="prueba_observacion" class="form-control" id="prueba_observacion"><?php echo $this->input->post('prueba_observacion'); ?></textarea>
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