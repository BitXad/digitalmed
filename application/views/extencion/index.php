<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="box-header">
    <font size='4' face='Arial'><b>Extensión C.I.</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($extencion); ?></font>
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <!--<h3 class="box-title">Extencion Listing</h3>-->
            	<div class="box-tools">
                    <a href="<?php echo site_url('extencion/add'); ?>" class="btn btn-success btn-xs">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Descripcion</th>
						<th></th>
                    </tr>
                    <?php foreach($extencion as $e){ ?>
                    <tr>
						<td><?php echo $e['extencion_id']; ?></td>
						<td><?php echo $e['extencion_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('extencion/edit/'.$e['extencion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar</a> 
                            <a href="<?php echo site_url('extencion/remove/'.$e['extencion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
