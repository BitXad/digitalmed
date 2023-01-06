<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Extencion extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Extencion_model');
        $this->load->model('Usuario_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of extencion
     */
    function index()
    {
        if($this->acceso(58)){
            /************************** CABECERA SESSION ************************************/            
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1){        
                    $usuario_id = $session_data['usuario_id'];
            /************************** CABECERA SESSION ************************************/         

            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('extencion/index?');
            $config['total_rows'] = $this->Extencion_model->get_all_extencion_count();
            $this->pagination->initialize($config);

            $data['extencion'] = $this->Extencion_model->get_all_extencion($params);
            $data['usuario'] = $this->Usuario_model->get_usuario(1);

            $data['_view'] = 'extencion/index';
            $this->load->view('layouts/main',$data);

            /************************** FIN CABECERA SESSION ************************************/            
                    }else{
                    $url = base_url("login");
                    header("Location: .$url");
                    die();
                }
            } else {redirect('login', 'refresh'); }            
            /*************************** FIN CABECERA SESSION ***********************************/
        }
        
    }

    /*
     * Adding a new extencion
     */
    function add()
    {
        if($this->acceso(58)){
            /************************** CABECERA SESSION ************************************/            
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1){        
                    $usuario_id = $session_data['usuario_id'];
            /************************** CABECERA SESSION ************************************/         

            $data['usuario'] = $this->Usuario_model->get_usuario(1);
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                                    'extencion_descripcion' => $this->input->post('extencion_descripcion'),
                );

                $extencion_id = $this->Extencion_model->add_extencion($params);
                redirect('extencion/index');
            }
            else
            {            
                $data['_view'] = 'extencion/add';
                $this->load->view('layouts/main',$data);
            }

            /************************** FIN CABECERA SESSION ************************************/            
                    }else{
                    $url = base_url("login");
                    header("Location: .$url");
                    die();
                }
            } else {redirect('login', 'refresh'); }            
            /*************************** FIN CABECERA SESSION ***********************************/
        }
    }  

    /*
     * Editing a extencion
     */
    function edit($extencion_id)
    {
        if($this->acceso(58)){
            /************************** CABECERA SESSION ************************************/            
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1){        
                    $usuario_id = $session_data['usuario_id'];
            /************************** CABECERA SESSION ************************************/ 

            // check if the extencion exists before trying to edit it
            $data['extencion'] = $this->Extencion_model->get_extencion($extencion_id);
            $data['usuario'] = $this->Usuario_model->get_usuario(1);
            if(isset($data['extencion']['extencion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                                            'extencion_descripcion' => $this->input->post('extencion_descripcion'),
                    );

                    $this->Extencion_model->update_extencion($extencion_id,$params);            
                    redirect('extencion/index');
                }
                else
                {
                    $data['_view'] = 'extencion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The extencion you are trying to edit does not exist.');

            /************************** FIN CABECERA SESSION ************************************/            
                    }else{
                    $url = base_url("login");
                    header("Location: .$url");
                    die();
                }
            } else {redirect('login', 'refresh'); }            
            /*************************** FIN CABECERA SESSION ***********************************/
        }
    } 

    /*
     * Deleting extencion
     */
    function remove($extencion_id)
    {
        if($this->acceso(58)){
            /************************** CABECERA SESSION ************************************/            
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1){        
                    $usuario_id = $session_data['usuario_id'];
            /************************** CABECERA SESSION ************************************/ 

            $extencion = $this->Extencion_model->get_extencion($extencion_id);

            // check if the extencion exists before trying to delete it
            if(isset($extencion['extencion_id']))
            {
                $this->Extencion_model->delete_extencion($extencion_id);
                redirect('extencion/index');
            }
            else
                show_error('The extencion you are trying to delete does not exist.');

            /************************** FIN CABECERA SESSION ************************************/            
                    }else{
                    $url = base_url("login");
                    header("Location: .$url");
                    die();
                }
            } else {redirect('login', 'refresh'); }            
            /*************************** FIN CABECERA SESSION ***********************************/
        }
    }
    
}
