<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Subir documento</h3>
                <br><br><span><b>Paciente: </b><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"]; ?></span>
            </div>
            <?php echo form_open_multipart('documentacion/add/'.$paciente["paciente_id"]); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-5">
                            <label for="documentacion_descripcion" class="control-label"><span class="text-danger">*</span>Descripción</label>
                            <div class="form-group">
                                <input type="text" name="documentacion_descripcion" value="<?php echo $this->input->post('documentacion_descripcion'); ?>" class="form-control" id="documentacion_descripcion" required />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="documentacion_foto" class="control-label"><span class="text-danger">*</span>Documento</label>
                            <div class="form-group">
                                <input type="file" name="documentacion_foto" value="<?php echo $this->input->post('documentacion_foto'); ?>" class="form-control" id="documentacion_foto" required />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('documentacion/losdocumentos/'.$paciente["paciente_id"]); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>