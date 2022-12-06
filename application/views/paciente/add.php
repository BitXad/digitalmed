<script src="<?php echo base_url('resources/js/paciente_nuevo.js'); ?>" type="text/javascript"></script>

<div class="row" style="font-family: Arial">
    <div class="col-md-12">
        <div class="box-header with-border">
            <h3 class="box-title" style="font-family: Arial"><b><fa class="fa fa-user-circle"></fa> REGISTRO DE PACIENTE</b></h3>
        </div>
      	<div class="box box-info">
            <?php echo form_open_multipart('paciente/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="paciente_nombre" class="control-label"><span class="text-danger">*</span>Nombre (s)</label>
                            <div class="form-group">
                                <input type="text" name="paciente_nombre" value="<?php echo $this->input->post('paciente_nombre'); ?>" class="form-control" id="paciente_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_apellido" class="control-label"><span class="text-danger">*</span>Apellido (s)</label>
                            <div class="form-group">
                                <input type="text" name="paciente_apellido" value="<?php echo $this->input->post('paciente_apellido'); ?>" class="form-control" id="paciente_apellido" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="paciente_ci" class="control-label">Cedula Identidad</label>
                            <div class="form-group">
                                <input type="text" name="paciente_ci" value="<?php echo $this->input->post('paciente_ci'); ?>" class="form-control" id="paciente_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="extencion_id" class="control-label">Extencion</label>
                            <div class="form-group">
                                <select name="extencion_id" class="form-control">
                                    <option value="">- EXTENSION -</option>
                                    <?php 
                                    foreach($all_extencion as $extencion)
                                    {
                                        $selected = ($extencion['extencion_id'] == $this->input->post('extencion_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$extencion['extencion_id'].'" '.$selected.'>'.$extencion['extencion_descripcion'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="paciente_fechanac" class="control-label">Fecha de Nacimiento</label>
                            <div class="form-group">
                                <input type="date" name="paciente_fechanac" value="<?php echo $this->input->post('paciente_fechanac'); ?>" class="form-control" id="paciente_fechanac" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_codigo" class="control-label">Código</label>
                            <div class="input-group">   
                                <input type="text" name="paciente_codigo" value="<?php echo $this->input->post('paciente_codigo'); ?>" class="form-control" id="paciente_codigo" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="generar_codigo()" title="Código de barras"><span class="fa fa-barcode" aria-hidden="true" id="span_buscar_cliente" onKeyUp="this.value = this.value.toUpperCase();"></span></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="genero_id" class="control-label">Genero</label>
                            <div class="form-group">
                                    <select name="genero_id" class="form-control">
                                            <option value="">- GENERO -</option>
                                            <?php 
                                            foreach($all_genero as $genero)
                                            {
                                                    $selected = ($genero['genero_id'] == $this->input->post('genero_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
                                            } 
                                            ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="paciente_direccion" class="control-label">Dirección</label>
                            <div class="form-group">
                                <input type="text" name="paciente_direccion" value="<?php echo $this->input->post('paciente_direccion'); ?>" class="form-control" id="paciente_direccion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="paciente_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                <input type="text" name="paciente_celular" value="<?php echo $this->input->post('paciente_celular'); ?>" class="form-control" id="paciente_celular" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="paciente_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="paciente_telefono" value="<?php echo $this->input->post('paciente_telefono'); ?>" class="form-control" id="paciente_telefono" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="user_imagen" class="control-label">Imagen</label>
                            <div class="form-group">
                                <input type="file" name="paciente_foto"  id="paciente_foto" class="form-control input"  value="<?php echo $this->input->post('paciente_foto'); ?>"  onchange="cargar_imagen()">
                                <small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty"></small>
                                <h4 id='loading' ></h4>
                                <div id="message"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="paciente_nombrefirmante" class="control-label">Nombre Completo Firmante</label>
                            <div class="form-group">
                                <input type="text" name="paciente_nombrefirmante" value="<?php echo $this->input->post('paciente_nombrefirmante'); ?>" class="form-control" id="paciente_nombrefirmante" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="paciente_cifirmante" class="control-label">C.I. Firmante</label>
                            <div class="form-group">
                                <input type="text" name="paciente_cifirmante" value="<?php echo $this->input->post('paciente_cifirmante'); ?>" class="form-control" id="paciente_cifirmante" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4 hidden">
                            <label for="registro_fecha" class="control-label">Fecha</label>
                            <div class="form-group">
                                <input type="date" name="registro_fecha" class="form-control" id="registro_fecha" />
                            </div>
                        </div>
                        <div class="col-md-4 hidden">
                            <label for="registro_hora" class="control-label">Hora</label>
                            <div class="form-group">
                                <input type="time" step="any" name="registro_hora" value="0" class="form-control" id="registro_hora"/>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_mes" class="control-label">Mes</label>
                            <div class="form-group">
                                <span id="elmes"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_gestion" class="control-label">Gestión</label>
                            <div class="form-group">
                                <span id="lagestion"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_iniciohemodialisis" class="control-label">Inicio de Hemodialisis para Certificado Medico</label>
                            <div class="form-group">
                                <input type="date" name="registro_iniciohemodialisis" class="form-control" id="registro_iniciohemodialisis" />
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_numaquina" class="control-label">Maquina N°</label>
                            <div class="form-group">
                                <input type="number" min="0" name="registro_numaquina" class="form-control" id="registro_numaquina"/>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_tipofiltro" class="control-label">Tipo de Filtro</label>
                            <div class="form-group">
                                <select class="form-control" name="registro_tipofiltro" id="registro_tipofiltro">
                                    <option value="F8HPS">F8HPS</option>
                                    <option value="FX100">FX100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="avascular_nombre" class="control-label">Tipo de Acceso</label>
                            <div class="form-group">
                                <select class="form-control" name="avascular_nombre" id="avascular_nombre" onchange="detalle_acceso()">
                                    <option value="0">-- Acceso Vascular --</option>
                                    <option value="Cateter">Cateter</option>
                                    <option value="Fistula">Fistula</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="avascular_detalle" class="control-label">Acceso Vascular</label>
                            <div class="form-group">
                                <span id="avasculardetalle"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_numerosesion" class="control-label">Numero Sesión</label>
                            <div class="form-group">
                                <input type="number" min="1" name="registro_numerosesion" class="form-control" id="registro_numerosesion" />
                            </div>
                        </div>
                        <div class="col-md-4" style="background: #d4dbc3">
                            <label for="registro_filtro" class="control-label">Reutilización Filtro</label>
                            <div class="form-group">
                                <input type="number" name="registro_filtro" class="form-control" id="registro_filtro" />
                            </div>
                        </div>
                        <div class="col-md-12" style="background: #d4dbc3">
                            <label for="registro_diagnostico" class="control-label">Diagnostico</label>
                            <div class="form-group">
                                <input type="text" name="registro_diagnostico" class="form-control" id="registro_diagnostico" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-floppy-o"></i> Guardar
                    </button>
                    <a href="<?php echo base_url("paciente"); ?>" type="submit" class="btn btn-danger">
            		<i class="fa fa-times"></i> Cancelar
                    </a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>



<script>


function cargar_imagen(){
    //base_url = document.getElementById('base_url').value;
    //alert(base_url);
    var elemento = document.getElementById('paciente_foto');
    var direccion =  URL.createObjectURL(elemento.files[0]);
      
   //alert(direccion);
   // alert("base_url");
}

//
//$(document).ready(function() {
//
//  // Escuchamos el evento 'change' del input donde cargamos el archivo
//  $(document).on('change', 'input[type=file]', function(e) {
//    // Obtenemos la ruta temporal mediante el evento
//    var TmpPath = URL.createObjectURL(e.target.files[0]);
//    // Mostramos la ruta temporal
//    $('span').html(TmpPath);
//    $('img').attr('src', TmpPath);
//  });
//
//});

    function generar_codigo(){
        var paciente_nombre = document.getElementById("paciente_nombre").value;
        var paciente_apellido = document.getElementById("paciente_apellido").value;
        var numero = Math.floor(Math.random() * 100000); ;
        
        var codigo = paciente_nombre[0]+paciente_nombre[1]+paciente_nombre[2]+paciente_apellido[0]+paciente_apellido[1]+numero;
        $("#paciente_codigo").val(codigo);
        //codigo;
    }
   
</script>