<script src="<?php echo base_url('resources/js/registrar_prueba.js'); ?>"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/select2/css/select2.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('resources/css/select2/js/select2.full.min.js'); ?>"></script>

<script type="text/javascript">
//jQuery(document).ready(function($){
//    $(document).ready(function() {
//        $('.mi-selector').select2();
//    });
//});
function compruebaTecla (e) {
var keyCode = document.all ? e.which : e.keyCode;
 
 
//  if (keyCode == 39)
//alert("flecha derecha")
//  else if (keyCode == 40)
//
//MarcaCheck ();
//  else if (keyCode == 38)
//alert("flecha arriba")
//  else if (keyCode == 37)
//alert("flecha izquierda")
//  return true;

//  if (keyCode == 112) //f1
//  { alert("Tecla F1"); }    

  if (keyCode == 113) //f2
  { //alert("Tecla F2"); 
    $('#paciente_ci').focus();
    $('#paciente_ci').select();
      
  }    

  if (keyCode == 115) //f4
  {       
    $('#paciente_nombre').focus();
    $('#paciente_nombre').select();
  }

  if (keyCode == 118) //f7
  {       
    $('#nit').focus();
    $('#nit').select();
  }

  if (keyCode == 119) //f8
  {       
    $('#boton_finalizar').click();
  }

  if (keyCode == 120) //f9
  {   
      alert("holaaaa");
      
    //$('#imprimir').click();
  }

  //if (keyCode == 121) //f10
  //{       
    //$('#nit').focus();
    //$('#nit').select();
    
  //}
  
    e = e || event;
  if(e.altKey && String.fromCharCode(e.keyCode) == 'C')
  {
      $("#imprimir").click();
  } 
  
}
window.onkeydown = compruebaTecla;
</script>
    


<?php $atributos = " btn btn-warning btn-sm";  //atributos para los inputs del clientes?>
<?php $estilos_facturacion = " style='color: black; background: #1221; text-align: left; font-size: 12px; font-family: Arial;'"; //estilo para los inputs de facturacion?>
<?php $estilos = " style='background: white; color: black; text-align: left;  font-family: Arial;'"; //estilo para los inputs del cliente?>
<?php $estilo_div = " style='padding:2; padding-left:1px; margin:0; line-height:15px;' "; ?>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<input type="text" value="<?php echo $paciente['paciente_id']; ?>" id="paciente_id" hidden>
<!--<select class='mi-selector' name='marcas'>
    <option value=''>Seleccionar una marca</option>
    <option value='audi'>Audi</option>
    <option value='bmw'>BMW</option>
    <option value='citroen'>Citroen</option>
    <option value='fiat'>Fiat</option>
    <option value='ford'>Ford</option>
    <option value='honda'>Honda</option>
    <option value='hyundai'>Hyundai</option>
    <option value='kia'>Kia</option>
    <option value='mazda'>Mazda</option>
</select>-->

<br>

    <div class="panel panel-primary">
      <!--<div class="panel-heading">Datos del paciente</div>-->
      <div class="panel-body">
          
          
            <div class="col-md-2" <?php echo $estilo_div; ?>>
                <label for="paciente_ci" class="control-label" style="margin-bottom: 0;">C.I.</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <input type="text" name="paciente_ci" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_ci" value="<?php echo $paciente['paciente_ci']; ?>"  onKeyUp="this.value = this.value.toUpperCase();" onkeypress="validar(event,1)" onclick="seleccionar(1)"/>
                </div>            
            </div>

        <div class="col-md-2" <?php echo $estilo_div; ?>>
                <label for="paciente_codigo" class="control-label" style="margin-bottom: 0;">TIPO DOC.</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <input type="text" name="paciente_codigo" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_codigo" value="<?php echo $paciente['paciente_codigo']; ?>"  onKeyUp="this.value = this.value.toUpperCase();" onkeypress="validar(event,2)" onclick="seleccionar(2)"/>
                </div>            
        </div>
          
        <div class="col-md-4"  <?php echo $estilo_div; ?>>
                <label for="paciente_nombre" class="control-label" style="margin-bottom: 0;">PACIENTE</label>
                
                <div class="form-group" <?php echo $estilo_div; ?>>

                    <input type="search" name="paciente_nombre" list="listapacientes" class="form-control <?php echo $atributos; ?>" <?php echo $estilos_facturacion; ?> id="paciente_nombre" value="<?php echo $paciente['paciente_razon']; ?>" onkeypress="validar(event,3)"  onchange="seleccionar_paciente()" onclick="seleccionar(3)" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
                    <datalist id="listapacientes">
<!--                        
                        <option value="1">1</option>
                        <option valur="2">2</option>
                        <option value="3">3</option>-->
                            
                    </datalist>

                </div>
        </div>

          
<!--        <div class="col-md-5" <?php echo $estilo_div; ?>>
            <label for="nombre" class="control-label" style="margin-bottom: 0;">CLIENTE</label>
            <div class="form-group" <?php echo $estilo_div; ?>>
                <input type="text" name="paciente_nombre" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_nombre" value="<?php echo $paciente['paciente_nombre']; ?>"  onKeyUp="this.value = this.value.toUpperCase();" onkeypress="validar(event,3)" onclick="seleccionar(3)"/>
            </div>
        </div>-->
          
        <div class="col-md-1" <?php echo $estilo_div; ?>>
            <label for="paciente_edad" class="control-label" style="margin-bottom: 0;">EDAD</label>
            <div class="form-group" <?php echo $estilo_div; ?>>
                <input type="text" name="paciente_edad" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_edad" value="<?php echo $paciente['paciente_edad']; ?>"  onKeyUp="this.value = this.value.toUpperCase();"/>
            </div>
        </div>
          
        <div class="col-md-2" <?php echo $estilo_div; ?>>
                <label for="genero_id" class="control-label" style="margin-bottom: 0;">GENERO</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <!--<input type="text" name="genero_nombre" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="genero_nombre" value="<?php echo $paciente['paciente_direccion']; ?>"  onKeyUp="this.value = this.value.toUpperCase();"/>-->
                           
                    <select type="text" name="genero_id" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="genero_id" value="<?php echo $paciente['paciente_direccion']; ?>"  >
                        
                        
                        
                        <?php 
                            $seleccionado = "";
                            foreach($genero as $g){ 
                            
                                if ($g['genero_id']==$paciente['genero_id'] ){
                                    $seleccionado = "selected";}
                                else{
                                    $seleccionado = "";}
                            ?>
                                <option value="<?php echo $g['genero_id']; ?>" <?php echo " ".$seleccionado; ?> ><?php echo $g['genero_nombre']; ?></option>
                        
                        <?php } ?>
                        
                        
                    </select>
                        
                
                </div>
            </div>          
          
          
        <div class="col-md-1" <?php echo $estilo_div; ?>>
            <label for="paciente_celular" class="control-label" style="margin-bottom: 0;"></label>
            <div class="form-group" <?php echo $estilo_div; ?>>

                <h4 class="panel-title">


                  <a data-toggle="collapse" href="#collapse1"  class="btn btn-facebook btn-sm btn-flat"> 
                      <fa class="fa fa-plus"></fa>  
                   </a>

                </h4>

            </div>
        </div>           
        
          
        
          
          
        <?php
            $es_movil = "0";
            $es_movil = "<script>document.write(esmovil);</script>";         

        ?>   

<?php //if($es_movil == 0){ ?> 

          
          
          


<!---------------------- collapse ----------------------------->
 

         
          
<div class="col-md-12" <?php echo $estilo_div; ?>>
            <label for="paciente_celular" class="control-label" style="margin-bottom: 0;"></label>
            <div class="form-group" <?php echo $estilo_div; ?>>

<div class="panel-group" <?php echo $estilo_div; ?>>
    <div class="panel panel-default" <?php echo $estilo_div; ?>>
      

          
          
          
          
          
          

<!--------------------- paciente_id --------------------->
<div class="container" hidden>
    <input type="text" name="paciente_id" value="<?php echo $paciente['paciente_id']; ?>" class="form-control" id="paciente_id" >
</div>

<!--------------------- fin paciente_id --------------------->
        
        



      </div>
        
    <div id="collapse1" class="panel-collapse collapse">
<!---------------------- contenido collapse ----------------------------->
<div class="row">
          
      
<!--                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Title</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>-->

        




            

            <div class="col-md-4" <?php echo $estilo_div; ?>>
                <label for="paciente_direccion" class="control-label" style="margin-bottom: 0;">DIRECCIÓN</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <input type="text" name="paciente_direccion" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_direccion" value="<?php echo $paciente['paciente_direccion']; ?>"  onKeyUp="this.value = this.value.toUpperCase();"/>
                </div>
            </div>
                    
            <div class="col-md-4" <?php echo $estilo_div; ?>>
                <label for="paciente_telefono" class="control-label" style="margin-bottom: 0;">TELEFONO</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <input type="paciente_telefono" name="paciente_telefono" class="form-control <?php echo $atributos; ?>" <?php echo $estilos; ?> id="paciente_telefono"  value="<?php echo $paciente['paciente_telefono']; ?>"/>
                </div>
            </div>

            <div class="col-md-4" <?php echo $estilo_div; ?>>
                <label for="paciente_celular" class="control-label" style="margin-bottom: 0;">CELULAR</label>
                <div class="form-group" <?php echo $estilo_div; ?>>
                    <input type="text" name="paciente_celular" class="form-control <?php echo $atributos; ?>" <?php echo $estilos_facturacion; ?> id="paciente_celular" onkeypress="validar(event,0)" onclick="seleccionar(3)" value="<?php echo $paciente['paciente_celular']; ?>" onKeyUp="this.value = this.value.toUpperCase();"/>
                </div>
            </div>

            <div class="col-md-4" <?php echo $estilo_div; ?>>
                <label for="paciente_nit" class="control-label" style="margin-bottom: 0;">NIT</label>
                <div class="form-group"  <?php echo $estilo_div; ?>>
                    <input type="number" name="paciente_nit" class="form-control  <?php echo $atributos; ?>" <?php echo $estilos_facturacion; ?> id="paciente_nit" value="<?php echo $paciente['paciente_nit']; ?>"  onkeypress="validar(event,1)" onclick="seleccionar(1)" />
                </div>
            </div>

            <div class="col-md-4"  <?php echo $estilo_div; ?>>
                <label for="paciente_razon" class="control-label" style="margin-bottom: 0;">RAZON SOCIAL</label>
                <div class="form-group" <?php echo $estilo_div; ?>>

                    <!--<input type="search" name="razon_social" list="listaclientes" class="form-control" id="razon_social" value="<?php echo $paciente['paciente_razon']; ?>" onkeypress="validar(event,2)"  onclick="seleccionar(2)" onKeyUp="this.value = this.value.toUpperCase();"/>-->
                    <input type="text" name="paciente_razon" class="form-control <?php echo $atributos; ?>" <?php echo $estilos_facturacion; ?> id="paciente_razon" value="<?php echo $paciente['paciente_razon']; ?>" onkeypress="validar(event,9)"  onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
<!--                    <datalist id="listaclientes">

                    </datalist>-->

                </div>
            </div>
          

    </div>
</div>

    
    
    
<!-------------------- fin inicio collapse ---------------------->

<!---------------------- contenido collapse ----------------------------->

</div>
</div>
        
      
</div>
</div>
</div>


<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
<!--            <div class="box-header with-border">
              	<h3 class="box-title">PRUEBA</h3>
            </div>-->
            <?php // echo form_open('prueba/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
<!--					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Responsable</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">- USUARIO -</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="tipoprueba_id" class="control-label">Tipo Prueba</label>
						<div class="form-group">
                                                    <select name="tipoprueba_id" class="form-control" onchange="cargar_precio()" id="tipoprueba_id">
								<option value="">- TIPO DE PRUEBA -</option>
								<?php 
								foreach($all_tipo_prueba as $tipo_prueba)
								{
									$selected = ($tipo_prueba['tipoprueba_id'] == $this->input->post('tipoprueba_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_prueba['tipoprueba_id'].'" '.$selected.'>'.$tipo_prueba['tipoprueba_descripcion'].' (Bs '.$tipo_prueba['tipoprueba_precio'].')</option>';
								} 
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<label for="prueba_nombreanalisis" class="control-label"><span class="text-danger">*</span>Descripción Analisis</label>
						<div class="form-group">
							<textarea name="prueba_nombreanalisis" class="form-control" id="prueba_nombreanalisis" onKeyUp="this.value = this.value.toUpperCase();" ><?php echo $this->input->post('prueba_nombreanalisis'); ?>
PRUEBA COVID-19
                                                        </textarea>
							<span class="text-danger"><?php echo form_error('prueba_nombreanalisis');?></span>
						</div>
					</div>


					<div class="col-md-6">
						<label for="prueba_fechasolicitud" class="control-label">Fecha Solicitud / Toma  de muestra</label>
						<div class="form-group">
                                                    <input type="datetime-local" name="prueba_fechasolicitud" value="<?php echo date("Y-m-d")."T".date("H:i:s"); ?>" class=" form-control" id="prueba_fechasolicitud" />
							<!--<input type="text" name="prueba_fechasolicitud" value="<?php echo $this->input->post('prueba_fechasolicitud'); ?>" class="has-datetimepicker form-control" id="prueba_fechasolicitud" />-->
						</div>
					</div>

					<div class="col-md-6">
						<label for="prueba_fechainforme" class="control-label">Fecha Informe</label>
						<div class="form-group">
                                                    <input type="datetime-local" name="prueba_fechainforme" value="<?php echo date("Y-m-d")."T".date("H:i:s"); ?>" class=" form-control" id="prueba_fechainforme" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="prueba_medicolab" class="control-label">Medico/Laboratorio</label>
						<div class="form-group">
							<input type="text" name="prueba_medicolab" value="A.Q.C." class="form-control" id="prueba_medicolab" onKeyUp="this.value = this.value.toUpperCase();"  />
						</div>
					</div>

					<div class="col-md-6">
						<label for="prueba_procedencia" class="control-label">Procedencia</label>
						<div class="form-group">
							<input type="text" name="prueba_procedencia" value="N/A" class="form-control" id="prueba_procedencia" onKeyUp="this.value = this.value.toUpperCase();"  />
						</div>
					</div>
					<div class="col-md-4">
						<label for="prueba_precio" class="control-label"><span class="text-danger">*</span>Precio Bs</label>
						<div class="form-group">
                                                    <input type="text" name="prueba_precio" value="<?php echo $this->input->post('prueba_precio'); ?>" class="form-control" id="prueba_precio" onkeyup="calcular()" style="background: #7adddd" onclick="seleccionar(7)"/>
							<span class="text-danger"><?php echo form_error('prueba_precio');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="prueba_acuenta" class="control-label">A Cuenta Bs</label>
						<div class="form-group">
                                                    <input type="text" name="prueba_acuenta" value="<?php echo $this->input->post('prueba_acuenta'); ?>" class="form-control" id="prueba_acuenta"  onkeyup="calcular()" style="background: #000\9" onclick="seleccionar(8)"/>
						</div>
					</div>
                                        <div class="col-md-6" hidden>
						<label for="prueba_fechacuenta" class="control-label">Fecha A Cuenta</label>
						<div class="form-group">
                                                    <input type="datetime-local" name="prueba_fechacuenta" value="<?php echo date("Y-m-d")."T".date("H:i:s"); ?>" class="form-control" id="prueba_fechacuenta" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="prueba_saldo" class="control-label">Saldo</label>
						<div class="form-group">
                                                    <input type="text" name="prueba_saldo" value="<?php echo $this->input->post('prueba_saldo'); ?>" class="form-control" id="prueba_saldo"  onkeyup="calcular()" style="background: #7adddd" onclick="seleccionar(9)"/>
						</div>
					</div>
<!--
					<div class="col-md-6">
						<label for="prueba_fechasaldo" class="control-label">Fechasaldo</label>
						<div class="form-group">
							<input type="text" name="prueba_fechasaldo" value="<?php echo $this->input->post('prueba_fechasaldo'); ?>" class="has-datetimepicker form-control" id="prueba_fechasaldo" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="prueba_descricpion" class="control-label">Descricpion</label>
						<div class="form-group">
                                                    <textarea name="prueba_descricpion" class="form-control" id="prueba_descricpion">
PRUEBA EN TIEMPO REAL / REAL TIME TEST
======================================
TEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC
                                                    </textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="prueba_resultados" class="control-label">Resultados</label>
						<div class="form-group">
							<textarea name="prueba_resultados" class="form-control" id="prueba_resultados">
PCR-TR COVID-19  NO DETECTADO / NOT DETECTED</textarea>
						</div>
					</div>
					<div class="col-md-12">
						<label for="prueba_observacion" class="control-label">Observacion</label>
						<div class="form-group">
							<textarea name="prueba_observacion" class="form-control" id="prueba_observacion">
Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)

Resultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).</textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success" onclick="guardar_prueba()">
            		<i class="fa fa-floppy-o"></i> Guardar
            	</button>
                    
                    <a href="<?php echo base_url("prueba"); ?>" class="btn btn-danger">
            		<i class="fa fa-times"></i> Cancelar
            	</a>
                    
          	</div>
            <?php //echo form_close(); ?>
      	</div>
    </div>
</div>