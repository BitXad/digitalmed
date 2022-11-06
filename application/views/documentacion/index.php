 <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/css/dataTables.bootstrap.min.css">
<!-- DataTables -->
<script src="<?php echo base_url('resources/plugins/datatables.net');  ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/js/dataTables.bootstrap.min.js"></script>
 <script>
                  $(function () {
                    $('#example1').DataTable()
                    $('#example2').DataTable({
                      'paging'      : true,
                      'lengthChange': false,
                      'searching'   : false,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false
                    })
                  })
                  </script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Documentacion  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('documentacion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>PACIENTE</th>
                    <th>DESCRIPCION</th>
                    <th>IMAGEN1</th>
                    <th>IMAGEN2</th>
                    <th>IMAGEN3</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($documentacion) && $documentacion!=null)
           {
           foreach($documentacion as $d){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $d['documentacion_id']; ?></td>
                    <td>
                
                <?php //echo $d['paciente_id']; ?>
                      <select name="paciente_id" class="form-control changeclm">
                      <option value="">select paciente_id</option>
                      <?php  
                      $paciente_id_values = array(
                          );
                      foreach($paciente_id_values as   $value => $display_text)
                      {
                          $selected = ($value == $d['paciente_id'] ) ? ' selected="selected"' : "";
                        echo '<option id='.$d['documentacion_id'].' clm_name="paciente_id" value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                      } 
                      ?>
                    </select>
                </td>
                    <td><?php echo $d['documentacion_descripcion']; ?></td>
                    <td><?php echo $d['documentacion_foto1']; ?></td>
                    <td><?php echo $d['documentacion_foto2']; ?></td>
                    <td><?php echo $d['documentacion_foto3']; ?></td>
                     <td><a href="<?php echo site_url('documentacion/edit/'.$d['documentacion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('documentacion/remove/'.$d['documentacion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                     </td>
                    </tr>
                     <?php }
                    
                           }else{
                                  echo 'No data found';
                             }

          ?>
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

        </div>
    </div>

</div>

