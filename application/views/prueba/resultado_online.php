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
font-family: Arial narrow;
font-size: 7pt;  

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
<?php //$tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = "8.5cm";
      $margen_izquierdo = "0cm";
?>
<table class="table" >
<tr>
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>

<td style="padding: 0;">
    


        <table class="table" style="width: <?php echo $ancho; ?>;" >
            <tr>
                <td style="padding:0;">        
                    <center>

                        <img src="<?php echo base_url("resources/img/logo.jpg"); ?>" width="200" height="70" > <br>
                            <?php echo $empresa["empresa_nombre"]; ?>
                            <br>Dirección: <?php echo $empresa["empresa_direccion"]; ?>
                            <br>Teléfono: <?php echo $empresa["empresa_telefono"]; ?>
                            <br>E-mail: <?php echo $empresa["empresa_email"]; ?>
                            <br><?php echo $empresa["empresa_ubicacion"]; ?>

                            <br><br>

                    </center>
                        <center style="line-height:12px;">        
                        <font size="5" face="arial"><b>RESULTADO PRUEBA</b></font> <br>
                        <font size="4" face="arial"><b>Nº TC00<?php echo $prueba['prueba_id']; ?></b></font> <br>
                    </center>                      
                        <br> 
                </td>
            </tr>
                
            <tr style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
                <td>


                                <font style="font-family: Arial; font-size: 12pt;"><b>PACIENTE: </b><?php echo $prueba['paciente_nombre']; ?></font><br><br>
                                
                                <font style="font-family: Arial; font-size: 9pt;">
                                
                                <b><?php echo $prueba['paciente_codigo'].": " ?> </b><?php echo $prueba['paciente_ci']; ?><br>
                                <b>EDAD:</b> <?php echo $prueba['paciente_edad']." AÑOS"; ?><br>
                                <b>GENERO:</b> <?php echo $prueba['genero_nombre']; ?><br>
                                <b>CÓDIGO:</b> <?php echo $prueba['prueba_medicolab']; ?><br>
                                <b>REFERIDO:</b> <?php echo date_format(date_create($prueba['prueba_fechainforme']),"d/m/Y H:i"); ?><br>        
                                <b>EXTRACCIÓN:</b> <?php echo date_format(date_create($prueba['prueba_fechasolicitud']),"d/m/Y H:i"); ?><br>
                                </font>
                        <br>
                </td>
            </tr>

<!--        </table>

       <table class="table table-striped table-condensed"  style="width: <?php echo $ancho; ?>;" >-->
<!--           <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >

           </tr>-->

           <tr style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >

            <td style="padding: 0;"><font style="size:3px; font-family: arial narrow;">
                       
                    <h3  style="font-family: Arial;">
                        <?php echo $prueba['prueba_nombreanalisis']; ?><br> 
                    </h3>

                    <h5  style="font-family: Arial narrow">            
                        <?php echo nl2br($prueba['prueba_descricpion']); ?><br>         
                    </h5>

                    <h5  style="font-family: Arial;">
                            <b>MUESTRA: </b><?php echo  nl2br($prueba['tipoprueba_descripcion']); ?><br>         
                    </h5>

                    <h5  style="font-family: Arial;">
                            <b>RESULTADO: </b><font style="color: blue"><?php echo  nl2br($prueba['prueba_resultados']); ?></font> <br>         
                    </h5>
                    <br>

                    <h6  style="font-family: Arial; color:gray;">
                            <?php echo nl2br($prueba['prueba_observacion']); ?><br>
                    </h6>

            </td>
                        
           </tr>

<tr>

        <td>
            <center>
                    <br>

                    <img src="<?php echo $codigoqr; ?>" width="130" height="130"><img src="<?php echo base_url("resources/img/firma.jpg"); ?>" width="150" height="130" >

            </center>
        </td>

</tr>

<tr class="no-print">
    <td colspan="2">
        <center>
            <button class="btn btn-danger" onclick="window.close();"><fa class="fa fa-times"> </fa> Cerrar </button>        
        </center>  
        
    </td>
</tr>
  
    
</table>
  
</td>
</tr>
</table>
 
