<script src="<?php echo base_url('resources/js/avascular_historial.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente["paciente_id"]; ?>" />
<input type="hidden" name="registro_id" id="registro_id" value="<?php echo $registro["registro_id"]; ?>" />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
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
<div class="box-header">
    <font size='3' face='Arial'><b>Historial de</b></font>
    <div class="text-center"><font size='3' face='Arial'><b><?php echo $paciente["paciente_apellido"]." ".$paciente["paciente_nombre"] ?></b></font></div>
    <font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($acceso_vascular); ?></font>
    <div class="box-tools no-print">
        <?php
        $data_target = 'onclick ="sin_permiso()"';
        if($rol[18-1]['rolusuario_asignado'] == 1){
            $data_target = 'data-target="#modal_nuevoacceso"';
        }
        ?>
        <a class="btn btn-success btn-sm" data-toggle="modal" <?php echo $data_target; ?>>
            <span class="fa fa-pencil-square-o"></span> Nuevo Acceso </a>
    </div>
</div>
<div class="input-group"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el acceso, detalle..">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="mitabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ACCESO</th>
                            <th>DETALLE</th>
                            <th>REGISTRO</th>
                            <th>FECHA/HORA</th>
                            <!--<th></th>-->
                        </tr>
                    </thead>
                    <tbody class="buscar">
                    <?php $i=1;
                        if(isset($acceso_vascular) && $acceso_vascular!=null)
                        {
                            foreach($acceso_vascular as $av){ ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $av['avascular_nombre']; ?></td>
                            <td><?php echo $av['avascular_detalle']; ?></td>
                            <td class="text-center"><?php echo $av['registro_id']; ?></td>
                            <td class="text-center"><?php echo date("d/m/Y H:i:s", strtotime($av['avascular_fechahora'])); ?></td>
                            <!--<td><a href="<?php //echo site_url('acceso_vascular/edit/'.$av['avascular_id']); ?>" class="btn btn-info btn-xs" title="Modificacar acceso vascular"><span class="fa fa-pencil"></span></a>--> 
                                 <!--<a
                                    onclick="return confirm('Are you sure You want to delete?')"
                                     href="<?php //echo site_url('medicamento/remove/'.$m['medicamento_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                     -->
                             </td>
                        </tr>
                    <?php
                            }
                        }else{
                            echo 'No hay datos';
                        }
                    ?>
                        </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!------------------------ INICIO modal para registrar acceso ------------------->
<div class="modal fade" id="modal_nuevoacceso" tabindex="-1" role="dialog" aria-labelledby="modal_nuevoaccesolabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">NUEVO ACCESO VASCULAR</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loaderacceso" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="avascular_nombre" class="control-label">Tipo de Acceso</label>
                    <div class="form-group">
                        <select class="form-control" name="avascular_nombre" id="avascular_nombre" onchange="detalle_acceso()">
                            <option value="0">-- Acceso Vascular --</option>
                            <option value="Cateter">Cateter</option>
                            <option value="Fistula">Fistula</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="avascular_detalle" class="control-label">Acceso Vascular</label>
                    <div class="form-group">
                        <span id="avasculardetalle"></span>
                    </div>
                    <br><br>
                </div>
                
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="registrar_acceso()"><fa class="fa fa-floppy-o"></fa> Registrar Acceso</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para registrar registro de paciente ------------------->

