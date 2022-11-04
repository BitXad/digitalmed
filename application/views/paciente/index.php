<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

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
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Estado</th>
						<th>Genero</th>
						<th>Ext</th>
						<th>Edad</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>CI</th>
						<th></th>
                    </tr>
                    <?php foreach($paciente as $p){ ?>
                    <tr>
						<td><?php echo $p['paciente_id']; ?></td>
						<td><?php echo $p['estado_id']; ?></td>
						<td><?php echo $p['genero_id']; ?></td>
						<td><?php echo $p['extencion_id']; ?></td>
						<td><?php echo $p['paciente_edad']; ?></td>
						<td><?php echo $p['paciente_nombre']; ?></td>
						<td><?php echo $p['paciente_direccion']; ?></td>
						<td><?php echo $p['paciente_ci']; ?></td>
						<td>
                            <a href="<?php echo site_url('paciente/edit/'.$p['paciente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar</a> 
                            <a href="<?php echo site_url('paciente/remove/'.$p['paciente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
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
