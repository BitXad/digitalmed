<div class="row">
    <div class="col-md-12">
            <?php echo form_open('tratamiento/add'); ?>
             <div class="col-md-6">
               <label for="tratamiento_id" class="control-label"> <span class="text-danger"></span>TRATAMIENTO ID</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_id" value="<?php echo $this->input->post('tratamiento_id'); ?>" class="form-control " id="tratamiento_id" />
                   <span class="text-danger"><?php echo form_error('tratamiento_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="registro_id" class="control-label"> <span class="text-danger"></span>REGISTRO</label>
                <div class="form-group">
                  <input type="text" name="registro_id" value="<?php echo $this->input->post('registro_id'); ?>" class="form-control " id="registro_id" />
                   <span class="text-danger"><?php echo form_error('registro_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tratamiento_mes" class="control-label"> <span class="text-danger"></span>MES</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_mes" value="<?php echo $this->input->post('tratamiento_mes'); ?>" class="form-control " id="tratamiento_mes" />
                   <span class="text-danger"><?php echo form_error('tratamiento_mes');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tratamiento_gestion" class="control-label"> <span class="text-danger"></span>GESTION</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_gestion" value="<?php echo $this->input->post('tratamiento_gestion'); ?>" class="form-control " id="tratamiento_gestion" />
                   <span class="text-danger"><?php echo form_error('tratamiento_gestion');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tratamiento_fecha" class="control-label"> <span class="text-danger"></span>FECHA</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_fecha" value="<?php echo $this->input->post('tratamiento_fecha'); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="tratamiento_fecha" />
                   <span class="text-danger"><?php echo form_error('tratamiento_fecha');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="tratamiento_hora" class="control-label"> <span class="text-danger"></span>Tratamiento hora</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_hora" value="<?php echo $this->input->post('tratamiento_hora'); ?>" class="form-control " id="tratamiento_hora" />
                   <span class="text-danger"><?php echo form_error('tratamiento_hora');?></span>
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
