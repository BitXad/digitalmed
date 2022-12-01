<?php

/*
  Generated by Manuigniter v2.0
  www.manuigniter.com
 */

class Documentacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Documentacion_model');
        $this->load->model('Paciente_model');
    }

    /*
     * Listing of documentacion
     */
    public function index() {
        try {
            $data['noof_page'] = 0;
            $data['documentacion'] = $this->Documentacion_model->get_all_documentacion();
            $data['_view'] = 'documentacion/index';
            $this->load->view('layouts/main', $data);
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in index function - ' . $ex);
        }
    }

    /*
     * Listing of documentacion
     */
    public function losdocumentos($paciente_id) {
        try {
            $data['noof_page'] = 0;
            $data['paciente'] = $this->Paciente_model->get_paciente($paciente_id);
            $data['documentacion'] = $this->Documentacion_model->getall_docpaciente($paciente_id);
            $data['_view'] = 'documentacion/losdocumentos';
            $this->load->view('layouts/main', $data);
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in index function - ' . $ex);
        }
    }
    
    /*
     * dar de baja a un documento
     */
    function darde_baja($documentacion_id, $paciente_id)
    {
        $estado_baja = 2; // da de baja a un asociado
        $params = array(
            'estado_id' => $estado_baja,
        );
        $this->Documentacion_model->update_documentacion($documentacion_id,$params);
        redirect('documentacion/losdocumentos/'.$paciente_id);
    }
    
    /*
     * dar de alta a un documento
     */
    function darde_alta($documentacion_id, $paciente_id)
    {
        $estado_alta = 1; // da de alta a un asociado
        $params = array(
            'estado_id' => $estado_alta,
        );
        $this->Documentacion_model->update_documentacion($documentacion_id,$params);
        redirect('documentacion/losdocumentos/'.$paciente_id);
    }
    
    
    
    
    /*
     * Adding a new documentacion
     */

    function add($paciente_id) {
        try {
            $data['paciente'] = $this->Paciente_model->get_paciente($paciente_id);
            if (isset($data['paciente']['paciente_id'])) {
                if (isset($_POST) && count($_POST) > 0) {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                    if (!empty($_FILES['documentacion_foto']['name'])){

                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/documentos/';
                        $img_full_path = $config['upload_path'];

                        //$config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['allowed_types'] = '*';
                        $config['image_library'] = 'gd2';
                        $config['max_size'] = 0;
                        $config['max_width'] = 0;
                        $config['max_height'] = 0;

                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('documentacion_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/documentos/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                            $confi['image_library'] = 'gd2';
                            $confi['source_image'] = './resources/images/documentos/'.$new_name.$extension;
                            $confi['new_image'] = './resources/images/documentos/'."thumb_".$new_name.$extension;
                            $confi['create_thumb'] = FALSE;
                            $confi['maintain_ratio'] = TRUE;
                            $confi['width'] = 100;
                            $confi['height'] = 100;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($confi);
                            $this->image_lib->resize();
                        }
                        /* ********************F I N  para resize***************************** */

                        $foto = $new_name.$extension;
                    }
                    /* *********************FIN imagen***************************** */

                    $estado_id = 1; // activo
                    $params = array(
                        'paciente_id' => $paciente_id,
                        'estado_id' => $estado_id,
                        'documentacion_descripcion' => $this->input->post('documentacion_descripcion'),
                        'documentacion_foto' => $foto,
                    );
                    $documentacion_id = $this->Documentacion_model->add_documentacion($params);
                    $this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Adicionado Correctamente.</div>');
                    redirect('documentacion/losdocumentos/'.$paciente_id);
                } else {
                    $data['_view'] = 'documentacion/add';
                    $this->load->view('layouts/main', $data);
                }
            }else show_error('El paciente que intentas editar no existe!.');
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in add function - ' . $ex);
        }
    }

    /*
     * Editing a documentacion
     */

    public function edit($documentacion_id) {
        try {
            $data['documentacion'] = $this->Documentacion_model->get_documentacion($documentacion_id);
            $this->load->library('upload');
            $this->load->library('form_validation');
            if (isset($data['documentacion']['documentacion_id'])) {
                $params = array(
                    'paciente_id' => $this->input->post('paciente_id'),
                    'documentacion_descripcion' => $this->input->post('documentacion_descripcion'),
                    'documentacion_foto1' => $this->input->post('documentacion_foto1'),
                    'documentacion_foto2' => $this->input->post('documentacion_foto2'),
                    'documentacion_foto3' => $this->input->post('documentacion_foto3'),
                );
                if (isset($_POST) && count($_POST) > 0) {
                    $this->Documentacion_model->update_documentacion($documentacion_id, $params);
                    $this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
                    redirect('documentacion/index');
                } else {
                    $data['_view'] = 'documentacion/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The documentacion you are trying to edit does not exist.');
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in edit function - ' . $ex);
        }
    }

    /*
     * Deleting documentacion
     */

    function remove($documentacion_id) {
        try {
            $documentacion = $this->Documentacion_model->get_documentacion($documentacion_id);
            // check if the documentacion exists before trying to delete it
            if (isset($documentacion['documentacion_id'])) {
                $this->Documentacion_model->delete_documentacion($documentacion_id);
                $this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
                redirect('documentacion/index');
            } else
                show_error('The documentacion you are trying to delete does not exist.');
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in remove function - ' . $ex);
        }
    }

    /*
     * View more a documentacion
     */

    public function view_more($documentacion_id) {
        try {
            $data['documentacion'] = $this->Documentacion_model->get_documentacion($documentacion_id);
            if (isset($data['documentacion']['documentacion_id'])) {
                $data['_view'] = 'documentacion/view_more';
                $this->load->view('layouts/main', $data);
            } else
                show_error('The documentacion you are trying to view more does not exist.');
        } catch (Exception $ex) {
            throw new Exception('Documentacion Controller : Error in View more function - ' . $ex);
        }
    }

    /*
     * Listing of documentacion
     */

    public function search_by_clm() {
        $column_name = $this->input->post('column_name');
        $value_id = $this->input->post('value_id');
        $data['noof_page'] = 0;
        $params = array();
        $data['documentacion'] = $this->Documentacion_model->get_all_documentacion_by_cat($column_name, $value_id);
        $data['_view'] = 'documentacion/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * get search values by column- documentacion
     */

    public function get_search_values_by_clm() {
        $clm_name = $this->input->post('clm_name');
        $value = $this->input->post('value');
        $id = $this->input->post('id');
        $params = array(
            $clm_name => $value,
        );
        $this->Documentacion_model->update_documentacion($id, $params);
        $data['noof_page'] = 0;
        $data['documentacion'] = $this->Documentacion_model->get_all_documentacion();
        $this->load->view('documentacion/index', $data);
    }

}
