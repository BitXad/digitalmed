<div class="box-header">
    <h3 class="box-title">Generar Sesiones</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('registro/add'); ?>" class="btn btn-success btn-sm">Nuevas Sesiones</a> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>FECHA SESION</th>
                        <th>ERITROPOYETINA</th>
                        <th>HIERRO E.V.</th>
                        <th>COMPEJO B</th>
                        <th>COSTO SESION</th>
                    </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultados">
                    <?php
                    for ($i = 1; $i <= 13; $i++) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td>
                                <input type="date" name="sesion<?php echo $i; ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="sesion<?php echo $i; ?>" />
                            </td>
                            <td>
                                <input type="date" name="sesion<?php echo $i; ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="sesion<?php echo $i; ?>" />
                            </td>
                            <td>
                                <input type="date" name="sesion<?php echo $i; ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="sesion<?php echo $i; ?>" />
                            </td>
                            <td>
                                <input type="date" name="sesion<?php echo $i; ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="sesion<?php echo $i; ?>" />
                            </td>
                            <td>
                                <input type="date" name="sesion<?php echo $i; ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="sesion<?php echo $i; ?>" />
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!------------------------ INICIO modal para Generar nuevas sesiones ------------------->
<div class="modal fade" id="modalanular_noenviada" tabindex="-1" role="dialog" aria-labelledby="modalanularlabel" style="font-family: Arial; font-size: 10pt;">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #edb62b">
                <b style="color: white;">ANULAR FACTURA NO ENVIADA</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="factura_numero" class="control-label">ADVERTENCIA: Esta a punto de anular la factura no enviada!.</label>
                </div>
                <div class="col-md-12 text-center" id="loadermal" style="display:none;">
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />
                </div>
                  <input type="hidden" name="facturamal_id" value="00" class="form-control" id="facturamal_id" readonly="true" />
                  <input type="hidden" name="ventamal_id" value="00" class="form-control" id="ventamal_id" readonly="true" />

                <div class="col-md-4">
                    <label for="facturamal_numero" class="control-label">Factura Nº</label>
                    <div class="form-group">
                        <input type="input" name="facturamal_numero" value="00" class="form-control" id="facturamal_numero" readonly="true"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="facturamal_monto" class="control-label">Monto</label>
                    <div class="form-group">
                        <input type="input" name="facturamal_monto" value="0.00" class="form-control" id="facturamal_monto" readonly="true"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="facturamal_fecha" class="control-label">Fecha</label>
                    <div class="form-group">
                        <input type="input" name="facturamal_fecha" value="0.00" class="form-control" id="facturamal_fecha" readonly="true"/>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="facturamal_cliente" class="control-label">Cliente</label>
                    <div class="form-group">
                        <input type="input" name="facturamal_cliente" value="-" class="form-control" id="facturamal_cliente" readonly="true"  />
                    </div>
                </div>
                <!--<div class="col-md-12">
                    <label for="facturamal_correo" class="control-label">Correo Electrónico</label>
                    <div class="form-group">
                        <input type="input" name="facturamal_correo" value="-" class="form-control" id="facturamal_correo" />
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="dosificacion_nitemisor" class="control-label">Motivo Anulación</label>
                    <div class="form-group">

                        <select id="motivo_anulacion" class="form-control">

                            <?php /* foreach ($motivos as $motivo) {?>

                                <option value="<?= $motivo['cma_id']; ?>"><?= $motivo['cma_descripcion']; ?></option>

                            <?php } */ ?>

                        </select>

                    </div>
                </div>-->
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-success" onclick="anular_factura_electronica_malemitida()"><fa class="fa fa-floppy-o"></fa> Anular Factura</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrarmal"><fa class="fa fa-times"></fa> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para confirmar anulacion de factura no enviada------------------->
