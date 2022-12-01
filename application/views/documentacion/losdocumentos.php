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
    <font size='4' face='Arial'><b>REGISTRO DE DOCUMENTOS</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($documentacion); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('documentacion/add/'.$paciente["paciente_id"]); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Documento</a>
    </div>
</div>
<div class="col-md-8"  style="padding: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre del documento.." autocomplete="off" autofocus="true">
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
                        <th>Documento</th>
                        <th>Archivo</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    $i=1;
                    foreach($documentacion as $d){
                        $color = "";
                        if($d["estado_id"] == 2){
                            $color = $d['estado_color'];
                        }
                    ?>
                    <tbody class="buscar" id="tablaresultados">
                    <tr style="background-color: <?php echo "#".$color; ?>" >
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><?php echo $d['documentacion_descripcion']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo site_url('/resources/images/documentos/'.$d['documentacion_foto']) ?>" target="_blank"><?php echo $d['documentacion_foto']; ?></a>
                        </td>
                        <td class="text-center"><?php echo $d['estado_descripcion']; ?></td>
                        <td class="text-center">
                            <?php
                            if($d['estado_id'] == 1){
                            ?>
                            <a href="<?php echo site_url('documentacion/darde_baja/'.$d['documentacion_id']."/".$d['paciente_id']); ?>" class="btn btn-danger btn-xs" title="Dar de baja este documento"><span class="fa fa-trash"></span></a>
                            <?php
                            }else{
                            ?>
                            <a href="<?php echo site_url('documentacion/darde_alta/'.$d['documentacion_id']."/".$d['paciente_id']); ?>" class="btn btn-success btn-xs" title="Dar de alta este documento"><span class="fa fa-check"></span></a>
                            <?php
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
            </div>
        </div>
    </div>
</div>
