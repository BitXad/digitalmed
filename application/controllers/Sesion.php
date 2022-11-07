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
    }
    
    /*
    * Listing of sesion
    */
    public function index()
    {
        $data['_view'] = 'sesion/index';
        $this->load->view('layouts/main',$data);
    }
    
    function generar_sesion(){
        try{
            if($this->input->is_ajax_request()){
                $sesion_numero = $this->input->post('sesion_numero');
                $sesion_fechainicio = $this->input->post('sesion_fechainicio');
                // 0=>Domingo, 1=>Lunes, 2=>Martes, 3=>Miercoles, 4=>Jueves, 5=>Viernes, 6=>Sabado
                $dia = date("w", strtotime($sesion_fechainicio));
                if($dia >0){
                    $lmv = 0;  //0==>false;  1==>true
                    if($dia == 1 || $dia == 3 || $dia == 5){
                        $lmv = 1;
                    }
                    for($i = 1; $i <= $sesion_numero; $i++){
                        $params = array(
                            'sesion_numerosesionhd' => $i,
                            'sesion_fecha' => $sesion_fechainicio,
                            'sesion_eritropoyetina' => $this->input->post('sesion_eritropoyetina'),
                            'sesion_hierroeve' => $this->input->post('sesion_hierroev'),
                            'sesion_complejobampolla' => $this->input->post('sesion_complejobampolla'),
                            'sesion_costosesion' => $this->input->post('sesion_costosesion'),
                        );
                        $sesion_id = $this->Sesion_model->add_sesion($params);

                        $dia = date("w", strtotime($sesion_fechainicio));

                        if($lmv == 1){
                            if($dia == 1 || $dia == 3){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+2 days"));
                            }elseif($dia == 5){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+3 days"));
                            }
                        }else{
                            if($dia == 2 || $dia == 4){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+2 days"));
                            }elseif($dia == 6){
                                $sesion_fechainicio = date('Y-m-d', strtotime($sesion_fechainicio."+3 days"));
                            }
                        }
                    }
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
    
    function mostrar_sesiones(){
        try{
            if($this->input->is_ajax_request()){
                $sesion = $this->Sesion_model->get_all_sesion();
                echo json_encode($sesion);
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
