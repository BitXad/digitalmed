<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">DESCRIPCION View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="tipoproced_id" class="control-label">  <span class="text-danger"></span>ID</label>
                <div class="form-group">
                  <input disabled type="text" name="tipoproced_id" value="<?php echo ($this->input->post('tipoproced_id') ? $this->input->post('tipoproced_id') : $tipo_procedimiento['tipoproced_id']); ?>" class="form-control" id="tipoproced_id" />
                    <span class="text-danger"><?php echo form_error('tipoproced_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="paciente_id" class="control-label">  <span class="text-danger"></span>PACIENTE</label>
                <div class="form-group">
                  <input disabled type="text" name="paciente_id" value="<?php echo ($this->input->post('paciente_id') ? $this->input->post('paciente_id') : $tipo_procedimiento['paciente_id']); ?>" class="form-control" id="paciente_id" />
                    <span class="text-danger"><?php echo form_error('paciente_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="tipoproced_nombre" class="control-label">  <span class="text-danger"></span>NOMBRE</label>
                <div class="form-group">
                  <input disabled type="text" name="tipoproced_nombre" value="<?php echo ($this->input->post('tipoproced_nombre') ? $this->input->post('tipoproced_nombre') : $tipo_procedimiento['tipoproced_nombre']); ?>" class="form-control" id="tipoproced_nombre" />
                    <span class="text-danger"><?php echo form_error('tipoproced_nombre');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="tipoproced_descripcion" class="control-label">  <span class="text-danger"></span>DESCRIPCION</label>
                <div class="form-group">
                  <input disabled type="text" name="tipoproced_descripcion" value="<?php echo ($this->input->post('tipoproced_descripcion') ? $this->input->post('tipoproced_descripcion') : $tipo_procedimiento['tipoproced_descripcion']); ?>" class="form-control" id="tipoproced_descripcion" />
                    <span class="text-danger"><?php echo form_error('tipoproced_descripcion');?></span>
               </div>
             </div> 
                     </div>
      </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
</div>
