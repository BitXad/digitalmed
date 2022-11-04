<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Parámetros:</b> Tipo de Prueba</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_prueba/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th></th>
                    </tr>
                    <?php foreach($tipo_prueba as $t){ ?>
                    <tr>
						<td><?php echo $t['tipoprueba_id']; ?></td>
						<td><?php echo $t['tipoprueba_descripcion']; ?></td>
						<td><?php echo $t['tipoprueba_precio']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_prueba/edit/'.$t['tipoprueba_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar</a> 
                            <a href="<?php echo site_url('tipo_prueba/remove/'.$t['tipoprueba_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
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
