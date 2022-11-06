<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Documentacion Edit</h3>
            <?php echo form_open('documentacion/edit/'.$documentacion['documentacion_id']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="documentacion_id" class="control-label">  <span class="text-danger"></span>ID</label>
                <div class="form-group">
                  <input type="text" name="documentacion_id" value="<?php echo ($this->input->post('documentacion_id') ? $this->input->post('documentacion_id') : $documentacion['documentacion_id']); ?>" class="form-control" id="documentacion_id" />
                    <span class="text-danger"><?php echo form_error('documentacion_id');?></span>
               </div>
             </div> 
             <div class="col-md-6">
            <label for="documentacion_id" class="control-label">  <span class="text-danger"></span>  PACIENTE</label>
            <div class="form-group">
              <select name="paciente_id" class="form-control">
                <option value="">select paciente_id</option>
                <?php  
                    $paciente_id_values = array(
                        );
                foreach($paciente_id_values as   $value => $display_text)
                {
                            $selected = ($value == $documentacion['paciente_id'] ) ? ' selected="selected"' : "";
          echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                } 
                ?>
              </select>
               <span class="text-danger"><?php echo form_error('paciente_id');?></span>
            </div>
          </div> 
                     <div class="col-md-6">
               <label for="documentacion_descripcion" class="control-label">  <span class="text-danger"></span>DESCRIPCION</label>
                <div class="form-group">
                  <input type="text" name="documentacion_descripcion" value="<?php echo ($this->input->post('documentacion_descripcion') ? $this->input->post('documentacion_descripcion') : $documentacion['documentacion_descripcion']); ?>" class="form-control" id="documentacion_descripcion" />
                    <span class="text-danger"><?php echo form_error('documentacion_descripcion');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="documentacion_foto1" class="control-label">  <span class="text-danger"></span>IMAGEN1</label>
                <div class="form-group">
                  <input type="text" name="documentacion_foto1" value="<?php echo ($this->input->post('documentacion_foto1') ? $this->input->post('documentacion_foto1') : $documentacion['documentacion_foto1']); ?>" class="form-control" id="documentacion_foto1" />
                    <span class="text-danger"><?php echo form_error('documentacion_foto1');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="documentacion_foto2" class="control-label">  <span class="text-danger"></span>IMAGEN2</label>
                <div class="form-group">
                  <input type="text" name="documentacion_foto2" value="<?php echo ($this->input->post('documentacion_foto2') ? $this->input->post('documentacion_foto2') : $documentacion['documentacion_foto2']); ?>" class="form-control" id="documentacion_foto2" />
                    <span class="text-danger"><?php echo form_error('documentacion_foto2');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="documentacion_foto3" class="control-label">  <span class="text-danger"></span>IMAGEN3</label>
                <div class="form-group">
                  <input type="text" name="documentacion_foto3" value="<?php echo ($this->input->post('documentacion_foto3') ? $this->input->post('documentacion_foto3') : $documentacion['documentacion_foto3']); ?>" class="form-control" id="documentacion_foto3" />
                    <span class="text-danger"><?php echo form_error('documentacion_foto3');?></span>
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
</div>
