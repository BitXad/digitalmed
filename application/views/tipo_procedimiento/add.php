<div class="row">
    <div class="col-md-12">
            <?php echo form_open('tipo_procedimiento/add'); ?>
             <div class="col-md-6">
               <label for="tipoproced_id" class="control-label"> <span class="text-danger"></span>ID</label>
                <div class="form-group">
                  <input type="text" name="tipoproced_id" value="<?php echo $this->input->post('tipoproced_id'); ?>" class="form-control " id="tipoproced_id" />
                   <span class="text-danger"><?php echo form_error('tipoproced_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="paciente_id" class="control-label"> <span class="text-danger"></span>PACIENTE</label>
                <div class="form-group">
                  <input type="text" name="paciente_id" value="<?php echo $this->input->post('paciente_id'); ?>" class="form-control " id="paciente_id" />
                   <span class="text-danger"><?php echo form_error('paciente_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tipoproced_nombre" class="control-label"> <span class="text-danger"></span>NOMBRE</label>
                <div class="form-group">
                  <input type="text" name="tipoproced_nombre" value="<?php echo $this->input->post('tipoproced_nombre'); ?>" class="form-control " id="tipoproced_nombre" />
                   <span class="text-danger"><?php echo form_error('tipoproced_nombre');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tipoproced_descripcion" class="control-label"> <span class="text-danger"></span>DESCRIPCION</label>
                <div class="form-group">
                  <input type="text" name="tipoproced_descripcion" value="<?php echo $this->input->post('tipoproced_descripcion'); ?>" class="form-control " id="tipoproced_descripcion" />
                   <span class="text-danger"><?php echo form_error('tipoproced_descripcion');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for=" " class="control-label"> </label>
                <div class="form-group">
                   <button type="submit" class="btn btn-success">  
                   <i class="fa fa-check"></i> Save 
                        </button> 
               </div>
             </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
