<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Sesion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sesion_model');
        $this->load->model('Registro_model');
        $this->load->model('Tratamiento_model');
        $this->load->model('Acceso_vascular_model');
        $this->load->model('Medicacion_model');
        $this->load->model('Medicamento_model');
        $this->load->model('Estado_model');
    }
    
    /*
    * Listing of sesion
    */
    public function index()
    {
        $data['_view'] = 'sesion/index';
        $this->load->view('layouts/main',$data);
    }
    
    /*
    * Listing of sesiones de un tratamiento
    */
    public function sesiones($tratamiento = 0)
    {
        
        $data['tratamiento_id'] = $tratamiento;
        $data['paciente'] = $this->Sesion_model->get_pacientetratamiento($tratamiento);
        /*$sesion = $this->Sesion_model->get_all_sesion();
        $data['hay_sesiones']  = 0;
        if(count($sesion)>0){
            $data['hay_sesiones']  = 1;
        }*/
        $data['_view'] = 'sesion/sesiones';
        $this->load->view('layouts/main',$data);
    }
    
    function mostrar_sesiones(){
        try{
            if($this->input->is_ajax_request()){
                $tratamiento_id = $this->input->post('tratamiento_id');
                $sesion = $this->Sesion_model->get_all_sesiontratamiento($tratamiento_id);
                echo json_encode($sesion);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    function generar_sesion(){
        try{
            if($this->input->is_ajax_request()){
                $sesion_numero = $this->input->post('sesion_numero');
                $sesion_fechainicio = $this->input->post('sesion_fechainicio');
                // 0=>Domingo, 1=>Lunes, 2=>Martes, 3=>Miercoles, 4=>Jueves, 5=>Viernes, 6=>Sabado
                $dia = date("w", strtotime($sesion_fechainicio));
                if($dia >0){
                    $tratamiento_id = $this->input->post('tratamiento_id');
                    $registro = $this->Registro_model->get_registro_detratamiento($tratamiento_id);
                    $numero_registro = $registro["registro_numero"];
                    $registro_numaquina = $registro["registro_numaquina"];
                    $registro_tipofiltro = $registro["registro_tipofiltro"];
                    
                    $acceso_vascular = $this->Acceso_vascular_model->get_ultimoa_vascularregistro($registro["registro_id"]);
                    $cateter = "";
                    $fistula = "";
                    if($acceso_vascular["avascular_nombre"] == "Cateter"){
                        $cateter = $acceso_vascular["avascular_detalle"];
                    }else{
                        $fistula = $acceso_vascular["avascular_detalle"];
                    }
                    $lmv = 0;  //0==>false;  1==>true
                    if($dia == 1 || $dia == 3 || $dia == 5){
                        $lmv = 1;
                    }
                    $estado_id = 3; // estado pendiente
                    for($i = 1; $i <= $sesion_numero; $i++){
                        $num_reg = ($numero_registro+$i);
                        $params = array(
                            'tratamiento_id' => $this->input->post('tratamiento_id'),
                            'sesion_numero' => $i,
                            'sesion_fecha' => $sesion_fechainicio,
                            'sesion_eritropoyetina' => $this->input->post('sesion_eritropoyetina'),
                            'sesion_hierroeve' => $this->input->post('sesion_hierroev'),
                            'sesion_complejobampolla' => $this->input->post('sesion_complejobampolla'),
                            'sesion_costosesion' => $this->input->post('sesion_costosesion'),
                            'sesion_nummaquina' => $registro_numaquina,
                            'sesion_tipofiltro' => $registro_tipofiltro,
                            'sesion_cateter' => $cateter,
                            'sesion_fistula' => $fistula,
                            'sesion_numerosesionhd' => $num_reg,
                            'estado_id' => $estado_id,
                            'avascular_id' => $acceso_vascular["avascular_id"],
                        );
                        $sesion_id = $this->Sesion_model->add_sesion($params);

                        $dia = date("w", strtotime($sesion_fechainicio));

                        if($lmv == 1){
                            if($dia == 1 || $dia == 3){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+2 days"));
                                $paramsok = array(
                                    'sesion_omeprazol' => 2,
                                    'sesion_acidofolico' => 2,
                                    'sesion_calcio' => 8,
                                    'sesion_amlodipina' => 4,
                                    'sesion_complejob' => 2,
                                );
                            }elseif($dia == 5){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+3 days"));
                                $paramsok = array(
                                    'sesion_omeprazol' => 3,
                                    'sesion_acidofolico' => 3,
                                    'sesion_calcio' => 12,
                                    'sesion_amlodipina' => 6,
                                    'sesion_complejob' => 3,
                                );
                            }
                        }else{
                            if($dia == 2 || $dia == 4){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+2 days"));
                                $paramsok = array(
                                    'sesion_omeprazol' => 2,
                                    'sesion_acidofolico' => 2,
                                    'sesion_calcio' => 8,
                                    'sesion_amlodipina' => 4,
                                    'sesion_complejob' => 2,
                                );
                            }elseif($dia == 6){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+3 days"));
                                $paramsok = array(
                                    'sesion_omeprazol' => 3,
                                    'sesion_acidofolico' => 3,
                                    'sesion_calcio' => 12,
                                    'sesion_amlodipina' => 6,
                                    'sesion_complejob' => 3,
                                );
                            }
                        }
                        $this->Sesion_model->update_sesion($sesion_id, $paramsok);
                    }
                    $params = array(
                        'registro_numero' => $num_reg,
                    );
                    $this->Registro_model->update_registro($registro["registro_id"], $params);
                    
                    echo json_encode("ok");
                }else{
                    echo json_encode("no");
                }
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    /*
    * modificar una sesión
    */
    public function modificar($sesion_id)
    {
        try{
            //$data['tratamiento_id'] = $tratamiento_id;
            $data['sesion'] = $this->Sesion_model->get_sesion($sesion_id);
            $data['paciente'] = $this->Sesion_model->get_pacientetratamiento($data['sesion']['tratamiento_id']);
            $tipo = 2;
            $data['all_estado'] = $this->Estado_model->get_estado_tipo($tipo);
            
            $this->load->library('upload');
            $this->load->library('form_validation');
            if(isset($data['sesion']['sesion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $params = array(
                        'sesion_eritropoyetina'=> $this->input->post('sesion_eritropoyetina'),
                        'sesion_hierroeve'=> $this->input->post('sesion_hierroeve'),
                        'sesion_complejobampolla'=> $this->input->post('sesion_complejobampolla'),
                        'sesion_costosesion'=> $this->input->post('sesion_costosesion'),
                        'sesion_omeprazol'=> $this->input->post('sesion_omeprazol'),
                        'sesion_acidofolico'=> $this->input->post('sesion_acidofolico'),
                        'sesion_calcio'=> $this->input->post('sesion_calcio'),
                        'sesion_amlodipina'=> $this->input->post('sesion_amlodipina'),
                        'sesion_enalpril'=> $this->input->post('sesion_enalpril'),
                        'sesion_losartan'=> $this->input->post('sesion_losartan'),
                        'sesion_atorvastina'=> $this->input->post('sesion_atorvastina'),
                        'sesion_asa'=> $this->input->post('sesion_asa'),
                        'sesion_complejob'=> $this->input->post('sesion_complejob'),
                        'estado_id'=> $this->input->post('estado_id'),
                    );
                    $this->Sesion_model->update_sesion($sesion_id,$params);
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Información modificada con exito</div>');
                    redirect('sesion/sesiones/'.$data['sesion']['tratamiento_id']);
                }else{
                    $data['_view'] = 'sesion/modificar';
                    $this->load->view('layouts/main',$data);
                }
            }else
                show_error('La sesion que intentas modifcar no existe!.');
        }catch (Exception $ex) {
            throw new Exception('Sesion Controller : Error in edit function - ' . $ex);
        }
    }
    
    /*
    * modificar una sesión
    */
    public function detalle_procedimiento($sesion_id)
    {
        try{
            //$data['tratamiento_id'] = $tratamiento_id;
            $data['sesion'] = $this->Sesion_model->get_sesion($sesion_id);
            $data['paciente'] = $this->Sesion_model->get_pacientetratamiento($data['sesion']['tratamiento_id']);
            /*$tipo = 1;
            $data['all_estado'] = $this->Estado_model->get_estado_tipo($tipo);
            */
            $this->load->library('upload');
            $this->load->library('form_validation');
            if(isset($data['sesion']['sesion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $params = array(
                        'sesion_horaingreso'=> $this->input->post('sesion_horaingreso'),
                        'sesion_horasalida'=> $this->input->post('sesion_horasalida'),
                        'sesion_numerosesionhd'=> $this->input->post('sesion_numerosesionhd'),
                        'sesion_fecha'=> $this->input->post('sesion_fecha'),
                        'sesion_paingreso'=> $this->input->post('sesion_paingreso'),
                        'sesion_ingest'=> $this->input->post('sesion_ingest'),
                        'sesion_pesoseco'=> $this->input->post('sesion_pesoseco'),
                        'sesion_pesoingreso'=> $this->input->post('sesion_pesoingreso'),
                        'sesion_pesoegreso'=> $this->input->post('sesion_pesoegreso'),
                        'sesion_nummaquina'=> $this->input->post('sesion_nummaquina'),
                        'sesion_ultrafilsesion'=> $this->input->post('sesion_ultrafilsesion'),
                        'sesion_ultrafilfinal'=> $this->input->post('sesion_ultrafilfinal'),
                        'sesion_tipofiltro'=> $this->input->post('sesion_tipofiltro'),
                        'sesion_reutlizacionfiltro'=> $this->input->post('sesion_reutlizacionfiltro'),
                        'sesion_lineasav'=> $this->input->post('sesion_lineasav'),
                        'sesion_devolucion'=> $this->input->post('sesion_devolucion'),
                        'sesion_heparina'=> $this->input->post('sesion_heparina'),
                        'sesion_ktv'=> $this->input->post('sesion_ktv'),
                        'sesion_evaluacionenfermeria'=> $this->input->post('sesion_evaluacionenfermeria'),
                        'sesion_cateter'=> $this->input->post('sesion_cateter'),
                        'sesion_fistula'=> $this->input->post('sesion_fistula'),
                        'sesion_evaluacionclinica'=> $this->input->post('sesion_evaluacionclinica'),
                    );
                    $this->Sesion_model->update_sesion($sesion_id,$params);
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Información modificada con exito</div>');
                    redirect('sesion/sesiones/'.$data['sesion']['tratamiento_id']);
                }else{
                    $data['_view'] = 'sesion/detalle_procedimiento';
                    $this->load->view('layouts/main',$data);
                }
            }else
                show_error('La sesion que intentas modifcar no existe!.');
        }catch (Exception $ex) {
            throw new Exception('Sesion Controller : Error in edit function - ' . $ex);
        }
    }
    
    /*
    * Listing of sesiones de un tratamiento
    */
    public function detalle_medicacion($sesion_id = 0)
    {
        $data['sesion'] = $this->Sesion_model->get_sesion($sesion_id);
        $data['tratamiento'] = $this->Tratamiento_model->get_tratamiento($data['sesion']["tratamiento_id"]);
        $data['paciente'] = $this->Sesion_model->get_pacientetratamiento($data['sesion']["tratamiento_id"]);
        $data['medicamentos'] = $this->Medicamento_model->get_all_medicamento();
        
        $data['_view'] = 'sesion/detalle_medicacion';
        $this->load->view('layouts/main',$data);
    }
    /* muestra medicamentos usados  en una determinada sesion */
    function mostrar_medicamentos(){
        try{
            if($this->input->is_ajax_request()){
                $sesion_id = $this->input->post('sesion_id');
                $medicamento = $this->Medicacion_model->getall_medicamentosusados($sesion_id);
                echo json_encode($medicamento);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*
    * Listing of sesion
    */
    /*public function index()
    {
        try{
          $data['noof_page'] = 0;
         $data['sesion'] = $this->Sesion_model->get_all_sesion();
          $data['_view'] = 'sesion/index';
          $this->load->view('layouts/main',$data);
        } catch (Exception $ex) {
        throw new Exception('Sesion Controller : Error in index function - ' . $ex);
      }  
    }*/
     /*
      * Adding a new sesion
      */
     function add()
     {  
    try{
          $params = array(
           'usuario_id'=> $this->input->post('usuario_id'),
           'paciente_id'=> $this->input->post('paciente_id'),
           'sesion_fecha'=> $this->input->post('sesion_fecha'),
           'sesion_hora'=> $this->input->post('sesion_hora'),
           'sesion_mes'=> $this->input->post('sesion_mes'),
           'sesion_gestion'=> $this->input->post('sesion_gestion'),
           'sesion_diagnostico'=> $this->input->post('sesion_diagnostico'),
            );
           $this->load->library('upload');
           $this->load->library('form_validation');
           if(isset($_POST) && count($_POST) > 0)     
            {  
                $sesion_id= $this->Sesion_model->add_sesion($params);
                 $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
                  redirect('sesion/index');
            }
            else
            { 
               $data['_view'] = 'sesion/add';
                $this->load->view('layouts/main',$data);
            }
      } catch (Exception $ex) {
        throw new Exception('Sesion Controller : Error in add function - ' . $ex);
      }  
     }  
      /*
      * Editing a sesion
     */
     public function edit($sesion_id)
     {   
      try{
       $data['sesion'] = $this->Sesion_model->get_sesion($sesion_id);
           $this->load->library('upload');
           $this->load->library('form_validation');
         if(isset($data['sesion']['sesion_id']))
          {
            $params = array(
               'usuario_id'=> $this->input->post('usuario_id'),
               'paciente_id'=> $this->input->post('paciente_id'),
               'sesion_fecha'=> $this->input->post('sesion_fecha'),
               'sesion_hora'=> $this->input->post('sesion_hora'),
               'sesion_mes'=> $this->input->post('sesion_mes'),
               'sesion_gestion'=> $this->input->post('sesion_gestion'),
               'sesion_diagnostico'=> $this->input->post('sesion_diagnostico'),
            );
              if(isset($_POST) && count($_POST) > 0)     
               {  
               $this->Sesion_model->update_sesion($sesion_id,$params);
                 $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                    redirect('sesion/index');
               }
               else
              {
                  $data['_view'] = 'sesion/edit';
                  $this->load->view('layouts/main',$data);
              }
      }
      else
      show_error('The sesion you are trying to edit does not exist.');
      } catch (Exception $ex) {
        throw new Exception('Sesion Controller : Error in edit function - ' . $ex);
      }  
    } 
    /*
      * Deleting sesion
      */
      function remove($sesion_id)
       {
        try{
          $sesion = $this->Sesion_model->get_sesion($sesion_id);
      // check if the sesion exists before trying to delete it
           if(isset($sesion['sesion_id']))
           {
             $this->Sesion_model->delete_sesion($sesion_id);
                 $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
               redirect('sesion/index');
           }
           else
           show_error('The sesion you are trying to delete does not exist.');
      } catch (Exception $ex) {
        throw new Exception('Sesion Controller : Error in remove function - ' . $ex);
      }  
      }
 }
