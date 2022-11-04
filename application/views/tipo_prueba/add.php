<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><b>Registrar: </b>Tipo de Prueba</h3>
            </div>
            <?php echo form_open('tipo_prueba/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoprueba_descripcion" class="control-label">Descripción</label>
						<div class="form-group">
							<input type="text" name="tipoprueba_descripcion" value="<?php echo $this->input->post('tipoprueba_descripcion'); ?>" class="form-control" id="tipoprueba_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipoprueba_precio" class="control-label">Precio Bs</label>
						<div class="form-group">
							<input type="text" name="tipoprueba_precio" value="<?php echo $this->input->post('tipoprueba_precio'); ?>" class="form-control" id="tipoprueba_precio" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-floppy-o"></i> Guardar
            	</button>
                    <a href="<?php echo base_url("tipo_prueba"); ?>"  class="btn btn-danger">
            		<i class="fa fa-remove"></i> Cancelar
                    </a>
                    
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>