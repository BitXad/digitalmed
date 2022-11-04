    
<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
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
      $ancho = 10;
      $alto = "0cm";
      $margen_izquierdo = "4.5cm";
?>

<div class=" table-responsive" style="padding: 0; margin-top: 0;">
    
<table class="table" style="padding:0;">
    
    
<tr>
    <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>">
       
    </td>
    
    <td style="line-height: 15px;">
        <?php echo $prueba['paciente_nombre'].", ".$prueba['paciente_codigo'].": ".$prueba['paciente_ci']; ?><br>
        <?php echo $prueba['paciente_edad']." AÑOS"; ?><br>
        <?php echo $prueba['genero_nombre']; ?><br>
        <?php echo $prueba['prueba_medicolab']; ?><br>
        <?php echo date_format(date_create($prueba['prueba_fechainforme']),"d/m/Y H:i"); ?><br>        
        <?php echo date_format(date_create($prueba['prueba_fechasolicitud']),"d/m/Y H:i"); ?><br>        

    </td>
    
</tr>

    
<tr>
    
    <td style="padding: 0; width: <?php echo "1.5cm"; ?>">
       
    </td>
    <td>
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

<tr style="height: <?php echo $alto; ?>">
    
    
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" > </td>
<td style="padding: 0; text-align: left;">
    
                    <br>
                        <img src="<?php echo $codigoqr; ?>" width="100" height="100">
    
</td>

</tr>    
</table>
    
    <div class="no-print">
        <?php echo $cadenaqr; ?>        
    </div>
</div>
