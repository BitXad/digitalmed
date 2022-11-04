<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Extencion Add</h3>
            </div>
            <?php echo form_open('extencion/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="extencion_descripcion" class="control-label">Extencion Descripcion</label>
						<div class="form-group">
							<textarea name="extencion_descripcion" class="form-control" id="extencion_descripcion"><?php echo $this->input->post('extencion_descripcion'); ?></textarea>
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