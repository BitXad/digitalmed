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
    <font size='4' face='Arial'><b>MEDICAMENTOS</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($medicamento); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('medicamento/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Medicamento</a>
    </div>
</div>
<div class="input-group"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, forma, concentracion">
</div>
    
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="mitabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>CODIGO</th>
                            <th>FORMA</th>
                            <th>CONCENTRACION</th>
                            <!--<th>CANTIDAD</th>-->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                    <?php $i=1;
                        if(isset($medicamento) && $medicamento!=null)
                        {
                            foreach($medicamento as $m){ ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $m['medicamento_nombre']; ?></td>
                            <td class="text-center"><?php echo $m['medicamento_codigo']; ?></td>
                            <td><?php echo $m['medicamento_forma']; ?></td>
                            <td><?php echo $m['medicamento_concentracion']; ?></td>
                            <!--<td><?php //echo $m['medicamento_cantidad']; ?></td>-->
                            <td><a href="<?php echo site_url('medicamento/edit/'.$m['medicamento_id']); ?>" class="btn btn-info btn-xs" title="Modificacar medicamento"><span class="fa fa-pencil"></span></a> 
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
                </table
            </div>

        </div>
    </div>

</div>

