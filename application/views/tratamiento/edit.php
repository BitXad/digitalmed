<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tratamiento Edit</h3>
            <?php echo form_open('tratamiento/edit/'.$tratamiento['tratamiento_id']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="tratamiento_id" class="control-label">  <span class="text-danger"></span>TRATAMIENTO ID</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_id" value="<?php echo ($this->input->post('tratamiento_id') ? $this->input->post('tratamiento_id') : $tratamiento['tratamiento_id']); ?>" class="form-control" id="tratamiento_id" />
                    <span class="text-danger"><?php echo form_error('tratamiento_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="registro_id" class="control-label">  <span class="text-danger"></span>REGISTRO</label>
                <div class="form-group">
                  <input type="text" name="registro_id" value="<?php echo ($this->input->post('registro_id') ? $this->input->post('registro_id') : $tratamiento['registro_id']); ?>" class="form-control" id="registro_id" />
                    <span class="text-danger"><?php echo form_error('registro_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="tratamiento_mes" class="control-label">  <span class="text-danger"></span>MES</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_mes" value="<?php echo ($this->input->post('tratamiento_mes') ? $this->input->post('tratamiento_mes') : $tratamiento['tratamiento_mes']); ?>" class="form-control" id="tratamiento_mes" />
                    <span class="text-danger"><?php echo form_error('tratamiento_mes');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="tratamiento_gestion" class="control-label">  <span class="text-danger"></span>GESTION</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_gestion" value="<?php echo ($this->input->post('tratamiento_gestion') ? $this->input->post('tratamiento_gestion') : $tratamiento['tratamiento_gestion']); ?>" class="form-control" id="tratamiento_gestion" />
                    <span class="text-danger"><?php echo form_error('tratamiento_gestion');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="tratamiento_fecha" class="control-label">  <span class="text-danger"></span>FECHA</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_fecha" value="<?php echo ($this->input->post('tratamiento_fecha') ? $this->input->post('tratamiento_fecha') : $tratamiento['tratamiento_fecha']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="tratamiento_fecha" />
                   <span class="text-danger"><?php echo form_error('tratamiento_fecha');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="tratamiento_hora" class="control-label">  <span class="text-danger"></span>Tratamiento hora</label>
                <div class="form-group">
                  <input type="text" name="tratamiento_hora" value="<?php echo ($this->input->post('tratamiento_hora') ? $this->input->post('tratamiento_hora') : $tratamiento['tratamiento_hora']); ?>" class="form-control" id="tratamiento_hora" />
                    <span class="text-danger"><?php echo form_error('tratamiento_hora');?></span>
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
