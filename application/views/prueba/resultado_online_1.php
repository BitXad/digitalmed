    
<script type="text/javascript">
    $(document).ready(function()
   {
        window.onload = window.print();
    });

function cerrar(){

ventana=window.self;
ventana.opener=window.self;
ventana.close(); 
}
</script>
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>



<style type="text/css">

p {
    font-family: Arial;
    font-size: 7pt;
    line-height: 120%;   /*esta es la propiedad para el interlineado*/
    color: #000;
    padding: 10px;
}

div {
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
margin-left: 10px;
margin: 0px;
}


table{
width : 7cm;
margin : 0 0 0px 0;
padding : 0 0 0 0;
border-spacing : 0 0;
border-collapse : collapse;
font-family: Arial;
font-size: 8pt;  

td {
border:hidden;
}
}

td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 8px;
margin : 0 0 0 0;
padding : 0 5px 0 5px;
border-left : 1px solid #aaa;
border-right : 1px solid #aaa;
border-bottom : 1px solid #aaa;
}
</style>




<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->
<?php $tipo_factura = 15; //15 tamaño carta 
      $ancho = "17cm";
      $alto = "0cm";
      $margen_izquierdo = "2cm";
?>

<div class=" table-responsive" style="padding: 0; margin-top: 0;">
    
<table class="table" style="padding:0;">
    
    
<tr>
    <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>">
        
    </td>
    
    
    <td style="line-height: 15px; width: <?php echo $ancho; ?>">
        <table style="width: <?php echo $ancho; ?>">
            <tr>
                
                <td>
                    <img src="<?php echo base_url("resources/img/logo.jpg"); ?>" width="200" height="70" >
                </td>
                <td>
                    <center>
                            <?php echo $empresa["empresa_nombre"]; ?>
                            <br>Dirección: <?php echo $empresa["empresa_direccion"]; ?>
                            <br>Teléfono: <?php echo $empresa["empresa_telefono"]; ?>
                            <br>E-mail: <?php echo $empresa["empresa_email"]; ?>
                            <br><?php echo $empresa["empresa_ubicacion"]; ?>
                    </center>
                </td>
                
            </tr>
            
            <tr>
                <td colspan="2">
                    <br>
                        <center>
                            <b style="font-family: Arial; font-size: 18pt;">RESULTADO PRUEBA COD. TC00<?php echo $prueba['prueba_id']; ?></b>
                        </center>            
                    
                </td>
            </tr>       
            
            <tr>            
                <td>                
                    <br>
                <b style="font-family: Arial; font-size: 12pt;">PACIENTE: <?php echo $prueba['paciente_nombre']; ?></b><br><br>
                <b><?php echo $prueba['paciente_codigo'].": " ?> </b><?php echo $prueba['paciente_ci']; ?>
                <b>EDAD:</b> <?php echo $prueba['paciente_edad']." AÑOS"; ?><br>
                <b>GENERO:</b> <?php echo $prueba['genero_nombre']; ?><br>
                <b>CÓDIGO:</b> <?php echo $prueba['prueba_medicolab']; ?><br>
                <b>REFERIDO:</b> <?php echo date_format(date_create($prueba['prueba_fechainforme']),"d/m/Y H:i"); ?><br>        
                <b>EXTRACCIÓN:</b> <?php echo date_format(date_create($prueba['prueba_fechasolicitud']),"d/m/Y H:i"); ?><br>
                </td>
                <td>
                <center>
                    <br>
                    
                         <img src="<?php echo $codigoqr; ?>" width="130" height="130">
                    
                </center>
                    
                </td>
            
            </tr>
        </table>

    </td>
    
</tr>

    
<tr>
    
<!--    <td style="padding: 0; width: <?php echo "1.5cm"; ?>">
       
    </td>-->
    <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>">
        
    </td>
    <td style="width: <?php echo $ancho; ?>">
        <h3  style="font-family: Arial;">
            <?php echo $prueba['prueba_nombreanalisis']; ?><br> 
        </h3>
        
        <h5  style="font-family: Arial;">            
            <?php echo nl2br($prueba['prueba_descricpion']); ?><br>         
        </h5>
        
        <h5  style="font-family: Arial;">
                <b>MUESTRA: </b><?php echo  nl2br($prueba['tipoprueba_descripcion']); ?><br>         
        </h5>

        <h5  style="font-family: Arial;">
                <b>RESULTADO: </b><?php echo  nl2br($prueba['prueba_resultados']); ?><br>         
        </h5>        
        <br>
        
        <h6  style="font-family: Arial;">
                <?php echo nl2br($prueba['prueba_observacion']); ?><br>
        </h6>
        
    </td>
</tr>

<tr>
    
    
    <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" > </td>
    <td style="padding: 0; text-align: center;">

            <img src="<?php echo $codigoqr; ?>" width="100" height="100">

    </td>

</tr>

<!--<tr>
    
    
    <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" > </td>
    <td style="padding: 0; text-align: left;">

                        <br>
                            <img src="<?php echo $codigoqr; ?>" width="100" height="100">

    </td>

</tr>    -->
</table>
    
</div>

<div class="col-md-12 no-print">
    <center>
        <button class="btn btn-danger" onclick="window.close();"><fa class="fa fa-times"> </fa> Cerrar </button>
        
        <!--<br>-->
        
        <!--<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="window.close();"><i class="fa fa-times"></i> Ceeeerrar</button>-->
    </center>
    
</div>