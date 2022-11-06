<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Medicamento cantidad View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="medicamento_id" class="control-label">  <span class="text-danger"></span>MEDICAMENTO ID</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_id" value="<?php echo ($this->input->post('medicamento_id') ? $this->input->post('medicamento_id') : $medicamento['medicamento_id']); ?>" class="form-control" id="medicamento_id" />
                    <span class="text-danger"><?php echo form_error('medicamento_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="medicamento_codigo" class="control-label">  <span class="text-danger"></span>CODIGO</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_codigo" value="<?php echo ($this->input->post('medicamento_codigo') ? $this->input->post('medicamento_codigo') : $medicamento['medicamento_codigo']); ?>" class="form-control" id="medicamento_codigo" />
                    <span class="text-danger"><?php echo form_error('medicamento_codigo');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="medicamento_nombre" class="control-label">  <span class="text-danger"></span>NOMBRE</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_nombre" value="<?php echo ($this->input->post('medicamento_nombre') ? $this->input->post('medicamento_nombre') : $medicamento['medicamento_nombre']); ?>" class="form-control" id="medicamento_nombre" />
                    <span class="text-danger"><?php echo form_error('medicamento_nombre');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="medicamento_forma" class="control-label">  <span class="text-danger"></span>FORMA</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_forma" value="<?php echo ($this->input->post('medicamento_forma') ? $this->input->post('medicamento_forma') : $medicamento['medicamento_forma']); ?>" class="form-control" id="medicamento_forma" />
                    <span class="text-danger"><?php echo form_error('medicamento_forma');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="medicamento_concentracion" class="control-label">  <span class="text-danger"></span>CONCENTRACION</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_concentracion" value="<?php echo ($this->input->post('medicamento_concentracion') ? $this->input->post('medicamento_concentracion') : $medicamento['medicamento_concentracion']); ?>" class="form-control" id="medicamento_concentracion" />
                    <span class="text-danger"><?php echo form_error('medicamento_concentracion');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="medicamento_cantidad" class="control-label">  <span class="text-danger"></span>Medicamento cantidad</label>
                <div class="form-group">
                  <input disabled type="text" name="medicamento_cantidad" value="<?php echo ($this->input->post('medicamento_cantidad') ? $this->input->post('medicamento_cantidad') : $medicamento['medicamento_cantidad']); ?>" class="form-control" id="medicamento_cantidad" />
                    <span class="text-danger"><?php echo form_error('medicamento_cantidad');?></span>
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
