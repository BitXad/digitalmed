<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modificar Medicamento</h3>
                <?php echo form_open('medicamento/edit/'.$medicamento['medicamento_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="medicamento_nombre" class="control-label">  <span class="text-danger"></span>NOMBRE</label>
                            <div class="form-group">
                                <input type="text" name="medicamento_nombre" value="<?php echo ($this->input->post('medicamento_nombre') ? $this->input->post('medicamento_nombre') : $medicamento['medicamento_nombre']); ?>" class="form-control" id="medicamento_nombre" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('medicamento_nombre'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="medicamento_codigo" class="control-label">  <span class="text-danger"></span>CODIGO</label>
                            <div class="form-group">
                                <input type="text" name="medicamento_codigo" value="<?php echo ($this->input->post('medicamento_codigo') ? $this->input->post('medicamento_codigo') : $medicamento['medicamento_codigo']); ?>" class="form-control" id="medicamento_codigo" />
                                <span class="text-danger"><?php echo form_error('medicamento_codigo'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="medicamento_forma" class="control-label">FORMA</label>
                            <div class="form-group">
                                <select name="medicamento_forma" class="form-control" id="medicamento_forma">
                                    <?php
                                    foreach ($all_forma as $forma) {
                                        $selected = ($forma['forma_nombre'] == $medicamento['medicamento_forma']) ? ' selected="selected"' : "";
                                        echo '<option value="' . $forma['forma_nombre'].'" '.$selected.'>' . $forma['forma_nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="medicamento_concentracion" class="control-label">  <span class="text-danger"></span>CONCENTRACION</label>
                            <div class="form-group">
                                <input type="text" name="medicamento_concentracion" value="<?php echo ($this->input->post('medicamento_concentracion') ? $this->input->post('medicamento_concentracion') : $medicamento['medicamento_concentracion']); ?>" class="form-control" id="medicamento_concentracion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('medicamento_concentracion'); ?></span>
                            </div>
                        </div> 
                        <!--<div class="col-md-6">
                            <label for="medicamento_cantidad" class="control-label">  <span class="text-danger"></span>Medicamento cantidad</label>
                            <div class="form-group">
                                <input type="text" name="medicamento_cantidad" value="<?php /*echo ($this->input->post('medicamento_cantidad') ? $this->input->post('medicamento_cantidad') : $medicamento['medicamento_cantidad']); ?>" class="form-control" id="medicamento_cantidad" />
                                <span class="text-danger"><?php echo form_error('medicamento_cantidad');*/ ?></span>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('medicamento/index'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
