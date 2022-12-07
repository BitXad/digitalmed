<script src="<?php echo base_url('resources/js/losreportes.js'); ?>" type="text/javascript"></script>
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

<!------------------------ INICIO modal para Registrar nuevas sesiones ------------------->
<div class="modal fade" id="modal_unanuevasesion" tabindex="-1" role="dialog" aria-labelledby="modal_unanuevasesionlabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #00ca6d">
                <b style="color: white;">GENERAR SESIONES NUEVAS</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center" id="loadernuevo" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_mes" class="control-label">Mes</label>
                    <div class="form-group">
                        <span id="elmes"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tratamiento_gestion" class="control-label">Gestión</label>
                    <div class="form-group">
                        <span id="lagestion"></span>
                    </div>
                </div>
                <div class="col-md-4 hidden">
                    <label for="tratamiento_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="tratamiento_fecha" class="form-control" id="tratamiento_fecha" />
                    </div>
                </div>
                <div class="col-md-4 hidden">
                    <label for="tratamiento_hora" class="control-label">Hora</label>
                    <div class="form-group">
                        <input type="time" name="tratamiento_hora" value="0" class="form-control" id="tratamiento_hora"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_fechainicio" class="control-label">Fecha Inicio de Sesion</label>
                    <div class="form-group">
                        <input type="date" name="sesion_fechainicio" class="form-control" id="sesion_fechainicio" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_numero" class="control-label">Nº Sesiones</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_numero" value="0" class="form-control" id="sesion_numero" onclick="this.select();" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_eritropoyetina" class="control-label">Eritropoyetina</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_eritropoyetina" class="form-control" id="sesion_eritropoyetina" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_hierroev" class="control-label">Hierro E.V. (100 Mg)</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_hierroev" class="form-control" id="sesion_hierroev" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_complejobampolla" class="control-label">Complejo B</label>
                    <div class="form-group">
                        <input type="number" min="0" name="sesion_complejobampolla" class="form-control" id="sesion_complejobampolla" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sesion_costosesion" class="control-label">Costo Sesión</label>
                    <div class="form-group">
                        <input type="number" min="0" step="any" name="sesion_costosesion" class="form-control" id="sesion_costosesion" onclick="this.select();" />
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="col-md-12">
                <button type="button" class="btn btn-success" onclick="generar_nuevas_sesiones()"><fa class="fa fa-floppy-o"></fa> Registrar Sesiones</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmodal"><fa class="fa fa-times"></fa> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para Registrar nuevas sesiones ------------------->

<!--<div>
    <a href="<?php //echo base_url("registro/registros/".$paciente["paciente_id"]); ?>" class="btn btn-danger">
        <i class="fa fa-reply"></i> Registros
    </a>
</div>-->