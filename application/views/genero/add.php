<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Genero Add</h3>
            </div>
            <?php echo form_open('genero/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="genero_nombre" class="control-label">Genero Nombre</label>
						<div class="form-group">
							<textarea name="genero_nombre" class="form-control" id="genero_nombre"><?php echo $this->input->post('genero_nombre'); ?></textarea>
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