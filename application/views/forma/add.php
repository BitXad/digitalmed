<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Añadir Forma</h3>
            </div>
            <?php echo form_open('forma/add'); ?>
            <div class="box-body">
                <div class="col-md-6">
                    <label for="forma_nombre" class="control-label"> <span class="text-danger">*</span>NOMBRE</label>
                    <div class="form-group">
                        <input type="text" name="forma_nombre" value="<?php echo $this->input->post('forma_nombre'); ?>" class="form-control " id="forma_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus="true" autocomplete="off" />
                        <span class="text-danger"><?php echo form_error('forma_nombre'); ?></span>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('forma/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>	
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
