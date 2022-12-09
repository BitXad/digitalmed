<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Sesion_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
      
    
    /*
       * function to add new sesion 
    */
    function add_sesion($params)
    {
        try{
            $this->db->insert('sesion',$params);
            return $this->db->insert_id();
        }catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in add_sesion function - ' . $ex);
        }  
    }
    
    /*
     * Get all sesion 
    */ 
    function get_all_sesiontratamiento($tratamiento_id)
    {
        try{
            $sesion = $this->db->query("
                SELECT
                    s.*, e.estado_color, e.estado_descripcion
                FROM
                    sesion s
                left join estado e on s.estado_id = e.estado_id
                WHERE
                    s.tratamiento_id = $tratamiento_id
            ")->result_array();
            return $sesion;
        } catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
        }  
    }
    
    /*
     * Obtiene informacion del pasiente, dado un tratamiento
    */ 
    function get_pacientetratamiento($tratamiento_id)
    {
        try{
            $sesion = $this->db->query("
                SELECT
                    p.*, r.registro_id, r.registro_iniciohemodialisis, ex.extencion_descripcion
                FROM
                    paciente p
                    left join registro r on p.paciente_id = r.paciente_id
                    left join tratamiento t on r.registro_id = t.registro_id
                    left join extencion ex on p.extencion_id = ex.extencion_id
                WHERE
                    t.tratamiento_id = $tratamiento_id
            ")->row_array();
            return $sesion;
        } catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
        }  
    }
    
    /*
    * Get sesion by sesion_id 
    */ 
    function get_sesion($sesion_id)
    {
        try{
            return $this->db->get_where('sesion',array('sesion_id'=>$sesion_id))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Sesion_model Model : Error in get_sesion function - ' . $ex);
        }  
    }
    
    /* 
    * function to update sesion 
    */
    function update_sesion($sesion_id,$params)
    {
        try{
            $this->db->where('sesion_id',$sesion_id);
            return $this->db->update('sesion',$params);
        }catch (Exception $ex){
            throw new Exception('Sesion_model model : Error in update_sesion function - ' . $ex);
        }
    }
    
    /*
    * Get all sesion 
    */ 
    function get_all_sesion($params = array())
    {
        try{
              $this->db->order_by('sesion_id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('sesion')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
           }  
    } 
    
    /*
     * Get all sesion 
    */ 
    function get_all_sesiontratamiento_mes($tratamiento_id)
    {
        try{
            $sesion = $this->db->query("
                SELECT
                    sum(s.sesion_eritropoyetina) as eritropoyetina, sum(s.sesion_hierroeve) as hierro,
                    sum(s.sesion_complejobampolla) as complejobampolla, sum(s.sesion_omeprazol) as omeprazol,
                    sum(s.sesion_acidofolico) as acidofolico, sum(s.sesion_calcio) as calcio,
                    sum(s.sesion_amlodipina) as amlodipina, sum(s.sesion_enalpril) as enalpril,
                    sum(s.sesion_losartan) as losartan, sum(s.sesion_atorvastina) as atorvastina,
                    sum(s.sesion_asa) as asa, sum(s.sesion_complejob) as complejob
                FROM
                    sesion s
                left join estado e on s.estado_id = e.estado_id
                WHERE
                    s.tratamiento_id = $tratamiento_id
            ")->row_array();
            return $sesion;
        } catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
        }  
    }
    
    /* 
    * function to delete sesion 
    */
    function delete_sesion($sesion_id)
    {
        try{
             return $this->db->delete('sesion',array('sesion_id'=>$sesion_id));
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in delete_sesion function - ' . $ex);
           }  
    }
    
    /*
     * Get all sesion en estado Pendiente o en proceso de un paciente
    */ 
    function getall_sesionallenar_paciente($paciente_id)
    {
        try{
            $sesion = $this->db->query("
                SELECT
                    s.*, t.tratamiento_gestion, t.tratamiento_mes
                FROM
                    sesion s
                left join tratamiento t on s.tratamiento_id = t.tratamiento_id
                left join registro r on t.registro_id = r.registro_id
                left join paciente p on r.paciente_id = p.paciente_id
                WHERE
                	(s.estado_id = 3 or s.estado_id = 4) and
                	p.paciente_id = $paciente_id
            ")->result_array();
            return $sesion;
        } catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
        }  
    }
    
    /*
     * Get all sesiones de un paciente
    */ 
    function getall_sesion_paciente($paciente_id)
    {
        try{
            $sesion = $this->db->query("
                SELECT
                    s.*, t.tratamiento_gestion, t.tratamiento_mes, r.registro_iniciohemodialisis,
                    c.certmedico_id, i.infmensual_id
                FROM
                    sesion s
                left join tratamiento t on s.tratamiento_id = t.tratamiento_id
                left join registro r on t.registro_id = r.registro_id
                left join paciente p on r.paciente_id = p.paciente_id
                left join certificado_medico c on t.tratamiento_id = c.tratamiento_id
                left join informe_mensual i on t.tratamiento_id = i.tratamiento_id
                WHERE
                	p.paciente_id = $paciente_id
                order by s.sesion_id desc
            ")->result_array();
            return $sesion;
        } catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
        }  
    }
    
 }
