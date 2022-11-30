<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Tratamiento extends CI_Controller{
     function __construct()
    {
        parent::__construct();
        $this->load->model('Tratamiento_model');
        $this->load->model('Registro_model');
        $this->load->model('Paciente_model');
        $this->load->model('Informe_mensual_model');
        $this->load->model('Certificado_medico_model');
        $this->load->model('Sesion_model');
    }
    
    /*
    * Listing of tratamiento
    */
    public function tratamientos($registro_id)
    {
        try{
            //obtiene los tratamientos de un determinado registro
            $data['registro'] = $this->Registro_model->get_registro($registro_id);
            $data['paciente'] = $this->Tratamiento_model->get_pacienteregistro($registro_id);
            
            $data['_view'] = 'tratamiento/tratamientos';
            $this->load->view('layouts/main',$data);
        } catch (Exception $ex) {
            throw new Exception('Tratamiento Controller : Error in index function - ' . $ex);
        }
    }
    
    function registrar_tratamiento(){
        try{
            if($this->input->is_ajax_request()){
                $params = array(
                    'registro_id' => $this->input->post('registro_id'),
                    'tratamiento_mes' => $this->input->post('tratamiento_mes'),
                    'tratamiento_gestion' => $this->input->post('tratamiento_gestion'),
                    'tratamiento_fecha' => $this->input->post('tratamiento_fecha'),
                    'tratamiento_hora' => $this->input->post('tratamiento_hora'),
                );
                $tratamiento_id = $this->Tratamiento_model->add_tratamiento($params);
            echo json_encode($tratamiento_id);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function mostrar_tratamientos(){
        try{
            if($this->input->is_ajax_request()){
                $registro_id = $this->input->post('registro_id');
                $tratamiento = $this->Tratamiento_model->getall_tratamientoregistro($registro_id);
                echo json_encode($tratamiento);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function modificar_tratamiento(){
        try{
            if($this->input->is_ajax_request()){
                $usuario_id = 1;
                $params = array(
                    'tratamiento_mes' => $this->input->post('tratamiento_mes'),
                    'tratamiento_gestion' => $this->input->post('tratamiento_gestion'),
                    'tratamiento_fecha' => $this->input->post('tratamiento_fecha'),
                    'tratamiento_hora' => $this->input->post('tratamiento_hora'),
                );
                $tratamiento_id = $this->input->post('tratamiento_id');
                $this->Tratamiento_model->update_tratamiento($tratamiento_id, $params);
            echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* regsitra el informe mensual */
    function registrar_infmensual(){
        try{
            if($this->input->is_ajax_request()){
                $params = array(
                    'tratamiento_id' => $this->input->post('tratamiento_id'),
                    'infmensual_cabecera' => $this->input->post('infmensual_cabecera'),
                    'infmensual_accesouno' => $this->input->post('infmensual_accesouno'),
                    'infmensual_accesodos' => $this->input->post('infmensual_accesodos'),
                    'infmensual_laboratorio' => $this->input->post('infmensual_laboratorio'),
                    'infmensual_conclusion' => $this->input->post('infmensual_conclusion'),
                    'infmensual_fecha' => $this->input->post('infmensual_fecha'),
                );
                $infmensual_id = $this->Informe_mensual_model->add_informe_mensual($params);
            echo json_encode($infmensual_id);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function get_informemensual(){
        try{
            if($this->input->is_ajax_request()){
                $infmensual_id = $this->input->post('infmensual_id');
                $informe_mensual = $this->Informe_mensual_model->get_informe_mensual($infmensual_id);
                echo json_encode($informe_mensual);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* modificar el informe mensual */
    function modificar_infmensual(){
        try{
            if($this->input->is_ajax_request()){
                $params = array(
                    'infmensual_cabecera' => $this->input->post('infmensual_cabecera'),
                    'infmensual_accesouno' => $this->input->post('infmensual_accesouno'),
                    'infmensual_accesodos' => $this->input->post('infmensual_accesodos'),
                    'infmensual_laboratorio' => $this->input->post('infmensual_laboratorio'),
                    'infmensual_conclusion' => $this->input->post('infmensual_conclusion'),
                    'infmensual_fecha' => $this->input->post('infmensual_fecha'),
                );
                $infmensual_id = $this->input->post('infmensual_id');
                $this->Informe_mensual_model->update_informe_mensual($infmensual_id, $params);
            echo json_encode("ok");
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* obtiene el ultimo informe mensual de un tratamiento */
    function obtener_infmensual(){
        try{
            if($this->input->is_ajax_request()){
                $paciente_id = $this->input->post('paciente_id');
                $informe_mensual = $this->Informe_mensual_model->getlast_informepaciente($paciente_id);
            echo json_encode($informe_mensual);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* obtiene el ultimo certificado medico de un tratamiento */
    function obtener_certmedico(){
        try{
            if($this->input->is_ajax_request()){
                $paciente_id = $this->input->post('paciente_id');
                $certificado_paciente = $this->Certificado_medico_model->getlast_certificadopaciente($paciente_id);
            echo json_encode($certificado_paciente);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    /* regsitra el certificado medico */
    function registrar_certmedico(){
        try{
            if($this->input->is_ajax_request()){
                $params = array(
                    'certmedico_nombre' => $this->input->post('certmedico_nombre'),
                    'certmedico_codigo' => $this->input->post('certmedico_codigo'),
                    'certmedico_cabecerauno' => $this->input->post('certmedico_cabecerauno'),
                    'certmedico_cabecerados' => $this->input->post('certmedico_cabecerados'),
                    'certmedico_cabeceratres' => $this->input->post('certmedico_cabeceratres'),
                    'certmedico_cabeceracuatro' => $this->input->post('certmedico_cabeceracuatro'),
                    'certmedico_medicacion' => $this->input->post('certmedico_medicacion'),
                    'certmedico_fecha' => $this->input->post('certmedico_fecha'),
                    'tratamiento_id' => $this->input->post('tratamiento_id'),
                );
                $certmedico_id = $this->Certificado_medico_model->add_certificado_medico($params);
            echo json_encode($certmedico_id);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /* obtiene los medicamentos de un tratamiento */
    function obtener_medicamentosmes(){
        try{
            if($this->input->is_ajax_request()){
                $tratamiento_id = $this->input->post('tratamiento_id');
                $medicamento_mes = $this->Sesion_model->get_all_sesiontratamiento_mes($tratamiento_id);
                echo json_encode($medicamento_mes);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
 }
