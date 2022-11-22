<?php
/*
  Generated by Manuigniter v2.0
  www.manuigniter.com
 */
class Medicamento extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Medicamento_model');
        $this->load->model('Forma_model');
    }
    
    /*
     * Listing of medicamento
     */
    public function index() {
        try {
            $data['noof_page'] = 0;
            $data['medicamento'] = $this->Medicamento_model->get_all_medicamento();
            $data['_view'] = 'medicamento/index';
            $this->load->view('layouts/main', $data);
        } catch (Exception $ex) {
            throw new Exception('Medicamento Controller : Error in index function - ' . $ex);
        }
    }

    /*
     * Adding a new medicamento
     */
    function add() {
        try {
            $params = array(
                'medicamento_codigo' => $this->input->post('medicamento_codigo'),
                'medicamento_nombre' => $this->input->post('medicamento_nombre'),
                'medicamento_forma' => $this->input->post('medicamento_forma'),
                'medicamento_concentracion' => $this->input->post('medicamento_concentracion'),
                //'medicamento_cantidad' => $this->input->post('medicamento_cantidad'),
            );
            $this->load->library('upload');
            $this->load->library('form_validation');
            if (isset($_POST) && count($_POST) > 0) {
                $medicamento_id = $this->Medicamento_model->add_medicamento($params);
                //$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
                redirect('medicamento/index');
            } else {
                $data['all_forma'] = $this->Forma_model->get_all_forma();
                $data['_view'] = 'medicamento/add';
                $this->load->view('layouts/main', $data);
            }
        } catch (Exception $ex) {
            throw new Exception('Medicamento Controller : Error in add function - ' . $ex);
        }
    }

    /*
     * Editing a medicamento
     */
    public function edit($medicamento_id) {
        try {
            $data['medicamento'] = $this->Medicamento_model->get_medicamento($medicamento_id);
            $this->load->library('upload');
            $this->load->library('form_validation');
            if (isset($data['medicamento']['medicamento_id'])) {
                $params = array(
                    'medicamento_codigo' => $this->input->post('medicamento_codigo'),
                    'medicamento_nombre' => $this->input->post('medicamento_nombre'),
                    'medicamento_forma' => $this->input->post('medicamento_forma'),
                    'medicamento_concentracion' => $this->input->post('medicamento_concentracion'),
                    //'medicamento_cantidad' => $this->input->post('medicamento_cantidad'),
                );
                if (isset($_POST) && count($_POST) > 0) {
                    $this->Medicamento_model->update_medicamento($medicamento_id, $params);
                    $this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
                    redirect('medicamento/index');
                } else {
                    $data['all_forma'] = $this->Forma_model->get_all_forma();
                    $data['_view'] = 'medicamento/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The medicamento you are trying to edit does not exist.');
        } catch (Exception $ex) {
            throw new Exception('Medicamento Controller : Error in edit function - ' . $ex);
        }
    }

    function mostrar_medicamentos(){
        try{
            if($this->input->is_ajax_request()){
                $parametro = $this->input->post('filtrar');
                $datos = $this->Medicamento_model->get_busquedaparametros($parametro);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        }catch (Exception $e){
            echo 'Ocurrio algo inesperado; revisar datos!. '.$e;
        }
    }
    
    
    
    /*
     * Deleting medicamento
     */
    /*function remove($medicamento_id) {
        try {
            $medicamento = $this->Medicamento_model->get_medicamento($medicamento_id);
            // check if the medicamento exists before trying to delete it
            if (isset($medicamento['medicamento_id'])) {
                $this->Medicamento_model->delete_medicamento($medicamento_id);
                $this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
                redirect('medicamento/index');
            } else
                show_error('The medicamento you are trying to delete does not exist.');
        } catch (Exception $ex) {
            throw new Exception('Medicamento Controller : Error in remove function - ' . $ex);
        }
    }*/

}
