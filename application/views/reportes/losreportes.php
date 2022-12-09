<script src="<?php echo base_url('resources/js/losreportes.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />



<input type="hidden" name="elpaciente" id="elpaciente" />
<input type="hidden" name="paciente_id" id="paciente_id" />

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

<div class="box-header">
    <font size='3' face='Arial'><b>REPORTE DE SESIONES</b></font>
    <div class="text-center">
        <font size='3' face='Arial'><b><span id="nombre_paciente">-</span></b></font>
    </div>
    <div>
        C.I.: <span id="ci_paciente">-</span><br>
        Telef.: <span id="telefono_paciente">-</span><br>
        Dirección: <span id="direccion_paciente">-</span>
    </div>
    <div id="reporte_elegido" style="display: none">
        <b>Gestión: </b><span id="reporte_gestion">-</span><br>
        <b>Mes: </b><span id="reporte_mes">-</span><br>
        <b>Numero: </b><span id="sesion_numero">-</span>
    </div>
    <font size='2' face='Arial'>Registros Encontrados: <span id="encontrados"></span></font>
</div>
<div class="col-md-12 text-center" id="los_reportes" style="padding-bottom: 3px; display:none;">
    <div class="col-md-2">
        <span id="planilla_oral"></span>
        <!--<a style="width: 150px; height: 50px;" href="<?php //echo site_url('reportes/reportesesiones/'.$tratamiento_id); ?>" target="_blank" class="btn btn-facebook btn-xs" title="Planilla oral y EV">
            <span class="fa fa-file-text fa-2x"></span><br> Planilla oral y EV
        </a>-->
    </div>
    <div class="col-md-2">
        <span id="informe_cmensual"></span>
        <!--<a style="width: 150px; height: 50px;" href="<?php //echo site_url('reportes/informecmensual/2'); ?>" target="_blank" class="btn btn-dropbox btn-xs" title="Informe clinico mensual">
            <span class="fa fa-calendar fa-2x"></span><br> Informe Clinico Mensual
        </a>-->
    </div>
    <div class="col-md-2" id="el_certificadomedico" style="display: none">
        <span id="certificadom_mensual"></span>
        <!--<a style="width: 150px; height: 50px;" href="<?php //echo site_url('reportes/certificadomedico/2'); ?>" target="_blank" class="btn btn-google btn-xs" title="Certificado medico mensual">
            <span class="fa fa-calendar fa-2x"></span><br> Certificado Medico Mensual
        </a>-->
    </div>
    <div class="col-md-2">
        <span id="detalle_procedimiento"></span>
        <!--<a style="width: 150px; height: 50px;" href="<?php //echo site_url('reportes/detalle_procedimiento/15'); ?>" target="_blank" class="btn btn-success btn-xs" title="Detalle de procedimiento de hemodialisis">
            <span class="fa fa-file-text-o fa-2x"></span><br> Detalle del Procedimiento
        </a>-->
    </div>
    <div class="col-md-2">
        <span id="medicamentos_einsumos"></span>
        <!--<a style="width: 150px; height: 50px;" href="<?php //echo site_url('reportes/medinsumos/2'); ?>" target="_blank" class="btn btn-dropbox btn-xs" title="Medicamentos e insumos medicos otorgados y autorizados">
            <span class="fa fa-file-text-o fa-2x"></span><br> Medicamentos e insumos
        </a>-->
    </div>
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
