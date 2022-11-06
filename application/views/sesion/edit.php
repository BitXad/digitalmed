<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registro Edit</h3>
            <?php echo form_open('registro/edit/'.$registro['registro_id']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="registro_id" class="control-label">  <span class="text-danger"></span>REGISTRO ID</label>
                <div class="form-group">
                  <input type="text" name="registro_id" value="<?php echo ($this->input->post('registro_id') ? $this->input->post('registro_id') : $registro['registro_id']); ?>" class="form-control" id="registro_id" />
                    <span class="text-danger"><?php echo form_error('registro_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="usuario_id" class="control-label">  <span class="text-danger"></span>USUARIO</label>
                <div class="form-group">
                  <input type="text" name="usuario_id" value="<?php echo ($this->input->post('usuario_id') ? $this->input->post('usuario_id') : $registro['usuario_id']); ?>" class="form-control" id="usuario_id" />
                    <span class="text-danger"><?php echo form_error('usuario_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="paciente_id" class="control-label">  <span class="text-danger"></span>PACIENTE</label>
                <div class="form-group">
                  <input type="text" name="paciente_id" value="<?php echo ($this->input->post('paciente_id') ? $this->input->post('paciente_id') : $registro['paciente_id']); ?>" class="form-control" id="paciente_id" />
                    <span class="text-danger"><?php echo form_error('paciente_id');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="registro_fecha" class="control-label">  <span class="text-danger"></span>FECHA</label>
                <div class="form-group">
                  <input type="text" name="registro_fecha" value="<?php echo ($this->input->post('registro_fecha') ? $this->input->post('registro_fecha') : $registro['registro_fecha']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="registro_fecha" />
                   <span class="text-danger"><?php echo form_error('registro_fecha');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="registro_hora" class="control-label">  <span class="text-danger"></span>HORA</label>
                <div class="form-group">
                  <input type="text" name="registro_hora" value="<?php echo ($this->input->post('registro_hora') ? $this->input->post('registro_hora') : $registro['registro_hora']); ?>" class="form-control" id="registro_hora" />
                    <span class="text-danger"><?php echo form_error('registro_hora');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="registro_mes" class="control-label">  <span class="text-danger"></span>MES</label>
                <div class="form-group">
                  <input type="text" name="registro_mes" value="<?php echo ($this->input->post('registro_mes') ? $this->input->post('registro_mes') : $registro['registro_mes']); ?>" class="form-control" id="registro_mes" />
                    <span class="text-danger"><?php echo form_error('registro_mes');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="registro_gestion" class="control-label">  <span class="text-danger"></span>GESTION</label>
                <div class="form-group">
                  <input type="text" name="registro_gestion" value="<?php echo ($this->input->post('registro_gestion') ? $this->input->post('registro_gestion') : $registro['registro_gestion']); ?>" class="form-control" id="registro_gestion" />
                    <span class="text-danger"><?php echo form_error('registro_gestion');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="registro_diagnostico" class="control-label">  <span class="text-danger"></span>DIAGNOSTICO</label>
                <div class="form-group">
                  <input type="text" name="registro_diagnostico" value="<?php echo ($this->input->post('registro_diagnostico') ? $this->input->post('registro_diagnostico') : $registro['registro_diagnostico']); ?>" class="form-control" id="registro_diagnostico" />
                    <span class="text-danger"><?php echo form_error('registro_diagnostico');?></span>
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
