<script type="text/javascript">    function imprimirdetalle(){        window.print();    }    function cerrarpestania(){        window.close();    }</script><style>     .borde {        border: 1px solid black;    }    .bordeinferior {        border-bottom: 1px solid black;    }    .bordeizq {        border-left: 1px solid black;    }    .bordeder {        border-right: 1px solid black;    }    #tablahora th{        font-weight: bold;        border: 1px solid #000;        background-color: #ccc;        text-align: center;        padding: 2px;        vertical-align: middle;    }</style><?php    $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta     $ancho = $parametro[0]["parametro_anchofactura"];    $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";    $margen_iz = $parametro[0]["parametro_margenfactura"];        if($paciente["genero_id"] == 1){        $sr  = "Sr.";    }else{        $sr = "Sra.";    }    ?><div class="no-print text-center">    <a class="btn btn-success btn-sm" onclick="imprimirdetalle()"><span class="fa fa-print"></span> Imprimir</a>    <a class="btn btn-danger btn-sm" onclick="cerrarpestania()"><span class="fa fa-times"></span> Cancelar</a></div><table class="table" style="font-family: Arial !important" >    <tr>        <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>"></td>        <td style="width: <?php echo $ancho;?>cm; padding: 0;">            <div class="row table-responsive">                <table style="width: <?php echo $ancho; ?>cm; font-family: Arial;  font-size: 12px;">                    <tr>                        <td>                            <?php                            echo '<img src="'.site_url('/resources/images/logos/logo_icm.png"').' width="100%" />';                            ?>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 12px">                                <!--<tr>                                    <td class="text-bold text-center" colspan="3" style="padding-bottom: 25px">                                        <span style="font-size: 14px"><u>INFORME CLÍNICO MENSUAL</u></span>                                    </td>                                </tr>-->                                <tr>                                    <td class="text-bold text-center" colspan="3" style="padding-bottom: 10px">                                        <!--<span style="font-size: 14px"><u>INFORME CLÍNICO MENSUAL</u></span>-->                                    </td>                                </tr>                                <tr class="text-bold">                                    <td class="text-left">                                        <?php echo $sr." ".$paciente["paciente_apellido"]." ".$paciente["paciente_nombre"]; ?>                                    </td>                                    <td class="text-center">                                        <?php echo "CI: ".$paciente["paciente_ci"]." ".$paciente["extencion_descripcion"]; ?>                                    </td>                                    <td class="text-right">                                        <?php echo "FN: ".date("d/m/Y", strtotime($paciente['paciente_fechanac'])); ?>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" colspan="3" style="padding-top: 15px">                                        <span>Paciente de                                             <?php                                            if($paciente['paciente_fechanac'] != "" && $paciente['paciente_fechanac'] != null && $paciente['paciente_fechanac'] != "0000-00-00"){                                                $fecha_nacimiento = $paciente['paciente_fechanac'];                                                                                                $dia  = date("d", strtotime($informe_mensual["infmensual_fecha"]));                                                $mes  = date("m", strtotime($informe_mensual["infmensual_fecha"]));                                                $anio = date("Y", strtotime($informe_mensual["infmensual_fecha"]));                                                $dianaz=date("d",strtotime($fecha_nacimiento));                                                $mesnaz=date("m",strtotime($fecha_nacimiento));                                                $anionaz=date("Y",strtotime($fecha_nacimiento));                                                //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual                                                if (($mesnaz == $mes) && ($dianaz > $dia)) {                                                    $anio=($anio-1);                                                }                                                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual                                                if ($mesnaz > $mes) {                                                $anio=($anio-1);}                                                                                                 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad                                                $edad=($anio-$anionaz);                                                echo $edad." años de edad, ";                                            }else{ echo 0; }                                            ?>                                        </span>                                        <?php                                        echo $informe_mensual["infmensual_cabecera"];                                        echo " Con requerimiento de tratamiento dialitico desde fecha ";                                        echo date("d/m/Y", strtotime($paciente['registro_iniciohemodialisis']));                                        echo ".";                                        ?>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table class="borde" style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 9px; margin-top: 10px">                                <thead>                                    <tr class="text-bold">                                        <th style="text-align: center !important" class="bordeder">N°</th>                                        <th style="text-align: center !important" class="bordeder">FECHA</th>                                        <th style="text-align: center !important" class="bordeder">PESO<br>INICIAL</th>                                        <th style="text-align: center !important" class="bordeder">PESO<br>FINAL</th>                                        <th style="text-align: center !important" class="bordeder">BALANCE</th>                                        <th style="text-align: center !important" >OBSERVACIONES</th>                                    </tr>                                </thead>                                <tbody>                                    <?php                                    foreach ($sesiones as $sesion) {                                    ?>                                    <tr class="text-center">                                        <td class="borde" style="padding: 2px;"><?php echo $sesion["numeracion"]; ?></td>                                        <td class="borde" style="padding: 2px;"><?php echo date("d/m/Y", strtotime($sesion['sesion_fecha'])); ?></td>                                        <td class="borde" style="padding: 2px;"><?php echo $sesion["sesion_pesoingreso"]; ?></td>                                        <td class="borde" style="padding: 2px;"><?php echo $sesion["sesion_pesoegreso"]; ?></td>                                        <td class="borde" style="padding: 2px;"><?php echo ($sesion["sesion_ultrafilfinal"] > 0) ? "-".number_format($sesion["sesion_ultrafilfinal"], 0, '.', ',') : ""; ?></td>                                        <td class="borde text-left" style="padding: 2px; line-height: 1.2">                                            <?php                                            $tratamiento = "Optimo. recibe:";                                            if($sesion["sesion_eritropoyetina"] != "" && $sesion["sesion_eritropoyetina"] != null && $sesion["sesion_eritropoyetina"] >  0){                                                $eritrop = $sesion["sesion_eritropoyetina"]*4000;                                                $tratamiento .= " Eritropoyetina ".$eritrop." UI.SC.";                                            }                                            if($sesion["sesion_hierroeve"] != "" && $sesion["sesion_hierroeve"] != null && $sesion["sesion_hierroeve"] >  0){                                                $elhierro = $sesion["sesion_hierroeve"]*100;                                                $tratamiento .= ", Hierro ".$elhierro." Mg. ".$sesion["sesion_hierroeve"]." ampolla EV";                                            }                                            if($sesion["sesion_complejobampolla"] != "" && $sesion["sesion_complejobampolla"] != null && $sesion["sesion_complejobampolla"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_complejobampolla"]." amp Complejo B";                                            }                                            if($sesion["sesion_omeprazol"] != "" && $sesion["sesion_omeprazol"] != null && $sesion["sesion_omeprazol"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_omeprazol"]." comp Omeprazol";                                            }                                            if($sesion["sesion_acidofolico"] != "" && $sesion["sesion_acidofolico"] != null && $sesion["sesion_acidofolico"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_acidofolico"]." comp Ac. Fólico";                                            }                                            if($sesion["sesion_calcio"] != "" && $sesion["sesion_calcio"] != null && $sesion["sesion_calcio"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_calcio"]." comp Carbonato de calcio";                                            }                                            if($sesion["sesion_amlodipina"] != "" && $sesion["sesion_amlodipina"] != null && $sesion["sesion_amlodipina"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_amlodipina"]." comp Amlodipina";                                            }                                            if($sesion["sesion_enalpril"] != "" && $sesion["sesion_enalpril"] != null && $sesion["sesion_enalpril"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_enalpril"]." comp Enalapril";                                            }                                            if($sesion["sesion_losartan"] != "" && $sesion["sesion_losartan"] != null && $sesion["sesion_losartan"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_losartan"]." comp Losartan";                                            }                                            if($sesion["sesion_atorvastina"] != "" && $sesion["sesion_atorvastina"] != null && $sesion["sesion_atorvastina"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_atorvastina"]." comp Atorvastatina";                                            }                                            if($sesion["sesion_asa"] != "" && $sesion["sesion_asa"] != null && $sesion["sesion_asa"] >  0){                                                $tratamiento .= ", ".$sesion["sesion_asa"]." comp ASA";                                            }                                            if($sesion["sesion_complejob"] != "" && $sesion["sesion_complejob"] != null && $sesion["sesion_complejob"] >  0){                                                $tratamiento .= " y ".$sesion["sesion_complejob"]." comp Complejo B";                                            }                                            echo $tratamiento;                                            ?>                                        </td>                                    </tr>                                    <?php                                    }                                    ?>                                </tbody>                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 12px; margin: 0px">                                <tr>                                    <td class="text-justify" style="padding-top: 3px">                                        <span>                                            <span class="text-bold">                                                <?php                                                echo "Acceso vascular: ";                                                if($acceso_vascular["avascular_nombre"] == "Fistula"){                                                    echo "Fistula Arterio Venosa - ";                                                }elseif($acceso_vascular["avascular_nombre"] == "Cateter"){                                                    echo "Cateter - ";                                                }                                                echo $acceso_vascular["avascular_detalle"]." ";                                                ?>                                                </span>                                            <?php                                            echo $informe_mensual["infmensual_accesouno"]." Peso seco de ". $peso_seco." Kg. ";                                            ?>                                            <?php                                            echo $informe_mensual["infmensual_accesodos"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" style="padding-top: 3px">                                        <span style="font-size: 12px !important">                                            <?php                                            echo $informe_mensual["infmensual_laboratorio"];                                            ?>                                        </span>                                    </td>                                </tr>                                <?php                                if($informe_mensual["infmensual_paratohormona"] != "" && $informe_mensual["infmensual_paratohormona"] != null){                                ?>                                <tr>                                    <td class="text-justify" style="padding-top: 3px">                                        <span>                                            <?php                                            echo $informe_mensual["infmensual_paratohormona"];                                            ?>                                        </span>                                    </td>                                </tr>                                <?php                                }                                if($informe_mensual["infmensual_glucemia"] != "" && $informe_mensual["infmensual_glucemia"] != null){                                ?>                                <tr>                                    <td class="text-justify" style="padding-top: 3px">                                        <span>                                            <?php                                            echo $informe_mensual["infmensual_glucemia"];                                            ?>                                        </span>                                    </td>                                </tr>                                <?php                                }                                if($informe_mensual["infmensual_firmante"] != "" && $informe_mensual["infmensual_firmante"] != null){                                ?>                                <tr>                                    <td class="text-justify" style="padding-top:6px">                                        <span>                                            <?php                                            echo " ".$informe_mensual["infmensual_firmante"];                                            if($paciente["paciente_nombrefirmante"] != "" && $paciente["paciente_nombrefirmante"] != null){                                                echo $paciente["paciente_nombrefirmante"].", con C.I.: ".$paciente["paciente_cifirmante"];                                            }                                            ?>                                        </span>                                    </td>                                </tr>                                <?php                                }                                ?>                                <tr>                                    <td class="text-justify" style="padding-top: 0px">                                        <span>                                            <?php                                            echo $informe_mensual["infmensual_conclusion"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="text-center" style="padding-top: 30px">                                        <span class="text-bold">                                             <?php                                            $mes =["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];                                            $eldia = date("d", strtotime($informe_mensual['infmensual_fecha']));                                            $elmes = date("m", strtotime($informe_mensual['infmensual_fecha']));                                            $elanio = date("Y", strtotime($informe_mensual['infmensual_fecha']));                                            echo "Cochabamba ".$eldia." de ".$mes[$elmes-1]." del ".$elanio;                                            ?>                                        </span>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                </table>            </div>        </td>    </tr></table>