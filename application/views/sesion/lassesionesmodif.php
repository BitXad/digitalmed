<script src="<?php echo base_url('resources/js/lassesionesmodif.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="elpaciente" id="elpaciente" />
<input type="hidden" name="paciente_id" id="paciente_id" />

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--------------------------------------------------------> 

<div class="box-header">
    <font size='3' face='Arial'><b>REGISTRO DE SESIONES</b></font>
    <div class="text-center">
        <font size='3' face='Arial'><b><span id="nombre_paciente">-</span></b></font>
    </div>
    <div>
        C.I.: <span id="ci_paciente">-</span><br>
        Telef.: <span id="telefono_paciente">-</span><br>
        Dirección: <span id="direccion_paciente">-</span>
    </div>
    <font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
</div>
<div class="col-md-8"  style="padding: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, carnet.." onkeypress="buscarpaciente(event)" autocomplete="off" autofocus="true">
        <div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="mostrar_tablapacientes()" title="Buscar"><span class="fa fa-search"></span></div>
    </div>
</div>
<div class="col-md-12 text-center" id="loader" style="display:none;">
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
</div>
<div class="row">
    <div class="col-md-12">
        <span id="tablaresultadospaciente"></span>
        <span id="tablaresultadostratamiento"></span>
        <!--<div class="box">-->
            <!--<div class="box-body table-responsive no-padding">-->
                <!--<table id="mitabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>APELLIDO</th>
                            <th>NOMBRE</th>
                            <th>CI</th>
                            <th>DIRECCION</th>
                            <th>TELEFONO</th>
                            <th>CELULAR</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultadospaciente"></tbody>-->
                    <!--<tbody>-->
                    <?php
                    /*$i=1;
                    foreach($tratamiento as $t){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_mes']; ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_gestion']; ?></td>
                            <td class="text-center"><?php echo date("d/m/Y", strtotime($t['tratamiento_fecha'])); ?></td>
                            <td class="text-center"><?php echo $t['tratamiento_hora']; ?></td>
                            <td><a href="<?php echo site_url('tratamiento/edit/'.$t['tratamiento_id']); ?>" class="btn btn-info btn-xs" title="Modificar registro"><span class="fa fa-pencil"></span></a>
                                <a href="<?php echo site_url('sesion/sesiones/'.$t['tratamiento_id']); ?>" class="btn btn-success btn-xs" title="Sesiones"><span class="fa fa-list "></span></a> 
                                <a href="<?php echo site_url('reportes/reportesesiones/'.$t['tratamiento_id']); ?>" class="btn btn-facebook btn-xs" title="Reporte de Sesiones"><span class="fa fa-file-text"></span></a>
                            </td>
                        </tr>
                    <?php
                    }*/
                    ?>
                    <!--</tbody>-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</div>
