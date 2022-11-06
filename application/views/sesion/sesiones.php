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
                <h3 class="box-title">Registro  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('registro/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>REGISTRO ID</th>
                    <th>USUARIO</th>
                    <th>PACIENTE</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>MES</th>
                    <th>GESTION</th>
                    <th>DIAGNOSTICO</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($registro) && $registro!=null)
           {
           foreach($registro as $r){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $r['registro_id']; ?></td>
                    <td><?php echo $r['usuario_id']; ?></td>
                    <td><?php echo $r['paciente_id']; ?></td>
                    <td><?php echo $r['registro_fecha']; ?></td>
                    <td><?php echo $r['registro_hora']; ?></td>
                    <td><?php echo $r['registro_mes']; ?></td>
                    <td><?php echo $r['registro_gestion']; ?></td>
                    <td><?php echo $r['registro_diagnostico']; ?></td>
                     <td><a href="<?php echo site_url('registro/edit/'.$r['registro_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('registro/remove/'.$r['registro_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

