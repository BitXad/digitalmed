<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Prueba Edit</h3>
            </div>
			<?php echo form_open('tipo_prueba/edit/'.$tipo_prueba['tipoprueba_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoprueba_descripcion" class="control-label">Tipoprueba Descripcion</label>
						<div class="form-group">
							<input type="text" name="tipoprueba_descripcion" value="<?php echo ($this->input->post('tipoprueba_descripcion') ? $this->input->post('tipoprueba_descripcion') : $tipo_prueba['tipoprueba_descripcion']); ?>" class="form-control" id="tipoprueba_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipoprueba_precio" class="control-label">Tipoprueba Precio</label>
						<div class="form-group">
							<input type="text" name="tipoprueba_precio" value="<?php echo ($this->input->post('tipoprueba_precio') ? $this->input->post('tipoprueba_precio') : $tipo_prueba['tipoprueba_precio']); ?>" class="form-control" id="tipoprueba_precio" />
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