<script type="text/javascript">
    function cambiarcodproducto(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = estetime.getDay();
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#medicamento_codigo').val(anio+mes+dia+hora+min+seg);
    }
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Añadir Medicamento</h3>
                <h3 class="box-title" style="padding-right: 170px;">Añadir Producto</h3>
                <button type="button" class="btn btn-success btn-xs" onclick="cambiarcodproducto();" title="genera codigo">
                    <i class="fa fa-edit"></i> Generar Codigo
                </button>
            </div>
            <?php echo form_open('medicamento/add'); ?>
            <div class="box-body">
                <div class="col-md-6">
                    <label for="medicamento_nombre" class="control-label"> <span class="text-danger">*</span>NOMBRE</label>
                    <div class="form-group">
                        <input type="text" name="medicamento_nombre" value="<?php echo $this->input->post('medicamento_nombre'); ?>" class="form-control " id="medicamento_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus="true" autocomplete="off" />
                        <span class="text-danger"><?php echo form_error('medicamento_nombre'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="medicamento_codigo" class="control-label"> <span class="text-danger"></span>CODIGO</label>
                    <div class="form-group">
                        <input type="text" name="medicamento_codigo" value="<?php echo $this->input->post('medicamento_codigo'); ?>" class="form-control " id="medicamento_codigo" />
                        <span class="text-danger"><?php echo form_error('medicamento_codigo'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="medicamento_forma" class="control-label">FORMA</label>
                    <div class="form-group">
                        <select name="medicamento_forma" class="form-control" id="medicamento_forma">
                            <?php
                            foreach ($all_forma as $forma) {
                                echo '<option value="' . $forma['forma_nombre'] . '">' . $forma['forma_nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="medicamento_concentracion" class="control-label"> <span class="text-danger"></span>CONCENTRACION</label>
                    <div class="form-group">
                        <input type="text" name="medicamento_concentracion" value="<?php echo $this->input->post('medicamento_concentracion'); ?>" class="form-control " id="medicamento_concentracion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        <span class="text-danger"><?php echo form_error('medicamento_concentracion'); ?></span>
                    </div>
                </div>
                <!--<div class="col-md-6">
                    <label for="medicamento_cantidad" class="control-label"> <span class="text-danger"></span>Medicamento cantidad</label>
                    <div class="form-group">
                        <input type="text" name="medicamento_cantidad" value="<?php /* echo $this->input->post('medicamento_cantidad'); ?>" class="form-control " id="medicamento_cantidad" />
                              <span class="text-danger"><?php echo form_error('medicamento_cantidad'); */ ?></span>
                    </div>
                </div>-->
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
