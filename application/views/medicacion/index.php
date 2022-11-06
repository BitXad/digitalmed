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
                <h3 class="box-title">Medicacion  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('medicacion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>MEDICACION</th>
                    <th>SESION</th>
                    <th>MEDICAMENTO</th>
                    <th>CANTIDAD</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($medicacion) && $medicacion!=null)
           {
           foreach($medicacion as $m){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $m['medicacion_id']; ?></td>
                    <td>
                
                <?php //echo $m['sesion_id']; ?>
                      <select name="sesion_id" class="form-control changeclm">
                      <option value="">select sesion_id</option>
                      <?php  
                      $sesion_id_values = array(
                          );
                      foreach($sesion_id_values as   $value => $display_text)
                      {
                          $selected = ($value == $m['sesion_id'] ) ? ' selected="selected"' : "";
                        echo '<option id='.$m['medicacion_id'].' clm_name="sesion_id" value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                      } 
                      ?>
                    </select>
                </td>
                    <td><?php echo $m['medicamento_id']; ?></td>
                    <td><?php echo $m['medicacion_cantidad']; ?></td>
                     <td><a href="<?php echo site_url('medicacion/edit/'.$m['medicacion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('medicacion/remove/'.$m['medicacion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

