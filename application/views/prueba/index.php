<script src="<?php echo base_url('resources/js/index_prueba.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.onload = function() {
        buscar_pruebas();
  //funciones a ejecutar
    };
    
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <font size='4' face='Arial'><b>PRUEBAS REALIZADAS</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($prueba); ?></font>
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                
                    <div class="col-md-7">
                        <!---- ----------------- parametro de buscador ------------------- -->
                          <div class="input-group"> <span class="input-group-addon">Buscar</span>                              
                              <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci" onkeydown="validar(event,1)" autocomplete="off">
                          </div>
                        <!--------------------- fin parametro de buscador ------------------- -->
                    </div>
                
                    <div class="col-md-3">
                        <!---- ----------------- parametro de buscador ------------------- -->
                        <select  class="btn btn-warning btn-block" id="select_pruebas" onchange="buscar_pruebas()">
                        <option value="1">Pruebas de Hoy</option>
                        <option value="2">Pruebas de Ayer</option>
                        <option value="3">Pruebas de la semana</option>
                        <option value="4">Todas la pruebas</option>
                        <option value="5">Pruebas por fecha</option>
                    </select>
                    </div>
                
<!--                    <div class="col-md-2">
                        -- ----------------- parametro de buscador ------------------- 
                        <select  class="btn btn-info btn-block" id="select_estados" onchange="buscar_pruebas()">

                        <option value="0">- TODAS -</option>
                        <?php 
                            foreach($estado as $e){ ?>
                                <option value="<?php echo $e["estado_id"];?>"><?php echo $e["estado_descripcion"];?></option>
                        <?php } ?>

                        </select>
                        
                        ------------------- fin parametro de buscador ------------------- 
                    </div>-->
                    
                    <div class="col-md-2">

                        <div class="box-tools">                            
                            <a href="<?php echo site_url('prueba/registrar_prueba'); ?>" class="btn btn-facebook btn-block"><fa class="fa fa-flask"></fa> Registrar Prueba</a> 
                        </div>
                        
                    </div>
            </div>
            
            <!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<!--<form method="post">-->
<div class="panel panel-primary col-md-12 no-print" id='buscador_oculto' style='display:none;'>
    <br>
    <center>            
        <div class="col-md-3">
            Desde: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_desde" value="<?php echo date("Y-m-d");?>" name="fecha_desde" required="true">
        </div>
        <div class="col-md-3">
            Hasta: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_hasta" value="<?php echo date("Y-m-d");?>"  name="fecha_hasta" required="true">
        </div>
        
        <div class="col-md-2">
            Tipo:             
            <select  class="btn btn-info btn-sm form-control" id="select_estados" onchange="buscar_pruebas()">

            <option value="0">- TODOS -</option>
            <?php 
                foreach($estado as $e){ ?>
                    <option value="<?php echo $e["estado_id"];?>"><?php echo $e["estado_descripcion"];?></option>
            <?php } ?>

            </select>
        </div>
        
        <div class="col-md-2">
            Usuario:     
            <select  class="btn btn-info btn-sm form-control" id="usuario_id">
                    <option value="0">- TODOS -</option>
                <?php foreach($usuarios as $us){?>
                    <option value="<?php echo $us['usuario_id']; ?>"><?php echo $us['usuario_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <br>
        <div class="col-md-2">

            <button class="btn btn-sm btn-facebook btn-xs btn-block"   onclick="ventas_por_fecha()">
                <h4>
                <span class="fa fa-search"></span>   Buscar
                </h4>
            </button>
            
            <br>
        </div>
        
    </center>    
    <br>    
</div>
<!--</form>-->
<!------------------------------------------------------------------------------------------->
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed table-hover" id="mitabla" >
                    
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Paciente</th>
                        <th>Tipo Prueba</th>
                        <th>Fecha</th>
                        <th>Procedencia</th>
                        <th>Precio<br>Bs</th>
                        <th>A cuenta <br>Bs</th>
                        <th>Saldo <br>Bs</th>
                        <th>Responsable</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tabla_pacientes">
                        
    
                    </tbody>
                </table>
<!--                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                -->
            </div>
        </div>
    </div>
</div>


<!------------------------------------------------------------>
<!-- Button trigger modal -->
<div hidden="">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_rentregar" id="boton_modalprueba">
  Modal
</button>    
</div>

<!-- Modal -->
<div class="modal fade" id="modal_rentregar" tabindex="-1" role="dialog" aria-labelledby="modal_rentregar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-family: Arial"><b>PRUEBA: REGISTRAR ENTREGA</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row clearfix">
                
              
              <div class="col-md-4" hidden="true">
                        <label for="prueba_id" class="control-label">Prueba_id</label>
                        <div class="form-group">
                                <input type="text" name="prueba_id" value="" class="form-control" id="prueba_id" />
                        </div>
                </div>
              
                <div class="col-md-4">
                        <label for="prueba_fechasolicitud" class="control-label">Fecha solicitud</label>
                        <div class="form-group">
                                <input type="text" name="prueba_fechasolicitud" value="" class="has-datetimepicker form-control" id="prueba_fechasolicitud" />
                        </div>
                </div>
              
                <div class="col-md-4">
                        <label for="prueba_fechainforme" class="control-label">Fecha Informe</label>
                        <div class="form-group">
                                <input type="text" name="prueba_fechainforme" value="" class="has-datetimepicker form-control" id="prueba_fechainforme" />
                        </div>
                </div>
              
              <div class="col-md-4">
                        <label for="prueba_medicolab" class="control-label">Medico/Laboratorio</label>
                        <div class="form-group">
                                <input type="text" name="prueba_medicolab" value="" class="form-control" id="prueba_medicolab" />
                        </div>
                </div>
<!--              
                <div class="col-md-4">
                        <label for="prueba_fecharecepcion" class="control-label">Prueba Fecharecepcion</label>
                        <div class="form-group">
                                <input type="text" name="prueba_fecharecepcion" value="" class="has-datetimepicker form-control" id="prueba_fecharecepcion" />
                        </div>
                </div>-->
                <div class="col-md-4">
                        <label for="prueba_procedencia" class="control-label">Procedencia</label>
                        <div class="form-group">
                                <input type="text" name="prueba_procedencia" value="" class="form-control" id="prueba_procedencia" />
                        </div>
                </div>

                <div class="col-md-4">
                        <label for="prueba_descricpion" class="control-label">Descricpión</label>
                        <div class="form-group">
                                <textarea name="prueba_descricpion" class="form-control" id="prueba_descricpion"> </textarea>
                        </div>
                </div>
                <div class="col-md-4">
                        <label for="prueba_nombreanalisis" class="control-label"><span class="text-danger">*</span>Analisis</label>
                        <div class="form-group">
                                <textarea name="prueba_nombreanalisis" class="form-control" id="prueba_nombreanalisis"> </textarea>
                                <span class="text-danger"> </span>
                        </div>
                </div>
                <div class="col-md-4">
                        <label for="prueba_resultados" class="control-label">Resultado(s)</label>
                        <div class="form-group">
                                <textarea name="prueba_resultados" class="form-control" id="prueba_resultados"> </textarea>
                        </div>
                </div>
                <div class="col-md-4">
                        <label for="prueba_observacion" class="control-label">Observacion</label>
                        <div class="form-group">
                                <textarea name="prueba_observacion" class="form-control" id="prueba_observacion"></textarea>
                        </div>
                </div>

                <div class="col-md-4">
                        <label for="prueba_precio" class="control-label"><span class="text-danger">*</span>Precio Bs</label>
                        <div class="form-group">
                                <input type="text" name="prueba_precio" value="0.00" class="form-control" id="prueba_precio" />
                                <!--<span class="text-danger"><?php echo form_error('prueba_precio');?></span>-->
                        </div>
                </div>

                <div class="col-md-4">
                        <label for="prueba_acuenta" class="control-label">A cuenta Bs</label>
                        <div class="form-group">
                                <input type="text" name="prueba_acuenta" value="0.00" class="form-control" id="prueba_acuenta" />
                        </div>
                </div>
<!--                <div class="col-md-6">
                        <label for="prueba_fechacuenta" class="control-label">Prueba Fechacuenta</label>
                        <div class="form-group">
                                <input type="text" name="prueba_fechacuenta" value="<?php echo ($this->input->post('prueba_fechacuenta') ? $this->input->post('prueba_fechacuenta') : $prueba['prueba_fechacuenta']); ?>" class="has-datetimepicker form-control" id="prueba_fechacuenta" />
                        </div>
                </div>-->
                <div class="col-md-4">
                        <label for="prueba_saldo" class="control-label">Saldo Bs</label>
                        <div class="form-group">
                                <input type="text" name="prueba_saldo" value="0.00" class="form-control" id="prueba_saldo" />
                        </div>
                </div>
<!--                <div class="col-md-6">
                        <label for="prueba_fechasaldo" class="control-label">Prueba Fechasaldo</label>
                        <div class="form-group">
                                <input type="text" name="prueba_fechasaldo" value="<?php echo ($this->input->post('prueba_fechasaldo') ? $this->input->post('prueba_fechasaldo') : $prueba['prueba_fechasaldo']); ?>" class="has-datetimepicker form-control" id="prueba_fechasaldo" />
                        </div>
                </div>-->
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar_modalprueba"><fa class="fa fa-times"></fa> Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="actualizar_prueba(1)"><fa class="fa fa-floppy-o"></fa> Guardar</button>
        <button type="button" class="btn btn-facebook" onclick="actualizar_prueba(2)"><fa class="fa fa-hand-o-right"></fa> Entregar</button>
      </div>
    </div>
  </div>
</div>
