<div class="row">
    <div class="col-md-12">
            <?php echo form_open('medicacion/add'); ?>
             <div class="col-md-6">
               <label for="medicacion_id" class="control-label"> <span class="text-danger"></span>MEDICACION</label>
                <div class="form-group">
                  <input type="text" name="medicacion_id" value="<?php echo $this->input->post('medicacion_id'); ?>" class="form-control " id="medicacion_id" />
                   <span class="text-danger"><?php echo form_error('medicacion_id');?></span>
               </div>
             </div>
           <div class="col-md-6">
            <label for="sesion_id" class="control-label"> <span class="text-danger"></span>  SESION</label>
            <div class="form-group">
              <select name="sesion_id" class="form-control">
                <option value="">select sesion_id</option>
                <?php 

                $sesion_id_values = array(
                             );

                foreach($sesion_id_values as   $value => $display_text)
                {
                    $selected = ($value == $this->input->post('sesion_id')) ? ' selected="selected"' : "";
echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                } 
                ?>
              </select>
               <span class="text-danger"><?php echo form_error('sesion_id');?></span>
            </div>
          </div>
             <div class="col-md-6">
               <label for="medicamento_id" class="control-label"> <span class="text-danger"></span>MEDICAMENTO</label>
                <div class="form-group">
                  <input type="text" name="medicamento_id" value="<?php echo $this->input->post('medicamento_id'); ?>" class="form-control " id="medicamento_id" />
                   <span class="text-danger"><?php echo form_error('medicamento_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="medicacion_cantidad" class="control-label"> <span class="text-danger"></span>CANTIDAD</label>
                <div class="form-group">
                  <input type="text" name="medicacion_cantidad" value="<?php echo $this->input->post('medicacion_cantidad'); ?>" class="form-control " id="medicacion_cantidad" />
                   <span class="text-danger"><?php echo form_error('medicacion_cantidad');?></span>
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
