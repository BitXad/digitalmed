<?php
/*
  Generated by Manuigniter v2.0
  www.manuigniter.com
 */
class Medicamento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get medicamento by medicamento_id 
     */
    function get_medicamento($medicamento_id) {
        try {
            return $this->db->get_where('medicamento', array('medicamento_id' => $medicamento_id))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model Model : Error in get_medicamento function - ' . $ex);
        }
    }

    /*
     * Get all medicamento 
     */
    function get_all_medicamento() {
        try {
            $this->db->order_by('medicamento_nombre', 'asc');
            return $this->db->get('medicamento')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model model : Error in get_all_medicamento function - ' . $ex);
        }
    }

    /*
     * function to add new medicamento 
     */
    function add_medicamento($params) {
        try {
            $this->db->insert('medicamento', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model model : Error in add_medicamento function - ' . $ex);
        }
    }

    /*
     * function to update medicamento 
     */
    function update_medicamento($medicamento_id, $params) {
        try {
            $this->db->where('medicamento_id', $medicamento_id);
            return $this->db->update('medicamento', $params);
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model model : Error in update_medicamento function - ' . $ex);
        }
    }

    /*
     * function to delete medicamento 
     */
    function delete_medicamento($medicamento_id) {
        try {
            return $this->db->delete('medicamento', array('medicamento_id' => $medicamento_id));
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model model : Error in delete_medicamento function - ' . $ex);
        }
    }
    
    /* Get busqueda medicamentos de parametros */
    function get_busquedaparametros($parametro){
        $medicamento = $this->db->query("
            SELECT
                m.*
            FROM
                medicamento m
            WHERE
                (m.medicamento_nombre like '%".$parametro."%'
                or m.medicamento_codigo like '%".$parametro."%'
                or m.medicamento_forma like '%".$parametro."%'
                or m.medicamento_concentracion like '%".$parametro."%')
            ORDER BY m.medicamento_nombre
        ")->result_array();

        return $medicamento;
    }
    
    /*
     * Get all medicamento 
     */
    function get_all_medicamentoid() {
        try {
            $this->db->order_by('medicamento_id', 'asc');
            return $this->db->get('medicamento')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Medicamento_model model : Error in get_all_medicamento function - ' . $ex);
        }
    }

}
