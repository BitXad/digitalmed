<script type="text/javascript">    function imprimirdetalle(){        window.print();    }    function cerrarpestania(){        window.close();    }</script><style>     .borde {        border: 1px solid black;    }    .bordeinferior {        border-bottom: 1px solid black;    }    .bordeizq {        border-left: 1px solid black;    }    .bordeder {        border-right: 1px solid black;    }    #tablahora th{        font-weight: bold;        border: 1px solid #000;        background-color: #ccc;        text-align: center;        padding: 2px;        vertical-align: middle;    }</style><?php    $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta     $ancho = $parametro[0]["parametro_anchofactura"];    $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";    $margen_iz = $parametro[0]["parametro_margenfactura"];        if($paciente["genero_id"] == 1){        $sr  = "Sr.";    }else{        $sr = "Sra.";    }    ?><div class="no-print text-center">    <a class="btn btn-success btn-sm" onclick="imprimirdetalle()"><span class="fa fa-print"></span> Imprimir</a>    <a class="btn btn-danger btn-sm" onclick="cerrarpestania()"><span class="fa fa-times"></span> Cancelar</a></div><table class="table" >    <tr>        <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>"></td>        <td style="width: <?php echo $ancho;?>cm; padding: 0;">            <div class="row table-responsive">                <table style="width: <?php echo $ancho; ?>cm; font-family: Arial;  font-size: 12px;">                    <tr>                        <td>                            <?php                            echo '<img src="'.site_url('/resources/images/logos/logo.png"').' width="100%" />';                            ?>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 12px">                                <tr>                                    <td class="text-bold text-center" colspan="3" style="padding-bottom: 25px">                                        <span style="font-size: 14px"><u>INFORME MEDICO DE <?php echo $anemia_glicemia["anemiaglic_titulo"]; ?></u></span>                                    </td>                                </tr>                                <tr class="text-bold">                                    <td class="text-left">                                        <?php echo $sr." ".$paciente["paciente_apellido"]." ".$paciente["paciente_nombre"]; ?>                                    </td>                                    <td class="text-center">                                        <?php echo "CI: ".$paciente["paciente_ci"]." ".$paciente["extencion_descripcion"]; ?>                                    </td>                                    <td class="text-right">                                        <?php echo "FN: ".date("d/m/Y", strtotime($paciente['paciente_fechanac'])); ?>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" colspan="3" style="padding-top: 15px">                                        <span>Paciente de                                             <?php                                            if($paciente['paciente_fechanac'] != "" && $paciente['paciente_fechanac'] != null && $paciente['paciente_fechanac'] != "0000-00-00"){                                                $fecha_nacimiento = $paciente['paciente_fechanac'];                                                                                                $dia  = date("d", strtotime($anemia_glicemia["anemiaglic_fecha"]));                                                $mes  = date("m", strtotime($anemia_glicemia["anemiaglic_fecha"]));                                                $anio = date("Y", strtotime($anemia_glicemia["anemiaglic_fecha"]));                                                $dianaz=date("d",strtotime($fecha_nacimiento));                                                $mesnaz=date("m",strtotime($fecha_nacimiento));                                                $anionaz=date("Y",strtotime($fecha_nacimiento));                                                //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual                                                if (($mesnaz == $mes) && ($dianaz > $dia)) {                                                    $anio=($anio-1);                                                }                                                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual                                                if ($mesnaz > $mes) {                                                $anio=($anio-1);}                                                                                                 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad                                                $edad=($anio-$anionaz);                                                $laedad = $edad." años, con diagnostico de  ";                                            }else{ $laedad = ""; }                                            ?>                                        </span>                                        <?php                                            $la_enfermedad = $anemia_glicemia["anemiaglic_enfermedad"];                                            $anemia = str_replace("<p>", "", $la_enfermedad);                                            $anemia = str_replace('<p style="text-align:justify">', "", $anemia);                                            $anemia = str_replace("</p>", "", $anemia);                                            echo $laedad." <span>".$anemia."</span>";                                        ?>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                    <tr>                        <td>                            <table style="width: <?php echo $ancho; ?>cm; font-family: Arial; font-size: 12px; margin: 0px">                                                                <tr>                                    <td class="text-justify" style="padding-top: 15px">                                        <span>                                            <?php                                            echo $anemia_glicemia["anemiaglic_diagnostico"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" style="padding-top: 20px">                                        <span class="text-bold">Paciente con reporte de laboratorio:</span>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" style="padding-top: 10px">                                        <span>                                            <?php                                            echo "<span class='text-bold'>Hemoglobina: </span>".$anemia_glicemia["anemiaglic_hemoglobina"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" style="padding-top: 10px">                                        <span>                                            <?php                                            echo "<span class='text-bold'>Hematocrito: </span>".$anemia_glicemia["anemiaglic_hematocrito"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr>                                    <td class="text-justify" style="padding-top: 15px">                                        <span>                                            <?php                                            echo $anemia_glicemia["anemiaglic_administra"];                                            ?>                                        </span>                                    </td>                                </tr>                                <tr><td><br><br><br><br><br><br><br><br><br><br><br><br></td></tr>                                <tr>                                    <td class="text-center" style="padding-top: 30px">                                        <span class="text-bold">                                             <?php                                            $mes =["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];                                            $eldia = date("d", strtotime($anemia_glicemia['anemiaglic_fecha']));                                            $elmes = date("m", strtotime($anemia_glicemia['anemiaglic_fecha']));                                            $elanio = date("Y", strtotime($anemia_glicemia['anemiaglic_fecha']));                                            echo "Cochabamba ".$eldia." de ".$mes[$elmes-1]." del ".$elanio;                                            ?>                                        </span>                                    </td>                                </tr>                            </table>                        </td>                    </tr>                </table>            </div>        </td>    </tr></table>