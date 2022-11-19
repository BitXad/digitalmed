<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Registro extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Registro_model');
        $this->load->model('Paciente_model');
        $this->load->model('Acceso_vascular_model');
    }
    
    /* Registros de un paciente!. */
    public function registros($paciente_id)
    {
        try{
            $data['paciente_id'] = $paciente_id;
            $data['paciente'] = $this->Paciente_model->get_paciente($paciente_id);
            
            $data['_view'] = 'registro/registros';
            $this->load->view('layouts/main',$data);
        }catch (Exception $ex) {
            throw new Exception('Registro Controller : Error in index function - ' . $ex);
        }
    }
    function registrar_registro(){
        try{
            if($this->input->is_ajax_request()){
                $usuario_id = 1;
                $params = array(
                    'usuario_id' => $usuario_id,
                    'paciente_id' => $this->input->post('paciente_id'),
                    'registro_fecha' => $this->input->post('registro_fecha'),
                    'registro_hora' => $this->input->post('registro_hora'),
                    'registro_mes' => $this->input->post('registro_mes'),
                    'registro_gestion' => $this->input->post('registro_gestion'),
                    'registro_diagnostico' => $this->input->post('registro_diagnostico'),
                    'registro_numero' => 0,
                    'registro_numaquina' => $this->input->post('registro_numaquina'),
                    'registro_tipofiltro' => $this->input->post('registro_tipofiltro'),
                );
                $registro_id = $this->Registro_model->add_registro($params);
                
                $params = array(
                    'registro_id' => $registro_id,
                    'avascular_nombre' => $this->input->post('avascular_nombre'),
                    'avascular_detalle' => $this->input->post('avascular_detalle'),
                );
                $avascular_id = $this->Acceso_vascular_model->add_acceso_vascular($params);
            echo json_encode($registro_id);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function mostrar_registros(){
        try{
            if($this->input->is_ajax_request()){
                $paciente_id = $this->input->post('paciente_id');
                $sesion = $this->Registro_model->getall_registropaciente($paciente_id);
                echo json_encode($sesion);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function modificar_registro(){
        try{
            if($this->input->is_ajax_request()){
                $usuario_id = 1;
                $params = array(
                    'registro_fecha' => $this->input->post('registro_fecha'),
                    'registro_hora' => $this->input->post('registro_hora'),
                    'registro_mes' => $this->input->post('registro_mes'),
                    'registro_gestion' => $this->input->post('registro_gestion'),
                    'registro_diagnostico' => $this->input->post('registro_diagnostico'),
                    'registro_numaquina' => $this->input->post('registro_numaquina'),
                    'registro_tipofiltro' => $this->input->post('registro_tipofiltro'),
                );
                $registro_id = $this->input->post('registro_id');
                $this->Registro_model->update_registro($registro_id, $params);
            echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
 }
