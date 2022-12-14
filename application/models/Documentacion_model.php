<?php

/*
  Generated by Manuigniter v2.0
  www.manuigniter.com
 */

class Documentacion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get documentacion by documentacion_id 
     */
    function get_documentacion($documentacion_id) {
        try {
            return $this->db->get_where('documentacion', array('documentacion_id' => $documentacion_id))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Documentacion_model Model : Error in get_documentacion function - ' . $ex);
        }
    }
    
    /*
     * Get all documentacion 
     */

    function get_all_documentacion($params = array()) {
        try {
            $this->db->order_by('documentacion_id', 'desc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('documentacion')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Documentacion_model model : Error in get_all_documentacion function - ' . $ex);
        }
    }

    /*
     * function to add new documentacion 
     */

    function add_documentacion($params) {
        try {
            $this->db->insert('documentacion', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Documentacion_model model : Error in add_documentacion function - ' . $ex);
        }
    }

    /*
     * function to update documentacion 
     */

    function update_documentacion($documentacion_id, $params) {
        try {
            $this->db->where('documentacion_id', $documentacion_id);
            return $this->db->update('documentacion', $params);
        } catch (Exception $ex) {
            throw new Exception('Documentacion_model model : Error in update_documentacion function - ' . $ex);
        }
    }

    /*
     * function to delete documentacion 
     */

    function delete_documentacion($documentacion_id) {
        try {
            return $this->db->delete('documentacion', array('documentacion_id' => $documentacion_id));
        } catch (Exception $ex) {
            throw new Exception('Documentacion_model model : Error in delete_documentacion function - ' . $ex);
        }
    }
    
    /*
     * Funcion que busca clientes
     */
    function getall_docpaciente($paciente_id)
    {
        $sql = "SELECT
                d.*, e.estado_color, e.estado_descripcion
            FROM
                documentacion d
            LEFT JOIN estado e on d.estado_id = e.estado_id
            WHERE
            d.paciente_id = $paciente_id
            ";
        $paciente = $this->db->query($sql)->result_array();
        return $paciente;

    }

}
