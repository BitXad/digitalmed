<?php

class Alerta extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Empresa_model');
        $this->load->library('session');
        $this->session_data = $this->session->userdata('logged_in');
    }

    public function index(){
        $session_data = $this->session->userdata('logged_in');
        echo 'Ud no esta autorizado para ver esta pagina'.
             '<br><a href="'.base_url('admin/dashb/logout').'" class="btn btn-info btn-xs">Cerrar Sesion</a><br>    <a href="javascript: history.go(-1)" class="btn btn-success">Volver atrás</a>';
    }

public function dosificacion()
{
 
    $dosif="SELECT DATEDIFF(dosificacion_fechalimite, CURDATE()) as dias FROM dosificacion WHERE dosificacion_id = 1";
    $dosificacion = $this->db->query($dosif)->row_array();
        $session_data = $this->session->userdata('logged_in');
        $usuario_id = $session_data['usuario_id'];

        $data['empresa'] = $this->Empresa_model->get_empresa(1);
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);        
        
        $data['diasdo'] = $dosificacion;
        $data['_view'] = 'admin/dosificacion';
        $this->load->view('layouts/main',$data);
   
}
}

