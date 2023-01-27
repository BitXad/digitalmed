<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="box-header">
    <div class="text-center"><h3 class="box-title text-bold">Modificar Planilla Oral y Endovenosa</h3></div>
    <span class="box-title"><b>Paciente: </b><?php echo $paciente["paciente_apellido"]." ".$paciente["paciente_nombre"] ?></span><br>
    <span><b>Mes: </b><?php echo $paciente["tratamiento_mes"]; ?></span>&nbsp;&nbsp;&nbsp;
    <span><b>Gestion: </b><?php echo $paciente["tratamiento_gestion"]; ?></span>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                
                <?php
                echo form_open('sesion/oralendovenosa/'.$tratamiento_id);
                ?>
                    <div class="box-body">
                        <div class="row clearfix">
                            <table class="table table-striped" id="mitabla">
                                <thead>
                                <tr>
                                    <th colspan="6">PLANILLA ENDOVENOSA</th>
                                </tr>
                                <tr>
                                    <th># SESION</th>
                                    <th>FECHA<br>SESION</th>
                                    <th>ERITROPOYETINA<br>(0-1)</th>
                                    <th>HIERRO E.V.<br>(0-1)</th>
                                    <th>COMPLEJO B<br>(0-1)</th>
                                    <th>COSTO</th>
                                </tr>
                                </thead>
                                <tbody class="buscar" id="tablaresultadosoral">
                        <?php
                        foreach($sesiones  as $sesion){
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $sesion['numeracion']; ?></td>
                                    <td class="text-center"><?php echo date("d/m/Y", strtotime($sesion['sesion_fecha'])); ?></td>
                                    <td>
                                        <input type="number" min="0" name="sesion_eritropoyetina<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_eritropoyetina']; ?>" class="form-control" id="sesion_eritropoyetina<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_hierroeve<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_hierroeve']; ?>" class="form-control" id="sesion_hierroeve<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_complejobampolla<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_complejobampolla']; ?>" class="form-control" id="sesion_complejobampolla<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" step="any" name="sesion_costosesion<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_costosesion']; ?>" class="form-control" id="sesion_costosesion<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                </tr>
                        <?php
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row clearfix">
                            <table class="table table-striped" id="mitabla">
                                <thead>
                                <tr>
                                    <th colspan="11">PLANILLA ORAL</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA<br>SESION</th>
                                    <th>Omeprazol<br>20 Mg.</th>
                                    <th>Ac. Folico<br>5Mg.</th>
                                    <th>Calcio Carbonato<br>1.5Gr./Calcitrol<br>0.25 mcg.</th>
                                    <th>Amlodipina<br>10 mg</th>
                                    <th>Enalapril<br>10 mg</th>
                                    <th>Losartan<br>50 mg</th>
                                    <th>Atorvastatina<br>10 mg</th>
                                    <th>ASA<br>100 mg</th>
                                    <th>Complejo<br>B</th>
                                </tr>
                                </thead>
                                <tbody class="buscar" id="tablaresultadosendovenosa">
                        <?php
                        foreach($sesiones  as $sesion){
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $sesion['numeracion']; ?></td>
                                    <td class="text-center"><?php echo date("d/m/Y", strtotime($sesion['sesion_fecha'])); ?></td>
                                    <td>
                                        <input type="number" min="0" name="sesion_omeprazol<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_omeprazol']; ?>" class="form-control" id="sesion_omeprazol<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_acidofolico<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_acidofolico']; ?>" class="form-control" id="sesion_acidofolico<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_calcio<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_calcio']; ?>" class="form-control" id="sesion_calcio<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_amlodipina<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_amlodipina']; ?>" class="form-control" id="sesion_amlodipina<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_enalpril<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_enalpril']; ?>" class="form-control" id="sesion_enalpril<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_losartan<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_losartan']; ?>" class="form-control" id="sesion_losartan<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_atorvastina<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_atorvastina']; ?>" class="form-control" id="sesion_atorvastina<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_asa<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_asa']; ?>" class="form-control" id="sesion_asa<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" name="sesion_complejob<?php echo $sesion['sesion_id']; ?>" value="<?php echo $sesion['sesion_complejob']; ?>" class="form-control" id="sesion_complejob<?php echo $sesion['sesion_id']; ?>" />
                                    </td>
                                </tr>
                        <?php
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Guardar
                        </button>
                        <a href="<?php echo site_url('sesion/sesiones/'.$sesion['tratamiento_id']); ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Cancelar</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
