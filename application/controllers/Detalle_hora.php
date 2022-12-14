<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Detalle_hora extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detalle_hora_model');
    }
    /* obtiene el numero correlativo siguiente para el registro de una hora de sesion */
    function obtener_numero(){
        try{
            if($this->input->is_ajax_request()){
                $sesion_id = $this->input->post('sesion_id');
                $sesion = $this->Detalle_hora_model->get_detalle_horasesion_count($sesion_id);
                echo json_encode($sesion);
            }else{
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* registrar detalles de una hora en una sesion determinada!. */
    function registrar_hora(){
        try{
            if($this->input->is_ajax_request()){
                $estado_id = 1; //estado = ACTIVO
                $params = array(
                    'sesion_id' => $this->input->post('sesion_id'),
                    'estado_id' => $estado_id,
                    'detallehora_numero' => $this->input->post('detallehora_numero'),
                    'detallehora_pa' => $this->input->post('detallehora_pa'),
                    'detallehora_fc' => $this->input->post('detallehora_fc'),
                    'detallehora_temp' => $this->input->post('detallehora_temp'),
                    'detallehora_flujosangre' => $this->input->post('detallehora_flujosangre'),
                    'detallehora_pv' => $this->input->post('detallehora_pv'),
                    'detallehora_ptm' => $this->input->post('detallehora_ptm'),
                    'detallehora_conductividad' => $this->input->post('detallehora_conductividad'),
                );
                $sesion_id = $this->Detalle_hora_model->add_detalle_hora($params);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    /* muestrar las horas (detalles) de un Hemodialisis */
    function mostrar_detallehora(){
        try{
            if($this->input->is_ajax_request()){
                $sesion_id = $this->input->post('sesion_id');
                $sesion = $this->Detalle_hora_model->get_detalle_horasesion($sesion_id);
                echo json_encode($sesion);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* modificar detalles de una hora en una sesion determinada!. */
    function modificar_hora(){
        try{
            if($this->input->is_ajax_request()){
                $detallehora_id = $this->input->post('detallehora_id');
                $params = array(
                    'detallehora_numero' => $this->input->post('detallehora_numero'),
                    'detallehora_pa' => $this->input->post('detallehora_pa'),
                    'detallehora_fc' => $this->input->post('detallehora_fc'),
                    'detallehora_temp' => $this->input->post('detallehora_temp'),
                    'detallehora_flujosangre' => $this->input->post('detallehora_flujosangre'),
                    'detallehora_pv' => $this->input->post('detallehora_pv'),
                    'detallehora_ptm' => $this->input->post('detallehora_ptm'),
                    'detallehora_conductividad' => $this->input->post('detallehora_conductividad'),
                );
                $this->Detalle_hora_model->update_detalle_hora($detallehora_id, $params);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    /* anular detalle hora */
    function anular_detallehora(){
        try{
            if($this->input->is_ajax_request()){
                $detallehora_id = $this->input->post('detallehora_id');
                $estado_id = 2;
                $params = array(
                    'estado_id' => $estado_id,
                );
                $this->Detalle_hora_model->update_detalle_hora($detallehora_id, $params);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    /* activar detalle hora */
    function activar_detallehora(){
        try{
            if($this->input->is_ajax_request()){
                $detallehora_id = $this->input->post('detallehora_id');
                $estado_id = 1;
                $params = array(
                    'estado_id' => $estado_id,
                );
                $this->Detalle_hora_model->update_detalle_hora($detallehora_id, $params);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* eliminar detalle hora */
    function eliminar_detallehora(){
        try{
            if($this->input->is_ajax_request()){
                $detallehora_id = $this->input->post('detallehora_id');
                $this->Detalle_hora_model->delete_detallehora($detallehora_id);
                echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
 }
