<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="box-header">
    <font size='4' face='Arial'><b>GENERO</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($genero); ?></font>
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <!--<h3 class="box-title">Genero Listing</h3>-->
            	<div class="box-tools">
                    <a href="<?php echo site_url('genero/add'); ?>" class="btn btn-success btn-xs">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Genero</th>
						<th> </th>
                    </tr>
                    <?php foreach($genero as $g){ ?>
                    <tr>
						<td><?php echo $g['genero_id']; ?></td>
						<td><?php echo $g['genero_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('genero/edit/'.$g['genero_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar</a> 
                            <a href="<?php echo site_url('genero/remove/'.$g['genero_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
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
