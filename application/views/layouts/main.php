<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Digitalmed | Sistema registro Hemodialisis</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
    </head>
        <?php
        $session_data = $this->session->userdata('logged_in');
        $rolusuario = $session_data['rol'];
    ?>
    
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">digitalMed</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">digitalMed</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="user-image" alt="Imagen de usuario">
                                    <span class="hidden-xs"><?php echo $session_data['usuario_nombre']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="Imagen de usuario">

                                    <p>
                                        <?php echo $session_data['usuario_nombre']; ?>
                                        <small><?php echo $session_data['tipousuario_descripcion']; ?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat hidden">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url("verificar/logout"); ?>" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="Imagen de usuario" width="160px" height="160px">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $session_data['usuario_nombre']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                  <?php if ($session_data['usuario_id']>0) { ?>
                    
                    <ul class="sidebar-menu">
                        <li class="header">PRINCIPAL</li>
                        <li>
                            <a href="<?php echo base_url("dashboard"); ?>">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        

<!-----------------------------     MENU PRINCIPAL ------------------------------------------->
                        <li>
                            <a href="#">
                                <i class="fa fa-connectdevelop"></i> <span>Operaciones</span>
                            </a>
                                
                                <ul class="treeview-menu">

                                    <li class="active"> <a href="<?php echo site_url('paciente');?>"><i class="fa fa-users"></i> Pacientes</a> </li>
                                    <!--<li class="active"> <a href="<?php /*echo site_url('prueba/registrar_prueba');?>"><i class="fa fa-flask"></i> Prueba</a> </li>
                                    <li class="active"> <a href="<?php echo site_url('ingreso/index');?>"><i class="fa fa-money"></i> Ingresos</a> </li>
                                    <li class="active"> <a href="<?php echo site_url('egreso/index'); */ ?>"><i class="fa fa-money"></i> Egresos</a> </li>
                                    -->

                                    
                                </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-list"></i> <span>Parámetros</span>
                            </a>
                                
                                <ul class="treeview-menu">
                                    
                                    
                                    <li class="active"> <a href="<?php echo site_url('empresa/index');?>"><i class="fa fa-bank"></i> Empresa</a> </li>
                                    
                                    <!--<li> <a href="<?php //echo site_url('tipo_prueba/index');?>"><i class="fa fa-cubes"></i> Tipos de pruebas</a> </li>-->                                    
                                    
                                    <li> <a href="<?php echo site_url('estado/index');?>"><i class="fa fa-toggle-on"></i> Estados</a> </li>                                    
                                    
                                    <li> <a href="<?php echo site_url('extencion/index');?>"><i class="fa fa-globe"></i> Extensión CI</a> </li>                                    
                                    
                                    
                                </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-gears"></i> <span>Herramientas</span>
                            </a>
                                
                                <ul class="treeview-menu">
                                    
                                    <li class="active">
                                        <!--<a href="<?php //echo site_url('parametro');?>"><i class="fa fa-gear"></i> Configuracion</a>-->
                                    </li>
<!--                                    
                                    <li>
                                        <a href="<?php //echo site_url('empresa/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                    </li>-->
                                    
                                </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-paste"></i> <span>Reportes</span>
                            </a>
                                
                                <ul class="treeview-menu">
                                    
                                    <li class="active">
                                        <a href="<?php echo site_url('reportes/movimientodiario');?>"><i class="fa fa-paste"></i> Reporte Diario</a>
                                    </li>
                                    
                                    <li>
                                        <!--<a href="<?php //echo site_url('prueba');?>"><i class="fa fa-list-ul"></i> Pruebas del dia</a>-->
                                    </li>
                                    
                                </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-lock"></i> <span>Seguridad</span>
                            </a>
                                
                                <ul class="treeview-menu">
                                    
                                    <li class="active">
                                        <a href="<?php echo site_url('usuario');?>"><i class="fa fa-user"></i> Usuario</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo site_url('tipo_usuario');?>"><i class="fa fa-list-ul"></i> Tipo de usuario</a>
                                    </li>
                                    
                                </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-thumb-tack"></i> <span>Sesion</span>
                            </a>
                                
                                <ul class="treeview-menu">
                                    
                                    <li class="active">
                                        <a href="<?php echo base_url("verificar/logout"); ?>"><i class="fa fa-close"></i> Finalizar</a>
                                    </li>                                   
                                    
                                </ul>
                        </li>
                        
<!-----------------------------   FIN MENU PRINCIPAL ------------------------------------------->
                        
                        
                        
                        
                        
                        
<!-------------------                       
                        
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-bank"></i> <span>Empresa</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('empresa/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('empresa/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-gg"></i> <span>Estado</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('estado/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('estado/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-globe"></i> <span>Extencion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('extencion/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('extencion/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-american-sign-language-interpreting"></i> <span>Genero</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('genero/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('genero/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-id-card-o"></i> <span>Paciente</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('paciente/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('paciente/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-user-md"></i> <span>Prueba</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('prueba/add');?>"><i class="fa fa-plus"></i> Registrar</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('prueba/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-stack-overflow"></i> <span>Tipo Prueba</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('tipo_prueba/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('tipo_prueba/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Usuario</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('usuario/add');?>"><i class="fa fa-plus"></i> Añadir</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('usuario/index');?>"><i class="fa fa-list-ul"></i> Mostrar</a>
                                </li>
							</ul>
                        </li>
------------------->
                    </ul>
                    
                  <?php } ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <!--<section class="content" style="padding:0;">-->
                <section class="content" style="padding-top: 0;">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!--<strong>Desarrollado por <a href="https://www.passwordbolivia.com/" target="_blank">R. Carlos Soto Sierra</a></strong>-->
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Añadir the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
