<script src="<?php echo base_url('resources/js/medinsumos.js'); ?>" type="text/javascript"></script><input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" /><input type="hidden" name="sesiones" id="sesiones" value='<?php echo json_encode($sesiones); ?>' /><input type="hidden" name="medicamento_insumo" id="medicamento_insumo" value='<?php echo json_encode($medicamento_insumo); ?>' /><script type="text/javascript">    function imprimirdetalle(){        window.print();    }    function cerrarpestania(){        window.close();    }</script><style>     .borde {        border: 1px solid black;    }    .borde_saltado {        border: 1px dashed black;    }    .bordesuperior {        border-top: 1px solid black;    }    .bordeinferior {        border-bottom: 1px solid black;    }    .bordeizq {        border-left: 1px solid black;    }    .bordeder {        border-right: 1px solid black;    }    #tablahora th{        font-weight: bold;        border: 1px solid #000;        background-color: #ccc;        text-align: center;        padding: 2px;        vertical-align: middle;    }</style><?php    $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta     $ancho = $parametro[0]["parametro_anchofactura"];    $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";    $margen_iz = $parametro[0]["parametro_margenfactura"];?><div class="no-print text-center">    <a class="btn btn-success btn-sm" onclick="imprimirdetalle()"><span class="fa fa-print"></span> Imprimir</a>    <a class="btn btn-danger btn-sm" onclick="cerrarpestania()"><span class="fa fa-times"></span> Cancelar</a></div><table class="table" >    <tr>        <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>"></td>        <td style="width: <?php echo $ancho;?>cm; padding: 0;">            <div class="row table-responsive">                <table style="width: <?php echo $ancho; ?>cm; font-family: Arial;  font-size: 12px;">                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 12px">                                <tr>                                    <td class="text-bold text-center" colspan="3" style="padding-bottom: 15px">                                        <span style="font-size: 14px">MEDICAMENTOS E INSUMOS MEDICOS OTORGADOS Y AUTORIZADOS</span>                                        <br>                                        <span style="font-size: 9px">ATENCION AMBULATORIA HEMODIALISIS</span>                                        <div class="col-md-12 text-center no-print" id="loader" style="display:block;">                                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>" />                                        </div>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 9px">                                <tr>                                    <td class="bordeizq bordesuperior bordeinferior" style="width: 2cm; padding-left: 2px">                                        <span>SEDES:</span>                                    </td>                                    <td class="bordeder bordesuperior bordeinferior" colspan="9">                                        <span>COCHABAMBA</span>                                    </td>                                    <td class="bordesuperior"></td>                                    <td class="bordesuperior" colspan="6">                                        <span>SALUD INTEGRAL LEY 1152</span>                                    </td>                                    <td class="borde text-center">                                        <span>X</span>                                    </td>                                </tr>                                <tr>                                    <td class="bordeizq" style="padding-left: 2px">                                        <span>MUNICIPIO:</span>                                    </td>                                    <td class="bordeder" colspan="9">                                        <span>CERCADO</span>                                    </td>                                    <td></td>                                    <td colspan="3">                                        <span>PROGRAMAS:</span>                                    </td>                                    <td class="borde" colspan="4">                                        <span></span>                                    </td>                                </tr>                                <tr>                                    <td class="bordeizq bordesuperior" style="padding-left: 2px">                                        <span>ESTABLECIMIENTO:</span>                                    </td>                                    <td class="bordeder bordesuperior" colspan="9">                                        <span>CENTRO DE HEMODIALISIS DR. JOSE ENRIQUE GUTIERREZ MENDEZ</span>                                    </td>                                    <td class="text-right" colspan="7" style="padding-right: 2px">                                        <span>VENTA</span>                                    </td>                                    <td class="borde text-center">                                        <span>X</span>                                    </td>                                </tr>                                <tr>                                    <td class="bordeizq bordesuperior" colspan="2" style="padding-left: 2px">                                        <span>TIPO DE ATENCION EN CONSULTORIO:</span>                                    </td>                                    <td class="bordeizq bordeder bordesuperior" style="padding-left: 2px">                                        <span>AMBULATORIA</span>                                    </td>                                    <td class="bordeder bordesuperior text-center" style="padding-left: 2px; padding-right: 2px">                                        <span>X</span>                                    </td>                                    <td class="bordeder bordesuperior" colspan="2" style="padding-left: 2px">                                        <span>INTERNACION EN TRANSITO</span>                                    </td>                                    <td class="bordeder bordesuperior">                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>                                    </td>                                    <td class="bordeder bordesuperior text-right" colspan="2" style="padding-right: 2px">                                        <span>REFERENCIA</span>                                    </td>                                    <td class="bordeder bordesuperior">                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>                                    </td>                                    <td></td>                                    <td colspan="2" class="text-right" style="padding-right: 2px">                                        <span>H. CLINICA</span>                                    </td>                                    <td class="borde" colspan="5">                                        <span></span>                                    </td>                                </tr>                                <tr>                                    <td class="bordesuperior bordeinferior bordeizq" colspan="10"  style="padding-left: 2px">                                        <span>NOMBRE DEL PACIENTE:</span>&nbsp;&nbsp;                                        <span><?php echo $paciente["paciente_nombre"]." ".$paciente["paciente_apellido"]; ?></span>                                    </td>                                    <td class="borde" colspan="4" style="padding-left: 2px">                                        <span>FECHA DE NACIMIENTO</span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span><?php echo date("d", strtotime($paciente["paciente_fechanac"]));  ?></span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span><?php echo date("m", strtotime($paciente["paciente_fechanac"]));  ?></span>                                    </td>                                    <td class="borde text-center" colspan="2" style="padding-left: 2px; padding-right: 2px">                                        <span><?php echo date("Y", strtotime($paciente["paciente_fechanac"]));  ?></span>                                    </td>                                </tr>                                <tr>                                    <td class="borde" colspan="5" style="padding-left: 2px">                                        <span>DOMICILIO:</span>&nbsp;&nbsp;                                        <span><?php echo $paciente["paciente_direccion"]; ?></span>                                    </td>                                    <td class="borde text-center">                                        <span>EDAD:</span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span>                                            <?php                                            if($paciente['paciente_fechanac'] != "" && $paciente['paciente_fechanac'] != null && $paciente['paciente_fechanac'] != "0000-00-00"){                                                $fecha_nacimiento = $paciente['paciente_fechanac'];                                                                                                $elanio = $tratamiento["tratamiento_gestion"];                                                $estemes = $tratamiento["tratamiento_mes"];                                                $losmeses =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];                                                $elmes = "";                                                for ($i = 0; $i < 12; $i++) {                                                    if($losmeses[$i] == $estemes){                                                        $elmes = ($i+1);                                                        break;                                                    }                                                }                                                if($elmes <10){                                                    $elmes = "0".$elmes;                                                }                                                $lafecha = $elanio."-".$elmes."-05";                                                                                                $ultimo_diames = new DateTime($lafecha);                                                 $dia  =  $ultimo_diames->format( 't' );                                                $mes  =  $ultimo_diames->format( 'm' );                                                $anio =  $ultimo_diames->format( 'Y' );                                                                                                $dianaz=date("d",strtotime($fecha_nacimiento));                                                $mesnaz=date("m",strtotime($fecha_nacimiento));                                                $anionaz=date("Y",strtotime($fecha_nacimiento));                                                //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual                                                if (($mesnaz == $mes) && ($dianaz > $dia)) {                                                    $anio=($anio-1);                                                }                                                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual                                                if ($mesnaz > $mes) {                                                $anio=($anio-1);}                                                 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad                                                $edad=($anio-$anionaz);                                                echo $edad;                                            }else{ echo 0; }                                            ?></span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span>SEXO:</span>                                    </td>                                    <td class="borde text-right" style="padding-left: 2px; padding-right: 2px">                                        <span>M</span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span>                                            <?php                                            if($paciente["genero_id"] == 1){                                                echo "X";                                            }else{ echo "&nbsp;&nbsp;&nbsp;&nbsp;"; }                                            ?>                                        </span>                                    </td>                                    <td class="borde text-right" style="padding-left: 2px; padding-right: 2px">                                        <span>F</span>                                    </td>                                    <td class="borde text-center" style="padding-left: 2px; padding-right: 2px">                                        <span>                                            <?php                                            if($paciente["genero_id"] == 2){                                                echo "X";                                            }else{ echo "&nbsp;&nbsp;&nbsp;&nbsp;"; }                                            ?>                                        </span>                                    </td>                                    <td class="borde text-right" colspan="2" style="padding-left: 2px; padding-right: 2px">                                        <span>GESTION</span>                                    </td>                                    <td class="borde text-center" colspan="4">                                        <span class="text-bold"><?php echo $tratamiento["tratamiento_gestion"]; ?></span>                                    </td>                                </tr>                                <tr>                                    <td class="borde" colspan="12" style="padding-left: 2px">                                        <span>DIAGNOSTICO:</span>&nbsp;&nbsp;                                        <span>ERC ESTADIO V - <?php echo $registro["registro_diagnostico"]; ?></span>                                    </td>                                    <td class="borde text-right" colspan="2" style="padding-left: 2px; padding-right: 2px">                                        <span>MES</span>                                    </td>                                    <td class="borde text-center" colspan="4">                                        <span class="text-bold"><?php echo $tratamiento["tratamiento_mes"]; ?></span>                                    </td>                                </tr>                                <tr>                                    <?php                                    $num_sesiones = sizeof($sesiones);                                    ?>                                    <td class="borde text-center" colspan="3" rowspan="3">                                        <span>TIPO DE PROCEDIMIENTO</span>                                    </td>                                    <td class="borde text-center" colspan="11">                                        <span>Hemodialisis con cateter (por sesion)</span>                                    </td>                                    <td class="borde text-center text-bold" colspan="4">                                        <span style="font-size: 10px">                                            <?php                                            if($sesiones[$num_sesiones-1]["sesion_cateter"] != "" && $sesiones[$num_sesiones-1]["sesion_cateter"] != null){                                                echo $num_sesiones;                                            }                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="borde text-center" colspan="11">                                        <span>Hemodialisis con fistula arterio venosa (por sesion)</span>                                    </td>                                    <td class="borde text-center text-bold" colspan="4">                                        <span style="font-size: 10px">                                            <?php                                            if($sesiones[$num_sesiones-1]["sesion_fistula"] != "" && $sesiones[$num_sesiones-1]["sesion_fistula"] != null){                                                echo $num_sesiones;                                            }                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="borde text-center" colspan="11">                                        <span>Hemodialisis en casos agudos (por sesion)</span>                                    </td>                                    <td class="borde text-center text-bold" colspan="4">                                        <span style="font-size: 10px"></span>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table class="borde" style="width: <?php echo $ancho; ?>cm; font-family: Arial; margin-top: 1px">                                <thead>                                    <tr class="text-center" style="font-size: 8px">                                        <?php                                        $num_sesion = sizeof($sesiones)                                        ?>                                        <th class="borde" style="text-align: center !important" colspan="4">MEDICAMENTOS E INSUMOS</th>                                        <th class="borde" style="text-align: center !important" colspan="<?php echo ($num_sesion+1); ?>">FECHAS SESIONES</th>                                        <th class="borde" style="text-align: center !important" colspan="2">CANTIDAD</th>                                    </tr>                                    <tr style="font-size: 7px">                                        <th class="borde" style="text-align: center !important">No</th>                                        <th class="borde" style="text-align: center !important; width: 4cm">MEDICAMENTOS E INSUMOS</th>                                        <th class="borde" style="text-align: center !important">FORMA<br>FARMACEUTICA</th>                                        <th class="borde" style="text-align: center !important; font-size: 8px">CONCENTRACION</th>                                        <?php                                        foreach ($sesiones as $sesion) {                                           echo "<th class='borde' style='font-size: 8px; padding-left: 1px; padding-right: 1px'>";                                           echo date("d/m", strtotime($sesion['sesion_fecha']));                                           echo "</th>";                                        }                                        ?>                                        <th class="borde">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>                                        <th class="borde">RECETADO</th>                                        <th class="borde">DISPENSADO</th>                                    </tr>                                </thead>                                <tbody id="tablamedicamentosinsumos"></tbody>                                    <?php                                    /*foreach ($medicamento_insumo as $medi) {                                    ?>                                    <tr style="font-size: 7.5px">                                        <td class="borde text-center"><?php echo $medi['medicamento_id']; ?></td>                                        <td class="borde"><?php echo $medi['medicamento_nombre']; ?></td>                                        <td class="borde"><?php echo $medi['medicamento_forma']; ?></td>                                        <td class="borde"><?php echo $medi['medicamento_concentracion']; ?></td>                                        <?php                                        foreach ($sesiones as $sesion) {                                                                                    }                                        ?>                                    </tr>                                    <?php                                    }*/                                    ?>                                <!--</tbody>-->                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 10px; margin-top: 15px !important">                                <tr>                                    <td colspan="4"><br><br><br><br><br></td>                                </tr>                                <tr>                                    <?php                                    $al_nivel = "";                                    if($paciente["paciente_nombrefirmante"] != "" && $paciente["paciente_nombrefirmante"] != null){                                        $al_nivel = "<br><br><br>";                                    }                                    ?>                                    <td style="text-align: center;" colspan="2">                                        <br>                                        <br>                                        ____________________________<br>                                        <span class="text-bold">MEDICO<br>&nbsp;</span>                                        <?php echo $al_nivel; ?>                                    </td>                                    <td style="text-align: center;" colspan="2">                                                           <br>                                        <br>                                        ____________________________<br>                                        <span class="text-bold">Dispensado por:<br>Sello y firma</span>                                        <?php echo $al_nivel; ?>                                    </td>                                    <td class="borde_saltado" style="width: 2cm">                                        <br>                                        <br>                                        <br>                                    </td>                                    <td style="text-align: center;" colspan="2">                                                           <br>                                        <br>                                        ____________________________<br>                                        <span class="text-bold">Nombre y Firma del(la)<br>Paciente/Acompañante</span>                                        <?php                                        if($paciente["paciente_nombrefirmante"] != "" && $paciente["paciente_nombrefirmante"] != null){                                            echo "<br>".$paciente["paciente_nombrefirmante"]."<br>C.I.: ".$paciente["paciente_cifirmante"];                                        }                                        ?>                                    </td>                                </tr>                                <tr>                                    <td colspan="4" style="font-size: 8px">                                            El prescriptor y dispensador certifican la veracidad de la información declarada en  este documento médico legal<br>                                            El usuario certifica haber recibido  los medicamentos señalados en este documento médico legal                                    </td>                                </tr>                            </table>                        </td>                    </tr>                </table>            </div>        </td>    </tr></table>