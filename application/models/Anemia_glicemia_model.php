<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Anemia_glicemia_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
    
    /*
    * Get anemia_glicemia de un tratamiento determinado
    */ 
    function getall_anemia_glicemiatratamiento($tratamiento_id)
    {
        try{
            $infmensual = $this->db->query("
                SELECT
                    ag.*
                FROM
                    `anemia_glicemia` ag
                WHERE
                    tratamiento_id = $tratamiento_id
            ")->row_array();
            
            return $infmensual;
        }catch (Exception $ex){
            throw new Exception('Anemia_glicemia_model model : Error in getall_anemia_glicemiatratamiento function - ' . $ex);
        }  
    }
    
    /*
    * Get anemia_glicemia by anemiaglic_id 
    */ 
    function get_anemia_glicemia($anemiaglic_id)
    {
        try{
           return $this->db->get_where('anemia_glicemia',array('anemiaglic_id'=>$anemiaglic_id))->row_array();
        }catch (Exception $ex) {
           throw new Exception('Anemia_glicemia_model Model : Error in get_anemia_glicemia function - ' . $ex);
           }
    }
    
    /*
     * function to add new anemia_glicemia 
    */
    function add_anemia_glicemia($params)
    {
        try{
            $this->db->insert('anemia_glicemia',$params);
            return $this->db->insert_id();
        }catch (Exception $ex) {
            throw new Exception('Anemia_glicemia_model model : Error in add_anemia_glicemia function - ' . $ex);
        }
    }
    
    /* 
     * function to update anemia_glicemia 
    */
    function update_anemia_glicemia($anemiaglic_id,$params)
    {
        try{
            $this->db->where('anemiaglic_id',$anemiaglic_id);
            return $this->db->update('anemia_glicemia',$params);
        }catch (Exception $ex) {
            throw new Exception('Anemia_glicemia_model model : Error in update_anemia_glicemia function - ' . $ex);
        }  
    }
    
    /*
    * Get ultimo anemia_glicemia de un paciente
    */ 
    function getlast_informepaciente($paciente_id)
    {
        try{
            $infmensual = $this->db->query("
                SELECT
                    ag.*, r.paciente_id
                FROM
                    `anemia_glicemia` ag
                left join tratamiento t on t.tratamiento_id = ag.tratamiento_id
                left join registro r on r.registro_id = t.registro_id
                WHERE
                    r.paciente_id = $paciente_id
                order by im.anemiaglic_id desc
            ")->row_array();
            
            return $infmensual;
        }catch (Exception $ex){
            throw new Exception('Anemia_glicemia_model model : Error in getall_anemia_glicemiatratamiento function - ' . $ex);
        }  
    }
    
 }