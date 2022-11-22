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
    <font size='4' face='Arial'><b>Forma Farmaceutica</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($forma); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('forma/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Medicamento</a>
    </div>
</div>
<div class="input-group"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre">
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;
                        if(isset($forma) && $forma!=null)
                        {
                            foreach($forma as $m){ ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $m['forma_nombre']; ?></td>
                        <td><a href="<?php echo site_url('forma/edit/'.$m['forma_id']); ?>" class="btn btn-info btn-xs" title="Modificacar forma"><span class="fa fa-pencil"></span></a> 
                             <!--<a
                                onclick="return confirm('Are you sure You want to delete?')"
                                 href="<?php //echo site_url('forma/remove/'.$m['forma_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

