<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Documentacion extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Documentacion_model');
 } 
 /*
* Listing of documentacion
 */
public function get_all_post()
{
  try{
  $data['documentacion'] = $this->Documentacion_model->get_all_documentacion();
     if($data['documentacion'] && $data['documentacion']!=null){
       $documentacion_ar = array();
       foreach($data['documentacion'] as $d)
       {
       $d_ar = array();
       $d_ar['documentacion_id'] = $d['documentacion_id'];
       $d_ar['paciente_id'] = $d['paciente_id'];
       $d_ar['documentacion_descripcion'] = $d['documentacion_descripcion'];
       $d_ar['documentacion_foto1'] = $d['documentacion_foto1'];
       $d_ar['documentacion_foto2'] = $d['documentacion_foto2'];
       $d_ar['documentacion_foto3'] = $d['documentacion_foto3'];
       $documentacion_ar[] = $d_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $documentacion_ar,
       );
       $this->response($response, REST_Controller::HTTP_OK);
     }
     else{
       $response = array(
      'status' => 400,
      'message' => 'Detail is not found'
        );
       $this->response($response, REST_Controller::HTTP_OK); 
        }
       } catch (Exception $ex) {
             throw new Exception('Documentacion controller_name : Error in get_all_post function - ' . $ex);
        }  
}
 /*
  * Adding a new documentacion
  */
 function addnew_post()
 {  
  try{
      $params = array(
       'paciente_id'=> $this->input->post('paciente_id'),
       'documentacion_descripcion'=> $this->input->post('documentacion_descripcion'),
       'documentacion_foto1'=> $this->input->post('documentacion_foto1'),
       'documentacion_foto2'=> $this->input->post('documentacion_foto2'),
       'documentacion_foto3'=> $this->input->post('documentacion_foto3'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $documentacion_id= $this->Documentacion_model->add_documentacion($params);
   $data['documentacion'] = $this->Documentacion_model->get_documentacion($documentacion_id);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Added',
            'data' => $data
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
        else
        { 
           $response = array(
            'status' => 400,
            'message' => 'Not Added try again',
            'data' => ''
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
       } catch (Exception $ex) {
             throw new Exception('Documentacion controller_name : Error in new documentacion function - ' . $ex);
       }  
 }  
  /*
  * Editing a documentacion
 */
  function edit_post($documentacion_id)
 {   
  try{
   $data['documentacion'] = $this->Documentacion_model->get_documentacion($documentacion_id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['documentacion']['documentacion_id']))
      {
        $params = array(
           'paciente_id'=> $this->input->post('paciente_id'),
           'documentacion_descripcion'=> $this->input->post('documentacion_descripcion'),
           'documentacion_foto1'=> $this->input->post('documentacion_foto1'),
           'documentacion_foto2'=> $this->input->post('documentacion_foto2'),
           'documentacion_foto3'=> $this->input->post('documentacion_foto3'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Documentacion_model->update_documentacion($documentacion_id,$params);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Updated',
            'data' => $documentacion_id
             );
           $this->response($response, REST_Controller::HTTP_OK);
           }
           else
          {
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $documentacion_id
             );
           $this->response($response, REST_Controller::HTTP_OK);
          }
  }
       } catch (Exception $ex) {
             throw new Exception('Documentacion controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting documentacion
  */
  function remove_post($documentacion_id)
   {
  try{
      $documentacion = $this->Documentacion_model->get_documentacion($documentacion_id);
  // check if the documentacion exists before trying to delete it
       if(isset($documentacion['documentacion_id']))
       {
         $this->Documentacion_model->delete_documentacion($documentacion_id);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Removed',
            'data' => $documentacion_id
             );
           $this->response($response, REST_Controller::HTTP_OK);
       }
       else
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $documentacion_id
             );
           $this->response($response, REST_Controller::HTTP_OK);
       } catch (Exception $ex) {
             throw new Exception('Documentacion controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }
