<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Tratamiento_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
    
    /*
    * Get all tratamiento de un registro determinado
    */ 
    function getall_tratamientoregistro($registro_id)
    {
        try{
            $tratamiento = $this->db->query("
                SELECT
                    t.*, im.infmensual_id, cm.certmedico_id, ag.anemiaglic_id,
                    e.estado_color, e.estado_descripcion
                FROM
                    `tratamiento` t
                left join informe_mensual im on t.tratamiento_id = im.tratamiento_id
                left join certificado_medico cm on t.tratamiento_id = cm.tratamiento_id
                left join anemia_glicemia ag on t.tratamiento_id = ag.tratamiento_id
                left join estado e on t.estado_id = e.estado_id
                WHERE
                    registro_id = $registro_id
                order by t.tratamiento_id desc
            ")->result_array();
            
            return $tratamiento;
        }catch (Exception $ex){
            throw new Exception('Tratamiento_model model : Error in getall_tratamientoregistro function - ' . $ex);
        }
    }
    
    /*
    * Get tratamiento by tratamiento_id 
    */ 
    function get_tratamiento($tratamiento_id)
    {
        try{
           return $this->db->get_where('tratamiento',array('tratamiento_id'=>$tratamiento_id))->row_array();
        }catch (Exception $ex) {
           throw new Exception('Tratamiento_model Model : Error in get_tratamiento function - ' . $ex);
           }
    }
    
    /*
    * Get tratamiento by tratamiento_id 
    */ 
    function get_pacienteregistro($registro_id)
    {
        try{
            $paciente = $this->db->query("
                SELECT
                    p.*
                FROM
                    `paciente` p
                left join registro r on p.paciente_id = r.paciente_id
                WHERE
                    registro_id = $registro_id
            ")->row_array();
            
            return $paciente;
        }catch (Exception $ex) {
           throw new Exception('Tratamiento_model Model : Error in get_tratamiento function - ' . $ex);
           }
    }
    
    /*
     * function to add new tratamiento 
    */
    function add_tratamiento($params)
    {
        try{
            $this->db->insert('tratamiento',$params);
            return $this->db->insert_id();
        }catch (Exception $ex) {
            throw new Exception('Tratamiento_model model : Error in add_tratamiento function - ' . $ex);
        }
    }
    
    /* 
     * function to update tratamiento 
    */
    function update_tratamiento($tratamiento_id,$params)
    {
        try{
            $this->db->where('tratamiento_id',$tratamiento_id);
            return $this->db->update('tratamiento',$params);
        }catch (Exception $ex) {
            throw new Exception('Tratamiento_model model : Error in update_tratamiento function - ' . $ex);
        }  
    }
    
    /*
    * obtiene todos los tratamientos de paciente
    */ 
    function get_tratamientospaciente($paciente_id)
    {
        try{
            $tratamiento = $this->db->query("
                SELECT
                    t.*, e.estado_color, e.estado_descripcion
                FROM
                    `paciente` p
                left join registro r on p.paciente_id = r.paciente_id
                left join tratamiento t on r.registro_id = t.registro_id
                left join estado e on t.estado_id = e.estado_id
                WHERE
                    p.paciente_id = $paciente_id
                order by t.tratamiento_id desc
            ")->result_array();
            
            return $tratamiento;
        }catch (Exception $ex) {
           throw new Exception('Tratamiento_model Model : Error in get_tratamiento function - ' . $ex);
        }
    }
    
    /*
    * obtiene el ultimo registro de un paciente
    */ 
    function get_registropaciente($paciente_id)
    {
        try{
            $registro = $this->db->query("
                SELECT
                    r.*
                FROM
                    `paciente` p
                left join registro r on p.paciente_id = r.paciente_id
                WHERE
                    p.paciente_id = $paciente_id
                order by r.registro_id desc
            ")->row_array();
            
            return $registro;
        }catch (Exception $ex) {
           throw new Exception('Tratamiento_model Model : Error in get_tratamiento function - ' . $ex);
        }
    }
    /*
     * function to delete tratamiento
     */
    function delete_tratamiento($tratamiento_id)
    {
        $this->db->delete('certificado_medico',array('tratamiento_id'=>$tratamiento_id));
        $this->db->delete('informe_mensual',array('tratamiento_id'=>$tratamiento_id));
        $this->db->delete('anemia_glicemia',array('tratamiento_id'=>$tratamiento_id));
        
        $lassesiones = $this->db->query("
            SELECT
                s.sesion_id
            FROM
                `sesion` s
            WHERE
                s.tratamiento_id = $tratamiento_id
        ")->result_array();
        foreach ($lassesiones as $sesion){
            $sesion_id = $sesion["sesion_id"];
            $this->db->delete('detalle_hora',array('sesion_id'=>$sesion_id));
            $this->db->delete('medicacion',array('sesion_id'=>$sesion_id));
        }
        $this->db->delete('sesion',array('tratamiento_id'=>$tratamiento_id));
        return $this->db->delete('tratamiento',array('tratamiento_id'=>$tratamiento_id));
    }
    
    /*
    * Get all tratamiento de un registro determinado y un estado determinado
    */ 
    function getall_tratamientoregistro_estado($registro_id, $estado_id)
    {
        try{
            $tratamiento = $this->db->query("
                SELECT
                    t.*, im.infmensual_id, cm.certmedico_id, ag.anemiaglic_id,
                    e.estado_color, e.estado_descripcion
                FROM
                    `tratamiento` t
                left join informe_mensual im on t.tratamiento_id = im.tratamiento_id
                left join certificado_medico cm on t.tratamiento_id = cm.tratamiento_id
                left join anemia_glicemia ag on t.tratamiento_id = ag.tratamiento_id
                left join estado e on t.estado_id = e.estado_id
                WHERE
                    registro_id = $registro_id
                    and t.estado_id = $estado_id
                order by t.tratamiento_id desc
            ")->result_array();
            
            return $tratamiento;
        }catch (Exception $ex){
            throw new Exception('Tratamiento_model model : Error in getall_tratamientoregistro function - ' . $ex);
        }
    }
 }
