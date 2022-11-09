<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tratamiento  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('tratamiento/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>TRATAMIENTO ID</th>
                    <th>REGISTRO</th>
                    <th>MES</th>
                    <th>GESTION</th>
                    <th>FECHA</th>
                    <th>Tratamiento hora</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($tratamiento) && $tratamiento!=null)
           {
           foreach($tratamiento as $t){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $t['tratamiento_id']; ?></td>
                    <td><?php echo $t['registro_id']; ?></td>
                    <td><?php echo $t['tratamiento_mes']; ?></td>
                    <td><?php echo $t['tratamiento_gestion']; ?></td>
                    <td><?php echo $t['tratamiento_fecha']; ?></td>
                    <td><?php echo $t['tratamiento_hora']; ?></td>
                     <td><a href="<?php echo site_url('tratamiento/edit/'.$t['tratamiento_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                         <a href="<?php echo site_url('sesion/sesiones/'.$t['tratamiento_id']); ?>" class="btn btn-facebook btn-xs"><span class="fa fa-file-text"></span> Sesion</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('tratamiento/remove/'.$t['tratamiento_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

