<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<style type="text/css">
    #contieneimg{
        width: 100px;
        height: 100px;
        /*text-align: center;*/
    }
</style>
<div class="box-header">
    <font size='4' face='Arial'><b>REGISTRO DE PACIENTES</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($paciente); ?></font>
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <!--<h3 class="box-title">Paciente Listing</h3>-->
            	<div class="box-tools">
                    <a href="<?php echo site_url('paciente/add'); ?>" class="btn btn-success btn-xs"> + Añadir</a> 
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
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
                    <?php
                    $i=1;
                    foreach($paciente as $p){
                        $color = "";
                        if($p["estado_id"] == 2){
                            $color = $p['estado_color'];
                        }
                    ?>
                    
                    <tr style="background-color: <?php echo "#".$color; ?>" >
                        <td class="text-center"><?php echo $p['paciente_id']; ?></td>
                        <td>
                            <?php
                            if ($p['paciente_foto']!=NULL && $p['paciente_foto']!="") { ?>
                                <a class="btn  btn-xs" id="contieneimg" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                    <img>
                                    <?php
                                    echo '<img src="'.site_url('/resources/images/pacientes/'.$p['paciente_foto']).'" width="80px" height="80px" />';
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
                                        <img src="<?php echo site_url('/resources/images/pacientes/default.jpg');  ?>" width="80px" height="80px" />
                                    </div>
                                    <?php }  ?>
                            
                            
                            
                            
                            <?php echo $p['paciente_nombre']." ".$p['paciente_apellido']; ?></td>
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
                            <a href="<?php echo site_url('paciente/edit/'.$p['paciente_id']); ?>" class="btn btn-info btn-xs" title="Modificar paciente"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('registro/registros/'.$p['paciente_id']); ?>" class="btn btn-facebook btn-xs" title="Ver registros de pacientes"><span class="fa fa-list-alt"></span></a>
                            <a href="<?php echo site_url('paciente/darde_ebaja/'.$p['paciente_id']); ?>" class="btn btn-danger btn-xs" title="Dar de baja a un paciente"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
