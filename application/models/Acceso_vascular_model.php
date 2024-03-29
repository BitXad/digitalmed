<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Acceso_vascular_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
    /*
     * Get acceso_vascular by avascular_id 
    */ 
    function get_acceso_vascular($avascular_id)
    {
        try{
            return $this->db->get_where('acceso_vascular',array('avascular_id'=>$avascular_id))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model Model : Error in get_acceso_vascular function - ' . $ex);
        }  
    }
    
    
    function get_ultimoa_vascularregistro($registro_id)
    {
        try{
            $avascular = $this->db->query("
                SELECT
                    av.*
                FROM
                    `acceso_vascular` av
                WHERE
                    av.registro_id = $registro_id
                order by avascular_id desc
            ")->row_array();
            
            return $avascular;
            
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in get_all_acceso_vascular function - ' . $ex);
        }  
    }
    
    /*
     * function to add new acceso_vascular 
    */
    function add_acceso_vascular($params)
    {
        try{
            $this->db->insert('acceso_vascular',$params);
            return $this->db->insert_id();
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in add_acceso_vascular function - ' . $ex);
        }
    }
    /* 
     * function to update acceso_vascular 
    */
    function update_acceso_vascular($avascular_id,$params)
    {
        try{
            $this->db->where('avascular_id',$avascular_id);
            return $this->db->update('acceso_vascular',$params);
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in update_acceso_vascular function - ' . $ex);
        }
    }
    
    /* obtiene el historial de acceso vascular de un paciente */
    function get_historialacceso($paciente_id)
    {
        try{
            $avascular = $this->db->query("
                SELECT
                    av.*
                FROM
                    `acceso_vascular` av
                WHERE
                    av.paciente_id = $paciente_id
                order by avascular_id desc
            ")->result_array();
            
            return $avascular;
            
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in get_all_acceso_vascular function - ' . $ex);
        }  
    }
    /*  */
    function get_historialacceso_paciente($registro_id)
    {
        try{
            $avascular = $this->db->query("
                SELECT
                    av.*
                FROM
                    `acceso_vascular` av
                WHERE
                    av.registro_id = $registro_id
                order by avascular_id desc
            ")->result_array();
            
            return $avascular;
            
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in get_all_acceso_vascular function - ' . $ex);
        }  
    }
    
    /* obtiene el acceso vascular (de la  vista consavascular)
     * de una sesion para el informe mensual.. dado un tratamiento
     */
    function get_a_vascularregistro($tratamiento_id)
    {
        try{
            $avascular = $this->db->query("
                SELECT
                    av.*
                FROM
                    `consavascular` av
                WHERE
                    av.tratamiento_id = $tratamiento_id
                
            ")->row_array();
            
            return $avascular;
            
        }catch (Exception $ex) {
            throw new Exception('Acceso_vascular_model model : Error in get_all_acceso_vascular function - ' . $ex);
        }  
    }
 }
