<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Paciente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paciente_model');
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of paciente
     */
    function index()
    {
        /*$params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('paciente/index?');
        $config['total_rows'] = $this->Paciente_model->get_all_paciente_count();
        $this->pagination->initialize($config);
        */
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $data['paciente'] = $this->Paciente_model->get_all_paciente();
        
        $data['_view'] = 'paciente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new paciente
     */
    function add()
    {   
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        if(isset($_POST) && count($_POST) > 0)     
        {   
            
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['paciente_foto']['name'])){

                $this->load->library('image_lib');
                $config['upload_path'] = './resources/images/pacientes/';
                $img_full_path = $config['upload_path'];

                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['image_library'] = 'gd2';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;

                $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                $config['file_name'] = $new_name; //.$extencion;
                $config['file_ext_tolower'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('paciente_foto');

                $img_data = $this->upload->data();
                $extension = $img_data['file_ext'];
                /* ********************INICIO para resize***************************** */
                if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                    $conf['image_library'] = 'gd2';
                    $conf['source_image'] = $img_data['full_path'];
                    $conf['new_image'] = './resources/images/pacientes/';
                    $conf['maintain_ratio'] = TRUE;
                    $conf['create_thumb'] = FALSE;
                    $conf['width'] = 800;
                    $conf['height'] = 600;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($conf);
                    if(!$this->image_lib->resize()){
                        echo $this->image_lib->display_errors('','');
                    }
                }
                /* ********************F I N  para resize***************************** */
                $confi['image_library'] = 'gd2';
                $confi['source_image'] = './resources/images/pacientes/'.$new_name.$extension;
                $confi['new_image'] = './resources/images/pacientes/'."thumb_".$new_name.$extension;
                $confi['create_thumb'] = FALSE;
                $confi['maintain_ratio'] = TRUE;
                $confi['width'] = 100;
                $confi['height'] = 100;

                $this->image_lib->clear();
                $this->image_lib->initialize($confi);
                $this->image_lib->resize();

                $foto = $new_name.$extension;
            }
            /* *********************FIN imagen***************************** */
            $estado_id = 1; // 1 --> ACTIVO
            $params = array(
                'estado_id' => $estado_id,
                'genero_id' => $this->input->post('genero_id'),
                'extencion_id' => $this->input->post('extencion_id'),
                'tipoproced_id' => $this->input->post('tipoproced_id'),
                'paciente_nombre' => $this->input->post('paciente_nombre'),
                'paciente_apellido' => $this->input->post('paciente_apellido'),
                'paciente_fechanac' => $this->input->post('paciente_fechanac'),
                'paciente_direccion' => $this->input->post('paciente_direccion'),
                'paciente_codigo' => $this->input->post('paciente_codigo'),
                'paciente_ci' => $this->input->post('paciente_ci'),
                'paciente_celular' => $this->input->post('paciente_celular'),
                'paciente_telefono' => $this->input->post('paciente_telefono'),
                'paciente_nit' => $this->input->post('paciente_nit'),
                'paciente_razon' => $this->input->post('paciente_razon'),
                'paciente_foto' => $foto,
                'paciente_nombrefirmante' => $this->input->post('paciente_nombrefirmante'),
                'paciente_cifirmante' => $this->input->post('paciente_cifirmante'),
            );
            
            $paciente_id = $this->Paciente_model->add_paciente($params);
            redirect('paciente/index');
        }
        else
        {
            $this->load->model('Estado_model');
            $data['all_estado'] = $this->Estado_model->get_all_estado();

            $this->load->model('Genero_model');
            $data['all_genero'] = $this->Genero_model->get_all_genero();

            $this->load->model('Extencion_model');
            $data['all_extencion'] = $this->Extencion_model->get_all_extencion();
            $data['all_paciente'] = $this->Paciente_model->get_all_paciente();
            
            $data['_view'] = 'paciente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a paciente
     */
    function edit($paciente_id)
    {   
        // check if the paciente exists before trying to edit it
        $data['paciente'] = $this->Paciente_model->get_paciente($paciente_id);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        if(isset($data['paciente']['paciente_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('paciente_foto1');
                if (!empty($_FILES['paciente_foto']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/pacientes/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('paciente_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/pacientes/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    $base_url = explode('/', base_url());
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/pacientes/';
                    if(isset($foto1) && !empty($foto1)){
                        if(file_exists($directorio.$foto1)){
                            unlink($directorio.$foto1);
                            $mimagenthumb = "thumb_".$foto1;
                            if(file_exists($directorio.$mimagenthumb)){
                                unlink($directorio.$mimagenthumb);
                            }
                        }
                    }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/pacientes/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/pacientes/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 100;
                    $confi['height'] = 100;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'genero_id' => $this->input->post('genero_id'),
                    'extencion_id' => $this->input->post('extencion_id'),
                    'tipoproced_id' => $this->input->post('tipoproced_id'),
                    'paciente_nombre' => $this->input->post('paciente_nombre'),
                    'paciente_apellido' => $this->input->post('paciente_apellido'),
                    'paciente_fechanac' => $this->input->post('paciente_fechanac'),
                    'paciente_direccion' => $this->input->post('paciente_direccion'),
                    'paciente_codigo' => $this->input->post('paciente_codigo'),
                    'paciente_ci' => $this->input->post('paciente_ci'),
                    'paciente_celular' => $this->input->post('paciente_celular'),
                    'paciente_telefono' => $this->input->post('paciente_telefono'),
                    'paciente_nit' => $this->input->post('paciente_nit'),
                    'paciente_razon' => $this->input->post('paciente_razon'),
                    'paciente_foto' => $foto,
                    'paciente_nombrefirmante' => $this->input->post('paciente_nombrefirmante'),
                    'paciente_cifirmante' => $this->input->post('paciente_cifirmante'),
                );

                $this->Paciente_model->update_paciente($paciente_id,$params);            
                redirect('paciente/index');
            }
            else
            {
                $this->load->model('Estado_model');
                $tipo = 1; // tipo 1 --> activo, inactivo
                $data['all_estado'] = $this->Estado_model->get_estado_tipo($tipo);

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $this->load->model('Extencion_model');
                $data['all_extencion'] = $this->Extencion_model->get_all_extencion();
                $data['all_paciente'] = $this->Paciente_model->get_all_paciente();

                $data['_view'] = 'paciente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The paciente you are trying to edit does not exist.');
    } 

//    function edit($origen,$paciente_id)
//    {   
//        // check if the paciente exists before trying to edit it
//
//        /************************** CABECERA SESSION ************************************/            
//        if ($this->session->userdata('logged_in')) {
//            $session_data = $this->session->userdata('logged_in');
//            if($session_data['tipousuario_id']==1){        
//                $usuario_id = $session_data['usuario_id'];
//        /************************** CABECERA SESSION ************************************/           
//        
//                $data['paciente'] = $this->Paciente_model->get_paciente($paciente_id);
//                $data['origen'] = $origen;
//                
//                if(isset($data['paciente']['paciente_id']))
//                {
//                    if(isset($_POST) && count($_POST) > 0)     
//                    {   
//                        $params = array(
//                                'estado_id' => $this->input->post('estado_id'),
//                                'genero_id' => $this->input->post('genero_id'),
//                                'extencion_id' => $this->input->post('extencion_id'),
//                                'paciente_nombre' => $this->input->post('paciente_nombre'),
//                                'paciente_edad' => $this->input->post('paciente_edad'),
//                                'paciente_direccion' => $this->input->post('paciente_direccion'),
//                                'paciente_codigo' => $this->input->post('paciente_codigo'),
//                                'paciente_ci' => $this->input->post('paciente_ci'),
//                                'paciente_celular' => $this->input->post('paciente_celular'),
//                                'paciente_telefono' => $this->input->post('paciente_telefono'),
//                                'paciente_nit' => $this->input->post('paciente_nit'),
//                                'paciente_razon' => $this->input->post('paciente_razon'),
//                                'paciente_foto' => $this->input->post('paciente_foto'),
//                        );
//
//                        $this->Paciente_model->update_paciente($paciente_id,$params);
//                        //origen = 1 significa que viene de pruebas index
//                        //origen = 2 significa que viene de edit de paciente
//                        
//                        if ($origen==1) redirect('prueba/index');
//                        if ($origen==2) redirect('paciente/index');
//                        
//                    }
//                    else
//                    {
//                                        $this->load->model('Estado_model');
//                                        $data['all_estado'] = $this->Estado_model->get_all_estado();
//
//                                        $this->load->model('Genero_model');
//                                        $data['all_genero'] = $this->Genero_model->get_all_genero();
//
//                                        $this->load->model('Extencion_model');
//                                        $data['all_extencion'] = $this->Extencion_model->get_all_extencion();
//                                        
//                        $data['_view'] = 'paciente/edit';
//                        $this->load->view('layouts/main',$data);
//                    }
//                }
//                else
//                    show_error('The paciente you are trying to edit does not exist.');
//
//        /************************** FIN CABECERA SESSION ************************************/            
//                }else{
//                $url = base_url("login");
//                header("Location: .$url");
//                die();
//            }
//        } else {redirect('login', 'refresh'); }            
//        /*************************** FIN CABECERA SESSION ***********************************/     
//                
//                
//    } 

    /*
     * Deleting paciente
     */
    function remove($paciente_id)
    {
        $paciente = $this->Paciente_model->get_paciente($paciente_id);

        // check if the paciente exists before trying to delete it
        if(isset($paciente['paciente_id']))
        {
            $this->Paciente_model->delete_paciente($paciente_id);
            redirect('paciente/index');
        }
        else
            show_error('The paciente you are trying to delete does not exist.');
    }
    
    /*
     * dar de baja a un paciente
     */
    function darde_baja($paciente_id)
    {
        $estado_baja = 2; // da de baja a un asociado
        $params = array(
            'estado_id' => $estado_baja,
        );
        $this->Paciente_model->update_paciente($paciente_id,$params);            
        redirect('paciente/index');
    }
    
    /*
     * dar de alta a un paciente
     */
    function darde_alta($paciente_id)
    {
        $estado_alta = 1; // da de alta a un asociado
        $params = array(
            'estado_id' => $estado_alta,
        );
        $this->Paciente_model->update_paciente($paciente_id,$params);            
        redirect('paciente/index');
    }
    
}
