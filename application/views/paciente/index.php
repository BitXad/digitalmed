<script src="<?php echo base_url('resources/js/paciente.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<script type="text/javascript">
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

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<style type="text/css">
    #contieneimg{
        width: 50px;
        height: 50px;
        text-align: center;
    }
    .horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
</style>
<div class="box-header">
    <font size='4' face='Arial'><b>REGISTRO DE PACIENTES</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($paciente); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('paciente/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Paciente</a>
    </div>
</div>
<div class="col-md-8"  style="padding: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, carnet, dirección.." autocomplete="off" autofocus="true">
        <!--<div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="tablaresultadosproducto(2)" title="Buscar"><span class="fa fa-search"></span></div>
        <div style="border-color: #d58512; background: #e08e0b !important; color: white" class="btn btn-warning input-group-addon" onclick="tablaresultadosproducto(3)" title="Mostrar todos los productos"><span class="fa fa-globe"></span></div>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>C.I.</th>
                        <th>Ext</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    $i=1;
                    foreach($paciente as $p){
                        $color = "";
                        if($p["estado_id"] == 2){
                            $color = $p['estado_color'];
                        }
                    ?>
                    <tbody class="buscar" id="tablaresultados">
                    <tr style="background-color: <?php echo "#".$color; ?>" >
                        <td class="text-center"><?php echo $i; ?></td>
                        <td>
                            <div class='horizontal'>
                            <?php
                            if ($p['paciente_foto']!=NULL && $p['paciente_foto']!="") { ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/pacientes/'.$p['paciente_foto']).'" width="50px" height="50px" />';
                                        ?>
                                    </a>
                                <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                    <div class="modal-dialog" role="document">
                                        <br><br>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                <font size="3"><b><?php echo $p['paciente_foto']; ?></b></font>
                                            </div>
                                            <div class="modal-body">
                                               <!------------------------------------------------------------------->
                                               <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/pacientes/'.$p['paciente_foto']).'" />'; ?>
                                               <!------------------------------------------------------------------->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                             <?php } else { ?>
                                    <div id="contieneimg">
                                        <img src="<?php echo site_url('/resources/images/pacientes/default.jpg');  ?>" width="50px" height="50px" />
                                    </div>
                                    <?php }  ?>
                            
                            
                            
                            
                            <?php echo $p['paciente_apellido']." ".$p['paciente_nombre']; ?>
                        </div>
                        </td>
                        <td class="text-center">
                            <?php
                            if($p['paciente_fechanac'] != "" && $p['paciente_fechanac'] != null && $p['paciente_fechanac'] != "0000-00-00"){
                                $fecha_nacimiento = $p['paciente_fechanac'];
                                
                                $dia  = date("d");
                                $mes  = date("m");
                                $anio = date("Y");

                                $dianaz=date("d",strtotime($fecha_nacimiento));
                                $mesnaz=date("m",strtotime($fecha_nacimiento));
                                $anionaz=date("Y",strtotime($fecha_nacimiento));

                                //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
                                if (($mesnaz == $mes) && ($dianaz > $dia)) {
                                    $anio=($anio-1);
                                }

                                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
                                if ($mesnaz > $mes) {
                                $anio=($anio-1);}

                                 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
                                $edad=($anio-$anionaz);
                                echo $edad;
                            }else{ echo 0; }
                            ?>
                        </td>
                        <td class="text-center"><?php echo $p['genero_nombre']; ?></td>
                        <td class="text-center"><?php echo $p['paciente_ci']; ?></td>
                        <td class="text-center"><?php echo $p['extencion_descripcion']; ?></td>
                        <td class="text-center"><?php echo $p['paciente_direccion']; ?></td>
                        <td class="text-center"><?php echo $p['estado_descripcion']; ?></td>
                        <td class="text-center">
                            <?php
                            if($tipousuario_id == 1){
                                $el_nombrepaciente = $p['paciente_apellido']." ".$p['paciente_nombre'];
                                $el_nombrepaciente = "'".$el_nombrepaciente."'";
                            ?>
                            <a href="<?php echo site_url('paciente/edit/'.$p['paciente_id']); ?>" class="btn btn-info btn-xs" title="Modificar paciente"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('registro/registros/'.$p['paciente_id']); ?>" class="btn btn-facebook btn-xs" title="Ver registros de pacientes"><span class="fa fa-list-alt"></span></a>
                            <a href="<?php echo site_url('documentacion/losdocumentos/'.$p['paciente_id']); ?>" class="btn btn-warning btn-xs" title="Ver documentos del paciente" target="_blank"><span class="fa fa-file-image-o"></span></a>
                            <a data-toggle="modal" data-target="#modal_finalizartratamiento" class="btn btn-success btn-xs" onclick="cargartratamientos_afinalizar(<?php echo $p['paciente_id']; ?>, <?php echo $el_nombrepaciente; ?>)" title="Finalizar tratamiento"><i class="fa fa-check-square-o"></i></a>
                            <?php
                            if($p['estado_id'] == 1){
                            ?>
                            <a href="<?php echo site_url('paciente/darde_baja/'.$p['paciente_id']); ?>" class="btn btn-danger btn-xs" title="Dar de baja a un paciente"><span class="fa fa-minus-circle"></span></a>
                            <?php
                            }else{
                            ?>
                            <a href="<?php echo site_url('paciente/darde_alta/'.$p['paciente_id']); ?>" class="btn btn-success btn-xs" title="Dar de alta a un paciente"><span class="fa fa-check"></span></a>
                            <?php
                            }
                            ?>
                            <a onclick="return confirm('Esta seguro que quiere eliminar a este paciente del sistema?\nNota.- esta operacion borrara toda la informacion del paciente y no habra forma de recuperarla.')" href="<?php echo site_url('paciente/remove/'.$p['paciente_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar paciente del sistema"><span class="fa fa-trash"></span></a>
                            <?php
                            }elseif($p['registro_id'] != null && $p['registro_id'] != ""){
                            ?>
                            <a href="<?php echo site_url('tratamiento/tratamientos/'.$p['registro_id']); ?>" class="btn btn-facebook btn-xs" title="Tratamientos de un registro" style="width: 50px; height: 50px"><span class="fa fa-file-text fa-2x" ></span></a>
                            <?php
                            }else{
                                echo "No tiene Tratamientos";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para Finalizar tratamiento de paciente ------------------->
<div class="modal fade" id="modal_finalizartratamiento" tabindex="-1" role="dialog" aria-labelledby="modal_finalizartratamientolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">TRATAMIENTOS POR FINALIZAR</b>
                <br>de: <span class="text-bold" id="elpaciente"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadertratamientofinalizar" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div id="encontrados"></div>
                <div class="box-body table-responsive no-padding">
                    <table id="mitabla" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>MES</th>
                                <th>GESTION</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>ESTADO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="buscar_trat" id="tratamientos_afinalizar"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <!--<button type="button" class="btn btn-success" onclick="modificar_tratamiento()"><fa class="fa fa-floppy-o"></fa> Guardar Tratamiento Modificado</button>-->
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodalmodif"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Finalizar tratamiento de paciente ------------------->
