<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria_egreso_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get categoria_egreso by id_categr
     */
    function get_categoria_egreso($id_categr)
    {
        return $this->db->get_where('categoria_egreso',array('id_categr'=>$id_categr))->row_array();
    }
        
    /*
     * Get all categoria_egreso
     */
    function get_all_categoria_egreso()
    {
        $this->db->order_by('id_categr', 'desc');
        return $this->db->get('categoria_egreso')->result_array();
    }
        
    /*
     * function to add new categoria_egreso
     */
    function add_categoria_egreso($params)
    {
        $this->db->insert('categoria_egreso',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update categoria_egreso
     */
    function update_categoria_egreso($id_categr,$params)
    {
        $this->db->where('id_categr',$id_categr);
        return $this->db->update('categoria_egreso',$params);
    }
    
    /*
     * function to delete categoria_egreso
     */
    function delete_categoria_egreso($id_categr)
    {
        return $this->db->delete('categoria_egreso',array('id_categr'=>$id_categr));
    }
}
